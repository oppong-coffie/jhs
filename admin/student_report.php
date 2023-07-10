<?php
session_start();
$std_id=$_SESSION['std_id'];

//database connection
$connection = mysqli_connect('localhost', 'root', '', 'management_class');


//START:: MATHS DATA
 //fetch maths exercise from database
 $mathsexercisesql = "SELECT * FROM scores WHERE std_id='$std_id' AND `subject`='maths' AND type='exercise' AND term =1 AND class='jhs1'";
 $mathsexercisequery=mysqli_query($connection, $mathsexercisesql);
 $mathsexercisefetch=mysqli_fetch_array($mathsexercisequery);
 if ($mathsexercisefetch) {
    $mathsexercise = $mathsexercisefetch['mark'];
} else {
    $mathsexercise = 0;
}

 //fetch maths home work from database
 $mathshomeworksql = "SELECT * FROM scores WHERE std_id='$std_id' AND subject='maths' AND type='homework' AND term =1 AND class='jhs1'";
 $mathshomeworkquery=mysqli_query($connection, $mathshomeworksql);
 $mathshomeworkfetch=mysqli_fetch_array($mathshomeworkquery);
 if($mathshomeworkfetch) {
    $mathshomework = $mathshomeworkfetch['mark'];
} else {
    $mathshomework = 0;
}

// fetch maths exam from database
$mathsexamsql = "SELECT * FROM scores WHERE std_id='$std_id' AND subject='maths' AND type='exam' AND term =1 AND class='jhs1'";
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
 $englishexercisesql = "SELECT * FROM scores WHERE std_id='$std_id' AND subject='english' AND type='exercise' AND term =1 AND class='jhs1'";
 $englishexercisequery=mysqli_query($connection, $englishexercisesql);
 $englishexercisefetch=mysqli_fetch_array($englishexercisequery);
 if ($englishexercisefetch) {
    $englishexercise = $englishexercisefetch['mark'];
} else {
    $englishexercise = 0;
}

 //fetch english home work from database
 $englishhomeworksql = "SELECT * FROM scores WHERE std_id='$std_id' AND subject='english' AND type='homework' AND term =1 AND class='jhs1'";
 $englishhomeworkquery=mysqli_query($connection, $englishhomeworksql);
 $englishhomeworkfetch=mysqli_fetch_array($englishhomeworkquery);
 if($englishhomeworkfetch) {
    $englishhomework = $englishhomeworkfetch['mark'];
} else {
    $englishhomework = 0;
}

// fetch english exam from database
$englishexamsql = "SELECT * FROM scores WHERE std_id='$std_id' AND subject='english' AND type='exam' AND term =1 AND class='jhs1'";
$englishexamquery = mysqli_query($connection, $englishexamsql);
$englishexamfetch = mysqli_fetch_array($englishexamquery);
if ($englishexamfetch) {
    $englishexam = $englishexamfetch['mark'];
} else {
    $englishexam = 0;
}
// END::ENGLISH DATA

//START:: SCIENCE DATA
 //fetch Science exercise from database
 $scienceexercisesql = "SELECT * FROM scores WHERE std_id='$std_id' AND subject='science' AND type='exercise' AND term =1 AND class='jhs1'";
 $scienceexercisequery=mysqli_query($connection, $scienceexercisesql);
 $scienceexercisefetch=mysqli_fetch_array($scienceexercisequery);
 if ($scienceexercisefetch) {
    $scienceexercise = $scienceexercisefetch['mark'];
} else {
    $scienceexercise = 0;
}

 //fetch science home work from database
 $sciencehomeworksql = "SELECT * FROM scores WHERE std_id='$std_id' AND subject='science' AND type='homework' AND term =1 AND class='jhs1'";
 $sciencehomeworkquery=mysqli_query($connection, $sciencehomeworksql);
 $sciencehomeworkfetch=mysqli_fetch_array($sciencehomeworkquery);
 if($sciencehomeworkfetch) {
    $sciencehomework = $sciencehomeworkfetch['mark'];
} else {
    $sciencehomework = 0;
}

// fetch science exam from database
$scienceexamsql = "SELECT * FROM scores WHERE std_id='$std_id' AND subject='science' AND type='exam' AND term =1 AND class='jhs1'";
$scienceexamquery = mysqli_query($connection, $scienceexamsql);
$scienceexamfetch = mysqli_fetch_array($scienceexamquery);
if ($scienceexamfetch) {
    $scienceexam = $scienceexamfetch['mark'];
} else {
    $scienceexam = 0;
}
// END::SCIENCE DATA

