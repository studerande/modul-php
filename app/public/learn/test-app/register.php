<?php

session_start();


setup_user($pdo);


$servername = "mysql";
$database = "db_learn";
$username = "db_user";
$password = "db_password";

$dsn = "mysql:host=$servername;dbname=$database";

try {
    $pdo = new PDO($dsn, $username, $password);

    // set the PDO error mode to exception
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    echo "Connected successfully";
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}

?>


<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<h1>register</h1>
<form action="">
    <label for="username">username</label>
    <input type="text" name="username">
    <input type="password" name="password" id="password">
    <button type="submit">register</button>
</form>
</body>
</html>