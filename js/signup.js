function togglePassword() {
    let passwordField = document.getElementById("passwordText");
    if (passwordField.type === "password") {
        passwordField.type = "text";
    } else {
        passwordField.type = "password";
    }
}