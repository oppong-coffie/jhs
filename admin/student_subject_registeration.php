<?php
session_start();

// Database connection
$connection = mysqli_connect('localhost', 'root', '', 'management_class');

if (isset($_POST['submit'])) {
    $course = $_POST['course'];
    $teacherId = $_POST['teacherId'];
    $date = date('Y-m-d');

    // Check if the teacher exists in the teachers table
    $checkQuery = "SELECT COUNT(*) FROM student WHERE id = $teacherId";
    $checkResult = mysqli_query($connection, $checkQuery);
    $teacherCount = mysqli_fetch_array($checkResult)[0];

    if ($teacherCount > 0) {
        // Check if the course exists in the courses table
        $checkQuery = "SELECT COUNT(*) FROM courses WHERE id = $course";
        $checkResult = mysqli_query($connection, $checkQuery);
        $courseCount = mysqli_fetch_array($checkResult)[0];

        if ($courseCount > 0) {
            // Check if the same student has already been assigned the same course
            $checkQuery = "SELECT COUNT(*) FROM studentSubject WHERE student_id = $teacherId AND subject_id = $course";
            $checkResult = mysqli_query($connection, $checkQuery);
            $existingCount = mysqli_fetch_array($checkResult)[0];

            if ($existingCount > 0) {
                // Student already assigned the course
                echo "<script>
                        alert('Student already assigned the course');
                        window.location.href = 'student_subject_registeration.php';
                    </script>";
                exit();
            }

            // Both teacher and course exist, proceed with the insert
            $query = "INSERT INTO studentSubject (student_id, subject_id, date) VALUES ($teacherId, $course, '$date')";
            $insert = mysqli_query($connection, $query);

            if ($insert) {
                // Registration successful
                echo "<script>
                        alert('Registration Successful');
                        window.location.href = 'student_subject_registeration.php';
                    </script>";
            } else {
                // Unable to register course
                echo "<script>
                        alert('Unable to register course');
                        window.location.href = 'student_subject_registeration.php';
                    </script>";
            }
        } else {
            // Invalid course ID
            echo "<script>
                    alert('Invalid course ID');
                    window.location.href = 'student_subject_registeration.php';
                </script>";
        }
    } else {
        // Invalid teacher ID
        echo "<script>
                alert('Invalid teacher ID');
                window.location.href = 'student_subject_registeration.php';
            </script>";
    }
}



// Delete records
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $query = "DELETE FROM studentSubject WHERE id = $id";
    $delete = mysqli_query($connection, $query);

    if ($delete) {
        header('location: student_subject_registeration.php');
    }
}

// Number of records per page
$recordsPerPage = 10;

// Get the current page number from the URL parameter
$currentpage = isset($_GET['page']) ? $_GET['page'] : 1;

// Calculate the offset for the query
$offset = ($currentpage - 1) * $recordsPerPage;

// Query to retrieve the records for the current page
$query = "SELECT * FROM studentSubject LIMIT $offset, $recordsPerPage";
$teacher_details = mysqli_query($connection, $query);

// Query to get the total count of records
$totalRecordsQuery = "SELECT COUNT(*) AS total FROM studentSubject";
$totalRecordsResult = mysqli_query($connection, $totalRecordsQuery);
$totalRecordsRow = mysqli_fetch_assoc($totalRecordsResult);
$totalRecords = $totalRecordsRow['total'];
$totalPages = ceil($totalRecords / $recordsPerPage);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ADMIN DASHBOARD || DASHBOARD</title>
    <!-- Assets -->
    <script src="../Assets/chart.min.js"></script>
    <link rel="stylesheet" href="../Assets/fonts/fonts.css">
    <link rel="stylesheet" href="../Assets/fontawesome/css/all.css">
    <script src="../Assets/tailwind.js"></script>
</head>

