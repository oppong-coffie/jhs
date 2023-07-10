<?php
session_start();

//database connection
$connection = mysqli_connect('localhost', 'root', '', 'management_class');
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
    <div class="lg:grid lg:grid-cols-2">
        <!-- login image -->
        <div>
            <img class="lg:w-[50vw] lg:h-[100vh] mix-blend-normal" src="images/africa.avif" alt="">
        </div>

        <div class="flex justify-center items-center">
            <form action="" method="post">
                <!-- login header -->
                <div class="text-center">
                    <p class="text-[40px]">LOGIN</p>
                </div>

                <!-- role input field -->
                <div class="">
                    <label class="text-[18px]" for="role">Role</label><br>
                    <select class="h-10 rounded-md outline-none w-80 bg-[#e9e3ff]" name="role">
                        <option value="">-- select role --</option>
                        <option value="admin">admin</option>
                        <option value="teacher">teacher</option>
                        <option value="student">student</option>
                        <option value="parent">parent</option>
                    </select>
                </div>

                <!-- email input field -->
                <div class="mt-4">
                    <label class="text-[18px]" for="email">Email</label><br>
                    <input class="h-10 rounded-md outline-none w-80 bg-[#e9e3ff] p-2" name="email" type="text" placeholder="Enter email">
                </div>

                <!-- password input field -->
                <div class="mt-4 flex">
                    <div>
                        <label class="text-[18px]" for="password">Password</label><br>
                        <input id="password" class="h-10 rounded-md outline-none w-80 bg-[#e9e3ff] p-2" name="password" type="password" placeholder="Enter password">
                    </div>
                    <div>
                        <p onclick="showPassword()">
                            <i id="icon" class="fa-regular fa-eye -ml-6 mt-10"></i>
                        </p>
                    </div>
                </div>

                <!-- forget password link -->
                <div class="text-[14px] text-right mt-4 ">
                    <a href="password-reset/confirm_email.php">
                        <p class="text-red-600">Forgot password?</p>
                    </a>
                </div>

                <!-- submit button -->
                <div class="mt-6">
                    <input class="h-9 w-80 bg-[#8a70d6] rounded-md text-white text-[18px]" type="submit" value="LOGIN" name="login">
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
<?php
if (isset($_POST["login"])) {
    // Retrieving data from the form
    $email = $_POST["email"];
    $password = $_POST["password"];
    $role = $_POST["role"];

    // Execute the query to check login credentials
    if ($role == "teacher") {
        $teachersql = "SELECT * FROM teachers WHERE email='$email' AND password='$password'";
        $teacherquery = mysqli_query($connection, $teachersql);
        $teacherstatement = mysqli_fetch_array($teacherquery);
        if ($teacherstatement) {
            $_SESSION['teacherid'] =$teacherstatement['teacher_id'];
            header("Location: teacher_dashboard.php");
            exit();
        } else {
            echo "Incorrect credentials";
        }
    } else if ($role == "student") {
        $studentsql = "SELECT * FROM students WHERE email='$email' AND password='$password'";
        $studentquery = mysqli_query($connection, $studentsql);
        $studentstatement = mysqli_fetch_array($studentquery);
        if ($studentstatement) {
            $_SESSION['std_id'] =$studentstatement['std_id'];
            header("Location: student_dashboard.php");
            exit();
        } else {
            echo "Incorrect credentials";
        }
    }
        else if ($role == "admin") {
            $studentsql = "SELECT * FROM admin WHERE email='$email' AND password='$password'";
            $studentquery = mysqli_query($connection, $studentsql);
            $studentstatement = mysqli_fetch_array($studentquery);
            if ($studentstatement) {
                $_SESSION['std_id'] ="admin";
                header("Location:./admin/admin1.php");
                exit();
            } else {
                echo "Incorrect credentials";
            }
    }

        else if ($role == "parent") {
            $studentsql = "SELECT * FROM parents WHERE email='$email' AND password='$password'";
            $studentquery = mysqli_query($connection, $studentsql);
            $studentstatement = mysqli_fetch_array($studentquery);
            if ($studentstatement) {
                $_SESSION['std_id'] =$studentstatement['std_id'];
                $_SESSION['id'] ='$studentstatement[]';
                header("Location:./parents/parent_dashboard.php");
                exit();
            } else {
                echo "Incorrect credentials";
            }
    }
        
    
    else {
        echo "<script>alert('Incorrect user');</script>";
    }
}

?>