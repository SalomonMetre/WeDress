<?php

namespace App\Controllers;
use App\Controllers\BaseController;
use App\Models\ItemModel;
use App\Models\UserModel;
use App\Models\LoginModel;
use App\Models\OrderDetailsModel;
use App\Models\OrderModel;
use App\Models\SubcategoryModel;
use App\Models\PaymentTypeModel;
use App\Models\ProductTokenModel;
use App\Models\UserTokenModel;

class UserController extends BaseController
{
    //loading pages,etc.
    public function loadSignupPage(){
        echo view('signupPage');
    }

    public function loadSigninPage(){
        echo view('signinPage');
    }

    public function homePage(){
        echo view('user/homePage');
    }

    // viewing items
    public function viewItem(){
        $paymentTypeModel=new PaymentTypeModel();
        $allPaymentTypes=$paymentTypeModel->getAllPaymentTypes();
        session()->set('allPaymentTypes',$allPaymentTypes);

        $subcategory_id=$_POST['subcategory_id']??1;
        $price=$_POST['price']??0;
        $order=$_POST['order']??1;

        $subCategoryModel=new SubcategoryModel();
        session()->set('allSubcategories',$subCategoryModel->getAllSubcategories());

        $itemModel=new ItemModel();
        $allItems=$itemModel->getAllItemsWithDetails($subcategory_id,$price,$order);
        session()->set('allItems',$allItems);
        
        $prices=$itemModel->getDistinctPrices();
        session()->set('prices',$prices);

        echo view('user/viewItem');
    }

    public function addMoneyWallet(){
        echo view('user/addMoneyWallet');
    }

    // viewing purchase history
    public function viewPurchaseHistory(){
        $orderModel=new OrderModel();
        $purchaseHistory=$orderModel->getPurchaseHistory();
        session()->set('purchaseHistory',$purchaseHistory);
        echo view('user/viewPurchaseHistory');
    }

    // viewing order receipt
    public function viewReceipt(){
        $orderDetailsModel=new OrderDetailsModel();
        $orderModel=new OrderModel();
        $order_id=session()->get('order_id');
        $sum=$orderModel->getOrderWithId($order_id)??['order_amount'];
        session()->set('sumOrder',$sum??0);
        $purchasedItems=$orderDetailsModel->getOrderDetailsReceipt();
        session()->set('purchasedItems',$purchasedItems);
        echo view('user/viewReceipt');
    }

    //operations

    //signup
    public function signup()
    {
        $fname=$_POST['fname'];
        $lname=$_POST['lname'];
        $email=$_POST['email'];
        $password=$_POST['password'];
        $confpassword=$_POST['confpassword'];
        $gender=$_POST['gender'];
        $role=$_POST['role']=='User'?1:1;

        if($password==$confpassword)
        {
            $data=[
                'first_name'=>$fname,
                'last_name'=>$lname,
                'email'=>$email,
                'password'=>hash('md5',$password),
                'gender'=>$gender,
                'role'=>$role,
                'is_deleted'=>0,
                'approved'=>$role==1?1:1,
            ];

            $userModel=new UserModel();
            $userModel->saveData($data);
            echo '<script>';
            echo 'alert(\'Successful signup !.\');';
            echo '</script>';
            echo view('signupPage');
        }
        else
        {
            echo '<script>';
            echo 'alert(\'Password did not match !.\');';
            echo '</script>'; 
            echo view('signupPage');
        }  
    }

