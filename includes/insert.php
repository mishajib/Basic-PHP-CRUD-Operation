<?php
//Add db.php file (Code Reuse)
require_once('db.php');


use PHPMailer\PHPMailer\PHPMailer;

//check sign up button is clicked or not
if ($_POST['submit'] ?? '' == "SIGN UP") {

    //create input validation for special characters escape
    function fvalidate($data)
    {
        $data = trim($data);
        $data = stripcslashes($data);
        $data = htmlspecialchars($data);

        return $data;
    }

    //get input from the input file by POST method
    $firstname = fvalidate($db_connection->real_escape_string($_POST['firstName']));
    $lastname = fvalidate($db_connection->real_escape_string($_POST['lastName']));
    $email = fvalidate($db_connection->real_escape_string($_POST['email']));
    $username = fvalidate($db_connection->real_escape_string($_POST['userName']));
    $phone = fvalidate($db_connection->real_escape_string($_POST['phone']));
    $nid = fvalidate($db_connection->real_escape_string($_POST['nid']));
    $gender = fvalidate($db_connection->real_escape_string($_POST['gender'] ?? ''));
    $dateOfBirth = fvalidate($db_connection->real_escape_string($_POST['date_of_birth']));
    $password = fvalidate($db_connection->real_escape_string($_POST['password']));
    $fullName = $firstname . ' ' . $lastname;

    //check password & confirm password are matched or not
    if ($_POST['cpassword'] != $password) {
        header("location: ../index.php?passMatch=Password Not Matched");
    } else {
        $cpassword = fvalidate($_POST['cpassword']);
    }

//    The image section Start
//    get image input from file input form
    $fname = fvalidate($_FILES['profilePhoto']['name'] ?? '');
    $ftype = $_FILES['profilePhoto']['type'] ?? '';
    $ftmp_name = $_FILES['profilePhoto']['tmp_name'] ?? '';
    $ferror = $_FILES['profilePhoto']['error'] ?? '';
    $fsize = $_FILES['profilePhoto']['size'] ?? '';
    $fileExt = explode(".", $fname);
    $ActExt = end($fileExt);

    //define picture format for image upload
    $allowedExt = ['png', 'jpg', 'jpeg', 'gif'];

    //check image extensions which are define in array
    if (in_array($ActExt, $allowedExt) && $ferror == 0) {
        $uploadLocation = '../uploads/';
        $uniquePhoto = time() . $fname;
        $photo = $uploadLocation . $uniquePhoto;
        move_uploaded_file($ftmp_name, $photo);

        $validImg = true;

    } else {
        $invalidImg = false;
    }
//    The image section end

    //check input fields are empty or not
    if (empty($firstname) || empty($lastname)
        || empty($username) || empty($email)
        || empty($phone) || empty($nid)
        || empty($gender) || empty($dateOfBirth)
        || empty($password) || empty($cpassword)
        || empty($fname) || empty($fullName)) {

        //create redirection
        header("location: ../index.php?errMsg=Please Check Input Field");
    } else {
        //check database for user is exist or not
        $sqlCheck = $db_connection->query("SELECT id FROM profilesystemwithemailconfirmation WHERE email='$email' OR username='$username'");
        if ($sqlCheck->num_rows > 0) {
            header("location: ../login.php?message=This email account already Available");
        } else {
            //create token for email confirmation
            $token = 'qwertzuiopasdfghjklyxcvbnmQWERTZUIOPASDFGHJKLYXCVBNM0123456789!$/()*';
            $token = str_shuffle($token);
            $token = substr($token, 0, 10);
            //create hashed password from input password
            $hashedPassword = password_hash($password, PASSWORD_BCRYPT);

            //insert data into database which are given by user input
            $sql = "INSERT INTO profilesystemwithemailconfirmation
                      (
                              firstname,
                              lastname,
                              fullname,
                              username,
                              email,
                              phone,
                              nid,
                              gender,
                              dateofbirth,
                              passwords,
                              image,
                              isEmailConfirmed,
                              token
                      ) 
                      VALUES 
                      (
                              '$firstname',
                              '$lastname',
                              '$fullName',
                              '$username',
                              '$email',
                              '$phone',
                              '$nid',
                              '$gender',
                              '$dateOfBirth',
                              '$hashedPassword',
                              '$photo',
                              '0',
                              '$token'                      
                      )";
            //check query is execute or not
            if ($db_connection->query($sql) == TRUE) {
                echo "";
            } else {
                header("location: ../index.php?datainsertionfail=Data not Inserted! Please Try Again!");
            }
            //check email field is empty or not
            if (!empty($email)) {
                //include phpmailer
                include_once "PHPMailer/PHPMailer.php";

//                create phpmailer object
                $mail = new PHPMailer();

                //set sender mail
                $mail->setFrom('info@mi-shajib.com');

                //set receiver mail from input field
                $mail->addAddress($email, $fullName);
                //define subject for email verification
                $mail->Subject = "Please Verify Email!";
                //permission for html tag in email
                $mail->isHTML(true);

                //create email body with phpmailer
                $mail->Body = "
                        Please click on the link below:<br><br>
                    
                    <a href='https://www.mi-shajib.com/registration/includes/confirm.php?email=$email&token=$token'>Click Here</a>
                    ";

//                check mail is sent or not
                if ($mail->send()) {
                    header("location: ../index.php?mailsend=You have been registered! Please verify your email!");
                } else {
                    header("location: ../index.php?mailsendfail=Something wrong happened! Please try again!");
                }
            }

        }
    }


}