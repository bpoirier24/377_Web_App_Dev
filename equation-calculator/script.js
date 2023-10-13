function calculate(operation) {
    var num1 = +document.getElementById('num1').value;
    var num2 = +document.getElementById('num2').value;

    if ((num1) && (num2)) {
        var result;
        if (operation == 'add') {
            result = num1 + num2;
        } else if (operation == 'subtract') {
            result = num1 - num2;
        } else if (operation == 'multiply') {
            result = num1 * num2;
        }

        var resultElement = document.getElementById('result');

        resultElement.innerHTML = 'Result: ' + result;
    } else {
        document.body.innerHTML += '<p>Please enter valid numbers.</p>';
    }
}

