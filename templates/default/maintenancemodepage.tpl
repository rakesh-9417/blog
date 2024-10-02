<!DOCTYPE html>
<html dir="{$BLANG.direction}" lang="{$BLANG.isocode}">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset={$charset}" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{$blogtitle} | {$BLANG.maintenance}</title>

    <!-- Bootstrap -->
    <link href="templates/{$template}/assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="templates/{$template}/assets/css/font-awesome.min.css" rel="stylesheet">
    <link href="templates/{$template}/assets/css/custom.css" rel="stylesheet">

    <!-- JavaScript -->
    <script src="templates/{$template}/assets/js/jquery-3.2.1.min.js"></script>
    <script src="templates/{$template}/assets/js/bootstrap.min.js"></script>
    <script src="templates/{$template}/assets/js/custom.js"></script>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
    <div class="container">
      {if $maintenancemodemessage}
      <div class="alert alert-danger" role="alert" style="margin-top: 3cm;"><i class="fa fa-exclamation-triangle fa-lg"></i> {$maintenancemodemessage}</div>
      {/if}
    </div>
  </body>
</html>
