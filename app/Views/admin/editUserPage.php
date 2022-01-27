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
    <link rel="stylesheet" href="<?= base_url('css/admin/editUser.css') ?>">

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
                    <div class="row" style="background-color:#1E272E;"> <a href="<?= base_url('viewUserPage') ?>"> View Users </a> </div>
                    <div class="row"> <a href="<?= base_url('addNewCategoryPage') ?>"> Add New Category </a> </div>
                    <div class="row"> <a href="<?= base_url('viewCategoryPage') ?>"> View Categories </a> </div>
                    <div class="row"> <a href="<?= base_url('addNewSubcategoryPage') ?>"> Add New Subcategory</a> </div>
                    <div class="row"> <a href="<?= base_url('viewSubcategoryPage') ?>"> View Subcategories </a> </div>
                    <div class="row"> <a href="<?= base_url('addNewItemPage') ?>"> Add New Item </a> </div>
                    <div class="row"> <a href="<?= base_url('viewItemPage') ?>"> View Items </a> </div>
                    <div class="row"> <a href="<?= base_url('viewAnalytics') ?>"> View Analytics </a> </div>
                    <div class="row"> <a href="<?= base_url('generateTokenPage') ?>"> Generate User Access Token</a> </div>
                    <div class="row"> <a href="<?= base_url('generateTokenProductPage') ?>"> Generate API Token for specific Product </a> </div>
                </div>
            </div>
            <div class="col-sm-12 col-md-9 main-content">
                <div id="title"> Edit User </div>
                <div>
                <form action="<?= base_url('editUser') ?>/<?= session('user')['user_id'] ?>" method="POST">
                    <div>
                        <label for="fname"> First Name </label> <br>
                        <input type="text" name="fname" value="<?= session('user')['first_name'] ?>">
                    </div>
                    <div>
                        <label for="lname"> Last Name </label> <br>
                        <input type="text" name="lname" value="<?= session('user')['last_name'] ?>">
                    </div>
                    <div>
                        <label for="email"> Email </label> <br>
                        <input type="text" name="email" value="<?= session('user')['email'] ?>">
                    </div>
                    <div>
                        <label for="gender"> Gender </label>
                        <select name="gender" id="gender_select">
                            <option value="">-- Select Gender --</option>
                            <option value="Male" selected> Male </option>
                            <option value="Female"> Female </option>
                            <option value="Prefer Not To Say"> Prefer Not To Say</option>
                        </select>
                    </div>
                    <div>
                        <label for="role"> Role </label>
                        <select name="role" id="role_select">
                            <option value="">-- Choose role --</option>
                            <option value="User" selected> User </option>
                            <option value="Admin"> Admin </option>
                        </select>
                    </div>
                    <div>
                        <label for="is_deleted"> Delete </label>
                        <select name="delete" id="delete_select">
                            <option value="">-- Choose option --</option>
                            <option value="1"> Yes </option>
                            <option value="0" selected> No </option>
                        </select>
                    </div>
                    <div>
                        <label for="approve"> Approve </label>
                        <select name="approve" id="approve_select">
                            <option value="">-- Choose option --</option>
                            <option value="1" selected> Yes </option>
                            <option value="0"> No </option>
                        </select> <br> <br>
                    </div>
                    <div>
                        <label for="amount_available">Amount Available</label>
                        <input type="amount_available" value="<?= session('user')['amount_available'] ?>">
                    </div>
                    <button type="submit" id="signup_button"> Edit User </button>
                </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
