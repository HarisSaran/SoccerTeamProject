// adds the selected playerID to the list of playersID
// work in progress

function playerSelected(element){
    let playerId = element.id.split("-")[1];
    let players = document.getElementById("players");
    let playersValue = players.value;
    if(element.checked){
        playersValue = playersValue +playerId + ",";
    }else{
        let playersAsArray = playersValue.split(",");
        playersValue = "";
        playersAsArray.forEach(el => {
            if(el != playerId){
                playersValue = playersValue + el + ",";
            }
        });
    }
    players.value = playersValue;
    alert(players.value);
}