<form action="{if $seourl}search/results{else}index.php?p=search{/if}" method="POST" role="form">
  <div class="input-group">
    <input type="text" name="search" class="form-control" placeholder="{$BLANG.search}">
    <span class="input-group-btn">
      <button class="btn btn-default" type="submit"><span class="fa fa-search"></span></button>
    </span>
  </div>
</form>
<hr />
<h3>{$BLANG.categories}</h3>
  <ul class="nav nav-list primary push-bottom">
    <li><a href="{if $seourl}{$blogurl}{else}index.php{/if}">{$BLANG.home}</a></li>
  {foreach key=num item=cats from=$categories}
    <li><a href="{if $seourl}{$cats.caturl}{else}index.php?p=category&display={$cats.caturl}{/if}">{$cats.name}</a></li>
  {/foreach}
    <li><a href="{if $rss}{$rss}{else}{if $seourl}feeds/rss{else}index.php?p=rss{/if}{/if}">{$BLANG.rss}</a></li>
  </ul>
{if $subcategories}
<hr />
<h3>{$BLANG.subcategories}</h3>
  <ul class="nav nav-list primary push-bottom">
  {foreach key=num item=subcats from=$subcategories}
    <li><a href="{if $seourl}{$subcats.caturl}{else}index.php?p=category&display={$subcats.caturl}{/if}">{$subcats.name}</a></li>
  {/foreach}
  </ul>
{/if}
{if $archives}
<hr />
<h3>{$BLANG.archive}</h3>
  <ul class="nav nav-list primary push-bottom">
  {foreach key=num item=archive from=$archives}
    <li><a href="{if $seourl}archive/{$archive.year}/{$archive.monthnum}{else}index.php?p=archive&y={$archive.year}&m={$archive.monthnum}{/if}">{$archive.month} {$archive.year}</a></li>
  {/foreach}
  </ul>
{/if}
{foreach key=num item=sidebar from=$sidebars}
<hr />
{$sidebar.htmlcode}
{/foreach}
