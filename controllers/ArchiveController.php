<?php

use WHMCS\Database\Capsule;
use WHMCS\Input\Sanitize;
use Carbon\Carbon;

class ArchiveController
{
  function index($variables)
  {
    $month       = $_REQUEST['m'];
    $year        = $_REQUEST['y'];
    $_lang       = $variables['BLANG'];
    $archiveDate = $_REQUEST['y'].'-'.$_REQUEST['m'];

    $result = Capsule::table('mod_blog_posts')->whereMonth('dateposted', '=', $month)->whereYear('dateposted', '=', $year)->where('language', '')->where('trash', '')->where('published', 'on')->orderBy('dateposted', 'ASC')->get();
    foreach ($result as $data)
    {
      $id         = $data->id;
      $posturl    = $data->posturl;
      $visitors   = $data->counted;
      $date       = Carbon::createFromFormat('Y-m-d H:i:s', $data->dateposted)->formatLocalized('%B %d, %Y - %H:%M %p');
      $title      = $data->title;
      $contents   = Sanitize::decode(strip_tags($data->contents));
      $comcount   = Capsule::table('mod_blog_comments')->where('pid', $id)->where('status', 'on')->count();

      $data2 = Capsule::table('mod_blog_posts')->where('language', $_SESSION['blogLanguage'])->where('langid', $id)->first();

      if($data2->title)
      {
        $title = $data2->title;
      }

      if($data2->contents)
      {
        $contents = Sanitize::decode(strip_tags($data2->contents));
      }

      $variables["articles"][] = ['id' => $id, 'title' => $title, 'posturl' => $posturl, 'contents' => $contents, 'date' => $date, 'visitors' => $visitors, 'comments' => $comcount];
    }

    $pageTitle = $_lang['archive'].' '.Carbon::createFromFormat('Y-m', $archiveDate)->formatLocalized('%b %Y');

    $variables['filename']  = 'archivepage';
    $variables['pagetitle'] = $pageTitle;
    $variables['page']      = 'archive';

    return BlogView('archivepage', $variables);
  }
}
