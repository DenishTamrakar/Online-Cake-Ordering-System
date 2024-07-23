function validateCard(){
    var card = document.getElementById('card_no').value;
    var pin = document.getElementById('pin_no').value;
    var isValid = true;

    console.log(card);
    console.log(pin);

    if(card.length < 10){
        alert('Card number should have 10 digits.');
        isValid = false;
    }else{
        if(pin.length < 4){
            alert('Card number should have 4 digits.');
            isValid = false;
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

document.getElementById('card_no').addEventListener('input', function() {
    if (this.value.length > 10) {
        this.value = this.value.slice(0, 10);
    }
});

document.getElementById('pin_no').addEventListener('input', function() {
    // Remove non-numeric characters
    let value = this.value.replace(/[^0-9]/g, ''); 
    this.value = value;

    if (this.value.length > 4) {
        this.value = this.value.slice(0, 4);
    }
    // Show input as plain text for a brief moment
    clearTimeout(this.dataTimeout);
    if (value.length > 0) {
        this.type = 'text';
        this.dataTimeout = setTimeout(() => {
            this.type = 'password';
        }, 500); // Adjust delay as needed (500 milliseconds)
        }
});