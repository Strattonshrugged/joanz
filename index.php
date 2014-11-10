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

    <script type="text/html" id="charm-chain-template">
      <?php include 'templates/charm_chain.html'; ?>
    </script>

    <script type="text/html" id="charm-heart-template">
      <?php include 'templates/charm_heart.html'; ?>
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

    <div class="row">
      <div class="small-12 columns">
        <h3 class="stepheader">Step 4. Choose a chain</h3>
        <div data-bind="template: { name: 'charm-chain-template', foreach: chains }"></div>
      </div>
    </div>

    <div class="row">
      <div class="small-12 columns">
        <h3 class="stepheader">Step 5. Add a heart spacer charm?</h3>
        <div data-bind="template: { name: 'charm-heart-template', foreach: hearts }"></div>
      </div>
    </div>

    <div class="row">
      <div class="small-12 columns">
        <h3 class="stepheader">Necklace Summary</h3>
        <form>
          <table data-bind="with: selectedSummary">
            <tr>
              <td class="summarylabel">Charm Style</td>
              <td><span data-bind="text: charmStyle"></span></td>
            </tr>
            <tr>
              <td class="summarylabel">Charm Lettering</td>
              <td><span data-bind="text: letteringStyle"></span></td>
            </tr>
            <tr>
              <td class="summarylabel">Charm Text</td>
              <td><span data-bind="text: letteringStyle"></span></td>
            </tr>
            <tr>
              <td class="summarylabel">Border Style</td>
              <td><span data-bind="text: borderStyle"></span></td>
            </tr>
            <tr>
              <td class="summarylabel">Chain Type</td>
              <td><span data-bind="text: chainStyle"></span></td>
            </tr>
            <tr>
              <td class="summarylabel">Include Heart Charm</td>
              <td><span data-bind="text: includeHeart"></span></td>
            </tr>
          </table>
          <input type="submit" class="button radius" value="Add to Cart">
        </form>
      </div>
    </div>

  </body>
  <script src="js/index.js"></script>
</html>