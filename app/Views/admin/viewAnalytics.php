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
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css" />
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/default.min.css" />
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/semantic.min.css" />
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/bootstrap.min.css" />
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.rtl.min.css" />
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/default.rtl.min.css" />
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/semantic.rtl.min.css" />
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/bootstrap.rtl.min.css" />

    <!-- Custom css-->
    <link rel="stylesheet" href="<?= base_url('css/signup.css') ?>">
    <link rel="stylesheet" href="<?= base_url('css/admin/viewAnalytics.css') ?>">

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
                    <li style="color:#FF7F00;"> <i class="fa fa-user-plus" aria-hidden="true"></i> Admin <span style="color:white;">[<?php $session = session();
                                                                                                                                        echo $session->get('userName') ?>]</span> </li>
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
                    <div class="row"> <a href="<?= base_url('addNewItemPage') ?>"> Add New Item </a> </div>
                    <div class="row"> <a href="<?= base_url('viewItemPage') ?>"> View Items </a> </div>
                    <div class="row" style="background-color:#1E272E;"> <a href="<?= base_url('viewAnalytics') ?>"> View Analytics </a> </div>
                    <div class="row"> <a href="<?= base_url('generateTokenPage') ?>"> Generate User Access Token</a> </div>
                    <div class="row"> <a href="<?= base_url('generateTokenProductPage') ?>"> Generate API Token for specific Product </a> </div>
                </div>
            </div>
            <div class="col-sm-12 col-md-9 main-content">
                <div class="row" style="margin-left:7%;">
                    <h5 id="title" style="width: 80%;"> Insightful information about Purchases </h5>
                    <?php
                    foreach (session()->get('analytics') as $description => $value) {
                    ?>
                        <div class="col-sm-4 col-md-3" style="background-color: black; border-radius:10%; margin:2%; width:20%;height:20%;">
                            <h3 style="text-align: center; color:white;"> <?= $description ?> </h3> <br>
                            <h2 style="text-align: center; color:darkcyan;"> <?= $value ?> </h2> <br>
                        </div>
                    <?php
                    }
                    ?>
                </div>
                <div class="row" style="margin-left:7%;">
                    <br><br>
                    <div class="col-sm-9 col-md-9" style="width: 90%;">
                        <h5 id="title" style="width: 90%;"> All Purchases </h5>
                        <table class="table">
                            <thead>
                                <tr style="background-color: black;color:white;">
                                    <td>Purchase Id</td>
                                    <td>Product id </td>
                                    <td>Quantity </td>
                                    <td> Customer Id </td>
                                    <td> Total </td>
                                    <td> Gender </td>
                                    <td> Date </td>
                                </tr>
                            </thead>
                            <?php
                            foreach (session()->get('allOrderDetails') as $orderDetail) {
                            ?>
                                <tbody>
                                    <tr style="background-color: white; color:black;">
                                        <td> <?= $orderDetail['orderdetails_id'] ?> </td>
                                        <td> <?= $orderDetail['product_id'] ?> </td>
                                        <td> <?= $orderDetail['order_quantity'] ?> </td>
                                        <td> <?= $orderDetail['customer_id'] ?> </td>
                                        <td> <?= $orderDetail['orderdetails_total'] ?> </td>
                                        <td> <?= $orderDetail['gender'] ?> </td>
                                        <td> <?= $orderDetail['created_at'] ?> </td>
                                    </tr>
                                </tbody>
                            <?php
                            }
                            ?>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>