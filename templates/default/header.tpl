<!DOCTYPE html>
<html dir="{$BLANG.direction}" lang="{$BLANG.isocode}" prefix="og: http://ogp.me/ns#">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset={$charset}" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{$blogtitle} | {$pagetitle}</title>
    <base href="{$blogurl}/" />

    {if $blogdescription or $description}
      <meta name=”description” content=”{if $description}{$description}{else}{$blogdescription}{/if}” />
    {/if}
    <meta name=”robots” content=”noodp” />
    {if $blogkeywords or $keywords}
      <meta name=”keywords” content=”{if $keywords}{$keywords}{else}{$blogkeywords}{/if}” />
    {/if}

    {if $page == 'post'}
      <meta property="og:title" content="{$pagetitle}" />
      <meta property="og:type" content="article" />
      <meta property="og:url" content="{$blogurl}/{if $seourl}{$posturl}.html{else}index.php?p=post&a={$posturl}{/if}" />
      <meta property="og:image" content="{$blogurl}/getimage.php?id={$id}" />
    {/if}

    <!-- Blog Favicon -->
    <link rel="shortcut icon" type="image/png" href="images/favicon.png"/>

    <!-- Blog RSS -->
    <link href="{if $rss}{$rss}{else}{$blogurl}/rss.php{/if}" rel="alternate" type="application/rss+xml" title="{$blogdescription}" />

    <!-- Bootstrap -->
    <link href="templates/{$template}/assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="templates/{$template}/assets/css/font-awesome.min.css" rel="stylesheet">
    <link href="templates/{$template}/assets/css/custom.css" rel="stylesheet">

    <!-- JavaScript -->
    <script src="templates/{$template}/assets/js/jquery-3.2.1.min.js"></script>
    <script src="templates/{$template}/assets/js/bootstrap.min.js"></script>
    <script src="templates/{$template}/assets/js/custom.js"></script>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    
    <!-- Start Support Board Chat -->
    <script id="chat-init" src="https://cloud.board.support/account/js/init.js?id=954836347"></script>
    <!-- End Support Board Chat -->
    
    <!-- Start cookieyes banner -->
    <script id="cookieyes" type="text/javascript" src="https://cdn-cookieyes.com/client_data/d5bc80e63037872ce7af2435/script.js"></script>
    <!-- End cookieyes banner -->
 
  </head>
  <body>
    <div class="container">
      <div class="logo">
        <a href="index.php"><img src="templates/{$template}/assets/img/logo.png" class="img-responsive" alt="{$blogtitle}"></a>
      </div>
      <nav class="navbar navbar-inverse">
        <div class="container-fluid">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#collapse-1" aria-expanded="false">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
          </div>
          <div class="collapse navbar-collapse" id="collapse-1">
            <ul class="nav navbar-nav">
              <li {if $filename eq 'homepage'}class="active"{/if}><a href="{if $seourl}{$blogurl}{else}index.php{/if}"><span class="fa fa-home"></span> {$BLANG.home}</a></li>
              <li><a href="{$whmcsloginurl}"><span class="fa fa-bookmark"></span> {$BLANG.clientarea}</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
              {if $userlogin}
              <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-user"></span> {$BLANG.hello}, {$userfirstname}! <span class="caret"></span></a>
                <ul class="dropdown-menu" role="menu">
                  <li><a href="{$systemurl}/clientarea.php?action=details"><i class="fa fa-pencil-square-o fa-fw"></i>&nbsp; {$BLANG.editaccountdetails}</a></li>
                  <li><a href="{$systemurl}/clientarea.php?action=contacts"><i class="fa fa-users fa-fw"></i>&nbsp; {$BLANG.contactssubaccounts}</a></li>
                  <li><a href="{$systemurl}/clientarea.php?action=emails"><i class="fa fa-envelope fa-fw"></i>&nbsp; {$BLANG.emailhistory}</a></li>
                  <li><a href="{$systemurl}/clientarea.php?action=changepw"><i class="fa fa-key fa-fw"></i>&nbsp; {$BLANG.changepassword}</a></li>
                  <li class="divider"></li>
                  <li><a href="{$systemurl}/logout.php"><i class="fa fa-power-off fa-fw"></i>&nbsp; {$BLANG.logout}</a></li>
                </ul>
              </li>
              {else}
              <li><a href="{$whmcsloginurl}"><span class="glyphicon glyphicon-user"></span> {$BLANG.account}</a></li>
              {/if}
            </ul>
          </div>
        </div>
      </nav>
