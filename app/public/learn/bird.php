<?php 
declare(strict_types = 1);

include "_includes/global-function.php";

include "_includes/database-connection.php";

// setup tabel bird 

setup_bird($pdo);
 
$title = "fågelskådning";

// förberd variabler som används i formuläret

$bird_name = "";



// ta hand om post request 
if ($_SERVER['REQUEST_METHOD'] === "POST"){
   
    print_r2("metoden post använd");

    // den globala array $_POST innehåller olika, fält som finns i formuläret 

    print_r2($_POST);

    $bird_name = trim($_POST['bird_name']);

    // kontrollera att minst 2 tecken finns i fältet för bird_name

    if (strlen($bird_name) >= 2){
        
    // spara till databasen

    $sql = "INSERT INTO bird (bird_name) VALUES ('$bird_name')";

    print_r2($sql);

    // använd databskopplingen för att spara till tabellen i databasen

    $result = $pdo -> exec($sql);

    }

   

}

// visa eventuella fåglar som finns i tablen 

$sql = "SELECT * FROM bird";

// använd databaskoppligen för att hämta 

$result = $pdo -> prepare($sql);

$result -> execute();
$rows = $result -> fetchAll();








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

<form action="<?= $_SERVER['PHP_SELF'] ?>" method="post">
<p>
    <label for="bird_name">Fågel</label> 
    <input type="text" name="bird_name" id="bird_name" required minlength="2" maxlength="25">

    <p>
        <input type="submit" value="spara">
        <input type="reset" value="nollställ">
    </p>
</p>
</form>

<section>
    <?php
    foreach ($rows as $row) {
        $id = $row['id'];
        echo "<div> ";
        // echo "<a href=\"bird_edit.php?id=$id\">";

        echo '<a href="bird_edit.php?id='. $id .'">';

        echo $row['bird_name']; 

        echo "</a>";
        echo "</div>";
        
    } 

    ?>
</section>


<?php

include "_includes/footer.php";

?>
</body>
</html>