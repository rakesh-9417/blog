<?php
/* Smarty version 3.1.48, created on 2024-09-17 16:32:02
  from '/home/tublat/public_html/blog/templates/default/archivepage.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.48',
  'unifunc' => 'content_66e9af025455d6_88788647',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'c49e8303898a9a1a5a2eaca8078dd1cad8acf261' => 
    array (
      0 => '/home/tublat/public_html/blog/templates/default/archivepage.tpl',
      1 => 1725195523,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:sidebar.tpl' => 1,
  ),
),false)) {
function content_66e9af025455d6_88788647 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'/home/tublat/public_html/vendor/smarty/smarty/libs/plugins/modifier.truncate.php','function'=>'smarty_modifier_truncate',),1=>array('file'=>'/home/tublat/public_html/vendor/smarty/smarty/libs/plugins/modifier.replace.php','function'=>'smarty_modifier_replace',),));
?>
      <div class="row">
        <div class="col-md-9">
          <ol class="breadcrumb">
            <li><a href="<?php if ($_smarty_tpl->tpl_vars['seourl']->value) {
echo $_smarty_tpl->tpl_vars['blogurl']->value;
} else { ?>index.php<?php }?>"><?php echo $_smarty_tpl->tpl_vars['BLANG']->value['home'];?>
</a></li>
            <li class="active"><?php echo $_smarty_tpl->tpl_vars['BLANG']->value['archive'];?>
</li>
          </ol>
				  <div class="blog-posts">
				  <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['articles']->value, 'article', false, 'num');
$_smarty_tpl->tpl_vars['article']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['num']->value => $_smarty_tpl->tpl_vars['article']->value) {
$_smarty_tpl->tpl_vars['article']->do_else = false;
?>
					  <article class="post post-large" style="margin-left: 0;">
							<div class="post-content">
							  <h3><a href="<?php if ($_smarty_tpl->tpl_vars['seourl']->value) {
echo $_smarty_tpl->tpl_vars['article']->value['posturl'];?>
.html<?php } else { ?>index.php?p=post&display=<?php echo $_smarty_tpl->tpl_vars['article']->value['posturl'];
}?>"><?php echo $_smarty_tpl->tpl_vars['article']->value['title'];?>
</a></h3>
								<p><?php echo smarty_modifier_truncate(preg_replace('!<[^>]*?>!', ' ', $_smarty_tpl->tpl_vars['article']->value['contents']),350," [...]");?>
</p>
								<div class="post-meta">
								  <span><i class="fa fa-clock-o"></i> <?php echo smarty_modifier_replace($_smarty_tpl->tpl_vars['article']->value['date'],'-',$_smarty_tpl->tpl_vars['BLANG']->value['at']);?>
</span>
								  <?php if ($_smarty_tpl->tpl_vars['visitorcounter']->value) {?><span><i class="fa fa-users"></i> <?php echo $_smarty_tpl->tpl_vars['article']->value['visitors'];?>
 <?php echo $_smarty_tpl->tpl_vars['BLANG']->value['visit'];?>
</span><?php }?>
									<?php if ($_smarty_tpl->tpl_vars['commentscounter']->value) {?><span><i class="fa fa-comments"></i> <?php echo $_smarty_tpl->tpl_vars['article']->value['comments'];?>
 <?php echo $_smarty_tpl->tpl_vars['BLANG']->value['comments'];?>
</span><?php }?>
									<?php if (strlen($_smarty_tpl->tpl_vars['article']->value['contents']) > 350) {?><a href="<?php if ($_smarty_tpl->tpl_vars['seourl']->value) {
echo $_smarty_tpl->tpl_vars['article']->value['posturl'];?>
.html<?php } else { ?>index.php?p=post&display=<?php echo $_smarty_tpl->tpl_vars['article']->value['posturl'];
}?>" class="btn btn-xs btn-primary pull-right"><?php echo $_smarty_tpl->tpl_vars['BLANG']->value['readmore'];?>
</a><?php }?>
								</div>
							</div>
						</article>
					 <?php
}
if ($_smarty_tpl->tpl_vars['article']->do_else) {
?>
					 <div class="alert alert-info" role="alert"><i class="fa fa-info-circle"></i> <strong><?php echo $_smarty_tpl->tpl_vars['BLANG']->value['nothingfound'];?>
</strong> <?php echo $_smarty_tpl->tpl_vars['BLANG']->value['therearenoarticleinthisarchive'];?>
</div>
				   <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
          </div>
        </div>
        <div class="col-md-3">
          <?php $_smarty_tpl->_subTemplateRender("file:sidebar.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('index'=>'archive'), 0, false);
?>
        </div>
      </div>
<?php }
}
