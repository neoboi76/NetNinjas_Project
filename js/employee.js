document.addEventListener("DOMContentLoaded", function () {
    const tabs = document.querySelectorAll(".nav-link");
    const tabContents = document.querySelectorAll(".tab-pane");

    // Set announcement as default active tab on page load
    const defaultTab = document.querySelector(".nav-link[href='#announcement']");
    if (defaultTab) {
        defaultTab.classList.add("active");
    }

    const defaultContent = document.getElementById("announcement");
    if (defaultContent) {
        defaultContent.classList.add("show", "active");
    }

    tabs.forEach(tab => {
        tab.addEventListener("click", function (event) {
            event.preventDefault();

            // Remove active class from all tabs and content
            tabs.forEach(t => t.classList.remove("active"));
            tabContents.forEach(content => content.classList.remove("show", "active"));

            // Activate clicked tab and corresponding content
            this.classList.add("active");
            const targetTabId = this.getAttribute("href");
            const targetTab = document.querySelector(targetTabId);
            if (targetTab) {
                targetTab.classList.add("show", "active");
            }
        });
    });
});

document.addEventListener("DOMContentLoaded", async function () {
    let profileImages = document.querySelectorAll(".profile-img");

    try {
        let response = await fetch("fetchpfp.php");
        let data = await response.json();

        if (data.profilePicture) {
            profileImages.forEach(img => {
                img.src = data.profilePicture;
            });
        } else {
            console.error("Profile picture not found in response.");
        }
    } catch (error) {
        console.error("Error fetching profile picture:", error);
    }
});

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

document.addEventListener("DOMContentLoaded", function () {
    function loadMediaForArea(areaId) {
        fetch("loadannouncement.php")
            .then(response => response.json())
            .then(data => {
                console.log("Fetched media data: ", data);

                data.forEach(media => {
                    const mediaContainer = document.querySelector(`#content${media.area} .content-area`);

                    console.log(`Targeting container: #content${media.area} .content-area`);
                    console.log(mediaContainer);

                    if (mediaContainer && !mediaContainer.classList.contains("loaded")) {
                        const mediaItem = document.createElement("div");
                        mediaItem.classList.add("media-item");

                        const imageUrl = media.signedUrl;
                        console.log("Image URL: ", imageUrl);

                        if (!imageUrl) {
                            console.error("No signed URL for media: ", media);
                            return;
                        }

                        const fileExtension = media.path.split('.').pop().toLowerCase();
                        const mimeTypeMap = {
                            'jpg': 'image/jpeg',
                            'jpeg': 'image/jpeg',
                            'png': 'image/png',
                            'gif': 'image/gif',
                            'mp4': 'video/mp4',
                            'webm': 'video/webm'
                        };

                        const mimeType = mimeTypeMap[fileExtension];
                        if (!mimeType) {
                            console.error("Unsupported media type: " + fileExtension);
                            return;
                        }

                        if (mimeType.startsWith("image/")) {
                            const img = document.createElement("img");
                            img.src = imageUrl;
                            mediaItem.appendChild(img);
                        } else if (mimeType.startsWith("video/")) {
                            const video = document.createElement("video");
                            video.src = imageUrl;
                            video.controls = true;
                            mediaItem.appendChild(video);
                        }

                        mediaContainer.appendChild(mediaItem);
                        mediaContainer.classList.add("loaded");
                    } else {
                        console.error("Media container not found for area: ", media.area);
                    }
                });
            })
            .catch(error => console.error("Error loading media:", error));
    }

    function observeContentAreas() {
        const contentAreas = document.querySelectorAll('.content-container');

        const observer = new IntersectionObserver((entries, observer) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    const areaId = entry.target.id.replace('content', '');
                    console.log("IntersectionObserver triggering for area:", areaId);

                    if (!entry.target.classList.contains("loaded")) {
                        loadMediaForArea(Number(areaId));
                        entry.target.classList.add("loaded");
                    }

                    observer.unobserve(entry.target);
                }
            });
        }, {
            root: null,
            threshold: 0.5,
        });

        contentAreas.forEach(area => {
            observer.observe(area);
        });
    }

    observeContentAreas();
});

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
    document.getElementById("empReviewSuperiorForm").addEventListener("submit", function (event) {
        event.preventDefault(); // Prevent form from reloading

        submitSuperiorFeedback(this);
    });
});

function submitSuperiorFeedback(form) {
    let formData = new FormData(form);

    fetch("submit_superior_feedback.php", {
        method: "POST",
        headers: { "Content-Type": "application/json" },
        body: JSON.stringify({
            feedback: formData.get("feedback-text")
        })
    })
    .then(response => {
        if (!response.ok) {
            throw new Error(`HTTP error! Status: ${response.status}`);
        }
        return response.json();
    })
    .then(data => {
        alert(data.message);
        if (data.success) {
            form.reset(); // Clear the form after successful submission
        }
    })
    .catch(error => {
        console.error("Error:", error);
        alert("An unexpected error occurred. Check console for details.");
    });
}


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
