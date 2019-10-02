<?php
//ini_set('display_errors', 1);
//ini_set('display_startup_errors', 1);
//error_reporting(E_ALL);


//FETCH THE API JSON FILE for the given ID or name
$url = "https://pokeapi.co/api/v2/pokemon";
$id = $_POST['inpput'];
$data = file_get_contents($url . '/' . $id);
$pokemon = json_decode($data);
$pokname = $pokemon->name;


//Fetch 4 random moves from moves array
$rand_keys = array_rand($pokemon->moves, 4);
$move1 = $pokemon->moves[$rand_keys[0]]->move->name;
$move2 = $pokemon->moves[$rand_keys[1]]->move->name;
$move3 = $pokemon->moves[$rand_keys[2]]->move->name;
$move4 = $pokemon->moves[$rand_keys[3]]->move->name;


//Image for the main pokemon the type and the evolution link
$image = $pokemon->sprites->front_default;
$type = $pokemon->types[0]->type->name;
$evolink = $pokemon->species->url;


//if NULL show default pokeball image
if ($image === NULL) {
    $image = "Img/pokeball.svg";
}


//Get the content of the evolution pokemon name and evolves from LINK
$evodata = file_get_contents($evolink);
$evolution = json_decode($evodata);
$evopokname = $evolution->evolves_from_species->name;
$evopokurl = $evolution->evolves_from_species->url;


//Evolves from link data being fetched and decoded into php while also fetching the url of the pokemon for later use
$imgevo = file_get_contents($evopokurl);
$evoimg = json_decode($imgevo);
$evoimglink = $evoimg->varieties[0]->pokemon->url;


//the url from before (LATER USE) is being used to fetch the image of the previous pokemon
$evoimgfetch = file_get_contents($evoimglink);
$evoimgdata = json_decode($evoimgfetch);
$evoimglinkfinal = $evoimgdata->sprites->front_default;


//if no prev evolution image then show default pokeball
if ($evoimglinkfinal === NULL) {
    $evoimglinkfinal = "Img/pokeball.svg";
}


//if no prev evolution poké name then show NO PREV EVOLUTION
if ($evopokname === NULL) {
    $evopokname = "No Prev Evolution";
}
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
    <img src="css/pokedex.png" alt="pokedex">
</div>

<form id="searchBox" method="post">
    <label>
        <input type="text" name="inpput" class="form-control" id="inpput" value="" placeholder="Poké Name">
    </label>
    <button id="search" type="submit"><i class="material-icons">search</i></button>
</form>

<div id="displayBox">
    <img id="pokemonImg" src="<?php
    echo "$image" ?>" alt="Pokémon Image">
</div>


<div id="infoBox">
    <p id="name" value="">
        <?php
        echo "Name: $pokname &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp ID: $pokemon->id <br> Type: $type"; ?>
    </p>
    <div class="overflow-auto" id="move"><?php
        echo "Moves: <br> $move1 <br> $move2 <br> $move3 <br> $move4 <br>"; ?> </div>

</div>
<div id="displayBoxBg">
    <p id="prevEvo" data-placeholder="test"><?php
        echo "$evopokname"; ?></p>
    <div id="displayBox2">
        <img id="prevEvoImg" src="<?php
        echo "$evoimglinkfinal"; ?>" alt="no prev evolution">
    </div>
</div>

<button id="left"> <</button>
<button id="right"> ></button>


</body>

</html>