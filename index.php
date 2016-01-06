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
  <div id="custom-charm-wizard-dialog" class="u-full-width" style="display: none">
    <div id="custom-charm-wizard" class="swMain">
      <ul>
        <li><a href="#step-1"><span class="stepDesc">Step 1</span></a></li>
        <li><a href="#step-2"><span class="stepDesc">Step 2</span></a></li>
        <li><a href="#step-3"><span class="stepDesc">Step 3</span></a></li>
        <li><a href="#step-4"><span class="stepDesc">Step 4</span></a></li>
        <li><a href="#step-5"><span class="stepDesc">Step 5</span></a></li>
      </ul>
      <div id="step-1">
        <h2 class="StepTitle">Choose a Charm Type</h2>
        <?php include 'templates/single_or_double.html'; ?>
      </div>
      <div id="step-2">
        <h2 class="StepTitle">Choose letterings</h2>
        <?php include 'templates/charm_lettering.html'; ?>
      </div>
      <div id="step-3">
        <h2 class="StepTitle">Choose border</h2>
        <?php include 'templates/charm_border.html'; ?>
      </div>
      <div id="step-4">
        <h2 class="StepTitle">Heart Charm</h2>
        <?php include 'templates/charm_heart.html'; ?>
      </div>
      <div id="step-5">
        <h2 class="StepTitle">Add Chain</h2>
        <?php include 'templates/charm_chain.html'; ?>
      </div>
    </div>
  </div>

  <div class="u-full-width">
    <div class="header">
      <div class="header-text">Joan Z Studio</div>
      <div class="subheader-text">One of a kind and custom-made jewelry</div>
    </div>
  </div>

  <div class="container">
    <div class="row">
      <div class="six columns">
        <?php include 'templates/initial_choices.html'; ?>
      </div>
      <div class="six columns">
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
