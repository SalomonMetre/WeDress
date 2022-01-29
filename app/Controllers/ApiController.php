<?php

namespace App\Controllers;

use App\Models\ItemModel;
use App\Models\LoginModel;
use App\Models\OrderDetailsModel;
use App\Models\ProductTokenModel;
use App\Models\UserModel;
use App\Models\UserTokenModel;

use function PHPUnit\Framework\isEmpty;

class ApiController extends BaseController
{

    public function index()
    {
        echo 'This is our API!';
    }

    public function showDataIfValidToken($tokenModel, $conditions, $data)
    {
        if ($tokenModel->isTokenValid($conditions)) {
            echo json_encode($data);
        } else {
            echo 'Incorrect details';
        }
    }

    public function showDataIfValidAccessKey($accessModel, $key, $data)
    {
        if ($accessModel->isAccessKeyValid($key)) {
            echo json_encode($data);
        } else {
            echo 'Incorrect details';
        }
    }

    // function for API user data
    public function getUsers()
    {
        // model objects
        $userModel = new UserModel();
        $tokenModel = new ProductTokenModel();
        $orderDetailsModel = new OrderDetailsModel();
        $loginModel = new LoginModel();

        $conditions = [
            'token' => $_GET['token'] ?? 'No token',
            'product_name' => 'users',
        ];

        if (isset($_GET['token'])) {
            if (!(isset($_GET['user_id']) || isset($_GET['email']) || isset($_GET['gender']) || isset($_GET['last_purchase_date']) || isset($_GET['item_id']) || isset($_GET['last_login']))) {
                $data = $userModel->getAllUsers();
                $this->showDataIfValidToken($tokenModel, $conditions, $data);
            } else if (isset($_GET['user_id'])) {
                $data = $userModel->getUserWithId($_GET['user_id']);
                $this->showDataIfValidToken($tokenModel, $conditions, $data);
            } else if (isset($_GET['email'])) {
                $data = $userModel->getUserWithEmail($_GET['email']);
                $this->showDataIfValidToken($tokenModel, $conditions, $data);
            } else if (isset($_GET['gender']) && !isset($_GET['filter'])) {
                $data = $userModel->getUserWithGender($_GET['gender']);
                $this->showDataIfValidToken($tokenModel, $conditions, $data);
            } else if (isset($_GET['last_purchase_date'])) {
                $data = $orderDetailsModel->usersForLastPurchaseDate();
                $this->showDataIfValidToken($tokenModel, $conditions, $data);
            } else if (isset($_GET['item_id']) && !isset($_GET['purchase_date'])) {
                $data = $orderDetailsModel->usersForItem($_GET['item_id']);
                $this->showDataIfValidToken($tokenModel, $conditions, $data);
            } else if (isset($_GET['item_id']) && isset($_GET['purchase_date'])) {
                $data = $orderDetailsModel->usersForItemAndDate($_GET['item_id'], $_GET['purchase_date']);
                $this->showDataIfValidToken($tokenModel, $conditions, $data);
            } else if (isset($_GET['gender']) && isset($_GET['filter'])) {
                $data = $userModel->getUserWithGenderAndFilter($_GET['gender'], $_GET['filter']);
                $this->showDataIfValidToken($tokenModel, $conditions, $data);
            } else if (isset($_GET['last_login'])) {
                $data = $loginModel->lastUserLogin();
                $this->showDataIfValidToken($tokenModel, $conditions, $data);
            }
        } else {
            echo 'No token !';
        }
    }

    // function for API product data
    public function getProducts()
    {
        $key=$_GET['access_key']??'No access key';

        // conditions
        $conditions = [
            'token' => $_GET['token'] ?? 'No token',
            'product_name' => 'products',
        ];

        // model objects
        $productModel=new ItemModel();
        $accessModel=new UserTokenModel();
        $tokenModel=new ProductTokenModel();

        if (isset($_GET['access_key'])) {
            if (!(isset($_GET['product_id']) || isset($_GET['subcategory_id']) || isset($_GET['user_id']) || isset($_GET['name']))) {
                $data=$productModel->getAllItems();
                $this->showDataIfValidAccessKey($accessModel,$key,$data);
            } 
            else if (isset($_GET['product_id'])) {
                $data=$productModel->getItemWithId($_GET['product_id']);
                $this->showDataIfValidAccessKey($accessModel,$key,$data);
            }
            else if(isset($_GET['subcategory_id'])){
                $data=$productModel->getItemsWithSubcategory($_GET['subcategory_id']);
                $this->showDataIfValidAccessKey($accessModel,$key,$data);
            }
            else if(isset($_GET['name'])){
                $data=$productModel->productsWhereNameLike($_GET['name']);
                $this->showDataIfValidAccessKey($accessModel,$key,$data);
            }
        }
        else if(isset($_GET['token'])){
            if(isset($_GET['user_id'])){
                $data=$productModel->getProductsPurchasedByUser($_GET['user_id']);
                $this->showDataIfValidToken($tokenModel,$conditions,$data);
            }
            else if(isset($_GET['sales_volume'])){
                $data=$productModel->getProductsBySalesVolume($_GET['sales_volume']);
                $this->showDataIfValidToken($tokenModel,$conditions,$data);
            }
        }
        else {
            echo 'No access key !';
        }
    }

    // function to serve transaction data for the API
    public function getTransactions()
    {
        $key=$_GET['access_key']??'No access key';

        // conditions
        $conditions = [
            'token' => $_GET['token'] ?? 'No token',
            'product_name' => 'purchases',
        ];

        // model objects
        $orderDetailsModel=new OrderDetailsModel();
        $accessModel=new UserTokenModel();
        $tokenModel=new ProductTokenModel();

        if (isset($_GET['access_key'])) {
           if(isset($_GET['date_start']) && isset($_GET['date_end'])){
                $data=$orderDetailsModel->getTransactionsWhereDateBetween($_GET['date_start'],$_GET['date_end']);
                $this->showDataIfValidAccessKey($accessModel,$key,$data);
           }
           else if(isset($_GET['product_id'])){
               $data=$orderDetailsModel->getTransactionsWhereProductId($_GET['product_id']);
               $this->showDataIfValidAccessKey($accessModel,$key,$data);
           }
        }
        else if(isset($_GET['token'])){
            if (!(isset($_GET['product_id']))) {
                $data=$orderDetailsModel->getTransactions();
                $this->showDataIfValidToken($tokenModel,$conditions,$data);
            } 
        }
        else {
            echo 'No access key or token found !';
        }
    }



    public function homePage()
    {
        echo view('api/homePage');
    }

    public function userDataPage()
    {
        echo view('api/userDataPage');
    }

    public function productDataPage()
    {
        echo view('api/productDataPage');
    }

    public function transactionDataPage()
    {
        echo view('api/transactionDataPage');
    }
}
