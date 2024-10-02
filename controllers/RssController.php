<?php

use WHMCS\Database\Capsule;
use WHMCS\Config\Setting;
use WHMCS\Input\Sanitize;
use Carbon\Carbon;

class RssController
{
  function index($variables)
  {
    $blogUrl = (BlogSettings('SeoUrl'))? BlogSettings('BlogURL') : BlogSettings('BlogURL').'/index.php';

    header( "Content-Type: application/rss+xml" );
    header('Content-Type: application/xml; charset=utf-8');

    $rssOutPut = '<?xml version="1.0" encoding="'.Setting::getValue('Charset').'"?>
            <rss version="2.0" xmlns:atom="http://www.w3.org/2005/Atom">
              <channel>
                <atom:link href="'.BlogSettings('BlogURL').'/index.php?p=rss" rel="self" type="application/rss+xml" />
                <title><![CDATA['.BlogSettings('BlogTitle').']]></title>
                <description><![CDATA['.BlogSettings('Description').']]></description>
                <link>'.$blogUrl.'</link>';

    $result = Capsule::table('mod_blog_posts')->where('language', '')->where('trash', '')->where('published', 'on')->orderBy('dateposted', 'DESC')->take(20)->get();
    foreach ($result as $data)
    {
    	$id       = $data->id;
    	$title    = $data->title;
    	$posturl  = $data->posturl;
    	$contents = substr(strip_tags(Sanitize::decode($data->contents)), 0, BlogSettings('Truncate'));
      $date     = $data->dateposted;

      $data2 = Capsule::table('mod_blog_posts')->where('language', $_SESSION['blogLanguage'])->where('langid', $id)->first();

      if($data2->title)
      {
    	  $title = $data2->title;
      }

      if($data2->contents)
      {
    	  $contents = substr(strip_tags(Sanitize::decode($data2->contents)),0, BlogSettings('Truncate'));
      }

      $pageUrl = (BlogSettings('SeoUrl'))? BlogSettings('BlogURL').'/'.$posturl.'.html' : BlogSettings('BlogURL').'/index.php?p=post&amp;a='.$posturl;

      $rssOutPut .= '<item>
              <title><![CDATA['.$title.']]></title>
              <link>'.$pageUrl.'</link>
              <guid>'.$pageUrl.'</guid>
              <pubDate>'.Carbon::createFromFormat('Y-m-d H:i:s', $date)->formatLocalized('%a, %d %b %Y %T %z').'</pubDate>
              <description><![CDATA['.$contents.']]></description>
            </item>';
    }

    $rssOutPut .= '</channel></rss>';

    echo $rssOutPut;
    exit;
  }
}
