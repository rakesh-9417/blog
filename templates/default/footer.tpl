    </div>
    <div class="footer">
      <div class="container-fluid footer-bg">
        <div class="container" style="padding:15px 0;">
          <div class="row">
            <div class="col-md-6" style="color: #FFF; padding-top:10px;">
            &copy; {$BLANG.copyright|replace:'%year%':$date_year}
            </div>
            <div class="col-md-6">
              <div class="pull-right">
                {if $facebook}<a href="{$facebook}" class="btn btn-primary" role="button" target="_blank"><i class="fa fa-facebook fa-lg"></i></a>{/if}
                {if $twitter}<a href="{$twitter}" class="btn btn-info" role="button" target="_blank"><i class="fa fa-tumblr fa-lg"></i></a>{/if}
                {if $google}<a href="{$google}" class="btn btn-danger" role="button" target="_blank"><i class="fa fa-google-plus fa-lg"></i></a>{/if}
                <a href="{if $rss}{$rss}{else}{if $seourl}feeds/rss{else}index.php?p=rss{/if}{/if}" class="btn btn-warning" role="button" target="_blank"><i class="fa fa-rss fa-lg"></i></a>
                <a href="{if $sitemap}{$sitemap}{else}{if $seourl}sitemap.xml{else}index.php?p=sitemap{/if}{/if}" class="btn btn-default" role="button" target="_blank"><i class="fa fa-sitemap fa-lg"></i></a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    {if $trackingcode}{literal}
    <script>
      (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
      (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
      m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
      })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

      ga('create', '{/literal}{$trackingcode}{literal}', 'auto');
      ga('send', 'pageview');
    </script>
    {/literal}{/if}
  </body>
</html>
