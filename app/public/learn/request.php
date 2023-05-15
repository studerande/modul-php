<?php

declare(strict_types=1);
include "_includes/global-function.php";

$title = "reques";


// kontrollera om post requst 
print_r2($_POST);

print_r2($_SERVER['REQUEST_METHOD']);



// deklarera variabler som kan visa ett värde i olika formulärsfält,
$first_name = "";
$counrty = "";
$comments = "";
$email = "";

$chek = "";


// om en oist reqyest har gjorts ändra variablerns, värden 

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    // kolla first_name
    $first_name = isset($_POST['first_name']) ? $_POST['first_name'] : "";


    // se till att det knapt finns några blanksteg,

    $first_name = trim($first_name);

    // kolla country
    $counrty = isset($_POST['counrty']) ? $_POST['counrty'] : "";

    // kolla comments
    $comments = isset($_POST['comments']) ? $_POST['comments'] : "";

    // eventuella hackförsök, genom att skriva script

   $comments = htmlspecialchars($comments);

    $email = isset($_POST['email']) ? $_POST['email'] : "";

    $chek = isset($_POST['chek']) ? $_POST['chek'] : "";
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

    <!-- inkludera sidhuvud, -->

    <?php
    include "_includes/header.php";

    // require

    ?>
    <h1><?= $title ?></h1>

    <a href="<?= $_SERVER['PHP_SELF'] ?>">Läs in sidan igen</a>

    <!-- ett formulär, med olika fält  -->

    <form action="<?= $_SERVER['PHP_SELF'] ?>" method="post">


        <p>
            förnamn: <br>
            <input type="text" name="first_name" id="" value="<?= $first_name ?>">

        </p>

        <p>
            Dina länder <br>
            <select name="country" id="">
                <option value="sweden" <?= $counrty === "sweden" ? "selected" : "" ?>>Sverige</option>
                <option value="USA" <?= $counrty === "USA" ? "selected" : "" ?>>USA</option>
                <option value="England" <?= $counrty === "England" ? "selected" : "" ?>>England</option>
                <option value="rodney dangerfield" <?= $counrty === "rodney dangerfield" ? "selected" : "" ?>>rodney dangerfield</option>
            </select>
        </p>
        <p>
            dina tankar om progammering:<br>

            <textarea name="comments" id="" cols="30" rows="10"><?= $comments ?></textarea>
        </p>

        <p>
            E:post <br>
            <!-- skapa ett följande fält, e-mail, conditions,  -->

            <input type="email" name="email" id="" value="<?= $email ?>">

        </p>


        <p>

            <input type="chek" name="chek" id="" value="1" <?= $chek === "1" ?>>
        </p>


        <p>
        
    
        <input type="date" name="date" value="<?= $date ?>" id="">
        </p>


        <p>
            <input type="submit" value="skicka">

        </p>



    </form>



    <?php

    // phpinfo();

    // print_r($_SERVER);
    ?>

    <?php
    include "_includes/footer.php";

    ?>

</body>

</html>