<html>
  <head>
    <title>joanzstudio.com | One of a Kind and custom-made jewelry</title>

<script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/knockout/3.2.0/knockout-min.js"></script>

    <link rel="stylesheet" type="text/css" href="css/foundation.min.css">
    <link rel="stylesheet" type="text/css" href="css/main.css">

    <script type="text/html" id="header-template">
      <?php include 'templates/header.html'; ?>
    </script>

    <script type="text/html" id="single-or-double-template">
      <?php include 'templates/single_or_double.html'; ?>
    </script>

    <script type="text/html" id="header-template">
      <?php include 'templates/header.html'; ?>
    </script>

    <script type="text/html" id="charm-lettering-template">
      <?php include 'templates/charm_lettering.html'; ?>
    </script>

    <script type="text/html" id="charm-border-template">
      <?php include 'templates/charm_border.html'; ?>
    </script>

  </head>
  <body>
    <div data-bind="template: { name: 'header-template' }"></div>

    <div class="row">
      <div class="small-12 columns">
        <h3 class="titletext">Custom Charms</h3>
        <p class="titletext">Create a complete sterling silver necklace or bracelet with your own lettering on it.  Let's get started!  </p>
      </div>
    </div>

    <div class="row">
      <div class="small-12 columns">
        <h3 class="stepheader">Step 1. Choose a charm style:</h3>
        <div data-bind="template: { name: 'single-or-double-template', foreach: charms }"></div>
      </div>
    </div>

    <div class="row">
      <div class="small-12 columns">
        <h3 class="stepheader">Step 2. Add your custom lettering</h3>
        <div data-bind="template: { name: 'charm-lettering-template', foreach: letterings }"></div>
      </div>
    </div>

    <div class="row">
      <div class="small-12 columns">
        <h3 class="stepheader">Step 3. Add a dot border?</h3>
        <div data-bind="template: { name: 'charm-border-template', foreach: borders }"></div>
      </div>
    </div>

  </body>
  <script src="js/index.js"></script>
</html>