<?php
session_start();



//database connection
//database connection
$connection = mysqli_connect('localhost', 'root', '', 'management_class');


//checking if user is logged in
//checking if user is logged in
if (isset($_POST['logout'])) {
    //unset all the session
    session_unset();

    //destroying the session
    //destroying the session
    session_destroy();

    //redirecting the user to the login page
    //redirecting the user to the login page
    header("Location:index.php");
}

//adding new class to the system
//adding new class to the system
if (isset($_POST['register'])) {
    //fetchingg data from the form
    //fetchingg data from the form
    $className = $_POST['name'];
    $subClass = $_POST['subClass'];
    $teacherId = $_POST['teacherId'];
    $date = date("Y-m-d");


    // Check if the teacher ID exists
    // Check if the teacher ID exists
    $checkTeacherQuery = "SELECT COUNT(*) FROM teachers WHERE id = $teacherId";
    $checkTeacherResult = mysqli_query($connection, $checkTeacherQuery);
    $teacherCount = mysqli_fetch_array($checkTeacherResult)[0];

    // Check if the class already has a teacher assigned
    // Check if the class already has a teacher assigned
    $checkClassQuery = "SELECT COUNT(*) FROM classese WHERE class_name = '$className' AND sub_class = '$subClass'";
    $checkClassResult = mysqli_query($connection, $checkClassQuery);
    $classCount = mysqli_fetch_array($checkClassResult)[0];

    if ($teacherCount > 0) {
        if ($classCount > 0) {
            // Class already has a teacher assigned
            // Class already has a teacher assigned
            echo "<script>
                    alert('This class already has a teacher assigned');
                    window.location.href = 'class_add.php';
                  </script>";
        } else {
            // Assign the teacher to the class
            // Assign the teacher to the class
            $query = "INSERT INTO classese (class_name, sub_class, teacher_id, date) VALUES ('$className', '$subClass', '$teacherId', '$date')";
            $insert = mysqli_query($connection, $query);

            if ($insert) {
                // Insertion successful
                // Insertion successful
                echo "<script>
                        alert('Class registered successfully');
                        window.location.href = 'class_reg.php';
                      </script>";
            } else {
                // Unable to register class
                // Unable to register class
                echo "<script>
                        alert('Unable to register class');
                        window.location.href = 'class_add.php';
                      </script>";
            }
        }
    } else {
        // Invalid teacher ID
        // Invalid teacher ID
        echo "<script>
                alert('Invalid teacher ID');
                window.location.href = 'class_add.php';
              </script>";
    }

    // Close the database connection
    mysqli_close($connection);
}





?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Class</title>
    <!-- assets -->
    <!-- assets -->
    <script src="../Assets/tailwind.js"></script>
    <script src="../Assets/chart.min.js"></script>
    <link rel="stylesheet" href="../Assets/fonts/fonts.css">
    <link rel="stylesheet" href="../Assets/fontawesome/css/all.css">
</head>

<body class=" h-[100vh] bg-gray-300 " style="font-family: poppins;">
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
                        <p class="text-white text-sm">/Add Class</p>
                    </div>
                    <p class="text-white text-md mt-2"><i onclick="showMe()"
                            class="fa fa-bars lg:hidden transform transition-transform rotate-90"></i></p>
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
                        <div class="h-4 w-4 rounded-full bg-blue-500"></div>
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
                                <label class=" text-gray-700  mb-2 text-sm" for="firstName">
                                    Name</label>
                                <select type="text" id="firstName" name="name"
                                    class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-blue-500 focus:border-blue-500 text-sm"
                                    placeholder="Enter your name..." required>
                                    <option value="">-- select class --</option>
                                    <option value="JHS ONE">JHS ONE</option>
                                    <option value="JHS TWO">JHS TWO</option>
                                    <option value="JHS THREE">JHS THREE</option>
                                </select><br><br>

                                <label class=" text-gray-700  mb-2 text-sm" for="firstName">Sub Class</label>
                                <select type="text" id="firstName" name="subClass"
                                    class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-blue-500 focus:border-blue-500 text-sm"
                                    placeholder="Enter email..." required>
                                    <option value="">-- select sub class --</option>
                                    <option value="A">A</option>
                                    <option value="B">B</option>
                                    <option value="C">C</option>
                                </select><br><br>

                                <label class=" text-gray-700  mb-2 text-sm" for="firstName">Class Teacher</label>
                                <input type="text" id="firstName" name="teacherId" placeholder="Enter teacher id..."
                                    class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-blue-500 focus:border-blue-500 text-sm"
                                    required><br><br>


                            </div>

                            <button type="submit"
                                class="mt-4 px-4 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-600 focus:outline-none focus:bg-blue-600"
                                name="register">
                                Submit
                            </button>

                        </div>
                </div>
            </div>
            </form>
        </div>
    </div>
    </div>
    </div>



    <!-- confirm before delete -->
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