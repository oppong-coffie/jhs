<?php
session_start();

// Database connection
$connection = mysqli_connect('localhost', 'root', '', 'management_class');
if (isset($_POST['submit'])) {
    $course = $_POST['course'];
    $teacherId = $_POST['teacherId'];
    $date = date('Y-m-d');

    // Check if the teacher exists in the teachers table
    $checkQuery = "SELECT COUNT(*) FROM teachers WHERE id = ?";
    $checkStatement = mysqli_prepare($connection, $checkQuery);
    mysqli_stmt_bind_param($checkStatement, "i", $teacherId);
    mysqli_stmt_execute($checkStatement);
    mysqli_stmt_store_result($checkStatement);  // Store the result set
    mysqli_stmt_bind_result($checkStatement, $count);
    mysqli_stmt_fetch($checkStatement);

    if ($count > 0) {
        // Check if the course exists in the courses table
        $checkQuery = "SELECT COUNT(*) FROM courses WHERE id = ?";
        $checkStatement = mysqli_prepare($connection, $checkQuery);
        mysqli_stmt_bind_param($checkStatement, "i", $course);
        mysqli_stmt_execute($checkStatement);
        mysqli_stmt_store_result($checkStatement);  // Store the result set
        mysqli_stmt_bind_result($checkStatement, $count);
        mysqli_stmt_fetch($checkStatement);

        if ($count > 0) {
            // Both teacher and course exist, proceed with the insert
            $query = "INSERT INTO teacherCourse (teachers_id, subject_id, date) VALUES (?, ?, ?)";
            $statement = mysqli_prepare($connection, $query);
            mysqli_stmt_bind_param($statement, "iis", $teacherId, $course, $date);
            $insert = mysqli_stmt_execute($statement);

            if ($insert) {
                // Registration successful
                echo "<script>
                        alert('Registration Successful');
                        window.location.href = 'subjects.php';
                    </script>";
            } else {
                // Unable to register course
                echo "<script>
                        alert('Unable to register course');
                        window.location.href = 'subjects.php';
                    </script>";
            }
        } else {
            // Invalid course ID
            echo "<script>
                    alert('Invalid course ID');
                    window.location.href = 'subjects.php';
                </script>";
        }
    } else {
        // Invalid teacher ID
        echo "<script>
                alert('Invalid teacher ID');
                window.location.href = 'subjects.php';
            </script>";
    }
}




//deleting records
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $query = "DELETE FROM `admin` WHERE `id` = $id";
    $delete = mysqli_query($connection,"DELETE FROM `admin` WHERE `id` = $id" );

    if ($delete) {
        header('location:admin_reg.php');
    }
}




// Number of records per page
$recordsPerPage = 10;

// Get the current page number from the URL parameter
$currentpage = isset($_GET['page']) ? $_GET['page'] : 1;

// Calculate the offset for the query
$offset = ($currentpage - 1) * $recordsPerPage;

// Query to retrieve the records for the current page
$query = "SELECT * FROM `classese` LIMIT $offset, $recordsPerPage";
$teacher_details = mysqli_query($connection, $query);

// Query to get the total count of records
$totalRecordsQuery = "SELECT COUNT(*) AS total FROM `classese`";
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
            <?php include('../nav/nav.php') ?>
        </div>
        <!-- page content -->
        <div class="ml-[280px]  pt-6 pr-6">
            <!-- page title1 -->
            <div class="grid grid-cols-2">
                <div>
                    <div class="flex">
                        <p class="text-gray-300 text-sm">Pages</p>
                        <p class="text-white text-sm">/Manage Classes</p>
                    </div>
                    <p class="text-white text-md mt-2"><i class="fa fa-bars "></i></p>
                </div>
                <div class="flex pr-10 gap-6">
                    <i class="fa-light fa-bell ml-auto text-white"></i>
                    <i class="fa-sharp fa-solid fa-sun "></i>
                    <a href="class_add.php">
                        <button class="bg-white h-6  w-10 rounded-sm shadow-sm text-center">
                            Add
                        </button>
                    </a>


                </div>
            </div>

            <div class="bg-white  w-[1050px] rounded-lg shadow-sm mt-10 p-6">
                <table id="myTable" class="w-[990px] ml-2" id="container">
                    <thead class="p-2">
                        <tr class="text-left text-[12px] h-10 text-gray-400">
                            <th>ID</th>
                            <th>CLASS NAME</th>
                            <th>SUB CLASS</th>
                            <th>TEACHER NAME</th>
                            <th>DATE</th>
                            <th>ACTION</th>
                        </tr>
                    </thead>
                    <tbody class="text-[13px] text-gray-600">
                        <?php
        while ($row = mysqli_fetch_array($teacher_details)) {
            $teacher_id = $row["teacher_id"];
            $teacher_name = mysqli_query($connection, "SELECT name FROM teachers WHERE id = '$teacher_id'");
            $t_row = mysqli_fetch_array($teacher_name);
            $teacher_name = $t_row["name"];
        ?>
                        <tr class=" h-10">
                            <td><?php echo $row["id"] ?></td>
                            
                            <td><?php echo $row["class_name"] ?></td>
                            <td><?php echo $row["sub_class"] ?></td>
                            <td><?php echo $teacher_name ?></td>
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
                                            <button onclick="return confirmDelete()"><i
                                                    class="fa fa-trash"></i></button>
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


                <!-- pagination -->
                <!-- pagination -->
                <div class="pagination mt-10 gap-10">
                    <?php if ($totalPages > 1) { ?>
                    <?php if ($currentpage > 1) { ?>
                    <a href="?page=<?php echo ($currentpage - 1); ?>" class="pagination-link"> <button
                            class="text-white w-20 bg-blue-400 rounded-sm">Previous</button></a>
                    <?php } ?>
                    <?php for ($i = 1; $i <= $totalPages; $i++) { ?>
                    <a href="?page=<?php echo $i; ?>"
                        class="pagination-link <?php echo ($i == $currentpage) ? 'active' : ''; ?>"><?php echo $i; ?></a>
                    <?php } ?>
                    <?php if ($currentpage < $totalPages) { ?>
                    <a href="?page=<?php echo ($currentpage + 1); ?>" class="pagination-link"><button
                            class="bg-blue-400 text-white w-20 rounded-sm">Next</button></a>
                    <?php } ?>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>

    <!-- confirm before delete -->
    <script>
    function confirmDelete() {
        return confirm("Are you sure you want to delete this record?");
    }
    </script>
</body>

</html>