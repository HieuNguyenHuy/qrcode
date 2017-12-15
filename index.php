<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>LINE Login</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
</head>
<body>
<div class="container">
  <h1>LINE Login</h1>
<?php
putenv('LOGIN_CHANNEL_ID=1552030123');
require_once __DIR__ . '/vendor/autoload.php';

$session_factory = new \Aura\Session\SessionFactory;
$session = $session_factory->newInstance($_COOKIE);
$segment = $session->getSegment('Some\Package');

$csrf_value = $session->getCsrfToken()->getValue();

$callback = urlencode('http://' . $_SERVER['HTTP_HOST']  . '/line-login/line_callback.php');

$url = 'https://access.line.me/oauth2/v2.1/authorize?scope=profile&response_type=code&client_id=' . getenv('LOGIN_CHANNEL_ID') . '&redirect_uri=' . $callback . '&state=' . $csrf_value;
echo '<a href=' . $url . ' class="btn btn-primary btn-block">Line Login</a>' . PHP_EOL;

?>
</div>
</body>
</html>
