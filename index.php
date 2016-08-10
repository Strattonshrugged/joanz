<html>
    <head>
      <title>joanzalt</title>

      <script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
      <script src="//cdnjs.cloudflare.com/ajax/libs/jquery-cookie/1.4.1/jquery.cookie.min.js"></script>
      <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>

      <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/themes/smoothness/jquery-ui.css">
      <link rel="stylesheet" type="text/css" href="css/slick-theme.css"/>
      <link rel="stylesheet" type="text/css" href="css/slick.css"/>
      <link rel="stylesheet" type="text/css" href="css/main.css">
    </head>
    <body>
        <div class="wrapper">
            <?php include 'templates/header.html'; ?>

            <div class="landing menu">
                <img src="images/double_charm.jpg" id="fullCharm"/>
                <img src="images/dots.jpg" id="tagOnly" />
                <img src="images/heart_charm_spacer.jpg" id="heartOnly" />
                <img src="images/ball_chain_7.jpg" id="chainOnly" />
            </div>
            <div class="tagFont menu">
                <img src="images/small_type.jpg" id="smlText" />
                <img src="images/mixed_type.jpg" id="mdmText" />
                <img src="images/large_type.jpg" id="lrgText" />
            </div>
            <div class="tagText menu">
                <form action="demo_form.asp">
                  <input type="text" id="textInput">
                  <br>
                  <input type="submit" value="Submit">
                </form>
            </div>
            <div class="border menu">
                <img src="images/dots.jpg" id="dots" />
                <img src="images/no_dots.jpg" id="noDots" />
            </div>
            <div class="heart menu">
                <img src="images/heart_charm_spacer.jpg" id="heart"/>
                <img src="images/noHeartCharm.jpg" id="noHeart" />
            </div>
            <div class="chain menu">
                <img src="images/ball_chain_7.jpg" id="chain7" />
                <img src="images/ball_chain_20.jpg" id="chain20" />
                <img src="images/noChainPlease.jpg" id="noChain" />
            </div>
            <div>
                ADD TO CART OR START OVER?
            </div>
            <?php include 'templates/altcart.html'; ?>
        </div>
    </body>

    <script> <!--GoogleAnalytics,KeepThis-->
    (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
      (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
      m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
    })(window,document,'script','//www.google-analytics.com/analytics.js','ga');
    ga('create', 'UA-66288547-1', 'auto');
    ga('send', 'pageview');
    </script>
    <script type="text/javascript" src="//cdn.jsdelivr.net/jquery.slick/1.6.0/slick.min.js">
    </script>
    <script src="js/index.js">
    </script>
</html>
