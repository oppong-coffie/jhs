<?php
session_start();
$std_id=$_SESSION['std_id'];

//database connection
$connection = mysqli_connect('localhost', 'root', '', 'management_class');


//START:: MATHS DATA
 //fetch maths exercise from database
 $mathsexercisesql = "SELECT * FROM scores WHERE std_id='$std_id' AND `subject`='maths' AND type='exercise' AND term =3 AND class='jhs3'";
 $mathsexercisequery=mysqli_query($connection, $mathsexercisesql);
 $mathsexercisefetch=mysqli_fetch_array($mathsexercisequery);
 if ($mathsexercisefetch) {
    $mathsexercise = $mathsexercisefetch['mark'];
} else {
    $mathsexercise = 0;
}

 //fetch maths home work from database
 $mathshomeworksql = "SELECT * FROM scores WHERE std_id='$std_id' AND subject='maths' AND type='homework' AND term =3 AND class='jhs3'";
 $mathshomeworkquery=mysqli_query($connection, $mathshomeworksql);
 $mathshomeworkfetch=mysqli_fetch_array($mathshomeworkquery);
 if($mathshomeworkfetch) {
    $mathshomework = $mathshomeworkfetch['mark'];
} else {
    $mathshomework = 0;
}

// fetch maths exam from database
$mathsexamsql = "SELECT * FROM scores WHERE std_id='$std_id' AND subject='maths' AND type='exam' AND term =3 AND class='jhs3'";
$mathsexamquery = mysqli_query($connection, $mathsexamsql);
$mathsexamfetch = mysqli_fetch_array($mathsexamquery);
if ($mathsexamfetch) {
    $mathsexam = $mathsexamfetch['mark'];
} else {
    $mathsexam = 0;
}
// END::MATHS DATA

//START:: ENGLISH DATA
 //fetch english exercise from database
 $englishexercisesql = "SELECT * FROM scores WHERE std_id='$std_id' AND subject='english' AND type='exercise' AND term =3 AND class='jhs3'";
 $englishexercisequery=mysqli_query($connection, $englishexercisesql);
 $englishexercisefetch=mysqli_fetch_array($englishexercisequery);
 if ($englishexercisefetch) {
    $englishexercise = $englishexercisefetch['mark'];
} else {
    $englishexercise = 0;
}

 //fetch english home work from database
 $englishhomeworksql = "SELECT * FROM scores WHERE std_id='$std_id' AND subject='english' AND type='homework' AND term =3 AND class='jhs3'";
 $englishhomeworkquery=mysqli_query($connection, $englishhomeworksql);
 $englishhomeworkfetch=mysqli_fetch_array($englishhomeworkquery);
 if($englishhomeworkfetch) {
    $englishhomework = $englishhomeworkfetch['mark'];
} else {
    $englishhomework = 0;
}