<body class="h-[100vh] bg-gray-300" style="font-family: poppins;">
    <!-- Blue background -->
    <div class="h-[300px] bg-[#736FF8]"></div>

    <div class="-mt-[300px]">
        <!-- Side nav -->
        <div class="w-60 h-[100vh] absolute p-6">
            <?php include('../nav/nav.php') ?>
        </div>
        <!-- Page content -->
        <div class="ml-[280px]  pt-6 pr-6">
            <!-- Page title1 -->
            <div class="grid grid-cols-2">
                <div>
                    <div class="flex">
                        <p class="text-gray-300 text-sm">Pages</p>
                        <p class="text-white text-sm">/ Assign Subject to Students</p>
                    </div>
                    <p class="text-white text-md mt-2"><i class="fa fa-bars "></i></p>
                </div>
                <div class="flex pr-10 gap-6">
                    <i class="fa-light fa-bell ml-auto text-white"></i>
                    <i class="fa-sharp fa-solid fa-sun "></i>
                </div>
            </div>

            <!-- Page title2 -->
            <div class="text-right">
                <form action="" method="post">
                    <input type="text" class="h-8 rounded-sm text-sm pl-2 w-60 outline-none border focus:border-blue-300 shadow-sm"
                        placeholder="Enter student ID..." name="teacherId">
                    <select class="h-8 rounded-sm text-sm pl-2 w-60 outline-none border focus:border-blue-300 shadow-sm"
                        name="course">
                        <?php
                        $courseQuery = "SELECT id, course FROM courses";
                        $courseResult = mysqli_query($connection, $courseQuery);
                        while ($courseRow = mysqli_fetch_array($courseResult)) {
                            ?>
                            <option value="<?php echo $courseRow['id']; ?>"><?php echo $courseRow['course']; ?></option>
                        <?php
                    }
                    ?>
                    </select>

                    <input type="submit" value="Assign" class="bg-white h-8  w-20 rounded-sm shadow-sm text-center"
                        name="submit">

                </form>
            </div>

            <div class="bg-white w-[1050px] rounded-lg shadow-sm mt-10 p-6">
                <table id="myTable" class="w-[990px] ml-2" id="container">
                    <thead class="p-2">
                        <tr class="text-left text-[12px] h-10 text-gray-400">
                            <th>ID</th>
                            <th>STUDENT NAME</th>
                            <th>SUBJECT</th>
                            <th>DATE</th>
                            <th>ACTION</th>
                        </tr>
                    </thead>
                    <tbody class="text-[13px] text-gray-600">
                        <?php
                        while ($row = mysqli_fetch_array($teacher_details)) {
                            ?>
                            <tr class=" h-10">
                                <td><?php echo $row["id"] ?></td>
                                <td>
                                    <?php
                                    // Fetch student name based on student_id
                                    $studentId = $row["student_id"];
                                    $studentQuery = "SELECT name FROM student WHERE id = '$studentId'";
                                    $studentResult = mysqli_query($connection, $studentQuery);
                                    $studentRow = mysqli_fetch_array($studentResult);
                                    $studentName = $studentRow ? $studentRow['name'] : "No student found";
                                    echo $studentName;
                                    ?>
                                </td>
                                <td>
                                    <?php
                                    // Fetch course name based on subject_id
                                    $subjectId = $row["subject_id"];
                                    $courseQuery = "SELECT course FROM courses WHERE id = $subjectId";
                                    $courseResult = mysqli_query($connection, $courseQuery);
                                    $courseRow = mysqli_fetch_array($courseResult);
                                    $courseName = $courseRow ? $courseRow['course'] : "No course found";
                                    echo $courseName;
                                    ?>
                                </td>
                                <td><?php echo $row["date"] ?></td>
                                <td>
                                    <div class="flex gap-[2px]">
                                        <a href="teacher_reg.php?id=<?php echo $row['id'] ?>">
                                            <div class="bg-green-500 text-white w-6 text-center rounded-sm">
                                                <button><i class="fa fa-edit"></i></button>
                                            </div>
                                        </a>
                                        <a href="teachers_reg.php?delete=<?php echo $row['id'] ?>">
                                            <div class="bg-red-600 text-white w-6 text-center rounded-sm">
                                                <button onclick="return confirmDelete()"><i class="fa fa-trash"></i></button>
                                            </div>
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        <?php
                    }
                    ?>
                    </tbody>
                </table>

                <!-- Pagination -->
                <div class="pagination mt-10 gap-10">
                    <?php if ($totalPages > 1) { ?>
                        <?php if ($currentpage > 1) { ?>
                            <a href="?page=<?php echo ($currentpage - 1); ?>" class="pagination-link">
                                <button class="text-white w-20 bg-blue-400 rounded-sm">Previous</button>
                            </a>
                        <?php } ?>
                        <?php for ($i = 1; $i <= $totalPages; $i++) { ?>
                            <a href="?page=<?php echo $i; ?>" class="pagination-link <?php echo ($i == $currentpage) ? 'active' : ''; ?>">
                                <?php echo $i; ?>
                            </a>
                        <?php } ?>
                        <?php if ($currentpage < $totalPages) { ?>
                            <a href="?page=<?php echo ($currentpage + 1); ?>" class="pagination-link">
                                <button class="bg-blue-400 text-white w-20 rounded-sm">Next</button>
                            </a>
                        <?php } ?>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>

    <!-- Confirm before delete -->
    <script>
        function confirmDelete() {
            return confirm("Are you sure you want to delete this record?");
        }
    </script>
</body>

</html>