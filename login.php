<!--include header-->
<?php require_once "includes/header.php"; ?>

<div class="mpf_wrapper container">

    <!-- LOGIN FORM -->

    <div class="row">

        <div class="col-md-12 text-center margin-top">
            <a class="mpf_btn btn-primary btn-blue" href="#"
               onclick="setActiveStyleSheet('blue'); return false;">Blue</a>
            <a class="mpf_btn btn-primary btn-red" href="#" onclick="setActiveStyleSheet('red'); return false;">Red</a>
            <a class="mpf_btn btn-primary btn-green" href="#" onclick="setActiveStyleSheet('green'); return false;">Green</a>
            <a class="mpf_btn btn-primary btn-purple" href="#" onclick="setActiveStyleSheet('purple'); return false;">Purple</a>
            <a class="mpf_btn btn-primary btn-orange" href="#" onclick="setActiveStyleSheet('orange'); return false;">Orange</a>
        </div>


        <div class="col-md-6 col-md-offset-3">
            <div class="panel panel-form">

                <div class="panel-heading">
                    <h2 class="title">LOGIN</h2>
                    <p>Don't have an account? <a href="index.php">Sign Up</a>.</p>
                </div>

                <div class="panel-body">
                    <form role="form" action="backend/profile.php" method="POST">

                        <div class="form-group">
                            <label class="control-label"><i class="fa fa-user"></i> Username / Email</label>
                            <input type="text" name="username" class="form-control" id="username"/>
                        </div>

                        <div class="form-group">
                            <label class="control-label"><i class="fa fa-lock"></i> Password</label>
                            <input type="password" name="password" class="form-control" id="password"/>
                        </div>

                        <div class="form-group">
                            <div class="checkbox">
                                <label class="option button">
                                    <input type="checkbox" id="remember" name="remember" value="remember"/>
                                    <span class="button-checkbox"></span>
                                </label>
                                <label>Remember Me</label>
                            </div>
                        </div>

                        <div class="form-group margin-top">
                            <input type="submit" name="login" value="Log In" class="mpf_btn btn-lg btn-primary"/>
                            <hr>
                            <p>Forgotten your password? <a href="#">Click here.</a></p>
                        </div>
                        <h4 style="color:red;"><?php
                            echo $_GET['message'] ?? '';
                            echo $_GET['inputCheck'] ?? '';
                            echo $_GET['emailverification'] ?? '';

                            ?></h4>
                    </form>
                </div>
            </div>
        </div>

    </div>

</div>

<!--include footer-->
<?php require_once "includes/footer.php"; ?>