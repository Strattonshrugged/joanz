<html>
  <head>
    <title>joanzstudio.com | One of a Kind and custom-made jewelry</title>

<script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/knockout/3.2.0/knockout-min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery-cookie/1.4.1/jquery.cookie.min.js"></script>

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

    <script type="text/html" id="charm-chain-template">
      <?php include 'templates/charm_chain.html'; ?>
    </script>

    <script type="text/html" id="charm-heart-template">
      <?php include 'templates/charm_heart.html'; ?>
    </script>

    <script type="text/html" id="cart-item-template">
      <?php include 'templates/cart_item.html'; ?>
    </script>

    <script type="text/html" id="summary-template">
      <?php include 'templates/summary.html'; ?>
    </script>

    <script type="text/html" id="cart-template">
      <?php include 'templates/cart.html'; ?>
    </script>

  </head>
  <body>
    <div data-bind="template: { name: 'header-template' }"></div>

    <div class="row">
      <div class="small-12 columns">
        <h3 class="title-text">Custom Charms</h3>
        <p class="subtitle-text">Create a complete sterling silver necklace or bracelet with your own lettering on it.  Let's get started!  </p>
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

    <div class="row">
      <div class="small-12 columns">
        <h3 class="stepheader">Step 4. Add a heart spacer charm?</h3>
        <div data-bind="template: { name: 'charm-heart-template', foreach: hearts }"></div>
      </div>
    </div>

    <div class="row">
      <div class="small-12 columns">
        <h3 class="stepheader">Step 5. Choose a chain</h3>
        <div data-bind="template: { name: 'charm-chain-template', foreach: chains }"></div>
      </div>
    </div>

    <div class="row">
      <!-- summary -->
      <div class="small-6 columns">
        <div data-bind="template: { name: 'summary-template' }"></div>
      </div>

      <!-- cart -->
      <div class="small-6 columns">
        <div data-bind="template: { name: 'cart-template' }"></div>
      </div>

    </div>

  </body>
  <script src="js/index.js"></script>
</html>