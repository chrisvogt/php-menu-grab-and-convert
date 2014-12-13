<?php
require_once realpath(__DIR__.'/src/Mgac.php');

$target  = array( // Required
    'url'       => 'http://sandbox-php.dev/demo/',
    'element'   => 'ul[id=topnav]'
);
$options = array( // Optional, for Bootstrap conversion
    'validateBaseUrl'       => true,
    'convertToBootstrap'    => true,
    'selectors'             => array(
        'top-nav'            => 'ul[id=topnav]',
        'li-with-child'      => 'li.menu-item-has-children',
        'submenu-ul'         => 'ul.sub-menu'
    )
);

$config = new MenuGrabAndConvert\Configuration($target, $options);
$mgac = new MenuGrabAndConvert\Mgac($config);

?><!DOCTYPE html>
<html>
  <head>
    <title>Menu Grab and Convert Example</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Bootstrap core CSS -->
    <link href="http://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet" media="screen">

    <style>
      body {
          padding-top: 70px;
      }
    </style>

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="http://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.2/html5shiv.js"></script>
      <script src="http://cdnjs.cloudflare.com/ajax/libs/respond.js/1.4.2/respond.js"></script>
    <![endif]-->
  </head>
  <body>

    <!-- Fixed navbar -->
    <nav class="navbar navbar-default navbar-fixed-top" role="navigation">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">Project name</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
            <?php echo $mgac->render(); // render the navigation menu ?>
        </div><!--/.nav-collapse -->
      </div>
    </nav>

    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <h1>Hello Menu Scrapers!</h1>
        </div>
      </div>
    </div>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="http://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.2.0/js/bootstrap.min.js"></script>
  </body>
</html>
