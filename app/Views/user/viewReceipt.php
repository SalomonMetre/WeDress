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
    <link rel="stylesheet" href="<?= base_url('css/user/viewReceipt.css') ?>">

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
                    <li style="color:#FF7F00;"> <i class="fa fa-user-plus" aria-hidden="true"></i> <?php $session=session(); echo $session->get('userName') ?> </a></li>
                </ul>
            </div>
        </div>

        <!-- Main content row -->
        <div class="row signup-row" style="display: flex; flex-wrap: wrap">
            <div class="col-sm-12 col-md-3 panel">
                <div class="container-fluid">
                    <div class="row"> <a href="<?= base_url('userHomePage') ?>"> Home </a> </div>
                    <div class="row"> <a href="<?= base_url('userViewItem') ?>"> View items</a> </div>
                    <div class="row"> <a href="<?= base_url('userAddMoneyWallet') ?>"> Add money to wallet</a> </div>
                    <div class="row"> <a href="<?= base_url('userViewPurchaseHistory') ?>"> View purchase history</a> </div>
                    <div class="row" style="background-color:#1E272E;"> <a href="<?= base_url('userViewReceipt') ?>"> View your receipt</a> </div>
                </div>
            </div>
            <div class="col-sm-12 col-md-9 main-content">
                <h4 style="padding-left:20%; padding-right:20%; color:white;"> Receipt Number #<?= session()->get('userName') ?><?= session()->get('user_id') ?>--<?= session()->get('order_id') ?></h2> <br>
                <table class="table">
                    <thead style="background-color: black; color:white;">
                        <tr>
                            <th> Order Id </th>
                            <th> Product Id </th>
                            <th> Order Quantity </th>
                            <th> Order Total </th>
                        </tr>
                    </thead>
                    <tbody style="background-color:white; color:black;">
                        <?php
                            foreach(session()->get('purchasedItems') as $purchasedItem){
                        ?>
                            <tr>
                                <td> <?= $purchasedItem['order_id'] ?> </td>
                                <td> <?= $purchasedItem['product_id'] ?> </td>
                                <td> <?= $purchasedItem['order_quantity'] ?> </td>
                                <td> <?= $purchasedItem['orderdetails_total'] ?> </td>
                            </tr>
                        <?php
                            }
                        ?>
                        <tr>
                            <td colspan="4" style="padding-left:40%; padding-right:40%;"> Total : <?= session()->get('sum') ?> </td>
                        </tr>
                    </tbody>
                </table>
                <div>
                    <button style="margin-top: 5%; padding-top: 5%; padding-bottom:5%; background-color:blue; color:white; padding-left:20%; padding-right:20%; margin-left:20%; margin-right:20%;" onclick="printReceipt()"> Print Receipt </button>
                </div>
            </div>
        </div>
    </div>
    <script>
        function printReceipt(){
            window.print();
        }
    </script>
</body>
</html>
