<?php

use WHMCS\Database\Capsule;
use Carbon\Carbon;

class SitemapController
{
  function index($variables)
  {
    header("Content-Type: text/xml");

    $sitemapOutPut = '<?xml version="1.0" encoding="UTF-8"?>
      <?xml-stylesheet type="text/xsl" href="xml-sitemap.xsl"?>
      <urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9"
      xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"
      xsi:schemaLocation="http://www.sitemaps.org/schemas/sitemap/0.9
      http://www.sitemaps.org/schemas/sitemap/0.9/sitemap.xsd">';

    $result = Capsule::table('mod_blog_posts')->where('language', '')->where('trash', '')->where('published', 'on')->get();
    foreach ($result as $data)
    {
      $posturl = $data->posturl;
      $date    = $data->dateposted;
      $pageUrl = (BlogSettings('SeoUrl'))? BlogSettings('BlogURL').'/'.$posturl.'.html' : BlogSettings('BlogURL').'/index.php?p=post&a='.$posturl;

      $sitemapOutPut .= '<url>
        <loc>'.blog_SitemapUrl($pageUrl).'</loc>
        <changefreq>'.BlogSettings('SitemapFrequency').'</changefreq>
        <lastmod>'.Carbon::createFromFormat('Y-m-d H:i:s', $date)->formatLocalized('%Y-%m-%d').'</lastmod>
        <priority>1.0</priority>
        </url>';
    }

    $sitemapOutPut .= '</urlset>';

    return $sitemapOutPut;
  }
}
