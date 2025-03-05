function togglePassword() {
    let passwordField = document.getElementById("passwordText");
    if (passwordField.type === "password") {
        passwordField.type = "text";
    } else {
        passwordField.type = "password";
    }
}

document.getElementById("signupForm").addEventListener("submit", function(event) {

    event.preventDefault(); 

    let emailField = document.getElementById("emailText");
    let idField = document.getElementById("idText");
    let passwordField = document.getElementById("passwordText");
    let confirmField = document.getElementById("confirmPassword");

    if (emailField.value === "joseIntsek@gmail.com" && idField.value === "696969" && passwordField.value === confirmField.value) {
        window.location.href = "employee.php";
    } 

    else {
        idField.value = "";
        emailField.value = "";
        passwordField.value = "";
        confirmField.value = "";
        alert("Wrong ID or Password. Please try again.");
    }
    
});