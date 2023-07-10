<?php
session_start();
$teacherid=$_SESSION['teacherid'];

//database connection
$connection = mysqli_connect('localhost', 'root', '', 'management_class');

//fetch info about teacher from database
$teachersql="SELECT * FROM teachers WHERE teacher_id='$teacherid'";
$teacherquery=mysqli_query($connection, $teachersql);
$teacherRow=mysqli_fetch_array($teacherquery);
$subject=$teacherRow['subject'];
if ($teacherRow['jhs1'] == 'jhs1') {
    $jhs1 = 'JHS 1';
} else {
    $jhs1 = "";
};
if ($teacherRow['jhs2'] == 'jhs2') {
    $jhs2 = 'JHS 2';
} else {
    $jhs2 = "";
};
if ($teacherRow['jhs3'] == 'jhs3') {
    $jhs3 = 'JHS 3';
} else {
    $jhs3 = "";
};

?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TEACHERS DASHBOARD || DASHBOARD</title>
    <!-- assets -->
    <!-- assets -->
    <link rel="stylesheet" href="Assets/fonts/fonts.css">
    <link rel="stylesheet" href="Assets/fontawesome/css/all.css">

    <!-- scripts -->
    <!-- scripts -->
    <script src="Assets/tailwind.js"></script>
    <script src="Assets/jquery-3.6.0.min.js"></script>
</head>

