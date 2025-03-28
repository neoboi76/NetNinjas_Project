<?php
include('getadmdetail.php');
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
    <link rel="stylesheet" href="./css/admin.css">

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
        <img src="./images/profilePlaceholder.png" class="img-thumbnail"
            style="contain: cover; width: 120px; height: 120px;">
        <p>Admin ID: <b><?php echo $admin['ADM_ID']; ?></b></p>
        <ul class="nav flex-column">
            <li class="nav-item"><a class="nav-link" id="announcement1" href="#announcement"
                    data-bs-toggle="tab">Announcement</a></li>
            <li class="nav-item"><a class="nav-link" id="employee1" href="#employee" data-bs-toggle="tab">Employee</a>
            </li>
            <li class="nav-item"><a class="nav-link" id="review1" href="#review" data-bs-toggle="tab">Review</a></li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" id="report1" data-bs-toggle="dropdown" href="#">Report</a>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="#caseManagement" data-bs-toggle="tab">Case
                            Management</a></li>
                    <li><a class="dropdown-item" href="#documents" data-bs-toggle="tab">Documents</a>
                    </li>
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
            <img src="./images/profilePlaceholder.png" width="75px" width="75px" alt="Account"
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
                        <button id="addMediaBtn" class="btn btn-primary">Add Media</button>
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

            <div id="employee" class="tab-pane fade">
                <div class="container p-4 bg-light rounded">
                    <!-- Employee Action Buttons -->
                    <div class="d-flex justify-content-start mb-3">
                        <button class="btn btn-primary me-2" id="enableEmployeeBtn">Enable Employee</button>
                        <button class="btn btn-primary me-2" id="disableEmployeeBtn">Disable Employee</button>
                        <button class="btn btn-primary me-2" id="addEmployeeBtn">Add Employee</button>
                        <button class="btn btn-primary" id="editEmployeeBtn">Edit Employee</button>
                    </div>

                    <!-- Employee Data Table -->
                    <div class="admin-placeholder p-4 rounded">
                        <h4 class="mb-3">Employee List</h4>
                        <table class="table table-bordered table-striped">
                            <thead class="table-primary">
                                <tr>
                                    <th>Employee ID</th>
                                    <th>First Name</th>
                                    <th>Last Name</th>
                                    <th>Position</th>
                                    <th>Department</th> <!-- Department added here -->
                                    <th>Birth Date</th>
                                    <th>Status</th>
                                    <th>Email</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                include 'connection.php';

                                // Adjust SQL query to include department
                                $sql = "SELECT EMP_ID, EMP_FNAME, EMP_LNAME, EMP_POS, EMP_DEPARTMENT, EMP_BIRTH, EMP_STATUS, EMP_EMAIL FROM employee";
                                $result = $conn->query($sql);

                                if ($result->num_rows > 0) {
                                    while ($row = $result->fetch_assoc()) {
                                        echo "<tr>
                                            <td>{$row['EMP_ID']}</td>
                                            <td>{$row['EMP_FNAME']}</td>
                                            <td>{$row['EMP_LNAME']}</td>
                                            <td>{$row['EMP_POS']}</td>
                                            <td>{$row['EMP_DEPARTMENT']}</td> <!-- Department data -->
                                            <td>{$row['EMP_BIRTH']}</td>
                                            <td>{$row['EMP_STATUS']}</td>
                                            <td>{$row['EMP_EMAIL']}</td>
                                        </tr>";
                                    }
                                } else {
                                    echo "<tr><td colspan='8' class='text-center'>No employees found</td></tr>";
                                }

                                $conn->close();
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <!-- Add Employee Modal -->
            <div id="employeeModal" class="employee-modal">
                <div class="employee-modal-content">
                    <span class="employee-close">&times;</span>
                    <div class="employee-form">
                        <form method="POST" id="addEmployeeForm" enctype="multipart/form-data">
                            <div class="employee-profile-pic">
                                <!-- Profile Picture Preview -->
                                <img id="profilePreview" src="./images/profilePlaceholder.png" alt="Profile Picture"
                                    width="100">
                                <br>
                                <!-- Hidden File Input (inside the form now) -->
                                <input type="file" name="addProfilePic" id="profilePicInput" accept="image/*"
                                    style="display: none;">
                                <button type="button" id="addProfilePicBtn">Add profile picture</button>
                            </div>

                            <input type="text" name="emp_id_add" placeholder="Employee ID" required>
                            <input type="text" name="emp_email_add" placeholder="Email" required>
                            <input type="text" name="emp_role_add" placeholder="Role" required>
                            <input type="text" name="emp_dept_add" placeholder="Department" required>

                            <div class="employee-name-fields">
                                <input type="text" name="emp_fname_add" placeholder="First Name" required>
                                <input type="text" name="emp_lname_add" placeholder="Last Name" required>
                            </div>

                            Birthdate: <input type="date" name="emp_bday_add" required>
                            <button class="btn btn-success" name="add_employee">Add Employee</button>
                        </form>
                    </div>
                </div>
            </div>

            <!-- PHP ADD EMPLOYEE-->
            <?php
            /*
                include 'connection.php';

                if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['add_employee'])) {
                    // Collect data from form
                    $emp_id = $_POST['emp_id_add'];
                    $emp_email = $_POST['emp_email_add'];
                    $emp_role = $_POST['emp_role_add'];
                    $emp_dept = $_POST['emp_dept_add'];
                    $emp_fname = $_POST['emp_fname_add'];
                    $emp_lname = $_POST['emp_lname_add'];
                    $emp_bday = $_POST['emp_bday_add'];

                    // Default values
                    $emp_pass = 'vivanetninjas'; // Default password or you can generate random
                    $emp_joined = date('Y-m-d'); // Auto set current date as joined date
                    $adm_id_fk_emp = 0; // Assuming default admin ID is 0 (change as needed)
                
                    // Prepare SQL statement
                    $emp_adding = $conn->prepare("
                                INSERT INTO employee 
                                (EMP_ID, EMP_PASS, EMP_FNAME, EMP_LNAME, EMP_POS, EMP_DEPARTMENT, EMP_EMAIL, EMP_BIRTH, EMP_JOINED, ADM_ID_FK_EMP) 
                                VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)
                            ");

                    // Bind parameters
                    $emp_adding->bind_param(
                        "issssssssi",
                        $emp_id,
                        $emp_pass,
                        $emp_fname,
                        $emp_lname,
                        $emp_role,
                        $emp_dept,
                        $emp_email,
                        $emp_bday,
                        $emp_joined,
                        $adm_id_fk_emp
                    );

                    // Execute and check result
                    if ($emp_adding->execute()) {
                        echo "<script>alert('Employee added successfully!');</script>";
                        echo "<script>window.location.href = window.location.href;</script>";
                    } else {
                        echo "<script>alert('Error: " . $emp_adding->error . "');</script>";
                    }

                    // Close statement
                    $emp_adding->close();
                }

                // Close connection
                $conn->close();
                */
            ?>

            <!-- Edit Employee Modal. It must already have content-->
            <div id="employeeEditModal" class="employeeEdit-modal">
                <div class="employeeEdit-modal-content">
                    <span class="employeeEdit-close">&times;</span>
                    <div class="employee-form">
                        <form method="POST" id="editEmployeeForm" enctype="multipart/form-data">
                            <div class="employee-profile-pic">
                                <!-- Profile Picture Preview -->
                                <img id="editProfilePreview" name="editProfilePic" src="./images/profilePlaceholder.png"
                                    alt="Profile Picture" width="100">
                                <br>
                                <!-- Hidden File Input -->
                                <input type="file" id="editProfilePicInput" accept="image/*" style="display: none;">
                                <button type="button" id="editProfilePicBtn">Edit profile picture</button>
                            </div>

                            <input name="edit_emp_ID" type="text" placeholder="Employee ID" required>
                            <input type="email" name="edit_emp_email" placeholder="Email">
                            <input name="edit_emp_role" type="text" placeholder="Role">
                            <input name="edit_emp_dept" type="text" placeholder="Department">

                            <div class="employee-name-fields">
                                <input name="edit_emp_fname" type="text" placeholder="First Name">
                                <input name="edit_emp_lname" type="text" placeholder="Last Name">
                            </div>

                            <label for="edit_emp_bday">Birthdate:</label>
                            <input type="date" id="edit_emp_bday" name="edit_emp_bday">

                            <button name="save_emp" class="btn btn-success">Save Changes</button>
                            <button style="height: 50px; margin-top: 8px;" name="delete_emp"
                                class="btn btn-danger">Delete
                                Employee</button>
                        </form>
                    </div>
                </div>
            </div>

            <!-- PHP EDIT && DELETE EMPLOYEE-->
            <?php
            /*
            include 'connection.php';

            // Handle EDIT / UPDATE EMPLOYEE
            if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['save_emp'])) {
                // Collect form data
                $edit_emp_ID = $_POST['edit_emp_ID'];
                $edit_emp_email = $_POST['edit_emp_email'];
                $edit_emp_role = $_POST['edit_emp_role'];
                $edit_emp_dept = $_POST['edit_emp_dept'];
                $edit_emp_fname = $_POST['edit_emp_fname'];
                $edit_emp_lname = $_POST['edit_emp_lname'];
                $edit_emp_bday = $_POST['edit_emp_bday'];

                // Check if employee exists
                $check_emp_db_save = $conn->prepare("SELECT EMP_ID FROM employee WHERE EMP_ID = ?");
                $check_emp_db_save->bind_param("i", $edit_emp_ID);
                $check_emp_db_save->execute();
                $result_save = $check_emp_db_save->get_result();

                if ($result_save->num_rows == 0) {
                    echo "<script>alert('Error: Employee ID does not exist!'); window.location.replace(window.location.pathname);</script>";
                    $check_emp_db_save->close();
                } else {
                    $check_emp_db_save->close();

                    // Update employee
                    $emp_save = $conn->prepare("
                            UPDATE employee SET 
                                EMP_EMAIL = ?, 
                                EMP_POS = ?,  
                                EMP_DEPARTMENT = ?, 
                                EMP_FNAME = ?, 
                                EMP_LNAME = ?, 
                                EMP_BIRTH = ? 
                            WHERE EMP_ID = ?
                        ");

                    $emp_save->bind_param(
                        "ssssssi",
                        $edit_emp_email,
                        $edit_emp_role,
                        $edit_emp_dept,
                        $edit_emp_fname,
                        $edit_emp_lname,
                        $edit_emp_bday,
                        $edit_emp_ID
                    );

                    if ($emp_save->execute()) {
                        echo "<script>alert('Employee details updated successfully!'); window.location.replace(window.location.pathname);</script>";
                    } else {
                        echo "<script>alert('Error updating employee: " . $emp_save->error . "'); window.location.replace(window.location.pathname);</script>";
                    }

                    $emp_save->close();
                }
                    
            }
            */

            /*
            // Handle DELETE EMPLOYEE
            if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['delete_emp'])) {
                // Collect employee ID to delete
                $edit_emp_ID = $_POST['edit_emp_ID'];

                // Check if employee exists
                $check_emp_db_delete = $conn->prepare("SELECT EMP_ID FROM employee WHERE EMP_ID = ?");
                $check_emp_db_delete->bind_param("i", $edit_emp_ID);
                $check_emp_db_delete->execute();
                $result_delete = $check_emp_db_delete->get_result();

                if ($result_delete->num_rows == 0) {
                    echo "<script>alert('Error: Employee ID does not exist!'); window.location.replace(window.location.pathname);</script>";
                    $check_emp_db_delete->close();
                } else {
                    $check_emp_db_delete->close();

                    // Delete employee
                    $emp_delete = $conn->prepare("DELETE FROM employee WHERE EMP_ID = ?");
                    $emp_delete->bind_param("i", $edit_emp_ID);

                    if ($emp_delete->execute()) {
                        echo "<script>alert('Employee deleted successfully!'); window.location.replace(window.location.pathname);</script>";
                    } else {
                        echo "<script>alert('Error deleting employee: " . $emp_delete->error . "'); window.location.replace(window.location.pathname);</script>";
                    }

                    $emp_delete->close();
                }
            }

            // Close connection
            $conn->close();
            */
            ?>

            <!-- Enable Employee Modal -->
            <div id="employeeEnableModal" class="employeeEnable-modal">
                <div class="employeeEnable-modal-content">
                    <span class="employeeEnable-close">&times;</span>
                    <h3>Enable Employee</h3>
                    <form method="POST" id="enableEmployeeForm">
                        <input name="emp_enable_adm" type="text" name="enable_emp_ID" placeholder="Enter Employee ID"
                            required>
                        <button name="emp_enable_sub" class="btn btn-success" name="enable_employee">Enable</button>
                    </form>
                </div>
            </div>

            <!-- PHP ENABLE -->
            <?php
            /*
            include "connection.php";
            // Check if enable button was pressed
            if (isset($_POST['emp_enable_sub'])) {
                $emp_id = $_POST['emp_enable_adm']; // Get employee ID from input
            
                // Check if employee exists
                $check_sql = "SELECT * FROM employee WHERE EMP_ID = '$emp_id'";
                $result = $conn->query($check_sql);

                if ($result->num_rows > 0) {
                    // Employee exists, update status to 'Active'
                    $update_sql = "UPDATE employee SET EMP_STATUS = 'Active' WHERE EMP_ID = '$emp_id'";
                    if ($conn->query($update_sql) === TRUE) {
                        // Success alert
                        echo "<script>alert('Employee ID $emp_id has been enabled (set to Active).'); window.location.href = window.location.href;</script>";
                    } else {
                        // Error on update
                        echo "<script>alert('Error updating employee status. Please try again.'); window.location.href = window.location.href;</script>";
                    }
                } else {
                    // Employee ID does not exist
                    echo "<script>alert('Error: Employee ID does not exist!'); window.location.href = window.location.href;</script>";
                }
            }

            $conn->close(); // Close connection
            */
            ?>

            <!-- Disable Employee Modal -->
            <div id="employeeDisableModal" class="employeeDisable-modal">
                <div class="employeeDisable-modal-content">
                    <span class="employeeDisable-close">&times;</span>
                    <h3>Disable Employee</h3>
                    <form method="POST" id="disableEmployeeForm">
                        <input name="emp_disable_adm" type="text" name="disable_emp_ID" placeholder="Enter Employee ID"
                            required>
                        <button name="emp_disable_sub" class="btn btn-danger" name="disable_employee">Disable</button>
                    </form>
                </div>
            </div>

            <!-- PHP DISABLE -->
            <?php
            /*
            include "connection.php";
            if (isset($_POST['emp_disable_sub'])) {
                $emp_id = $_POST['emp_disable_adm']; // Get employee ID input
            
                // Check if employee exists
                $check_sql = "SELECT * FROM employee WHERE EMP_ID = '$emp_id'";
                $result = $conn->query($check_sql);

                if ($result->num_rows > 0) {
                    // Employee exists, set status to 'Inactive'
                    $update_sql = "UPDATE employee SET EMP_STATUS = 'Inactive' WHERE EMP_ID = '$emp_id'";
                    if ($conn->query($update_sql) === TRUE) {
                        // Success message
                        echo "<script>alert('Employee ID $emp_id has been disabled (set to Inactive).'); window.location.href = window.location.href;</script>";
                    } else {
                        // If query failed
                        echo "<script>alert('Error disabling employee. Please try again.'); window.location.href = window.location.href;</script>";
                    }
                } else {
                    // Employee not found
                    echo "<script>alert('Error: Employee ID does not exist!'); window.location.href = window.location.href;</script>";
                }
            }

            $conn->close(); // Close connection
            */
            ?>


            <div id="review" class="tab-pane fade">
                <div class="container p-4 bg-light rounded">
                    <!-- Top Buttons -->
                    <div class="d-flex mb-3 align-center">
                        <button class="btn btn-primary" id="feedbackHistoryBtn">View Feedback History</button>
                    </div>


                    <form method="POST" id="admFeedbackForm">
                        <div id="reviewContent">
                            <div class="mb-3">
                                <input name="adm_emp_send" style="border: 3px solid #b1b1b1; padding: 5px;" type="text"
                                    class="form-control bg-light" placeholder="Employee ID">
                            </div>

                            <div class="mb-3">
                                <input name="adm_subject" style="border: 3px solid #b1b1b1; padding: 5px;" type="text"
                                    class="form-control bg-light" placeholder="Subject">
                            </div>

                            <!-- Feedback Text Area -->
                            <div class="mb-3">
                                <textarea name="adm_feedback" style="border: 3px solid #b1b1b1; padding: 15px;"
                                    class="form-control bg-light" rows="5" placeholder="Write Feedback"></textarea>
                            </div>

                            <!-- Submit Button -->
                            <div style="background-color: #f8f9fa; border: none;" class="d-flex justify-content-center">
                                <button name="adm_review_sub" type="submit" class="btn btn-primary">Submit</button>
                            </div>
                    </form>

                    <!-- PHP Review this one is WORKING but page refreshes -->
                    <?php
                    /*
                    include 'connection.php';

                    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['adm_review_sub'])) {
                        $emp_id = $_POST['adm_emp_send'];
                        $adm_feedback = $_POST['adm_feedback'];
                        $admin_id = $_SESSION["ADM_ID"] ?? null;

                        if (!$admin_id) {
                            echo "<script>alert('Admin not logged in.'); window.location.href='admin.php';</script>";
                            exit();
                        }

                        // Check if employee ID exists
                        $check_sql = "SELECT 1 FROM employee WHERE EMP_ID = ?";
                        $check_stmt = $conn->prepare($check_sql);
                        $check_stmt->bind_param("i", $emp_id);
                        $check_stmt->execute();
                        $result = $check_stmt->get_result();

                        if ($result->num_rows === 0) {
                            echo "<script>alert('Error: Employee ID not found!'); window.location.href='admin.php';</script>";
                            exit();
                        }
                        $check_stmt->close();

                        // Proceed with insertion if employee exists
                        $sql = "INSERT INTO evaluation_emp (EVAL_NOTE, EVAL_DATE, EMP_ID_FK_EVAL, ADM_ID_FK_EVAL) VALUES (?, NOW(), ?, ?)";
                        $stmt = $conn->prepare($sql);
                        $stmt->bind_param("sii", $adm_feedback, $emp_id, $admin_id);

                        if ($stmt->execute()) {
                            echo "<script>alert('Feedback successfully submitted!'); window.location.href='admin.php';</script>";
                        } else {
                            echo "<script>alert('Error: " . $stmt->error . "'); window.location.href='admin.php';</script>";
                        }

                        $stmt->close();
                    }
                    */
                    ?>
                </div>

                <!-- Feedback History (Initially Hidden) -->
                <div id="feedbackHistoryContent" class="text-center d-none">
                    <div id="feedbackHistoryList" class="feedback-history-list">
                        <?php
                        include 'connection.php';

                        $adminId = $_SESSION['ADM_ID']; // Admin ID who sent the feedback
                        
                        // Fetch feedback records sent by this admin, ordered by latest date and highest EVAL_ID
                        $sql_fetch_feedback = "SELECT * FROM evaluation_emp WHERE ADM_ID_FK_EVAL = ? ORDER BY EVAL_DATE DESC, EVAL_ID DESC";
                        $stmt = $conn->prepare($sql_fetch_feedback);
                        $stmt->bind_param("i", $adminId); // Bind admin ID for secure query
                        
                        $stmt->execute();
                        $result = $stmt->get_result();

                        // Check if there are feedback records
                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) { ?>
                                <div class="feedback-history-item"
                                    style="border:1px solid #ccc; padding:6px 10px; margin-bottom:8px; border-radius:5px; background:#f9f9f9;">
                                    <div class="feedback-history-header"
                                        style="margin-bottom:3px; display:flex; justify-content:space-between; flex-wrap:wrap; gap:5px;">
                                        <span><strong>Feedback ID:</strong> <?php echo $row['EVAL_ID']; ?></span>
                                        <span><strong>to Employee ID:</strong> <?php echo $row['EMP_ID_FK_EVAL']; ?></span>
                                        <span><strong>Posted on:</strong> <?php echo $row['EVAL_DATE']; ?></span>
                                    </div>
                                    <div class="feedback-history-text"
                                        style="margin-top:5px; max-height:100px; overflow-y:auto;">
                                        <?php echo nl2br(htmlspecialchars($row['EVAL_NOTE'])); // Protect and format text ?>
                                    </div>
                                </div>
                            <?php }
                        } else {
                            echo "<p>No feedback sent records found.</p>";
                        }

                        // Close connection
                        $stmt->close();
                        $conn->close();
                        ?>
                        <!--
                        <div id="feedbackHistoryItem" class="feedback-history-item">
                            <div class="feedback-history-header">
                                    <span><strong>Feedback To:</strong> TEST SIGMA </span>
                                    <span><strong>Posted:</strong> TEST SIGMA </span><br>
                             </div>
                            <div class="feedback-history-text">
                                <br>WHAT THE SIGMA?!</br>
                            </div>
                        </div>
                        -->
                    </div>
                    <!--<h5 class="text-muted">You currently have no feedbacks given.</h5>-->
                    <div class="text-center mt-3">
                        <button id="backToReviewBtn" class="btn btn-secondary">Back</button>
                    </div>
                </div>
            </div>
        </div>

        <div id="caseManagement" class="tab-pane fade ">
            <div class="container-fluid p-4">
                <div class="bg-white rounded-4 shadow p-4">
                    <div class="d-flex justify-content-between align-items-right mb-3">
                        <button class="btn btn-warning" id="openModal">Assign Cases</button>
                    </div>
                    <div class="border rounded-4 bg-light p-5 shadow" id="contentContainer">
                        <table class="table table-bordered mt-3">
                            <thead>
                                <tr>
                                    <th>Tracking #</th>
                                    <th>Employee ID</th>
                                    <th>Activity</th>
                                    <th>Description</th>
                                    <th>Date Assigned</th>
                                    <th>Status</th> <!-- Done, In Progress, or Incomplete -->
                                </tr>
                            </thead>
                            <tbody id="caseTableBody">
                                <!-- Assigned cases will be added here -->
                                <?php
                                include "connection.php";

                                // Fetch all cases from the database
                                $query = "SELECT CASE_ID, EMP_ID_FK_CASE, CASE_SUBJ, CASE_DESC, CASE_DATE, CASE_STATUS FROM cases ORDER BY CASE_ID DESC";
                                $result = mysqli_query($conn, $query);

                                // Check if there are any cases
                                if (mysqli_num_rows($result) > 0) {
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        echo "<tr>";
                                        echo "<td>" . htmlspecialchars($row['CASE_ID']) . "</td>"; // Tracking #
                                        echo "<td>" . htmlspecialchars($row['EMP_ID_FK_CASE']) . "</td>"; // Employee ID
                                        echo "<td>" . htmlspecialchars($row['CASE_SUBJ']) . "</td>"; // Activity
                                        echo "<td>" . htmlspecialchars($row['CASE_DESC']) . "</td>"; // Description
                                        echo "<td>" . htmlspecialchars($row['CASE_DATE']) . "</td>"; // Date Assigned
                                        echo "<td>" . htmlspecialchars($row['CASE_STATUS']) . "</td>"; // Status
                                        echo "</tr>";
                                    }
                                } else {
                                    // No cases found
                                    echo "<tr><td colspan='6' class='text-center'>No cases found.</td></tr>";
                                }

                                // Close the connection
                                mysqli_close($conn);
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal Overlay -->
        <div class="custom-modal-overlay" id="modalOverlay"></div>

        <!-- Modal -->
        <div class="custom-modal" id="caseModal">
            <h4 class="text-center">Assign a Case</h4>
            <form method="POST">
                <div class="form-group">
                    <label class="form-label">Employee ID:</label>
                    <input name="adm_case_emp_ID" type="text" class="form-control" id="employeeId" required>
                </div>
                <div class="form-group">
                    <label class="form-label">Activity:</label>
                    <input name="adm_case_act" type="text" class="form-control" id="activity" required>
                </div>
                <div class="form-group">
                    <label class="form-label">Description:</label>
                    <div contenteditable="true" id="descriptionBox" class="form-control"
                        style="min-height: 100px; border: 1px solid #ccc; padding: 10px;">
                    </div>
                    <input name="adm_case_desc" type="hidden" name="description" id="hiddenDescription">
                </div>
                <div class="form-group">
                    <label class="form-label">Date Assigned:</label>
                    <input name="adm_case_date" type="date" class="form-control" id="dateAssigned" required>
                </div>
                <div class="text-center mt-3">
                    <button name="adm_case_sub" type="submit" class="btn btn-success" id="assignCase">Assign
                        Case</button>
                    <button style="padding: 10px;" type="button" class="btn btn-secondary"
                        id="closeModal">Cancel</button>
                </div>
            </form>
        </div>

        <!-- PHP ASSIGN CASE -->
        <?php
        include "connection.php";
        if (isset($_POST['adm_case_sub'])) {

            // Collect and sanitize form inputs
            $empID = mysqli_real_escape_string($conn, $_POST['adm_case_emp_ID']);
            $caseSubject = mysqli_real_escape_string($conn, $_POST['adm_case_act']);
            $caseDesc = mysqli_real_escape_string($conn, $_POST['adm_case_desc']);
            $caseDate = mysqli_real_escape_string($conn, $_POST['adm_case_date']);
            $caseStatus = "In Progress"; // Default case status
        
            // Prepare and execute the insert query with CASE_STATUS included
            $sql = "INSERT INTO cases (CASE_SUBJ, CASE_DATE, CASE_DESC, CASE_STATUS, EMP_ID_FK_CASE) 
                        VALUES (?, ?, ?, ?, ?)";

            $stmt = $conn->prepare($sql);
            $stmt->bind_param("ssssi", $caseSubject, $caseDate, $caseDesc, $caseStatus, $empID);

            // Check execution and respond accordingly
            if ($stmt->execute()) {
                echo "<script>alert('Case successfully assigned to Employee ID: $empID'); window.location.href='admin.php';</script>";
            } else {
                echo "<script>alert('Failed to assign case: " . $stmt->error . "'); window.history.back();</script>";
            }

            // Close the statement and connection
            $stmt->close();
            $conn->close();
        }
        ?>

        <div id="documents" class="tab-pane fade">
            <div class="custom-container p-3">
                <div class="button-group d-flex gap-3">
                    <button class="custom-btn" id="viewReportsBtn">View Reports</button>
                    <button class="custom-btn" id="viewDocumentsBtn">View Documents</button>
                </div>
                <div class="content-box mt-3">
                    <!-- EMPLOYEE REPORTS -->
                    <div id="empReports" class="tab-pane fade">
                        <div class="reports-container">
                            <div class="report-list">
                                <?php
                                include 'connection.php';

                                // Assuming the logged-in admin's ID is stored in a session variable, for example:
                                $adminId = $_SESSION['ADM_ID'];  // Replace this with your actual session variable that stores the admin ID
                                
                                // Fetch feedback for the logged-in admin only
                                $sql_fetch_feedback = "SELECT r.*, e.EMP_FNAME, e.EMP_LNAME 
                                                            FROM report r
                                                            JOIN employee e ON r.EMP_ID = e.EMP_ID
                                                            ORDER BY r.RPT_DATE DESC";
                                $stmt = $conn->prepare($sql_fetch_feedback);

                                $stmt->execute();
                                $result = $stmt->get_result();

                                if ($result->num_rows > 0) {
                                    while ($row = $result->fetch_assoc()) { ?>
                                        <div class="report-item">
                                            <div class="report-header">
                                                <span><strong>Report ID:</strong> <?php echo $row['RPT_NUM']; ?></span>
                                                <span><strong>Activity:</strong> <?php echo $row['RPT_ACT']; ?></span>
                                                <span><strong>Date:</strong> <?php echo $row['RPT_DATE']; ?></span>
                                                <span><strong>Time:</strong> <?php echo $row['RPT_TIME']; ?></span>
                                                <span><strong>DONE BY:</strong>
                                                    <?php echo $row['EMP_ID'] . " (" . $row['EMP_FNAME'] . " " . $row['EMP_LNAME'] . ")"; ?></span><br>
                                            </div>
                                            <div class="report-text">
                                                <?php echo $row['RPT_ACCOMP']; ?>
                                            </div>
                                        </div>
                                    <?php }
                                } else {
                                    echo "<p>No feedback records found.</p>";
                                }

                                $stmt->close();
                                $conn->close();
                                ?>
                                <!--
                                <div class="report-item">
                                    <div class="report-header">
                                        <span class="report-date">01/01/2025</span>
                                    </div>
                                    <div class="report-text">
                                        <h5>Employee Performance Report</h5>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed vel semper ligula. Aliquam erat volutpat. Duis vel justo in metus consectetur rutrum. Integer euismod est vel diam lobortis, et dictum neque semper. Nulla facilisi. Donec euismod orci vel neque euismod, at ullamcorper urna bibendum. Nulla facilisi. Sed vel semper ligula.</p>
                                    </div>
                                </div>
                                -->
                            </div>
                        </div>
                    </div>
                    <!-- UPLOADED DOCUMENTS -->
                    <div id="empDocuments" class="tab-pane fade d-none">
                        <div class="d-flex justify-content-between mb-3">
                            <input type="file" id="fileInput" class="form-control w-50">
                            <button id="addDocumentBtn" class="btn btn-success">Add Document</button>
                        </div>
                        </form>
                        <div class="table-responsive">
                            <table class="table table-bordered p-3" id="documentsTable">
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
                                                    <button class="btn btn-danger remove-btn"
                                                        data-id="<?php echo htmlspecialchars($row['F_ID']); ?>"
                                                        data-path="<?php echo htmlspecialchars($row['F_PATH']); ?>">Remove
                                                    </button>
                                                </td>
                                            </tr>
                                        <?php }
                                    } else {
                                        echo "<tr><td colspan='5'>No documents found.</td></tr>";
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
        </div>

        <!--
        <div id="empDocuments" class="tab-pane fade d-none">
            <div class="documents-container">
                <div class="d-flex justify-content-between mb-3">
                    <input type="file" id="fileInput" class="form-control w-50">
                    <button id="addDocumentBtn" class="btn btn-success">Add Document</button>
                </div>

                <div class="table-responsive">
                    <table class="table table-bordered" id="documentsTable">
                        <thead class="table-light">
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
                                <td>
                                    <a href="./Test/Manifesto.pdf" download="CommunistManifesto.pdf"
                                        class="btn btn-primary">Download</a>
                                    <button class="btn btn-danger remove-btn">Remove</button>
                                </td>
                            </tr>
                            <tr>
                                <td>02/01/2025</td>
                                <td>Finance</td>
                                <td>Excel</td>
                                <td>Budget_2025.xlsx</td>
                                <td>
                                    <a href="./Test/ass.jpg" download="Sauce.jpg" class="btn btn-primary">Download</a>
                                    <button class="btn btn-danger remove-btn">Remove</button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        -->

        <!--PHP LEAVE RQ -->
        <div id="leave" class="tab-pane fade">
            <?php
            include 'connection.php';

            $get_leaveRQ = "SELECT lr.LEAVERQ_ID, lr.LEAVERQ_REASON, lr.LEAVERQ_DESCRIPT, 
                                        lr.LEAVERQ_DATELEAVE, lr.LEAVERQ_RETURN, lr.LEAVERQ_STATUS, 
                                        e.EMP_ID, e.EMP_FNAME, e.EMP_LNAME 
                                FROM leave_request lr
                                JOIN employee e ON lr.EMP_ID = e.EMP_ID
                                WHERE lr.LEAVERQ_STATUS = 'Pending'
                                ORDER BY lr.LEAVERQ_ID DESC"; // Order by newest first
            
            $check = $conn->query($get_leaveRQ);

            if ($check->num_rows > 0) {
                while ($row = $check->fetch_assoc()) {
                    echo "<div class='leave-request' style='background: #ddd; padding: 15px; margin: 15px 0; border-radius: 5px; display: flex; align-items: center; justify-content: space-between;'>";

                    // Left side: Leave Details
                    echo "<div class='leave-details' style='flex-grow: 1;'>";
                    echo "<p><strong>Request ID:</strong> " . $row['LEAVERQ_ID'] . "</p>";
                    echo "<p><strong>" . $row['EMP_FNAME'] . " " . $row['EMP_LNAME'] . " (ID: " . $row['EMP_ID'] . ")</strong></p>";
                    echo "<p><strong>Leave Date:</strong> " . date("F j, Y", strtotime($row['LEAVERQ_DATELEAVE'])) . " to " . date("F j, Y", strtotime($row['LEAVERQ_RETURN'])) . "</p>";
                    echo "<p><strong>Reason:</strong> " . $row['LEAVERQ_REASON'] . "</p>";
                    echo "<p><strong>Description:</strong> " . $row['LEAVERQ_DESCRIPT'] . "</p>";
                    echo "</div>"; // End of leave-details div
            
                    // Right side: Buttons
                    echo "<div class='action-buttons' style='display: flex; gap: 5px;'>";

                    // Approve Button
                    echo "<button class='approve-btn' style='background: green; color: white; padding: 5px; border: none; border-radius: 3px; width: 30px; height: 30px;' data-id='" . $row['LEAVERQ_ID'] . "'>✅</button>";

                    // Deny Button (Yellow Box with Minus Sign)
                    echo "<button class='deny-btn' style='background: yellow; color: black; padding: 5px; border: none; border-radius: 3px; width: 30px; height: 30px;' data-id='" . $row['LEAVERQ_ID'] . "'>➖</button>";

                    echo "</div>"; // End of action-buttons div
                    echo "</div>"; // End of leave-request div
                }
            } else {
                echo "<p>No leave requests found.</p>";
            }

            $conn->close();
            ?>
        </div>

        <!-- Script to handle approve or deny-->
        <script>
            document.addEventListener("DOMContentLoaded", function () {
                document.addEventListener("click", function (event) {
                    if (event.target.classList.contains("approve-btn") || event.target.classList.contains("deny-btn")) {
                        const requestDiv = event.target.closest(".leave-request");
                        requestDiv.remove(); // Remove from UI

                        const leaveId = event.target.getAttribute("data-id");
                        const action = event.target.classList.contains("approve-btn") ? "approve" : "deny";

                        fetch("leave_handling.php", {
                            method: "POST",
                            headers: { "Content-Type": "application/x-www-form-urlencoded" },
                            body: `leave_id=${leaveId}&action=${action}`
                        })
                            .then(response => response.text())
                            .then(data => console.log(data))
                            .catch(error => console.error("Error:", error));
                    }
                });
            });
        </script>

        <!-- PHP Feedback-->
        <div id="feedback" class="tab-pane fade">
            <div id="feedbackList" class="feedback-list">
                <?php
                include 'connection.php';

                // Assuming the logged-in admin's ID is stored in a session variable like this:
                $adminId = $_SESSION['ADM_ID']; // Admin ID to whom the feedback is addressed
                
                // Fetch feedback records for this admin, ordered by latest date and highest EVAL_ID
                $sql_fetch_feedback = "SELECT * FROM evaluation WHERE ADM_ID_FK_EVAL = ? ORDER BY EVAL_ID DESC";
                $stmt = $conn->prepare($sql_fetch_feedback);
                $stmt->bind_param("i", $adminId); // Bind admin ID for secure query
                
                $stmt->execute();
                $result = $stmt->get_result();

                // Check if there are feedback records
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) { ?>
                        <div class="feedback-item"
                            style="border:1px solid #ccc; padding:10px; margin-bottom:10px; border-radius:5px;">
                            <div class="feedback-header"
                                style="margin-bottom:5px; display:flex; justify-content:space-between; flex-wrap:wrap;">
                                <span><strong>Feedback ID:</strong> <?php echo $row['EVAL_ID']; ?></span>
                                <span><strong>Feedback from Employee ID:</strong> <?php echo $row['EMP_ID_FK_EVAL']; ?></span>
                                <span><strong>For:</strong> <?php echo $row['ADM_ID_FK_EVAL']; ?></span>
                                <span><strong>Posted on:</strong> <?php echo $row['EVAL_DATE']; ?></span>
                            </div>
                            <div class="feedback-text" style="margin-top:8px;">
                                <?php echo nl2br(htmlspecialchars($row['EVAL_NOTE'])); // Protect against XSS and keep line breaks ?>
                            </div>
                        </div>
                    <?php }
                } else {
                    echo "<p>No feedback records found.</p>";
                }

                // Close connection
                $stmt->close();
                $conn->close();
                ?>

                <!--
                <div class="feedback-item">
                    <span><strong>Feedback by:</strong> 100234</span> <br>
                    <span><strong>For:</strong> 100567</span> <br>
                    <span><strong>Posted:</strong> 03/07/2025</span> <br>
                    <div>Great team player, always helpful.</div>
                </div>

                <div class="feedback-item">
                    <span><strong>Feedback by:</strong> 100789</span> <br>
                    <span><strong>For:</strong> 100432</span> <br>
                    <span><strong>Posted:</strong> 03/05/2025</span> <br>
                    <div>Consistently meets deadlines with quality work.</div>
                </div>

                <div class="feedback-item">
                    <span><strong>Feedback by:</strong> 100321</span> <br>
                    <span><strong>For:</strong> 100654</span> <br>
                    <span><strong>Posted:</strong> 03/03/2025</span> <br>
                    <div>Shows strong leadership skills in projects.</div>
                </div>
                -->
            </div>
        </div>


        <!-- SAMPLE CONTENT MAKE DYNAMIC SOON -->

        <!-- SALARY PORTION -->
        <div id="salary" class="tab-pane fade">
            <div class="salary-container">
                <button id="createInvoiceBtn" class="btn btn-primary create-invoice">Create Invoice</button>
            </div>
            <!-- PHP SCRIPT TO DYNAMICALLY LOAD SALARY LISTS -->
            <div id="salaryList" class="salary-list">
                <?php
                include 'connection.php';

                // Modify the SQL query to join the payroll and employee tables, similar to your provided structure
                $sql_fetch_salaries = "SELECT payroll.P_AMT, payroll.P_DATE, payroll.EMP_ID_FK_PAY, e.EMP_FNAME, e.EMP_LNAME
                                                FROM payroll
                                                LEFT JOIN employee e ON payroll.EMP_ID_FK_PAY = e.EMP_ID
                                                ORDER BY payroll.P_DATE DESC";
                $result = $conn->query($sql_fetch_salaries);

                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) { ?>
                        <div class="salary-item">
                            <span><strong>Employee ID:</strong>
                                <?php echo $row['EMP_ID_FK_PAY'] . " (" . $row['EMP_FNAME'] . " " . $row['EMP_LNAME'] . ")"; ?></span>
                            <br>
                            <span><strong>Salary:</strong> ₱<?php echo number_format($row['P_AMT'], 2); ?></span> <br>
                            <span><strong>Date:</strong> <?php echo $row['P_DATE']; ?></span>
                        </div>
                    <?php }
                } else {
                    echo "<p>No salary records found.</p>";
                }
                $conn->close();
                ?>
            </div>
        </div>
        </div>

        <!-- Invoice Popup Modal -->
        <div id="invoiceModal" class="modal">
            <div class="modal-content">
                <h2 id="modalTitle"></h2>
                <label>Employee ID:</label>
                <input type="number" maxlength="6" id="modalEmployeeId">

                <label>Salary:</label>
                <input type="number" id="modalSalary">

                <label>Date:</label>
                <input type="date" id="modalDate">

                <div class="modal-buttons">
                    <button type="submit" id="saveInvoiceBtn" style="background-color: green"
                        class="btn btn-primary">Save</button>
                    <button id="closeModalBtn" style="background-color: red"
                        class="btn btn-primary close">Cancel</button>
                </div>
            </div>
        </div>

        <!-- SAMPLE CONTENT MAKE DYNAMIC SOON -->
        <div id="profileModal" class="profile-modal">
            <div class="profile-content">
                <span class="close-btn">&larr;</span>
                <div class="profile-header">
                    <img src="./images/profilePlaceholder.png" alt="Profile Picture" class="profile-img">
                    <h3>Admin ID: <?php echo $admin['ADM_ID']; ?></h3>
                    <p>Joined in <?php echo $admin['ADM_DATE']; ?></p>
                </div>

                <div class="profile-info">
                    <p><strong>Role:</strong> Admin - <?php echo $admin['ADM_POS']; ?></p>

                </div>
            </div>
        </div>

        <div id="passwordModal" class="profile-modal">
            <div class="profile-content">
                <span class="close-btn" id="closePasswordModal">&larr;</span>
                <h4 class="text-center">Change Password</h4>

                <div class="password-container">
                    <form method="POST">
                        <input name="old_pass_admin" type="password" id="currentPassword"
                            placeholder="Current Password">
                        <input name="new_pass_admin" type="password" id="newPassword" placeholder="New Password">
                        <input name="confirm_new_admin" type="password" id="confirmPassword"
                            placeholder="Confirm Password">
                        <button name="admin_changepass_submit" id="savePassword" type="submit"
                            class="btn btn-success">Save Password</button>
                    </form>

                    <!--PHP CHANGE PASS ADMIN-->
                    <?php
                    include "connection.php";

                    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['admin_changepass_submit'])) {
                        $admin_ID = $_SESSION["ADM_ID"] ?? null;
                        if ($admin_ID === null) {
                            echo "<script>alert('Admin not logged in.'); window.location.href='admin.php';</script>";
                            exit();
                        }

                        $old_pass_admin = $_POST['old_pass_admin'];
                        $new_pass_admin = $_POST['new_pass_admin'];
                        $confirm_new_admin = $_POST["confirm_new_admin"];

                        $sql_pass_checker = "SELECT ADM_PASS FROM administrator WHERE ADM_ID = ?";
                        $adm_pass_checker = $conn->prepare($sql_pass_checker);
                        $adm_pass_checker->bind_param("i", $admin_ID);
                        $adm_pass_checker->execute();
                        $adm_pass_checker->bind_result($dbPassword);
                        $adm_pass_checker->fetch();
                        $adm_pass_checker->close();

                        // Check if old password is correct
                        if ($old_pass_admin !== $dbPassword) {
                            echo "<script>alert('Incorrect current password.'); window.location.href='admin.php';</script>";
                            exit();
                        }

                        // Check if new passwords match
                        if ($new_pass_admin !== $confirm_new_admin) {
                            echo "<script>alert('New password and confirm password do not match.'); window.location.href='admin.php';</script>";
                            exit();
                        }

                        // Update password
                        $adm_pass_update = "UPDATE administrator SET ADM_PASS = ? WHERE ADM_ID = ?";
                        $update_admpass = $conn->prepare($adm_pass_update);
                        $update_admpass->bind_param("si", $new_pass_admin, $admin_ID);

                        if ($update_admpass->execute()) {
                            echo "<script>alert('Password updated successfully.'); window.location.href='admin.php';</script>";
                        } else {
                            echo "<script>alert('Error updating password.'); window.location.href='admin.php';</script>";
                        }

                        // Close connections
                        $update_admpass->close();
                        $conn->close();
                    }
                    ?>

                </div>
            </div>
        </div>

    </section>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>

    <script src="js\admin.js"></script>

</body>

</html>