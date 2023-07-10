<?php
session_start();

//database connection
$connection = mysqli_connect('localhost', 'root', '', 'management_class');

//deleting a row
if (isset($_GET["delete"])) {
    $delete = $_GET["delete"];
    //delete query
    $delete_query = mysqli_query($connection, "DELETE FROM teachers WHERE id ='$delete'");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <style>
        .active {
            background-color: #e9e3ff;
            height: 30px;
            border-radius: 5px;
            padding-left: 4px;
            padding-top: 2px;
        }
    </style>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Teachers Registeration</title>
    <!-- assets -->
    <!-- assets -->
    <link rel="stylesheet" href="../Assets/fonts/fonts.css">
    <link rel="stylesheet" href="../Assets/fontawesome/css/all.css">

    <!-- scripts -->
    <!-- scripts -->
    <script src="../Assets/tailwind.js"></script>
    <script src="../Assets/jquery-3.6.0.min.js"></script>
</head>

<body class=" h-[100vh]" style="font-family: poppins;">
    <div class="">
        <!-- side nav -->
        <!-- side nav -->
        <div class="w-[200px] h-[100vh] absolute ">
            <div class="p-8">
                <!-- logo -->
                <!-- logo -->
                <div class=" ">
                    <img class="h-20 w-20 rounded-full" src="../images/success-student-consulting_7109-29.avif" alt="">
                    <p></p>
                </div>
                <!-- nav links -->
                <!-- nav links -->
                <div class="mt-8">
                    <li class="list-none ">
                        <i class="fa-regular fa-house text-gray-500"></i><a class="ml-2 text-gray-500" href="admin1.php">Dashboard</a>
                    </li>
                    <li class="list-none mt-4">
                        <i class="fa-regular fa-briefcase text-gray-500"></i><a class="ml-2 text-gray-500" href="subjects.php">Subjects</a>
                    </li>
                    <li class="list-none mt-4 ">
                        <i class="fa-regular fa-person-chalkboard text-gray-500"></i><a class="ml-2 text-gray-500" href="">Teachers</a>
                    </li>
                    <li class="list-none mt-4">
                        <i class="fa-regular fa-briefcase text-gray-500"></i><a class="ml-2 text-gray-500" href="">Students</a>
                    </li>
                    <li class="list-none mt-4 active">
                        <i class="fa-regular fa-briefcase text-gray-500"></i><a class="ml-2 text-gray-500" href="parents_reg.php">Parents</a>
                    </li>
                    <!-- <li class="list-none mt-4">
                        <i class="fa-regular fa-briefcase text-gray-500"></i><a class="ml-2 text-gray-500" href="">User</a>
                    </li>
                    <li class="list-none mt-4">
                        <i class="fa-regular fa-square-poll-vertical text-gray-500"></i><a class="ml-2 text-gray-500" href="">Results</a>
                    </li>
                    <li class="list-none mt-4">
                        <i class="fa-regular fa-comment text-gray-500"></i><a class="ml-2 text-gray-500" href="">Chat</a>
                    </li>
                    <li class="list-none mt-4">
                        <i class="fa-regular fa-gear text-gray-500"></i><a class="ml-2 text-gray-500" href="">Settings</a>
                    </li> -->

                </div>
            </div>

            <!-- logout-->
            <!-- logout-->
            <form action="" method="post" onsubmit="return confirmLogout()">
                <div class="h-10 bg-[#8a70d6] bottom-0 fixed w-[200px] text-black p-2 flex">
                    <div>
                        <input class="h-10 bg-[#8a70d6] bottom-0 fixed text-white p-2 w-40 flex text-[20px]" type="submit" value="LOGOUT" name="logout">
                    </div>
                    <div class="ml-auto ">
                        <i class="fa-solid fa-right-from-bracket text-[22px]  text-blue-50"></i>
                    </div>
                </div>
            </form>
        </div>
        <!-- page content -->
        <!-- page content -->
        <div class=" ml-[210px] pt-6 pr-4">
            <div class="grid grid-cols-3">
                <div>
                    <p class="text-[25px]">Manage Parents</p>
                </div>
                <!-- search bar -->
                <!-- search bar -->
                <div class="-ml-10">
                    <form class="grid grid-cols-2 gap-10" action="" method="post">
                        <input type="search" onkeyup="mySearch()" id="myInput" placeholder="Enter id..." class="bg-[#e9e3ff] h-10 w-[200px] rounded-md pl-4 outline-none">
                        <input type="search" onkeyup="mySearch2()" id="myInput2" placeholder="Enter name..." class="bg-[#e9e3ff] h-10 w-[200px] rounded-md pl-4 outline-none">
                    </form>
                </div>
                <!-- add teacherg -->
                <!-- add teacher -->
                <a href="parents_add.php">
                    <div class="flex justify-center -ml-20">
                        <div class="h-10 w-10 bg-[#8a70d6] rounded-md flex justify-center items-center">
                            <i class="fa-solid fa-regular fa-plus text-white"></i>
                        </div>
                    </div>
                </a>
            </div>

            <div class="mt-20 ">
                <div class=" bg-gray-100 w-auto h-[544px] rounded-lg pt-10">
                    <table id="myTable" class="table w-[1100px] ml-2" id="container">
                        <thead class="p-2 bg-[#8a70d6] p w-[100px]">
                            <tr class="text-left h-10 text-blue-100">
                                <th>NAME</th>
                                <th>EMAIL</th>
                                <th>PHONE</th>
                                <th>ACTION</th>
                            </tr>
                        </thead>
                        <?php

                        // Selecting teachers detail from the database
                        $teacher_details = mysqli_query($connection, "SELECT * FROM parents ");
                        while ($row = mysqli_fetch_array($teacher_details)) {
                        ?>
                            <tbody>
                                <tr class="even:bg-[#e9e3ff] h-10">
                                    <td><?php echo $row["name"] ?></td>
                                    <td><?php echo $row["email"] ?></td>
                                    <td><?php echo $row["phone"] ?></td>
                                    <td>
                                        <?php
                                        echo '
                                            <div class="flex gap-2">
                                                <a href="teacher_reg.php?id=' . $row['id'] . '">
                                                <div class="bg-[#8a70d6] text-white w-8 text-center rounded-sm"><button><i class="fa fa-edit"></i></button></div>
                                            </a>
                                                <a href="teachers_reg.php?delete=' . $row['id'] . '">
                                                    <div class="bg-red-600 text-white w-8 text-center rounded-sm"><button onclick="return confirmDelete()"><i class="fa fa-trash"></i></button><div>
                                                </a>
                                            </div>
                                            ';
                                        ?>
                                    </td>
                                </tr>
                            </tbody>
                        <?php
                        }
                        ?>
                    </table>

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

    <!-- live search -->
    <script>
        function mySearch() {
            // Declare variables
            var input, filter, table, tr, td, i, txtValue;
            //getting the search input
            input = document.getElementById("myInput");
            //converting the input to upper case
            filter = input.value.toUpperCase();
            //getting the data in the table
            table = document.getElementById("myTable");
            tr = table.getElementsByTagName("tr");
            // Loop through all table rows, and hide those who don't match the search query
            // Loop through all table rows, and hide those who don't match the search query
            for (i = 0; i < tr.length; i++) {
                td = tr[i].getElementsByTagName("td")[0];
                if (td) {
                    txtValue = td.textContent || td.innerText;
                    if (txtValue.toUpperCase().indexOf(filter) > -1) {
                        tr[i].style.display = "";
                    } else {
                        tr[i].style.display = "none";
                    }
                }
            }
        }

        function mySearch2() {
            // Declare variables
            var input, filter, table, tr, td, i, txtValue;
            //getting the search input
            input = document.getElementById("myInput2");
            //converting the input to upper case
            filter = input.value.toUpperCase();
            //getting the data in the table
            table = document.getElementById("myTable");
            tr = table.getElementsByTagName("tr");
            // Loop through all table rows, and hide those who don't match the search query
            // Loop through all table rows, and hide those who don't match the search query
            for (i = 0; i < tr.length; i++) {
                td = tr[i].getElementsByTagName("td")[2];
                if (td) {
                    txtValue = td.textContent || td.innerText;
                    if (txtValue.toUpperCase().indexOf(filter) > -1) {
                        tr[i].style.display = "";
                    } else {
                        tr[i].style.display = "none";
                    }
                }
            }
        }
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

    //redirecting the user to the login page
    header("Location:index.php");
}
?>