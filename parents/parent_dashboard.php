<?php
session_start();

// Check if the parent is not logged in, redirect to the login page
if (!isset($_SESSION['email'])) {
    header("Location: login.php");
    exit;
}

// Database connection
$connection = mysqli_connect('localhost', 'root', '', 'management_class');

// Retrieve parent ID based on email session
$parentId = $_SESSION['id'];

// Retrieve student ID associated with the parent
$studentQuery = "SELECT id FROM student WHERE parent_id = '$parentId'";
$studentResult = mysqli_query($connection, $studentQuery);
$studentRow = mysqli_fetch_assoc($studentResult);
$studentId = $studentRow['id'];

// Function to calculate grade based on marks
function calculateGrade($marks) {
    if ($marks >= 90) {
        return "A1";
    } elseif ($marks >= 80) {
        return "B2";
    } elseif ($marks >= 70) {
        return "B3";
    } elseif ($marks >= 60) {
        return "C4";
    } elseif ($marks >= 50) {
        return "D5";
    } else {
        return "F";
    }
}

// Function to calculate remark based on marks
function calculateRemark($marks) {
    if ($marks >= 90) {
        return "Excellent";
    } elseif ($marks >= 80) {
        return "Very Good";
    } elseif ($marks >= 70) {
        return "Good";
    } elseif ($marks >= 60) {
        return "Pass";
    } elseif ($marks >= 50) {
        return "Fair";
    } else {
        return "Fail";
    }
}

