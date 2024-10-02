<?php

use WHMCS\Database\Capsule;
use WHMCS\Input\Sanitize;
use Carbon\Carbon;

class HomeController
{
  function index($variables)
  {
    $totalCount = Capsule::table('mod_blog_posts')->where('language', '')->where('trash', '')->where('published', 'on')->count();

    $page = ($_GET['page'])? $_GET['page'] : '';

    $targetpage = (BlogSettings('SeoUrl'))? 'page/' : 'index.php?page=';

    $pagination = blog_Pagination($page, $totalCount, $targetpage, BlogSettings('Pagination'), 3);

    $result = Capsule::table('mod_blog_posts')->where('language', '')->where('trash', '')->where('published', 'on')->orderBy('id', 'DESC')->skip($pagination['start'])->take($pagination['limit'])->get();
    foreach ($result as $data)
    {
      $id       = $data->id;
      $catid    = $data->catid;
      $title    = $data->title;
      $counted  = $data->counted;
      $contents = Sanitize::decode($data->contents);
      $image    = $data->image;
      $tag      = $data->tags;
      $posturl  = $data->posturl;
      $date     = $data->dateposted;

      $comcount = Capsule::table('mod_blog_comments')->where('pid', $id)->where('status', 'on')->count();

      $data2 = Capsule::table('mod_blog_posts')->where('language', $_SESSION['blogLanguage'])->where('langid', $id)->first();

      if($data2->title)
      {
        $title = $data2->title;
      }

      if($data2->contents)
      {
        $contents = Sanitize::decode($data2->contents);
      }

      $tagarray = explode(',', $tag);
      foreach ($tagarray as $tag)
      {
        if($tag)
        {
          $tags[$id][] = ['tag' => $tag, 'tagurl' => blog_URLSlug($tag)];
        }
      }

      $variables['articles'][] = [
        'id'        => $id,
        'catid'     => $catid,
        'title'     => $title,
        'contents'  => $contents,
        'visitors'  => $counted,
        'image'     => $image,
        'tags'      => $tags[$id],
        'posturl'   => $posturl,
        'comments'  => $comcount,
        'day'       => Carbon::createFromFormat('Y-m-d H:i:s', $date)->formatLocalized('%d'),
        'month'     => Carbon::createFromFormat('Y-m-d H:i:s', $date)->formatLocalized('%b'),
        'year'      => Carbon::createFromFormat('Y-m-d H:i:s', $date)->formatLocalized('%Y'),
      ];
    }

    $_lang = $variables['BLANG'];

    $pageTitle = ($page)? $_lang['home'].' '.$_lang['page'].' '.$page : $_lang['home'];

    $variables['pagination'] = $pagination['pagination'];
    $variables['filename']   = 'homepage';
    $variables['pagetitle']  = $pageTitle;
    $variables['page']       = 'home';

    return BlogView('homepage', $variables);
  }
}
