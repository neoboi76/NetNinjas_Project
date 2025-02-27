<!DOCTYPE html>

<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html" charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="Content" content="Project 2 : Web Design and Development">
    <meta name="Page" content="Employee Page">

    <!--  Bootstrap stylesheet link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <!-- local CSS stylesheet link -->
    <link rel="stylesheet" href="./css/employee.css">

    <link rel="icon" href="./images/logo.png">

    <link href='https://fonts.googleapis.com/css?family=Open Sans' rel='stylesheet'>

    <title>Employee Management</title>

</head>

<body>

    <section class="container-fluid p-3 d-flex align-items-center m-3>
        <div class=" logo me-3">
        <img src="./images/logo.png" alt="San Antonio Logo" width="75px" height="75px">
        </div>

        <div class="headTitle">
            <h2 class="mb-0" style="color: black"><b>BARANGAY SAN ANTONIO | MAKATI CITY</b></h2>
            <h3 class="mb-0" style="color: white">EMPLOYEE MANAGEMENT SYSTEM</h3>
        </div>
    </section>

    <section class="sidebar">
        <img src="profile.png" class="img-thumbnail" width="100">
        <p>Employee ID: <b> 696969</b></p>
        <p>First Name: <b>Juoross Phillip</b></p>
        <p>Last Name: <b>Jose</b></p>
        <ul class="nav flex-column">
            <li class="nav-item"><a class="nav-link" href="#announcement" data-bs-toggle="tab">Announcement</a></li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#">Report</a>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="#caseReport" data-bs-toggle="tab">Case Report</a></li>
                    <li><a class="dropdown-item" href="#documents" data-bs-toggle="tab">Documents</a></li>
                    <li><a class="dropdown-item" href="#records" data-bs-toggle="tab">Records</a></li>
                </ul>
            </li>
            <li class="nav-item"><a class="nav-link" href="#leave" data-bs-toggle="tab">Leave</a></li>
            <li class="nav-item"><a class="nav-link" href="#feedback" data-bs-toggle="tab">Feedback</a></li>
            <li class="nav-item"><a class="nav-link" href="#salary" data-bs-toggle="tab">Salary</a></li>
        </ul>
    </section>

    <section class="content">
        <div class="account-icon">
            <img src="account.png" width="50" alt="Account">
            <p>Account</p>
        </div>
        <h2 id="pageTitle"><b>Welcome</b></h2>
        <div class="tab-content">
            <div id="announcement" class="tab-pane fade show active">Welcome to the system!</div>
            <div id="caseReport" class="tab-pane fade">Case Report Content</div>
            <div id="documents" class="tab-pane fade">Documents Content</div>
            <div id="records" class="tab-pane fade">Records Content</div>
            <div id="leave" class="tab-pane fade">Leave Content</div>
            <div id="feedback" class="tab-pane fade">Feedback Content</div>
            <div id="salary" class="tab-pane fade">Salary Content</div>
        </div>
    </section>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>

    <script src="./js/login.js"></script>

</body>

</html>