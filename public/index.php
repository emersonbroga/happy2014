<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <title>Happy 2014</title>

    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="/style.css">
    <script>
      (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
      (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
      m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
      })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

      ga('create', 'UA-4746688-10', 'broga.com.br');
      ga('send', 'pageview');

    </script>

</head>
<body>
    <div id="fb-root"></div>
    <script>(function(d, s, id) {
      var js, fjs = d.getElementsByTagName(s)[0];
      if (d.getElementById(id)) return;
      js = d.createElement(s); js.id = id;
      js.src = "//connect.facebook.net/en_US/all.js#xfbml=1&appId=327198550753733";
      fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));</script>

    <div id="container">
        <div class="row center" >
            <img src="logo.png" alt="Happy 2014"/><br/>
            <div class="fb-like" data-href="http://happy2014.broga.com.br/" data-layout="button_count" data-action="like" data-show-faces="false" data-share="false"></div>
        </div>

        <div class="row center">
            <h2>Send me a <strong>picture</strong>!</h2>
            <video id="video" width="240" height="180" autoplay ></video>
            <br/>
            <button id="snap" class="btn btn-large btn-success" >Send picture!</button>
            <canvas id="canvas" width="640" height="480" class="hide"></canvas>
        </div>
        <hr/>

        <div class="row">
            <div id="pics"></div>
        </div>
    </div>


    <div id="footer">
      <div class="container center">
        <p>This is just a html5 test with camera. Developed by <a href="http://twitter.com/emersonbroga" target="_blank">Emerson Broga</a>.</p>
      </div>
    </div>


    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.6.1/jquery.min.js" type="text/javascript"></script>
    <script src="/script.js" type="text/javascript"></script>
</body>
</html>
