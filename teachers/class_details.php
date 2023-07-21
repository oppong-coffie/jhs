<?php
session_start();

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





// Query to get the total count of records
$totalRecordsQuery = "SELECT COUNT(*) AS total FROM `student`";
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
    <div class="h-[300px] bg-[#736FF8]"></div>

    <div class="-mt-[300px]">

        <!-- side nav -->
        <!-- side nav -->
        <div class="w-60 h-[100vh] absolute p-6 lg:block hidden " id="nav">
            <?php include('../nav/teacher_nav.php') ?>
        </div>

        <!-- page content -->
        <div class="ml-[280px]  pt-6 pr-6">
            <!-- page title1 -->
            <div class="grid grid-cols-2">
                <div>
                    <div class="flex">
                        <p class="text-gray-300 text-sm">Pages</p>
                        <p class="text-white text-sm">/Manage Students</p>
                    </div>
                    <p class="text-white text-md mt-2"><i class="fa fa-bars "></i></p>
                </div>
                <div class="flex pr-10 gap-6">
                    <i class="fa-light fa-bell ml-auto text-white"></i>
                    <i class="fa-sharp fa-solid fa-sun "></i>
                   
                </div>
            </div>

            <div class="bg-white  w-[1050px] rounded-lg shadow-sm mt-10 p-6">
                <table id="myTable" class="table w-[990px] ml-2" id="container">
                    <thead class="p-2  p w-[100px]">
                        <tr class="text-left text-[12px] h-10 text-gray-400">
                            <th>ID</th>
                            <th>IMAGES</th>
                            <th>NAME</th>
                            <th>EMAIL</th>
                            <th>DOB</th>
                            <th>PHONE</th>
                            <th>GENDER</th>
                            <th>DATE</th>
                            <th>ACTION</th>
                        </tr>
                    </thead>
                    <?php
                    if(isset($_GET["class_name"])){
                        $class_name = $_GET["class_name"];
                        
                    
                    // Query to retrieve the records for the current page
                    $studentDetails = "SELECT s.*
                    FROM student s
                    JOIN studentclass sc ON s.id = sc.student_id
                    JOIN classese c ON c.id = sc.class_id
                    WHERE c.class_name = '$class_name';
                    ";
                    $teacher_details = mysqli_query($connection, $studentDetails);
                    
                
                    while ($row = mysqli_fetch_array($teacher_details)) {
                        $admin_image = $row['image'];
                       
                    ?>
                    <tbody class="text-[13px] text-gray-600">
                        <tr class=" h-14">
                            <td><?php echo $row["id"] ?></td>
                            <td>
                                <?php
                                    // Output the image
                                    echo "<img src='../images/$admin_image' alt='admin image' class='h-[40px] w-[40px] rounded-full'>";
                                    ?>
                            </td>
                            <td><?php echo $row["name"] ?></td>
                            <td><?php echo $row["email"] ?></td>
                            <td><?php echo $row["birthDate"] ?></td>
                            <td><?php echo $row["phoneNo"] ?></td>
                            <td><?php echo $row["gender"] ?></td>
                            <td><?php echo $row["date"] ?></td>
                            <td>
                                <div class="flex gap-[2px]">
                                    <a href="results_add.php?id=<?php echo $row['id'] ?>">
                                        <div class="bg-green-500 text-white w-14 text-center rounded-sm">
                                            <button>
                                                Results
                                            </button>
                                        </div>
                                    </a>
                                   
                                </div>
                            </td>
                        </tr>
                    </tbody>
                    <?php
                    }
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

</body>

</html>