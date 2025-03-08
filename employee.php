<?php
// Include the file that fetches the employee details
include('getempdetail.php'); // or use require()
?>

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
        <!--
        <p>Employee ID: <b> 696969</b></p>
        <p>First Name: <b>Juoross Phillip</b></p>
        <p>Last Name: <b>Jose</b></p>
        -->
        <p>Employee ID: <b><?php echo $employee['EMP_ID']; ?></b></p>
        <p>First Name: <b><?php echo $employee['EMP_FNAME']; ?></b></p>
        <p>Last Name: <b><?php echo $employee['EMP_LNAME']; ?></b></p>
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
            <p style="color: white">&nbsp;&nbsp;<b>Settings</b></p>
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

            <div id="leave" class="tab-pane fade">
                <div class="container p-4 bg-light rounded">
                    <h4 class="mb-3"><b>Leave Request Form</b></h4>

                    <form method="POST">
                        <!-- Reason Field -->
                        <div class="mb-3">
                            <label for="reason" class="form-label">Reason</label>
                            <textarea name = "leave_reason" id="reason" class="form-control" rows="3"
                                placeholder="Enter your reason"></textarea>
                        </div>

                        <!-- Description Field -->
                        <div class="mb-3">
                            <label for="description" class="form-label">Description</label>
                            <textarea name = "leave_descript" id="description" class="form-control" rows="3"
                                placeholder="Provide additional details"></textarea>
                        </div>

                        <div class="row">
                            <!-- Date of Leave -->
                            <div class="col-md-6">
                                <label for="dateLeave" class="form-label">Date of Leave</label>
                                <input name = "leave_start" type="date" id="dateLeave" class="form-control">
                            </div>

                            <!-- Date of Return -->
                            <div class="col-md-6">
                                <label for="dateReturn" class="form-label">Date of Return</label>
                                <input name = "leave_return" type="date" id="dateReturn" class="form-control">
                            </div>
                        </div>

                        <!-- Submit Button -->
                        <div class="mt-3 text-center">
                            <button name = "leave_emp_submit" type="submit" class="btn btn-primary w-10">Submit</button>
                        </div>
                    </form>
                </div>
            </div>

            <!--PHP LEAVE REQUEST-->
            <?php 
                include 'connection.php';

                if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['leave_emp_submit'])){
                    $leave_reason = $_POST['leave_reason'];
                    $leave_descript = $_POST['leave_descript'];
                    $leave_start = $_POST['leave_start'];
                    $leave_return = $_POST['leave_return'];

                    if(isset($_SESSION['EMP_ID'])){
                        $leave_emp_id = $_SESSION['EMP_ID'];

                        $leave_rq_sql = "INSERT INTO leave_request (LEAVERQ_REASON, LEAVERQ_DESCRIPT, LEAVERQ_DATELEAVE, LEAVERQ_RETURN, EMP_ID) 
                         VALUES (?, ?, ?, ?, ?)";
        
                        $leave_rq_dbadd = $conn->prepare($leave_rq_sql);
                        $leave_rq_dbadd->bind_param("ssssi", $leave_reason, $leave_descript, $leave_start, $leave_return, $leave_emp_id);

                        if ($leave_rq_dbadd->execute()) {
                            echo "<script>alert('Leave request submitted successfully!');</script>";
                            echo "<script>window.location.href = window.location.href;</script>";
                        } else {
                            echo "<script>alert('Error submitting leave request: " . $leave_rq_dbadd->error . "');</script>";
                            echo "<script>window.location.href = window.location.href;</script>";
                        }
                        $leave_rq_dbadd->close();
                    } else {
                        echo "<script>alert('Error: Employee ID is missing. Please log in again.');</script>";
                        echo "<script>window.location.href = window.location.href;</script>";
                    }
                }

                $conn->close()

            ?>

            <div id="feedback" class="tab-pane fade">
                <div class="container p-4 bg-light rounded">

                    <!-- Feedback Viewing Section -->
                    <div class="list-group">
                        <div class="list-group-item">
                            <h6 class="mb-1"><b>From: Maylyn Bautista (Manager)</b></h6>
                            <p class="mb-1">Heneraaaaaaal! Nangopya ka nanaman! Masisingko ka nanaman ulit saken. Hay
                                jusko, lagi nalang, di ka na ba nasasawa saaken?</p>
                            <small class="text-muted">Received on: 02/15/2024</small>
                        </div>
                        <div class="list-group-item">
                            <h6 class="mb-1"><b>From: Dr. William Rey (HR)</b></h6>
                            <p class="mb-1">Mr. Jose, can you give me a good reason why not to terminate you right now?
                                Your co-worker [Redacted] filed a complaint of sexual assualt, citing that you
                                "touched my private parts during our break". What do you have to say for yourself?</p>
                            <small class="text-muted">Received on: 01/10/2024</small>
                        </div>
                    </div>

                    <!-- Review Superior Button -->
                    <div class="text-center mt-4">
                        <button id="reviewSuperiorBtn" class="btn btn-primary">Review Superior</button>

                    </div>
                </div>
            </div>

            <div id="reviewSuperior" class="tab-pane fade">
                <div class="container p-4 bg-light rounded">
                    <h4 class="mb-3 text-center"><b>Review Your Direct Superior (Maylyn Bautista)</b></h4>
                    <!-- Make the name of the superior dynamic.-->

                    <form>
                        <div class="mb-3">
                            <label for="superiorFeedback" class="form-label">Your Feedback</label>
                            <textarea class="form-control" id="superiorFeedback" rows="4"
                                placeholder="Write your feedback here..."></textarea>
                        </div>
                        <div class="text-center">
                            <button type="submit" class="btn btn-success">Submit Feedback</button>
                        </div>
                    </form>

                    <!-- Back Button -->
                    <div class="text-center mt-3">
                        <button id="backToFeedbackBtn" class="btn btn-secondary">Back</button>
                    </div>
                </div>
            </div>


            <!-- SAMPLE CONTENT MAKE DYNAMIC SOON -->

            <div id="salary" class="tab-pane fade">
                <div class="container p-4 bg-light rounded">
                    <h4 class="mb-3 text-center"><b>Invoices</b></h4>

                    <!-- Salary Deposit Entries -->
                    <div class="list-group">
                        <a href="#"
                            class="list-group-item list-group-item-action d-flex justify-content-between align-items-center">
                            <b>₱100,000.00 was deposited for January 2024</b>
                            <span class="badge bg-secondary">01/31/2024</span>
                        </a>
                        <a href="#"
                            class="list-group-item list-group-item-action d-flex justify-content-between align-items-center">
                            <b>₱80,000.00 was deposited for February 2024</b>
                            <span class="badge bg-secondary">02/29/2024</span>
                        </a>
                        <a href="#"
                            class="list-group-item list-group-item-action d-flex justify-content-between align-items-center">
                            <b>₱120,000.00 was deposited for March 2024</b>
                            <span class="badge bg-secondary">03/31/2024</span>
                        </a>
                        <a href="#"
                            class="list-group-item list-group-item-action d-flex justify-content-between align-items-center">
                            <b>₱100,000.00 was deposited for April 2024</b>
                            <span class="badge bg-secondary">04/30/2024</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <!-- SAMPLE CONTENT MAKE DYNAMIC SOON -->
        <div id="profileModal" class="profile-modal">
            <div class="profile-content">
                <span class="close-btn">&larr;</span>
                <div class="profile-header">
                    <img src="./images/juoross.jpg" alt="Profile Picture" class="profile-img">
                    <h3>Employee ID: <?php echo $employee['EMP_ID']; ?></h3>
                    <p>Joined in <?php echo $employee['EMP_JOINED']; ?></p>
                </div>

                <div class="profile-info">
                    <p><strong>First Name:</strong> <?php echo $employee['EMP_FNAME']; ?></p>
                    <p><strong>Last Name:</strong> <?php echo $employee['EMP_LNAME']; ?></p>
                    <p><strong>Phone/Cellphone Number:</strong> <?php echo $employee['EMP_PHONENUM']; ?></p>
                    <p><strong>Birthdate:</strong> <?php echo $employee['EMP_BIRTH']; ?></p>
                    <p><strong>Role:</strong> <?php echo $employee['EMP_POS']; ?></p>
                    <div class="password-section">
                        <label><strong>Password:</strong></label>
                        <input type="password" value="<?php echo $employee['EMP_PASS']; ?>" id="mainPassword" disabled>
                        <a href="#" id="changePasswordLink">Change password?</a>
                    </div>
                </div>
            </div>
        </div>

        <div id="passwordModal" class="profile-modal">
            <div class="profile-content">
                <span class="close-btn" id="closePasswordModal">&larr;</span>
                <h4 class="text-center">Change Password</h4>

                <div class="password-container">
                    <form action="">
                        <input type="password" id="currentPassword" placeholder="Current Password">
                        <input type="password" id="newPassword" placeholder="New Password">
                        <input type="password" id="confirmPassword" placeholder="Confirm Password">
                        <button id="savePassword" type="submit" class="btn btn-success">Save Password</button>
                    </form>
                </div>
            </div>
        </div>

    </section>

    <script src="js\savepassword.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>

    <script src="js\employee.js"></script>

</body>

</html>