//START:: FRENCH DATA
 //fetch Frence exercise from database
 $frenchexercisesql = "SELECT * FROM scores WHERE std_id='$std_id' AND subject='frence' AND type='exercise' AND term =1 AND class='jhs1'";
 $frenchexercisequery=mysqli_query($connection, $frenchexercisesql);
 $frenchexercisefetch=mysqli_fetch_array($frenchexercisequery);
 if ($frenchexercisefetch) {
    $frenchexercise = $frenchexercisefetch['mark'];
} else {
    $frenchexercise = 0;
}

 //fetch French home work from database
 $frenchhomeworksql = "SELECT * FROM scores WHERE std_id='$std_id' AND subject='frence' AND type='homework' AND term =1 AND class='jhs1'";
 $frenchhomeworkquery=mysqli_query($connection, $frenchhomeworksql);
 $frenchhomeworkfetch=mysqli_fetch_array($frenchhomeworkquery);
 if($frenchhomeworkfetch) {
    $frenchhomework = $frenchhomeworkfetch['mark'];
} else {
    $frenchhomework = 0;
}

// fetch French exam from database
$frenchexamsql = "SELECT * FROM scores WHERE std_id='$std_id' AND subject='frence' AND type='exam' AND term =1 AND class='jhs1'";
$frenchexamquery = mysqli_query($connection, $frenchexamsql);
$frenchexamfetch = mysqli_fetch_array($frenchexamquery);
if ($frenchexamfetch) {
    $frenchexam = $frenceexamfetch['mark'];
} else {
    $frenchexam = 0;
}
// END::FRENCH DATA

//START:: R M E DATA
 //fetch R M E exercise from database
 $rmeexercisesql = "SELECT * FROM scores WHERE std_id='$std_id' AND subject='R M E' AND type='exercise' AND term =1 AND class='jhs1'";
 $rmeexercisequery=mysqli_query($connection, $rmeexercisesql);
 $englishexercisefetch=mysqli_fetch_array($englishexercisequery);
 if ($englishexercisefetch) {
    $rmeexercise = $rmeexercisefetch['mark'];
} else {
    $rmeexercise = 0;
}

 //fetch R M E home work from database
 $rmehomeworksql = "SELECT * FROM scores WHERE std_id='$std_id' AND subject='R M E' AND type='homework' AND term =1 AND class='jhs1'";
 $rmehomeworkquery=mysqli_query($connection, $rmehomeworksql);
 $rmehomeworkfetch=mysqli_fetch_array($rmehomeworkquery);
 if($rmehomeworkfetch) {
    $rmehomework = $rmehomeworkfetch['mark'];
} else {
    $rmehomework = 0;
}

// fetch R M E exam from database
$rmeexamsql = "SELECT * FROM scores WHERE std_id='$std_id' AND subject='R M E' AND type='exam' AND term =1 AND class='jhs1'";
$rmeexamquery = mysqli_query($connection, $rmeexamsql);
$rmeexamfetch = mysqli_fetch_array($rmeexamquery);
if ($rmeexamfetch) {
    $rmeexam = $rmeexamfetch['mark'];
} else {
    $rmeexam = 0;
}
// END::R M E DATA

//START:: SOCIAL SYUDIES DATA
 //fetch social esocial from database
 $socialexercisesql = "SELECT * FROM scores WHERE std_id='$std_id' AND subject='social' AND type='exercise' AND term =1 AND class='jhs1'";
 $socialexercisequery=mysqli_query($connection, $socialexercisesql);
 $socialexercisefetch=mysqli_fetch_array($socialexercisequery);
 if ($socialexercisefetch) {
    $socialexercise = $socialexercisefetch['mark'];
} else {
    $socialexercise = 0;
}

 //fetch social home work from database
 $socialhomeworksql = "SELECT * FROM scores WHERE std_id='$std_id' AND subject='social' AND type='homework' AND term =1 AND class='jhs1'";
 $socialhomeworkquery=mysqli_query($connection, $socialhomeworksql);
 $socialhomeworkfetch=mysqli_fetch_array($socialhomeworkquery);
 if($socialhomeworkfetch) {
    $socialhomework = $socialhomeworkfetch['mark'];
} else {
    $socialhomework = 0;
}

