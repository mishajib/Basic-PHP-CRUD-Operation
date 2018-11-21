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
                    <h2 class="title">REGISTRATION</h2>
                    <p>Already have an account? <a href="login.php">Sign In</a>.</p>
                </div>

                <div class="panel-body">
                    <form role="form" id="registerForm" action="includes/insert.php" method="POST" enctype="multipart/form-data">

                        <span class="red">*<?php
                            echo $_GET['errMsg'] ?? '';
                            echo $_GET['passMatch'] ?? '';
                            echo $_GET['mailsendfail'] ?? '';
                            echo $_GET['datainsertionfail'] ?? '';
                            ?></span>
                        <span style="color: green;"><?php echo $_GET['mailsend'] ?? '';?></span>
                        <div class="form-group">
                            <label class="control-label"><i class="fa fa-user"></i> Username</label> <span
                                    class="red">*</span>
                            <input type="text" name="userName" class="form-control" id="username"/>
                        </div>

                        <div class="form-group">
                            <label class="control-label"><i class="fa fa-envelope"></i> Email</label> <span class="red">*</span>
                            <input type="email" name="email" class="form-control" id="email"/>
                        </div>


                        <div class="row">

                            <div class="col-md-6">

                                <div class="form-group">
                                    <label class="control-label">First Name</label>
                                    <input type="text" name="firstName" class="form-control" id="name"/>

                                </div>

                            </div>

                            <div class="col-md-6">

                                <div class="form-group">
                                    <label class="control-label">Last Name</label>
                                    <input type="text" name="lastName" class="form-control" id="surname"/>
                                </div>

                            </div>

                        </div>

                        <div class="row">

                            <div class="col-md-6">

                                <div class="form-group">
                                    <label class="control-label">Gender</label>
                                    <select name="gender" class="form-control">
                                        <option value="0" selected disabled>Gender</option>
                                        <option value="Male">Male</option>
                                        <option value="Female">Female</option>
                                        <option value="Other">Other</option>
                                    </select>

                                </div>

                            </div>

                            <div class="col-md-6">

                                <div class="form-group">
                                    <label class="control-label">Date of Birth</label>
                                    <input type="date" class="form-control" id="dob" placeholder="Dath Of Birth" name="date_of_birth">

                                </div>

                            </div>

                        </div>

                        <div class="row">

                            <div class="col-md-6">

                                <div class="form-group">
                                    <label class="control-label">Phone</label>
                                    <input type="text" name="phone" class="form-control" id="phone"/>

                                </div>

                            </div>

                            <div class="col-md-6">

                                <div class="form-group">
                                    <label class="control-label"><abbr title="National Identity Card">NID</abbr></label>
                                    <input type="text" name="nid" class="form-control" id="nid"/>

                                </div>

                            </div>

                        </div>

                        <div class="row">

                            <div class="col-md-6">

                                <div class="form-group">
                                    <label class="control-label"><i class="fa fa-lock"></i> Password</label> <span class="red">*</span>
                                    <input type="password" name="password" class="form-control" id="password" />
                                </div>

                            </div>

                            <div class="col-md-6">

                                <div class="form-group">
                                    <label class="control-label"><i class="fa fa-lock"></i> Confirm Password</label> <span class="red">*</span>
                                    <input type="password" name="cpassword" class="form-control" id="password2" />
                                </div>

                            </div>

                        </div>

                        <div class="form-group">
                            <label class="control-label">Profile Picture</label>
                            <input type="file" name="profilePhoto" class="form-control" id="profile_picture"/>
                        </div>

                        <div class="form-group">
                            <div class="checkbox">
                                    <input type="checkbox" id="remember" name="tos" value="remember"/>

                                <label>I have read and approved <a href="#">Terms & Condition</a>.</label>
                            </div>
                        </div>


                        <div class="form-group margin-top">
                            <input type="submit" name="submit" class="mpf_btn btn-lg btn-primary" value="SIGN UP"/>

                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>

</div>

<!--include footer-->
<?php require_once "includes/footer.php"; ?>
