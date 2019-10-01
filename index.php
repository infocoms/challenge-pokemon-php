<?php

$base = "http://pokeapi.co/api/v2/pokemon";
$id = 1;
$data = file_get_contents($base.$id."/");
$pokemon = json_decode($data);

echo $pokemon->name;
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
    <img src="Img/pokedex.png" alt="pokedex">
</div>

<div id="searchBox">
    <label>
        <input type="text" class="form-control" id="input" placeholder="Poké Name/ID">
    </label>
</div>

<div id="displayBox">
    <img id="pokemonImg" src="Img/pokeball.svg" alt="pokemon">
</div>


<div id="infoBox">
    <p id="name">Info . .</p>
    <div class="overflow-auto" id="move"></div>

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