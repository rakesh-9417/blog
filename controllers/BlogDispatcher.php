<?php

class BlogDispatcher
{
  public function dispatch($page, $action, $parameters)
  {
    switch($page)
    {
      case 'post': $controller = new PostController(); break;
      case 'category': $controller = new CategoryController(); break;
      case 'archive': $controller = new ArchiveController(); break;
      case 'search': $controller = new SearchController(); break;
      case 'sitemap': $controller = new SitemapController(); break;
      case 'rss': $controller = new RssController(); break;
      case 'getimg': $controller = new GetImageController(); break;

      default: $controller = new HomeController();
    }

    if (is_callable([$controller, $action]))
    {
      return $controller->$action($parameters);
    }

    return '<p>Invalid action requested. Please go back and try again.</p>';
  }
}
