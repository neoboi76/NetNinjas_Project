<!DOCTYPE html>

<html lang="en">

<head>
   <meta http-equiv="Content-Type" content="text/html" charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <meta name="Content" content="Project 2 : Web Design and Development">
   <meta name="Page" content="Login Page">

   <!--  Bootstrap stylesheet link -->
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
      integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

   <!-- local CSS stylesheet link -->
   <link rel="stylesheet" href="./css/login.css">

   <link rel="icon" href="./images/logo.png">

   <link href='https://fonts.googleapis.com/css?family=Open Sans' rel='stylesheet'>

   <title>Login</title>

</head>

<body>

   <section class="container-fluid p-3 d-flex align-items-center m-3">
      <div class=" logo me-3">
         <img src="./images/logo.png" alt="San Antonio Logo" width="75px" height="75px">
      </div>

      <div class="headTitle">
         <h2 class="mb-0" style="color: black"><b>BARANGAY SAN ANTONIO | MAKATI CITY</b></h2>
         <h3 class="mb-0" style="color: white">EMPLOYEE MANAGEMENT SYSTEM</h3>
      </div>
   </section>

   <section class="login-center">
      <div class="login-container text-center">
         <h2 class="mb-4"><b>Login to Your Account</b></h2>
         <form id="loginForm">
            <div class="mb-3">
               <input type="text" maxlength="6" class="form-control" id="idText" style="background-color: lightblue;"
                  placeholder="Admin/Employee ID" required>
            </div>
            <div class="mb-3 password-container">
               <input type="password" id="passwordText" class="form-control" style="background-color: lightblue;"
                  placeholder="Password" required>
               <span class="toggle-password" onclick="togglePassword()">👁️</span>
            </div>
            <button id="login" type="submit" class="btn btn-primary btn-login">Log In</button>
         </form>

         <div class="privacy-notice text-center mt-3 p-2">
            <small>
               Barangay San Antonio values your privacy. In compliance with the Data Privacy Act of 2012, we ensure that
               any personal information collected through this website is protected and used solely for official
               barangay purposes. Once operational, the barangay will have full control over the website and its data
               management, ensuring transparency and accountability in handling your information. If you have any
               concerns regarding data privacy, please reach out to the barangay office.
            </small>
         </div>

      </div>
   </section>


   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
      crossorigin="anonymous"></script>

   <script src="js\login.js"></script>

</body>

</html>