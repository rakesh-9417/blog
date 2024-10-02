<?php

use WHMCS\Module\Addon\Blog\HardSoftCode\HSCodeUserInfo as UserInfo;
use WHMCS\Database\Capsule;
use WHMCS\Input\Sanitize;
use Carbon\Carbon;

class PostController
{
  function index($variables)
  {
    $pageurl = $_REQUEST['display'];
    $_lang   = $variables['BLANG'];

    $query = Capsule::table('mod_blog_posts');

    if(!$_SESSION['adminid'])
    {
      $query->where('trash', '')->where('published', 'on');
    }

    $data = $query->where('language', '')->where('posturl', $pageurl)->first();

    $id          = $data->id;
    $catid       = $data->catid;
    $title       = $data->title;
    $contents    = Sanitize::decode($data->contents);
    $tag         = $data->tags;
    $description = $data->description;
    $keywords    = $data->keywords;
    $posturl     = $data->posturl;
    $date        = $data->dateposted;
    $counted     = $data->counted;
    $image       = $data->image;

    $data2 = Capsule::table('mod_blog_posts')->where('langid', $id)->where('language', $_SESSION['blogLanguage'])->first();

    $comcount = Capsule::table('mod_blog_comments')->where('pid', $id)->where('status', 'on')->count();

    $catdata = Capsule::table('mod_blog_categories')->where('id', $catid)->where('langid', '')->first();

    if($catdata->orders)
    {
      $caid    = $catdata->id;
      $catname = $catdata->category;
      $caturl  = $catdata->caturl;
    }

    $catdata2 = Capsule::table('mod_blog_categories')->where('langid', $caid)->where('language', $_SESSION['blogLanguage'])->first();

    if($catdata2->category)
    {
      $catname = $catdata2->category;
    }

    if($data2->title)
    {
      $title = $data2->title;
    }

    if($data2->contents)
    {
      $contents = Sanitize::decode($data2->contents);
    }

    if($data2->description)
    {
      $description = $data2->description;
    }

    if($data2->keywords)
    {
      $keywords = $data2->keywords;
    }

    if($data2->tags)
    {
      $tag = $data2->tags;
    }

    $tagarray = explode(',', $tag);
    foreach ($tagarray as $tagValue)
    {
      if($tagValue)
      {
        $tags[] = ['tag' => $tagValue, 'tagurl' => blog_URLSlug($tagValue)];
      }
    }

    if(!$_COOKIE['hasVisited-'.$id])
    {
      setcookie("hasVisited-".$id, true);

      Capsule::table('mod_blog_posts')->where('id', $id)->increment('counted', 1);
    }

    $commentQuery = Capsule::table('mod_blog_comments');

    if($_SESSION['adminid'])
    {
      $commentQuery->where('pid', $id);
    }
    else
    {
      $commentQuery->where('pid', $id)->where('status','on');
    }

    $commentResult = $commentQuery->orderBy('id', 'DESC')->get();
    foreach ($commentResult as $commentData)
    {
      $variables['comments'][] = [
        'id'       => $commentData->id,
        'name'     => $commentData->name,
        'email'    => $commentData->email,
        'avatar'   => blog_Gravatar($commentData->email),
        'comments' => Sanitize::decode($commentData->comments),
        'date'     => $commentData->date? Carbon::createFromFormat('Y-m-d H:i:s', $commentData->date)->formatLocalized('%B %d, %Y - %H:%M %p') : '',
        'ip'       => $commentData->ip,
        'status'   => $commentData->status,
      ];
    }

    if(BlogSettings('PublicKey') && BlogSettings('PrivateKey') && BlogSettings('Captcha') == 'on' || BlogSettings('PublicKey') && BlogSettings('PrivateKey') && BlogSettings('Captcha') == 'login' && !$_SESSION['uid'])
    {
      $variables['publicKey']  = BlogSettings('PublicKey');
    }

    if(BlogSettings('Comments') == 'on')
    {
      $variables['allowcomments'] = true;
    }
    elseif(BlogSettings('Comments') == 'login')
    {
      if($_SESSION['uid'])
      {
        $variables['allowcomments'] = true;
      }

      $variables['commentserrormessage'] = $_lang['youmustbeloggedintocomment'];
    }
    else
    {
      $variables['commentserrormessage'] = $_lang['commentsdisabledbyadministrator'];
    }

    if($_SESSION["blogAlertBox"])
    {
      $errormessage = $_SESSION["blogAlertBox"]['errorMessage'];
      $userName     = $_SESSION["blogAlertBox"]['name'];
      $userEmail    = $_SESSION["blogAlertBox"]['email'];
      $userComment  = $_SESSION["blogAlertBox"]['comment'];

      unset($_SESSION['blogAlertBox']);
    }

    if($_SESSION["blogAlertMsg"])
    {
      $msg = $_SESSION["blogAlertMsg"];

      unset($_SESSION["blogAlertMsg"]);
    }

    $variables['id']           = $id;
    $variables['catid']        = $catid;
    $variables['description']  = $description;
    $variables['keywords']     = $keywords;
    $variables['title']        = $title;
    $variables['posturl']      = $posturl;
    $variables['catname']      = $catname;
    $variables['caturl']       = $caturl;
    $variables['contents']     = $contents;
    $variables['visitors']     = $counted;
    $variables['image']        = $image;
    $variables['comcount']     = $comcount;
    $variables['tags']         = $tags;
    $variables['day']          = $date? Carbon::createFromFormat('Y-m-d H:i:s', $date)->formatLocalized('%d') : '';
    $variables['month']        = $date? Carbon::createFromFormat('Y-m-d H:i:s', $date)->formatLocalized('%b') : '';
    $variables['year']         = $date? Carbon::createFromFormat('Y-m-d H:i:s', $date)->formatLocalized('%Y') : '';
    $variables['page']         = 'post';
    $variables['filename']     = 'postpage';
    $variables['pagetitle']    = $title;
    $variables['errormessage'] = $errormessage;
    $variables['name']         = $userName;
    $variables['email']        = $userEmail;
    $variables['comment']      = $userComment;
    $variables['commentmsg']   = $msg;

    return BlogView('postspage', $variables);
  }

