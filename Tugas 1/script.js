function input(value) {
    let display = document.getElementById('display');
    if (value === '^') {
        display.value += '**'; // Simbol "^" diubah jadi "**" untuk pangkat dalam JS
    } else {
        display.value += value;
    }
}

function clearDisplay() {
    document.getElementById('display').value = '';
}

function calculate() {
    let display = document.getElementById('display');
    try {
        display.value = eval(display.value);
    } catch (error) {
        display.value = 'Error';
    }
}
