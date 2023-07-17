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
     
    <script>
    $(document).ready(function() {
        // Load the home page content by default
        $('#content').load('dashboard.php');

        // Handle click events on the navigation links
        $('.nav-link').click(function(event) {
            // Prevent the default link behavior
            event.preventDefault();

            // Get the href attribute of the clicked link
            var page = $(this).attr('href');

            // Load the page content using AJAX
            $('#content').load(page);
        });
    });
    </script>
</head>

<body style="font-family: poppins;">
    <!-- side nav -->
    <!-- side nav -->
    <div class="w-60 h-[100vh] absolute p-6 lg:block hidden " id="nav">


        <!-- navigation bar -->
        <div class="nav" style="font-family: poppins;">
            <div id="nav" class="h-[665px] w-[230px]  lg:block fixed rounded-md bg-white shadow-md p-6 ">
                <!-- school name -->
                <div class="pb-2">
                    <p class="text-center text-sm  text-gray-700">School Name</p>
                </div>
                <hr>

                <!-- nav links -->
                <!-- nav links -->
                <div class="justify-between">
                    <div class="mt-8">
                        <li class="list-none active">
                            <i class=" fa-regular fa-house text-gray-500 text-sm"></i><a class="ml-2 text-gray-500 text-sm nav-link" href="dashboard.php">Dashboard</a>
                        </li>
                        <li class=" list-none mt-4">
                            <i class="fa-solid fa-user-lock text-gray-500 text-sm"></i><a
                                class="ml-2 text-gray-500 text-sm nav-link" href="admin_reg.php">Admins</a>
                        </li>
                        <li class="nav-link list-none mt-4">
                            <i class="fa-regular fa-briefcase text-gray-500 text-sm"></i><a
                                class="ml-2 text-gray-500 text-sm nav-link" href="subjects.php">Subjects</a>
                        </li>
                        <li class="nav-link list-none mt-4">
                            <i class="fa-regular fa-users text-gray-500 text-sm"></i><a
                                class="ml-2 text-gray-500 text-sm nav-link" href="class_reg.php">Classes</a>
                        </li>
                        <li class="nav-link list-none mt-4">
                            <i class="fa-regular fa-square-poll-vertical text-gray-500 text-sm"></i><a
                                class="ml-2 text-gray-500 text-sm" href="semester.php">Semester</a>
                        </li>
                        <li class="nav-link list-none mt-4">
                            <i class="fa-regular fa-square-poll-vertical text-gray-500 text-sm"></i><a
                                class="ml-2 text-gray-500 text-sm" href="accadmicYear.php">Accademic Year</a>
                        </li>
                        <li class="nav-link list-none mt-4">
                            <i class="fa-regular fa-briefcase text-gray-500 text-sm"></i><a
                                class="ml-2 text-gray-500 text-sm" href="teacher_reg.php">Teachers</a>
                        </li>

                        <li class="nav-link list-none mt-4">
                            <i class="fa-regular fa-briefcase text-gray-500 text-sm"></i><a
                                class="ml-2 text-gray-500 text-sm" href="teacher_class_assigment.php">Teacher
                                Classes</a>
                        </li>
                        <li class="nav-link list-none mt-4">
                            <i class="fa-regular fa-users text-gray-500 text-sm"></i><a
                                class="ml-2 text-gray-500 text-sm" href="students_reg.php">Students</a>
                        </li>
                        <li class="nav-link list-none mt-4">
                            <i class="fa-regular fa-users text-gray-500 text-sm"></i><a
                                class="ml-2 text-gray-500 text-sm" href="student_subject_registeration.php">Student
                                Subjects</a>
                        </li>
                        <li class="nav-link list-none mt-4">
                            <i class="fa-regular fa-users text-gray-500 text-sm"></i><a
                                class="ml-2 text-gray-500 text-sm" href="student_class_reg.php">Student Classes</a>
                        </li>

                        <li class="nav-link list-none mt-4">
                            <i class="fa-regular fa-user text-gray-500 text-sm"></i><a
                                class="ml-2 text-gray-500 text-sm" href="parents_reg.php">Parents</a>
                        </li>
                        <li class="nav-link list-none mt-4">
                            <i class="fa-regular fa-square-poll-vertical text-gray-500 text-sm"></i><a
                                class="ml-2 text-gray-500 text-sm" href="results.php">Results</a>
                        </li>

                    </div>

                    <form action="" method="post" onsubmit="return confirmLogout()">
                        <div class=" mt-[20px]">
                            <input
                                class="h-10 rounded-md  bg-[#736FE1]  text-white flex justify-center w-40 flex text-md"
                                type="submit" value="LOGOUT" name="logout">
                        </div>

                    </form>

                </div>
            </div>
        </div>
    </div>

    <div id="content"></div>
</body>

</html>