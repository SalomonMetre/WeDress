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
    <link rel="stylesheet" href="<?= base_url('css/api/transactionData.css') ?>">

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
                    <h2 style="color:orange; margin-top:5%; font-weight: bold;"> API Documentation </h2>
                </ul>
            </div>
        </div>

        <!-- Main content row -->
        <div class="row signup-row" style="display: flex; flex-wrap: wrap">
            <div class="col-sm-12 col-md-3 panel">
                <div class="container-fluid">
                    <div class="row"> <a href="<?= base_url('apiHomePage') ?>"> Introduction </a> </div>
                    <div class="row"> <a href="<?= base_url('apiUserDataPage') ?>"> Consuming User Data </a> </div>
                    <div class="row"> <a href="<?= base_url('apiProductDataPage') ?>"> Consuming Products/Items Data </a> </div>
                    <div class="row" style="background-color:#1E272E;"> <a href="<?= base_url('apiTransactionDataPage') ?>"> Consuming Transactions Data </a> </div>
                </div>
            </div>
            <div class="col-sm-12 col-md-9 main-content">
                
            <!-- Chapter 15 -->
            <div style="background-color: #273c75;font-family:'Courier New', Courier, monospace;padding:2%;color:yellow;font-size:18px; font-weight:bold;">
                    15. Accessing all transaction details
                </div> <br>
                <p style="color: white; font-size: 15px; font-family:'Courier New', Courier, monospace ; "> For this secure endpoint, use your secure API token, and call the API using the link <span style="color: green;"> localhost:8080/api/transactions/?token=[yourToken]</span> as illustrated in this image below:
                </p>
                <img src="<?= base_url('api_doc_images/Case9.png') ?>" alt="Chap 9" height="25%" width="100%" style="align-items: center; align-self: center; align-content: center;"> <br> <br>

                <!-- Chapter 16 -->
            <div style="background-color: #273c75;font-family:'Courier New', Courier, monospace;padding:2%;color:yellow;font-size:18px; font-weight:bold;">
                    16. Accessing transactions using date range
                </div> <br>
                <p style="color: white; font-size: 15px; font-family:'Courier New', Courier, monospace ; "> For this insecure endpoint, use your general Access key, and call the API using the link <span style="color: green;"> localhost:8080/api/transactions/?access_key=[yourAccessKey]&date_start=[yourStartDate]&date_end=[yourEndDate]</span> as illustrated in this image below:
                </p>
                <img src="<?= base_url('api_doc_images/Case16.png') ?>" alt="Chap 9" height="25%" width="100%" style="align-items: center; align-self: center; align-content: center;"> <br> <br>

                <!-- Chapter 17 -->
            <div style="background-color: #273c75;font-family:'Courier New', Courier, monospace;padding:2%;color:yellow;font-size:18px; font-weight:bold;">
                    17. Accessing transactions using product id
                </div> <br>
                <p style="color: white; font-size: 15px; font-family:'Courier New', Courier, monospace ; "> For this insecure endpoint, use your general Access key, and call the API using the link <span style="color: green;"> localhost:8080/api/transactions/?access_key=[yourAccessKey]&product_id=[product_id]</span> as illustrated in this image below:
                </p>
                <img src="<?= base_url('api_doc_images/Case17.png') ?>" alt="Chap 9" height="25%" width="100%" style="align-items: center; align-self: center; align-content: center;"> <br> <br>
            </div>
        </div>
    </div>
</body>
</html>
