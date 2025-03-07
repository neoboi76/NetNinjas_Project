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
        <p>Admin ID: <b>969696</b></p>
        <ul class="nav flex-column">
            <li class="nav-item"><a class="nav-link" id="announcement1" href="#announcement"
                    data-bs-toggle="tab">Announcement</a></li>
            <li class="nav-item"><a class="nav-link" id="employee1" href="#employee" data-bs-toggle="tab">Employee</a>
            </li>
            <li class="nav-item"><a class="nav-link" id="review1" href="#review" data-bs-toggle="tab">Review</a></li>
            <li class="nav-item"><a class="nav-link" id="department1" href="#department"
                    data-bs-toggle="tab">Department</a></li>
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
        <h2 id="pageTitle"><b>Welcome</b></h2>
        <div class="tab-content">
            <div id="welcome" class="tab-pane fade show active">Welcome!</div>
            <div id="announcement" class="tab-pane fade">
                <div class="container-fluid p-3">
                    <div class="text-left p-2">
                        <!-- Static now. Make Dynamic Later -->
                        <button type="submit" class="btn btn-primary">Manage Posts</button>
                    </div>
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

            <div id="employee" class="tab-pane fade">
                <div class="container p-4 bg-light rounded">
                    <!-- Employee Action Buttons -->
                    <div class="d-flex justify-content-start mb-3">
                        <button class="btn btn-primary me-2" id="viewEmployeeBtn">View Employee</button>
                        <button class="btn btn-primary me-2" id="addEmployeeBtn">Add Employee</button>
                        <button class="btn btn-primary" id="editEmployeeBtn">Edit Employee</button>
                    </div>

                    <!-- Placeholder for Dynamic Content -->
                    <div class="admin-placeholder p-4 rounded">
                        Future dynamic content goes here
                    </div>
                </div>
            </div>

            <!-- Add Employee Modal -->
            <div id="employeeModal" class="employee-modal">
                <div class="employee-modal-content">
                    <span class="employee-close">&times;</span>

                    <div class="employee-form">
                        <div class="employee-profile-pic">
                            <!-- Add profile picture -->
                            <img src="./images/profilePlaceholder.png" alt="Profile Picture">
                            <br>
                            <button>Add profile picture</button>
                        </div>

                        <form method="POST">
                        <input type="text" name = "emp_id_add" placeholder="Employee ID" required>
                        <input type="text" name = "emp_phoneNum_add" placeholder="Phone/Cellphone Number" required>
                        <input type="text" name = "emp_role_add" placeholder="Role" required>
                        <input type="text" placeholder="Department" required>

                        <div class="employee-name-fields">
                            <input type="text" name = "emp_fname_add" placeholder="First Name" required>
                            <input type="text" name = "emp_lname_add" placeholder="Last Name" required>
                        </div>

                        Birthdate: <input type="date" name = "emp_bday_add" placeholder="Birthdate" required>
                        <button class="btn btn-success" name = "add_employee">Add Employee</button>
                        </form>
                    </div>
                </div>
            </div>

            <?php 
                $host = "34.92.138.155"; 
                $user = "root2"; 
                $pass = "O1Bf>i:9/v&kA-@i"; 
                $db = "web2proj"; 
                
                $conn = new mysqli($host, $user, $pass, $db);

                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                }

                if(isset($_POST['add_employee'])){
                    $emp_id_add = $_POST['emp_id_add'];
                    $emp_phoneNum_add = $_POST['emp_phoneNum_add'];
                    $emp_role_add = $_POST['emp_role_add'];
                    $emp_fname_add = $_POST['emp_fname_add'];
                    $emp_lname_add = $_POST['emp_lname_add'];
                    $emp_bday_add = $_POST['emp_bday_add'];
                    $emp_pass_add = "vivanetninjas"; //hardcoded for now since the user will need to change it
                    $emp_joined_add = date("Y-m-d"); //records the day today

                    $sql_add = "INSERT INTO employee (EMP_ID, EMP_PASS, EMP_FNAME, EMP_LNAME, EMP_POS, EMP_PHONENUM, EMP_BIRTH, EMP_JOINED)
                                VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
                    
                    $emp_adding = $conn->prepare($sql_add);
                    $emp_adding->bind_param("isssssss", $emp_id_add, $emp_pass_add, $emp_fname_add, $emp_lname_add, $emp_role_add, $emp_phoneNum_add, $emp_bday_add, $emp_joined_add);

                    if ($emp_adding->execute()) {
                        echo "<script>alert('Employee added successfully!');</script>";
                    } else {
                        echo "<script>alert('Error: " . $emp_adding->error . "');</script>";
                    }

                    $emp_adding->close();
                }

                $conn->close();



            ?>

            <!-- Edit Employee Modal. It must already have content-->
            <div id="employeeEditModal" class="employeeEdit-modal">
                <div class="employeeEdit-modal-content">
                    <span class="employeeEdit-close">&times;</span>

                    <div class="employee-form">
                        <div class="employee-profile-pic">
                            <!-- Add profile picture -->
                            <img src="./images/profilePlaceholder.png" alt="Profile Picture">
                            <br>
                            <button>Edit profile picture</button>
                        </div>

                        <input type="text" placeholder="Employee ID" required>
                        <input type="text" placeholder="Phone/Cellphone Number" required>
                        <input type="text" placeholder="Role" required>
                        <input type="text" placeholder="Department" required>

                        <div class="employee-name-fields">
                            <input type="text" placeholder="First Name" required>
                            <input type="text" placeholder="Last Name" required>
                        </div>

                        Birthdate: <input type="date" placeholder="Birthdate" required>
                        <button class="btn btn-success">Save Changes</button>
                        <button class="btn btn-success">Delete Employee</button>
                    </div>
                </div>
            </div>


            <div id="review" class="tab-pane fade">
                <div class="container p-4 bg-light rounded">

                    <!-- Top Buttons -->
                    <div class="d-flex mb-3 align-center">
                        <button class="btn btn-primary" id="feedbackHistoryBtn">View Feedback History</button>
                    </div>


                    <form action="">
                        <div id="reviewContent">
                            <div class="mb-3">
                                <input style="border: 3px solid #b1b1b1; padding: 5px;" type="text"
                                    class="form-control bg-light" placeholder="Employee ID">
                            </div>

                            <div class="mb-3">
                                <input style="border: 3px solid #b1b1b1; padding: 5px;" type="text"
                                    class="form-control bg-light" placeholder="Subject">
                            </div>

                            <!-- Feedback Text Area -->
                            <div class="mb-3">
                                <textarea style="border: 3px solid #b1b1b1; padding: 15px;"
                                    class="form-control bg-light" rows="5" placeholder="Write Feedback"></textarea>
                            </div>

                            <!-- Submit Button -->
                            <div style="background-color: #f8f9fa; border: none;" class="d-flex justify-content-center">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                    </form>

                </div>

                <!-- Feedback History (Initially Hidden) -->
                <div id="feedbackHistoryContent" class="text-center d-none">
                    <h5 class="text-muted">You currently have no feedbacks given.</h5>
                </div>

                <div class="text-center mt-3">
                    <button id="backToReviewBtn" class="btn btn-secondary">Back</button>
                </div>

            </div>
        </div>

        <div id="department" class="tab-pane fade">

            <div class="d-flex align-items-center gap-2">
                <input type="text" id="employeeId" placeholder="Employee ID" class="form-control">
                <button id="addDepartment" class="btn btn-size" style="background-color: green;">+</button>
                <button id="clearDepartments" style="background-color: red;" class="btn btn-size">🗑</button>
            </div>


            <div id="departmentList" class="mt-3"></div>
        </div>

        <div id="caseManagement" class="tab-pane fade">
            <div class="container-fluid p-4">
                <div class="bg-white rounded-4 shadow p-4">
                    <div class="d-flex justify-content-between align-items-right mb-3">
                        <button class="btn btn-warning">Assign Cases</button>
                    </div>
                    <div class="border rounded-4 bg-light p-5 shadow" style="min-height: 250px;">Sample</div>
                </div>
            </div>
        </div>


        <div id="documents" class="tab-pane fade">
            <div class="custom-container p-3">
                <div class="button-group d-flex gap-3">
                    <button class="custom-btn" id="viewRecordsBtn">View Records</button>
                    <button class="custom-btn" id="viewReportsBtn">View Reports</button>
                    <button class="custom-btn" id="viewDocumentsBtn">View Documents</button>
                </div>
                <div class="content-box mt-3"></div>
            </div>
        </div>

        <div id="empDocuments" class="tab-pane fade d-none">
            <div class="documents-container">
                <!-- Add & Remove Buttons -->
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

        <div id="leave" class="tab-pane fade">
            <div id="leaveRequests"></div>
        </div>


        <div id="feedback" class="tab-pane fade">

        </div>

        <!-- SAMPLE CONTENT MAKE DYNAMIC SOON -->

        <div id="salary" class="tab-pane fade">
            <div class="salary-container">
                <button id="createInvoiceBtn" class="btn btn-primary create-invoice">Create Invoice</button>
            </div>

            <div id="salaryList" class="salary-list">
                <div class="salary-item">
                    <span><strong>Employee ID:</strong> 111111</span> <br>
                    <span><strong>Salary:</strong> ₱5,000.00</span> <br>
                    <span><strong>Date:</strong> 03/01/2025</span>
                </div>

                <div class="salary-item">
                    <span><strong>Employee ID:</strong> 222222</span> <br>
                    <span><strong>Salary:</strong> ₱6,200.00</span> <br>
                    <span><strong>Date:</strong> 03/01/2025</span>
                </div>

                <div class="salary-item">
                    <span><strong>Employee ID:</strong> 333333</span> <br>
                    <span><strong>Salary:</strong> ₱4,500</span> <br>
                    <span><strong>Date:</strong> 02/25/2025</span>
                </div>

                <div class="salary-item">
                    <span><strong>Employee ID:</strong> 444444</span> <br>
                    <span><strong>Salary:</strong> ₱7,000.00</span> <br>
                    <span><strong>Date:</strong> 02/20/2025</span>
                </div>
            </div>

        </div>

        <!-- Invoice Popup Modal -->
        <div id="invoiceModal" class="modal">
            <div class="modal-content">
                <h2 id="modalTitle"></h2>
                <label>Employee ID:</label>
                <input type="text" id="modalEmployeeId">

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
                    <h3>Admin ID: 969696</h3>
                    <p>Joined in 01/01/2025</p>
                </div>

                <div class="profile-info">
                    <p><strong>Role:</strong> Admin</p>
                    <div class="password-section">
                        <label><strong>Password:</strong></label>
                        <input type="password" value="1234" id="mainPassword" disabled>
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

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>

    <script src="js\admin.js"></script>

</body>

</html>