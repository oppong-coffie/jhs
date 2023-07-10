<?php
session_start();

//database connection
$connection = mysqli_connect('localhost', 'root', '', 'management_class');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <style>
        .active {
            background-color: #e9e3ff;
            height: 30px;
            border-radius: 5px;
            padding-left: 4px;
            padding-top: 2px;
        }
    </style>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Teachers Registeration</title>
    <!-- assets -->
    <!-- assets -->
    <link rel="stylesheet" href="../Assets/fonts/fonts.css">
    <link rel="stylesheet" href="../Assets/fontawesome/css/all.css">

    <!-- scripts -->
    <!-- scripts -->
    <script src="../Assets/tailwind.js"></script>
</head>

<body class=" h-[100vh]" style="font-family: poppins;">
    <div class="">
        <!-- side nav -->
        <!-- side nav -->
        <div class="w-60 h-[100vh] absolute ">
            <div class="p-8">
                <!-- logo -->
                <!-- logo -->
                <div class=" ">
                    <img class="h-20 w-20 rounded-full" src="../images/success-student-consulting_7109-29.avif" alt="">
                    <p></p>
                </div>
                <!-- nav links -->
                <!-- nav links -->
                <div class="mt-8">
                    <li class="list-none ">
                        <i class="fa-regular fa-house text-gray-500"></i><a class="ml-2 text-gray-500" href="admin.php">Dashboard</a>
                    </li>
                    <li class="list-none mt-4">
                        <i class="fa-regular fa-briefcase text-gray-500"></i><a class="ml-2 text-gray-500" href="">Courses</a>
                    </li>
                    <li class="list-none mt-4 active">
                        <i class="fa-regular fa-person-chalkboard text-gray-500"></i><a class="ml-2 text-gray-500" href="">Teachers</a>
                    </li>
                    <li class="list-none mt-4">
                        <i class="fa-regular fa-briefcase text-gray-500"></i><a class="ml-2 text-gray-500" href="">Students</a>
                    </li>
                    <li class="list-none mt-4">
                        <i class="fa-regular fa-briefcase text-gray-500"></i><a class="ml-2 text-gray-500" href="">Parents</a>
                    </li>
                    <li class="list-none mt-4">
                        <i class="fa-regular fa-briefcase text-gray-500"></i><a class="ml-2 text-gray-500" href="">User</a>
                    </li>
                    <li class="list-none mt-4">
                        <i class="fa-regular fa-square-poll-vertical text-gray-500"></i><a class="ml-2 text-gray-500" href="">Results</a>
                    </li>
                    <li class="list-none mt-4">
                        <i class="fa-regular fa-comment text-gray-500"></i><a class="ml-2 text-gray-500" href="">Chat</a>
                    </li>
                    <li class="list-none mt-4">
                        <i class="fa-regular fa-gear text-gray-500"></i><a class="ml-2 text-gray-500" href="">Settings</a>
                    </li>

                </div>
            </div>

            <!-- logout-->
            <!-- logout-->
            <form action="" method="post" onsubmit="return confirmLogout()">
                <div class="h-10 bg-[#8a70d6] bottom-0 fixed w-60 text-black p-2 flex">
                    <div>
                        <input class="h-10 bg-[#8a70d6] bottom-0 fixed text-white p-2 w-40 flex text-[20px]" type="submit" value="LOGOUT" name="logout">
                    </div>
                    <div class="ml-auto ">
                        <i class="fa-solid fa-right-from-bracket text-[22px]  text-blue-50"></i>
                    </div>
                </div>
            </form>
        </div>
        <!-- page content -->
        <!-- page content -->
        <div class=" ml-64 pt-6">
            <div class="grid grid-cols-3">
                <div class="col-span-2">
                    <p class="text-[25px]">Register New Parents Here</p>
                </div>

                <!-- add teacherg -->
                <!-- add teacher -->
                <a href="teachers_reg.php">
                    <div class="flex justify-center ">
                        <div class="h-10 w-10 bg-[#8a70d6] rounded-md flex justify-center items-center">
                            <i class="fa-regular fa-backward fa-fade text-white"></i>
                        </div>
                    </div>
                </a>
            </div>

            <!-- registeration form-->
            <!-- registeration form-->
            <div class="h-[90vh] flex  justify-center items-center">
                <form action="" method="post" enctype="multipart/form-data">
                    <div class="flex gap-20 justify-center items-center ">
                        <div>
                            <!-- id -->
                            <div>
                                <label class="text-[18px]" for="name">Parent id</label><br>
                                <input class="bg-[#e9e3ff] border border-[#e9e3ff] h-10 w-60 rounded-md outline-none pl-2" type="text" placeholder="Enter id" name="id" required><br><br>
                            </div>
                            <!-- name -->
                            <div>
                                <label class="text-[18px]" for="name">Name</label><br>
                                <input class="bg-[#e9e3ff] border border-[#e9e3ff] h-10 w-60 rounded-md outline-none pl-2" type="text" placeholder="Enter name" name="name" required><br><br>
                            </div>
                            <!-- email -->
                            <div>
                                <label class="text-[18px]" for="email">Email</label><br>
                                <input class="bg-[#e9e3ff] border border-[#e9e3ff] h-10 w-60 rounded-md outline-none pl-2" type="email" placeholder="Enter email" name="email" required><br><br>
                            </div>
                           
                        </div>

                        <div>
                           <!-- paasword -->
                            <div>
                                <label class="text-[18px]" for="name">Password</label><br>
                                <input class="bg-[#e9e3ff] border border-[#e9e3ff] h-10 w-60 rounded-md outline-none pl-2" type="text" placeholder="Enter password" name="password" required><br><br>
                            </div>
                            <!-- email -->
                            <div>
                                <label class="text-[18px]" for="gender">Role</label><br>
                                <select class="bg-[#e9e3ff] border border-[#e9e3ff] h-10 w-60 rounded-md outline-none pl-2" name="role" id="" required>
                                    <option value=""><-- select role --></option>
                                    <option value="admin">
                                       admin
                                    </option>
                                    <option value="teacher">
                                        teacher
                                    </option>
                                    <option value="parent">
                                        parent
                                    </option>
                                    <option value="student">
                                        student
                                    </option>
                                </select>
                            </div><br>
                            <!-- phone -->
                            <div>
                                <label class="text-[18px]" for="phone">Phone</label><br>
                                <input class="bg-[#e9e3ff] border border-[#e9e3ff] h-10 w-60 rounded-md outline-none pl-2" type="number" placeholder="Enter number" name="phone" required><br><br>
                            </div>
                        </div>

                        <div>
                            <!-- date of birth -->
                            <div>
                                <label class="text-[18px]" for="dob">Birth Date</label><br>
                                <input class="bg-[#e9e3ff] border border-[#e9e3ff] h-10 w-60 rounded-md outline-none pl-2" type="date" placeholder="Enter date of birth" name="dob" required><br><br>
                            </div>
                            
                            <!-- image -->
                            <div>
                                <label class="text-[18px]" for="image">Image</label><br>
                                <input class="bg-[#e9e3ff] border border-[#e9e3ff] h-10 w-60 rounded-md outline-none pl-2" type="file" name="image" required><br><br>
                            </div>
                            <!--gender -->
                            <div>
                                <label class="text-[18px]" for="gender">Gender</label><br>
                                <select class="bg-[#e9e3ff] border border-[#e9e3ff] h-10 w-60 rounded-md outline-none pl-2" name="gender" id="" required>
                                    <option value=""><-- select gender --></option>
                                    <option value="male">
                                        Male
                                    </option>
                                    <option value="female">
                                        Female
                                    </option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <!-- submit -->
                    <div class="text-center text-20 mt-10">
                        <input class="bg-[#8a70d6] border border-[#8a70d6] h-10 w-80 rounded-md outline-none pl-2 text-white text-[20px]" type="submit" value="Register" name="register">
                    </div>
                </form>
            </div>
        </div>

    </div>



    <!-- confirm before delete -->
    <script>
        function confirmLogout() {
            return confirm("Are you sure you want to logout?");
        }
    </script>
