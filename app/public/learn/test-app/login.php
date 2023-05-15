<?php

declare(strict_types=1);
// se till att sessipner används på sidan
session_start();

$_SESSION['username'] = $user['username'];

$_SESSION['user_id'] = $user['id'];

?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>login,</h1>
</body>
</html>  