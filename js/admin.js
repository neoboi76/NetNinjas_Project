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

            case "Employee":
                navId.forEach(link => {

                    link.classList.remove('classBg');

                });
                pageId.innerHTML = `<b>Employee</b>`;
                document.getElementById('employee1').classList.add('classBg');
                contentId.forEach(link => {

                    link.classList.remove('show active');
                    link.classList.add('show active');

                });
                break;

            case "Review":
                navId.forEach(link => {

                    link.classList.remove('classBg');

                });
                pageId.innerHTML = `<b>Review</b>`;
                document.getElementById('review1').classList.add('classBg');
                contentId.forEach(link => {

                    link.classList.remove('show active');
                    link.classList.add('show active');

                });
                break;

            case "Department":
                navId.forEach(link => {

                    link.classList.remove('classBg');

                });
                pageId.innerHTML = `<b>Department</b>`;
                document.getElementById('department1').classList.add('classBg');
                contentId.forEach(link => {

                    link.classList.remove('show active');
                    link.classList.add('show active');

                });
                break;

            case "Report":
                navId.forEach(link => {

                    link.classList.remove('classBg');

                });
                contentId.forEach(link => {

                    link.classList.remove('show active');
                    link.classList.add('show active');

                });
                break;

            case "Case Management":
                pageId.innerHTML = `<b>Report / Case Management</b>`;
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

document.addEventListener("DOMContentLoaded", function () {
    const addEmployeeBtn = document.getElementById("addEmployeeBtn");
    const editEmployeeBtn = document.getElementById("editEmployeeBtn");
    const employeeModal = document.getElementById("employeeModal");
    const employeeEditModal = document.getElementById("employeeEditModal");
    const modalContent = document.querySelector(".employee-modal-content");
    const editModalContent = document.querySelector(".employeeEdit-modal-content");
    const closeEmployeeModal = document.querySelector(".employee-close");
    const closeEmployeeEditModal = document.querySelector(".employeeEdit-close");
    const body = document.body;

    // Ensure modal starts hidden
    employeeModal.style.display = "none";
    employeeEditModal.style.display = "none";

    // Open modal with animation
    addEmployeeBtn.addEventListener("click", function () {
        employeeModal.style.display = "flex";
        setTimeout(() => {
            employeeModal.classList.add("show");
        }, 10);
        body.classList.add("employee-modal-open");
    });

    // Open modal with animation
    editEmployeeBtn.addEventListener("click", function () {
        employeeEditModal.style.display = "flex";
        setTimeout(() => {
            employeeEditModal.classList.add("show");
        }, 10);
        body.classList.add("employee-modal-open");
    });

    // Close modal with animation
    closeEmployeeModal.addEventListener("click", function () {
        employeeModal.classList.add("hide");
        employeeModal.classList.remove("show");

        setTimeout(() => {
            employeeModal.style.display = "none";
            employeeModal.classList.remove("hide");
        }, 300); // Matches CSS animation duration
        body.classList.remove("employee-modal-open");
    });

    closeEmployeeEditModal.addEventListener("click", function () {
        employeeEditModal.classList.add("hide");
        employeeEditModal.classList.remove("show");

        setTimeout(() => {
            employeeEditModal.style.display = "none";
            employeeEditModal.classList.remove("hide");
        }, 300); // Matches CSS animation duration
        body.classList.remove("employeeEdit-modal-open");
    });

});


document.addEventListener("DOMContentLoaded", function () {
    const feedbackHistoryBtn = document.getElementById("feedbackHistoryBtn");
    const backToReviewBtn = document.getElementById("backToReviewBtn");
    const reviewContent = document.getElementById("reviewContent");
    const feedbackHistoryContent = document.getElementById("feedbackHistoryContent");

    backToReviewBtn.style.display = "none";


    if (feedbackHistoryBtn && backToReviewBtn && reviewContent && feedbackHistoryContent) {
        feedbackHistoryBtn.addEventListener("click", function () {
            // Hide the review form and show the feedback history message
            reviewContent.classList.add("d-none");
            this.style.display = "none";
            backToReviewBtn.style.display = "flex";
            feedbackHistoryContent.classList.remove("d-none");
        });

        backToReviewBtn.addEventListener("click", function () {
            // Hide the feedback history message and show the review form
            feedbackHistoryContent.classList.add("d-none");
            reviewContent.classList.remove("d-none");
            this.style.display = "none";
            feedbackHistoryBtn.style.display = "flex"
        });
    }
});

document.addEventListener("DOMContentLoaded", function () {
    const viewDocumentsBtn = document.getElementById("viewDocumentsBtn");
    const documentsTab = document.getElementById("documents");
    const empDocumentsTab = document.getElementById("empDocuments");

    viewDocumentsBtn.addEventListener("click", function () {
        // Hide the 'documents' tab
        documentsTab.classList.add("d-none");

        // Show the 'empDocuments' tab
        empDocumentsTab.classList.remove("d-none");
        empDocumentsTab.classList.add("show", "active");
    });

  /*   function showDocuments() {
        documentsTab.classList.add("show", "active");
    }

    function hideDocuments() {
        documentsTab.classList.remove("show", "active");
    }

    if (documentsNav) {
        documentsNav.addEventListener("click", function () {
            showDocuments();
        });
    }

    document.querySelectorAll(".nav-link").forEach(tab => {
        tab.addEventListener("click", function () {
            if (tab !== documentsNav) {
                hideDocuments();
            }
        });
    }); */
});

document.addEventListener("DOMContentLoaded", function () {
    const addDocumentBtn = document.getElementById("addDocumentBtn");
    const fileInput = document.getElementById("fileInput");
    const documentsTable = document.getElementById("documentsTable").querySelector("tbody");

    addDocumentBtn.addEventListener("click", function () {
        const file = fileInput.files[0];
        if (!file) {
            alert("Please select a file to upload.");
            return;
        }

        const fileName = file.name;
        const fileType = file.type.split("/")[1]?.toUpperCase() || "Unknown";
        const currentDate = new Date().toLocaleDateString();

        // Create a temporary URL for the uploaded file
        const fileURL = URL.createObjectURL(file);

        const newRow = document.createElement("tr");
        newRow.innerHTML = `
            <td>${currentDate}</td>
            <td>General</td>
            <td>${fileType}</td>
            <td>${fileName}</td>
            <td>
                <a href="${fileURL}" download="${fileName}" class="btn btn-primary">Download</a>
                <button class="btn btn-danger remove-btn">Remove</button>
            </td>
        `;

        documentsTable.appendChild(newRow);
        fileInput.value = "";
    });

    // Remove document
    documentsTable.addEventListener("click", function (event) {
        if (event.target.classList.contains("remove-btn")) {
            const row = event.target.closest("tr");
            const downloadLink = row.querySelector("a");
            if (downloadLink) {
                URL.revokeObjectURL(downloadLink.href); // Free memory
            }
            row.remove();
        }
    });
});




