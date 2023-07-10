
<?php
session_start();
//including the db file
include("./database/db_connection.php");
include("./database/LoginAuth.php");

//creating object from the db
$bd = new DB('localhost', 'root', '', 'management_class');
$db->connect();


if (isset($_POST["login"])) {
    // Retrieving data from the database
    $email = $_POST["email"];
    $password = $_POST["password"];
    $role = $_POST["role"];

    // Admin login credential
    $query = "SELECT * FROM admin WHERE email='$email' AND password='$password'AND role='$role' ";
    $admin_statement = mysqli_query($connection, $query);
    $admin_row = mysqli_fetch_array($admin_statement);

    // Parents login details
    $query = "SELECT * FROM parents WHERE email='$email' AND password='$password'AND role='$role' ";
    $parents_statement = mysqli_query($connection, $query);
    $parents_row = mysqli_fetch_array($parents_statement);

    // Students login details
    $query = "SELECT * FROM students WHERE email='$email' AND password='$password'AND role='$role' ";
    $students_statement = mysqli_query($connection, $query);
    $students_row = mysqli_fetch_array($students_statement);

    // Teachers login details
    $query = "SELECT * FROM teachers WHERE email='$email' AND password='$password'AND role='$role' ";
    $teachers_statement = mysqli_query($connection, $query);
    $teachers_row = mysqli_fetch_array($teachers_statement);

    if (is_array($admin_row)) {
        $_SESSION['email'] = $admin_row['email'];
        $_SESSION['password'] = $admin_row['password'];
    } elseif (is_array($parents_row)) {
        $_SESSION['email'] = $parents_row['email'];
        $_SESSION['password'] = $parents_row['password'];
    } elseif (is_array($students_row)) {
        $_SESSION['email'] = $students_row['email'];
        $_SESSION['password'] = $students_row['password'];
    } elseif (is_array($teachers_row)) {
        $_SESSION['email'] = $teachers_row['email'];
        $_SESSION['password'] = $teachers_row['password'];
    }

    // Check the role and redirect accordingly
    if (isset($admin_row['email'])) {
        header("Location: admin/admin.php");
        exit();
    } elseif (isset($parents_row)) {
        header("Location: parent/parent.php");
        exit();
    } elseif (isset($students_row)) {
        header("Location: students/student.php");
        exit();
    } elseif (isset($teachers_row)) {
        header("Location: teacher/teacher.php");
        exit();
    } else {
        echo "<script>alert('Incorrect login credentials');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>INDEX || LOGIN</title>
    <!-- assets -->
    <!-- assets -->
    <link rel="stylesheet" href="Assets/fonts/fonts.css">
    <link rel="stylesheet" href="Assets/fontawesome/css/all.css">

    <!-- scripts -->
    <!-- scripts -->
    <script src="Assets/tailwind.js"></script>
    <script src="Assets/jquery-3.6.0.min.js"></script>
</head>

<body class="" style="font-family: poppins;">
    <!-- page contents -->
    <!-- page contents -->
    <div class="lg:grid lg:grid-cols-2 ">
        <!-- login image -->
        <div class="md:flex md:justify-center md:items-center">
            <img class="lg:w-[50vw] lg:h-[100vh] mix-blend-normal" src="images/africa.avif" alt="">
        </div>

        <div class="flex justify-center items-center">
            <form action="" method="post">
                <!-- login header -->
                <div class="text-center">
                    <p class="text-[40px] lg:text-[60px] lg:text-[40px]">LOGIN</p>
                </div>

                <!-- role input field -->
                <div class="">
                    <label class="text-[18px] lg:text-[18px] md:text-[25px]" for="role">Role</label><br>
                    <select class="h-10 w-80 lg:h-10 rounded-md lg:w-80 outline-none md:w-[600px] md:h-14 w-80 bg-[#e9e3ff]" name="role">
                        <option md:text-[25px] value="">-- select role --</option>
                        <option md:text-[25px] value="admin">admin</option>
                        <option md:text-[25px] value="teacher">teacher</option>
                        <option md:text-[25px] value="student">student</option>
                        <option md:text-[25px] value="parent">parent</option>
                    </select>
                </div>

                <!-- email input field -->
                <div class="mt-4">
                    <label class="text-[18px] lg:text-[18px] md:text-[25px]" for="email">Email</label><br>
                    <input class="w-80 h-10 lg:h-10 rounded-md outline-none lg:w-80 bg-[#e9e3ff] p-2 md:w-[600px] md:h-14" name="email" type="text" placeholder="Enter email">
                </div>

                <!-- password input field -->
                <div class="mt-4 flex">
                    <div>
                        <label class="text-[18px] lg:text-[18px] md:text-[25px]" for="password">Password</label><br>
                        <input id="password" class="h-10 w-80 lg:h-10 rounded-md outline-none lg:w-80 bg-[#e9e3ff] p-2 md:w-[600px] md:h-14" name="password" type="password" placeholder="Enter password">
                    </div>
                    <div>
                        <p onclick="showPassword()">
                            <i id="icon" class="mt-10 fa-regular fa-eye -ml-6 lg:mt-10 md:mt-14"></i>
                        </p>
                    </div>
                </div>

                <!-- forget password link -->
                <div class="lg:text-[14px] text-right mt-4 ">
                    <a href="password-reset/confirm_email.php">
                        <p class="text-red-600 ]">Forgot password?</p>
                    </a>
                </div>

                <!-- submit button -->
                <div class="mt-6 pb-6">
                    <input class="w-80 h-10 lg:h-10x lg:w-80 bg-[#8a70d6] rounded-md text-white lg:text-[18px] md:w-[600px] md:h-14 md:text-[25px] md:placholder-md:text-[25px]" type="submit" value="LOGIN" name="login">
                </div>
            </form>
        </div>
    </div>
    
    <script>
        function showPassword() {
            var passwordField = document.getElementById("password");
            var toggleIcon = document.getElementById("icon");
            if (passwordField.type === "password") {
                passwordField.type = "text"
                toggleIcon.classList.remove("fa-eye");
                toggleIcon.classList.add("fa-eye-slash");
            } else {
                passwordField.type = "password"
                toggleIcon.classList.remove("fa-eye-slash");
                toggleIcon.classList.add("fa-eye");
            }
        }
    </script>
</body>

</html>
