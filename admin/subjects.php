
<?php
session_start();

// Database connection
// Database connection
$connection = mysqli_connect('localhost', 'root', '', 'management_class');

if (isset($_POST['submit'])) {
    //retrieving data from the form
    //retrieving data from the form
    $course = $_POST['course'];
    $date = date('Y-m-d');

    // Check if the course already exists in the database
    // Check if the course already exists in the database
    $checkQuery = "SELECT * FROM courses WHERE course = '$course'";
    $checkResult = mysqli_query($connection, $checkQuery);

    if (mysqli_num_rows($checkResult) > 0) {
        // Course already exists
        // Course already exists
        echo "<script>
                alert('Subject already exists');
                window.location.href = 'subjects.php';
            </script>";
    } else {
        // Course does not exist, proceed with insertion
        // Course does not exist, proceed with insertion
        $query = "INSERT INTO `courses`(`course`, `date`) VALUES ('$course', '$date')";
        $insert = mysqli_query($connection, $query);
        
        if ($insert) {
            // Registration successful
            // Registration successful
            echo "<script>
                    alert('Subject added Successful');
                    window.location.href = 'subjects.php';
                </script>";
        } else {
            // Unable to register course
            // Unable to register course
            echo "<script>
                    alert('Unable to register subject');
                    window.location.href = 'subjects.php';
                </script>";
        }
    }
}



//deleting records
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
// Number of records per page
$recordsPerPage = 10;

// Get the current page number from the URL parameter
// Get the current page number from the URL parameter
$currentpage = isset($_GET['page']) ? $_GET['page'] : 1;

// Calculate the offset for the query
// Calculate the offset for the query
$offset = ($currentpage - 1) * $recordsPerPage;

// Query to retrieve the records for the current page
// Query to retrieve the records for the current page
$query = "SELECT * FROM `courses` LIMIT $offset, $recordsPerPage";
$teacher_details = mysqli_query($connection, $query);

// Query to get the total count of records
// Query to get the total count of records
$totalRecordsQuery = "SELECT COUNT(*) AS total FROM `courses`";
$totalRecordsResult = mysqli_query($connection, $totalRecordsQuery);
$totalRecordsRow = mysqli_fetch_assoc($totalRecordsResult);
$totalRecords = $totalRecordsRow['total'];
$totalPages = ceil($totalRecords / $recordsPerPage);
?>

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


    <!-- blue background -->
    <!-- blue background -->
    <div class="h-[300px]  w-[1100px] lg:w-[1366px] bg-[#736FF8]"></div>

    <div class="-mt-[300px]">

    <div class="w-60 h-[100vh] absolute p-6 lg:block hidden " id="nav">
            <?php include('../nav/nav.php') ?>
        </div>
        
        <!-- page content -->
        <div class="lg:ml-[280px] ml-4  pt-6 pr-6">
            <!-- page title1 -->
            <div class="grid grid-cols-2">
                <div>
                    <div class="flex">
                        <p class="text-gray-300 text-sm">Pages</p>
                        <p class="text-white text-sm">/Manage Subjects</p>
                    </div>
                    <p class="text-white text-md mt-2"><i onclick="showMe()"
                            class="fa fa-bars lg:hidden transform transition-transform rotate-90"></i></p>
                </div>
                <div class="flex pr-10 gap-6">
                    <i class="fa-light fa-bell ml-auto text-white"></i>
                    <i class="fa-sharp fa-solid fa-sun "></i>

                </div>
            </div>

            <!-- page title2 -->
            <div class="text-right">
                <form action="" method="post">
                    <input type="text"
                        class="h-8 rounded-sm text-sm pl-2 w-60 outline-none border focus:border-blue-300 shadow-sm"
                        placeholder="Enter subject name" name="course" required>
                    <input type="submit" value="Add"
                        class="bg-white h-8  w-12 rounded-sm text-gray-600 shadow-sm text-center   " name="submit">

                </form>
            </div>

            <div class="bg-white  w-[1050px] rounded-lg shadow-sm mt-10 p-6">
                <table id="myTable" class="w-[990px] ml-2" id="container">
                    <thead class="p-2 ">
                        <tr class="text-left text-[12px] h-10 text-gray-400">
                            <th>ID</th>
                            <th>Subject NAME</th>
                            <th>DATE</th>
                            <th>ACTION</th>
                        </tr>
                    </thead>
                    <?php
                    while ($row = mysqli_fetch_array($teacher_details)) {
                    ?>
                    <tbody class="text-[13px] text-gray-600">
                        <tr class="even:bg-[#e9e3ff] h-10">
                            <td><?php echo $row["id"] ?></td>
                            <td><?php echo $row["course"] ?></td>
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
    function confirmLogout() {
        return confirm("Are you sure you want to logout?");
    }

    function showMe() {
        var nav = document.getElementById('nav');
        nav.classList.toggle('hidden');
        nav.classList.toggle('block ');
    }
    </script>

</body>

</html>