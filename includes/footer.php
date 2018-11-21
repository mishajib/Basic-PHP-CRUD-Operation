<!-- COLOR SWITCHER -->
<script type="text/javascript" src="assets/js/styleswitcher.js"></script>
<script src="assets/https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.17.0/jquery.validate.min.js"></script>
<script type="text/javascript">
    $(document).ready(function () {
        $("#registerForm").validate({
            rules: {
                userName: {
                    required: true,
                    minlength: 4
                },
                email: {
                    required: true,
                    email: true
                },
                firstName: {
                    required: true
                },
                lastName: {
                    required: true
                },
                gender: {
                    required: true
                },
                date_of_birth: {
                    required: true
                },
                phone: {
                    required: true,
                    minlength: 11
                },
                nid: {
                    required: true
                },
                password: {
                    required: true,
                    minlength: 6
                },
                cpassword: {
                    required: true,
                    equalTo: "#password"
                },
                profilePhoto: {
                    required: true
                },
                tos: {
                    required: true
                }
            },
            messages: {
                userName: {
                    required: "*User Name is Required"
                },
                email: {
                    required: "*Email is Required",
                    email: "*Please Enter Valid Email"
                },
                firstName: {
                    required: "*First Name is Required"
                },
                lastName: {
                    required: "*Last Name is Required"
                },
                gender: {
                    required: "*Gender is Required"
                },
                date_of_birth: {
                    required: "*Date of Birth is Required"
                },
                phone: {
                    required: "*Phone Number is Required",
                    minlength: "Please Enter Phone Number at Least 11 character Long"
                },
                nid: {
                    required: "*Nid is Required"
                },
                password: {
                    required: "*Password is Required",
                    minlength: "Please Enter a Password 6 character Long"
                },
                cpassword: {
                    required: "*Confirm Password is Required",
                    equalTo: "Password Not Match"
                },
                profilePhoto: {
                    required: "*Please Select Profile Picture"
                },
                tos: {
                    required: "Please Check Terms of Services"
                }

            }
        });
    });

</script>
</body>
</html>