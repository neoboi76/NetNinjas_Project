document.addEventListener("DOMContentLoaded", function () {
    const tabs = document.querySelectorAll(".nav-link");
    const tabContents = document.querySelectorAll(".tab-pane");

    tabs.forEach(tab => {
        tab.addEventListener("click", function (event) {
            event.preventDefault();

            // Remove active class from all tabs
            tabs.forEach(t => t.classList.remove("active"));
            this.classList.add("active");

            // Hide all tab content
            tabContents.forEach(content => content.classList.remove("show", "active"));

            // Get target tab content and show it
            const targetTabId = this.getAttribute("href"); // Example: #caseManagement
            const targetTab = document.querySelector(targetTabId);
            if (targetTab) {
                targetTab.classList.add("show", "active");
            }
        });
    });
});


let announcementId  = document.getElementById('announcement1');
announcementId.classList.add('classBg');

document.querySelectorAll('.nav-link, .dropdown-item').forEach(item => {
    item.addEventListener('click', function () {
        let pageId = document.getElementById('pageTitle');
        let contentId = document.querySelectorAll('.tab-pane');
        let navId = document.querySelectorAll('.nav-link');

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
    

});

document.getElementById("addMediaBtn").addEventListener("click", function () {
    document.getElementById("mediaInput").click();
});

document.getElementById("mediaInput").addEventListener("change", function (event) {
    const files = event.target.files;
    let areaId = prompt("Enter content area number (or type 'new' to create a new area):");

    if (!areaId) return;

    let mediaContainer = document.querySelector(`#content${areaId} .content-area`);

    if (areaId.toLowerCase() === "new") {
        mediaContainer = createNewContentArea();
    } else if (!mediaContainer) {
        alert("Invalid area. Creating a new content area.");
        mediaContainer = createNewContentArea();
    }

    for (let file of files) {
        const mediaItem = document.createElement("div");
        mediaItem.classList.add("media-item");

        const deleteBtn = document.createElement("button");
        deleteBtn.classList.add("delete-btn");
        deleteBtn.textContent = "X";
        deleteBtn.onclick = () => mediaItem.remove();

        if (file.type.startsWith("image/")) {
            const img = document.createElement("img");
            img.src = URL.createObjectURL(file);
            mediaItem.appendChild(img);
        } else if (file.type.startsWith("video/")) {
            const video = document.createElement("video");
            video.src = URL.createObjectURL(file);
            video.controls = true;
            mediaItem.appendChild(video);
        }

        mediaItem.appendChild(deleteBtn);
        mediaContainer.appendChild(mediaItem);
    }
});


// Function to dynamically create a new content area
function createNewContentArea() {
    let newAreaId = `content${document.querySelectorAll(".content-placeholder").length + 1}`;

    const newRow = document.createElement("div");
    newRow.classList.add("row", "mt-3");

    const newCol = document.createElement("div");
    newCol.classList.add("col-12");

    const newContainer = document.createElement("div");
    newContainer.classList.add("content-placeholder", "content-container");
    newContainer.id = newAreaId;

    const newContentArea = document.createElement("div");
    newContentArea.classList.add("content-area");

    newContainer.appendChild(newContentArea);
    newCol.appendChild(newContainer);
    newRow.appendChild(newCol);

    document.getElementById("announcement").appendChild(newRow);
    return newContentArea;
}




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
    // Buttons
    const enableEmployeeBtn = document.getElementById("enableEmployeeBtn");
    const disableEmployeeBtn = document.getElementById("disableEmployeeBtn");

    // Modals
    const enableEmployeeModal = document.getElementById("employeeEnableModal");
    const disableEmployeeModal = document.getElementById("employeeDisableModal");

    // Close buttons
    const closeEnableModal = enableEmployeeModal.querySelector(".employeeEnable-close");
    const closeDisableModal = disableEmployeeModal.querySelector(".employeeDisable-close");

    const body = document.body;

    // Ensure modals start hidden
    enableEmployeeModal.style.display = "none";
    disableEmployeeModal.style.display = "none";

    // Open Enable Employee Modal
    enableEmployeeBtn.addEventListener("click", function () {
        enableEmployeeModal.style.display = "flex";
        setTimeout(() => enableEmployeeModal.classList.add("show"), 10);
        body.classList.add("employeeEnable-modal-open");
    });

    // Open Disable Employee Modal
    disableEmployeeBtn.addEventListener("click", function () {
        disableEmployeeModal.style.display = "flex";
        setTimeout(() => disableEmployeeModal.classList.add("show"), 10);
        body.classList.add("employeeDisable-modal-open");
    });

    // Close Enable Employee Modal
    closeEnableModal.addEventListener("click", function () {
        enableEmployeeModal.classList.add("hide");
        enableEmployeeModal.classList.remove("show");

        setTimeout(() => {
            enableEmployeeModal.style.display = "none";
            enableEmployeeModal.classList.remove("hide");
        }, 300);
        body.classList.remove("employeeEnable-modal-open");
    });

    // Close Disable Employee Modal
    closeDisableModal.addEventListener("click", function () {
        disableEmployeeModal.classList.add("hide");
        disableEmployeeModal.classList.remove("show");

        setTimeout(() => {
            disableEmployeeModal.style.display = "none";
            disableEmployeeModal.classList.remove("hide");
        }, 300);
        body.classList.remove("employeeDisable-modal-open");
    });
});

