<?php
/* Smarty version 3.1.48, created on 2024-09-01 13:08:01
  from '/home/tublat/public_html/blog/templates/default/postspage.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.48',
  'unifunc' => 'content_66d4673131c393_04172735',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'a436681be052fecbe749d9db4b1725af8999a071' => 
    array (
      0 => '/home/tublat/public_html/blog/templates/default/postspage.tpl',
      1 => 1725195524,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:sidebar.tpl' => 1,
  ),
),false)) {
function content_66d4673131c393_04172735 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'/home/tublat/public_html/vendor/smarty/smarty/libs/plugins/modifier.replace.php','function'=>'smarty_modifier_replace',),));
?>
      <div class="row">
        <div class="col-md-9">
          <div class="blog-posts single-post">
            <ol class="breadcrumb">
              <li><a href="<?php if ($_smarty_tpl->tpl_vars['seourl']->value) {
echo $_smarty_tpl->tpl_vars['blogurl']->value;
} else { ?>index.php<?php }?>"><?php echo $_smarty_tpl->tpl_vars['BLANG']->value['home'];?>
</a></li>
              <li><a href="<?php if ($_smarty_tpl->tpl_vars['seourl']->value) {
echo $_smarty_tpl->tpl_vars['caturl']->value;
} else { ?>index.php?c=category&display=<?php echo $_smarty_tpl->tpl_vars['caturl']->value;
}?>"><?php echo $_smarty_tpl->tpl_vars['catname']->value;?>
</a></li>
              <li class="active"><?php echo $_smarty_tpl->tpl_vars['title']->value;?>
</li>
            </ol>
						<article class="post post-large blog-single-post">
						  <?php if ($_smarty_tpl->tpl_vars['image']->value) {?>
						  <div class="post-image single">
							  <img class="img-thumbnail" src="index.php?p=getimg&id=<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
" alt="">
							</div>
							<?php }?>
							<div class="post-date">
								<span class="day"><?php echo $_smarty_tpl->tpl_vars['day']->value;?>
</span>
								<span class="month"><?php echo $_smarty_tpl->tpl_vars['month']->value;?>
</span>
							</div>
							<div class="post-content">
								<h3><?php echo $_smarty_tpl->tpl_vars['title']->value;?>
</h3>
								<div class="post-meta">
								  <?php if ($_smarty_tpl->tpl_vars['visitorcounter']->value) {?><span><i class="fa fa-users"></i> <?php echo $_smarty_tpl->tpl_vars['visitors']->value;?>
 <?php echo $_smarty_tpl->tpl_vars['BLANG']->value['visit'];?>
</span><?php }?>
									<?php if ($_smarty_tpl->tpl_vars['tags']->value) {?>
									<span><i class="fa fa-tag"></i>
									<?php
$__section_tag_0_loop = (is_array(@$_loop=$_smarty_tpl->tpl_vars['tags']->value) ? count($_loop) : max(0, (int) $_loop));
$__section_tag_0_total = min(($__section_tag_0_loop - 0), 5);
$_smarty_tpl->tpl_vars['__smarty_section_tag'] = new Smarty_Variable(array());
if ($__section_tag_0_total !== 0) {
for ($__section_tag_0_iteration = 1, $_smarty_tpl->tpl_vars['__smarty_section_tag']->value['index'] = 0; $__section_tag_0_iteration <= $__section_tag_0_total; $__section_tag_0_iteration++, $_smarty_tpl->tpl_vars['__smarty_section_tag']->value['index']++){
?>
									 <a href="<?php if ($_smarty_tpl->tpl_vars['seourl']->value) {?>tag/results/<?php echo $_smarty_tpl->tpl_vars['tags']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_tag']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_tag']->value['index'] : null)]['tagurl'];
} else { ?>index.php?p=search&search=<?php echo $_smarty_tpl->tpl_vars['tags']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_tag']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_tag']->value['index'] : null)]['tagurl'];
}?>"><?php echo $_smarty_tpl->tpl_vars['tags']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_tag']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_tag']->value['index'] : null)]['tag'];?>
</a>,
									<?php
}
}
?>
									</span>
									<?php }?>
									<?php if ($_smarty_tpl->tpl_vars['commentscounter']->value) {?><span><i class="fa fa-comments"></i> <?php echo $_smarty_tpl->tpl_vars['comcount']->value;?>
 <?php echo $_smarty_tpl->tpl_vars['BLANG']->value['comments'];?>
</span><?php }?>
								</div>
								<?php echo $_smarty_tpl->tpl_vars['contents']->value;?>

                <?php if ($_smarty_tpl->tpl_vars['addthis']->value) {?>
								<div class="post-block post-share">
							    <h4><i class="fa fa-share"></i><?php echo $_smarty_tpl->tpl_vars['BLANG']->value['sharethispost'];?>
</h4>
                  <!-- AddThis Button BEGIN -->
                  <div class="addthis_toolbox addthis_default_style addthis_32x32_style">
                    <a class="addthis_button_preferred_1"></a>
                    <a class="addthis_button_preferred_2"></a>
                    <a class="addthis_button_preferred_3"></a>
                    <a class="addthis_button_preferred_4"></a>
                    <a class="addthis_button_compact"></a>
                    <a class="addthis_counter addthis_bubble_style"></a>
                  </div>
                  <?php echo '<script'; ?>
 type="text/javascript">
                    var addthis_config = addthis_config||{};
                    addthis_config.data_track_addressbar = false;
                  <?php echo '</script'; ?>
>
                  <?php echo '<script'; ?>
 type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=<?php echo $_smarty_tpl->tpl_vars['Profileid']->value;?>
"><?php echo '</script'; ?>
>
                  <!-- AddThis Button END -->
								</div>
                <?php }?>
								<div class="post-block post-comments clearfix">
									<h4><i class="fa fa-comments"></i><?php echo $_smarty_tpl->tpl_vars['BLANG']->value['comments'];?>
 (<?php echo $_smarty_tpl->tpl_vars['comcount']->value;?>
)</h4>
									<ul class="comments">
									<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['comments']->value, 'comnt', false, 'num');
$_smarty_tpl->tpl_vars['comnt']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['num']->value => $_smarty_tpl->tpl_vars['comnt']->value) {
$_smarty_tpl->tpl_vars['comnt']->do_else = false;
?>
										<li>
											<div class="comment">
												<div class="img-thumbnail">
													<img class="avatar" alt="<?php echo $_smarty_tpl->tpl_vars['comnt']->value['name'];?>
" src="<?php echo $_smarty_tpl->tpl_vars['comnt']->value['avatar'];?>
">
												</div>
												<div class="comment-block<?php if (!$_smarty_tpl->tpl_vars['comnt']->value['status']) {?>-approve<?php }?>">
													<div class="comment-arrow<?php if (!$_smarty_tpl->tpl_vars['comnt']->value['status']) {?>-approve<?php }?>"></div>
													<span class="comment-by">
														<strong><?php echo $_smarty_tpl->tpl_vars['comnt']->value['name'];?>
</strong>
														<?php if ($_smarty_tpl->tpl_vars['adminlogin']->value) {?>
														<span class="pull-right">
															<a href="https://www.geoiptool.com/en/?IP=<?php echo $_smarty_tpl->tpl_vars['comnt']->value['ip'];?>
" target="_blank" class="btn btn-default btn-xs" data-toggle="tooltip" title="<?php echo $_smarty_tpl->tpl_vars['comnt']->value['ip'];?>
"><strong>IP</strong></a>
															<a href="#" onclick="return false;" class="btn btn-info btn-xs" data-toggle="tooltip" title="<?php echo $_smarty_tpl->tpl_vars['comnt']->value['email'];?>
"><i class="fa fa-envelope"></i></a>
															<a href="<?php echo $_SERVER['PHP_SELF'];?>
?p=post&display=<?php echo $_smarty_tpl->tpl_vars['posturl']->value;?>
&a=banned&id=<?php echo $_smarty_tpl->tpl_vars['comnt']->value['id'];?>
&ip=<?php echo $_smarty_tpl->tpl_vars['comnt']->value['ip'];?>
" class="btn btn-warning btn-xs" data-toggle="tooltip" title="<?php echo $_smarty_tpl->tpl_vars['BLANG']->value['banned'];?>
"><i class="fa fa-ban"></i></a>
															<a href="#edit<?php echo $_smarty_tpl->tpl_vars['comnt']->value['id'];?>
" role="tab" data-toggle="tab" data-tooltip="tooltip" class="btn btn-primary btn-xs" title="<?php echo $_smarty_tpl->tpl_vars['BLANG']->value['edit'];?>
"><i class="fa fa-pencil-square-o"></i></a>
															<a href="<?php echo $_SERVER['PHP_SELF'];?>
?p=post&display=<?php echo $_smarty_tpl->tpl_vars['posturl']->value;?>
&a=approve&id=<?php echo $_smarty_tpl->tpl_vars['comnt']->value['id'];?>
" class="btn btn-success btn-xs" data-toggle="tooltip" title="<?php echo $_smarty_tpl->tpl_vars['BLANG']->value['approve'];?>
"><i class="fa fa-check-square-o"></i></a>
															<a href="<?php echo $_SERVER['PHP_SELF'];?>
?p=post&display=<?php echo $_smarty_tpl->tpl_vars['posturl']->value;?>
&a=delete&id=<?php echo $_smarty_tpl->tpl_vars['comnt']->value['id'];?>
" class="btn btn-danger btn-xs" data-toggle="tooltip" title="<?php echo $_smarty_tpl->tpl_vars['BLANG']->value['delete'];?>
"><i class="fa fa-trash"></i></a>
														</span>
														<?php }?>
													</span>
													<?php if ($_smarty_tpl->tpl_vars['adminlogin']->value) {?>
													<div class="tab-content">
													  <div class="tab-pane active" id="comment<?php echo $_smarty_tpl->tpl_vars['comnt']->value['id'];?>
">
													    <p style="margin: 10px 0;"><?php echo $_smarty_tpl->tpl_vars['comnt']->value['comments'];?>
</p>
													  </div>
													  <div class="tab-pane" id="edit<?php echo $_smarty_tpl->tpl_vars['comnt']->value['id'];?>
">
														  <form action="index.php?p=post&display=<?php echo $_smarty_tpl->tpl_vars['posturl']->value;?>
&a=editcomment&id=<?php echo $_smarty_tpl->tpl_vars['comnt']->value['id'];?>
" method="POST" class="form-horizontal" role="form">
                                <div class="form-group" style="margin-top: 15px;">
                                  <div class="col-md-12">
                                    <textarea name="editcomnt" class="form-control" rows="5"><?php echo $_smarty_tpl->tpl_vars['comnt']->value['comments'];?>
</textarea>
                                  </div>
                                </div>
                                <button type="submit" name="save" class="btn btn-success btn-sm"><span class="fa fa-check"></span> <?php echo $_smarty_tpl->tpl_vars['BLANG']->value['savechanges'];?>
</button>
                                <a href="#comment<?php echo $_smarty_tpl->tpl_vars['comnt']->value['id'];?>
" data-toggle="tab" class="btn btn-default btn-sm"><span class="fa fa-times"></span> <?php echo $_smarty_tpl->tpl_vars['BLANG']->value['cancel'];?>
</a>
														  </form>
													  </div>
													</div>
													<?php } else { ?>
													  <p style="margin: 10px 0;"><?php echo $_smarty_tpl->tpl_vars['comnt']->value['comments'];?>
</p>
													<?php }?>
													<span class="date pull-right"><?php echo smarty_modifier_replace($_smarty_tpl->tpl_vars['comnt']->value['date'],'-',$_smarty_tpl->tpl_vars['BLANG']->value['at']);?>
</span>
												</div>
											</div>
										</li>
									<?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
									</ul>
								</div>
								<?php if ($_smarty_tpl->tpl_vars['allowcomments']->value) {?>
							  <div class="post-block post-leave-comment" id="submited">
								  <h3><?php echo $_smarty_tpl->tpl_vars['BLANG']->value['leaveacomment'];?>
</h3><br>
								  <?php if ($_smarty_tpl->tpl_vars['errormessage']->value) {?>
								  <div class="alert alert-danger" role="alert">
								    <strong><i class="fa fa-times-circle"></i> <?php echo $_smarty_tpl->tpl_vars['BLANG']->value['thefollowingerrorsoccurred'];?>
</strong>
								    <ul>
								      <?php echo $_smarty_tpl->tpl_vars['errormessage']->value;?>

								    </ul>
								  </div>
								  <?php }?>
								  <?php if ($_smarty_tpl->tpl_vars['commentmsg']->value == 'success') {?>
								  <div class="alert alert-success" role="alert">
								    <i class="fa fa-check-circle"></i> <?php echo $_smarty_tpl->tpl_vars['BLANG']->value['commenthasbeenadded'];?>

								  </div>
								  <?php }?>
								  <?php if ($_smarty_tpl->tpl_vars['commentmsg']->value == 'warning') {?>
								  <div class="alert alert-warning" role="alert">
								    <i class="fa fa-exclamation-triangle"></i> <?php echo $_smarty_tpl->tpl_vars['BLANG']->value['commentawaitingadminapproval'];?>

								  </div>
								  <?php }?>
									<form action="index.php?p=post&display=<?php echo $_smarty_tpl->tpl_vars['posturl']->value;?>
&a=comment&id=<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
" method="POST">
                    <input type="hidden" name="title" value="<?php echo $_smarty_tpl->tpl_vars['title']->value;?>
" />
										<div class="row">
										  <div class="form-group">
											  <div class="col-md-6">
													<label><?php echo $_smarty_tpl->tpl_vars['BLANG']->value['yourname'];?>
 *</label>
													<input type="text" maxlength="100" class="form-control" name="name" value="<?php if ($_smarty_tpl->tpl_vars['loggedin']->value) {
echo $_smarty_tpl->tpl_vars['userfirstname']->value;
} else {
echo $_smarty_tpl->tpl_vars['name']->value;
}?>" id="name">
												</div>
												<div class="col-md-6">
													<label><?php echo $_smarty_tpl->tpl_vars['BLANG']->value['youremailaddress'];?>
 *</label>
													<input type="email" maxlength="100" class="form-control" name="email" value="<?php if ($_smarty_tpl->tpl_vars['loggedin']->value) {
echo $_smarty_tpl->tpl_vars['useremail']->value;
} else {
echo $_smarty_tpl->tpl_vars['email']->value;
}?>" id="email">
												</div>
										  </div>
										</div>
										<div class="row">
											<div class="form-group">
												<div class="col-md-12">
													<label><?php echo $_smarty_tpl->tpl_vars['BLANG']->value['comment'];?>
 *</label>
													<textarea maxlength="5000" rows="10" class="form-control" name="comment" id="comment"><?php echo $_smarty_tpl->tpl_vars['comment']->value;?>
</textarea>
												</div>
											</div>
										</div>
										<?php if ($_smarty_tpl->tpl_vars['publicKey']->value) {?>
										<div class="row">
											<div class="col-md-12">
											  <?php echo '<script'; ?>
 src="https://www.google.com/recaptcha/api.js?hl=<?php echo $_smarty_tpl->tpl_vars['BLANG']->value['isocode'];?>
"><?php echo '</script'; ?>
>
                        <center><div class="g-recaptcha" data-sitekey="<?php echo $_smarty_tpl->tpl_vars['publicKey']->value;?>
"></div></center>
											</div>
										</div>
										<?php }?>
										<div class="row">
											<div class="col-md-12" style="padding-top: 15px;">
												<button type="submit" class="btn btn-primary"><i class="fa fa-check-square-o"></i> <?php echo $_smarty_tpl->tpl_vars['BLANG']->value['postcomment'];?>
</button>
											</div>
										</div>
									</form>
							  </div>
							  <?php } else { ?>
							  <div class="post-block post-leave-comment">
							  <div class="alert alert-warning text-center" role="alert"><?php echo $_smarty_tpl->tpl_vars['commentserrormessage']->value;?>
</div>
							  </div>
							  <?php }?>
						  </div>
					  </article>
          </div>
        </div>
        <div class="col-md-3">
          <?php $_smarty_tpl->_subTemplateRender("file:sidebar.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('catid'=>$_smarty_tpl->tpl_vars['catid']->value), 0, false);
?>
        </div>
      </div>
<?php }
}
