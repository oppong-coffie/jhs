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
$email = $_SESSION['email'];
$query = "SELECT id FROM parents WHERE email = '$email'";
$result = mysqli_query($connection, $query);
$row = mysqli_fetch_assoc($result);
$parentId = $row['id'];

// Query to retrieve student IDs associated with the parent
$studentQuery = "SELECT id FROM student WHERE parent_id = $parentId";
$studentResult = mysqli_query($connection, $studentQuery);

// Array to store the student results
$studentResults = [];

// Fetch the results for each student
while ($studentRow = mysqli_fetch_assoc($studentResult)) {
    $studentId = $studentRow['id'];

    // Query to retrieve the results of the student for each semester
    $resultQuery = "SELECT * FROM results WHERE student_id = $studentId";
    $resultResult = mysqli_query($connection, $resultQuery);

    // Fetch and store the results in the array
    while ($resultRow = mysqli_fetch_assoc($resultResult)) {
        $studentResults[] = $resultRow;
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PARENT DASHBOARD</title>
    <!-- assets -->
    <link rel="stylesheet" href="../Assets/fontawesome/css/all.css">
    <script src="../Assets/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="../css/parent.css">
</head>

<body class="h-[100vh] bg-gray-300">
    <div class="container">
        <!-- Header -->
        <header>
            <h1>Parent Dashboard</h1>
            <div class="logout">
                <form action="logout.php" method="post">
                    <button type="submit" name="logout" onclick="return confirmLogout()">Logout</button>
                </form>
            </div>
        </header>

        <!-- Student Results -->
        <section class="results">
            <h2>Student Results</h2>
            <?php if (!empty($studentResults)) { ?>
                <table>
                    <thead>
                        <tr>
                            <th>Student ID</th>
                            <th>Year</th>
                            <th>Semester</th>
                            <th>Subject</th>
                            <th>Grade</th>
                            <th>Remarks</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($studentResults as $result) { ?>
                            <tr>
                                <td><?php echo $result['student_id']; ?></td>
                                <td><?php echo $result['year']; ?></td>
                                <td><?php echo $result['semester']; ?></td>
                                <td><?php echo $result['subject']; ?></td>
                                <td><?php echo $result['grade']; ?></td>
                                <td><?php echo $result['remarks']; ?></td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            <?php } else { ?>
                <p>No results found.</p>
            <?php } ?>
        </section>
    </div>

    <!-- Confirm before logout -->
    <script>
        function confirmLogout() {
            return confirm("Are you sure you want to logout?");
        }
    </script>
</body>

</html>
