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
    <link rel="stylesheet" href="<?= base_url('css/api/productData.css') ?>">

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
                    <div class="row" style="background-color:#1E272E;"> <a href="<?= base_url('apiProductDataPage') ?>"> Consuming Products/Items Data </a> </div>
                    <div class="row"> <a href="<?= base_url('apiTransactionDataPage') ?>"> Consuming Transactions Data </a> </div>
                </div>
            </div>
            <div class="col-sm-12 col-md-9 main-content">

                <!-- Chapter 9 -->
                <div style="background-color: #273c75;font-family:'Courier New', Courier, monospace;padding:2%;color:yellow;font-size:18px; font-weight:bold;">
                    9. Accessing all products
                </div> <br>
                <p style="color: white; font-size: 15px; font-family:'Courier New', Courier, monospace ; "> For this insecure endpoint, use your general API access key, and call the API using the link <span style="color: green;"> localhost:8080/api/products/?access_key=[yourAccessKey]</span> as illustrated in this image below:
                </p>
                <img src="<?= base_url('api_doc_images/Case9.png') ?>" alt="Chap 9" height="13%" width="100%" style="align-items: center; align-self: center; align-content: center;"> <br> <br>

                <!-- Chapter 10 -->
                <div style="background-color: #273c75;font-family:'Courier New', Courier, monospace;padding:2%;color:yellow;font-size:18px; font-weight:bold;">
                    10. Accessing a product using an id
                </div> <br>
                <p style="color: white; font-size: 15px; font-family:'Courier New', Courier, monospace ; "> For this insecure endpoint, use your general API access key, and call the API using the link <span style="color: green;"> localhost:8080/api/products/?access_key=[yourAccessKey]&product_id=[yourProductId]</span> as illustrated in this image below:
                </p>
                <img src="<?= base_url('api_doc_images/Case10.png') ?>" alt="Chap 9" height="13%" width="100%" style="align-items: center; align-self: center; align-content: center;"> <br> <br>

                <!-- Chapter 11 -->
                <div style="background-color: #273c75;font-family:'Courier New', Courier, monospace;padding:2%;color:yellow;font-size:18px; font-weight:bold;">
                    11. Accessing a product by subcategory
                </div> <br>
                <p style="color: white; font-size: 15px; font-family:'Courier New', Courier, monospace ; "> For this insecure endpoint, use your general API access key, and call the API using the link <span style="color: green;"> localhost:8080/api/products/?access_key=[yourAccessKey]&subcategory_id=[yourProductId]</span> as illustrated in this image below:
                </p>
                <img src="<?= base_url('api_doc_images/Case11.png') ?>" alt="Chap 9" height="13%" width="100%" style="align-items: center; align-self: center; align-content: center;"> <br> <br>

                <!-- Chapter 12 -->
                <div style="background-color: #273c75;font-family:'Courier New', Courier, monospace;padding:2%;color:yellow;font-size:18px; font-weight:bold;">
                    12. Accessing a list of products purchased by a user
                </div> <br>
                <p style="color: white; font-size: 15px; font-family:'Courier New', Courier, monospace ; "> For this secure endpoint, use your secure API token, and call the API using the link <span style="color: green;"> localhost:8080/api/products/?token=[yourToken]&user_id=[yourUserId]</span> as illustrated in this image below:
                </p>
                <img src="<?= base_url('api_doc_images/Case12.png') ?>" alt="Chap 9" height="13%" width="100%" style="align-items: center; align-self: center; align-content: center;"> <br> <br>

                <!-- Chapter 13 -->
                <div style="background-color: #273c75;font-family:'Courier New', Courier, monospace;padding:2%;color:yellow;font-size:18px; font-weight:bold;">
                    13. Accessing a list of products by sales volume
                </div> <br>
                <p style="color: white; font-size: 15px; font-family:'Courier New', Courier, monospace ; "> For this secure endpoint, use your secure API token, and call the API using the link <span style="color: green;"> localhost:8080/api/products/?token=[yourToken]&sales_volume=[salesVolume]</span> as illustrated in this image below:
                </p>
                <img src="<?= base_url('api_doc_images/Case13.png') ?>" alt="Chap 9" height="13%" width="100%" style="align-items: center; align-self: center; align-content: center;"> <br> <br>

                <!-- Chapter 14 -->
                <div style="background-color: #273c75;font-family:'Courier New', Courier, monospace;padding:2%;color:yellow;font-size:18px; font-weight:bold;">
                    14. Accessing a list of products by name or any sequence of letters
                </div> <br>
                <p style="color: white; font-size: 15px; font-family:'Courier New', Courier, monospace ; "> For this insecure endpoint, use your general API access key, and call the API using the link <span style="color: green;"> localhost:8080/api/products/?access_key=[yourAccessKey]&name=[productName]</span> as illustrated in this image below:
                </p>
                <img src="<?= base_url('api_doc_images/Case14.png') ?>" alt="Chap 9" height="13%" width="100%" style="align-items: center; align-self: center; align-content: center;"> <br> <br>

            </div>
        </div>
    </div>
</body>
</html>