<body class="bg-[#fbfbfb] h-[100vh]" style="font-family: poppins;">
    <div class="">
        <!-- side nav -->
        <!-- side nav -->
        <div class="w-60 h-[100vh] absolute ">
            <div class="p-8">
                <!-- logo -->
                <!-- logo -->
                <div>
                    <p class="text-[18px]">logo</p>
                </div>
                <!-- nav links -->
                <!-- nav links -->
                <div class="mt-8">
                    <li class="list-none active:bg-[#e9e3ff]">
                        <i class="fa-regular fa-house text-gray-500"></i><a class="ml-2 text-gray-500" href="#">Dashboard</a>
                    </li>
                    <!-- <li class="list-none mt-4">
                        <i class="fa-regular fa-square-poll-vertical text-gray-500"></i></i><a class="ml-2 text-gray-500" href="results.php">Results</a>
                    </li> -->
                    <li class="list-none mt-4">
                        <i class="fa-regular fa-comment text-gray-500"></i></i><a class="ml-2 text-gray-500" href="">Chat</a>
                    </li>
                    <li class="list-none mt-4">
                        <i class="fa-regular fa-gear text-gray-500"></i></i><a class="ml-2 text-gray-500" href="">Settings</a>
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
                    <!-- <form action="" method="post">
                        <input type="search" placeholder="Enter what to search" class="bg-[#e9e3ff] h-10 w-80 rounded-md pl-4 outline-none">
                    </form> -->
                </div>
                <!-- notification -->
                <!-- notification -->
                <div class="flex justify-center -ml-20">
                    <div class="h-10 w-10 bg-[#e9e3ff] rounded-md flex justify-center items-center">
                        <i class="fa-reqular fa-regular fa-bell "></i>
                    </div>
                </div>
            

                <div class=" flex-cols-1 mt-6">
                    <!-- <div class="grid grid-cols-3 lg:gap-[260px]">
                        <div class="">
                            <div class="h-60 w-40 bg bg-[#e9e3ff] rounded-md flex-cols-1 justify-center pt-4">
                                <div class="w-[120px] h-[120px] bg-[#8a70d6] rounded-md m-auto flex justify-center items-center">
                                    <i class="fa-duotone fa-screen-users text-[48px] text-white"></i>
                                </div>
                                <p class="ml-4 mt-2 text-[18px] text-gray-700">
                                Students
                            </p>
                            </div>
                           
                        </div>
                        <div class="">
                            <div class="h-60 w-40 bg bg-blue-100 rounded-md flex-cols-1 justify-center pt-4">
                                <div class="w-[120px] h-[120px] bg-blue-400 rounded-md m-auto flex justify-center items-center">
                                    <i class="fa-duotone fa-screen-users text-[48px] text-white"></i>
                                </div>
                                <p class="ml-4 mt-2 text-[18px] text-gray-700">
                                Students
                            </p>
                            </div>
                           
                        </div>
                        <div class="">
                            <div class="h-60 w-40 bg bg-yellow-100 rounded-md flex-cols-1 justify-center pt-4">
                                <div class="w-[120px] h-[120px] bg-[#E8A462] rounded-md m-auto flex justify-center items-center">
                                    <i class="fa-duotone fa-screen-users text-[48px] text-white"></i>
                                </div>
                                <p class="ml-4 mt-2 text-[18px] text-gray-700">
                                Students
                            </p>
                            </div>
                           
                        </div>
                    </div> -->

                    <!-- courses -->
                    <!-- courses -->
                    <div class="mt-20">
                        <table class="mt-4">
                            <pt class="text-[18px]">My Subject</p>
                            <thead>
                                <tr class="text-left p-60">
                                    <th class=" text-gray-500"><h2><?php echo $subject ?></h2></th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>




            <div class="m-auto flex flex-col justify-center space-y-[90px] -ml-[0px] ">
                <!-- profile -->
                <!-- profile -->
                <div>
                    <div class="flex ">
                        <div>
                            <p class="text-[19px]"><?php echo $subject ?></p>
                        </div>
                        <div class="ml-auto">
                            <a href="">
                                <div class="h-8 w-8 bg-gray-100 rounded-md flex justify-center items-center">
                                    <i class="fa-light fa-pen fa-beat"></i>
                                </div>
                            </a>
                        </div>
                    </div>
                    <!-- profile logo-->
                    <div class="flex justify-center mt-10">
                        <div class="text-center">
                            <img class="h-20 w-20 rounded-full" src="images/login-image.avif" alt="">
                            <p>Mends Gyan</p>
                            <p class="text-[14px] text-gray-500">SHS two(2)</p>
                        </div>
                    </div>
                </div>

                <!-- class progress -->
                <!-- class progress -->
                <div>
                    <div class=" ">
                        <p class="text-[19px]">Results Upload</p>
                        <!-- class exercises -->
                        <!-- <a href="exerciseReport.php"> -->
                            <div class="text-lg h-11 bg-[#8a70d6] mt-6 rounded-md grid grid-cols-6 items-center gap-5 pl-1 pr-1">
                                <p class="gap-3 col-span-3 text-white flex">
                                    <i class="fa-regular fa-pen-line text-white"></i>
                                    <span class="">Exercises</span> 
                                   >
                                </p>
                                <p class="text-white">
                                <a href="exerciseReport.php"><?php echo $jhs1 ?></a>
                                </p>
                                <p class="text-white">
                                <a href="jhs2_exercise_report.php"><?php echo $jhs2 ?></a>
                                </p>
                                <p class="text-white">
                                <a href="Jhs3_exercise_report.php"><?php echo $jhs3 ?></a>
                                </p>
                            </div>
                        <!-- </a> -->
                        <!-- class Assigments -->
                        <div class="text-lg h-11 bg-[#8a70d6] mt-6 rounded-md grid grid-cols-6 items-center gap-5 pl-1 pr-1">
                                <p class="gap-3 col-span-3 text-white flex">
                                    <i class="fa-regular fa-pen-line text-white"></i>
                                    <span class="">Assignment</span> 
                                   >
                                </p>
                                <p class="text-white">
                                <a href="Jhs1_hw_report.php"><?php echo $jhs1 ?></a>
                                </p>
                                <p class="text-white">
                                <a href="Jhs2_hw_report.php"><?php echo $jhs2 ?></a>
                                </p>
                                <p class="text-white">
                                <a href="Jhs3_hw_report.php"><?php echo $jhs3 ?></a>
                                </p>
                            </div>
                        <!-- Exams -->
                        <div class="text-lg h-11 bg-[#8a70d6] mt-6 rounded-md grid grid-cols-6 items-center gap-5 pl-1 pr-1">
                                <p class="gap-3 col-span-3 text-white flex">
                                    <i class="fa-regular fa-pen-line text-white"></i>
                                    <span class="">EXAMS</span> 
                                    >
                                </p>
                                <p class="text-white">
                                <a href="Jhs1_exam_report.php"><?php echo $jhs1 ?></a>
                                </p>
                                <p class="text-white">
                                <a href="jhs2_exam_report.php"><?php echo $jhs2 ?></a>
                                </p>
                               
                            </div>
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

    //redirecting the user to the login page
    header("Location:index.php");
}
?>