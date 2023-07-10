<?php
session_start();

//database connection
$connection = mysqli_connect('localhost', 'root', '', 'management_class');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>INDEX || LOGIN</title>
    <!-- assets -->
    <!-- assets -->
    <link rel="stylesheet" href="../Assets/fonts/fonts.css">
    <link rel="stylesheet" href="../Assets/fontawesome/css/all.css">

    <!-- scripts -->
    <!-- scripts -->
    <script src="../Assets/tailwind.js"></script>
    <script src="../Assets/jquery-3.6.0.min.js"></script>
</head>

<body class=" " style="font-family: poppins;">
    <!-- page contents -->
    <!-- page contents -->
    <div class="lg:grid lg:grid-cols-2">
        <!-- login image -->
        <div>
            <img class="lg:w-[50vw] lg:h-[100vh] mix-blend-normal" src="../images/africa.avif" alt="">
        </div>

        <div class="flex justify-center items-center">
            <form action="" onsubmit="return confirmLogout()" method="post">
                <!-- login header -->
                <div class="text-center">
                    <p class="text-[30px] text-gray-500">RESET PASSWORD</p>
                </div>
                

               <!-- password input field -->
               <div class="mt-4 flex">
                    <div>
                        <label class="text-[18px]" for="password"></label><br>
                        <input id="password" class="h-10 rounded-md outline-none w-80 bg-[#e9e3ff] p-2" name="password" type="password" placeholder="Enter password">
                    </div>
                    <div>
                        <p onclick="showPassword()">
                            <i id="icon" class="fa-regular fa-eye -ml-6 mt-10"></i>
                        </p>
                    </div>
                </div>

                <!-- password input field -->
                <div class="mt-4 flex">
                    <div>
                        <label class="text-[18px]" for="password"></label><br>
                        <input id="confirmPassword" class="h-10 rounded-md outline-none w-80 bg-[#e9e3ff] p-2" name="password2" type="password" placeholder="Confirm password">
                    </div>
                    <div>
                        <p onclick="show()">
                            <i id="icon2" class="fa-regular fa-eye -ml-6 mt-10"></i>
                        </p>
                    </div>
                </div><br>

                <!-- submit button -->
                <div class="mt-6">
                    <input class="h-9 w-80 bg-[#8a70d6] rounded-md text-white text-[18px]" type="submit" value="RESET" name="login">
                </div>
            </form>
        </div>
    </div>
    
    <script>
        function showPassword() {
            var passwordField = document.getElementById("password");
            var toggleIcon = document.getElementById("icon");
            if (passwordField.type === "password") {
                passwordField.type = "text"
                toggleIcon.classList.remove("fa-eye");
                toggleIcon.classList.add("fa-eye-slash");
            } else {
                passwordField.type = "password"
                toggleIcon.classList.remove("fa-eye-slash");
                toggleIcon.classList.add("fa-eye");
            }
        }
        function show() {
            var passwordField = document.getElementById("confirmPassword");
            var toggleIcon = document.getElementById("icon2");
            if (passwordField.type === "password") {
                passwordField.type = "text"
                toggleIcon.classList.remove("fa-eye");
                toggleIcon.classList.add("fa-eye-slash");
            } else {
                passwordField.type = "password"
                toggleIcon.classList.remove("fa-eye-slash");
                toggleIcon.classList.add("fa-eye");
            }
        }

    </script>
    <script>
        function confirmLogout() {
            return confirm("Are you sure you want to change your password?");
        }
    </script>
</body>

</html>
<?php
if (isset($_POST["login"])) {
    //retrieving data from the database
    $password = $_POST["password"];
    $password2 = $_POST["password2"];
    
    if($password === $password2) {
        $email = $_SESSION['email'];
        $update = mysqli_query($connection, "UPDATE registeration SET password='$password' WHERE email ='$email'");
        if($update){
            echo "
        <script>
            alert('Password updated successful');
            window.location.href = 'index.php';
        </script>
        ";
        }
    } else {
        echo "
        <script>
            alert('Password does not match');
            window.location.href = 'new_pasword.php';
        </script>
        ";
    }
    

   
}
?>