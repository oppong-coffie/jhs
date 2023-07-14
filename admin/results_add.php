<?php
session_start();

if(!isset($_SESSION['email'])){

}

//database connection
$connection = mysqli_connect('localhost', 'root', '', 'management_class');


//checking if user is logged in
if (isset($_POST['logout'])) {
    //unset all the session
    session_unset();

    //destroying the session
    session_destroy();

    //redirecting the user to the login page
    header("Location:index.php");
}

//adding new admin to the system
//adding new admin to the system
if (isset($_POST["register"])) {
    // Retrieving data from the form and sanitizing input
    // Retrieving data from the form and sanitizing input
    $id =  $_POST["id"];
    $year = mysqli_real_escape_string($connection, $_POST["year"]);
    $semester = mysqli_real_escape_string($connection, $_POST["semester"]);
    $class = mysqli_real_escape_string($connection, $_POST["class"]);
    $subclass = $_POST["subclass"];
    $subject = mysqli_real_escape_string($connection, $_POST["subject"]);
    $marks = mysqli_real_escape_string($connection, $_POST["marks"]);
    $result_type = mysqli_real_escape_string($connection, $_POST["result_type"]);
    $date = date("Y-m-d");

    // Now let's move the uploaded image into the folder: image
        // Inserting data into the database
        $insert_query = mysqli_query($connection, "INSERT INTO `results` ( `student_id`, `year`, `semester`, `class`, `sub_class`, `subject`, `marks`,`result_type`,`date`) VALUES ( '$id', '$year', '$semester', '$class', '$subclass', '$subject', '$marks','$result_type','$date')");


        if ($insert_query) {
            echo "<script>
                alert('Registration Successful');
                window.location.href = './results.php';
            </script>";
        } else {
            echo "<script>
                alert('Registration Failed');
            </script>";
        }
}



