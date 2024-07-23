function validateBalance(){
    var card = document.getElementById('card_no_1').value;
    var pin = document.getElementById('pin_no_1').value;
    var amount = document.getElementById('amt_1').value;
    var isValid = true;
    if(card.length < 10){
        alert('Card number should have 10 digits.');
        isValid = false;
    }else{
        if(pin.length < 4){
            alert('Card number should have 4 digits.');
            isValid = false;
        }else{
            if(amount < 20){
                alert('Amount should be above 20');
                isValid = false;
            }
        }
    }
    // If form is valid, submit the form (you can also redirect or perform other actions here)
    if (isValid) {
        return true;
    } else {
        // Prevent form submission
        return false;
    }
}

document.getElementById('card_no_1').addEventListener('input', function() {
    if (this.value.length > 10) {
        this.value = this.value.slice(0, 10);
    }
});

document.getElementById('pin_no_1').addEventListener('input', function() {
    // Remove non-numeric characters
    let value = this.value.replace(/[^0-9]/g, ''); 
    this.value = value;

    if (this.value.length > 4) {
        this.value = this.value.slice(0, 4);
    }
    // Show input as plain text for a brief moment
    this.type = 'password';
});