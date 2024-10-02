      <div class="row">
        <div class="col-md-9">
          <div class="blog-posts single-post">
            <ol class="breadcrumb">
              <li><a href="{if $seourl}{$blogurl}{else}index.php{/if}">{$BLANG.home}</a></li>
              <li><a href="{if $seourl}{$caturl}{else}index.php?c=category&display={$caturl}{/if}">{$catname}</a></li>
              <li class="active">{$title}</li>
            </ol>
						<article class="post post-large blog-single-post">
						  {if $image}
						  <div class="post-image single">
							  <img class="img-thumbnail" src="index.php?p=getimg&id={$id}" alt="">
							</div>
							{/if}
							<div class="post-date">
								<span class="day">{$day}</span>
								<span class="month">{$month}</span>
							</div>
							<div class="post-content">
								<h3>{$title}</h3>
								<div class="post-meta">
								  {if $visitorcounter}<span><i class="fa fa-users"></i> {$visitors} {$BLANG.visit}</span>{/if}
									{if $tags}
									<span><i class="fa fa-tag"></i>
									{section name=tag loop=$tags max=5}
									 <a href="{if $seourl}tag/results/{$tags[tag].tagurl}{else}index.php?p=search&search={$tags[tag].tagurl}{/if}">{$tags[tag].tag}</a>,
									{/section}
									</span>
									{/if}
									{if $commentscounter}<span><i class="fa fa-comments"></i> {$comcount} {$BLANG.comments}</span>{/if}
								</div>
								{$contents}
                {if $addthis}
								<div class="post-block post-share">
							    <h4><i class="fa fa-share"></i>{$BLANG.sharethispost}</h4>
                  <!-- AddThis Button BEGIN -->
                  <div class="addthis_toolbox addthis_default_style addthis_32x32_style">
                    <a class="addthis_button_preferred_1"></a>
                    <a class="addthis_button_preferred_2"></a>
                    <a class="addthis_button_preferred_3"></a>
                    <a class="addthis_button_preferred_4"></a>
                    <a class="addthis_button_compact"></a>
                    <a class="addthis_counter addthis_bubble_style"></a>
                  </div>
                  <script type="text/javascript">
                    var addthis_config = addthis_config||{};
                    addthis_config.data_track_addressbar = false;
                  </script>
                  <script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid={$Profileid}"></script>
                  <!-- AddThis Button END -->
								</div>
                {/if}
								<div class="post-block post-comments clearfix">
									<h4><i class="fa fa-comments"></i>{$BLANG.comments} ({$comcount})</h4>
									<ul class="comments">
									{foreach key=num item=comnt from=$comments}
										<li>
											<div class="comment">
												<div class="img-thumbnail">
													<img class="avatar" alt="{$comnt.name}" src="{$comnt.avatar}">
												</div>
												<div class="comment-block{if !$comnt.status}-approve{/if}">
													<div class="comment-arrow{if !$comnt.status}-approve{/if}"></div>
													<span class="comment-by">
														<strong>{$comnt.name}</strong>
														{if $adminlogin}
														<span class="pull-right">
															<a href="https://www.geoiptool.com/en/?IP={$comnt.ip}" target="_blank" class="btn btn-default btn-xs" data-toggle="tooltip" title="{$comnt.ip}"><strong>IP</strong></a>
															<a href="#" onclick="return false;" class="btn btn-info btn-xs" data-toggle="tooltip" title="{$comnt.email}"><i class="fa fa-envelope"></i></a>
															<a href="{$smarty.server.PHP_SELF}?p=post&display={$posturl}&a=banned&id={$comnt.id}&ip={$comnt.ip}" class="btn btn-warning btn-xs" data-toggle="tooltip" title="{$BLANG.banned}"><i class="fa fa-ban"></i></a>
															<a href="#edit{$comnt.id}" role="tab" data-toggle="tab" data-tooltip="tooltip" class="btn btn-primary btn-xs" title="{$BLANG.edit}"><i class="fa fa-pencil-square-o"></i></a>
															<a href="{$smarty.server.PHP_SELF}?p=post&display={$posturl}&a=approve&id={$comnt.id}" class="btn btn-success btn-xs" data-toggle="tooltip" title="{$BLANG.approve}"><i class="fa fa-check-square-o"></i></a>
															<a href="{$smarty.server.PHP_SELF}?p=post&display={$posturl}&a=delete&id={$comnt.id}" class="btn btn-danger btn-xs" data-toggle="tooltip" title="{$BLANG.delete}"><i class="fa fa-trash"></i></a>
														</span>
														{/if}
													</span>
													{if $adminlogin}
													<div class="tab-content">
													  <div class="tab-pane active" id="comment{$comnt.id}">
													    <p style="margin: 10px 0;">{$comnt.comments}</p>
													  </div>
													  <div class="tab-pane" id="edit{$comnt.id}">
														  <form action="index.php?p=post&display={$posturl}&a=editcomment&id={$comnt.id}" method="POST" class="form-horizontal" role="form">
                                <div class="form-group" style="margin-top: 15px;">
                                  <div class="col-md-12">
                                    <textarea name="editcomnt" class="form-control" rows="5">{$comnt.comments}</textarea>
                                  </div>
                                </div>
                                <button type="submit" name="save" class="btn btn-success btn-sm"><span class="fa fa-check"></span> {$BLANG.savechanges}</button>
                                <a href="#comment{$comnt.id}" data-toggle="tab" class="btn btn-default btn-sm"><span class="fa fa-times"></span> {$BLANG.cancel}</a>
														  </form>
													  </div>
													</div>
													{else}
													  <p style="margin: 10px 0;">{$comnt.comments}</p>
													{/if}
													<span class="date pull-right">{$comnt.date|replace:'-':$BLANG.at}</span>
												</div>
											</div>
										</li>
									{/foreach}
									</ul>
								</div>
								{if $allowcomments}
							  <div class="post-block post-leave-comment" id="submited">
								  <h3>{$BLANG.leaveacomment}</h3><br>
								  {if $errormessage}
								  <div class="alert alert-danger" role="alert">
								    <strong><i class="fa fa-times-circle"></i> {$BLANG.thefollowingerrorsoccurred}</strong>
								    <ul>
								      {$errormessage}
								    </ul>
								  </div>
								  {/if}
								  {if $commentmsg eq 'success'}
								  <div class="alert alert-success" role="alert">
								    <i class="fa fa-check-circle"></i> {$BLANG.commenthasbeenadded}
								  </div>
								  {/if}
								  {if $commentmsg eq 'warning'}
								  <div class="alert alert-warning" role="alert">
								    <i class="fa fa-exclamation-triangle"></i> {$BLANG.commentawaitingadminapproval}
								  </div>
								  {/if}
									<form action="index.php?p=post&display={$posturl}&a=comment&id={$id}" method="POST">
                    <input type="hidden" name="title" value="{$title}" />
										<div class="row">
										  <div class="form-group">
											  <div class="col-md-6">
													<label>{$BLANG.yourname} *</label>
													<input type="text" maxlength="100" class="form-control" name="name" value="{if $loggedin}{$userfirstname}{else}{$name}{/if}" id="name">
												</div>
												<div class="col-md-6">
													<label>{$BLANG.youremailaddress} *</label>
													<input type="email" maxlength="100" class="form-control" name="email" value="{if $loggedin}{$useremail}{else}{$email}{/if}" id="email">
												</div>
										  </div>
										</div>
										<div class="row">
											<div class="form-group">
												<div class="col-md-12">
													<label>{$BLANG.comment} *</label>
													<textarea maxlength="5000" rows="10" class="form-control" name="comment" id="comment">{$comment}</textarea>
												</div>
											</div>
										</div>
										{if $publicKey}
										<div class="row">
											<div class="col-md-12">
											  <script src="https://www.google.com/recaptcha/api.js?hl={$BLANG.isocode}"></script>
                        <center><div class="g-recaptcha" data-sitekey="{$publicKey}"></div></center>
											</div>
										</div>
										{/if}
										<div class="row">
											<div class="col-md-12" style="padding-top: 15px;">
												<button type="submit" class="btn btn-primary"><i class="fa fa-check-square-o"></i> {$BLANG.postcomment}</button>
											</div>
										</div>
									</form>
							  </div>
							  {else}
							  <div class="post-block post-leave-comment">
							  <div class="alert alert-warning text-center" role="alert">{$commentserrormessage}</div>
							  </div>
							  {/if}
						  </div>
					  </article>
          </div>
        </div>
        <div class="col-md-3">
          {include file="sidebar.tpl" catid=$catid}
        </div>
      </div>
