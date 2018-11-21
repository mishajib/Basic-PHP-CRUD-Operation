<?php
include ('../includes/db.php');

$userId = $_GET['userId'] ?? "";

$sql = "SELECT * FROM profilesystemwithemailconfirmation WHERE id = '$userId'";

$userInfo = $db_connection->query($sql);

$user = $userInfo->fetch_assoc();



//check sign up button is clicked or not
if ($_POST['update'] ?? '') {

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
    $fullName = $firstname . ' ' . $lastname;


   //update data into database which are given by user input
    $sql = "UPDATE profilesystemwithemailconfirmation SET
                    firstname = '$firstname',
                    lastname = '$lastname',
                    username = '$username',
                    email = '$email',
                    phone = '$phone',
                    nid = '$nid',
                    gender = '$gender',
                    dateofbirth = '$dateOfBirth',
                    fullname = '$fullName',
                    image = '$photo'
                    WHERE id = '$userId'
                      ";
    //check query is execute or not
    if ($db_connection->query($sql) == TRUE) {
        header("location: user-list.php");
    }else{
        header("location: update.php?datainsertionfail=Data not Updated! Please Try Again!");
    }



}

?>


<!--include header-->
<?php require_once "includes/header.php"; ?>

<div class="mpf_wrapper container">

    <!-- REGISTRATION FORM -->

    <div class="row">

        <div class="col-md-12 text-center margin-top">
            <a class="mpf_btn btn-primary btn-blue" href="#"
               onclick="setActiveStyleSheet('blue'); return false;">Blue</a>
            <a class="mpf_btn btn-primary btn-red" href="#" onclick="setActiveStyleSheet('red'); return false;">Red</a>
            <a class="mpf_btn btn-primary btn-green" href="#" onclick="setActiveStyleSheet('green'); return false;">Green<a>
                    <a class="mpf_btn btn-primary btn-purple" href="#"
                       onclick="setActiveStyleSheet('purple'); return false;">Purple</a>
                    <a class="mpf_btn btn-primary btn-orange" href="#"
                       onclick="setActiveStyleSheet('orange'); return false;">Orange</a>
        </div>

        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-form">

                <div class="panel-heading">
                    <h2 class="title">UPDATE USER</h2>
                    <p>Already have an account? <a href="user-list.php">USER LIST</a>.</p>
                </div>

                <div class="panel-body">
                    <form role="form" id="registerForm" action="" method="POST" enctype="multipart/form-data">



                        <div class="form-group">
                            <label class="control-label"><i class="fa fa-user"></i> Username</label> <span
                                class="red">*</span>
                            <input type="text" name="userName" class="form-control" id="username" value="<?php echo $user['username'];?>"/>
                        </div>

                        <div class="form-group">
                            <label class="control-label"><i class="fa fa-envelope"></i> Email</label> <span class="red">*</span>
                            <input type="email" value="<?php echo $user['email'];?>" name="email" class="form-control" id="email"/>
                        </div>


                        <div class="row">

                            <div class="col-md-6">

                                <div class="form-group">
                                    <label class="control-label">First Name</label>
                                    <input type="text" name="firstName" class="form-control" value="<?php echo $user['firstname'];?>" id="name"/>

                                </div>

                            </div>

                            <div class="col-md-6">

                                <div class="form-group">
                                    <label class="control-label">Last Name</label>
                                    <input type="text" name="lastName" value="<?php echo $user['lastname'];?>" class="form-control" id="surname"/>
                                </div>

                            </div>

                        </div>

                        <div class="row">

                            <div class="col-md-6">

                                <div class="form-group">
                                    <label class="control-label">Gender</label>
                                    <input type="text" name="gender" value="<?php echo $user['gender'];?>" class="form-control" id="surname"/>

                                </div>

                            </div>

                            <div class="col-md-6">

                                <div class="form-group">
                                    <label class="control-label">Date of Birth</label>
                                    <input type="text"  value="<?php echo $user['dateofbirth'];?>" class="form-control" id="dob" placeholder="Dath Of Birth" name="date_of_birth">

                                </div>

                            </div>

                        </div>

                        <div class="row">

                            <div class="col-md-6">

                                <div class="form-group">
                                    <label class="control-label">Phone</label>
                                    <input type="text"  value="<?php echo $user['phone'];?>" name="phone" class="form-control" id="phone"/>

                                </div>

                            </div>

                            <div class="col-md-6">

                                <div class="form-group">
                                    <label class="control-label"><abbr title="National Identity Card">NID</abbr></label>
                                    <input type="text" value="<?php echo $user['nid'];?>" name="nid" class="form-control" id="nid"/>

                                </div>

                            </div>

                        </div>

                        <div class="form-group margin-top">
                            <input type="submit" name="update" class="mpf_btn btn-lg btn-primary" value="UPDATE"/>

                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>

</div>

<!--include footer-->
<?php require_once "includes/footer.php"; ?>
