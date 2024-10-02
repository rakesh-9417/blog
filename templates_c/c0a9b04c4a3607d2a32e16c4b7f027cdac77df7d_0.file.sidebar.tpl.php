<?php
/* Smarty version 3.1.48, created on 2024-09-01 13:07:45
  from '/home/tublat/public_html/blog/templates/default/sidebar.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.48',
  'unifunc' => 'content_66d467215f1b03_40556847',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'c0a9b04c4a3607d2a32e16c4b7f027cdac77df7d' => 
    array (
      0 => '/home/tublat/public_html/blog/templates/default/sidebar.tpl',
      1 => 1725195524,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_66d467215f1b03_40556847 (Smarty_Internal_Template $_smarty_tpl) {
?><form action="<?php if ($_smarty_tpl->tpl_vars['seourl']->value) {?>search/results<?php } else { ?>index.php?p=search<?php }?>" method="POST" role="form">
  <div class="input-group">
    <input type="text" name="search" class="form-control" placeholder="<?php echo $_smarty_tpl->tpl_vars['BLANG']->value['search'];?>
">
    <span class="input-group-btn">
      <button class="btn btn-default" type="submit"><span class="fa fa-search"></span></button>
    </span>
  </div>
</form>
<hr />
<h3><?php echo $_smarty_tpl->tpl_vars['BLANG']->value['categories'];?>
</h3>
  <ul class="nav nav-list primary push-bottom">
    <li><a href="<?php if ($_smarty_tpl->tpl_vars['seourl']->value) {
echo $_smarty_tpl->tpl_vars['blogurl']->value;
} else { ?>index.php<?php }?>"><?php echo $_smarty_tpl->tpl_vars['BLANG']->value['home'];?>
</a></li>
  <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['categories']->value, 'cats', false, 'num');
$_smarty_tpl->tpl_vars['cats']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['num']->value => $_smarty_tpl->tpl_vars['cats']->value) {
$_smarty_tpl->tpl_vars['cats']->do_else = false;
?>
    <li><a href="<?php if ($_smarty_tpl->tpl_vars['seourl']->value) {
echo $_smarty_tpl->tpl_vars['cats']->value['caturl'];
} else { ?>index.php?p=category&display=<?php echo $_smarty_tpl->tpl_vars['cats']->value['caturl'];
}?>"><?php echo $_smarty_tpl->tpl_vars['cats']->value['name'];?>
</a></li>
  <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
    <li><a href="<?php if ($_smarty_tpl->tpl_vars['rss']->value) {
echo $_smarty_tpl->tpl_vars['rss']->value;
} else {
if ($_smarty_tpl->tpl_vars['seourl']->value) {?>feeds/rss<?php } else { ?>index.php?p=rss<?php }
}?>"><?php echo $_smarty_tpl->tpl_vars['BLANG']->value['rss'];?>
</a></li>
  </ul>
<?php if ($_smarty_tpl->tpl_vars['subcategories']->value) {?>
<hr />
<h3><?php echo $_smarty_tpl->tpl_vars['BLANG']->value['subcategories'];?>
</h3>
  <ul class="nav nav-list primary push-bottom">
  <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['subcategories']->value, 'subcats', false, 'num');
$_smarty_tpl->tpl_vars['subcats']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['num']->value => $_smarty_tpl->tpl_vars['subcats']->value) {
$_smarty_tpl->tpl_vars['subcats']->do_else = false;
?>
    <li><a href="<?php if ($_smarty_tpl->tpl_vars['seourl']->value) {
echo $_smarty_tpl->tpl_vars['subcats']->value['caturl'];
} else { ?>index.php?p=category&display=<?php echo $_smarty_tpl->tpl_vars['subcats']->value['caturl'];
}?>"><?php echo $_smarty_tpl->tpl_vars['subcats']->value['name'];?>
</a></li>
  <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
  </ul>
<?php }
if ($_smarty_tpl->tpl_vars['archives']->value) {?>
<hr />
<h3><?php echo $_smarty_tpl->tpl_vars['BLANG']->value['archive'];?>
</h3>
  <ul class="nav nav-list primary push-bottom">
  <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['archives']->value, 'archive', false, 'num');
$_smarty_tpl->tpl_vars['archive']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['num']->value => $_smarty_tpl->tpl_vars['archive']->value) {
$_smarty_tpl->tpl_vars['archive']->do_else = false;
?>
    <li><a href="<?php if ($_smarty_tpl->tpl_vars['seourl']->value) {?>archive/<?php echo $_smarty_tpl->tpl_vars['archive']->value['year'];?>
/<?php echo $_smarty_tpl->tpl_vars['archive']->value['monthnum'];
} else { ?>index.php?p=archive&y=<?php echo $_smarty_tpl->tpl_vars['archive']->value['year'];?>
&m=<?php echo $_smarty_tpl->tpl_vars['archive']->value['monthnum'];
}?>"><?php echo $_smarty_tpl->tpl_vars['archive']->value['month'];?>
 <?php echo $_smarty_tpl->tpl_vars['archive']->value['year'];?>
</a></li>
  <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
  </ul>
<?php }
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['sidebars']->value, 'sidebar', false, 'num');
$_smarty_tpl->tpl_vars['sidebar']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['num']->value => $_smarty_tpl->tpl_vars['sidebar']->value) {
$_smarty_tpl->tpl_vars['sidebar']->do_else = false;
?>
<hr />
<?php echo $_smarty_tpl->tpl_vars['sidebar']->value['htmlcode'];?>

<?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);
}
}
