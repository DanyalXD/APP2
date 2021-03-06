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
    <meta name="description" content="Signature Pad - HTML5 canvas based smooth signature drawing using variable width spline interpolation.">

    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, user-scalable=no">

    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <script src="js/jquery.js" type="text/javascript"></script>
    <link rel="stylesheet" href="css/signature-pad.css">

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

<form id="myForm" action="pdfTest.php" method="post">
  Customer Name: <input type="text" name="name" id = "a"><br>
  Business/House Name/No: <input type="text" name="hname" id = "b"><br>
  Address Line 1: <input type="text" name="ad1" id = "c"><br>
  Address Line 2: <input type="text" name="ad2"><br>
  Post Code: <input type="text" name="pc" id = "d"><br>
  FAO: <input type="text" name="fao" id = "e"><br>
  Contract No: <input type="text" name="no" id = "f"><br>
  Visit No: <input type="number" name="visit" min="1" max="12" id = "g"><br><br>
  <input type="radio" name="job" value="r">Routine<br>
  <input type="radio" name="job" value="f">Follow Up<br>
  <input type="radio" name="job" value="c">Call Out<br>
  <input type="radio" name="job" value="j">Job<br>
  <input type="radio" name="job" value="ct">EFK
  <input type="hidden" name = "pic" id="pic" value="" />
  <input type="hidden" name = "pic2" id="pic2" value="" />
  <input type="hidden" name = "thName" id="thName" value="" /><br><br>
  Reports and Findings:<br><textarea rows="8" cols="50" maxlength="570" name="report"> </textarea><br><br>
  Action and Recommendations:<br><textarea rows="8" cols="50" maxlength="800" name="actions"> </textarea><br><br>
  Products: <input type="text" name="prod1" style = "width: 140px">
  Quantity: <input type="number" name="qty1" style = "width: 35px">
  Active Ing: <input type="text" name="ai1" style = "width: 140px"><br>
  Spraying <input type="checkbox" name="sp1">
  Dusting <input type="checkbox" name="d1">
  Baiting <input type="checkbox" name="b1">
  Other <input type="checkbox" name="o1"><br><br>

    Products: <input type="text" name="prod2" style = "width: 140px">
  Quantity: <input type="number" name="qty2" style = "width: 35px">
  Active Ing: <input type="text" name="ai2" style = "width: 140px"><br>
  Spraying <input type="checkbox" name="sp2">
  Dusting <input type="checkbox" name="d2">
  Baiting <input type="checkbox" name="b2">
  Other <input type="checkbox" name="o2"><br><br>

  Products: <input type="text" name="prod3" style = "width: 140px">
  Quantity: <input type="number" name="qty3" style = "width: 35px">
  Active Ing: <input type="text" name="ai3" style = "width: 140px"><br>
  Spraying <input type="checkbox" name="sp3">
  Dusting <input type="checkbox" name="d3">
  Baiting <input type="checkbox" name="b3">
  Other <input type="checkbox" name="o3"><br><br>

  Products: <input type="text" name="prod4" style = "width: 140px">
  Quantity: <input type="number" name="qty4" style = "width: 35px">
  Active Ing: <input type="text" name="ai4" style = "width: 140px"><br>
  Spraying <input type="checkbox" name="sp4">
  Dusting <input type="checkbox" name="d4">
  Baiting <input type="checkbox" name="b4">
  Other <input type="checkbox" name="o4"><br><br>


</form>


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
        <button type="button" class="button save" data-action="save-png">Submit</button>
  
      </div>
    </div>
  </div>



<script src="js/signature_pad.js"></script>
<script src="js/app.js"></script>
</body>
</html>
