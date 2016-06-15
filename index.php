<html>
<head>
  <title>joanzstudio.com | One of a Kind and custom-made jewelry</title>

  <script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/knockout/3.2.0/knockout-min.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/jquery-cookie/1.4.1/jquery.cookie.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>

  <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/themes/smoothness/jquery-ui.css">
  <link rel="stylesheet" type="text/css" href="css/normalize.css">
  <link rel="stylesheet" type="text/css" href="css/skeleton.css">
  <link href="css/smart_wizard.css" rel="stylesheet" type="text/css">
  <link rel="stylesheet" type="text/css" href="css/main.css">
</head>
<body>
  <script type="text/html" id="cart-item-template">
    <?php include 'templates/cart_item.html'; ?>
  </script>

    <?php include 'templates/wizard.html'; ?>

  <div class="container">
    <div class="u-full-width">
        <div class="header" id="header1">
          <div class="header-text">Joan Z Studio</div>
          <div class="subheader-text">One of a kind and custom-made jewelry</div>
        </div>
        <!-- <div class="header" id="header2">
            <div class="header-text">Joan Z Studio</div>
            <div class="subheader-text">One of a kind and custom-made jewelry</div>
        </div> -->
    </div>

    <div class="row">
      <div id="initial-choices" class="six columns">
        <?php include 'templates/initial_choices.html'; ?>
      </div>
    </div>
    <div class="row">
      <div id="cart-container" class="six columns">
        <?php include 'templates/cart.html'; ?>
      </div>
    </div>
  </div>

</body>
<script>
(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
})(window,document,'script','//www.google-analytics.com/analytics.js','ga');

ga('create', 'UA-66288547-1', 'auto');
ga('send', 'pageview');

</script>

<script src="js/jquery.smartWizard.js"></script>
<script src="js/index.js"></script>
</html>
