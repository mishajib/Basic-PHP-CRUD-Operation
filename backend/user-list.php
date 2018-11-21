<?php
require_once('../includes/db.php');
$sql = "SELECT * FROM profilesystemwithemailconfirmation";

$query = $db_connection->query($sql);
?>

<?php require_once "includes/header.php"; ?>

<div class="mpf_wrapper container">

    <!-- REGISTRATION FORM -->

    <div class="row">

        <div class="col-md-12 text-center margin-top">
            <a class="mpf_btn btn-primary btn-blue" href="#"
               onclick="setActiveStyleSheet('blue'); return false;">Blue</a>
            <a class="mpf_btn btn-primary btn-red" href="#" onclick="setActiveStyleSheet('red'); return false;">Red</a>
            <a class="mpf_btn btn-primary btn-green" href="#" onclick="setActiveStyleSheet('green'); return false;">Green</a>
            <a class="mpf_btn btn-primary btn-purple" href="#" onclick="setActiveStyleSheet('purple'); return false;">Purple</a>
            <a class="mpf_btn btn-primary btn-orange" href="#" onclick="setActiveStyleSheet('orange'); return false;">Orange</a>
        </div>

        <div class="col-md-12 col-lg-12">
            <div class="panel panel-form">

                <div class="panel-heading">
                    <h2 class="title">User Information</h2>
                </div>

                <div class="panel-body">

                    <table class="table">
                        <thead class="thead-dark">
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">First Name</th>
                            <th scope="col">Last Name</th>
                            <th scope="col">Full Name</th>
                            <th scope="col">User Name</th>
                            <th scope="col">Email</th>
                            <th scope="col">Phone</th>
                            <th scope="col">Date Of Birth</th>
                            <th scope="col">NID</th>
                            <th scope="col">Gender</th>
                            <th scope="col">PHOTO</th>
                            <th scope="col">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        if ($query->num_rows > 0) {
                            while ($row = $query->fetch_assoc()) {

                                ?>
                                <tr>
                                    <th scope="row"><?php echo $row['id'] ?></th>
                                    <td><?php echo $row['firstname'] ?></td>
                                    <td><?php echo $row['lastname'] ?></td>
                                    <td><?php echo $row['fullname'] ?></td>
                                    <td><?php echo $row['username'] ?></td>
                                    <td><?php echo $row['email'] ?></td>
                                    <td><?php echo $row['phone'] ?></td>
                                    <td><?php echo $row['dateofbirth'] ?></td>
                                    <td><?php echo $row['nid'] ?></td>
                                    <td><?php echo $row['gender'] ?></td>
                                    <td><?php echo $row['image'] ?></td>
                                    <td><a href="dbuserProfile.php?userId=<?php echo $row['id'];?>">User Details</a> | <a href="update.php?userId=<?php echo $row['id'];?>">Edit</a> | <a href="../includes/delete.php?userId=<?php echo $row['id'];?>">Delete</a></td>
                                </tr>
                                <?php
                            }
                        }
                        ?>
                        </tbody>
                    </table>


                </div>

            </div>
        </div>

    <script type="application/javascript">
        alert("<?php echo $_GET['datainsertSuccess']; ?>")


    </script>

<?php require_once "includes/footer.php"; ?>