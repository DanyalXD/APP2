<?php

session_start();
if (!isset($_SESSION['login_user']))
    header("Location: ../index.php");

?>
<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>APP PDF FORM</title>
  <meta name="description" content="APP">

  <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, user-scalable=no">

  <meta name="apple-mobile-web-app-capable" content="yes">
  <meta name="apple-mobile-web-app-status-bar-style" content="black">

  <link rel="stylesheet" href="css/signature-pad-tech.css">
  <script src="js/jquery.js"></script>
  <script type="text/javascript">
    var _gaq = _gaq || [];
    _gaq.push(['_setAccount', 'UA-39365077-1']);
    _gaq.push(['_trackPageview']);
    (function() {
      var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
      ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
      var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
    })();
  </script>
</head>
<body onselectstart="return false">

  Technician Name: <input type="type" id="techName">

  <div id="signature-pad" class="m-signature-pad">
    <div class="m-signature-pad--body">
      <canvas></canvas>
    </div>
    <div class="m-signature-pad--footer">
      <div class="description">Sign above</div>
      <div class="left">
        <button type="button" class="button clear" data-action="clear">Clear</button>
      </div>
      <div class="right">
        <button type="button" class="button save" data-action="save-png" id = "hideme">Save as PNG</button>
        <button type="button" class="button save" data-action="save-svg">Submit</button>
      </div>
    </div>
  </div>

  <script src="js/signature_pad.js"></script>
  <script src="js/app.js"></script>
</body>
</html>