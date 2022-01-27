<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\CategoryModel;
use App\Models\ItemModel;
use App\Models\OrderDetailsModel;
use App\Models\UserModel;
use App\Models\SubcategoryModel;
use App\Models\UserTokenModel;

class AdminController extends BaseController
{
    public function loadHomePage()
    {
        echo view('admin/homePage');
    }

    //user pages
    public function addNewUserPage()
    {
        echo view('admin/addNewUserPage');
    }
    public function viewUserPage()
    {
        $userModel=new UserModel();
        $allUsers=$userModel->getAllUsers();
        $session=session();
        $session->set('allUsers',$allUsers);
        echo view('admin/viewUserPage');
    }
    public function editUserPage($user_id)
    {
        $userModel=new UserModel();
        $user=$userModel->getUserWithId($user_id)[0];
        $session=session();
        $session->set('user',$user);
        echo view('admin/editUserPage');
    }

    //category pages
    public function addNewCategoryPage()
    {
        echo view('admin/addNewCategoryPage');
    }
    public function viewCategoryPage()
    {
        $categoryModel=new CategoryModel();
        $allCategories=$categoryModel->getAllCategories();
        $session=session();
        $session->set('allCategories',$allCategories);
        echo view('admin/viewCategoryPage');
    }
    public function editCategoryPage($category_id)
    {
        $categoryModel=new CategoryModel();
        $category=$categoryModel->getCategoryWithId($category_id);
        $session=session();
        $session->set('category',$category);
        echo view('admin/editCategoryPage');
    }

    //subcategory pages
    public function addNewSubcategoryPage()
    {
        echo view('admin/addNewSubcategoryPage');
    }
    public function viewSubcategoryPage()
    {
        $subcategoryModel=new SubcategoryModel();
        $allSubcategories=$subcategoryModel->getAllSubcategories();
        $session=session();
        $session->set('allsubcategories',$allSubcategories);
        echo view('admin/viewSubcategoryPage'); 
    }
    public function editSubcategoryPage($subcategory_id)
    {
        $subcategoryModel=new SubcategoryModel();
        $subcategory=$subcategoryModel->getSubcategoryWithId($subcategory_id);
        $session=session();
        $session->set('subcategory',$subcategory);
        echo view('admin/editSubcategoryPage');
    }

    //item pages
    public function addNewItemPage()
    {
        echo view('admin/addNewItemPage');
    }
    public function viewItemPage()
    {
        $itemModel=new ItemModel();
        $allItems=$itemModel->getAllItems();
        $session=session();
        $session->set('allItems',$allItems);
        echo view('admin/viewItemPage');
    }
    public function editItemPage($id){
        $itemModel=new ItemModel();
        $item=$itemModel->getItemWithId($id);
        $session=session();
        $session->set('item',$item);
        echo view('admin/editItemPage');
    }

    //token pages
    public function generateTokenPage()
    {
        echo view('admin/generateTokenPage');
    }
    public function generateTokenProductPage()
    {
        echo view('admin/generateTokenProductPage');
    }


    //admin operations
    // 1. Add new user
    public function addNewUser()
    {
        $fname=$_POST['fname'];
        $lname=$_POST['lname'];
        $email=$_POST['email'];
        $password=$_POST['password'];
        $confpassword=$_POST['confpassword'];
        $gender=$_POST['gender'];
        $role=$_POST['role']=='User'?1:2;

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
                'approved'=>1,
            ];

