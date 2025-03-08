function togglePassword() {
    let passwordField = document.getElementById("passwordText");
    if (passwordField.type === "password") {
        passwordField.type = "text";
    } else {
        passwordField.type = "password";
    }
}

document.getElementById("loginForm").addEventListener("submit", function(event) {
    event.preventDefault(); 

    let idField = document.getElementById("idText");
    let passwordField = document.getElementById("passwordText");

    // Get the values from the input fields
    let userId = idField.value;
    let userPassword = passwordField.value;

    // Prepare data to send in the fetch request
    let loginData = {
        id: userId,
        password: userPassword
    };

    // Use fetch to send login data to authenticate.php
    fetch('authlogin.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify(loginData)
    })
    .then(response => response.json())
    .then(data => {
        // Check if login was successful
        if (data.success) {
            // Redirect to the employee page if login is successful
            window.location.href = "employee.php";
        } else {
            // Clear fields and show error message if login fails
            idField.value = "";
            passwordField.value = "";
            alert(data.message || "Something went wrong. Please try again.");
        }
    })
    .catch(error => {
        // Handle any errors with the fetch request
        console.error('Error:', error);
        alert("An error occurred. Please try again.");
    });
});
