<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <script src="./Assets/tailwind.js"></script>
    <script src="./Assets/sweetalert.min.js"></script>
    <link rel="stylesheet" href="./Assets/fonts/fonts.css">
    <link rel="stylesheet" href="./Assets/fontawesome/css/all.css">
</head>

<body style="font-family: poppins;">

<?php
session_start();
$connection = mysqli_connect('localhost', 'root', '', 'management_class');

if (isset($_POST["login"])) {
    $email = $_POST["email"];
    $password = $_POST["password"];
    $role = $_POST["role"];

    if (empty($email) || empty($password) || empty($role)) {
        echo "<script>
            Swal.fire({
                icon:'error',
                title:'Please fill in all fields',
                timer:2000
            });
        </script>";
    } else {
        if ($role == "teacher") {
            $query = "SELECT * FROM teachers WHERE email='$email' AND password='$password'";
        } elseif ($role == "student") {
            $query = "SELECT * FROM students WHERE email='$email' AND password='$password'";
        } elseif ($role == "Admin") {
            $query = "SELECT * FROM admin WHERE email='$email' AND password='$password'";
        } elseif ($role == "parent") {
            $query = "SELECT * FROM parents WHERE email='$email' AND password='$password'";
        }

        $queryResult = mysqli_query($connection, $query);
        
        if ($queryResult && mysqli_num_rows($queryResult) > 0) {
            $row = mysqli_fetch_array($queryResult);
            $_SESSION['email'] = $row['email'];
            
            $response = [
                'status' => 200,
                'message' => 'You have successfully logged in'
            ];
            header('Content-type: application/json');
            echo json_encode($response);
            
            if ($role == "teacher") {
                header("Location:./teachers/teacher_dashboard.php");
            } elseif ($role == "student") {
                header("Location: student_dashboard.php");
            } elseif ($role == "Admin") {
                header("Location:./admin/dashboard.php");
            } elseif ($role == "parent") {
                header("Location:./parents/parent_dashboard.php");
            }
            
            exit();
        } else {
            echo "<script>
                Swal.fire({
                    icon : 'error',
                    title : 'Invalid role, email or password',
                    timer : 2000
                });
            </script>";
        }
    }
}
?>

<div class="lg:grid lg:grid-cols-2">
    <div class="bg-[#6484F8] lg:h-[100vh] h-[75vh] md:h-[53vh] overflow-y-hidden">
        <div class="lg:h-[580px] lg:w-[560px] lg:bg-blue-400 rounded-tl-lg rounded-bl-lg ml-auto lg:mt-[60px] ">
            <div class="h-10 w-10 bg-white rounded-r-full  rounded-b-full "></div>
            <div class="h-10 w-10 mt-[500px] bg-white rounded-r-full rounded-t-full "></div>
            <div class="justify-center flex lg:-mt-[350px] -mt-[450px]">
                <div class="p-4">
                    <p class="text-4xl text-white ">School Management</p>
                    <p class="lg:text-center text-2xl mt-2 text-white md:text-center">System</p>
                    <p class="  mt-10 text-white">Make sure to provide accurate login credentials <br>to access this
                        system.Contact your administrator <br> if you have problems with your credentials</p>
                </div>
            </div>
        </div>
    </div>
    <div class="bg-blue-100 md:h-[70vh] lg:h-[100vh] h-[90vh]">
        <div class="md:flex md:justify-center h-60 w-60 bg-[#6484F8] ml-auto rounded-l-full rounded-b-full bg-opacity-60"></div>
        <div class="h-80 w-80 mt-[130px] ml-60 lg:ml-[360px] border border-[#6484F8] border-opacity-40 border-[20px] rounded-full ">
        </div>
        <div class="lg:h-[580px] lg:w-[560px] md:w-[560px] md:pb-10 lg:mr-auto  bg-blue-50 lg:-mt-[630px] -mt-[600px] rounded-tr-lg rounded-br-lg">
            <div class="flex justify-center items-center pb-10">
                <form action="" method="post">
                    <!-- login header -->
                    <div class="text-center mt-20">
                        Hello! Welcome back
                    </div>

                    <!-- role input field -->
                    <div class="mt-12">
                        <label class="text-sm" for="role">Role</label><br>
                        <select class="h-9 rounded-md outline-none w-[300px] text-gray-400 pl-2 text-sm shadow-md" name="role" required>
                            <option value="">-- select role --</option>
                            <option value="Admin">Admin</option>
                            <option value="teacher">teacher</option>
                            <option value="student">student</option>
                            <option value="parent">parent</option>
                        </select>
                    </div>

                    <!-- email input field -->
                    <div class="mt-4">
                        <label class="text-sm" for="email">Email</label><br>
                        <input class="h-9 rounded-md outline-none pl-2 w-[300px] text-sm shadow-md" name="email" type="email" placeholder="Enter email" required>
                    </div>

                    <!-- password input field -->
                    <div class="mt-4 flex">
                        <div>
                            <label class="text-sm" for="password">Password</label><br>
                            <input id="password" class="h-9 rounded-md pl-2 outline-none w-[300px] text-sm shadow-md" name="password" type="password" placeholder="Enter password" required>
                        </div>
                        <div>
                            <p onclick="showPassword()">
                                <i id="icon" class="fa-regular fa-eye -ml-6 mt-8 text-gray-400"></i>
                            </p>
                        </div>
                    </div>

                    <!-- forget password link -->
                    <div class="text-[14px] text-right mt-4 ">
                        <a href="password-reset/confirm_email.php">
                            <p class="text-red-600 text-sm">Forgot password?</p>
                        </a>
                    </div>

                    <!-- submit button -->
                    <div class="mt-6">
                        <input class="h-9 bg-[#6484F8] text-white rounded-md outline-none w-[300px] text-sm shadow-md" type="submit" value="LOGIN" name="login">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    function showPassword() {
        var passwordField = document.getElementById("password");
        var toggleIcon = document.getElementById("icon");
        if (passwordField.type === "password") {
            passwordField.type = "text";
            toggleIcon.classList.remove("fa-eye");
            toggleIcon.classList.add("fa-eye-slash");
        } else {
            passwordField.type = "password";
            toggleIcon.classList.remove("fa-eye-slash");
            toggleIcon.classList.add("fa-eye");
        }
    }
</script>
</body>

</html>
