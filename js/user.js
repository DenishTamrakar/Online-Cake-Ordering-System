function userValidate(){
    // var firstName = document.getElementById('firstName').value;
    // var lastName = document.getElementById('lastName').value;
    // var address = document.getElementById('address').value;
    // var city = document.getElementById('city').value;
    var email = document.getElementById('email').value;
    var isValid = true;

    var emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    if (!emailPattern.test(email)) {
        isValid = false;
    }

    if (isValid == true) {
        return true;
    } else {
        // Prevent form submission
        alert('Invalid Email!');
        return false;
    }
}