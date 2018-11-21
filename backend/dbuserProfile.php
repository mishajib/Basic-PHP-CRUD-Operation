<?php
include ('../includes/db.php');

$userId = $_GET['userId'] ?? "";

$sql = "SELECT * FROM profilesystemwithemailconfirmation WHERE id = '$userId'";

$userInfo = $db_connection->query($sql);

$user = $userInfo->fetch_assoc();

?>
<!--include header-->
<?php require_once "includes/header.php"; ?>

<div class="mpf_wrapper container">



    <div class="row">

        <div class="col-md-12 text-center margin-top">
            <a class="mpf_btn btn-primary btn-blue" href="#" onclick="setActiveStyleSheet('blue'); return false;">Blue</a>
            <a class="mpf_btn btn-primary btn-red" href="#" onclick="setActiveStyleSheet('red'); return false;">Red</a>
            <a class="mpf_btn btn-primary btn-green" href="#" onclick="setActiveStyleSheet('green'); return false;">Green</a>
            <a class="mpf_btn btn-primary btn-purple" href="#" onclick="setActiveStyleSheet('purple'); return false;">Purple</a>
            <a class="mpf_btn btn-primary btn-orange" href="#" onclick="setActiveStyleSheet('orange'); return false;">Orange</a>
        </div>

        <div class="col-md-6">
            <?php
            $image = $user['image'];
            echo "<img src='$image' height='250' width='250' alt='profile' class='rounded-0 img-responsive img-thumbnail'/>";
            ?>
            <!--<img src="" height="250" width="250" alt="profile" class="rounded-0 img-responsive img-thumbnail">-->
        </div>
        <div class="col-md-6 col-md-pull-3">
            <div class="panel panel-form">

                <div class="panel-heading">
                    <h2 class="title">User Profile</h2>
                    <p class="text-right"><a href="../login.php">Log Out</a></p>
                    <p class="text-left"><a href="user-list.php">Show User List</a></p>
                </div>

                <div class="panel-body">
                    <table>
                        <tr>
                            <td><h3><b>First Name:</b></h3><h4><?php echo $user['firstname'];?></h4></td>
                        </tr>

                        <tr>
                            <td><h3><b>Last Name:</b></h3><h4><?php echo $user['lastname'];?></h4></td>
                        </tr>

                        <tr>
                            <td><h3><b>Full Name:</b></h3><h4><?php echo $user['fullname'];?></h4></td>
                        </tr>

                        <tr>
                            <td><h3><b>User Name:</b></h3><h4><?php echo $user['username'];?></h4></td>
                        </tr>

                        <tr>
                            <td><h3><b>Email:</b></h3><h4><?php echo $user['email'];?></h4></td>
                        </tr>

                        <tr>
                            <td><h3><b>Phone Number:</b></h3><h4><?php echo $user['phone'];?></h4></td>
                        </tr>

                        <tr>
                            <td><h3><b>Year Of Birth:</b></h3><h4><?php echo $user['dateofbirth'];?></h4></td>
                        </tr>

                        <tr>
                            <td><h3><b><abbr title="National Identity Card">NID:</abbr></b></h3><h4><?php echo $user['nid'];?></h4></td>
                        </tr>

                        <tr>
                            <td><h3><b>Gender:</b></h3><h4><?php echo $user['gender'];?></h4></td>
                        </tr>
                    </table>

                </div>


            </div>
        </div>



<?php require_once "includes/footer.php"; ?>