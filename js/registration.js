function validateForm() {
    // Reset error messages
        document.getElementById("usernameError").textContent = "";
        document.getElementById("emailError").textContent = "";
        document.getElementById("passwordError").textContent = "";

    // Fetch input values
        var username = document.getElementById("username").value;
        var email = document.getElementById("email").value;
        var password = document.getElementById("password").value;

        var isValid = true;

    // Validate username (should not be empty)
        if (username.length < 8) {
            usernameError.textContent = "Atleast 8 characters.";
            isValid = false; // Prevent form submission
        }

    // Validate email using a regular expression
        var emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        if (!emailPattern.test(email)) {
            document.getElementById("emailError").textContent = "Invalid email.";
            isValid = false;
        }

    // Validate password length (should be at least 6 characters)
        if (password.length < 8) {
            document.getElementById("passwordError").textContent = "Atleast 8 characters.";
            isValid = false;
        }

    // If form is valid, submit the form (you can also redirect or perform other actions here)
        if (isValid) {
            return true;
        } else {
            // Prevent form submission
            return false;
        }
    } 