  function comment($variables)
  {
    $_lang = $variables['BLANG'];

    if(empty($_REQUEST['name']))
    {
      $errormessage = '<li>'.$_lang['youdidnotenteryourname'];
    }
    elseif(!preg_match("~^[a-z0-9\-'\s\p{Arabic}]{1,60}$~iu",$_REQUEST['name']))
    {
      $errormessage .= '<li>'.$_lang['namewasnotvalid'];
    }

    if(empty($_REQUEST['email']))
    {
      $errormessage .= '<li>'.$_lang['youdidnotenteryouremailaddress'];
    }
    elseif(!filter_var($_REQUEST['email'], FILTER_VALIDATE_EMAIL))
    {
      $errormessage .= '<li>'.$_lang['emailaddresswasnotvalid'];
    }

    if(empty($_REQUEST['comment']))
    {
      $errormessage .= '<li>'.$_lang['youdidnotenteranycomment'];
    }

    if(BlogSettings('PublicKey') && BlogSettings('PrivateKey') && BlogSettings('Captcha') == 'on' || BlogSettings('PublicKey') && BlogSettings('PrivateKey') && BlogSettings('Captcha') == 'login' && !$_SESSION['uid'])
    {
      $recaptcha = new \ReCaptcha\ReCaptcha(BlogSettings('PrivateKey'));

      $resp = $recaptcha->verify($_REQUEST['g-recaptcha-response'], UserInfo::getIP());

      if($resp->getErrorCodes())
      {
        $errormessage .= '<li>'.$_lang['checkthecaptchabox'];
      }
    }

    if($errormessage)
    {
      $_SESSION["blogAlertBox"]['errorMessage'] = $errormessage;
      $_SESSION["blogAlertBox"]['name']         = $_REQUEST['name'];
      $_SESSION["blogAlertBox"]['email']        = $_REQUEST['email'];
      $_SESSION["blogAlertBox"]['comment']      = $_REQUEST['comment'];

      header('Location: '.Sanitize::decode($_SERVER['HTTP_REFERER']).'#submited');
    }

    if(!$errormessage)
    {
      if(BlogSettings('ApproveComment') == 'on')
      {
        $status = '';
        $msg = 'warning';
      }
      elseif(BlogSettings('ApproveComment') == 'login')
      {
        if($_SESSION['uid'])
        {
          $status = 'on';
          $msg = 'success';
        }
        else
        {
          $status = '';
          $msg = 'warning';
        }
      }
      elseif(BlogSettings('ApproveComment') == 'off')
      {
        $status = 'on';
        $msg = 'success';
      }

      if(BlogSettings('Notifications') && BlogSettings('EmailNotifications') && BlogSettings('EmailSubject') && BlogSettings('EmailMessage'))
      {
        $message = str_replace("{name}",      $_REQUEST['name'], BlogSettings('EmailMessage'));
        $message = str_replace("{email}",     $_REQUEST['email'], $message);
        $message = str_replace("{comment}",   $_REQUEST['comment'], $message);
        $message = str_replace("{posttitle}", $_REQUEST['title'], $message);
        $message = str_replace("{posturl}",   '<a href="'.Sanitize::decode($_SERVER['HTTP_REFERER']).'">'.Sanitize::decode($_SERVER['HTTP_REFERER']).'</a>', $message);
        $message = str_replace("{ip}",        UserInfo::getIP(), $message);
        $message = str_replace("{whois}",     '<a href="https://www.geoiptool.com/en/?IP='.UserInfo::getIP().'">'.UserInfo::getIP().'</a>', $message);

        blog_SendEmail($_REQUEST['name'], $_REQUEST['email'], BlogSettings('BlogTitle'), BlogSettings('EmailNotifications'), BlogSettings('EmailSubject'), $message);
      }

      $userid = ($_SESSION['uid'])? $_SESSION['uid'] : '0';

      if($msg){$_SESSION["blogAlertMsg"] = $msg;}

      Capsule::table('mod_blog_comments')->insert([
        'pid'      => $_REQUEST['id'],
        'userid'   => $userid,
        'name'     => $_REQUEST['name'],
        'email'    => $_REQUEST['email'],
        'comments' => $_REQUEST['comment'],
        'date'     => Carbon::now(),
        'ip'       => UserInfo::getIP(),
        'status'   => $status,
      ]);

      header('Location: '.Sanitize::decode($_SERVER['HTTP_REFERER']).'#submited');
    }
  }