document.getElementById("addProfilePicBtn").addEventListener("click", function() {
    document.getElementById("profilePicInput").click();
});

document.getElementById("profilePicInput").addEventListener("change", function(event) {
    const file = event.target.files[0];
    if (file) {
        const reader = new FileReader();
        reader.onload = function(e) {
            document.getElementById("profilePreview").src = e.target.result;
        };
        reader.readAsDataURL(file);
    }
});

document.getElementById("editProfilePicBtn").addEventListener("click", function() {
    document.getElementById("editProfilePicInput").click();
});

document.getElementById("editProfilePicInput").addEventListener("change", function(event) {
    const file = event.target.files[0];
    if (file) {
        const reader = new FileReader();
        reader.onload = function(e) {
            document.getElementById("editProfilePreview").src = e.target.result;
        };
        reader.readAsDataURL(file);
    }
});

document.addEventListener("DOMContentLoaded", function () {
    const openModalBtn = document.getElementById("openModal");
    const closeModalBtn = document.getElementById("closeModal");
    const modal = document.getElementById("caseModal");
    const overlay = document.getElementById("modalOverlay");
    const assignCaseBtn = document.getElementById("assignCase");
    const contentContainer = document.getElementById("contentContainer");
    const caseTableBody = document.getElementById("caseTableBody");
    let caseCounter = 1;

    // Open modal function
    openModalBtn.addEventListener("click", function () {
        modal.style.display = "block";
        overlay.style.display = "block";
        contentContainer.classList.add("modal-active");
    });

    // Close modal function
    closeModalBtn.addEventListener("click", function () {
        modal.style.display = "none";
        overlay.style.display = "none";
        contentContainer.classList.remove("modal-active");
    });

    // Assign case function
    assignCaseBtn.addEventListener("click", function () {

        document.getElementById("hiddenDescription").value = document.getElementById("descriptionBox").innerText;

        const employeeId = document.getElementById("employeeId").value.trim();
        const activity = document.getElementById("activity").value.trim();
        const description = document.getElementById("hiddenDescription").value.trim();
        const dateAssigned = document.getElementById("dateAssigned").value;

        if (employeeId === "" || activity === "" || description === "" || dateAssigned === "") {
            alert("Please fill in all fields.");
            return;
        }

        // Add new row to table
        const newRow = document.createElement("tr");
        newRow.innerHTML = `
            <td>${caseCounter++}</td>
            <td>${employeeId}</td>
            <td>${activity}</td>
            <td>${description}</td>
            <td>${dateAssigned}</td>
            <td>In Progress</td>
        `;
        caseTableBody.appendChild(newRow);

        // Clear form fields
        document.getElementById("caseForm").reset();

        // Close modal
        modal.style.display = "none";
        overlay.style.display = "none";
        contentContainer.classList.remove("modal-active");
    });

    // Close modal when clicking outside
    overlay.addEventListener("click", function () {
        modal.style.display = "none";
        overlay.style.display = "none";
        contentContainer.classList.remove("modal-active");
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

        const formData = new FormData();
        formData.append("file", file);

        // Send the file to the backend (upload.php)
        fetch("uploadfile.php", {
            method: "POST",
            body: formData
        })
        .then(response => response.text())
        .then(data => {
            console.log(data); // Check server response

            if (data.includes("File uploaded successfully")) {
                const fileName = file.name;
                const fileType = file.type.split("/")[1]?.toUpperCase() || "Unknown";
                const currentDate = new Date().toLocaleDateString();

                // Create a new row in the table
                const newRow = document.createElement("tr");
                newRow.innerHTML = `
                    <td>${currentDate}</td>
                    <td>General</td>
                    <td>${fileType}</td>
                    <td>${fileName}</td>
                    <td>
                        <a href="https://storage.googleapis.com/websys-uploads/${fileName}" target="_blank" class="btn btn-primary">Download</a>
                        <button class="btn btn-danger remove-btn">Remove</button>
                    </td>
                `;

                documentsTable.appendChild(newRow);
                fileInput.value = "";
            } else {
                alert("Upload failed: " + data);
            }
        })
        .catch(error => {
            console.error("Error:", error);
            alert("An error occurred while uploading.");
        });
    });

    // Remove document (From Table + Database)
    // Handle remove button click
    documentsTable.addEventListener("click", function (event) {
        if (event.target.classList.contains("remove-btn")) {
            const row = event.target.closest("tr");
            const fileId = event.target.getAttribute("data-id");

            if (!fileId) {
                alert("Error: Missing file ID.");
                return;
            }

            if (!confirm("Are you sure you want to delete this file record?")) {
                return;
            }

            fetch("deletefile.php", {
                method: "POST",
                headers: { "Content-Type": "application/json" },
                body: JSON.stringify({ file_id: fileId }) // Send only file_id
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    row.remove(); // Remove row from table
                } else {
                    alert("Error deleting record: " + data.message);
                }
            })
            .catch(error => {
                console.error("Error:", error);
                alert("An error occurred while deleting the record.");
            });
        }
    });
});

/*
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
*/

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