    //signin
    public function signin()
    {
        $email=$_POST['email'];
        $password=hash('md5',$_POST['password']);
        $role=$_POST['role']=='User'?1:2;

        $conditions=[
            'email='=>$email,
            'password='=>$password,
            'role='=>$role,
            'approved='=>1,
            'is_deleted='=>0
        ];
        
        $userModel=new UserModel();
        $tableResult=$userModel->getData($conditions);

        $accessKeyModel=new UserTokenModel();
        $productTokenModel=new ProductTokenModel();

        if(count($tableResult)>0)
        {
            // a few session data
            $session=session();
            $session->set('userName',$tableResult[0]['first_name'].' '.$tableResult[0]['last_name']);
            $session->set('user_id',$tableResult[0]['user_id']);

            //inserting login details
            date_default_timezone_set("Africa/Nairobi");
            $loginData=[
                'user_id'=>$session->get('user_id'),
                'user_ip'=>'127.0.0.1',
                'login_time'=>date("y-m-d h:i:s"),
                'is_deleted'=>0
            ];

            $loginModel=new LoginModel();
            $loginModel->saveData($loginData);
            $session->set('userlogin_id',$loginModel->getLastId());
        
            if($tableResult[0]['role']==1){
                $orderModel=new OrderModel();
                $nb_orders=count($orderModel->getAllOrders());
                session()->set('order_id',$nb_orders+1);
                $user_id=session()->get('user_id');
                session()->set('api_access_key',$accessKeyModel->getAccessKey($user_id));
                session()->set('tokens',$productTokenModel->getTokensWithId($user_id));
                echo $user_id;
                return redirect()->route('userHomePage');
            }
            else{
                return redirect()->route('adminHomePage');
            }
        }
        else{
            echo view('signinPage');
        }
    }

    //signout
    public function signout()
    {
        date_default_timezone_set("Africa/Nairobi");
        $data=[
            'logout_time'=>date("y-m-d h:i:s")
        ];
        $session=session();
        $id=$session->get('userlogin_id');
        $loginModel=new LoginModel();
        $loginModel->updateData($id,$data);
        $session->stop();
        echo view('landing_view');
    }

    // adding money to wallet
    public function addMoneyToWallet(){
        $userModel=new UserModel();
        $current_amount=$userModel->getUserWithId(session()->get('user_id'))['amount_available'];
        $data=[
            'amount_available'=>$_POST['amount']+$current_amount,
        ];
        $userModel=new UserModel();
        $userModel->editUser(session()->get('user_id'),$data);
        echo '<script>';
        echo 'alert(\'Amount successfully updated !\');';
        echo '</script>'; 
        echo view('user/addMoneyWallet');
    }

    // ordering an item
    public function orderItem(){
        $orderModel=new OrderModel();
        $orderDetailsModel=new OrderDetailsModel();
        $userModel=new UserModel();
        $itemModel=new ItemModel();

        $order_id=session()->get('order_id');
        $user_id=session()->get('user_id');

        $order_total=$_POST['unit_price']*$_POST['qty'];
        $current_total=$orderModel->getOrderWithId($order_id)[0]['order_amount']??0;
        $amount_available=$userModel->getUserWithId($user_id)['amount_available'];
        
        $nb_orders=count($orderModel->getAllOrders());
        if($amount_available<$order_total){
            echo '<script>';
            echo 'alert(\'Insufficient amount. Failed purchase !\');';
            echo '</script>'; 
            echo view('user/viewItem');
        }
        else{
            $userModel->editUser($user_id,['amount_available'=>$amount_available-$order_total]);
            $order_data=[
                'customer_id'=>$user_id,
                'order_amount'=>$order_total,
                'order_status'=>'Paid',
                'payment_type'=>$_POST['ptype'],
                'is_deleted'=>0,
            ];
            $orderdetails_data=[
                'order_id'=>$order_id,
                'customer_id'=>$user_id,
                'product_id'=>$_POST['product_id'],
                'subcategory_id'=>$_POST['subcategory_id'],
                'order_quantity'=>$_POST['qty'],
                'orderdetails_total'=>$order_total,
                'is_deleted'=>0,
            ];
            if($order_id>$nb_orders){
                $orderModel->saveOrder($order_data);
                $orderDetailsModel->saveOrderDetails($orderdetails_data);
            }
            else{
                $orderDetailsModel->saveOrderDetails($orderdetails_data);
                $orderModel->updateOrder($order_id,['order_amount'=>$order_total+$current_total]);
            }
            $current_qty=$itemModel->getItemWithId($_POST['product_id'])['available_quantity'];
            $itemModel->updateItem($_POST['product_id'],['available_quantity'=>$current_qty-$_POST['qty']]);
            echo '<script>';
            echo 'alert(\'Item successfully purchased !\');';
            echo '</script>'; 
            echo view('user/viewItem');
        }
    }

}
