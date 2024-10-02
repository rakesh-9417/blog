<?php

use WHMCS\Database\Capsule;
use WHMCS\Input\Sanitize;
use Carbon\Carbon;

class CategoryController
{
  function index($variables)
  {
    $pageurl = $_REQUEST['display'];

    $catdata = Capsule::table('mod_blog_categories')->where('caturl', $pageurl)->where('language', '')->first();

    $catid       = $catdata->id;
    $catname     = $catdata->category;
    $description = $catdata->description;
    $keywords    = $catdata->keywords;
    $caturl      = $catdata->caturl;
    $orders      = $catdata->orders;

    $catdata2 = Capsule::table('mod_blog_categories')->where('langid', $catid)->where('language', $_SESSION['blogLanguage'])->first();

    if($catdata2->category)
    {
      $catname = $catdata2->category;
    }

    if($catdata2->description)
    {
      $description = $catdata2->description;
    }

    if($catdata2->keywords)
    {
      $keywords = $catdata2->keywords;
    }

    if($orders)
    {
      $totalCount = Capsule::table('mod_blog_posts')->where('catid', $catid)->where('language', '')->where('trash', '')->where('published', 'on')->count();

      $page = ($_GET['page'])? $_GET['page'] : '';

      $targetpage = (BlogSettings('SeoUrl'))? $caturl.'/page/' : 'index.php?p=category&display='.$caturl.'&page=';

      $pagination = blog_Pagination($page, $totalCount, $targetpage, BlogSettings('Pagination'), 3);

      $result = Capsule::table('mod_blog_posts')->where('catid', $catid)->where('language', '')->where('trash', '')->where('published', 'on')->orderBy('id', 'DESC')->skip($pagination['start'])->take($pagination['limit'])->get();
      foreach ($result as $data)
      {
        $id       = $data->id;
        $title    = $data->title;
        $contents = Sanitize::decode($data->contents);
        $caid     = $data->catid;
        $counted  = $data->counted;
        $image    = $data->image;
        $posturl  = $data->posturl;
        $tag      = $data->tags;
        $date     = $data->dateposted;

        $comcount = Capsule::table('mod_blog_comments')->where('pid', $id)->where('status', 'on')->count();

        $data2 = Capsule::table('mod_blog_posts')->where('langid', $id)->where('language', $_SESSION['blogLanguage'])->first();

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
          'id'       => $id,
          'catid'    => $caid,
          'title'    => $title,
          'contents' => $contents,
          'visitors' => $counted,
          'image'    => $image,
          'posturl'  => $posturl,
          'tags'     => $tags[$id],
          'comments' => $comcount,
          'day'      => Carbon::createFromFormat('Y-m-d H:i:s', $date)->formatLocalized('%d'),
          'month'    => Carbon::createFromFormat('Y-m-d H:i:s', $date)->formatLocalized('%b'),
          'year'     => Carbon::createFromFormat('Y-m-d H:i:s', $date)->formatLocalized('%Y'),
       ];
      }
    }

    $_lang = $variables['BLANG'];

    $pageTitle = ($page)? $catname.' '.$_lang['page'].' '.$page : $catname;

    $variables['description'] = $description;
    $variables['keywords']    = $keywords;
    $variables['caturl']      = $caturl;
    $variables['catid']       = $catid;
    $variables['pagination']  = $pagination['pagination'];
    $variables['filename']    = 'categorypage';
    $variables['pagetitle']   = $pageTitle;
    $variables['page']        = 'category';

    return BlogView('categoriespage', $variables);
  }
}
