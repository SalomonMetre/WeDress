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

    <!-- Custom css-->
    <link rel="stylesheet" href="<?= base_url('css/signup.css') ?>">
    <link rel="stylesheet" href="<?= base_url('css/admin/addNewItem.css') ?>">

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
                    <li style="color:#FF7F00;"> <a href="<?= base_url('userSignout') ?>"> <i class="fa fa-sign-in" aria-hidden="true"></i> Sign Out </a></li>
                    <li style="color:#FF7F00;"> <i class="fa fa-user-plus" aria-hidden="true"></i> Admin <span style="color:white;">[<?php $session=session(); echo $session->get('userName') ?>]</span> </li>
                </ul>
            </div>
        </div>

        <!-- Main content row -->
        <div class="row signup-row" style="display: flex; flex-wrap: wrap">
            <div class="col-sm-12 col-md-3 panel">
                <div class="container-fluid">
                    <div class="row"> <a href="<?= base_url('adminHomePage') ?>"> Home </a> </div>
                    <div class="row"> <a href="<?= base_url('addNewUserPage') ?>"> Add New User </a> </div>
                    <div class="row"> <a href="<?= base_url('viewUserPage') ?>"> View Users </a> </div>
                    <div class="row"> <a href="<?= base_url('addNewCategoryPage') ?>"> Add New Category </a> </div>
                    <div class="row"> <a href="<?= base_url('viewCategoryPage') ?>"> View Categories </a> </div>
                    <div class="row"> <a href="<?= base_url('addNewSubcategoryPage') ?>"> Add New Subcategory</a> </div>
                    <div class="row"> <a href="<?= base_url('viewSubcategoryPage') ?>"> View Subcategories </a> </div>
                    <div class="row" style="background-color:#1E272E;"> <a href="<?= base_url('addNewItemPage') ?>"> Add New Item </a> </div>
                    <div class="row"> <a href="<?= base_url('viewItemPage') ?>"> View Items </a> </div>
                    <div class="row"> <a href="<?= base_url('viewAnalytics') ?>"> View Analytics </a> </div>
                    <div class="row"> <a href="<?= base_url('generateTokenPage') ?>"> Generate User Access Token</a> </div>
                    <div class="row"> <a href="<?= base_url('generateTokenProductPage') ?>"> Generate API Token for specific Product </a> </div>
                </div>
            </div>
            <div class="col-sm-12 col-md-9 main-content">
                <div id="title"> Add New Item </div>
                <div>
                <form action="<?= base_url('addNewItem') ?>" method="POST" enctype="multipart/form-data">
                    <div>
                        <input type="text" name="prod_name" placeholder="Enter Product Name">
                    </div> <br>
                    <div>
                        <input type="text" name="prod_description" placeholder="Enter Product Description">
                    </div> <br>
                    <div style="background-color: blue; padding:2%; color:yellow; border-radius:5%;">
                        Upload Product Image
                    </div> <br>
                    <div>
                        <input type="file" name="prod_image" style="color: white;">
                    </div> <br>
                    <div>
                        <input type="number" name="unit_price" placeholder="Enter Product Unit Price">
                    </div> <br>
                    <div>
                        <input type="number" name="available_qty" placeholder="Enter Product Available Quantity">
                    </div> <br>
                    <div>
                        <input type="text" name="subcat_id" placeholder="Enter Subcategory Id">
                    </div> <br>
                    <button type="submit" id="signup_button"> Add New Item</button>
                </form>
                </div>
            </div>
            </div>
        </div>
    </div>
</body>
</html>