?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ADMIN DASHBOARD || DASHBOARD</title>
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
            <?php include('../nav/nav.php') ?>
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
                    <!-- Step 1 -->
                    <div class="w-1/3 flex items-center">
                        <div class="h-4 w-4 rounded-full bg-blue-500"></div>
                        <div class="flex-1 h-0.5 bg-gray-300"></div>
                    </div>

                    <!-- Step 2 -->
                    <div class="w-1/3 flex items-center">
                        <div class="h-4 w-4 rounded-full bg-gray-300"></div>
                        <div class="flex-1 h-0.5 bg-gray-300"></div>
                    </div>

                    <!-- Step 3 -->
                    <div class="w-1/3 flex items-center">
                        <div class="h-4 w-4 rounded-full bg-gray-300"></div>
                        <div class="flex-1 h-0.5 bg-gray-300"></div>
                    </div>
                </div>
            </div>

            <div class="flex items-center mb-8 flex justify-center mt-10">
                <div class="h-[360px] w-[600px] bg-white rounded-lg p-6">
                    <form id="multiStepForm" method="post" action="" enctype="multipart/form-data">
                        <!-- first form -->
                        <!-- first form -->
                        <div class="mb-6 step" id="step1">
                            <div>
                                <label class=" text-gray-700  mb-2 text-sm" for="firstName">Student id</label>
                                <input type="text" id="firstName" name="id"
                                    class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-blue-500 focus:border-blue-500 text-sm"
                                    placeholder="Enter student id..."><br><br>

                                <label class=" text-gray-700  mb-2 text-sm" for="firstName">Year</label>
                                <select type="text" id="firstName" name="year"
                                    class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-blue-500 focus:border-blue-500 text-sm"
                                    placeholder="Enter your first name">
                                    <option value="">-- select year --</option>
                                    <?php
                                    $query = "SELECT * FROM `accademicyear`";
                                    $result = mysqli_query($connection, $query);
                                    while ($row = mysqli_fetch_array($result)) {
                                    ?>
                                    <option value="<?php echo $row['year'] ?>"><?php echo $row['year'] ?></option>
                                    <?php
                                    }
                                    ?>
                                </select><br><br>

                                <label class=" text-gray-700  mb-2 text-sm" for="firstName">Semester</label>
                                <select type="text" id="firstName" name="semester"
                                    class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-blue-500 focus:border-blue-500 text-sm"
                                    placeholder="Enter your first name">
                                    <option value="">-- select semester --</option>
                                    <?php
                                    $query = "SELECT * FROM `semester`";
                                    $result = mysqli_query($connection, $query);
                                    while ($row = mysqli_fetch_array($result)) {
                                    ?>
                                    <option value="<?php echo $row['name'] ?>"><?php echo $row['name'] ?></option>
                                    <?php
                                    }
                                    ?>
                                </select><br><br>
                            </div>

                            <button type="button"
                                class="mt-4 mr-2 px-4 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-600 focus:outline-none focus:bg-blue-600 nextButton"
                                data-next-step="step2">
                                Next
                            </button>
                        </div>

                        <!-- second form -->
                        <!-- second form -->
                        <div class="mb-6 hidden step" id="step2">
                            <div>
                                <label class=" text-gray-700  mb-2 text-sm" for="phone">Class</label>
                                <select type="text" id="firstName" name="class"
                                    class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-blue-500 focus:border-blue-500 text-sm"
                                    placeholder="Enter your first name">
                                    <option value="">-- select class --</option>
                                    <?php
                                    $query = "SELECT * FROM `classese`";
                                    $result = mysqli_query($connection, $query);
                                    while ($row = mysqli_fetch_array($result)) {
                                    ?>
                                    <option value="<?php echo $row['class_name'] ?>"><?php echo $row['class_name'] ?></option>
                                    <?php
                                    }

                                    ?>
                                </select><br><br>

                                <label class=" text-gray-700  mb-2 text-sm" for="firstName">sub class</label>
                                <select type="text" id="firstName" name="subclass"
                                    class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-blue-500 focus:border-blue-500 text-sm"
                                    placeholder="Enter your first name">
                                    <option value="">-- select sub class --</option>
                                    <?php
                                    $query = "SELECT * FROM `classese`";
                                    $result = mysqli_query($connection, $query);
                                    while ($row = mysqli_fetch_array($result)) {
                                    ?>
                                    <option value="<?php echo $row['sub_class'] ?>"><?php echo $row['sub_class'] ?></option>
                                    <?php
                                    }

                                    ?>
                                </select><br><br>

                                    <label class=" text-gray-700  mb-2 text-sm" for="firstName">Subject</label>
                                    <select type="text" id="firstName" name="subject"
                                    class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-blue-500 focus:border-blue-500 text-sm"
                                    placeholder="Enter your first name">
                                    <option value="">-- select subjects--</option>
                                    <?php
                                    $query = "SELECT * FROM `courses`";
                                    $result = mysqli_query($connection, $query);
                                    while ($row = mysqli_fetch_array($result)) {
                                    ?>
                                    <option value="<?php echo $row['course'] ?>"><?php echo $row['course'] ?></option>
                                    <?php
                                    }

                                    ?>
                                </select><br><br>


                            </div>
                            <div>
                                <button type="button"
                                    class="mt-4 mr-2 px-4 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-600 focus:outline-none focus:bg-blue-600 previousButton"
                                    data-previous-step="step1">Previous</button>
                                <button type="button"
                                    class="mt-4 px-4 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-600 focus:outline-none focus:bg-blue-600 nextButton"
                                    data-next-step="step3">Next</button>
                            </div>
                        </div>

                        <!-- third form -->
                        <!-- third form -->
                        <div class="mb-6 hidden step" id="step3">
                            <div>

                                <label class=" text-gray-700  mb-2 text-sm" for="firstName">Marks</label>
                                <input type="text" id="firstName" name="marks"
                                    class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-blue-500 focus:border-blue-500 text-sm"
                                    placeholder="Enter marks.."><br><br>

                                <label class=" text-gray-700  mb-2 text-sm" for="firstName">Result Type</label>
                                <select type="text" id="firstName" name="result_type"
                                    class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-blue-500 focus:border-blue-500 text-sm"
                                    placeholder="Enter your first name">
                                    <option value="">-- select result type --</option>
                                    <option value="Examinatoin">Examination</option>
                                    <option value="Mid Term">Mid Term</option>
                                    <option value="Exercise">Exercise</option>
                                    <option value="Assignment">Assignment</option> 
                                </select><br><br>
                            </div>
                            <div>
                                <button type="button"
                                    class="mt-4 mr-2 px-4 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-600 focus:outline-none focus:bg-blue-600 previousButton"
                                    data-previous-step="step2">Previous</button>
                                <button type="submit"
                                    class="mt-4 px-4 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-600 focus:outline-none focus:bg-blue-600" name="register">Submit</button>
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
    <script>
    // Get all the form steps, next buttons, previous buttons, and progress indicators
    const steps = document.querySelectorAll('.step');
    const nextButtons = document.querySelectorAll('.nextButton');
    const previousButtons = document.querySelectorAll('.previousButton');
    const progressIndicators = document.querySelectorAll('.h-4');

    // Add click event listeners to each next button
    nextButtons.forEach((button, index) => {
        button.addEventListener('click', () => {
            // Get the next step ID from the data attribute
            const nextStepId = button.getAttribute('data-next-step');

            // Hide the current step
            const currentStep = button.closest('.step');
            currentStep.classList.add('hidden');

            // Show the next step
            const nextStep = document.getElementById(nextStepId);
            nextStep.classList.remove('hidden');

            // Update the progress indicators
            progressIndicators[index + 1].classList.add('bg-blue-500');
        });
    });

    // Add click event listeners to each previous button
    previousButtons.forEach((button, index) => {
        button.addEventListener('click', () => {
            // Get the previous step ID from the data attribute
            const previousStepId = button.getAttribute('data-previous-step');

            // Hide the current step
            const currentStep = button.closest('.step');
            currentStep.classList.add('hidden');

            // Show the previous step
            const previousStep = document.getElementById(previousStepId);
            previousStep.classList.remove('hidden');

            // Update the progress indicators
            progressIndicators[index + 1].classList.remove('bg-blue-500');
        });
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
            window.location.href='index.php';
        </script>
    ";
}
?>