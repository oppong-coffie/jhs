<?php
    session_start();
    //database connection
    //database connection
    $connection = mysqli_connect('localhost', 'root', '', 'management_class');

    if (isset($_POST["login"])) {
        // Retrieving data from the form
        // Retrieving data from the form
        $email = $_POST["email"];
        $password = $_POST["password"];
        $role = $_POST["role"];

        // Execute the query to check login credentials
        // Execute the query to check login credentials

        //teacher login checks
        //teacher login checks
        if ($role == "teacher") {
            $teacher = "SELECT * FROM teachers WHERE email='$email' AND password='$password'";
            $teacherQuery = mysqli_query($connection, $teacher);
            $teacherRow = mysqli_fetch_array($teacherQuery);
                if ($teacherRow) {
                    $_SESSION['email'] = $teacherRow['email'];
                    $response = [
                        'status' => 200,
                        'message' => 'You have successfully logged in'
                    ];
                    header('Content-type: application/json');
                    echo json_encode($response);
                    header("Location:./teachers/teacher_dashboard.php");
                    exit();
                } else {
                    echo "<script>
                        alert('Incorrect role, email or password');
                    </script>";
                }
        } 

        //student login checks
        //student login checks
        elseif ($role == "student") {
            $student = "SELECT * FROM students WHERE email='$email' AND password='$password'";
            $studentQuery = mysqli_query($connection, $student);
            $studentRow = mysqli_fetch_array($studentQuery);
                if ($studentRow) {
                    $_SESSION['std_id'] =$studentRow['std_id'];
                    header("Location: student_dashboard.php");
                    exit();
                } else {
                    echo "<script>
                        alert('Incorrect role, email or password');
                    </script>";
                }
        }


        //checking if admin details exist
        //checking if admin details exist
        elseif ($role == "Admin") {
            $admin = "SELECT * FROM admin WHERE email='$email' AND password='$password'";
            $adminQuery = mysqli_query($connection, $admin);
                if ($admin_row = mysqli_fetch_array($adminQuery)) {
                    $_SESSION['email'] =$admin_row['email'];
                    header("Location:./admin/index.php");
                    exit();
                } else {
                    echo "<script>
                        alert('Incorrect role, email or password');
                    </script>";
                }
        }

        //checking if parent details exist
        //checking if parent details exist
        elseif ($role == "parent") {
        $parent = "SELECT * FROM parents WHERE email='$email' AND password='$password'";
        $parentQuery = mysqli_query($connection, $parent);
        if ($parent_row = mysqli_fetch_array($parentQuery)) {
            $_SESSION['email'] =$parent_row['email'];
            header("Location:./parents/parent_dashboard.php");
            exit();
        }  else {
            echo "<script>
                alert('Incorrect role, email or password');
            </script>";
        }

    } else {
        echo "<script>
            alert('Please enter your login credentials');
        </script>";
}
        
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <style>
        body{
            overflow-x: hidden;
        }
        html {
            overflow-x: hidden;
        }
    </style>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="./Assets/tailwind.js"></script>
    <link rel="stylesheet" href="./Assets/fonts/fonts.css">
    <link rel="stylesheet" href="./Assets/fontawesome/css/all.css">
</head>

<bod style="font-family: poppins;">

    <div class="lg:grid lg:grid-cols-2">
        <div class="bg-[#6484F8]  lg:h-[100vh] h-[75vh] md:h-[53vh] overflow-y-hidden">
            <div class="lg:h-[580px] lg:w-[560px] lg:bg-blue-400 rounded-tl-lg rounded-bl-lg ml-auto lg:mt-[60px] ">
                <div class="h-10 w-10 bg-white rounded-r-full  rounded-b-full "></div>
                <div class="h-10 w-10 mt-[500px] bg-white rounded-r-full rounded-t-full "></div>
                <div class="justify-center flex lg:-mt-[350px] -mt-[450px]">
                    <div class="p-4">
                        <p class="text-4xl text-white ">School Management</p>
                        <p class="lg:text-center text-2xl mt-2 text-white md:text-center">System</p>
                        <p class="  mt-10 text-white">Make sure to provide accurate login credntials <br>to access this
                            system.Contact your adminiterator <br> if you have problem you credentials</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="bg-blue-100 md:h-[70vh] lg:h-[100vh] h-[90vh]">
            <div class="md:flex md:justify-center h-60 w-60 bg-[#6484F8] ml-auto rounded-l-full rounded-b-full bg-opacity-60"></div>
            <div
                class="h-80 w-80 mt-[130px] ml-60 lg:ml-[360px] border  border-[#6484F8] border-opacity-40  border-[20px]  rounded-full ">
            </div>
            <div class=" lg:h-[580px] lg:w-[560px] md:w-[560px] md:pb-10 lg:mr-auto  bg-blue-50 lg:-mt-[630px] -mt-[600px] rounded-tr-lg rounded-br-lg">
                <div class="flex justify-center items-center pb-10">
                    <form action="" method="post">
                        <!-- login header -->
                        <div class="text-center mt-20">
                            Hello! Welcome back
                        </div>

                        <!-- role input field -->
                        <div class="mt-12">
                            <label class="text-sm" for="role">Role</label><br>
                            <select class="h-9 rounded-md outline-none w-[300px] text-gray-400 pl-2 text-sm shadow-md"
                                name="role">
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
                            <input class="h-9 rounded-md outline-none pl-2 w-[300px] text-sm shadow-md" name="email"
                                type="text" placeholder="Enter email">
                        </div>

                        <!-- password input field -->
                        <div class="mt-4 flex">
                            <div>
                                <label class="text-sm" for="password">Password</label><br>
                                <input id="password"
                                    class="h-9 rounded-md pl-2 outline-none w-[300px] text-sm shadow-md" name="password"
                                    type="password" placeholder="Enter password">
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
                            <input
                                class="h-9 bg-[#6484F8] text-white rounded-md outline-none w-[300px] text-sm shadow-md"
                                type="submit" value="LOGIN" name="login">
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