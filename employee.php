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

<body id="signupForm">

    <section class="container-fluid p-3 d-flex align-items-center m-3">
        <div class="logo me-3">
            <img src="./images/logo.png" alt="San Antonio Logo" width="75px" height="75px">
        </div>

        <div class="headTitle">
            <h2 class="mb-0" style="color: black"><b>BARANGAY SAN ANTONIO | MAKATI CITY</b></h2>
            <h3 class="mb-0" style="color: white">EMPLOYEE MANAGEMENT SYSTEM</h3>
        </div>
    </section>

    <section class="sidebar">
        <img src="./images/juoross.jpg" class="img-thumbnail" style="contain: cover; width: 120px; height: 120px;">
        <p>Employee ID: <b> 696969</b></p>
        <p>First Name: <b>Juoross Phillip</b></p>
        <p>Last Name: <b>Jose</b></p>
        <ul class="nav flex-column">
            <li class="nav-item"><a class="nav-link" id="announcement1" href="#announcement"
                    data-bs-toggle="tab">Announcement</a></li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" id="report1" data-bs-toggle="dropdown" href="#">Report</a>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="#caseReport" data-bs-toggle="tab">Case
                            Report</a></li>
                    <li><a class="dropdown-item" href="#documents" data-bs-toggle="tab">Documents</a>
                    </li>
                    <li><a class="dropdown-item" href="#records" data-bs-toggle="tab">Records</a></li>
                </ul>
            </li>
            <li class="nav-item leave"><a class="nav-link" id="leave1" href="#leave" data-bs-toggle="tab">Leave</a></li>
            <li class="nav-item"><a class="nav-link" id="feedback1" href="#feedback" data-bs-toggle="tab">Feedback</a>
            </li>
            <li class="nav-item"><a class="nav-link" id="salary1" href="#salary" data-bs-toggle="tab">Salary</a></li>
        </ul>
    </section>

    <section class="content">
        <div class="account-icon">
            <img src="./images/juoross.jpg" width="75px" width="75px" alt="Account"
                style="contain: cover; width: 75px; height: 75px; border-radius: 50%;">
            <p style="color: white">&nbsp;&nbsp;<b>Account</b></p>
        </div>
        <h2 id="pageTitle"><b>Welcome</b></h2>
        <div class="tab-content">
            <div id="welcome" class="tab-pane fade show active">Welcome!</div>
            <div id="announcement" class="tab-pane fade">
                <div class="container-fluid p-3">
                    <div class="row">
                        <!-- Large Content Box -->
                        <div class="col-md-8">
                            <div class="content-placeholder content-container1">
                                <p>Future Dynamic Content 1</p>
                            </div>
                        </div>
                        <!-- Small Content Box -->
                        <div class="col-md-4">
                            <div class="content-placeholder content-container2">
                                <p>Future Dynamic Content 2</p>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <!-- Full Width Content Box -->
                        <div class="col-12">
                            <div class="content-placeholder content-container3">
                                <p>Future Dynamic Content 3</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div id="caseReport" class="tab-pane fade">
                <div class="container-fluid p-3">
                    <!-- Placeholder for Future Content -->
                    <div class="content-box p-3 text-center">
                        <p>No Case Reports</p>
                    </div>

                    <!-- Case Report Form -->
                    <div class="form-container p-4 mt-3">
                        <form>
                            <div class="row mb-3">
                                <!-- Activity Input -->
                                <div class="col-md-8">
                                    <label for="activity" class="form-label">Activity</label>
                                    <input type="text" class="form-control" id="activity" placeholder="Enter activity">
                                </div>

                                <!-- Date Input -->
                                <div class="col-md-4">
                                    <label for="date" class="form-label">Date</label>
                                    <input type="date" class="form-control" id="date">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <!-- Work Accomplished Textarea -->
                                <div class="col-md-9">
                                    <label for="work" class="form-label">Work Accomplished</label>
                                    <textarea class="form-control" id="work" rows="4"
                                        placeholder="Describe the work accomplished"></textarea>
                                </div>

                                <!-- Time Input -->
                                <div class="col-md-3">
                                    <label for="time" class="form-label">Time</label>
                                    <input type="time" class="form-control" id="time">
                                </div>
                            </div>

                            <!-- Submit Button -->
                            <div class="text-end">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div id="documents" class="tab-pane fade">
                <div class="documents-container">
                    <h5><b>Documents</b></h5>
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead class="table-light">
                                <!--  SAMPLE CONTENTS -->
                                <tr>
                                    <th>Date</th>
                                    <th>Department</th>
                                    <th>File Type</th>
                                    <th>File Name</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>

                                <tr>
                                    <td>01/01/2025</td>
                                    <td>HR</td>
                                    <td>PDF</td>
                                    <td>Employee_Handbook.pdf</td>
                                    <td><a href="./Test/Manifesto.pdf" download="CommmunistManifesto.pdf"
                                            class="btn btn-primary">Download</a></td>
                                </tr>
                                <tr>
                                    <td>02/01/2025</td>
                                    <td>Finance</td>
                                    <td>Excel</td>
                                    <td>Budget_2025.xlsx</td>
                                    <td><a href="./Test/ass.jpg" download="Sauce.jpg"
                                            class="btn btn-primary">Download</a></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div id="records" class="tab-pane fade">

                <!-- Placeholder for future content -->
                <div class="content-header p-3 bg-light">
                    <h5><b>Track Work Evaluation</b></h5>
                </div>

                <!-- Work Evaluation Table -->
                <div class="container p-3">
                    <div class="evaluation-container p-3" style="background-color: #b0b0b0; border-radius: 10px;">
                        <form id="evaluationForm">
                            <table class="table table-bordered text-center">
                                <thead>
                                    <tr class="bg-secondary text-white">
                                        <th colspan="4">Performance Standards</th>
                                    </tr>
                                    <tr>
                                        <th>Criteria</th>
                                        <th>Poor</th>
                                        <th>Good</th>
                                        <th>Great</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <!-- Row Template -->
                                    <tr>
                                        <td>Work quality</td>
                                        <td><input type="radio" name="work_quality" value="Poor"></td>
                                        <td><input type="radio" name="work_quality" value="Good"></td>
                                        <td><input type="radio" name="work_quality" value="Great"></td>
                                    </tr>
                                    <tr>
                                        <td>Work autonomy</td>
                                        <td><input type="radio" name="work_autonomy" value="Poor"></td>
                                        <td><input type="radio" name="work_autonomy" value="Good"></td>
                                        <td><input type="radio" name="work_autonomy" value="Great"></td>
                                    </tr>
                                    <tr>
                                        <td>Shows initiative</td>
                                        <td><input type="radio" name="shows_initiative" value="Poor"></td>
                                        <td><input type="radio" name="shows_initiative" value="Good"></td>
                                        <td><input type="radio" name="shows_initiative" value="Great"></td>
                                    </tr>
                                    <tr>
                                        <td>Productivity</td>
                                        <td><input type="radio" name="productivity" value="Poor"></td>
                                        <td><input type="radio" name="productivity" value="Good"></td>
                                        <td><input type="radio" name="productivity" value="Great"></td>
                                    </tr>
                                    <tr>
                                        <td>Integrity</td>
                                        <td><input type="radio" name="integrity" value="Poor"></td>
                                        <td><input type="radio" name="integrity" value="Good"></td>
                                        <td><input type="radio" name="integrity" value="Great"></td>
                                    </tr>
                                    <tr>
                                        <td>Technical Skills</td>
                                        <td><input type="radio" name="technical_skills" value="Poor"></td>
                                        <td><input type="radio" name="technical_skills" value="Good"></td>
                                        <td><input type="radio" name="technical_skills" value="Great"></td>
                                    </tr>
                                    <tr>
                                        <td>Creativity</td>
                                        <td><input type="radio" name="creativity" value="Poor"></td>
                                        <td><input type="radio" name="creativity" value="Good"></td>
                                        <td><input type="radio" name="creativity" value="Great"></td>
                                    </tr>
                                    <tr>
                                        <td>Attendance</td>
                                        <td><input type="radio" name="attendance" value="Poor"></td>
                                        <td><input type="radio" name="attendance" value="Good"></td>
                                        <td><input type="radio" name="attendance" value="Great"></td>
                                    </tr>
                                    <tr>
                                        <td>Teamwork</td>
                                        <td><input type="radio" name="teamwork" value="Poor"></td>
                                        <td><input type="radio" name="teamwork" value="Good"></td>
                                        <td><input type="radio" name="teamwork" value="Great"></td>
                                    </tr>
                                </tbody>
                            </table>
                            <!-- Submit Button -->
                            <div class="text-center">
                                <button type="submit" class="btn btn-primary">Submit Evaluation</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div id="leave" class="tab-pane fade">Leave Content</div>
            <div id="feedback" class="tab-pane fade">Feedback Content</div>
            <div id="salary" class="tab-pane fade">Salary Content</div>
        </div>
    </section>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>

    <script src="./js/employee.js"></script>

</body>

</html>