</body>

</html>
<?php
//checking if user is logged in
if (isset($_POST['logout'])) {
    //unset all the session
    session_unset();

    //destroying the session
    session_destroy();

    //redirecting the user to the login page
    header("Location:index.php");
}

if (isset($_POST["register"])) {
    // Retrieving data from the form and sanitizing input
    $id = mysqli_real_escape_string($connection, $_POST["id"]);
    $password = mysqli_real_escape_string($connection, $_POST["password"]);
    $role = mysqli_real_escape_string($connection, $_POST["role"]);
    $name = mysqli_real_escape_string($connection, $_POST["name"]);
    $email = mysqli_real_escape_string($connection, $_POST["email"]);
    $phone = mysqli_real_escape_string($connection, $_POST["phone"]);
    $dob = mysqli_real_escape_string($connection, $_POST["dob"]);
    $gender = mysqli_real_escape_string($connection, $_POST["gender"]);
    $image = $_FILES["image"]["name"];
    $img_temp_name = $_FILES['image']['tmp_name'];
    $img_path = "../images/" . $image;
    $date = date("Y-m-d");

    // Now let's move the uploaded image into the folder: image
    if (move_uploaded_file($img_temp_name, $img_path)) {
        // Inserting data into the database
        $insert_query = mysqli_query($connection, "INSERT INTO parents (`parents_id`, `name`, `images`, `email`, `birth_date`, `phone`, `gender`, `role`,`password`,`date`) VALUES ('$id', '$name', '$image', '$email', '$dob', '$phone', '$gender', '$role',password('$password'),'$date')");


        if ($insert_query) {
            echo "<script>
                alert('Registration Successful');
                window.location.href = 'parents_reg.php';
            </script>";
        } else {
            echo "<script>
                alert('Registration Failed');
            </script>";
        }
    } else {
        echo "<script>
            alert('Failed to upload image');
        </script>";
    }
}

?>