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

/* function loadContent(page) {

    let pageTitle = document.getElementById("pageTitle");

    let pages = {
        'announcement': `<b>Announcement</b>`,
        'leave': `<b>Leave/b>`,
    };

   pageTitle.innerHTML = ``;
   pageTitle.innerHTML = pages[page] || `<h2>Page Not Found</h2><p>Sorry, the requested content is unavailable.</p>`; 
} */