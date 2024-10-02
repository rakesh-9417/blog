      <div class="row">
        <div class="col-md-9">
          <ol class="breadcrumb">
            <li><a href="{if $seourl}{$blogurl}{else}index.php{/if}">{$BLANG.home}</a></li>
            <li class="active">{$BLANG.search}</li>
          </ol>
          <div class="well well-sm">
            <form action="{if $seourl}search/results{else}index.php?p=search{/if}" method="POST" role="form">
              <div class="input-group">
                <input type="text" name="search" value="{$searchvalue}" class="form-control input-lg" placeholder="{$BLANG.search}">
                <span class="input-group-btn">
                  <button class="btn btn-primary btn-lg" type="submit"><span class="fa fa-search"></span> {$BLANG.search}</button>
                </span>
              </div>
            </form>
          </div>
				  <div class="blog-posts">
				  {foreach key=num item=searchs from=$searchresult}
					  <article class="post post-large" style="margin-left: 0;">
							<div class="post-content">
							  <h3><a href="{if $seourl}{$searchs.posturl}.html{else}index.php?p=post&display={$searchs.posturl}{/if}">{$searchs.title}</a></h3>
								<p>{$searchs.contents|strip_tags|truncate:350:" [...]"}</p>
								<div class="post-meta">
								  <span><i class="fa fa-clock-o"></i> {$searchs.date|replace:'-':$BLANG.at}</span>
								  {if $visitorcounter}<span><i class="fa fa-users"></i> {$searchs.visitors} {$BLANG.visit}</span>{/if}
									{if $commentscounter}<span><i class="fa fa-comments"></i> {$searchs.comments} {$BLANG.comments}</span>{/if}
									{if strlen($searchs.contents)>350}<a href="{if $seourl}{$searchs.posturl}.html{else}index.php?p=post&display={$searchs.posturl}{/if}" class="btn btn-xs btn-primary pull-right">{$BLANG.readmore}</a>{/if}
								</div>
							</div>
						</article>
					 {foreachelse}
					 <div class="alert alert-info" role="alert"><i class="fa fa-info-circle"></i> <strong>{$BLANG.nothingfound}</strong> {$BLANG.nothingmatchedyoursearch}</div>
				   {/foreach}
          </div>
        </div>
        <div class="col-md-3">
          {include file="sidebar.tpl" index=home}
        </div>
      </div>
