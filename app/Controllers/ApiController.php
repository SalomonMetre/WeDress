<?php

namespace App\Controllers;

use App\Models\UserModel;

class ApiController extends BaseController{

    public function index(){
        echo 'This is our API!';
    }

    public function getAllUsers(){
        $userModel=new UserModel();
        echo json_encode($userModel->getAllUsers());
    }

    public function homePage(){
        echo view('api/homePage');
    }

    public function userDataPage(){
        echo view('api/userDataPage');
    }

    public function productDataPage(){
        echo view('api/productDataPage');
    }

    public function transactionDataPage(){
        echo view('api/transactionDataPage');
    }
}


?>