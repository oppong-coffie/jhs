<?php
session_start();

if (!isset($_SESSION['email'])) {
    // Handle when the user is not logged in
}

// Database connection
$connection = mysqli_connect('localhost', 'root', '', 'management_class');

// Checking if the user is logged in and handling logout
if (isset($_POST['logout'])) {
    // Unset all the session
    session_unset();

    // Destroying the session
    session_destroy();

    // Redirecting the user to the login page
    header("Location: index.php");
    exit();
}

// Checking if a student ID is provided via GET request
// Checking if a student ID is provided via GET request
if (isset($_GET["id"])) {
    // Sanitize the input to ensure it's an integer
    // Sanitize the input to ensure it's an integer
    $student_id = $_GET["id"]; 

    // Query to retrieve the class name for the given student ID
    // Query to retrieve the class name for the given student ID
    $select_query = "
        SELECT c.class_name
        FROM classese c
        JOIN studentclass sc ON c.id = sc.class_id
        WHERE sc.student_id = $student_id;
    ";

    // Execute the query
    // Execute the query
    $class_result = mysqli_query($connection, $select_query);
    $class_row = mysqli_fetch_array($class_result);
    $class = $class_row["class_name"];

    // Select the active semester
    // Select the active semester
    $active_semester = mysqli_query($connection, "SELECT name FROM semester WHERE status='Active'");
    $active_row = mysqli_fetch_array($active_semester);
    if ($active_row) {
        $semester_name = $active_row["name"];
    } else {
        echo "No semester is active";
        exit(); // Exit the script since there is no active semester
    }

    // Select the active year
    $active_year = mysqli_query($connection, "SELECT year FROM accademicyear WHERE status='Active'");
    $active_year_row = mysqli_fetch_array($active_year);
    if ($active_year_row) {
        $year_name = $active_year_row["year"];
    } else {
        echo "No year is active";
        exit(); // Exit the script since there is no active year
    }

    // Retrieve teacher ID based on email session
    // Retrieve teacher ID based on email session
    $email = $_SESSION['email'];
    $query = "SELECT id FROM teachers WHERE email = '$email'";
    $result = mysqli_query($connection, $query);
    $row = mysqli_fetch_assoc($result);
    $teacherId = $row['id'];

    // Query to retrieve courses for the teacher
    // Query to retrieve courses for the teacher
    $query = "SELECT * FROM teacherclass WHERE teacher_id = '$teacherId'";
    $courseDetails = mysqli_query($connection, $query);
    $row = mysqli_fetch_array($courseDetails);
    $subject = $row["subject"];

    // Fetch course name based on subject_id
    // Fetch course name based on subject_id
    $subjectId = $row["subject"];
    $query = "SELECT course FROM courses WHERE id = '$subjectId'";
    $result = mysqli_query($connection, $query);
    $courseName = mysqli_fetch_array($result)['course'];

    // Check if the form has been submitted for registration
    // Check if the form has been submitted for registration
    if (isset($_POST["register"])) {
        $marks = $_POST["marks"]; // Sanitize the input to ensure it's an integer
        $date = date("Y-m-d");

        // Check if results have been uploaded already
        // Check if results have been uploaded already
        $result_select = mysqli_query($connection, "SELECT * FROM results WHERE student_id = '$student_id' AND year = '$year_name' AND semester = '$semester_name' AND subject = '$courseName' AND class = '$class'");
        $array = mysqli_fetch_array($result_select);
        
        if ($array) {
            echo "<script>
                alert('Results for this subject has already been uploaded for this semester');
            </script>";
        } else {
            // Inserting data into the database
            // Inserting data into the database
            $insert_query = mysqli_query($connection, "INSERT INTO `results` (`year`, `semester`, `student_id`, `subject`, class, `marks`, `date`) VALUES ('$year_name', '$semester_name', '$student_id', '$courseName', '$class', '$marks', '$date')");

            if ($insert_query) {
                echo "<script>
                    alert('Result has been uploaded successfully');
                    window.location.href = 'result.php';
                </script>";
            } else {
                echo "<script>
                    alert('Registration Failed');
                </script>";
            }
        }
    }
}
?>





    






<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Results</title>
    <!-- assets -->
    <!-- assets -->
    <script src="../Assets/chart.min.js"></script>
    <link rel="stylesheet" href="../Assets/fonts/fonts.css">
    <link rel="stylesheet" href="../Assets/fontawesome/css/all.css">

    <!-- scripts -->
    <!-- scripts -->
    <script src="../Assets/tailwind.js"></script>
    <script src="../Assets/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="../css//admin.css">
</head>

<body class=" h-[100vh] bg-gray-300 " style="font-family: poppins;">
    <!-- blue background -->
    <!-- blue background -->
    <div class="h-[300px] bg-[#736FF8]">

    </div>

    <div class="-mt-[300px]">
        <!-- side nav -->
        <!-- side nav -->
        <div class="w-60 h-[100vh] absolute p-6">
            <?php include('../nav/teacher_nav.php') ?>
        </div>
        <!-- page content -->
        <!-- page content -->
        <div class="ml-[280px]  pt-6 pr-6">
            <!-- page title1 -->
            <!-- page title1 -->
            <div class="grid grid-cols-2">
                <div>
                    <div class="flex">
                        <p class="text-gray-300 text-sm">Pages</p>
                        <p class="text-white text-sm">/Add Student Results</p>
                    </div>
                    <p class="text-white text-md mt-2"><i class="fa fa-bars "></i></p>
                </div>
                <div class="flex pr-10 gap-6">
                    <i class="fa-light fa-bell ml-auto text-white"></i>
                    <i class="fa-sharp fa-solid fa-sun "></i>
                </div>
            </div>

            <div class="flex justify-center mt-14">
                <div class="h-[100px] w-[600px] flex bg-white pl-20 pr-20 rounded-lg">
                    <!-- Step 3 -->
                    <div class="w-1/3 flex items-center">
                        <div class="h-4 w-4 rounded-full bg-blue-600"></div>
                        <div class="flex-1 h-0.5 bg-gray-300"></div>
                        <div class="h-4 w-4 rounded-full bg-blue-600"></div>

                    </div>
                </div>
            </div>

            <div class="flex items-center mb-8 flex justify-center mt-10">
                <div class="h-[200px] w-[600px] bg-white rounded-lg p-6">
                    <form id="multiStepForm" method="post" action="" enctype="multipart/form-data">
                        <!-- first form -->
                        <!-- first form -->
                        <div class="mb-6 step" id="step1">
                            <div>
                                <label class=" text-gray-700  mb-2 text-sm" for="firstName">Marks</label>
                                <input type="text" id="firstName" name="marks"
                                    class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-blue-500 focus:border-blue-500 text-sm"
                                    placeholder="Enter marks.."><br><br>
                            </div>
                            <div>
                                <button type="submit"
                                    class="mt-4 px-4 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-600 focus:outline-none focus:bg-blue-600"
                                    name="register">Submit</button>
                            </div>
                        </div>


                    </form>
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