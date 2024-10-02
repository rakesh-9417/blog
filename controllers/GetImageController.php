<?php

use WHMCS\Database\Capsule;

class GetImageController
{
  function index($variables)
  {
    $image = '';

    if($_REQUEST['id'])
    {
      $id = $_REQUEST['id'];

      $data = Capsule::table('mod_blog_posts')->where('language', '')->where('id', $id)->first();

      $image = $data->image;

      $image =  file_get_contents('data/'.$image);
    }

    return $image;
  }
}
