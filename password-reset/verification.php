<?php
session_start();

// Check if the verification code exists in the session
if (isset($_SESSION['verification_code'])) {
    $verificationCode = $_SESSION['verification_code'];

    if (isset($_POST['submit'])) {
        $enteredCode = $_POST['verification_code'];

        // Check if the entered code matches the stored verification code
        if ($enteredCode === $verificationCode) {
            // Verification successful
            // You can redirect the user to a password reset page or any other desired action
            echo "
                <script>
                    alert('Verification successful!');
                    window.location.href = 'new_pasword.php';
                </script>
            ";
        } else {
            // Verification failed
            echo "
                <script>
                    alert('Incorrect verification code. Please try again.');
                    window.location.href = 'verification.php';
                </script>
            ";
        }
    }
} else {
    // Verification code not found in the session
    echo "
        <script>
            alert('Verification code not found. Please try again.');
            window.location.href = 'index.php';
        </script>
    ";
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verification</title>
    <!-- assets -->
    <!-- assets -->
    <link rel="stylesheet" href="../Assets/fonts/fonts.css">
    <link rel="stylesheet" href="../Assets/fontawesome/css/all.css">

     <!-- scripts -->
    <!-- scripts -->
    <script src="../Assets/tailwind.js"></script>
</head>

<body class="" style="font-family: poppins;">
    <!-- page contents -->
    <!-- page contents -->
    <divclass= class="lg:grid lg:grid-cols-2">
        <!-- login image -->
        <div>
            <img class="lg:w-[50vw] lg:h-[100vh] mix-blend-normal" src="../images/africa.avif" alt="">
        </div>
        <div  class="flex justify-center items-center">
            <form action="" method="post">
                <div class="text-center mb-6">
                    <p class="text-[24px] text-gray-500">Enter Verification Code</p>
                </div>

                <div class="mt-4">
                    <input class="h-10 rounded-md outline-none w-80 bg-[#e9e3ff] p-2" type="text" name="verification_code" placeholder="Verification Code" required>
                </div>

                <div class="mt-6">
                    <input class="h-9 w-80 bg-[#8a70d6] rounded-md text-white text-[18px]" type="submit" name="submit" value="Verify">
                </div>
            </form>
        </div>
    </divclass=>
   
</body>

</html>
