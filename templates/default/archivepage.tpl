      <div class="row">
        <div class="col-md-9">
          <ol class="breadcrumb">
            <li><a href="{if $seourl}{$blogurl}{else}index.php{/if}">{$BLANG.home}</a></li>
            <li class="active">{$BLANG.archive}</li>
          </ol>
				  <div class="blog-posts">
				  {foreach key=num item=article from=$articles}
					  <article class="post post-large" style="margin-left: 0;">
							<div class="post-content">
							  <h3><a href="{if $seourl}{$article.posturl}.html{else}index.php?p=post&display={$article.posturl}{/if}">{$article.title}</a></h3>
								<p>{$article.contents|strip_tags|truncate:350:" [...]"}</p>
								<div class="post-meta">
								  <span><i class="fa fa-clock-o"></i> {$article.date|replace:'-':$BLANG.at}</span>
								  {if $visitorcounter}<span><i class="fa fa-users"></i> {$article.visitors} {$BLANG.visit}</span>{/if}
									{if $commentscounter}<span><i class="fa fa-comments"></i> {$article.comments} {$BLANG.comments}</span>{/if}
									{if strlen($article.contents)>350}<a href="{if $seourl}{$article.posturl}.html{else}index.php?p=post&display={$article.posturl}{/if}" class="btn btn-xs btn-primary pull-right">{$BLANG.readmore}</a>{/if}
								</div>
							</div>
						</article>
					 {foreachelse}
					 <div class="alert alert-info" role="alert"><i class="fa fa-info-circle"></i> <strong>{$BLANG.nothingfound}</strong> {$BLANG.therearenoarticleinthisarchive}</div>
				   {/foreach}
          </div>
        </div>
        <div class="col-md-3">
          {include file="sidebar.tpl" index=archive}
        </div>
      </div>
