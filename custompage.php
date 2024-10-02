<?php

use WHMCS\Authentication\CurrentUser;
use WHMCS\ClientArea;
use WHMCS\Database\Capsule;
use WHMCS\Config\Setting;
use WHMCS\Input\Sanitize;
use WHMCS\User\Client;
use Carbon\Carbon;

// die('******************');

define('CLIENTAREA', true);

require_once __DIR__ . '/../init.php';

$ca = new ClientArea();

define("BLOGDIR", dirname(__FILE__));

if(file_exists('config.php'))
{
  include 'config.php';
}
else
{
  die('Error connecting to WHMCS! Please rename config.php.new file to config.php');
}

// if(file_exists($whmcsdir.'/init.php'))
// {
//   include $whmcsdir.'/init.php';
// }
// else
// {
//   die('Error connecting to WHMCS! Please include the WHMCS root directory in the config.php file');
// }

$_SESSION['adminid'] = $_COOKIE["blog_adminid"];
$_SESSION['uid']     = $_COOKIE["blog_uid"];
$_SESSION['blogLanguage'] = $_COOKIE["blog_lang"];

if(!$btemplates_c || $btemplates_c == "templates_c/")
{
  $btemplates_c = BLOGDIR.'/templates_c/';
}

if(!is_writeable($btemplates_c))
{
  die('The templates compiling directory <b>'.$btemplates_c.'</b> must be writeable (CHMOD 777) before you can continue.<br>If the path shown is incorrect, you can update it in the config.php file.');
}

if(!BlogSettings('BlogRoot'))
{
  die('Error connecting to Blog please go to Blog settings and enter blog root directory: <strong>'.$_SERVER['DOCUMENT_ROOT'].dirname($_SERVER['SCRIPT_NAME']).'</strong>');
}

if(!BlogSettings('Template'))
{
  die('Error connecting no template selected please go to Blog settings and select a template');
}

if(file_exists("lang/".strtolower($_SESSION['blogLanguage']).".php"))
{
  require("lang/".strtolower($_SESSION['blogLanguage']).".php");
}
elseif(file_exists("lang/".strtolower(Setting::getValue('Language')).".php"))
{
  require("lang/".strtolower(Setting::getValue('Language')).".php");
}
elseif(file_exists("lang/english.php"))
{
  require("lang/english.php");
}

require_once 'includes/recaptcha/autoload.php';

setlocale(LC_TIME, $_BLANG['isocode']);

$userInfo = Client::find($_SESSION['uid']);

$sidebarResult = Capsule::table('mod_blog_sidebar')->where('status', '')->orderBy('orders', 'ASC')->get();
foreach ($sidebarResult as $sidebarData)
{
  $variables['sidebars'][] = ['htmlcode' => Sanitize::decode($sidebarData->htmlcode)];
}

$archiveResult = Capsule::table('mod_blog_posts')->select('dateposted')->where('language', '')->groupBy(Capsule::raw('MONTH(dateposted) ASC ORDER BY YEAR(dateposted) DESC, MONTH(dateposted) DESC'))->get();
foreach ($archiveResult as $archiveData)
{
  $month    = Carbon::createFromFormat('Y-m-d H:i:s', $archiveData->dateposted)->formatLocalized('%B');
  $monthnum = Carbon::createFromFormat('Y-m-d H:i:s', $archiveData->dateposted)->formatLocalized('%m');
  $year     = Carbon::createFromFormat('Y-m-d H:i:s', $archiveData->dateposted)->formatLocalized('%Y');

  $variables['archives'][] = ['month' => $month, 'monthnum' => $monthnum, 'year' => $year];
}

$resultMain = Capsule::table('mod_blog_categories')->where('language', '')->where('parent', '')->orderBy('orders', 'ASC')->get();
foreach ($resultMain as $dataMain)
{
  $id        = $dataMain->id;
  $categname = $dataMain->category;
  $caturl    = $dataMain->caturl;
  $orders    = $dataMain->orders;

  $data = Capsule::table('mod_blog_categories')->where('language', $_SESSION['blogLanguage'])->where('langid', $id)->first();

  if($data->category)
  {
    $categname = $data->category;
  }

  if($orders)
  {
    $variables['categories'][] = ['id' => $id, 'name' => $categname, 'caturl' => $caturl];
  }
}

