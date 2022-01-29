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
    <link rel="stylesheet" href="<?= base_url('css/api/userData.css') ?>">

</head>

<body>
    <div class="container-fluid">
        <!-- Menu row -->
        <div class="row menu-row">
            <div class="col-sm-12 col-md-5">
                <img src="<?= base_url('landing_images/logo.jpg') ?>" alt="Logo Image" height="9%" width="9%" id="logo">
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
                    <div class="row" style="background-color:#1E272E;"> <a href="<?= base_url('apiUserDataPage') ?>"> Consuming User Data </a> </div>
                    <div class="row"> <a href="<?= base_url('apiProductDataPage') ?>"> Consuming Products/Items Data </a> </div>
                    <div class="row"> <a href="<?= base_url('apiTransactionDataPage') ?>"> Consuming Transactions Data </a> </div>
                </div>
            </div>
            <div class="col-sm-12 col-md-9 main-content">

                <!-- Chapter 1 -->
                <div style="background-color: #273c75;font-family:'Courier New', Courier, monospace;padding:2%;color:yellow;font-size:18px; font-weight:bold;">
                    1. Accessing all users
                </div> <br>
                <p style="color: white; font-size: 15px; font-family:'Courier New', Courier, monospace ; "> For this secure endpoint, use your secure API token, and call the API using the link <span style="color: green;"> localhost:8080/api/users/?token=[yourToken]</span> as illustrated in this image below:
                </p>
                <img src="<?= base_url('api_doc_images/Case1.png') ?>" alt="" height="9%" width="100%" style="align-items: center; align-self: center; align-content: center;"> <br> <br>

                <!-- Chapter 2.1 -->
                <div style="background-color: #273c75;font-family:'Courier New', Courier, monospace;padding:2%;color:yellow;font-size:18px; font-weight:bold;">
                    2.1.  Accessing a user with an id
                </div> <br>
                <p style="color: white; font-size: 15px; font-family:'Courier New', Courier, monospace ; "> For this secure endpoint, use your secure API token, and call the API using the link <span style="color: green;"> localhost:8080/api/users/?token=[yourToken]&user_id=[userIdOfYourChoice]</span> as illustrated in this image below:
                </p>
                <img src="<?= base_url('api_doc_images/Case2_1.png') ?>" alt="case 2" height="9%" width="100%" style="align-items: center; align-self: center; align-content: center;"> <br> <br>

                <!-- Chapter 2.2 -->
                <div style="background-color: #273c75;font-family:'Courier New', Courier, monospace;padding:2%;color:yellow;font-size:18px; font-weight:bold;">
                    2.2.  Accessing a user with an email
                </div> <br>
                <p style="color: white; font-size: 15px; font-family:'Courier New', Courier, monospace ; "> For this secure endpoint, use your secure API token, and call the API using the link <span style="color: green;"> localhost:8080/api/users/?token=[yourToken]&email=[emailOfYourChoice]</span> as illustrated in this image below:
                </p>
                <img src="<?= base_url('api_doc_images/Case2_2.png') ?>" alt="case 2" height="9%" width="100%" style="align-items: center; align-self: center; align-content: center;"> <br> <br>

                <!-- Chapter 3 -->
                <div style="background-color: #273c75;font-family:'Courier New', Courier, monospace;padding:2%;color:yellow;font-size:18px; font-weight:bold;">
                    3.  Accessing a user by gender
                </div> <br>
                <p style="color: white; font-size: 15px; font-family:'Courier New', Courier, monospace ; "> For this secure endpoint, use your secure API token, and call the API using the link <span style="color: green;"> localhost:8080/api/users/?token=[yourToken]&gender=[genderOfYourChoice]</span> as illustrated in this image below:
                </p>
                <img src="<?= base_url('api_doc_images/Case3.png') ?>" alt="case 2" height="9%" width="100%" style="align-items: center; align-self: center; align-content: center;"> <br> <br>

                <!-- Chapter 4 -->
                <div style="background-color: #273c75;font-family:'Courier New', Courier, monospace;padding:2%;color:yellow;font-size:18px; font-weight:bold;">
                    4.  Access all users by last purchase date
                </div> <br>
                <p style="color: white; font-size: 15px; font-family:'Courier New', Courier, monospace ; "> For this secure endpoint, you will access data of users who purchased an item on our website on the latest date; use your secure API token, and call the API using the link <span style="color: green;"> localhost:8080/api/users/?token=[yourToken]&last_purchase_date=yes</span> as illustrated in this image below:
                </p>
                <img src="<?= base_url('api_doc_images/Case4.png') ?>" alt="case 2" height="9%" width="100%" style="align-items: center; align-self: center; align-content: center;"> <br> <br>

                <!-- Chapter 5 -->
                <div style="background-color: #273c75;font-family:'Courier New', Courier, monospace;padding:2%;color:yellow;font-size:18px; font-weight:bold;">
                    5.  Accessing users who purchased a specific item
                </div> <br>
                <p style="color: white; font-size: 15px; font-family:'Courier New', Courier, monospace ; "> For this secure endpoint, use your secure API token, and call the API using the link <span style="color: green;"> localhost:8080/api/users/?token=[yourToken]&item_id=[yourItemId]</span> as illustrated in this image below:
                </p>
                <img src="<?= base_url('api_doc_images/Case5.png') ?>" alt="case 2" height="9%" width="100%" style="align-items: center; align-self: center; align-content: center;"> <br> <br>

                <!-- Chapter 6 -->
                <div style="background-color: #273c75;font-family:'Courier New', Courier, monospace;padding:2%;color:yellow;font-size:18px; font-weight:bold;">
                    6.  Accessing users who purchased a specific item on a specific date
                </div> <br>
                <p style="color: white; font-size: 15px; font-family:'Courier New', Courier, monospace ; "> For this secure endpoint, use your secure API token, and call the API using the link <span style="color: green;"> localhost:8080/api/users/?token=[yourToken]&item_id=[yourItemId]&purchase_date=[yourDate]</span> as illustrated in this image below:
                </p>
                <img src="<?= base_url('api_doc_images/Case6.png') ?>" alt="case 2" height="9%" width="100%" style="align-items: center; align-self: center; align-content: center;"> <br> <br>

                 <!-- Chapter 7 -->
                 <div style="background-color: #273c75;font-family:'Courier New', Courier, monospace;padding:2%;color:yellow;font-size:18px; font-weight:bold;">
                    7.  Accessing users by gender filtered by specific letters
                </div> <br>
                <p style="color: white; font-size: 15px; font-family:'Courier New', Courier, monospace ; "> For this secure endpoint, use your secure API token, and call the API using the link <span style="color: green;"> localhost:8080/api/users/?token=[yourToken]&gender=[genderOfYourChoice]&filter=[yourFilter]</span> as illustrated in this image below:
                </p>
                <img src="<?= base_url('api_doc_images/Case7.png') ?>" alt="case 2" height="9%" width="100%" style="align-items: center; align-self: center; align-content: center;"> <br> <br>

                 <!-- Chapter 8 -->
                 <div style="background-color: #273c75;font-family:'Courier New', Courier, monospace;padding:2%;color:yellow;font-size:18px; font-weight:bold;">
                    8.  Accessing user who last logged in
                </div> <br>
                <p style="color: white; font-size: 15px; font-family:'Courier New', Courier, monospace ; "> For this secure endpoint, use your secure API token, and call the API using the link <span style="color: green;"> localhost:8080/api/users/?token=[yourToken]&last_login=yes</span> as illustrated in this image below:
                </p>
                <img src="<?= base_url('api_doc_images/Case8.png') ?>" alt="case 2" height="9%" width="100%" style="align-items: center; align-self: center; align-content: center;"> <br> <br>


                <p style="color: white; margin:2%;">
                    <hr>
                </p>


            </div>
        </div>
    </div>
</body>

</html>