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
    <script src="../Assets/tailwind.js"></script>
</head> 

<body class="" style="font-family: poppins;">
    <!-- page contents -->
    <!-- page contents -->
    <div class="lg:grid lg:grid-cols-2">
        <!-- login image -->
        <div>
            <img class="lg:w-[50vw] lg:h-[100vh] mix-blend-normal" src="../images/africa.avif" alt="">
        </div>

        <div class="flex justify-center items-center">
            <form action="" method="post">
                <!-- login header -->
                <div class="text-center">
                    <p class="text-[24px] text-gray-500">ENTER YOUR EMAIL ADDRESS TO</p>
                    <P class="text-[24px] text-gray-500"> VERIFY YOUR IDENTITY</P>
                </div>

                <!-- email input field -->
                <div class="mt-10">
                    <input class="h-10 rounded-md outline-none w-80 bg-[#e9e3ff] p-2" name="email" type="text" placeholder="Enter email ">
                </div>

                <!-- submit button -->
                <div class="mt-6">
                    <input class="h-9 w-80 bg-[#8a70d6] rounded-md text-white text-[18px]" type="submit" value="SUBMIT" name="submit">
                </div>
            </form>
        </div>
    </div>
    
</body>

</html>
<?php

if (isset($_POST["submit"])) {
    // Retrieving data from the form
    $email = $_POST["email"];

    // Execute the query to check if email exists in the database
    $query = "SELECT * FROM registeration WHERE email='$email'";
    $statement = mysqli_query($connection, $query);
    $row = mysqli_fetch_array($statement);

    if (!empty($row)) {
        // Retrieve the phone number from the database
        $phone = $row['phone'];

        // Generate a verification code
        $verificationCode = generateVerificationCode();

        // Store the verification code in the session
        $_SESSION['verification_code'] = $verificationCode;

        // Send the verification SMS
        sendVerificationSMS($phone, $verificationCode);
    } else {
        echo "
           <script>
                alert('Email not found.');
                window.location.href='index.php';
           </script>
        ";
        exit;
    }
}

function generateVerificationCode()
{
    // Generate a random verification code (you can customize the code generation logic)
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $codeLength = 6;
    $verificationCode = '';

    for ($i = 0; $i < $codeLength; $i++) {
        $index = mt_rand(0, strlen($characters) - 1);
        $verificationCode .= $characters[$index];
    }

    return $verificationCode;
}

function sendVerificationSMS($phone, $verificationCode)
{
    // Message to be sent
    $message = "Please use the following verification code to reset your password: $verificationCode";


    //SMS API
    $key = "d97868cc69d36af20e76"; //your unique API key;
    $message = urlencode($message); //encode url;
    $sender_id = 'oppong';
    /*******************API URL FOR SENDING MESSAGES********/
    $url = "http://sms.smsnotifygh.com/smsapi?key=$key&to=$phone&msg=$message&sender_id=$sender_id";

    $result = file_get_contents($url); 

    if ($result) {
        echo "
           <script>
                alert('Verification code sent successfully.');
                window.location.href='verification.php';
           </script>    ";
       
    } else {
        echo "
           <script>
                alert('Verification code not sent.');
                window.location.href='confirm_email.php';
           </script>
        ";
    }
}
?>