document.getElementById("savePassword").addEventListener("click", function(event) {
    event.preventDefault();  // Prevents the form from submitting (REMOVE THIS LINE)

    const currentPassword = document.getElementById("currentPassword").value;
    const newPassword = document.getElementById("newPassword").value;
    const confirmPassword = document.getElementById("confirmPassword").value;

    if (!currentPassword || !newPassword || !confirmPassword) {
        alert("Please fill in all fields.");
        return;
    }

    if (newPassword !== confirmPassword) {
        alert("New password and confirm password do not match.");
        return;
    }

    // Prepare the data to send via POST
    const formData = new FormData();
    formData.append("currentPassword", currentPassword);
    formData.append("newPassword", newPassword);
    formData.append("confirmPassword", confirmPassword);

    // Send the form data using Fetch API
    fetch("updatePassword.php", {
        method: "POST",
        body: formData
    })
    .then(response => response.json()) // THIS LINE CAUSES THE ERROR!
    .then(data => {
        if (data.success) {
            alert("Password updated successfully.");
        } else {
            alert("Failed to update password: " + data.message);
        }
    })
    .catch(error => {
        alert("Error: " + error.message);
    });
});
