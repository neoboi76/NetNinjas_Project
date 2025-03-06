document.querySelectorAll('.nav-link, .dropdown-item').forEach(item => {
    item.addEventListener('click', function () {
        let pageId = document.getElementById('pageTitle');
        let contentId = document.querySelectorAll('.tab-pane');
        let welcomeId  = document.getElementById('welcome');
        let navId = document.querySelectorAll('.nav-link');
        welcomeId.innerText = ""

        switch(this.innerText) {

            case "Announcement":
                navId.forEach(link => {

                    link.classList.remove('classBg');

                });
                pageId.innerHTML = `<b>Announcement</b>`;
                document.getElementById('announcement1').classList.add('classBg');
                contentId.forEach(link => {

                    link.classList.remove('show active');
                    link.classList.add('show active');

                });
                break;

            case "Report":
                navId.forEach(link => {

                    link.classList.remove('classBg');

                });
                document.getElementById('report1').classList.add('classBg');
                contentId.forEach(link => {

                    link.classList.remove('show active');
                    link.classList.add('show active');

                });
                break;

            case "Case Report":
                pageId.innerHTML = `<b>Report / Case Report</b>`;
                contentId.forEach(link => {

                    link.classList.remove('show active');
                    link.classList.add('show active');

                });
            break;

            case "Documents":
                pageId.innerHTML = `<b>Report / Documents</b>`;
                contentId.forEach(link => {

                    link.classList.remove('show active');
                    link.classList.add('show active');

                });
            break;

            case "Records":
                pageId.innerHTML = `<b>Report / Records</b>`;
                contentId.forEach(link => {

                    link.classList.remove('show active');
                    link.classList.add('show active');

                });
            break;

            case "Leave":
                navId.forEach(link => {

                    link.classList.remove('classBg');

                });
                pageId.innerHTML = `<b>Leave</b>`;
                document.getElementById('leave1').classList.add('classBg');
                contentId.forEach(link => {

                    link.classList.remove('show active');
                    link.classList.add('show active');

                });
            break;

            case "Feedback":
                navId.forEach(link => {

                    link.classList.remove('classBg');

                });
                pageId.innerHTML = `<b>Feedback</b>`;
                document.getElementById('feedback1').classList.add('classBg');
                contentId.forEach(link => {

                    link.classList.remove('show active');
                    link.classList.add('show active');

                });
            break;

            case "Salary":
                navId.forEach(link => {

                    link.classList.remove('classBg');

                });
                pageId.innerHTML = `<b>Salary</b>`;
                document.getElementById('salary1').classList.add('classBg');
                contentId.forEach(link => {

                    link.classList.remove('show active');
                    link.classList.add('show active');

                });
            break;

        }

    });
});

let profileModal = document.getElementById("profileModal");
let passwordModal = document.getElementById("passwordModal");
let profileIcon = document.querySelector(".account-icon");
let closeProfileModal = document.querySelector(".close-btn");
let changePasswordLink = document.getElementById("changePasswordLink");
let closePasswordModal = document.getElementById("closePasswordModal");

document.addEventListener("DOMContentLoaded", function (event) {

    // Show Review Superior tab when button is clicked
    document.getElementById("reviewSuperiorBtn").addEventListener("click", function () {
        document.querySelectorAll(".tab-pane").forEach(tab => tab.classList.remove("show", "active"));
        document.getElementById("reviewSuperior").classList.add("show", "active");
    });

    // Back button to return to Feedback page
    document.getElementById("backToFeedbackBtn").addEventListener("click", function () {
        document.querySelectorAll(".tab-pane").forEach(tab => tab.classList.remove("show", "active"));
        document.getElementById("feedback").classList.add("show", "active");
    });

    profileModal.style.display  = 'none';
    passwordModal.style.display = 'none';

    // Open Profile Modal
    profileIcon.addEventListener("click", function () {
        profileModal.style.display = "flex";
    });

    // Close Profile Modal
    closeProfileModal.addEventListener("click", function () {
        profileModal.style.display = "none";
    });

    // Open Change Password Modal
    changePasswordLink.addEventListener("click", function (event) {
        profileModal.style.display = "none";
        passwordModal.style.display = "flex";
    });

    // Close Change Password Modal
    closePasswordModal.addEventListener("click", function () {
        passwordModal.style.display = "none";
        profileModal.style.display = "flex";
    });
    

});


document.getElementById("savePassword").addEventListener("submit", function(event) {

    event.preventDefault(); 

    let mainPassField = document.getElementById("mainPassword");
    let currentPassField = document.getElementById("currentPassword");
    let newPassField = document.getElementById("newPassword");
    let confirmPassField = document.getElementById("confirmPassword");

    if (mainPassField.value === currentPassField.value && newPassField.value === confirmPassField.value) {
        mainPassField.value = newPassField.value;
        console.log(mainPassField.value)
        alert("Passwords changed");
        passwordModal.style.display = "none";
        profileModal.style.display = "flex";
    } 

    else {
        currentPassField.value = "";
        newPassField.value = "";
        currentPassField = "";
        alert("Passwords don't match. Please try again.");
    }

});



