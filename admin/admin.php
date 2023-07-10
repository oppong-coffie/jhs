<?php
session_start();
$teacherid = $_GET['teacherid'];

if(!isset($_SESSION['email'])){

}

//database connection
$connection = mysqli_connect('localhost', 'root', '', 'management_class');

//get data fro teachers
$teachersql = "SELECT * FROM allteachers WHERE teacherid = 1";
$teacherquery = mysqli_query($connection, $teachersql);
$teacherow = mysqli_fetch_array($teacherquery);
echo $teacherow['name'];
$course = $teacherow['course'];
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
    <title>ADMIN DASHBOARD || DASHBOARD</title>
    <!-- assets -->
    <!-- assets -->
    <link rel="stylesheet" href="../Assets/fonts/fonts.css">
    <link rel="stylesheet" href="../Assets/fontawesome/css/all.css">

    <!-- scripts -->
    <!-- scripts -->
    <script src="../Assets/tailwind.js"></script>
    <script src="../Assets/jquery-3.6.0.min.js"></script>
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
                    <li class="list-none active">
                        <i class="fa-regular fa-house text-gray-500 "></i><a class="ml-2 text-gray-500" href="admin.php">Dashboard</a>
                    </li>
                    <li class="list-none mt-4">
                        <i class="fa-regular fa-briefcase text-gray-500"></i><a class="ml-2 text-gray-500" href="">Courses</a>
                    </li>
                    <li class="list-none mt-4">
                        <i class="fa-regular fa-briefcase text-gray-500"></i><a class="ml-2 text-gray-500" href="teachers_reg.php">Teachers</a>
                    </li>
                    <li class="list-none mt-4">
                        <i class="fa-regular fa-users text-gray-500"></i><a class="ml-2 text-gray-500" href="students_reg.php">Students</a>
                    </li>
                    <li class="list-none mt-4">
                        <i class="fa-regular fa-user text-gray-500"></i><a class="ml-2 text-gray-500" href="parents_reg.php">Parents</a>
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
        <div class=" ml-64 pt-6 grid grid-cols-3">
            <div class="grid grid-cols-3 col-span-2 ">
                <div>
                    <p class="text-[25px]">Dashboard</p>
                </div>
                <!-- search bar -->
                <!-- search bar -->
                <div class="-ml-10">
                    <form action="" method="post">
                        <input type="search" placeholder="Enter what to search" class="bg-[#e9e3ff] h-10 w-80 rounded-md pl-4 outline-none">
                    </form>
                </div>
                <!-- notification -->
                <!-- notification -->
                <div class="flex justify-center ml-20">
                    <div class="h-10 w-10 bg-[#e9e3ff] rounded-md flex justify-center items-center">
                        <i class="fa-reqular fa-regular fa-bell "></i>
                    </div>
                </div>


                <div class=" flex-cols-1 ">
                    <div class="grid grid-cols-3 lg:gap-[260px]">
                        <div class="">
                            <!-- total  students -->
                            <div class="h-60 w-40 bg bg-[#e9e3ff] rounded-md flex-cols-1 justify-center pt-4">
                                <div class="w-[120px] h-[120px] bg-[#8a70d6] rounded-md m-auto flex justify-center items-center">
                                    <i class="fa-regular fa-screen-users text-[48px] text-white"></i>
                                </div>
                                <p class="ml-4 mt-2 text-[18px] text-gray-700">
                                    Total Students
                                </p>
                                <div class="flex justify-center items-center">
                                <p class="text-[35px] text-gray-700"><?php
                                    $query = "SELECT COUNT(student_id) AS count FROM students";
                                    $result = mysqli_query($connection, $query);
                                    if ($result) {
                                        $row = mysqli_fetch_assoc($result);
                                        if ($row) {
                                            $count = $row["count"];
                                            echo $count;
                                        }
                                    }
                                ?></p>
                                </div>
                            </div>

                        </div>
                        <div class="">
                            <!-- total  staff -->
                            <div class="h-60 w-40 bg bg-blue-100 rounded-md flex-cols-1 justify-center pt-4">
                                <div class="w-[120px] h-[120px] bg-blue-400 rounded-md m-auto flex justify-center items-center">
                                    <i class="fa-regular fa-person-chalkboard text-[48px] text-white"></i>
                                </div>
                                <p class="ml-4 mt-2 text-[18px] text-gray-700">
                                    Total Teachers
                                </p>

                                <div class="flex justify-center items-center">
                                <p class="text-[35px] text-gray-700"><?php
                                    $query = "SELECT COUNT(teacher_id) AS count FROM teachers ";
                                    $result = mysqli_query($connection, $query);
                                    if ($result) {
                                        $row = mysqli_fetch_assoc($result);
                                        if ($row) {
                                            $count = $row["count"];
                                            echo $count;
                                        }
                                    }
                                ?></p>
                                </div>
                            </div>

                        </div>
                        <div class="">
                            <!-- courses -->
                            <div class="h-60 w-40 bg bg-yellow-100 rounded-md flex-cols-1 justify-center pt-4">
                                <div class="w-[120px] h-[120px] bg-[#E8A462] rounded-md m-auto flex justify-center items-center">
                                    <i class="fa-regular fa-briefcase text-gray-500 text-[48px] text-white"></i>
                                </div>
                                <p class="ml-4 mt-2 text-[18px] text-gray-700">
                                     Courses
                                </p>

                                <div class="flex justify-center items-center">
                                <p class="text-[35px] text-gray-700"><?php
                                   
                                    $query = "SELECT COUNT(student_id) AS count FROM students ";
                                    $result = mysqli_query($connection, $query);
                                    if ($result) {
                                        $row = mysqli_fetch_assoc($result);
                                        if ($row) {
                                            $count = $row["count"];
                                            echo $count;
                                        }
                                    }
                                ?></p>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>




            <div class="m-auto flex flex-col justify-center space-y-[90px]  ">
                <!-- profile -->
                <!-- profile -->
                <div>
                    <div class="flex ">
                        <div>
                            <p class="text-[19px]">Profile</p>
                        </div>
                        <div class="ml-auto">
                            <a href="admin_profile_edit.php">
                                <div class="h-8 w-8 bg-gray-100 rounded-md flex justify-center items-center">
                                    <i class="fa-light fa-pen fa-beat"></i>
                                </div>
                            </a>
                        </div>
                    </div>
                    <!-- profile logo-->
                    <div class="flex justify-center mt-10">
                        <div class="text-center">
                            <!-- image -->
                            <div class="">
                                <?php
                                $email = $_SESSION["email"];
                                    $image_select_query = mysqli_query($connection,"SELECT images FROM registeration WHERE email='$email'");
                                    $row = mysqli_fetch_array($image_select_query);
                                    if(is_array($row)){
                                        $image  = $row["images"];
                                        echo "<img class='h-[60px] w-[60px] rounded-full' src='../images/$image' alt='Admin image'>";
                                    }
                                ?>
                            </div>
                            
                            <!-- the name of the admin -->
                            <p class="text-[14px] text-gray-500">
                                <?php
                                    $email = $_SESSION["email"];
                                    $select_query = mysqli_query($connection,"SELECT name FROM registeration WHERE email = '$email'");
                                    $row = mysqli_fetch_array($select_query);
                                    if(is_array($row)){
                                        echo $row["name"];
                                    }
                                ?>
                            </p>
                        </div>
                    </div>
                </div>

                <!-- class progress -->
                <!-- class progress -->
                <div>
                    <div class=" ">
                        <p class="text-[19px]">Result Upload</p>
                        <!-- class exercises -->
                        <a href="exerciseReport.php?teacherid=<?php echo $teacherid; ?>&course=<?php echo $course; ?>">
    <div class="h-11 w-60 bg-[#8a70d6] mt-6 rounded-md flex items-center gap-6 pl-2 pr-4">
        <p>
            <i class="fa-regular fa-pen-line text-white"></i>
        </p>
        <p class="text-white">
            Exercises
        </p>
        <p class="ml-auto">
            <i class="fa-solid fa-greater-than text-white"></i>
        </p>
    </div>
