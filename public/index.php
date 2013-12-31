

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <title>Happy 2014</title>

    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="/style.css">
</head>
<body>
    <div id="container">
        <div class="row center" >
            <img src="logo.png" alt="Happy 2014"/>
        </div>

        <div class="row center">
            <h2>Send us a <strong>picture</strong>!</h2>
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
