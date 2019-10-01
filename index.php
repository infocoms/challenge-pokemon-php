<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$url = "https://pokeapi.co/api/v2/pokemon";
$id = 3;
$data = file_get_contents($url.'/'.$id);
$pokemon = json_decode($data);
$test = $pokemon->name;
$move1 = $pokemon->moves[0]->move->name;
$move2 = $pokemon->moves[1]->move->name;
$move3 = $pokemon->moves[2]->move->name;
$move4 = $pokemon->moves[3]->move->name;
$image = $pokemon->sprites->front_default;
$type = $pokemon->types[0]->type->name;

?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <meta http-equiv="X-UA-Compatible" content="ie=edge"/>
    <link rel="stylesheet" href="css/style.css">

    <title>Pokedex</title>

    <link rel="stylesheet" type="text/css" href="css/style.css" media="screen"/>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
          integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>














<div id="Pokedex">
    <img src="pokedex.png" alt="pokedex">
</div>

<div id="searchBox">
    <label>
        <input type="text" name="inpput" class="form-control" id="inpput" value="1">
    </label>

</div>

<div id="displayBox">
    <img id="pokemonImg" src="<?php
     echo $image ?>" alt="pokemon">
</div>


<div id="infoBox">
    <p id="name" value="">
        <?php
        echo "Name: $test &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp ID: $id <br> Type: $type" ; ?>
    </p>
    <div class="overflow-auto" id="move"><?php
        echo "Moves: <br> $move1 <br> $move2 <br> $move3 <br> $move4 <br>"; ?> </div>

</div>
<div id="displayBoxBg">
    <p id="prevEvo">- - -</p>
    <div id="displayBox2">
        <img id="prevEvoImg" src="Img/pokeball.svg" alt="pokemon">
    </div>
</div>

<button id="left"> <</button>
<button id="right"> ></button>
<button id="search"><i class="material-icons">search</i></button>


</body>
<script src="js/app.js"></script>
</html>