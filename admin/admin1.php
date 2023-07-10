<?php
session_start();

if(!isset($_SESSION['email'])){

}

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
        };
        .current-day .day-wrapper {
    background-color: #FF0000; /* Replace with your desired background color */
    /* Add any other desired styles */
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
    <link rel="stylesheet" href="../css//admin.css">
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
                        <i class="fa-regular fa-briefcase text-gray-500"></i><a class="ml-2 text-gray-500" href="subjects.php">Subjects</a>
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
                    <!-- <li class="list-none mt-4">
                        <i class="fa-regular fa-square-poll-vertical text-gray-500"></i><a class="ml-2 text-gray-500" href="">Results</a>
                    </li> -->
                    <!-- <li class="list-none mt-4">
                        <i class="fa-regular fa-comment text-gray-500"></i><a class="ml-2 text-gray-500" href="">Chat</a>
                    </li> -->
                    <!-- <li class="list-none mt-4">
                        <i class="fa-regular fa-gear text-gray-500"></i><a class="ml-2 text-gray-500" href="">Settings</a>
                    </li> -->

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
                                <p class="text-[35px] text-gray-700">
                                <?php
// Fetch the total number of students from the database
$totalstudents_sql = "SELECT COUNT(*) AS total_students FROM students";
$totalstudents_query = mysqli_query($connection, $totalstudents_sql);

// Check if the query was successful
if ($totalstudents_query) {
    // Fetch the result as an associative array
    $total_students = mysqli_fetch_assoc($totalstudents_query);

    // Access the total number of students
    $total_students_count = $total_students['total_students'];

    // Output the total number of students
    echo $total_students_count;
} else {
    // Query execution failed
    echo "Error: " . mysqli_error($connection);
}

// Free the query result from memory
mysqli_free_result($totalstudents_query);


?>
</p>
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
                                <p class="text-[35px] text-gray-700">
                                <?php
// Fetch the total number of teachers from the database
$totalteachers_sql = "SELECT COUNT(*) AS total_teachers FROM teachers";
$totalteachers_query = mysqli_query($connection, $totalteachers_sql);

// Check if the query was successful
if ($totalteachers_query) {
    // Fetch the result as an associative array
    $total_teachers = mysqli_fetch_assoc($totalteachers_query);

    // Access the total number of students
    $total_teachers_count = $total_teachers['total_teachers'];

    // Output the total number of teachers
    echo $total_teachers_count;
} else {
    // Query execution failed
    echo "Error: " . mysqli_error($connection);
}

// Free the query result from memory
mysqli_free_result($totalteachers_query);

?>

                                </p>
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
                                <p class="text-[35px] text-gray-700">
                                <?php
// Fetch the total number of subjects from the database
$totalsubjects_sql = "SELECT COUNT(*) AS total_subjects FROM subjects";
$totalsubjects_query = mysqli_query($connection, $totalsubjects_sql);

// Check if the query was successful
if ($totalsubjects_query) {
    // Fetch the result as an associative array
    $total_subjects = mysqli_fetch_assoc($totalsubjects_query);

    // Access the total number of subjects
    $total_subjects_count = $total_subjects['total_subjects'];

    // Output the total number of subjects
    echo $total_subjects_count;
} else {
    // Query execution failed
    echo "Error: " . mysqli_error($connection);
}

// Free the query result from memory
mysqli_free_result($totalsubjects_query);

// Close the database connection
mysqli_close($connection);
?>

                                </p>
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
                            <p class="text-[19px]">TERM 1</p>
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
                            <img class="w-56" src="../images/afro-woman-working-laptop-computer-from-home-with-cup-coffee-home-office-concept-woman-working-from-home-student-freelancer-vector-illustration-flat-style-remote-work-freelance_419010-655.avif" alt="">
                            <div class="">
                               OPPONG COFFIE
                            </div>
                            
                            <!-- the name of the admin -->
                            <p class="text-[14px] text-gray-500">
                               Administrator
                            </p>
                        </div>
                    </div>
                </div>

                <!-- class progress -->
                <!-- class progress -->
                <div>
                    <div class=" ">
                    <?php
// Get the current year and month
$year = date('Y');
$month = date('n');
$day = date('j'); // Current day

// Get the number of days in the current month
$daysInMonth = cal_days_in_month(CAL_GREGORIAN, $month, $year);

// Get the name of the current month
$monthName = date('F', mktime(0, 0, 0, $month, 1, $year));

// Get the first day of the current month
$firstDay = date('N', mktime(0, 0, 0, $month, 1, $year));

// Create an array of day abbreviations
$dayAbbreviations = array('Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun');

// Output the calendar HTML
echo "<h2>$monthName $year</h2>";
echo "<table>";
echo "<tr>";
foreach ($dayAbbreviations as $dayAbbreviation) {
    echo "<th>$dayAbbreviation</th>";
}
echo "</tr>";
echo "<tr>";

// Output blank cells for the days before the first day of the month
for ($i = 1; $i < $firstDay; $i++) {
    echo "<td></td>";
}

// Output the days of the month
for ($day = 1; $day <= $daysInMonth; $day++) {
    // Highlight the current day
    $class = ($day == $day) ? "current-day" : "";

    echo "<td class='$class'>$day</td>";
    if (($day + $firstDay - 1) % 7 == 0) {
        echo "</tr><tr>";
    }
}

// Output blank cells for the days after the last day of the month
for ($i = 0; ($i + $firstDay + $daysInMonth - 1) % 7 != 0; $i++) {
    echo "<td></td>";
}

echo "</tr>";
echo "</table>";
?>


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