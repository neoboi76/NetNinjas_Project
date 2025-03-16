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
        <img src="" class="img-thumbnail profile-img" style="contain: cover; width: 120px; height: 120px;">

        <p>Employee ID: <b><?php echo $employee['EMP_ID']; ?></b></p>
        <p>First Name: <b><?php echo $employee['EMP_FNAME']; ?></b></p>
        <p>Last Name: <b><?php echo $employee['EMP_LNAME']; ?></b></p>
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link active" id="announcement1" href="#announcement" data-bs-toggle="tab">Announcement</a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" id="report1" data-bs-toggle="dropdown" href="#">Report</a>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" id="caseReport1" href="#caseReport" data-bs-toggle="tab">Case
                            Report</a></li>
                    <li><a class="dropdown-item" id="documents1" href="#documents" data-bs-toggle="tab">Documents</a>
                    </li>
                </ul>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="leave1" href="#leave" data-bs-toggle="tab">Leave</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="feedback1" href="#feedback" data-bs-toggle="tab">Feedback</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="salary1" href="#salary" data-bs-toggle="tab">Salary</a>
            </li>
        </ul>

    </section>

    <section class="content">
        <div class="account-icon">
            <img src="" class="profile-img" width="75px" width="75px" alt="Account"
                style="contain: cover; width: 75px; height: 75px; border-radius: 50%;">
            <p style="color: white">&nbsp;&nbsp;<b>Settings</b></p>
        </div>
        <h2 id="pageTitle"><b>Announcement</b></h2>
        <div class="tab-content">
            <div id="welcome" class="tab-pane fade">
                <!-- <div class="container-fluid p-3">

                </div> -->
            </div>
            <div id="announcement" class="tab-pane fade show active">
                <div class="container-fluid p-3">
                    <div class="text-left p-2">
                        <input type="file" id="mediaInput" accept="image/*,video/*,gif/*" multiple
                            style="display: none;">
                    </div>

                    <div class="row">
                        <div class="col-md-8 col-sm-12">
                            <div class="content-placeholder content-container" id="content1">
                                <div class="content-area"></div>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-12">
                            <div class="content-placeholder content-container" id="content2">
                                <div class="content-area"></div>
                            </div>
                        </div>
                    </div>

                    <div class="row mt-3">
                        <div class="col-12">
                            <div class="content-placeholder content-container" id="content3">
                                <div class="content-area"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- PHP FOR DONE HANDLING-->
            <?php
            include 'connection.php';

            // Get the logged-in employee's ID
            $employeeId = $_SESSION['EMP_ID']; // Adjust this based on your session variable
            
            // -------------------- HANDLE "MARK AS DONE" ACTION -------------------
            if (isset($_POST['case_id_done'])) {
                $caseId = intval($_POST['case_id_done']); // Sanitize input to ensure it's an integer
            
                // Update case status to 'Done'
                $sql_update = "UPDATE cases SET CASE_STATUS = 'Done' WHERE CASE_ID = ? AND EMP_ID_FK_CASE = ?";
                $stmt_update = $conn->prepare($sql_update);
                $stmt_update->bind_param("ii", $caseId, $employeeId);

                if ($stmt_update->execute()) {
                    echo "<script>alert('Case marked as done successfully!'); window.location.href=window.location.href;</script>";
                } else {
                    echo "<script>alert('Failed to mark case as done: " . $stmt_update->error . "');</script>";
                }

                $stmt_update->close();
            }
            // ---------------------------------------------------------------------
            ?>

            <div id="caseReport" class="tab-pane fade">
                <div class="container-fluid p-3">
                    <!-- Placeholder for Future Content -->
                    <div class="content-box text-center d-flex flex-column align-items-center gap-3 p-3">
                        <h3>Active Assigned Cases</h3>
                        <div class="assignedCases-list w-100" style="max-width: 100%; width: 100%;">

                            <?php
                            // ---------------- FETCH CASES IN PROGRESS -------------------
                            $sql_fetch_cases = "SELECT * FROM cases WHERE EMP_ID_FK_CASE = ? AND CASE_STATUS = 'In Progress' ORDER BY CASE_DATE DESC";
                            $stmt = $conn->prepare($sql_fetch_cases);
                            $stmt->bind_param("i", $employeeId);
                            $stmt->execute();
                            $result = $stmt->get_result();

                            if ($result->num_rows > 0) {
                                while ($row = $result->fetch_assoc()) { ?>
                                    <div class="border rounded-3 p-3 mb-3 bg-light shadow-sm case-container"
                                        style="width: 100%; box-sizing: border-box;">

                                        <div class="d-flex justify-content-between align-items-center mb-2 flex-wrap">
                                            <div><strong>ID:</strong> <?php echo htmlspecialchars($row['CASE_ID']); ?></div>
                                            <div><strong>Subject:</strong> <?php echo htmlspecialchars($row['CASE_SUBJ']); ?>
                                            </div>
                                            <div><strong>Issued:</strong> <?php echo htmlspecialchars($row['CASE_DATE']); ?>
                                            </div>
                                            <!-- Form to mark as done -->
                                            <form method="POST" action="" class="m-0">
                                                <input type="hidden" name="case_id_done" value="<?php echo $row['CASE_ID']; ?>">
                                                <button type="submit" class="btn btn-success btn-sm">Mark as Done</button>
                                            </form>
                                        </div>

                                        <div class="text-start mt-2">
                                            <p class="m-0"><?php echo nl2br(htmlspecialchars($row['CASE_DESC'])); ?></p>
                                        </div>
                                    </div>
                                <?php }
                            } else {
                                echo "<p class='text-muted'>No active cases assigned to you.</p>";
                            }

                            $stmt->close();
                            $conn->close();
                            // -------------------------------------------------------------------
                            ?>

                        </div>
                    </div>

                    <!-- Case Report Form -->
                    <div class="form-container p-4 mt-3">
                        <form method="POST">
                            <div class="row mb-3">
                                <!-- Activity Input -->
                                <div class="col-md-8">
                                    <label for="activity" class="form-label">Activity</label>
                                    <input name="emp_case_activity" type="text" class="form-control" id="activity"
                                        placeholder="Enter Case ID">
                                </div>

                                <!-- Date Input -->
                                <div class="col-md-4">
                                    <label for="date" class="form-label">Date</label>
                                    <input name="emp_case_date" type="date" class="form-control" id="date">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <!-- Work Accomplished Textarea -->
                                <div class="col-md-9">
                                    <label for="work" class="form-label">Work Accomplished</label>
                                    <textarea name="emp_case_accomplished" class="form-control" id="work" rows="4"
                                        placeholder="Describe the work accomplished"></textarea>
                                </div>

                                <!-- Time Input -->
                                <div class="col-md-3">
                                    <label for="time" class="form-label">Time</label>
                                    <input name="emp_case_time" type="time" class="form-control" id="time">
                                </div>
                            </div>

                            <!-- Submit Button -->
                            <div class="text-end">
                                <button name="emp_case_submit" type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <!-- PHP CASE REPORT-->
            <?php
            include "connection.php";

            if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['emp_case_submit'])) {
                $emp_case_activity = $_POST['emp_case_activity'];
                $emp_case_date = $_POST['emp_case_date'];
                $emp_case_accomplished = $_POST['emp_case_accomplished'];
                $emp_case_time = $_POST['emp_case_time'];

                if (isset($_SESSION['EMP_ID'])) {
                    $case_emp_id = $_SESSION['EMP_ID'];

                    $case_sql_add = "INSERT INTO report (RPT_ACT, RPT_ACCOMP, RPT_DATE, RPT_TIME, EMP_ID) VALUES (?, ?, ?, ?, ?)";
                    $case_db_add = $conn->prepare($case_sql_add);
                    $case_db_add->bind_param("ssssi", $emp_case_activity, $emp_case_accomplished, $emp_case_date, $emp_case_time, $case_emp_id);

                    // Execute statement
                    if ($case_db_add->execute()) {
                        echo "<script>alert('Case Report Successfully Submitted!');</script>";
                        echo "<script>window.location.href = window.location.href;</script>";
                    } else {
                        echo "<script>alert('Error: " . $case_db_add->error . "');</script>";
                        echo "<script>window.location.href = window.location.href;</script>";
                    }

                    $case_db_add->close();
                } else {
                    echo "<script>alert('Error: Employee ID is missing!');</script>";
                    echo "<script>window.location.href = window.location.href;</script>";
                }
            }

            $conn->close();
            ?>

            <div id="documents" class="tab-pane fade">
                <div class="documents-container">
                    <h5><b>Documents</b></h5>
                    <div class="table-container">
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead class="table-light">
                                    <tr>
                                        <th>Date</th>
                                        <th>File Type</th>
                                        <th>File Name</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    include 'connection.php';

                                    $sql_fetch_feedback = "SELECT * FROM files ORDER BY F_DATE DESC";
                                    $stmt = $conn->prepare($sql_fetch_feedback);
                                    $stmt->execute();
                                    $result = $stmt->get_result();

                                    if ($result->num_rows > 0) {
                                        while ($row = $result->fetch_assoc()) { ?>
                                            <tr>
                                                <td><?php echo $row['F_DATE']; ?></td>
                                                <td><?php echo $row['F_TYPE']; ?></td>
                                                <td><?php echo $row['F_NAME']; ?></td>
                                                <td>
                                                    <a href="generate_signed_url.php?file=<?php echo urlencode($row['F_PATH']); ?>"
                                                        class="btn btn-primary">Download</a>
                                                </td>
                                            </tr>
                                        <?php }
                                    } else {
                                        echo "<tr><td colspan='4'>No feedback records found.</td></tr>";
                                    }

                                    $stmt->close();
                                    $conn->close();
                                    ?>
                                </tbody>
                            </table>
                        </div>
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
                            <textarea name="leave_reason" id="reason" class="form-control" rows="3"
                                placeholder="Enter your reason"></textarea>
                        </div>

                        <!-- Description Field -->
                        <div class="mb-3">
                            <label for="description" class="form-label">Description</label>
                            <textarea name="leave_descript" id="description" class="form-control" rows="3"
                                placeholder="Provide additional details"></textarea>
                        </div>

                        <div class="row">
                            <!-- Date of Leave -->
                            <div class="col-md-6">
                                <label for="dateLeave" class="form-label">Date of Leave</label>
                                <input name="leave_start" type="date" id="dateLeave" class="form-control">
                            </div>

                            <!-- Date of Return -->
                            <div class="col-md-6">
                                <label for="dateReturn" class="form-label">Date of Return</label>
                                <input name="leave_return" type="date" id="dateReturn" class="form-control">
                            </div>
                        </div>

                        <!-- Submit Button -->
                        <div class="mt-3 text-center">
                            <button name="leave_emp_submit" type="submit" class="btn btn-primary w-10">Submit</button>
                        </div>
                    </form>
                </div>

                <!-- Leave Request History Section -->
                <div class="container p-4 mt-4 bg-light rounded">
                    <h4 class="mb-3"><b>Leave Request History</b></h4>
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead class="table-dark">
                                <tr>
                                    <th>Reason</th>
                                    <th>Description</th>
                                    <th>Date of Leave</th>
                                    <th>Date of Return</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody id="leaveHistory">
                                <!-- Data will be dynamically inserted here -->
                                <?php
                                include 'connection.php';

                                // Assume session is already started and EMP_ID is stored in session
                                $current_emp_id = $_SESSION['EMP_ID'] ?? null;

                                if ($current_emp_id) {
                                    // Fetch leave requests that match the current employee ID
                                    $sql = "SELECT LEAVERQ_REASON, LEAVERQ_DESCRIPT, LEAVERQ_DATELEAVE, LEAVERQ_RETURN, LEAVERQ_STATUS 
                                                FROM leave_request 
                                                WHERE EMP_ID = ? 
                                                ORDER BY LEAVERQ_DATELEAVE DESC";

                                    $stmt = $conn->prepare($sql);
                                    $stmt->bind_param("i", $current_emp_id);
                                    $stmt->execute();
                                    $result = $stmt->get_result();

                                    // Check if there are records
                                    if ($result->num_rows > 0) {
                                        while ($row = $result->fetch_assoc()) {
                                            // Determine badge class based on status
                                            $badgeClass = 'bg-warning'; // default for Pending
                                            if ($row['LEAVERQ_STATUS'] === 'Approved') {
                                                $badgeClass = 'bg-success';
                                            } elseif ($row['LEAVERQ_STATUS'] === 'Denied') {
                                                $badgeClass = 'bg-danger';
                                            }

                                            echo "<tr>
                                                    <td>" . htmlspecialchars($row['LEAVERQ_REASON']) . "</td>
                                                    <td>" . htmlspecialchars($row['LEAVERQ_DESCRIPT']) . "</td>
                                                    <td>" . htmlspecialchars($row['LEAVERQ_DATELEAVE']) . "</td>
                                                    <td>" . htmlspecialchars($row['LEAVERQ_RETURN']) . "</td>
                                                    <td><span class='badge $badgeClass'>" . htmlspecialchars($row['LEAVERQ_STATUS']) . "</span></td>
                                                </tr>";
                                        }
                                    } else {
                                        echo "<tr><td colspan='5' style='text-align: center;'>No leave requests found.</td></tr>";
                                    }

                                    $stmt->close();
                                } else {
                                    echo "<tr><td colspan='5' style='text-align: center;'>Employee not logged in.</td></tr>";
                                }

                                $conn->close();

                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <!--PHP LEAVE REQUEST-->
            <?php
            include 'connection.php';

            if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['leave_emp_submit'])) {
                $leave_reason = $_POST['leave_reason'];
                $leave_descript = $_POST['leave_descript'];
                $leave_start = $_POST['leave_start'];
                $leave_return = $_POST['leave_return'];

                if (isset($_SESSION['EMP_ID'])) {
                    $leave_emp_id = $_SESSION['EMP_ID'];

                    $leave_rq_sql = "INSERT INTO leave_request (LEAVERQ_REASON, LEAVERQ_DESCRIPT, LEAVERQ_DATELEAVE, LEAVERQ_RETURN, EMP_ID) 
                                        VALUES (?, ?, ?, ?, ?)";
                    $leave_rq_dbadd = $conn->prepare($leave_rq_sql);
                    $leave_rq_dbadd->bind_param("ssssi", $leave_reason, $leave_descript, $leave_start, $leave_return, $leave_emp_id);

                    if ($leave_rq_dbadd->execute()) {
                        echo "<script>
                                    alert('Leave request submitted successfully!');
                                    window.location.href = 'employee.php'; // Redirect back to same page
                                </script>";
                    } else {
                        echo "<script>
                                    alert('Error submitting leave request: " . $leave_rq_dbadd->error . "');
                                    window.location.href = 'employee.php'; // Redirect back to same page
                                </script>";
                    }

                    $leave_rq_dbadd->close();
                } else {
                    echo "<script>
                                alert('Error: Employee ID is missing. Please log in again.');
                                window.location.href = 'employee.php'; // Redirect back to same page
                            </script>";
                }
            }

            $conn->close();

            ?>

            <div id="feedback" class="tab-pane fade">
                <div class="container p-4 bg-light rounded">
                    <!-- Feedback Viewing Section -->
                    <div class="list-group">
                        <?php
                        include 'connection.php';

                        // Assuming the logged-in employee's ID is stored in a session variable, for example:
                        $employeeId = $_SESSION['EMP_ID']; // Replace this with your actual session variable that stores the employee ID
                        
                        // Fetch evaluations for the logged-in employee only
                        $sql_fetch_feedback = "SELECT * FROM evaluation_emp WHERE EMP_ID_FK_EVAL = ? ORDER BY EVAL_DATE DESC";
                        $stmt = $conn->prepare($sql_fetch_feedback);
                        $stmt->bind_param("i", $employeeId); // Bind the employee ID to the query
                        
                        $stmt->execute();
                        $result = $stmt->get_result();

                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) { ?>
                                <div class="feedback-item">
                                    <h6 class="mb-1"><b>From: <?php echo $employee['ADM_FNAME']; ?></b></h6>
                                    <p class="mb-1"> <?php echo $row['EVAL_NOTE']; ?></p>
                                    <small class="text-muted"><?php echo $row['EVAL_DATE']; ?></small>
                                </div>
                            <?php }
                        } else {
                            echo "<p>No feedback records found.</p>";
                        }

                        $stmt->close();
                        $conn->close();
                        ?>
                    </div>
                    <!--
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
                    -->

                    <!-- Review Superior Button -->
                    <div class="text-center mt-4">
                        <button id="reviewSuperiorBtn" class="btn btn-primary">Review Superior</button>
                    </div>
                </div>
            </div>

            <div id="reviewSuperior" class="tab-pane fade">
                <div class="container p-4 bg-light rounded">
                    <h4 class="mb-3 text-center"><b>Review Your Direct Superior
                            (<?php echo $employee['ADM_FNAME'] . " " . $employee['ADM_LNAME']; ?>)</b></h4>
                    <!-- Make the name of the superior dynamic.-->

                    <form method="POST" id="empReviewSuperiorForm">
                        <div class="mb-3">
                            <label for="superiorFeedback" class="form-label">Your Feedback</label>
                            <textarea name="feedback-text" class="form-control" id="superiorFeedback" rows="4"
                                placeholder="Write your feedback here..."></textarea>
                        </div>
                        <div class="text-center">
                            <button type="submit" name="submit_feedback" class="btn btn-success">Submit
                                Feedback</button>
                        </div>
                    </form>

                    <?php
                    /*
                    // Include your database connection
                    include 'connection.php';

                    // If you have the employee details, such as $employee['EMP_ID']
                    $empId = $employee['EMP_ID'];  // Assuming $employee['EMP_ID'] contains the logged-in employee's ID
                    $admId = $employee['ADM_ID_FK_EMP']; // Set the admin ID, or you can fetch this dynamically based on the logged-in admin
                    
                    if (isset($_POST['submit_feedback'])) {
                        // Get the feedback text from the form
                        $feedbackText = $_POST['feedback-text'];

                        // Sanitize the input to prevent SQL injection
                        $feedbackText = mysqli_real_escape_string($conn, $feedbackText);

                        // Validate feedback (optional)
                        if (empty($feedbackText)) {
                            #echo "Feedback cannot be empty.";
                        } else {
                            // Prepare the SQL query to insert feedback into the evaluation table
                            $sql = "INSERT INTO evaluation (EVAL_NOTE, EVAL_DATE, EMP_ID_FK_EVAL, ADM_ID_FK_EVAL) 
                                        VALUES ('$feedbackText', NOW(), $empId, $admId)";

                            if ($conn->query($sql) === TRUE) {
                                #echo "Feedback submitted successfully.";
                            } else {
                                #echo "Error: " . $sql . "<br>" . $conn->error;
                            }
                        }
                    }

                    // Close the database connection
                    $conn->close();
                    */
                    ?>

                    <!-- Back Button -->
                    <div class="text-center mt-3">
                        <button id="backToFeedbackBtn" class="btn btn-secondary">Back</button>
                    </div>
                </div>
            </div>


            <!-- SAMPLE CONTENT MAKE DYNAMIC SOON -->
            <!-- PHP SALARY -->
            <div id="salary" class="tab-pane fade">
                <div class="container p-4 bg-light rounded">
                    <h4 class="mb-3 text-center"><b>Invoices</b></h4>
                    <div class="salary-list">
                        <?php
                        include 'connection.php';

                        // Assuming the logged-in employee's ID is stored in a session variable
                        $employeeId = $_SESSION['EMP_ID']; // Replace with your actual session variable if different
                        
                        // Fetch payroll records for the logged-in employee only
                        $sql_fetch_feedback = "SELECT * FROM payroll WHERE EMP_ID_FK_PAY = ? ORDER BY P_DATE DESC";
                        $stmt = $conn->prepare($sql_fetch_feedback);
                        $stmt->bind_param("i", $employeeId); // Bind the employee ID to the query
                        
                        $stmt->execute();
                        $result = $stmt->get_result();

                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                                // Format the date
                                $formattedDate = date('F Y', strtotime($row['P_DATE'])); // Converts date to "Month Year" format
                                ?>
                                <div class="salary-item">
                                    <a href="#"
                                        class="list-group-item list-group-item-action d-flex justify-content-between align-items-center">
                                        <b>₱<?php echo number_format($row['P_AMT'], 2); ?> was deposited for
                                            <?php echo $formattedDate; ?></b>
                                        <span class="badge bg-secondary"><?php echo $row['P_DATE']; ?></span>
                                    </a>
                                </div>
                                <?php
                            }
                        } else {
                            echo "<p>No payroll records found.</p>";
                        }

                        $stmt->close();
                        $conn->close();
                        ?>
                    </div>
                </div>
            </div>
        </div>

        <!-- SAMPLE CONTENT MAKE DYNAMIC SOON -->
        <div id="profileModal" class="profile-modal">
            <div class="profile-content">
                <span class="close-btn">&larr;</span>
                <div class="profile-header">
                    <img src="" alt="Profile Picture" class="profile-img">
                    <h3>Employee ID: <?php echo $employee['EMP_ID']; ?></h3>
                    <p>Joined in <?php echo $employee['EMP_JOINED']; ?></p>
                </div>

                <div class="profile-info">
                    <p><strong>First Name:</strong> <?php echo $employee['EMP_FNAME']; ?></p>
                    <p><strong>Last Name:</strong> <?php echo $employee['EMP_LNAME']; ?></p>
                    <!--  <p><strong>Department:</strong></p> -->
                    <p><strong>Birthdate: </strong> <?php echo $employee['EMP_BIRTH']; ?></p>
                    <p><strong>Role: </strong> <?php echo $employee['EMP_POS']; ?></p>
                    <p><strong>Department: </strong> <?php echo $employee['EMP_DEPARTMENT']; ?></p>
                    <p><strong>Status: </strong><?php echo $employee['EMP_STATUS']; ?></p>
                    <!--                     <div class="password-section">
                        <label><strong>Password:</strong></label>
                        <input type="password" value="<?php echo $employee['EMP_PASS']; ?>" id="mainPassword" disabled>
                        <a href="#" id="changePasswordLink">Change password?</a>
                    </div> -->
                </div>
            </div>
        </div>

        <div id="passwordModal" class="profile-modal">
            <div class="profile-content">
                <span class="close-btn" id="closePasswordModal">&larr;</span>
                <h4 class="text-center">Change Password</h4>

                <div class="password-container">
                    <form method="POST">
                        <input name="emp_old_pass" type="password" id="currentPassword" placeholder="Current Password"
                            required>
                        <input name="emp_newpass" type="password" id="newPassword" placeholder="New Password" required>
                        <input name="emp_confirm_pass" type="password" id="confirmPassword"
                            placeholder="Confirm Password" required>
                        <button name="change_pass_submit" type="submit" class="btn btn-success">Save Password</button>
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