<?php
    include 'base.php';
?>

<?php
$type = $_GET['type'];
if ($type === null) {
    $type = "single"; // default to single
}
?>

<div class="row">
  <div class="small-12 columns">
    <h3 class="titletext">Choice of Chain</h3>
    <h3 class="stepheader">Step 4. Add your choice of chain</h3>
  </div>
</div>

<div class="row">
  <div class="small-3 columns centered">
    <img class="centeredimg" src="./images/ball_chain_20.jpg">
    <div class="imglabel">Ball Chain - 20 inch</div>
    <div class="imglabel">$23.00</div>
    <input class="centeredimg" type="submit" value="Add to cart"></input>
  </div>

  <div class="small-3 columns centered">
    <img class="centeredimg" src="./images/ball_chain_7.jpg">
    <div class="imglabel">Ball Chain - 7 inch</div>
    <div class="imglabel">$12.00</div>
    <input class="centeredimg" type="submit" value="Add to cart"></input>
  </div>

  <div class="small-6 columns">
  </div>
</div>

<div class="row">
  <div class="small-12 columns">
        <h5 class="stepheader">Want to add more charms?  Choose below and repeat Step 2:</h5>
  </div>
</div>

<div class="row">
  <div class="small-3 columns">
    <a href="./customize.php?type=single"><img src="./images/single_charm_select.jpg"></a>
    <div class="imglabel">Single Charm</div>
  </div>
  <div class="small-3 columns">
    <a href="./customize.php?type=double"><img src="./images/double_charm_select.jpg"></a>
    <div class="imglabel">Double Charm</div>
  </div>
  <div class="small-6 columns">
  </div>
</div>

<div class="row">
  <div class="small-12 columns">
        <h5 class="stepheader">OR go to Checkout to complete your purchase!</h5>
        <input type="submit" value="Go to Checkout!"></input>
  </div>
</div>

</body>
</html>
