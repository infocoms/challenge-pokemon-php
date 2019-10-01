document.getElementById("search").addEventListener("click", function () {


    let PokName = document.getElementById("name");
    let PokImg = document.getElementById("pokemonImg");
    let PokMoves = document.getElementById("move");
    let PokPrevEvo = document.getElementById("prevEvo");
    let PokPrevEvoName = document.getElementById("prevEvo");
    let PokPrevEvoImg = document.getElementById("prevEvoImg");
    let input = document.getElementById("input").value;


    //Take the input of the field (pokemon name/id)
    fetch("https://pokeapi.co/api/v2/pokemon/" + input)

        .then(function (response) {
            if (response.ok === false) {
                PokName.innerHTML = "Pokemon Does not Exist";
                PokImg.src = "Img/pokeball.svg";
                PokMoves.innerHTML = "Moves: what moves? ;)";
                PokPrevEvo.innerHTML = "- - -";
            }
            return response.json();
        })

        .then(data => {
            let Pname = data.name;
            let pokeID = data.id;

            PokImg.src = data.sprites.front_default;
            PokName.innerHTML = "Name: " + Pname + "<br>" + "ID: " + pokeID;
            PokMoves.innerHTML =
                "Moves: "
                + "<br>" + data.moves[0].move.name
                + "<br>" + data.moves[1].move.name
                + "<br>" + data.moves[2].move.name
                + "<br>" + data.moves[3].move.name;

            return fetch(data.species.url)
        })


        //fetch the name of the previous evolution pokémon
        .then(function (response) {
            return response.json();
        })

        .then(data => {
            let prevEvolution = data.evolves_from_species;

            if (prevEvolution === null) {
                PokPrevEvoName.innerHTML = "No Prev Evolution";
                PokPrevEvoImg.src = "Img/pokeball.svg";
            } else {
                let pUrl = prevEvolution.url.split('/');
                let pID = pUrl[pUrl.length - 2];
                PokPrevEvo.innerHTML = prevEvolution.name;
                return fetch("https://pokeapi.co/api/v2/pokemon/" + pID)
            }
        })






        //fetch the IMG of the previous evolution pokémon
        .then(function (response) {
            return response.json();
        })



        .then(data => {
            PokPrevEvoImg.src = data.sprites.front_default;
        })


});