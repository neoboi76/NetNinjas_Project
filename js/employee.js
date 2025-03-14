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

document.addEventListener("DOMContentLoaded", function () {
    // Example leave requests (Replace with actual data from backend)
    let leaveRequests = [];

    let leaveHistory = document.getElementById("leaveHistory");

    leaveRequests.forEach(request => {
        let row = document.createElement("tr");
        row.innerHTML = `
            <td>${request.reason}</td>
            <td>${request.description}</td>
            <td>${request.start}</td>
            <td>${request.return}</td>
            <td><span class="badge ${request.status === 'Approved' ? 'bg-success' : request.status === 'Denied' ? 'bg-danger' : 'bg-warning'}">${request.status}</span></td>
        `;
        leaveHistory.appendChild(row);
    });
});

document.addEventListener("DOMContentLoaded", function () {
    const feedbackList = document.getElementById("feedback");

    /*
    const feedbackRequests = [
        { from: "100234", to: "100567", date: "03/07/2025", feedback: "Great team player, always helpful." },
        { from: "100789", to: "100432", date: "03/05/2025", feedback: "Consistently meets deadlines with quality work." },
        { from: "100321", to: "100654", date: "03/03/2025", feedback: "Shows strong leadership skills in projects." }
    ];
    */

    if (feedbackRequests.length > 0) {
        feedbackRequests.forEach(request => {
            const feedbackItem = document.createElement("div");
            feedbackItem.classList.add("feedback-item");

            feedbackItem.innerHTML = `
                <h6 class="mb-1"><b> ${request.from}</b></h6>
                <p class="mb-1">${request.feedback}</p>
                <small class="text-muted">${request.date}</small>
            `;

            feedbackList.appendChild(feedbackItem);
        });
    } else {
        feedbackList.innerHTML = "<p>No feedback records found.</p>";
    }
});

document.addEventListener("DOMContentLoaded", function () {
    const salaryLinks = document.querySelectorAll(".salary-link");
    const modal = document.getElementById("salaryModal");
    const closeModal = document.querySelector(".close");

    // Modal Fields
    const modalDate = document.getElementById("modal-date");
    const modalGross = document.getElementById("modal-gross");
    const modalTax = document.getElementById("modal-tax");
    const modalSSS = document.getElementById("modal-sss");
    const modalPhilhealth = document.getElementById("modal-philhealth");
    const modalPagibig = document.getElementById("modal-pagibig");
    const modalNet = document.getElementById("modal-net");

    // Open modal on click
    salaryLinks.forEach(link => {
        link.addEventListener("click", function (event) {
            event.preventDefault();

            // Get data attributes from clicked item
            modalDate.textContent = this.getAttribute("data-date");
            modalGross.textContent = this.getAttribute("data-gross");
            modalTax.textContent = this.getAttribute("data-tax");
            modalSSS.textContent = this.getAttribute("data-sss");
            modalPhilhealth.textContent = this.getAttribute("data-philhealth");
            modalPagibig.textContent = this.getAttribute("data-pagibig");

            // Calculate net salary
            const gross = parseFloat(this.getAttribute("data-gross"));
            const tax = parseFloat(this.getAttribute("data-tax"));
            const sss = parseFloat(this.getAttribute("data-sss"));
            const philhealth = parseFloat(this.getAttribute("data-philhealth"));
            const pagibig = parseFloat(this.getAttribute("data-pagibig"));
            const net = gross - (tax + sss + philhealth + pagibig);

            modalNet.textContent = net.toFixed(2); // Display calculated net salary

            // Show modal
            modal.style.display = "flex";
        });
    });

    // Close modal when 'X' is clicked
    closeModal.addEventListener("click", function () {
        modal.style.display = "none";
    });

    // Close modal when clicking outside modal content
    window.addEventListener("click", function (event) {
        if (event.target === modal) {
            modal.style.display = "none";
        }
    });
});


/*
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
*/

document.getElementById("savePassword").addEventListener("click", function(event) {
    event.preventDefault(); // Prevent form submission

    const currentPassword = document.getElementById("currentPassword").value;
    const newPassword = document.getElementById("newPassword").value;
    const confirmPassword = document.getElementById("confirmPassword").value;

    // Check if the new password and confirm password match
    if (newPassword !== confirmPassword) {
        alert("New password and confirm password do not match.");
    }

    // Check if any of the fields are empty
    if (!currentPassword || !newPassword || !confirmPassword) {
        alert("Please fill in all fields.");
    }

    // Create a FormData object to send the data to the server
    const formData = new FormData();
    formData.append("currentPassword", currentPassword);
    formData.append("newPassword", newPassword);

    // Send the data to the PHP script using Fetch API
    fetch("update_password.php", {
        method: "POST",
        body: formData
    })
});
