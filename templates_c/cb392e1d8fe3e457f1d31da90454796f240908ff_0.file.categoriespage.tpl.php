<?php
/* Smarty version 3.1.48, created on 2024-09-01 16:03:43
  from '/home/tublat/public_html/blog/templates/default/categoriespage.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.48',
  'unifunc' => 'content_66d4905f824a60_59072806',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'cb392e1d8fe3e457f1d31da90454796f240908ff' => 
    array (
      0 => '/home/tublat/public_html/blog/templates/default/categoriespage.tpl',
      1 => 1725195523,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:sidebar.tpl' => 1,
  ),
),false)) {
function content_66d4905f824a60_59072806 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'/home/tublat/public_html/vendor/smarty/smarty/libs/plugins/modifier.truncate.php','function'=>'smarty_modifier_truncate',),));
?>
      <div class="row">
        <div class="col-md-9">
				  <div class="blog-posts">
            <ol class="breadcrumb">
              <li><a href="<?php if ($_smarty_tpl->tpl_vars['seourl']->value) {
echo $_smarty_tpl->tpl_vars['blogurl']->value;
} else { ?>index.php<?php }?>"><?php echo $_smarty_tpl->tpl_vars['BLANG']->value['home'];?>
</a></li>
              <li class="active"><?php echo $_smarty_tpl->tpl_vars['pagetitle']->value;?>
</li>
            </ol>
				  <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['articles']->value, 'article', false, 'num');
$_smarty_tpl->tpl_vars['article']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['num']->value => $_smarty_tpl->tpl_vars['article']->value) {
$_smarty_tpl->tpl_vars['article']->do_else = false;
?>
					  <article class="post post-large">
						  <?php if ($_smarty_tpl->tpl_vars['article']->value['image']) {?>
						  <div class="post-image single">
							  <a href="<?php if ($_smarty_tpl->tpl_vars['seourl']->value) {
echo $_smarty_tpl->tpl_vars['article']->value['posturl'];?>
.html<?php } else { ?>index.php?p=post&display=<?php echo $_smarty_tpl->tpl_vars['article']->value['posturl'];
}?>"><img class="img-thumbnail" src="index.php?p=getimg&id=<?php echo $_smarty_tpl->tpl_vars['article']->value['id'];?>
" alt=""></a>
							</div>
							<?php }?>
							<div class="post-date">
							  <span class="day"><?php echo $_smarty_tpl->tpl_vars['article']->value['day'];?>
</span>
								<span class="month"><?php echo $_smarty_tpl->tpl_vars['article']->value['month'];?>
</span>
							</div>
							<div class="post-content">

							  <h3><a href="<?php if ($_smarty_tpl->tpl_vars['seourl']->value) {
echo $_smarty_tpl->tpl_vars['article']->value['posturl'];?>
.html<?php } else { ?>index.php?p=post&display=<?php echo $_smarty_tpl->tpl_vars['article']->value['posturl'];
}?>"><?php echo $_smarty_tpl->tpl_vars['article']->value['title'];?>
</a></h3>
								<p><?php echo smarty_modifier_truncate(preg_replace('!<[^>]*?>!', ' ', $_smarty_tpl->tpl_vars['article']->value['contents']),$_smarty_tpl->tpl_vars['truncate']->value," [...]");?>
</p>
								<div class="post-meta">
								  <?php if ($_smarty_tpl->tpl_vars['visitorcounter']->value) {?><span><i class="fa fa-users"></i> <?php echo $_smarty_tpl->tpl_vars['article']->value['visitors'];?>
 <?php echo $_smarty_tpl->tpl_vars['BLANG']->value['visit'];?>
</span><?php }?>
									<?php if ($_smarty_tpl->tpl_vars['article']->value['tags']) {?>
									<span><i class="fa fa-tag"></i>
									<?php
$__section_tag_0_loop = (is_array(@$_loop=$_smarty_tpl->tpl_vars['article']->value['tags']) ? count($_loop) : max(0, (int) $_loop));
$__section_tag_0_total = min(($__section_tag_0_loop - 0), 5);
$_smarty_tpl->tpl_vars['__smarty_section_tag'] = new Smarty_Variable(array());
if ($__section_tag_0_total !== 0) {
for ($__section_tag_0_iteration = 1, $_smarty_tpl->tpl_vars['__smarty_section_tag']->value['index'] = 0; $__section_tag_0_iteration <= $__section_tag_0_total; $__section_tag_0_iteration++, $_smarty_tpl->tpl_vars['__smarty_section_tag']->value['index']++){
?>
									 <a href="<?php if ($_smarty_tpl->tpl_vars['seourl']->value) {?>tag/results/<?php echo $_smarty_tpl->tpl_vars['article']->value['tags'][(isset($_smarty_tpl->tpl_vars['__smarty_section_tag']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_tag']->value['index'] : null)]['tagurl'];
} else { ?>index.php?p=search&search=<?php echo $_smarty_tpl->tpl_vars['article']->value['tags'][(isset($_smarty_tpl->tpl_vars['__smarty_section_tag']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_tag']->value['index'] : null)]['tagurl'];
}?>"><?php echo $_smarty_tpl->tpl_vars['article']->value['tags'][(isset($_smarty_tpl->tpl_vars['__smarty_section_tag']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_tag']->value['index'] : null)]['tag'];?>
</a>,
									<?php
}
}
?>
									</span>
									<?php }?>
									<?php if ($_smarty_tpl->tpl_vars['commentscounter']->value) {?><span><i class="fa fa-comments"></i> <?php echo $_smarty_tpl->tpl_vars['article']->value['comments'];?>
 <?php echo $_smarty_tpl->tpl_vars['BLANG']->value['comments'];?>
</span><?php }?>
									<?php if (strlen($_smarty_tpl->tpl_vars['article']->value['contents']) > $_smarty_tpl->tpl_vars['truncate']->value) {?><a href="<?php if ($_smarty_tpl->tpl_vars['seourl']->value) {
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
</strong> <?php echo $_smarty_tpl->tpl_vars['BLANG']->value['therearenoarticleinthiscategory'];?>
</div>
				   <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
          </div>
          <ul class="pagination" style="margin-top:-25px;">
           <?php echo $_smarty_tpl->tpl_vars['pagination']->value;?>

          </ul>
        </div>
        <div class="col-md-3">
          <?php $_smarty_tpl->_subTemplateRender("file:sidebar.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('index'=>'home'), 0, false);
?>
        </div>
      </div>
<?php }
}
