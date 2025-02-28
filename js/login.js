function togglePassword() {
    let passwordField = document.getElementById("password");
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

    if (idField.value === "696969" && passwordField.value === "1234") {
        window.location.href = "employee.php";
    } 

    else {
        idField.value = "";
        passwordField.value = "";
        alert("Wrong ID or Password. Please try again.");
    }
    
});

