<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Classes</title>
    <?php include("class_lib.php")?>
    <link rel="stylesheet" href="styles_2.css">
</head>
<body>
    <form action="classes.php">
        <div class="daneW">
            
            Wpisz liczbe masowa:    <br />
            Wpisz liczbe atomowa:   <br /> 
            Ilość rozpadow alpha:   <br />
            Ilość rozpadow beta:    <br />
        </div>
    <div class="formularz">
        
        <input class="input_button" type="number" value="0" name="lmasa" > <br />
        <input class="input_button" type="number" value="0" name="latom" > <br />
        <input class="input_button" type="number" value="0"  name="iralpha" > <br />
        <input class="input_button" type="number" value="0" name="irbeta" > <br />
    </div>
    <div class="filler">

    </div>
        <div class="przycisk">
            <input type="submit" value="Oblicz" name="wynik"> <br />
        </div>
    </form>
<!-- <div class="wyniki">

</div> -->
    <?php


//czy jest null
        if (    !isset($_GET["lmasa"])){
            echo "niepoprawna liczba masowa";
            return;
        }
        elseif ( !isset($_GET["latom"]) ) {
            echo "niepoprawna liczba atomowa";
            return;
        }
//alpha
        elseif ( $_GET["iralpha"] >0 && ($_GET["lmasa"] + $_GET["latom"]) <= 0 ){
            echo "niepoprawna liczba alpha";
        }
        else{
//ujemne liczby
            if (  $_GET["lmasa"] <0){
                echo "niedodatnia liczba masowa";
                return;
            }
            
            if (  $_GET["latom"] <0){
                echo "niedodatnia liczba atomowa";
                return;
            }

            $obliczenia = new obliczenia($_GET["lmasa"],$_GET["latom"],
            $_GET["iralpha"], $_GET["irbeta"]);
            
            echo $obliczenia -> roznica(). "<br />";
            echo $obliczenia -> rozpad(). "<br />";
        }
    ?>

    
</body>
</html>