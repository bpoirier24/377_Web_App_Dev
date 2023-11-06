
// when a player wants to choose either rock paper or scissors this function is called
function play(playerChoice) {
    var choices = ["rock", "paper", "scissors"];
    //this randomly selects the 3 choices
    var computerChoice = choices[Math.floor(Math.random() * 3)];

    document.getElementById("computer-choice").innerText = `Computer chose: ${computerChoice}`;

    if (playerChoice == computerChoice) {
        document.getElementById("message").innerText = "It's a tie!";
    } else if (
        (playerChoice == "rock" && computerChoice == "scissors") ||
        (playerChoice == "paper" && computerChoice == "rock") ||
        (playerChoice == "scissors" && computerChoice == "paper")
    ) {
        document.getElementById("message").innerText = "You win!";
    } else {
        document.getElementById("message").innerText = "Computer wins!";
    }
}
