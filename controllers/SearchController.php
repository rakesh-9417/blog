<?php

use WHMCS\Database\Capsule;
use WHMCS\Input\Sanitize;
use Carbon\Carbon;

class SearchController
{
  function index($variables)
  {
    $search = $_REQUEST['search'];
    $_lang  = $variables['BLANG'];

    if($search)
    {
      $query = Capsule::table('mod_blog_posts');

      $searchterms = [];
      $searchparts = explode(' ',  $search);
      foreach ($searchparts as $searchpart)
      {
        if($searchpart)
        {
          $query->orWhere('title', 'LIKE', '%'.$searchpart.'%')->orWhere('contents', 'LIKE', '%'.$searchpart.'%');
        }
      }

      $result = $query->orderBy('title', 'ASC')->where('language', '')->where('published', 'on')->get();
      foreach ($result as $data)
      {
        $id       = $data->id;
        $posturl  = $data->posturl;
        $visitors = $data->counted;
        $date     = Carbon::createFromFormat('Y-m-d H:i:s', $data->dateposted)->formatLocalized('%B %d, %Y - %H:%M %p');
        $title    = $data->title;
        $contents = Sanitize::decode(strip_tags($data->contents));

        $comcount = Capsule::table('mod_blog_comments')->where('pid', $id)->where('status', 'on')->count();

        $data2 = Capsule::table('mod_blog_posts')->where('language', $_SESSION['blogLanguage'])->where('langid', $id)->first();

        if($data2->title)
        {
          $title = $data2->title;
        }

        if($data2->contents)
        {
          $contents = Sanitize::decode(strip_tags($data2->contents));
        }

        $variables["searchresult"][] = ['id' => $id, 'title' => $title, 'posturl' => $posturl, 'contents' => $contents, 'date' => $date, 'visitors' => $visitors, 'comments' => $comcount];
      }
    }

    $variables['filename']    = 'searchpage';
    $variables['pagetitle']   = $_lang['search'];
    $variables["searchvalue"] = $search;
    $variables['page']        = 'search';

    return BlogView('searchpage', $variables);
  }
}
