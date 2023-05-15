<?php

declare(strict_types=1);

$title = "sträng";


$rubrik = "funktioner,"
?>

<!DOCTYPE html>
<html lang="en">

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
    <h1><?= $rubrik ?></h1>
    <ul>
        <li>använd beskrivande funktionsnamn,</li>
        <li>följ kodstandard för språket</li>
        <li>validera parametrar som finns i funktionen</li>
        <li>använd flera funktioner dela upp logik</li>
        <li>dokumentra funktionen, vad gör parametrana </li>
    </ul>

    <?php
    // en funktion för att beräkna en kostnad  

    /**
     * calculate_total
     *
     * @param  mixed $price
     * @param  mixed $amount
     * @return int
     */
    function calculate_total(int $price, int $amount): int
    {
        return $price * $amount;
    }
    // använd funktionen, spara värdet i en ny variabel,

    $total = calculate_total(7, 4);

    // presentera relsultatet i ett html block element
    echo "<div> Kostnaden är $total</div>";

    $total = calculate_total(8, 6);

    echo "<div> Kostnaden är $total</div>";
    // skapa en funktion med namnet render_total
    // funktionenska använda calculate_total och därefter 
    // presentera relsultat, med echo
    /**
     * render_total
     *
     * @param  int $price
     * @param  int $amount
     * @param  int $in_stock
     * @param  string $element
     * @return void
     */
    function render_total(int $price, int $amount, int $in_stock, string $element)
    {
        // valiedera inkomande argument 
        // ex är det ok
        // vilka htnl element ska kunna anges
        if ($price < 0 || $amount < 0) {
            return;
        }

        // ny kontroll av $amount värde mellan intrervall is _orderbele()

        // med ett inledande ! så är logiken omvänd, 

        if (!is_orderable($amount, $in_stock)) {
            return;
        }


        // kontorlera att följande html element är giltiga 
        // en array med giltiga element 
        $elements = ["p", "div", "h4"];
        if (!in_array($element, $elements)) {
            $elements = "h1";
        }
        $total = calculate_total($price, $amount);
        echo "<$element> kostnad: $total</element>";
    }
    // skapa en funktionn som kontrollerar att ett värde finns mellan min odh max 

    /**
     * is_orderable
     *
     * @param  int $x
     * @param  int $max defult 100, används om parametern ej anges 
     * @return void
     */
    function is_orderable(int $x, int $max = 100)
    {
        // if ($x > 0 && $x < $max){
        //     return true;
        // } else {
        //     return false;
        // }

        // som en oneliner 

        return ($x > 0 and $x < $max);
    }



    // anropa funktonen med de argument som ska gälla 
    render_total(9, 10, 25, "p");

    // skapa en funktion som presentrar en persons namn och ålder 

    // ex 
    // jörgen jönson 40 år

    // funktonen ska ta 3 parametarar, förman, efternamn och ålder
    // funktionnen ska rendera resultatet som html

    function age(string $namn, int $age, string $last_name)
    {
        echo $namn, $age, $last_name;
    }

    age("jörgen", 100, "jönson");


    // ett exempel på hur man backend kan hantera olika spårk för fromulärfält
    // skapa en array med ett standarspårk
    $english = [

        "welcome" => "Hello, welcome to this app ",
        "name" => "enter the name",
        "reset " => " reset ",
        "save" => "save"

    ];


    $swedish = [
        "welcome" => "hejsan och välkommen ",
        "name" => "ange namnet",
        "reset " => "reset ",
        "save" => "spara"


    ];

    $norwegian = [
        "welcome" =>"norge",
        "name" => "norge",
        "reset " => "england",
        "save" => "spanska"


    ];
    // skapa en array med giltiga språk,
    $languages = [

        "en" => $english,
        "sv" => $swedish,
        "no" => $norwegian
    ]; 
    // en variable för aktuellt språk 
    // skulle kunna sparas, i en sektion eller om man i appen 

    $language = "sv"; 
    

    $sp = "no"

    ?>

    <form action="#" method="post">

        <p>
            Välkommen till applikationen,
        </p>

        <input type="text" name="first_name" id="" placeholder="ange förnamn">
        <input type="reset" value="Nollställ">
        <button>spara</button>

    </form>
    <hr>

    <form action="#" method="post">

        <p>
           <?= $languages[$language]['welcome']?>
        </p>

        <input type="text" name="first_name" id="" placeholder="hej förnamn">
        <input type="reset" value="Nollställ">
        <button>spara</button>

    </form>
    <hr>

<form action="#" method="post">
    <p>
       <?= $languages[$sp]['welcome']?>
    </p>

    <input type="text" name="first_name" id="" placeholder="hej förnamn">
    <input type="reset" value="Nollställ">
    <button>spara</button>

</form>


    <?php
    include "_includes/footer.php";

    ?>



</body>

</html>