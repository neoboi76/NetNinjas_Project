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

    event.preventDefault(); 
    profileModal.style.display = "none";
    passwordModal.style.display = "none";

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
    // DOCUMENTS
    const viewDocumentsBtn = document.getElementById("viewDocumentsBtn");
    const viewReportsBtn = document.getElementById("viewReportsBtn");
    
    const empReportsTab = document.getElementById("empReports");
    const documentsTab = document.getElementById("empDocuments");
    //const empDocumentsTab = document.getElementById("empDocuments");

    viewDocumentsBtn.addEventListener("click", function () {
        // Hide the 'documents' tab
        empReportsTab.classList.add("d-none");

        //console.log("empReportsTab:", empReportsTab);
        //console.log("classList:", empReportsTab.classList);
        
        // Show the 'empDocuments' tab
        documentsTab.classList.remove("d-none");
        documentsTab.classList.add("show", "active");
    });

    viewReportsBtn.addEventListener("click", function () {
        // Hide the 'documents' tab
        documentsTab.classList.add("d-none");

        //console.log("empReportsTab:", empReportsTab);
        //console.log("classList:", empReportsTab.classList);

        // Show the 'empReports' tab
        empReportsTab.classList.remove("d-none");
        empReportsTab.classList.add("show", "active");
    });


    /*
    ///// CASE REPORTS
    const viewReportsBtn = document.getElementById("viewReportsBtn");
    const empReportsTab = document.getElementById("empDocuments");

    viewReportsBtn.addEventListener("click", function () {
        // Hide the 'documents' tab
        empReportsTab.classList.add("d-none");

        // Show the 'empDocuments' tab
        empReportsTab.classList.remove("d-none");
        empReportsTab.classList.add("show", "active");
    });
    */

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

