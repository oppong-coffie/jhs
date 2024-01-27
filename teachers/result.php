<?php
session_start();

// Check if the teacher is not logged in, redirect to the login page
if (!isset($_SESSION['email'])) {
    header("Location: ../index.php");
    exit;
}

// Database connection
$connection = mysqli_connect('localhost', 'root', '', 'management_class');


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
$recordsPerPage = 8;

// Get the current page number from the URL parameter
$currentpage = isset($_GET['page']) ? $_GET['page'] : 1;

// Calculate the offset for the query
$offset = ($currentpage - 1) * $recordsPerPage;

// Retrieve teacher ID based on email session
$email = $_SESSION['email'];
$query = "SELECT id FROM teachers WHERE email = '$email'";
$result = mysqli_query($connection, $query);
$row = mysqli_fetch_assoc($result);
$teacherId = $row['id'];

// Query to retrieve courses for the teacher
$query = "SELECT * FROM teacherclass WHERE teacher_id = '$teacherId'";
$courseDetails = mysqli_query($connection, $query);
$class_row =mysqli_fetch_array($courseDetails );
$class = $class_row['subject'];

//selecting subject name from courses table using the subject id
$subject_id = $class_row['subject'];
$subject_query = "SELECT course FROM courses WHERE id = '$class'";
$subject_result = mysqli_query($connection, $subject_query);
$subject_row = mysqli_fetch_array($subject_result);
$subject = $subject_row['course'];


//query to select the results
$result_select = "SELECT * FROM results WHERE subject = '$subject' LIMIT $offset, $recordsPerPage";
$result_query = mysqli_query($connection, $result_select);

if (!$result_query) {
    die('Error: ' . mysqli_error($connection));
}




// Query to get the total count of records
$totalRecordsQuery = "SELECT COUNT(*) AS total FROM `results`";
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
    <title>Results</title>
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
                        <p class="text-white text-sm">/Manage Teachers</p>
                    </div>
                    <p class="text-white text-md mt-2"><i class="fa fa-bars "></i></p>
                </div>
                <div class="flex pr-10 gap-6">
                    <i class="fa-light fa-bell ml-auto text-white"></i>
                    <i class="fa-sharp fa-solid fa-sun "></i>
                </div>
            </div>

            <div class="bg-white  w-[1050px] rounded-lg shadow-sm mt-10 p-6">
                 <!-- search -->
                 <input id="search" type="text" class="bg-blue-100 h-9 w-80 rounded-lg outline-none p-2" placeholder="search by id..">

                <table id="myTable" class="table w-[990px] ml-2" id="container">
                    <thead class="p-2  p w-[100px]">
                        <tr class="text-left text-[12px] h-10 text-gray-400">
                            <th>ID</th>
                            <th>STUDENT ID</th>
                            <th>YEAR</th>
                            <th>SEMESTER</th>
                            <th>CLASS</th>
                            <th>SUBJECT</th>
                            <th>MARKS</th>
                            <th>GRADE</th>
                            <th>Remarks</th>
                            <th>DATE</th>
                            <th>ACTION</th>
                        </tr>
                    </thead>
                    <?php
                    while ($row = mysqli_fetch_assoc($result_query )) {
                        // Grading logic
    $marks = $row["marks"];
    $grade = "";

    if ($marks >= 90) {
        $grade = "A1";
    } elseif ($marks >= 80) {
        $grade = "B2";
    } elseif ($marks >= 70) {
        $grade = "B3";
    } elseif ($marks >= 60) {
        $grade = "C4";
    } elseif ($marks >= 50) {
        $grade = "D5";
    } else {
        $grade = "F";
    }

    $marks = $row["marks"];
    $remark = "";

    if ($marks >= 90) {
        $remark= "Excellent";
    } elseif ($marks >= 80) {
        $remark = "Very Good";
    } elseif ($marks >= 70) {
        $remark = "Good";
    } elseif ($marks >= 60) {
        $remark = "pass";
    } elseif ($marks >= 50) {
        $remark = "Fair";
    } else {
        $remark = "Fail";
    }
                    ?>
                    <tbody class="text-[13px] text-gray-600">
                        <tr class=" h-14">
                            <td><?php echo $row["id"] ?></td>
                            <td><?php echo $row["student_id"] ?></td>
                            <td><?php echo $row["year"] ?></td>
                            <td><?php echo $row["semester"] ?></td>
                            <td><?php echo $row["class"] ?></td>
                            <td><?php echo $row["subject"] ?></td>
                            <td><?php echo $row["marks"] ?></td>
                            <td><?php echo $grade ?></td>
                            <td><?php echo $remark ?></td>
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
                    </tbody>
                    <?php
                    }
                    ?>
                </table>
                <!-- pagination -->
                <!-- pagination -->
                <div class="pagination mt-4 gap-10">
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
    <script>
    function mySearch() {
        var input, filter, table, tr, td, i, txtValue;
        input = document.getElementById("search");
        filter = input.value.toUpperCase();
        table = document.getElementById("myTable");
        tr = table.getElementsByTagName("tr");

        // Loop through all table rows, starting from index 1 to skip the header row (index 0)
        for (i = 1; i < tr.length; i++) {
            td = tr[i].getElementsByTagName("td")[1]; // Use [0] to get the first column (student ID)
            if (td) {
                txtValue = td.textContent || td.innerText;
                if (txtValue.toUpperCase().indexOf(filter) > -1) {
                    tr[i].style.display = ""; // Show the row if it matches the search query
                } else {
                    tr[i].style.display = "none"; // Hide the row if it doesn't match the search query
                }
            }
        }
    }

    // Attach an event listener to the search input
    document.getElementById("search").addEventListener("input", mySearch);
</script>
</body>

</html>