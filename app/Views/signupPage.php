<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script> 
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="<?= base_url('css/signup.css') ?>">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Sofia">

    <!-- Alertify -->
    <script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css"/>
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/default.min.css"/>
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/semantic.min.css"/>
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/bootstrap.min.css"/>
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.rtl.min.css"/>
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/default.rtl.min.css"/>
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/semantic.rtl.min.css"/>
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/bootstrap.rtl.min.css"/>

</head>
<body>
    <div class="container-fluid">
        <!-- Menu row -->
        <div class="row menu-row">
            <div class="col-sm-12 col-md-5">
                <img src="<?= base_url('landing_images/logo.jpg') ?>" alt="Logo Image" height="20%" width="20%" id="logo">
            </div>
            <div class="col-sm-12 col-md-7">
                <ul> 
                    <li> <a href="<?= base_url('signinPage') ?>"> <i class="fa fa-sign-in" aria-hidden="true"></i> Sign In </a></li>
                </ul>
            </div>
        </div>

        <!-- Main content row -->
        <div class="row signup-row">
            <div class="col-sm-12 col-md-5 signup_message">
                <h1> Sign Up !</h1>
                <span style="color: #FF7F00; font-size: 16px;"> Sign up and shop with WeDRESS </span>
            </div>
            <div class="col-sm-12 col-md-7 signup-column">
                <form action="<?= base_url('userSignup') ?>" method="POST">
                    <div>
                        <input type="text" name="fname" placeholder="Enter your First Name">
                    </div>
                    <div>
                        <input type="text" name="lname" placeholder="Enter your Last Name">
                    </div>
                    <div>
                        <input type="text" name="email" placeholder="Enter your Email">
                    </div>
                    <div>
                        <input type="password" name="password" placeholder="Enter your Password">
                    </div>
                    <div>
                        <input type="password" name="confpassword" placeholder="Confirm your Password">
                    </div>
                    <div>
                        <select name="gender" id="gender_select">
                            <option value="">-- Select Gender --</option>
                            <option value="Male"> Male </option>
                            <option value="Female"> Female </option>
                            <option value="Prefer Not To Say"> Prefer Not To Say</option>
                        </select>
                    </div>
                    <div>
                        <select name="role" id="role_select">
                            <option value="">-- Choose role --</option>
                            <option value="User"> User </option>
                            <option value="Admin"> Admin </option>
                        </select>
                    </div> <br> <br>
                    <button type="submit" id="signup_button"> Sign Up</button>
                </form>
            </div>
        </div> <hr>
    </div>
</body>
</html>
