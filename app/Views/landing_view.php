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
    <link rel="stylesheet" href="<?= base_url('css/landing.css') ?>">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css">

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
                    <li> <a href=""> <i class="fa fa-times" aria-hidden="true"></i> Exit </a> </li>
                    <li> <a href="<?= base_url('apiHomePage') ?>"> <i class="fa fa-times" aria-hidden="true"></i> API Documentation </a> </li>
                    <li> <a href=""> <i class="fa fa-phone" aria-hidden="true"></i> Contact </a></li>
                    <li> <a href=""> <i class="fa fa-question" aria-hidden="true"></i> About </a> </li>
                    <li> <a href="<?= base_url('signinPage') ?>">  <i class="fa fa-sign-in" aria-hidden="true"></i>Sign In </a></li>
                    <li> <a href="<?= base_url('signupPage') ?>"> <i class="fa fa-user-plus" aria-hidden="true"></i> Sign Up</a></li>
                </ul>
            </div>
        </div>

        <!-- Main content row -->
        <div class="row welcome-row">
            <div class="col-sm-12 col-md-5 welcome_message">
                <h1> Welcome to WeDRESS !</h1>
                <span style="color: #FF7F00; font-size: 16px;"> Start your shopping journey here ! </span>
            </div>
            <div class="col-sm-12 col-md-7">
                <img src="<?= base_url('landing_images/main_image.jpg') ?>" alt="" width="100%" height="40%">
            </div>
        </div> <hr>

        <!-- Products -->
        <div class="row product-row">
            <div style="font-family: Sofia, sans-serif; font-size:18px; background-color: #273c75; margin-right: 75%; margin-left:2%; padding: 2%; color:white;"> Our products...</div>
            <br>
            <div class="col-sm-12 col-md-4">
                <span style="color:white;"> Men </span> <br> <br> 
                <img src="<?= base_url("landing_images/men_image.jpg") ?>" alt="Men clothes" height=50% width=100% style="border-radius:20%;"> <br> <br>
                <span style="color: #dcdde1; font-size: 16px; font-family: Sofia; float: right;"> We have a variety of men clothes just for you. <br> Sign up and explore them ! </span>
            </div>

            <div class="col-sm-12 col-md-4">
                <span style="color:white;"> Women </span> <br> <br> 
                <img src="<?= base_url("landing_images/women_image.jpg") ?>" alt="Men clothes" height=50% width=100% style="border-radius:20%;"> <br> <br>
                <span style="color: #dcdde1; font-size: 16px; font-family: Sofia; float: right;"> We have a variety of women clothes just for you. <br> Sign up and explore them ! </span>
            </div>

            <div class="col-sm-12 col-md-4">
                <span style="color:white;"> Pets </span> <br> <br> 
                <img src="<?= base_url("landing_images/pets_image.jpg") ?>" alt="Men clothes" height=50% width=100% style="border-radius:20%;"> <br> <br>
                <span style="color: #dcdde1; font-size: 16px; font-family: Sofia; float: right;"> We have a variety of pets clothes just for you. <br> Sign up and explore them ! </span>
            </div>
        </div> <hr>

        <!-- What people say about us... -->
        <div class="row people-row">
            <div style="font-family: Sofia, sans-serif; font-size:18px; background-color: green; margin-right: 75%; margin-left:2%; padding: 2%; color:white;"> What people say about us...</div>
            <br>
            <div class="col-sm-12 col-md-4">
                <span style="color:white;"> Samson </span> <br> <br> 
                <img src="<?= base_url("landing_images/samson.jpg") ?>" alt="Men clothes" height=50% width=100% style="border-radius:20%;"> <br> <br>
                <span style="color: #dcdde1; font-size: 16px; font-family: Sofia; float:right;"> " We have a variety of men clothes just for you. <br> Sign up and explore them ! "</span>
            </div>

            <div class="col-sm-12 col-md-4">
                <span style="color:white;"> Aurelie </span> <br> <br> 
                <img src="<?= base_url("landing_images/aurelie.jpg") ?>" alt="Men clothes" height=50% width=100% style="border-radius:20%;"> <br> <br>
                <span style="color: #dcdde1; font-size: 16px; font-family: Sofia; float:right;"> " We have a variety of men clothes just for you. <br> Sign up and explore them ! "</span>
            </div>

            <div class="col-sm-12 col-md-4">
                <span style="color:white;"> Jack </span> <br> <br> 
                <img src="<?= base_url("landing_images/jack.jpg") ?>" alt="Men clothes" height=50% width=100% style="border-radius:20%;"> <br> <br>
                <span style="color: #dcdde1; font-size: 16px; font-family: Sofia; float:right;"> " We have a variety of men clothes just for you. <br> Sign up and explore them ! "</span>
            </div>
        </div>

    </div> <hr>
</body>
<script>
    $(document).ready(function ()
    {
        alertify.success('Welcome to WeDRESS !\n Sign up and discover more about our services.');
    });
</script>
</html>