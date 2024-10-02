<?php
/* Smarty version 3.1.48, created on 2024-09-01 13:07:45
  from '/home/tublat/public_html/blog/templates/default/footer.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.48',
  'unifunc' => 'content_66d467215f6cc8_97519191',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'ca7c9c72a23a12c43313d1b5be15acd032c5f6c2' => 
    array (
      0 => '/home/tublat/public_html/blog/templates/default/footer.tpl',
      1 => 1725195523,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_66d467215f6cc8_97519191 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'/home/tublat/public_html/vendor/smarty/smarty/libs/plugins/modifier.replace.php','function'=>'smarty_modifier_replace',),));
?>
    </div>
    <div class="footer">
      <div class="container-fluid footer-bg">
        <div class="container" style="padding:15px 0;">
          <div class="row">
            <div class="col-md-6" style="color: #FFF; padding-top:10px;">
            &copy; <?php echo smarty_modifier_replace($_smarty_tpl->tpl_vars['BLANG']->value['copyright'],'%year%',$_smarty_tpl->tpl_vars['date_year']->value);?>

            </div>
            <div class="col-md-6">
              <div class="pull-right">
                <?php if ($_smarty_tpl->tpl_vars['facebook']->value) {?><a href="<?php echo $_smarty_tpl->tpl_vars['facebook']->value;?>
" class="btn btn-primary" role="button" target="_blank"><i class="fa fa-facebook fa-lg"></i></a><?php }?>
                <?php if ($_smarty_tpl->tpl_vars['twitter']->value) {?><a href="<?php echo $_smarty_tpl->tpl_vars['twitter']->value;?>
" class="btn btn-info" role="button" target="_blank"><i class="fa fa-tumblr fa-lg"></i></a><?php }?>
                <?php if ($_smarty_tpl->tpl_vars['google']->value) {?><a href="<?php echo $_smarty_tpl->tpl_vars['google']->value;?>
" class="btn btn-danger" role="button" target="_blank"><i class="fa fa-google-plus fa-lg"></i></a><?php }?>
                <a href="<?php if ($_smarty_tpl->tpl_vars['rss']->value) {
echo $_smarty_tpl->tpl_vars['rss']->value;
} else {
if ($_smarty_tpl->tpl_vars['seourl']->value) {?>feeds/rss<?php } else { ?>index.php?p=rss<?php }
}?>" class="btn btn-warning" role="button" target="_blank"><i class="fa fa-rss fa-lg"></i></a>
                <a href="<?php if ($_smarty_tpl->tpl_vars['sitemap']->value) {
echo $_smarty_tpl->tpl_vars['sitemap']->value;
} else {
if ($_smarty_tpl->tpl_vars['seourl']->value) {?>sitemap.xml<?php } else { ?>index.php?p=sitemap<?php }
}?>" class="btn btn-default" role="button" target="_blank"><i class="fa fa-sitemap fa-lg"></i></a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <?php if ($_smarty_tpl->tpl_vars['trackingcode']->value) {?>
    <?php echo '<script'; ?>
>
      (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
      (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
      m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
      })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

      ga('create', '<?php echo $_smarty_tpl->tpl_vars['trackingcode']->value;?>
', 'auto');
      ga('send', 'pageview');
    <?php echo '</script'; ?>
>
    <?php }?>
  </body>
</html>
<?php }
}
