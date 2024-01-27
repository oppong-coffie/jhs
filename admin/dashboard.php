<!DOCTYPE html>
<html>

<head>
    <title>My Website</title>
    <!-- assets -->
    <!-- scripts -->
    <script src="../Assets/tailwind.js"></script>
    <script src="../Assets/chart.min.js"></script>
    <link rel="stylesheet" href="../Assets/fonts/fonts.css">
    <link rel="stylesheet" href="../Assets/fontawesome/css/all.css">
    <script src="../Assets/jquery-3.6.0.min.js"></script>


</head>

<body style="font-family: poppins;" class="bg-gray-300">

    <?php
    session_start();

    // Check if the teacher is not logged in, redirect to the login page
if (!isset($_SESSION['email'])) {
    header("Location: ../index.php");
    exit;
}

//including the database connection
//including the database connection
include("../db_connection/db_connection.php");

?>


    <!-- blue background -->
    <!-- blue background -->
    <div class="h-[300px] bg-[#736FF8]">

    </div>

    <div class="-mt-[300px]">
        <!-- side nav -->
        <!-- side nav -->
        <div class="w-60 h-[100vh] absolute p-6 lg:block hidden " id="nav">
            <?php include('../nav/nav.php') ?>
        </div>
        <!-- page content -->
        <!-- page content -->
        <div class="lg:ml-[280px] ml-4  pt-6 pr-6">
            <!-- page title1 -->
            <!-- page title1 -->
            <div class="grid grid-cols-2">
                <div>
                    <div class="flex">
                        <p class="text-gray-300 text-sm">Pages</p>
                        <p class="text-white text-sm">/Dashboard</p>
                    </div>
                    <p class="text-white text-md mt-2"><i onclick="showMe()"
                            class="fa fa-bars lg:hidden transform transition-transform rotate-90"></i></p>
                </div>
                <div class="flex pr-10 gap-6">
                    <i class="fa-light fa-bell ml-auto text-white"></i>
                    <i class="fa-sharp fa-solid fa-sun "></i>
                    <!--profile -->
                    <!--profile -->
                    <a href="edit_profile.php">
                        <div class="">
                            <?php
                                // Select query
                                $select_query = mysqli_query($connection, "SELECT images FROM admin WHERE email = '{$_SESSION['email']}'");

                                // Check if the select query was successful
                                if ($select_query) {
                                    // Fetch the result as an associative array
                                    $admin_image = mysqli_fetch_assoc($select_query);

                                    // Access the image column
                                    $admin_image = $admin_image['images'];

                                    // Output the image
                                    echo "<img src='../images/$admin_image' alt='admin image' class=' h-[25px] w-[25px] rounded-full'>";
                                } else {
                                    // Query execution failed
                                    echo "Error: " . mysqli_error($connection);
                                }
                                ?>
                        </div>
                    </a>
                </div>
            </div>

            <!-- page title2 -->
            <!-- page title2 -->
            <div class="lg:grid lg:grid-cols-4 mt-6">
                <!-- total students -->
                <!-- total students -->
                <div class=" grid grid-cols-2 h-[150px] lg:w-60 bg-white  rounded-lg shadow-sm  p-4">
                    <div>
                        <p class="text-lg text-gray-600">Student</p>
                        <p class="text-[30px] mt-4">
                            <?php
                                // Fetch the total number of students from the database
                                $totalstudents_sql = "SELECT COUNT(*) AS total_students FROM student";
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
                        <a href="students_reg.php">
                            <button class="mt-4 h-6 w-20 rounded-sm text-gray-100 bg-[#736FE1] text-sm">
                                detailed
                            </button>
                        </a>
                    </div>
                    <div>
                        <div
                            class="h-[40px] w-[40px] bg-[#736FE1] rounded-full ml-auto flex justify-center items-center">
                            <i class="fa fa-users text-gray-100"></i>
                        </div>
                    </div>
                </div>

                <!-- total subjects -->
                <!-- total subjects -->
                <div class="grid grid-cols-2 h-[150px] mt-6 lg:mt-0 lg:w-60 bg-white rounded-lg shadow-sm p-4">
                    <div>
                        <p class="text-lg text-gray-600">Subjects</p>
                        <p class="text-[30px] mt-4">
                            <?php
                            // Fetch the total number of subjects from the database
                            $totalsubjects_sql = "SELECT COUNT(*) AS total_subjects FROM courses";
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

                         
                        ?>
                        </p>
                        <a href="subjects.php">
                            <button
                                class="mt-4 h-6 w-20 rounded-sm text-gray-100 bg-orange-600 text-sm">detailed</button>
                        </a>
                    </div>
                    <div>
                        <div
                            class="h-[40px] w-[40px] bg-orange-600 rounded-full ml-auto flex justify-center items-center">
                            <i class="fa fa-book text-gray-100"></i>
                        </div>
                    </div>
                </div>

                <!-- total teachers -->
                <!-- total teachers -->
                <div class="grid grid-cols-2 h-[150px]  mt-6 lg:mt-0 lg:w-60 bg-white rounded-lg shadow-sm p-4">
                    <div>
                        <p class="text-lg text-gray-600">Teachers</p>
                        <p class="text-[30px] mt-4">
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
                        <a href="teacher_reg.php">
                            <button
                                class="mt-4 h-6 w-20 rounded-sm text-gray-100 bg-green-500 text-sm">detailed</button>
                        </a>
                    </div>
                    <div>
                        <div
                            class="h-[40px] w-[40px] bg-green-500 rounded-full ml-auto flex justify-center items-center">
                            <i class="fa-solid fa-person-chalkboard text-gray-100 text-lg"></i>
                        </div>
                    </div>
                </div>

                <!-- total parents -->
                <!-- total parents -->
                <div class=" grid grid-cols-2 h-[150px]  mt-6 lg:mt-0 lg:w-60 bg-white rounded-lg shadow-sm p-4">
                    <div>
                        <p class="text-lg">Parents</p>
                        <p class="text-[30px] mt-4">
                            <?php
                            // Fetch the total number of subjects from the database
                            $totalsubjects_sql = "SELECT COUNT(*) AS total_subjects FROM parents";
                            $totalsubjects_query = mysqli_query($connection, $totalsubjects_sql);

                            // Check if the query was successful
                            if ($totalsubjects_query) {
                                // Fetch the result as an associative array
                                $total_subjects = mysqli_fetch_assoc($totalsubjects_query);

                                // Access the total number of subjects
                                $total_parents_count = $total_subjects['total_subjects'];

                                // Output the total number of subjects
                                echo $total_parents_count;
                            } else {
                                // Query execution failed
                                echo "Error: " . mysqli_error($connection);
                            }

                            // Free the query result from memory
                            mysqli_free_result($totalsubjects_query);
                        ?>
                        </p>
                        <!-- view more button -->
                        <a href="parents_reg.php">
                            <button class="mt-4 h-6 w-20 text-sm rounded-sm text-gray-100 bg-blue-400">detailed</button>
                        </a>
                    </div>
                    <div>
                        <div
                            class="h-[40px] w-[40px] bg-blue-400 rounded-full ml-auto flex items-center justify-center">
                            <i class="fa fa-user text-gray-100"></i>
                        </div>
                    </div>
                </div>
            </div>

            <!-- page title3 -->
            <!-- page title3 -->
            <div class="lg:grid lg:grid-cols-3 mt-8">
                <div class="lg:col-span-2 h-80 lg:w-[770px] bg-white rounded-lg">
                    <canvas id="graphCanvas" width="650" height="300"></canvas>
                </div>
            </div>

            <!-- page title4 -->
            <!-- page title4 -->
            <!--footer -->
            <!--footer -->
            <div class=" pb-8 lg:pb-0 lg:flex justify-center gap-40 mt-16">
                <p class="">All right reserved || 2023</p>
                <p class=" mt-2 lg:mt-0">Powered by: The Group</p>
                <p class=" mt-2 lg:mt-0">info@school.com</p>
            </div>
        </div>
    </div>



    <!-- confirm before delete -->
    <script>
    function confirmLogout() {
        return confirm("Are you sure you want to logout?");
    }

    function showMe() {
        var nav = document.getElementById('nav');
        nav.classList.toggle('hidden');
        nav.classList.toggle('block ');
    }
    </script>
    <script>
    // Get the canvas element
    var graphCanvas = document.getElementById('graphCanvas');

    // Create the chart using Chart.js
    var ctx = graphCanvas.getContext('2d');
    var chart = new Chart(ctx, {
        type: 'line', // Specify the chart type (e.g., bar, line, pie, etc.)
        data: {
            labels: ['Students', 'Parents', 'Teachers', 'Subjects'], // Replace with your own labels
            datasets: [{
                label: 'Dataset 1',
                data: [<?php echo $total_students_count; ?>, <?php echo $total_parents_count; ?>,
                    <?php echo $total_teachers_count; ?>, <?php echo $total_subjects_count; ?>
                ], // Replace with your own data values
                backgroundColor: '#736FE1', // Replace with desired background color
                borderColor: '#736FE1', // Replace with desired border color
                borderWidth: 2
            }]
        },
        options: {
            responsive: true, // Enable responsiveness
            maintainAspectRatio: false, // Disable aspect ratio constraint
            scales: {
                y: {
                    beginAtZero: true // Start the y-axis at zero
                }
            }
        }
    });
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
            window.location.href='../index.php';
        </script>
    ";
}
?>