// Query to retrieve student details
$studentDetailsQuery = "SELECT * FROM student WHERE id = $studentId";
$studentDetailsResult = mysqli_query($connection, $studentDetailsQuery);
$studentDetailsRow = mysqli_fetch_assoc($studentDetailsResult);
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
            <?php include('../nav/parent_nav.php') ?>
        </div>
        <!-- page content -->
        <div class="ml-[280px] pt-6 pr-6">
            <!-- page title1 -->
            <div class="grid grid-cols-2">
                <div>
                    <div class="flex">
                        <p class="text-gray-300 text-sm">Pages</p>
                        <p class="text-white text-sm">/Student Result</p>
                    </div>
                    <p class="text-white text-md mt-2"><i class="fa fa-bars "></i></p>
                </div>
                <div class="flex pr-10 gap-6">
                    <i class="fa-light fa-bell ml-auto text-white"></i>
                    <i class="fa-sharp fa-solid fa-sun "></i>
                    
                </div>
            </div>

            <!-- Student Results - Semester One -->
            <?php
                        $class = "JHS ONE A";
                        $class2 = "JHS ONE B";
                        $class3 = "JHS ONE C";
                        $resultQuerySemOne = "SELECT * FROM results WHERE student_id = $studentId AND semester = 'First Semester' AND class = '$class' OR class ='$class2' OR class ='$class3' ";
                        $resultResultSemOne = mysqli_query($connection, $resultQuerySemOne);
                        $row = mysqli_fetch_assoc($resultResultSemOne);
                        
                        //checking if the student has results
                        if($row){
                            ?>
            <div class="bg-white w-[1050px] rounded-lg shadow-sm mt-10 p-6">
                <h2 class="text-md mb-2 text-gray-600 ">Semester One Results (Class: JSH1)</h2>
                <table class="table w-[990px] ml-2">
                    <thead class="text-[12px] text-gray-400 text-left">
                        <tr>
                            <th>ID</th>
                            <th>STUDENT ID</th>
                            <th>YEAR</th>
                            <th>SUBJECT</th>
                            <th>MARKS</th>
                            <th>GRADE</th>
                            <th>Remarks</th>
                        </tr>
                    </thead>
                    <tbody class="text-[13px] text-gray-600">
                        <?php
                        $class = "JHS ONE A";
                        $class2 = "JHS ONE B";
                        $class3 = "JHS ONE C";
                        $resultQuerySemOne = "SELECT * FROM results WHERE student_id = $studentId AND semester = 'First Semester' AND class = '$class' OR class ='$class2' OR class ='$class3' ";
                        $resultResultSemOne = mysqli_query($connection, $resultQuerySemOne);

                        while ($row = mysqli_fetch_assoc($resultResultSemOne)) {
                            $grade = calculateGrade($row["marks"]);
                            $remark = calculateRemark($row["marks"]);
                            ?>
                        <tr>
                            <td><?php echo $row["id"]; ?></td>
                            <td><?php echo $row["student_id"]; ?></td>
                            <td><?php echo $row["year"]; ?></td>
                            <td><?php echo $row["sub_class"]; ?></td>
                            <td><?php echo $row["subject"]; ?></td>
                            <td><?php echo $row["marks"]; ?></td>
                            <td><?php echo $grade; ?></td>
                            <td><?php echo $remark; ?></td>
                        </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                </table>
            </div>
            <?php
                }
            ?>



            <!-- Student Results - Semester Two -->
            <?php
                        $class = "JHS ONE A";
                        $class2 = "JHS ONE B";
                        $class3 = "JHS ONE C";
                        $resultQuerySemTwo = "SELECT * FROM results WHERE student_id = $studentId AND semester = 'Second Semester' AND class = '$class' OR class ='$class2' OR class ='$class3' ";
                        $resultResultSemTwo = mysqli_query($connection, $resultQuerySemTwo);
                        $row = mysqli_fetch_assoc($resultResultSemTwo);
                    if($row){
                        ?>
            <div class="bg-white w-[1050px] rounded-lg shadow-sm mt-10 p-6">
                <h2 class="text-md mb-2 text-gray-600 ">Semester Two Results (Class: JSH1)</h2>
                <table class="table w-[990px] ml-2">
                    <thead class="text-[12px] text-gray-400 text-left">
                        <tr>
                            <th>ID</th>
                            <th>STUDENT ID</th>
                            <th>YEAR</th>
                            <th>SUBJECT</th>
                            <th>MARKS</th>
                            <th>GRADE</th>
                            <th>Remarks</th>
                        </tr>
                    </thead>
                    <tbody class="text-[13px] text-gray-600">
                        <?php
                        $class = "JHS ONE A";
                        $class2 = "JHS ONE B";
                        $class3 = "JHS ONE C";
                        $resultQuerySemTwo = "SELECT * FROM results WHERE student_id = $studentId AND semester = 'Second Semester' AND class = '$class' OR class ='$class2' OR class ='$class3' ";
                        $resultResultSemTwo = mysqli_query($connection, $resultQuerySemTwo);
                        

                        while ($row = mysqli_fetch_assoc($resultResultSemTwo)) {
                            $grade = calculateGrade($row["marks"]);
                            $remark = calculateRemark($row["marks"]);
                            ?>
                        <tr>
                            <td><?php echo $row["id"]; ?></td>
                            <td><?php echo $row["student_id"]; ?></td>
                            <td><?php echo $row["year"]; ?></td>
                            <td><?php echo $row["sub_class"]; ?></td>
                            <td><?php echo $row["subject"]; ?></td>
                            <td><?php echo $row["marks"]; ?></td>
                            <td><?php echo $grade; ?></td>
                            <td><?php echo $remark; ?></td>
                        </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                </table>
            </div>
            <?php
                }
            ?>


            <!-- Student Results - Semester Two -->
            <?php
                        $class = "JHS TWO A";
                        $class2 = "JHS TWO B";
                        $class3 = "JHS TWO C";
                        $resultQuerySemTwo = "SELECT * FROM results WHERE student_id = $studentId AND semester = 'First Semester' AND class = '$class' OR class ='$class2' OR class ='$class3' ";
                        $resultResultSemTwo = mysqli_query($connection, $resultQuerySemTwo);
                        $row = mysqli_fetch_assoc($resultResultSemTwo);
                    if($row){
                        ?>
            <div class="bg-white w-[1050px] rounded-lg shadow-sm mt-10 p-6">
                <h2 class="text-md mb-2 text-gray-600 ">Semester One Results (Class: JSH2)</h2>
                <table class="table w-[990px] ml-2">
                    <thead class="text-[12px] text-gray-400 text-left">
                        <tr>
                            <th>ID</th>
                            <th>STUDENT ID</th>
                            <th>YEAR</th>
                            <th>SEMESTER</th>
                            <th>SUBJECT</th>
                            <th>MARKS</th>
                            <th>GRADE</th>
                            <th>Remarks</th>
                        </tr>
                    </thead>
                    <tbody class="text-[13px] text-gray-600">
                        <?php
                        $class = "JHS TWO A";
                        $class2 = "JHS TWO B";
                        $class3 = "JHS TWO C";
                        $resultQuerySemTwo = "SELECT * FROM results WHERE student_id = $studentId AND semester = 'First Semester' AND class = '$class' OR class ='$class2' OR class ='$class3' ";
                        $resultResultSemTwo = mysqli_query($connection, $resultQuerySemTwo);
                        

                        while ($row = mysqli_fetch_assoc($resultResultSemTwo)) {
                            $grade = calculateGrade($row["marks"]);
                            $remark = calculateRemark($row["marks"]);
                            ?>
                        <tr>
                            <td><?php echo $row["id"]; ?></td>
                            <td><?php echo $row["student_id"]; ?></td>
                            <td><?php echo $row["year"]; ?></td>
                            <td><?php echo $row["sub_class"]; ?></td>
                            <td><?php echo $row["subject"]; ?></td>
                            <td><?php echo $row["marks"]; ?></td>
                            <td><?php echo $grade; ?></td>
                            <td><?php echo $remark; ?></td>
                        </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                </table>
            </div>
            <?php
                }
            ?>

            <!-- Student Results - Semester Two -->
            <?php
                        $class = "JHS TWO A";
                        $class2 = "JHS TWO B";   
                        $class3 = "JHS TWO C";
                        $resultQuerySemTwo = "SELECT * FROM results WHERE student_id = $studentId AND semester = 'Second Semester' AND class = '$class' OR class ='$class2' OR class ='$class3' ";
                        $resultResultSemTwo = mysqli_query($connection, $resultQuerySemTwo);
                        $row = mysqli_fetch_assoc($resultResultSemTwo);
                    if($row){
                        ?>
            <div class="bg-white w-[1050px] rounded-lg shadow-sm mt-10 p-6">
                <h2 class="text-md mb-2 text-gray-600 ">Semester Two Results (Class: JSH2)</h2>
                <table class="table w-[990px] ml-2">
                    <thead class="text-[12px] text-gray-400 text-left">
                        <tr>
                            <th>ID</th>
                            <th>STUDENT ID</th>
                            <th>YEAR</th>
                            <th>SUBJECT</th>
                            <th>MARKS</th>
                            <th>GRADE</th>
                            <th>Remarks</th>
                        </tr>
                    </thead>
                    <tbody class="text-[13px] text-gray-600">
                        <?php
                        $class = "JHS TWO A";
                        $class2 = "JHS TWO B";
                        $class3 = "JHS TWO C";
                        $resultQuerySemTwo = "SELECT * FROM results WHERE student_id = $studentId AND semester = 'Second Semester' AND class = '$class' OR class ='$class2' OR class ='$class3' ";  
                        $resultResultSemTwo = mysqli_query($connection, $resultQuerySemTwo);
                        

                        while ($row = mysqli_fetch_assoc($resultResultSemTwo)) {
                            $grade = calculateGrade($row["marks"]);
                            $remark = calculateRemark($row["marks"]);
                            ?>
                        <tr>
                            <td><?php echo $row["id"]; ?></td>
                            <td><?php echo $row["student_id"]; ?></td>
                            <td><?php echo $row["year"]; ?></td>
                            <td><?php echo $row["sub_class"]; ?></td>
                            <td><?php echo $row["subject"]; ?></td>
                            <td><?php echo $row["marks"]; ?></td>
                            <td><?php echo $grade; ?></td>
                            <td><?php echo $remark; ?></td>
                        </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                </table>
            </div>
            <?php
                }
            ?>

            <!-- Student Results - Semester Two -->
            <?php
                        $class = "JHS THREE A";
                        $class2 = "JHS THREE B";
                        $class3 = "JHS THREE C";
                        $resultQuerySemTwo = "SELECT * FROM results WHERE student_id = $studentId AND semester = 'First Semester' AND class = '$class' OR class ='$class2' OR class ='$class3' ";
                        $resultResultSemTwo = mysqli_query($connection, $resultQuerySemTwo);
                        $row = mysqli_fetch_assoc($resultResultSemTwo);
                    if($row){
                        ?>
            <div class="bg-white w-[1050px] rounded-lg shadow-sm mt-10 p-6">
                <h2 class="text-md mb-2 text-gray-600 ">Semester Two Results (Class: JSH3)</h2>
                <table class="table w-[990px] ml-2">
                    <thead class="text-[12px] text-gray-400 text-left">
                        <tr>
                            <th>ID</th>
                            <th>STUDENT ID</th>
                            <th>YEAR</th>
                            <th>SEMESTER</th>
                            <th>SUBJECT</th>
                            <th>MARKS</th>
                            <th>GRADE</th>
                            <th>Remarks</th>
                        </tr>
                    </thead>
                    <tbody class="text-[13px] text-gray-600">
                        <?php
                        $class = "JHS THREE A";
                        $class2 = "JHS THREE B";
                        $class3 = "JHS THREE C";
                        $resultQuerySemTwo = "SELECT * FROM results WHERE student_id = $studentId AND semester = 'First Semester' AND class = '$class' OR class ='$class2' OR class ='$class3' ";
                        $resultResultSemTwo = mysqli_query($connection, $resultQuerySemTwo);
                        

                        while ($row = mysqli_fetch_assoc($resultResultSemTwo)) {
                            $grade = calculateGrade($row["marks"]);
                            $remark = calculateRemark($row["marks"]);
                            ?>
                        <tr>
                            <td><?php echo $row["id"]; ?></td>
                            <td><?php echo $row["student_id"]; ?></td>
                            <td><?php echo $row["year"]; ?></td>
                            <td><?php echo $row["sub_class"]; ?></td>
                            <td><?php echo $row["subject"]; ?></td>
                            <td><?php echo $row["marks"]; ?></td>
                            <td><?php echo $grade; ?></td>
                            <td><?php echo $remark; ?></td>
                        </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                </table>
            </div>
            <?php
                }
            ?>


            <!-- Student Results - Semester Two -->
            <?php
                        $class = "JHS THREE A";
                        $class2 = "JHS THREE B";
                        $class3 = "JHS THREE C";
                        $resultQuerySemTwo = "SELECT * FROM results WHERE student_id = $studentId AND semester = 'Second Semester' AND class = '$class' OR class ='$class2' OR class ='$class3' ";
                        $resultResultSemTwo = mysqli_query($connection, $resultQuerySemTwo);
                        $row = mysqli_fetch_assoc($resultResultSemTwo);
                    if($row){
                        ?>
            <div class="bg-white w-[1050px] rounded-lg shadow-sm mt-10 p-6">
                <h2 class="text-md mb-2 text-gray-600 ">Semester Two Results (Class: JSH3)</h2>
                <table class="table w-[990px] ml-2">
                    <thead class="text-[12px] text-gray-400 text-left">
                        <tr>
                            <th>ID</th>
                            <th>STUDENT ID</th>
                            <th>YEAR</th>
                            <th>SUBJECT</th>
                            <th>MARKS</th>
                            <th>GRADE</th>
                            <th>Remarks</th>
                        </tr>
                    </thead>
                    <tbody class="text-[13px] text-gray-600">
                        <?php
                        $class = "JHS THREE A";
                        $class2 = "JHS THREE B";
                        $class3 = "JHS THREE C";
                        $resultQuerySemTwo = "SELECT * FROM results WHERE student_id = $studentId AND semester = 'Second Semester' AND class = '$class' OR class ='$class2' OR class ='$class3' ";
                        $resultResultSemTwo = mysqli_query($connection, $resultQuerySemTwo);
                        

                        while ($row = mysqli_fetch_assoc($resultResultSemTwo)) {
                            $grade = calculateGrade($row["marks"]);
                            $remark = calculateRemark($row["marks"]);
                            ?>
                        <tr>
                            <td><?php echo $row["id"]; ?></td>
                            <td><?php echo $row["student_id"]; ?></td>
                            <td><?php echo $row["year"]; ?></td>
                            <td><?php echo $row["sub_class"]; ?></td>
                            <td><?php echo $row["subject"]; ?></td>
                            <td><?php echo $row["marks"]; ?></td>
                            <td><?php echo $grade; ?></td>
                            <td><?php echo $remark; ?></td>
                        </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                </table>
            </div>
            <?php
                }
            ?>

        </div>
    </div>
</body>

</html>