document.addEventListener("DOMContentLoaded", function () {
    const leaveRequests = [
        { id: 696969, employee: "Juoross Phillip Jose", date: "March 7, 2025", reason: "May date po ako sa sogo. Pasok ako sa lunes. Salamat ssob. Peace out!" },
        { id: 222222, employee: "Jane Smith", date: "March 12, 2025", reason: "Attending a family event out of town." },
        { id: 333333, employee: "David Johnson", date: "March 15, 2025", reason: "Taking a personal day to rest and recharge." },
        { id: 444444, employee: "Emily Brown", date: "March 20, 2025", reason: "Need to handle some urgent personal matters." }
    ];

    const leaveRequestsContainer = document.getElementById("leaveRequests");

    function renderRequests() {
        leaveRequestsContainer.innerHTML = "";
        leaveRequests.forEach(request => {
           /*  const employeeId = getRandomEmployeeId(); */
            const requestDiv = document.createElement("div");
            requestDiv.classList.add("leave-request");
            requestDiv.dataset.id = request.id;
            requestDiv.innerHTML = `
                <p><strong>${request.employee} (ID: ${request.id})</strong></p>
                <p><strong>Date:</strong> ${request.date}</p>
                <p>${request.reason}</p>
                <div>
                    <button class="approve-btn">✅</button>
                    <button class="deny-btn">➖</button>
                </div>
            `;
            leaveRequestsContainer.appendChild(requestDiv);
        });
    }

    leaveRequestsContainer.addEventListener("click", function (event) {
        if (event.target.classList.contains("approve-btn") || event.target.classList.contains("deny-btn")) {
            event.target.closest(".leave-request").remove();
        }
    });

    renderRequests();
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
                <span><strong>Feedback by:</strong> ${request.from}</span>
                <span><strong>For:</strong> ${request.to}</span>
                <span><strong>Posted:</strong> ${request.date}</span>
                <div>${request.feedback}</div>
            `;

            feedbackList.appendChild(feedbackItem);
        });
    } else {
        feedbackList.innerHTML = "<p>No feedback records found.</p>";
    }
});

document.addEventListener("DOMContentLoaded", function () {
    const createInvoiceBtn = document.getElementById("createInvoiceBtn");
    const salaryList = document.getElementById("salaryList");
    const modal = document.getElementById("invoiceModal");
    const modalTitle = document.getElementById("modalTitle");
    const modalEmployeeId = document.getElementById("modalEmployeeId");
    const modalSalary = document.getElementById("modalSalary");
    const modalDate = document.getElementById("modalDate");
    const saveInvoiceBtn = document.getElementById("saveInvoiceBtn");
    const closeModalBtn = document.getElementById("closeModalBtn");

    let editingInvoice = null; // Track which invoice is being edited

    // Open modal for creating a new invoice
    createInvoiceBtn.addEventListener("click", function () {
        modalTitle.innerText = "Create Invoice";
        modalEmployeeId.value = "";
        modalSalary.value = "";
        modalDate.value = "";
        editingInvoice = null;
        modal.style.display = "flex";
    });

    // Save new invoice or update an existing one
    saveInvoiceBtn.addEventListener("click", function () {
        const employeeId = modalEmployeeId.value.trim();
        const salary = modalSalary.value.trim();
        const date = modalDate.value;

        if (!employeeId || !salary || !date) {
            alert("Please fill in all fields.");
            return;
        }

        const formData = new FormData();
        formData.append('employeeId', employeeId);
        formData.append('salary', salary);
        formData.append('date', date);

        // If editing an invoice
        if (editingInvoice) {
            formData.append('invoiceId', editingInvoice.dataset.invoiceId);
            formData.append('action', 'update');
        } else {
            formData.append('action', 'create');
        }

        // Send data to the server via AJAX
        const xhr = new XMLHttpRequest();
        xhr.open('POST', 'invoice_handler.php', true);
        xhr.onload = function () {
            if (xhr.status === 200) {
                const response = JSON.parse(xhr.responseText);
                if (response.success) {
                    if (editingInvoice) {
                        // Update the existing invoice item in the DOM
                        editingInvoice.innerHTML = `
                            <span><strong>Employee ID:</strong> ${employeeId}</span> <br>
                            <span><strong>Salary:</strong> ₱${salary}</span> <br>
                            <span><strong>Date:</strong> ${date}</span>
                        `;
                        editingInvoice.dataset.employeeId = employeeId;
                        editingInvoice.dataset.salary = salary;
                        editingInvoice.dataset.date = date;
                    } else {
                        // Create new invoice item
                        const salaryItem = document.createElement("div");
                        salaryItem.classList.add("salary-item");
                        salaryItem.dataset.invoiceId = response.invoiceId; // Get the new invoice ID from the response
                        salaryItem.dataset.employeeId = employeeId;
                        salaryItem.dataset.salary = salary;
                        salaryItem.dataset.date = date;

                        salaryItem.innerHTML = `
                            <span><strong>Employee ID:</strong> ${employeeId}</span> <br>
                            <span><strong>Salary:</strong> ₱${salary}</span> <br>
                            <span><strong>Date:</strong> ${date}</span>
                        `;

                        salaryList.appendChild(salaryItem);
                    }
                    modal.style.display = "none";
                } else {
                    alert('Error: ' + response.message);
                }
            } else {
                alert('An error occurred while saving the invoice.');
            }
        };
        xhr.send(formData);
    });

    // Close modal
    closeModalBtn.addEventListener("click", function () {
        modal.style.display = "none";
    });

    // Open modal for editing an existing invoice
    salaryList.addEventListener("click", function (event) {
        const selectedInvoice = event.target.closest(".salary-item");
        if (selectedInvoice) {
            modalTitle.innerText = "Edit Invoice";
            modalEmployeeId.value = selectedInvoice.dataset.employeeId;
            modalSalary.value = selectedInvoice.dataset.salary;
            modalDate.value = selectedInvoice.dataset.date;
            editingInvoice = selectedInvoice;
            modal.style.display = "flex";
        }
    });
});