// fetch english exam from database
$englishexamsql = "SELECT * FROM scores WHERE std_id='$std_id' AND subject='english' AND type='exam' AND term =3 AND class='jhs3'";
$englishexamquery = mysqli_query($connection, $englishexamsql);
$englishexamfetch = mysqli_fetch_array($englishexamquery);
if ($englishexamfetch) {
    $englishexam = $englishexamfetch['mark'];
} else {
    $englishexam = 0;
}
// END::ENGLISH DATA

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>STUDENTS RESULTS || jhs1term1</title>
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
                        <i class="fa-regular fa-house text-gray-500"></i><a class="ml-2 text-gray-500" href="student.php">Dashboard</a>
                    </li>
                    <li class="list-none mt-4">
                        <i class="fa-regular fa-briefcase text-gray-500"></i></i><a class="ml-2 text-gray-500" href="">Courses</a>
                    </li>
                    <li class="list-none mt-4">
                        <i class="fa-regular fa-square-poll-vertical text-gray-500"></i></i><a class="ml-2 text-gray-500" href="">Results</a>
                    </li>
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
                    <form action="" method="post">
                        <input type="search" placeholder="Enter what to search" class="bg-[#e9e3ff] h-10 w-80 rounded-md pl-4 outline-none">
                    </form>
                </div>
                <!-- notification -->
                <!-- notification -->
                <div class="flex justify-center -ml-20">
                    <div class="h-10 w-10 bg-[#e9e3ff] rounded-md flex justify-center items-center">
                        <i class="fa-reqular fa-regular fa-bell "></i>
                    </div>
                </div>
            

                <div class=" flex-cols-1 mt-6">
                    <div class="grid grid-cols-3 lg:gap-[260px]">
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
                    </div>

                    <!-- courses -->
                    <!-- courses -->
                    <div class="mt-20">
                        <table class="mt-4">
                            <pt class="text-[18px]">My Courses</p>
                            <thead>
                                <tr class="text-left p-60">
                                    <th class="pl-10 text-gray-500">SUBJECT</th>
                                    <th class="pl-[80px] text-gray-500">EXERCISE</th>
                                    <th class="pl-24 text-gray-500">HOMEWORKS</th>
                                    <th class="pl-24 text-gray-500">EXAM</th>
                                    <th class="pl-24 text-gray-500">TOTAL</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="pl-10 ">ENGLISH</td>
                                    <td class="pl-[80px] "><?php echo $englishexercise; ?></td>
                                    <td class="pl-24"><?php echo $englishhomework; ?></td>
                                    <td class="pl-24"><?php echo $englishexam; ?></td>
                                    <td class="pl-24"><?php echo $englishexercise+$englishhomework+$englishexam ?></td>
                                </tr>
                                <tr>
                                    <td class="pl-10 ">MATHS</td>
                                    <td class="pl-[80px] "><?php echo $mathsexercise; ?></td>
                                    <td class="pl-24"><?php echo $mathshomework; ?></td>
                                    <td class="pl-24"><?php echo $mathsexam; ?></td>
                                    <td class="pl-24"><?php echo $mathsexercise+$mathshomework+$mathsexam ?></td>
                                </tr>
                                <tr>
                                    <td class="pl-10 ">SCIENCE</td>
                                    <td class="pl-[80px] "><?php echo $scienceexercise; ?></td>
                                    <td class="pl-24"><?php echo $sciencehomework; ?></td>
                                    <td class="pl-24"><?php echo $scienceexam; ?></td>
                                    <td class="pl-24"><?php echo $scienceexercise+$sciencehomework+$scienceexam ?></td>
                                </tr>
                                <tr>
                                    <td class="pl-10 ">S. STUDIES</td>
                                    <td class="pl-[80px] "><?php echo $socialexercise; ?></td>
                                    <td class="pl-24"><?php echo $socialhomework; ?></td>
                                    <td class="pl-24"><?php echo $socialexam; ?></td>
                                    <td class="pl-24"><?php echo $socialexercise+$socialhomework+$socialexam ?></td>
                                </tr>
                                <tr>
                                    <td class="pl-10 ">C. ART</td>
                                    <td class="pl-[80px] "><?php echo $creativeartexercise; ?></td>
                                    <td class="pl-24"><?php echo $creativearthomework; ?></td>
                                    <td class="pl-24"><?php echo $creativeartexam; ?></td>
                                    <td class="pl-24"><?php echo $creativeartexercise+$creativearthomework+$creativeartexam ?></td>
                                </tr>
                                <tr>
                                    <td class="pl-10 ">R M E</td>
                                    <td class="pl-[80px] "><?php echo $rmeexercise; ?></td>
                                    <td class="pl-24"><?php echo $rmehomework; ?></td>
                                    <td class="pl-24"><?php echo $rmeexam; ?></td>
                                    <td class="pl-24"><?php echo $rmeexercise+$rmehomework+$rmeexam ?></td>
                                </tr>
                                <tr>
                                    <td class="pl-10 ">FRENCH</td>
                                    <td class="pl-[80px] "><?php echo $frenchexercise; ?></td>
                                    <td class="pl-24"><?php echo $frenchhomework; ?></td>
                                    <td class="pl-24"><?php echo $frenchexam; ?></td>
                                    <td class="pl-24"><?php echo $frenchexercise+$frenchhomework+$frenchexam ?></td>
                                </tr>
                                <tr>
                                    <td class="pl-10 ">B D T</td>
                                    <td class="pl-[80px] "><?php echo $bdtexercise; ?></td>
                                    <td class="pl-24"><?php echo $bdthomework; ?></td>
                                    <td class="pl-24"><?php echo $bdtexam; ?></td>
                                    <td class="pl-24"><?php echo $bdtexercise+$bdthomework+$bdtexam ?></td>
                                </tr>


                            </tbody>
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
                            <p class="text-[19px]">TERM 2</p>
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
                            <p class="text-[14px] text-gray-500">JHS Three(3)</p>
                        </div>
                    </div>
                </div>

                <!-- class progress -->
                <!-- class progress -->
                <div>
                    <div class=" ">
                        <p class="text-[19px]">Select Term</p>
                        <!-- class exercises -->
                        <a href="jhs3term1">
                            <div class="h-11 w-60 bg-[#8a70d6] mt-6 rounded-md flex items-center gap-6 pl-2 pr-4">
                                <p>
                                    <i class="fa-regular fa-pen-line text-white"></i>
                                </p>
                                <p class="text-white">
                                    TERM 1
                                </p>
                                <p class="ml-auto">
                                    <i class="fa-solid fa-greater-than text-white"></i>
                                </p>
                            </div>
                        </a>
                        <!-- class quize -->
                        <a href="#">
                            <div class="h-11 w-60 bg-[#8a70d6] mt-6 rounded-md flex items-center gap-6 pl-2 pr-4">
                                <p>
                                    <i class="fa-regular fa-user-pen text-white"></i>
                                </p>
                                <p class="text-white">
                                    TERM 2
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

    //redirecting the user to the login page
    header("Location:index.php");
}
?>