            $userModel=new UserModel();
            $userModel->saveData($data);
            echo '<script>';
            echo 'alert(\'User successfully saved !\');';
            echo '</script>';
            echo view('admin/addNewUserPage');
        }
        else
        {
            echo '<script>';
            echo 'alert(\'Password did not match !.\');';
            echo '</script>'; 
            echo view('admin/AddNewUserPage');
        }  
    }

    // 2. Edit user
    public function editUser($user_id)
    {
        $userModel=new UserModel();
        $data=[
            'first_name'=>$_POST['fname'],
            'last_name'=>$_POST['lname'],
            'email'=>$_POST['email'],
            'gender'=>$_POST['gender'],
            'role'=>$_POST['role']=='User'?1:2,
            'is_deleted'=>$_POST['delete'],
            'approved'=>$_POST['approve']
        ];
        $userModel->editUser($user_id,$data);
        echo '<script>';
        echo 'alert(\'User edited successfully !\');';
        echo '</script>';
        return redirect()->route('viewUserPage');
    }

    //adding new category
    public function addNewCategory()
    {
        $category_name=$_POST['cat_name'];
        $data=[
            'category_name'=>$category_name,
            'is_deleted'=>0,
        ];
        $subcategoryModel=new CategoryModel();
        $subcategoryModel->saveData($data);
        echo '<script>';
        echo 'alert(\'New Category added !\');';
        echo '</script>';
        echo view('admin/addNewCategoryPage');
    }

    //edit category
    public function editCategory($category_id)
    {
        $subcategoryModel=new CategoryModel();
        $data=[
            'subcategory_name'=>$_POST['cat_name'],
            'is_deleted'=>$_POST['delete'],
        ];
        $subcategoryModel->editCategory($category_id,$data);
        echo '<script>';
        echo 'alert(\'Category edited successfully !\');';
        echo '</script>';
        return redirect()->route('viewCategoryPage');
    }

    //adding new subcategory
    public function addNewSubcategory()
    {
        $subcategory_name=$_POST['subcat_name'];
        $category=$_POST['category'];
        $data=[
            'subcategory_name'=>$subcategory_name,
            'category'=>$category,
            'is_deleted'=>0,
        ];
        $subcategoryModel=new SubcategoryModel();
        $subcategoryModel->saveData($data);
        echo '<script>';
        echo 'alert(\'New Subcategory added !\');';
        echo '</script>';
        echo view('admin/addNewSubcategoryPage');
    }

    //editing subcategories
    public function editSubcategory($subcategory_id)
    {
        $subcategoryModel=new SubcategoryModel();
        $data=[
            'subcategory_name'=>$_POST['subcat_name'],
            'category'=>$_POST['category'],
            'is_deleted'=>$_POST['delete'],
        ];
        $subcategoryModel->editSubcategory($subcategory_id,$data);
        echo '<script>';
        echo 'alert(\'Subcategory edited successfully !\');';
        echo '</script>';
        return redirect()->route('viewSubcategoryPage');
    }

    // adding a new item
    public function addNewItem(){
        $itemModel=new ItemModel();
        $image=$this->request->getFile('prod_image');
        if($image->isValid() && !$image->hasMoved()){
            $image->move(WRITEPATH.'uploads/product_images/');
            $image->move(base_url('uploads/product_images/'));
        }
        $imageName=$image->getName();
        $data=[
            'product_name'=>$_POST['prod_name'],
            'product_description'=>$_POST['prod_description'],
            'product_image'=>$imageName,
            'unit_price'=>$_POST['unit_price'],
            'available_quantity'=>$_POST['available_qty'],
            'subcategory_id'=>$_POST['subcat_id'],
            'added_by'=>2,
            'is_deleted'=>0,
        ];
        $itemModel->saveItem($data);
        echo '<script>';
        echo 'alert(\'New product added successfully !\');';
        echo '</script>';
        echo view('admin/addNewItemPage');
    }

    // updating a new item
    public function editItem($id){
        $itemModel=new ItemModel();
        $data=[
            'product_name'=>$_POST['product_name'],
            'product_description'=>$_POST['prod_description'],
            'unit_price'=>$_POST['unit_price'],
            'available_quantity'=>$_POST['available_qty'],
            'subcategory_id'=>$_POST['subcategory_id'],
            'is_deleted'=>$_POST['is_deleted']=='Yes'?1:0,
        ];
        $itemModel->updateItem($id,$data);
        echo '<script>';
        echo 'alert(\'New item successfully updated!\');';
        echo '</script>';
        echo view('admin/editItemPage');
    }

    // generating a user access token
    public function generateToken(){
        $data=[
            'username'=>$_POST['userName'],
            'key'=>$_POST['key'],
            'added_by'=>2,
            'is_deleted'=>0,
        ];
        $userTokenModel=new UserTokenModel();
        $userTokenModel->saveAccessToken($data);
        echo '<script>';
        echo 'alert(\'User Access token successfully generated !\');';
        echo '</script>';
        echo view('admin/generateTokenPage');
    }

    public function viewAnalytics(){
        $orderDetailsModel=new OrderDetailsModel();
        
        $analytics=[
            'Highest Purchase Amount '=>'$'.$orderDetailsModel->highestPurchaseAmount(),
            'Lowest Purchase Amount'=>'$'.$orderDetailsModel->lowestPurchaseAmount(),
            'Average Purchase Amount'=>'$'.$orderDetailsModel->averagePurchaseAmount(),
            'Gender With Most Purchases'=>$orderDetailsModel->genderWithMostPurchases(),
            'Gender With Least Purchases'=>$orderDetailsModel->genderWithLeastPurchases(),
            'Highest Quantity of Items in One Purchase'=>$orderDetailsModel->highestQuantityInOnePurchase(),
            'Lowest Quantity of Items in One Purchase'=>$orderDetailsModel->lowestQuantityInOnePurchase(),
            'Average Quantity of Items in One Purchase'=>$orderDetailsModel->averageQuantityInOnePurchase(),
            'Total Items Purchased'=>$orderDetailsModel->totalItemsPurchased(),
            'Most purchased Item'=>$orderDetailsModel->mostPurchasedProduct(),
            'Least Purchased Item'=>$orderDetailsModel->leastPurchasedProduct(),
            'Most Purchased Subcategory'=>$orderDetailsModel->mostPurchasedSubcategory(),
            'Least Purchased Subcategory'=>$orderDetailsModel->leastPurchasedSubcategory(),
            'User With Most Purchases'=>$orderDetailsModel->userWithMostPurchases(),
            'User With Least Purchases'=>$orderDetailsModel->userWithLeastPurchases(),
            'Average Purchase Amount Per User'=>'$'.$orderDetailsModel->averagePurchaseAmountPerUser(),
        ];
        $allOrderDetails=$orderDetailsModel->getAllOrderDetails();
        session()->set('allOrderDetails',$allOrderDetails);
        session()->set('analytics',$analytics);
        echo view('admin/viewAnalytics');
    }
    
}


?>