  function approve($variables)
  {
    if($_SESSION['adminid'])
    {
      $id = $_REQUEST['id'];

      Capsule::table('mod_blog_comments')->where('id', $id)->update(['status' => 'on']);

      header('Location: '.Sanitize::decode($_SERVER['HTTP_REFERER']));
      exit;
    }
    else
    {
      header('Location: '.Sanitize::decode($_SERVER['HTTP_REFERER']));
      exit;
    }
  }

  function editcomment($variables)
  {
    if($_SESSION['adminid'])
    {
      $id       = $_REQUEST['id'];
      $comments = $_REQUEST['editcomnt'];

      Capsule::table('mod_blog_comments')->where('id', $id)->update(['comments' => $comments]);

      header('Location: '.Sanitize::decode($_SERVER['HTTP_REFERER']));
      exit;
    }
    else
    {
      header('Location: '.Sanitize::decode($_SERVER['HTTP_REFERER']));
      exit;
    }
  }

  function banned($variables)
  {
    if($_SESSION['adminid'])
    {
      $id    = $_REQUEST['id'];
      $ip    = $_REQUEST['ip'];
      $_lang = $variables['BLANG'];

      Capsule::table('tblbannedips')->insert(['ip' => $ip, 'reason' => $_lang['youripisbanned'], 'expires' => date('Y-m-d H:i:s', strtotime(date('Y-m-d H:i:s') . ' + 30 day'))]);

      Capsule::table('mod_blog_comments')->where('id', $id)->update(['status' => 'spam']);

      header('Location: '.Sanitize::decode($_SERVER['HTTP_REFERER']));
      exit;
    }
    else
    {
      header('Location: '.Sanitize::decode($_SERVER['HTTP_REFERER']));
      exit;
    }
  }

  function delete($variables)
  {
    if($_SESSION['adminid'])
    {
      $id = $_REQUEST['id'];

      Capsule::table('mod_blog_comments')->where('id', $id)->delete();

      header('Location: '.Sanitize::decode($_SERVER['HTTP_REFERER']));
      exit;
    }
    else
    {
      header('Location: '.Sanitize::decode($_SERVER['HTTP_REFERER']));
      exit;
    }
  }
}