// fetch social exam from database
$socialexamsql = "SELECT * FROM scores WHERE std_id='$std_id' AND subject='social' AND type='exam' AND term =1 AND class='jhs1'";
$socialexamquery = mysqli_query($connection, $socialexamsql);
$socialexamfetch = mysqli_fetch_array($socialexamquery);
if ($socialexamfetch) {
    $socialexam = $socialexamfetch['mark'];
} else {
    $socialexam = 0;
}
// END::SOCIAL STUDIES DATA

//START:: CREATIVE ART DATA
 //fetch Creative Art ecreativeart from database
 $creativeartexercisesql = "SELECT * FROM scores WHERE std_id='$std_id' AND subject='creativeart' AND type='exercise' AND term =1 AND class='jhs1'";
 $creativeartexercisequery=mysqli_query($connection, $creativeartexercisesql);
 $creativeartexercisefetch=mysqli_fetch_array($creativeartexercisequery);
 if ($creativeartexercisefetch) {
    $creativeartexercise = $creativeartexercisefetch['mark'];
} else {
    $creativeartexercise = 0;
}

 //fetch Creative Art home work from database
 $creativearthomeworksql = "SELECT * FROM scores WHERE std_id='$std_id' AND subject='creativeart' AND type='homework' AND term =1 AND class='jhs1'";
 $creativearthomeworkquery=mysqli_query($connection, $creativearthomeworksql);
 $creativearthomeworkfetch=mysqli_fetch_array($creativearthomeworkquery);
 if($creativearthomeworkfetch) {
    $creativearthomework = $creativearthomeworkfetch['mark'];
} else {
    $creativearthomework = 0;
}

// fetch Creative ART exam from database
$creativeartexamsql = "SELECT * FROM scores WHERE std_id='$std_id' AND subject='creativeart' AND type='exam' AND term =1 AND class='jhs1'";
$creativeartexamquery = mysqli_query($connection, $creativeartexamsql);
$creativeartexamfetch = mysqli_fetch_array($creativeartexamquery);
if ($creativeartexamfetch) {
    $creativeartexam = $creativeartexamfetch['mark'];
} else {
    $creativeartexam = 0;
}
// END::CREATIVE ART DATA

//START:: B D T DATA
 //fetch bdt exercise from database
 $bdtexercisesql = "SELECT * FROM scores WHERE std_id='$std_id' AND subject='bdt' AND type='exercise' AND term =1 AND class='jhs1'";
 $bdtexercisequery=mysqli_query($connection, $bdtexercisesql);
 $bdtexercisefetch=mysqli_fetch_array($bdtexercisequery);
 if ($bdtexercisefetch) {
    $bdtexercise = $bdtexercisefetch['mark'];
} else {
    $bdtexercise = 0;
}

 //fetch bdt home work from database
 $bdthomeworksql = "SELECT * FROM scores WHERE std_id='$std_id' AND subject='bdt' AND type='homework' AND term =1 AND class='jhs1'";
 $bdthomeworkquery=mysqli_query($connection, $bdthomeworksql);
 $bdthomeworkfetch=mysqli_fetch_array($bdthomeworkquery);
 if($bdthomeworkfetch) {
    $bdthomework = $bdthomeworkfetch['mark'];
} else {
    $bdthomework = 0;
}

// fetch bdt exam from database
$bdtexamsql = "SELECT * FROM scores WHERE std_id='$std_id' AND subject='bdt' AND type='exam' AND term =1 AND class='jhs1'";
$bdtexamquery = mysqli_query($connection, $bdtexamsql);
$bdtexamfetch = mysqli_fetch_array($bdtexamquery);
if ($bdtexamfetch) {
    $bdtexam = $bdtexamfetch['mark'];
} else {
    $bdtexam = 0;
}
// END::B D T DATA
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
                            <p class="text-[19px]">TERM 1</p>
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
                            <p class="text-[14px] text-gray-500">JHS One(1)</p>
                        </div>
                    </div>
                </div>

                <!-- class progress -->
                <!-- class progress -->
                <div>
                    <div class=" ">
                        <p class="text-[19px]">Select Term</p>
                        <!-- class exercises -->
                        <a href="#">
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
                        <a href="jhs1term2.php">
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
                        <!-- class assignment -->
                        <a href="jhs1term3.php">
                            <div class="h-11 w-60 bg-[#8a70d6] mt-6 rounded-md flex items-center gap-6 pl-2 pr-4">
                                <p>
                                    <i class="fa-regular fa-house-person-return text-white"></i>
                                </p>
                                <p class="text-white">
                                    TERM 3
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