</a>

                        <!-- class quize -->
                        <a href="">
                            <div class="h-11 w-60 bg-[#8a70d6] mt-6 rounded-md flex items-center gap-6 pl-2 pr-4">
                                <p>
                                    <i class="fa-regular fa-user-pen text-white"></i>
                                </p>
                                <p class="text-white">
                                    Mid-semester
                                </p>
                                <p class="ml-auto">
                                    <i class="fa-solid fa-greater-than text-white"></i>
                                </p>
                            </div>
                        </a>
                        <!-- class assignment -->
                        <a href="">
                            <div class="h-11 w-60 bg-[#8a70d6] mt-6 rounded-md flex items-center gap-6 pl-2 pr-4">
                                <p>
                                    <i class="fa-regular fa-house-person-return text-white"></i>
                                </p>
                                <p class="text-white">
                                    Assignments
                                </p>
                                <p class="ml-auto">
                                    <i class="fa-solid fa-greater-than text-white"></i>
                                </p>
                            </div>
                        </a>

                        <!-- class assignment -->
                        <a href="">
                            <div class="h-11 w-60 bg-[#8a70d6] mt-6 rounded-md flex items-center gap-6 pl-2 pr-4">
                                <p>
                                    <i class="fa-regular fa-house-person-return text-white"></i>
                                </p>
                                <p class="text-white">
                                    Examination
                                </p>
                                <p class="ml-auto">
                                    <i class="fa-solid fa-greater-than text-white"></i>
                                </p>
                            </div>
                        </a>

                    </div>
                </div>
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

    //redirect
    echo "
        <script>
            window.location.href='index.php';
        </script>
    ";
}
?>