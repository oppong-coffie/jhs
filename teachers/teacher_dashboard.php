<?php
session_start();

// Check if the teacher is not logged in, redirect to the login page
if (!isset($_SESSION['email'])) {
    header("Location: ../index.php");
    exit;
}

// Database connection
$connection = mysqli_connect('localhost', 'root', '', 'management_class');

// Retrieve teacher ID based on email session
$teacherId = $_SESSION['id'];

// Query to retrieve courses for the teacher
$query = "SELECT * FROM teacherclass WHERE teacher_id = '$teacherId'";
$courseDetails = mysqli_query($connection, $query);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    
    </style>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ADMIN DASHBOARD || DASHBOARD</title>
    <!-- assets -->
    <script src="../Assets/chart.min.js"></script>
    <link rel="stylesheet" href="../Assets/fonts/fonts.css">
    <link rel="stylesheet" href="../Assets/fontawesome/css/all.css">
    <!-- scripts -->
    <script src="../Assets/tailwind.js"></script>
    <script src="../Assets/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="../css/admin.css">
</head>

<body class="h-[100vh] bg-gray-300" style="font-family: poppins;">
    <!-- blue background -->
    <div class="h-[300px] bg-[#736FF8]"></div>

    <div class="-mt-[300px]">
        <!-- side nav -->
        <div class="w-60 h-[100vh] absolute p-6">
            <?php include('../nav/teacher_nav.php') ?>
        </div>
        <!-- page content -->
        <div class="ml-[280px]  pt-6 pr-6">
            <!-- page title1 -->
            <div class="grid grid-cols-2">
                <div>
                    <div class="flex">
                        <p class="text-gray-300 text-sm">Pages</p>
                        <p class="text-white text-sm">/Dashboard</p>
                    </div>
                    <p class="text-white text-md mt-2"><i class="fa fa-bars "></i></p>
                </div>
                <div class="flex pr-10 gap-6">
                    <i class="fa-light fa-bell ml-auto text-white"></i>
                    <i class="fa-sharp fa-solid fa-sun "></i>
                </div>
            </div>

            <!-- page title2 -->
            <div class="grid grid-cols-4 mt-6">


                <!-- Course sections -->
                <?php
while ($course = mysqli_fetch_assoc($courseDetails)) {
    $subjectId = $course['subject'];
    $classId = $course['class_id'];
    $subclass = $course['sub_class'];

    // Query to retrieve subject name based on subject ID
    $subjectQuery = "SELECT course FROM courses WHERE id = $subjectId";
    $subjectResult = mysqli_query($connection, $subjectQuery);
    $subjectRow = mysqli_fetch_assoc($subjectResult);
    $subjectName = $subjectRow['course'];

    // Query to retrieve class name based on class ID
    $classQuery = "SELECT class_name FROM classese WHERE id = $classId";
    $classResult = mysqli_query($connection, $classQuery);
    $classRow = mysqli_fetch_assoc($classResult);
    $className = $classRow['class_name'];
?>
                <div class="grid grid-cols-2 h-150 w-60 bg-white rounded-lg shadow-sm p-4 mt-4">
                    <div>
                        <p class="text-lg text-gray-600"><?php echo $subjectName; ?></p>
                        <p class="text-sm mt-4"><?php echo $className ?></p>
                        <a href="class_details.php?class_name=<?php echo $className ?>">
                            <button
                                class="mt-9  p-2 rounded-sm text-gray-100 bg-blue-500 text-sm">View Class</button>
                        </a>
                    </div>
                    <div>
                        <div class="h-10 w-10 bg-blue-500 rounded-full ml-auto flex justify-center items-center">
                            <i class="fa fa-users text-gray-100"></i>
                        </div>
                    </div>
                </div>
                <?php } ?>

            </div>

            <!-- page title4 -->
            <div class="flex justify-center gap-40 mt-[400px]">
                <p class="">All right reserved 2023</p>
                <p>Powered by: The Group</p>
                <p>info@school.com</p>
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