if($_REQUEST['p'] == 'category')
{
  $pageurl = $_REQUEST['display'];

  $catiddata = Capsule::table('mod_blog_categories')->where('caturl', $pageurl)->where('langid', '')->first();

  $catid = $catiddata->id;

  $resultSub = Capsule::table('mod_blog_categories')->where('langid', '')->where('parent', $catid)->orderBy('orders', 'ASC')->get();
  foreach ($resultSub as $dataSub)
  {
    $id        = $dataSub->id;
    $categname = $dataSub->category;
    $caturl    = $dataSub->caturl;
    $parent    = $dataSub->parent;
    $orders    = $dataSub->orders;

    if($parent)
    {
      $data = Capsule::table('mod_blog_categories')->where('language', $_SESSION['blogLanguage'])->where('langid', $id)->first();

      if($data->category)
      {
        $categname = $data->category;
      }

      if($orders)
      {
        $variables['subcategories'][] = ['id' => $id, 'name' => $categname, 'caturl' => $caturl];
      }
    }
  }
}

$_SESSION['token'] = md5(uniqid(rand(),1));

spl_autoload_register(function ($className)
{
  include 'controllers/'.$className.'.php';
});

$page   = isset($_REQUEST['p']) ? $_REQUEST['p'] : '';
$action = isset($_REQUEST['a']) ? $_REQUEST['a'] : 'index';

$variables['templates_c']            = $btemplates_c;
$variables['BLANG']                  = $_BLANG;
$variables['userfirstname']          = $userInfo->firstname;
$variables['userlastname']           = $userInfo->lastname;
$variables['useremail']              = $userInfo->email;
$variables['date_day']               = Carbon::now()->formatLocalized('%d');
$variables['date_month']             = Carbon::now()->formatLocalized('%h');
$variables['date_year']              = Carbon::now()->formatLocalized('%Y');
$variables['token']                  = $_SESSION['token'];
$variables['userlogin']              = $_SESSION['uid'];
$variables['adminlogin']             = $_SESSION['adminid'];
$variables['language']               = strtolower($_SESSION['blogLanguage']);
$variables['whmcsloginurl']          = Setting::getValue('SystemURL').'/clientarea.php';
$variables['systemurl']              = Setting::getValue('SystemURL');
$variables['charset']                = Setting::getValue('Charset');
$variables['companyname']            = Setting::getValue('CompanyName');
$variables['blogtitle']              = BlogSettings('BlogTitle');
$variables['blogurl']                = BlogSettings('BlogURL');
$variables['blogdescription']        = BlogSettings('Description');
$variables['blogkeywords']           = BlogSettings('Keywords');
$variables['template']               = BlogSettings('Template');
$variables['seourl']                 = BlogSettings('SeoUrl');
$variables['truncate']               = BlogSettings('Truncate');
$variables['recaptcha']              = BlogSettings('Recaptcha');
$variables['captchapublickey']       = BlogSettings('CaptchaPublickey');
$variables['maintenancemodemessage'] = BlogSettings('MaintenanceModeMessage');
$variables['addthis']                = BlogSettings('AddThis');
$variables['Profileid']              = BlogSettings('ProfileID');
$variables['commentscounter']        = BlogSettings('CommentsCounter');
$variables['visitorcounter']         = BlogSettings('VisitorCounter');
$variables['facebook']               = BlogSettings('FaceBook');
$variables['twitter']                = BlogSettings('Twitter');
$variables['google']                 = BlogSettings('Google');
$variables['rss']                    = BlogSettings('Rss');
$variables['trackingcode']           = BlogSettings('GoogleAnalytics');
$variables['sitemap']                = BlogSettings('Sitemap');

$dispatcher = new BlogDispatcher();
$response = $dispatcher->dispatch($page, $action, $variables);
// echo $response;



$ca->setTemplate('custompage');
$ca->assign('custompage', $response);

$ca->output();
