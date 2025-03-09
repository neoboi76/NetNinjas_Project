<!DOCTYPE html>

<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html" charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="Content" content="Project 2 : Web Design and Development">
    <meta name="Page" content="Sign Up Page">

    <!--  Bootstrap stylesheet link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <!-- local CSS stylesheet link -->
    <link rel="stylesheet" href="./css/signup.css">

    <link rel="icon" href="./images/logo.png">

    <link href='https://fonts.googleapis.com/css?family=Open Sans' rel='stylesheet'>

    <title>Sign Up</title>

</head>

<body>

    <section class="container-fluid p-3 d-flex align-items-center m-3">
        <div class="logo me-3">
            <img src="./images/logo.png" alt="San Antonio Logo" width="75px" height="75px">
        </div>

        <div class="headTitle">
            <h2 class="mb-0" style="color: black"><b>BARANGAY SAN ANTONIO | MAKATI CITY</b></h2>
            <h3 class="mb-0" style="color: white">EMPLOYEE MANAGEMENT SYSTEM</h3>
        </div>
    </section>

    <section class="signup-center">
        <div class="signup-container text-center">
            <h2 class="mb-4"><b>Sign Up</b></h2>
            <form method = "POST" id="signupForm">
                <div class="mb-3">
                    <input name = "email" type="text" id="emailText" class="form-control" style="background-color: lightblue;"
                        placeholder="Email" required>
                </div>
                <div class="mb-3">
                    <input name = "emp_ID" type="number" maxlength="6" class="form-control" id="idText"
                        style="background-color: lightblue;" placeholder="Employee ID" required>
                </div>
                <div class="mb-3 password-container">
                    <input name = "pass" type="password" id="passwordText" class="form-control" style="background-color: lightblue;"
                        placeholder="Password" required>
                    <span class="toggle-password" onclick="togglePassword()">👁️</span>
                </div>
                <div class="mb-3 password-container">
                    <input name = "new_pass" type="password" id="confirmPassword" class="form-control"
                        style="background-color: lightblue;" placeholder="New Password" required>
                </div>
                <button name = "sign_up_submit" type="submit" class="btn btn-primary btn-signup">Sign Up</button>
            </form>
            
            <!--PHP SIGNUP-->
            <?php
                  include "connection.php";

                  if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['sign_up_submit'])) {
                      $email = $_POST['email'];
                      $emp_ID = $_POST['emp_ID'];
                      $pass = $_POST['pass'];
                      $new_pass = $_POST['new_pass'];
              
                      // Ensure the user enters the default password before updating
                      if ($pass !== "vivanetninjas") {
                          echo "<script>alert('You must enter the default password first!'); window.location.href='signup.php';</script>";
                          exit();
                      }
              
                      // Check if Employee ID exists and default password matches
                      $credential_checker = "SELECT * FROM employee WHERE EMP_ID = ? AND EMP_PASS = ?";
                      $email_pass_check = $conn->prepare($credential_checker);
                      $email_pass_check->bind_param("is", $emp_ID, $pass);
                      $email_pass_check->execute();
                      $check = $email_pass_check->get_result();
              
                      if ($check->num_rows > 0) {
                          // Update email and password
                          $update_credentials = "UPDATE employee SET EMP_EMAIL = ?, EMP_PASS = ? WHERE EMP_ID = ?";
                          $new_credentials = $conn->prepare($update_credentials);
                          $new_credentials->bind_param("ssi", $email, $new_pass, $emp_ID);
              
                          if ($new_credentials->execute()) {
                              echo "<script>alert('Sign-up successful! Redirecting to login...'); window.location.href='index.php';</script>";
                              exit();
                          } else {
                              echo "<script>alert('Error updating account! Please try again.'); window.location.href='signup.php';</script>";
                              exit();
                          }
                      } else {
                          echo "<script>alert('Invalid Employee ID or Default Password!'); window.location.href='signup.php';</script>";
                          exit();
                      }
              
                      // Close statements
                      $email_pass_check->close();
                      $new_credentials->close();
                  }
                  $conn->close();
            ?>

        </div>
    </section>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>

    <script src="js\signup.js"></script>

</body>

</html>