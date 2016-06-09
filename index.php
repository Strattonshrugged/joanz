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
  <div id="custom-charm-wizard-dialog" class="u-full-width" style="display: none">
    <div id="custom-charm-wizard" class="swMain">
      <ul style="display: none;">
        <li><a href="#step-1"><span class="stepDesc">Step 1</span></a></li>
        <li><a href="#step-2"><span class="stepDesc">Step 2</span></a></li>
        <li><a href="#step-3"><span class="stepDesc">Step 3</span></a></li>
        <li><a href="#step-4"><span class="stepDesc">Step 4</span></a></li>
        <li><a href="#step-5"><span class="stepDesc">Step 5</span></a></li>
      </ul>
      <div id="step-1">
        <div class="StepTitle">
            <h4>Choose a Charm Type</h4>
            <h6>Choose what type of charm you want - single or double. After you've clicked on the charm type you want then click "Next" in the lower right.</h6>
        </div>
        <?php include 'templates/single_or_double.html'; ?>
      </div>
      <div id="step-2">
        <div class="StepTitle">
            <h4>Choose a Lettering Style</h4>
            <h6>Choose your lettering style, type what you want on your charm below the selection,then click "Next" in the lower right.</h6>
        </div>
        <?php include 'templates/charm_lettering.html'; ?>
      </div>
      <div id="step-3">
        <div class="StepTitle">
            <h4>Choose a Border Style</h4>
            <h6>Would you like a dot border on your charm? Choose yes or no then click "Next" in the lower right.</h6>
        </div>
        <?php include 'templates/charm_border.html'; ?>
      </div>
      <div id="step-4">
        <div class="StepTitle">
            <h4>Add a Heart Charm</h4>
            <h6>Would you like to add a Heart Charm to your order? Choose Yes or No then click "Next" in the lower right.</h6>
        </div>
        <?php include 'templates/charm_heart.html'; ?>
      </div>
      <div id="step-5">
        <div class="StepTitle">
            <h4>Add a Chain</h4>
            <h6>Lastly, would you like to add a chain to your order? Make your decision then click "Next" in the lower right.</h6>
        </div>
        <?php include 'templates/charm_chain.html'; ?>
      </div>
    </div>
  </div>

  <div class="container">
    <div class="u-full-width">
        <div class="header">
          <div class="header-text">Joan Z Studio</div>
          <div class="subheader-text">One of a kind and custom-made jewelry</div>
        </div>
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
