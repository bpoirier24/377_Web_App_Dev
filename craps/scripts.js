
$(document).ready(function () {
    rollDie();
});

function rollDice() {
    $(".pip").css
}

function rollDie(dieNum) {
    // Step 1: hide every pip
    $(".pip").css("visibility", "hidden");

    // Step 2: generate a random number between 1 and 6 (inclusive)
    var roll = Math.ceil(Math.random() * 6);
    console.log(roll);


    function endRound(win){
        if (win) {
            $()
        }
    }

    // Step 3: show the appropriate pips based on the roll
    var dieNum = "d1";
    if (roll == 1) {
        $("#d" + dieNum + "p4").css("visibility", "visible");
    } else if (roll == 2) {
        $("#d" + dieNum + "p1").css("visibility", "visible");
        $("#d" + dieNum + "p7").css("visibility", "visible");
    } else if (roll == 3) {
        $("#d" + dieNum + "p1").css("visibility", "visible");
        $("#d" + dieNum + "p4").css("visibility", "visible");
        $("#d" + dieNum + "p7").css("visibility", "visible");
    } else if (roll == 4) {
        $("#d" + dieNum + "p1").css("visibility", "visible");
        $("#d" + dieNum + "p3").css("visibility", "visible");
        $("#d" + dieNum + "p5").css("visibility", "visible");
        $("#d" + dieNum + "p7").css("visibility", "visible");
    } else if (roll == 5) {
        $("#d" + dieNum + "p1").css("visibility", "visible");
        $("#d" + dieNum + "p3").css("visibility", "visible");
        $("#d" + dieNum + "p4").css("visibility", "visible");
        $("#d" + dieNum + "p5").css("visibility", "visible");
        $("#d" + dieNum + "p7").css("visibility", "visible");
    } else  { // roll == 6
        $("#d" + dieNum + "p1").css("visibility", "visible");
        $("#d" + dieNum + "p2").css("visibility", "visible");
        $("#d" + dieNum + "p3").css("visibility", "visible");
        $("#d" + dieNum + "p5").css("visibility", "visible");
        $("#d" + dieNum + "p6").css("visibility", "visible");
        $("#d" + dieNum + "p7").css("visibility", "visible");
    }
    return roll;
}