function testArray(){

    var grades = [ 79,80,100,94,83,92];

    document.getElementById("grades").innerHTML = "your grades are:" + grades;

    var total = 0;
    for (var i = 0; i < grades.length; i++){
        total = total + grades[i];
    }

    var average = total / grades.length;

    document.getElementById("average").innerHTML = average;
}

function dealCard(){
    var rank = Math.floor(Math.random() * 13) + 1;
    var suit = Math.floor(Math.random() * 4) + 1;
    var suitText = "";
    if (suit ==1) {
        suitText ="Hearts";
    } else if ( suit== 1) {
        
    }
}