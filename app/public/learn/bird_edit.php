<?php

declare(strict_types=1);

include "_includes/global-function.php";

include "_includes/database-connection.php";
$title = "fågelskådning - redigera namn";

// förberd variabler som används i formuläret

$bird_name = "";

$row = null;


// ta hand om post request 
if ($_SERVER['REQUEST_METHOD'] === "POST") {

    print_r2("metoden post använd");

    // den globala array $_POST innehåller olika, fält som finns i formuläret 

    print_r2($_POST);

    $bird_name = trim($_POST['bird_name']);

    $id = isset($_POST['id']) ? $_POST['id'] : 0;

    // kontrollera att minst 2 tecken finns i fältet för bird_name

    if (strlen($bird_name) >= 2) {

        // spara till databasen

        $sql = "UPDATE `bird` SET `bird_name` = '$bird_name' WHERE `bird`.`id` = $id";

        print_r2($sql);


        // använd databskopplingen för att spara till tabellen i databasen

        $result = $pdo->exec($sql);

        // om posten uppdateras visas sidan bird.php

        if($result){
            header('location: bird.php');
            exit;
        }
    }
}

// för att rediegera en fågel används en GET request där id fråmgår, ex id=2

if ($_SERVER['REQUEST_METHOD'] === "GET") {


    $id = isset($_GET['id']) ? $_GET['id'] : 0;


    // visa eventuella fåglar som finns i tablen 

    $sql = "SELECT * FROM bird WHERE id=$id";

    // använd databaskoppligen för att hämta 

    $result = $pdo->prepare($sql);

    $result->execute();

    // om det finns ett resultt från databasanropte, sparas det i variablen $row
    $row = $result->fetch();
    // fetchall är som queryselecotors eller getelementbyid,



    // kontrollera att, det finns en post som gav reultatet
    if ($row) {
        print_r2($row);
        $bird_name = $row["bird_name"];
    }
}



?>

<!DOCTYPE html>
<html lang="sv">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?></title>
</head>

<body>

    <?php

    include "_includes/header.php";

    ?>

    <h1><?= $title ?></h1>

    <!-- visa formläär om det finns ett fålenamn som ska redigeras -->

    <?php

    if($row){

    ?>

        <form action="<?= $_SERVER['PHP_SELF'] ?>" method="post">
            <p>
                <label for="bird_name">Fågel</label>
                <input type="text" name="bird_name" id="bird_name" value="<?= $bird_name ?>" required minlength="2" maxlength="25">
                <!-- skicka med fålens id som finns sparad i databasen använd ett dolt input fält, -->

                <input type="hidden" name="id" value=" <?= $row['id'] ?>">
            <p>
                <input type="submit" value="updatera">
                <input type="reset" value="nollställ">
            </p>
            </p>
        </form>
    <?php
    }

    ?>



    <?php

    include "_includes/footer.php";

    ?>
</body>

</html>