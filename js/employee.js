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

document.addEventListener("DOMContentLoaded", function () {

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

    let profileModal = document.getElementById("profileModal");
    let passwordModal = document.getElementById("passwordModal");
    let profileIcon = document.querySelector(".account-icon");
    let closeProfileModal = document.querySelector(".close-btn");
    let changePasswordLink = document.getElementById("changePasswordLink");
    let closePasswordModal = document.getElementById("closePasswordModal");

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
        event.preventDefault();
        profileModal.style.display = "none";
        passwordModal.style.display = "flex";
    });

    // Close Change Password Modal
    closePasswordModal.addEventListener("click", function () {
        passwordModal.style.display = "none";
    });

    // Close modals when clicking outside
    window.addEventListener("click", function (event) {
        if (event.target === profileModal) {
            profileModal.style.display = "none";
        }
        if (event.target === passwordModal) {
            passwordModal.style.display = "none";
        }
    });


});



/* function loadContent(page) {

    let pageTitle = document.getElementById("pageTitle");

    let pages = {
        'announcement': `<b>Announcement</b>`,
        'leave': `<b>Leave/b>`,
    };

   pageTitle.innerHTML = ``;
   pageTitle.innerHTML = pages[page] || `<h2>Page Not Found</h2><p>Sorry, the requested content is unavailable.</p>`; 
} */