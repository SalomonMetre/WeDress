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
    <link rel="stylesheet" href="<?= base_url('css/user/viewItem.css') ?>">

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
                    <li style="color:#FF7F00;"> <i class="fa fa-user-plus" aria-hidden="true"></i> <?php $session = session();
                                                                                                    echo $session->get('userName') ?> </a></li>
                </ul>
            </div>
        </div>

        <!-- Main content row -->
        <div class="row signup-row" style="display: flex; flex-wrap: wrap">
            <div class="col-sm-12 col-md-3 panel">
                <div class="container-fluid">
                    <div class="row"> <a href="<?= base_url('userHomePage') ?>"> Home </a> </div>
                    <div class="row" style="background-color:#1E272E;"> <a href="<?= base_url('userViewItem') ?>"> View items</a> </div>
                    <div class="row"> <a href="<?= base_url('userAddMoneyWallet') ?>"> Add money to wallet</a> </div>
                    <div class="row"> <a href="<?= base_url('userViewPurchaseHistory') ?>"> View purchase history</a> </div>
                    <div class="row"> <a href="<?= base_url('userViewReceipt') ?>"> View your receipt</a> </div>
                </div>
            </div>
            <div class="col-sm-12 col-md-9 main-content">
                <div class="row" style="padding: 2%; align-content: right; align-self: right;">
                    <div>
                        <form action="<?= base_url('getAllItemsWithDetails') ?>" method="POST">
                            <select name="subcategory_id" id="" style="margin: 1%; width: 25%; padding: 1.5%; background-color:#1E272E; color:white;">
                                <?php
                                $allSubcategories = session()->get('allSubcategories');
                                foreach ($allSubcategories as $subcategory) {
                                    session()->set('subcategory', $subcategory);
                                ?>
                                    <option value="<?= $subcategory['subcategory_id'] ?>"> <?= $subcategory['subcategory_name'] ?></option>
                                <?php
                                }
                                ?>
                            </select>
                            <select name="price" id="" style="margin: 1%; width: 25%; padding: 1.5%; background-color:#1E272E; color:white;">
                                <option value="0"> No specific price</option>
                                <?php
                                $prices = session('prices');
                                foreach ($prices as $price) {
                                ?>
                                    <option value="<?= $price['unit_price'] ?>"> <?= $price['unit_price'] ?> </option>
                                <?php
                                }
                                ?>
                            </select>
                            <select name="order" id="" style="margin: 1%; width: 25%; padding: 1.5%; background-color:#1E272E; color:white;">
                                <option value="1"> Highest to Lowest </option>
                                <option value="0"> Lowest to Highest </option>
                            </select>
                            <button class="btn btn-primary" type="submit" style="width: 10%; padding:1.5%; margin-left: 1%;"> View </button>
                        </form>
                    </div>
                </div>
                <div class="row">
                    <?php
                    $allItems = session()->get('allItems');
                    foreach ($allItems as $item) {
                    ?>
                        <form action="<?= base_url('orderItem') ?>" method="POST">
                            <div class="col-sm-6 col-md-3">
                                <div class="card" style="width: 18rem; padding:2%;">
                                    <h5> $ <?= $item['unit_price'] ?> </h5>
                                    <input type="hidden" name="unit_price" value="<?= $item['unit_price'] ?>">
                                    <input type="hidden" name="product_id" value="<?= $item['product_id'] ?>">
                                    <input type="hidden" name="subcategory_id" value="<?= $item['subcategory_id'] ?>">
                                    <img class="card-img-top" src="<?= base_url('uploads/product_images/' . $item['product_image']) ?>" alt="" height="200px" width="200px">
                                    <div class="card-body">
                                        <h5 class="card-title" id="desc"> <?= $item['product_name'] ?></h5>
                                        <p class="card-text"> <?= $item['product_description'] ?></p>
                                        <span style="color:blue; width:62%;"> Number of items </span>
                                        <input type="number" style="background-color:white; margin-bottom:1%; width:38%;" name="qty">
                                        <span style="color: blue; width:62%;"> Payment type </span>
                                        <select style="background-color:#1E272E; color:white;margin-bottom:1%; width:38%; float:right;" name="ptype">
                                            <?php
                                                foreach(session()->get('allPaymentTypes') as $paymentType){
                                            ?>
                                                <option value="<?= $paymentType['paymenttype_name'] ?>" style="background-color: #blue;"> <?= $paymentType['paymenttype_name'] ?></option>
                                            <?php
                                                }
                                            ?>
                                        </select>
                                        <button class="btn btn-primary" style="width: 100%;"> Purchase this item </button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    <?php
                    }
                    ?>
                </div>
            </div>
        </div>
</body>

</html>