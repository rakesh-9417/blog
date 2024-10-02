      <div class="row">
        <div class="col-md-9">
				  <div class="blog-posts">
            <ol class="breadcrumb">
              <li><a href="{if $seourl}{$blogurl}{else}index.php{/if}">{$BLANG.home}</a></li>
              <li class="active">{$pagetitle}</li>
            </ol>
				  {foreach key=num item=article from=$articles}
					  <article class="post post-large">
						  {if $article.image}
						  <div class="post-image single">
							  <a href="{if $seourl}{$article.posturl}.html{else}index.php?p=post&display={$article.posturl}{/if}"><img class="img-thumbnail" src="index.php?p=getimg&id={$article.id}" alt=""></a>
							</div>
							{/if}
							<div class="post-date">
							  <span class="day">{$article.day}</span>
								<span class="month">{$article.month}</span>
							</div>
							<div class="post-content">

							  <h3><a href="{if $seourl}{$article.posturl}.html{else}index.php?p=post&display={$article.posturl}{/if}">{$article.title}</a></h3>
								<p>{$article.contents|strip_tags|truncate:$truncate:" [...]"}</p>
								<div class="post-meta">
								  {if $visitorcounter}<span><i class="fa fa-users"></i> {$article.visitors} {$BLANG.visit}</span>{/if}
									{if $article.tags}
									<span><i class="fa fa-tag"></i>
									{section name=tag loop=$article.tags max=5}
									 <a href="{if $seourl}tag/results/{$article.tags[tag].tagurl}{else}index.php?p=search&search={$article.tags[tag].tagurl}{/if}">{$article.tags[tag].tag}</a>,
									{/section}
									</span>
									{/if}
									{if $commentscounter}<span><i class="fa fa-comments"></i> {$article.comments} {$BLANG.comments}</span>{/if}
									{if strlen($article.contents)>$truncate}<a href="{if $seourl}{$article.posturl}.html{else}index.php?p=post&display={$article.posturl}{/if}" class="btn btn-xs btn-primary pull-right">{$BLANG.readmore}</a>{/if}
								</div>
							</div>
						</article>
					 {foreachelse}
					 <div class="alert alert-info" role="alert"><i class="fa fa-info-circle"></i> <strong>{$BLANG.nothingfound}</strong> {$BLANG.therearenoarticleinthiscategory}</div>
				   {/foreach}
          </div>
          <ul class="pagination" style="margin-top:-25px;">
           {$pagination}
          </ul>
        </div>
        <div class="col-md-3">
          {include file="sidebar.tpl" index=home}
        </div>
      </div>
