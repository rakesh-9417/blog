<?php
/* Smarty version 3.1.48, created on 2024-09-22 00:34:55
  from '/home/tublat/public_html/blog/templates/default/header.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.48',
  'unifunc' => 'content_66ef662f4b09d3_05659356',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '5637f0a3d2fc76d9331a55549f157f8c0d0d8776' => 
    array (
      0 => '/home/tublat/public_html/blog/templates/default/header.tpl',
      1 => 1726965078,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_66ef662f4b09d3_05659356 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html dir="<?php echo $_smarty_tpl->tpl_vars['BLANG']->value['direction'];?>
" lang="<?php echo $_smarty_tpl->tpl_vars['BLANG']->value['isocode'];?>
" prefix="og: http://ogp.me/ns#">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=<?php echo $_smarty_tpl->tpl_vars['charset']->value;?>
" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php echo $_smarty_tpl->tpl_vars['blogtitle']->value;?>
 | <?php echo $_smarty_tpl->tpl_vars['pagetitle']->value;?>
</title>
    <base href="<?php echo $_smarty_tpl->tpl_vars['blogurl']->value;?>
/" />

    <?php if ($_smarty_tpl->tpl_vars['blogdescription']->value || $_smarty_tpl->tpl_vars['description']->value) {?>
      <meta name=”description” content=”<?php if ($_smarty_tpl->tpl_vars['description']->value) {
echo $_smarty_tpl->tpl_vars['description']->value;
} else {
echo $_smarty_tpl->tpl_vars['blogdescription']->value;
}?>” />
    <?php }?>
    <meta name=”robots” content=”noodp” />
    <?php if ($_smarty_tpl->tpl_vars['blogkeywords']->value || $_smarty_tpl->tpl_vars['keywords']->value) {?>
      <meta name=”keywords” content=”<?php if ($_smarty_tpl->tpl_vars['keywords']->value) {
echo $_smarty_tpl->tpl_vars['keywords']->value;
} else {
echo $_smarty_tpl->tpl_vars['blogkeywords']->value;
}?>” />
    <?php }?>

    <?php if ($_smarty_tpl->tpl_vars['page']->value == 'post') {?>
      <meta property="og:title" content="<?php echo $_smarty_tpl->tpl_vars['pagetitle']->value;?>
" />
      <meta property="og:type" content="article" />
      <meta property="og:url" content="<?php echo $_smarty_tpl->tpl_vars['blogurl']->value;?>
/<?php if ($_smarty_tpl->tpl_vars['seourl']->value) {
echo $_smarty_tpl->tpl_vars['posturl']->value;?>
.html<?php } else { ?>index.php?p=post&a=<?php echo $_smarty_tpl->tpl_vars['posturl']->value;
}?>" />
      <meta property="og:image" content="<?php echo $_smarty_tpl->tpl_vars['blogurl']->value;?>
/getimage.php?id=<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
" />
    <?php }?>

    <!-- Blog Favicon -->
    <link rel="shortcut icon" type="image/png" href="images/favicon.png"/>

    <!-- Blog RSS -->
    <link href="<?php if ($_smarty_tpl->tpl_vars['rss']->value) {
echo $_smarty_tpl->tpl_vars['rss']->value;
} else {
echo $_smarty_tpl->tpl_vars['blogurl']->value;?>
/rss.php<?php }?>" rel="alternate" type="application/rss+xml" title="<?php echo $_smarty_tpl->tpl_vars['blogdescription']->value;?>
" />

    <!-- Bootstrap -->
    <link href="templates/<?php echo $_smarty_tpl->tpl_vars['template']->value;?>
/assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="templates/<?php echo $_smarty_tpl->tpl_vars['template']->value;?>
/assets/css/font-awesome.min.css" rel="stylesheet">
    <link href="templates/<?php echo $_smarty_tpl->tpl_vars['template']->value;?>
/assets/css/custom.css" rel="stylesheet">

    <!-- JavaScript -->
    <?php echo '<script'; ?>
 src="templates/<?php echo $_smarty_tpl->tpl_vars['template']->value;?>
/assets/js/jquery-3.2.1.min.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 src="templates/<?php echo $_smarty_tpl->tpl_vars['template']->value;?>
/assets/js/bootstrap.min.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 src="templates/<?php echo $_smarty_tpl->tpl_vars['template']->value;?>
/assets/js/custom.js"><?php echo '</script'; ?>
>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <?php echo '<script'; ?>
 src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"><?php echo '</script'; ?>
>
      <?php echo '<script'; ?>
 src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"><?php echo '</script'; ?>
>
    <![endif]-->
    
    <!-- Start Support Board Chat -->
    <?php echo '<script'; ?>
 id="chat-init" src="https://cloud.board.support/account/js/init.js?id=954836347"><?php echo '</script'; ?>
>
    <!-- End Support Board Chat -->
    
    <!-- Start cookieyes banner -->
    <?php echo '<script'; ?>
 id="cookieyes" type="text/javascript" src="https://cdn-cookieyes.com/client_data/d5bc80e63037872ce7af2435/script.js"><?php echo '</script'; ?>
>
    <!-- End cookieyes banner -->
 
  </head>
  <body>
    <div class="container">
      <div class="logo">
        <a href="index.php"><img src="templates/<?php echo $_smarty_tpl->tpl_vars['template']->value;?>
/assets/img/logo.png" class="img-responsive" alt="<?php echo $_smarty_tpl->tpl_vars['blogtitle']->value;?>
"></a>
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
              <li <?php if ($_smarty_tpl->tpl_vars['filename']->value == 'homepage') {?>class="active"<?php }?>><a href="<?php if ($_smarty_tpl->tpl_vars['seourl']->value) {
echo $_smarty_tpl->tpl_vars['blogurl']->value;
} else { ?>index.php<?php }?>"><span class="fa fa-home"></span> <?php echo $_smarty_tpl->tpl_vars['BLANG']->value['home'];?>
</a></li>
              <li><a href="<?php echo $_smarty_tpl->tpl_vars['whmcsloginurl']->value;?>
"><span class="fa fa-bookmark"></span> <?php echo $_smarty_tpl->tpl_vars['BLANG']->value['clientarea'];?>
</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
              <?php if ($_smarty_tpl->tpl_vars['userlogin']->value) {?>
              <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-user"></span> <?php echo $_smarty_tpl->tpl_vars['BLANG']->value['hello'];?>
, <?php echo $_smarty_tpl->tpl_vars['userfirstname']->value;?>
! <span class="caret"></span></a>
                <ul class="dropdown-menu" role="menu">
                  <li><a href="<?php echo $_smarty_tpl->tpl_vars['systemurl']->value;?>
/clientarea.php?action=details"><i class="fa fa-pencil-square-o fa-fw"></i>&nbsp; <?php echo $_smarty_tpl->tpl_vars['BLANG']->value['editaccountdetails'];?>
</a></li>
                  <li><a href="<?php echo $_smarty_tpl->tpl_vars['systemurl']->value;?>
/clientarea.php?action=contacts"><i class="fa fa-users fa-fw"></i>&nbsp; <?php echo $_smarty_tpl->tpl_vars['BLANG']->value['contactssubaccounts'];?>
</a></li>
                  <li><a href="<?php echo $_smarty_tpl->tpl_vars['systemurl']->value;?>
/clientarea.php?action=emails"><i class="fa fa-envelope fa-fw"></i>&nbsp; <?php echo $_smarty_tpl->tpl_vars['BLANG']->value['emailhistory'];?>
</a></li>
                  <li><a href="<?php echo $_smarty_tpl->tpl_vars['systemurl']->value;?>
/clientarea.php?action=changepw"><i class="fa fa-key fa-fw"></i>&nbsp; <?php echo $_smarty_tpl->tpl_vars['BLANG']->value['changepassword'];?>
</a></li>
                  <li class="divider"></li>
                  <li><a href="<?php echo $_smarty_tpl->tpl_vars['systemurl']->value;?>
/logout.php"><i class="fa fa-power-off fa-fw"></i>&nbsp; <?php echo $_smarty_tpl->tpl_vars['BLANG']->value['logout'];?>
</a></li>
                </ul>
              </li>
              <?php } else { ?>
              <li><a href="<?php echo $_smarty_tpl->tpl_vars['whmcsloginurl']->value;?>
"><span class="glyphicon glyphicon-user"></span> <?php echo $_smarty_tpl->tpl_vars['BLANG']->value['account'];?>
</a></li>
              <?php }?>
            </ul>
          </div>
        </div>
      </nav>
<?php }
}
