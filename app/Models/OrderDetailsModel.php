<?php

namespace App\Models;

use CodeIgniter\Model;

class OrderDetailsModel extends Model
{

    protected $table = 'orderdetails';
    protected $allowedFields = ['orderdetails_id', 'order_id', 'product_id', 'subcategory_id', 'order_quantity', 'orderdetails_total', 'created_at', 'updated_at', 'is_deleted', 'gender', 'customer_id'];
    protected $primaryKey = 'orderdetails_id';
    protected $db, $builder;

    public function __construct()
    {
        $db = \Config\Database::connect();
        $this->builder = $db->table($this->table);
    }

    public function getAllOrderDetails()
    {
        return $this->builder()->get()->getResultArray();
    }

    public function saveOrderDetails($data)
    {
        $this->builder()->insert($data);
    }

    public function getOrderDetailsReceipt()
    {
        $conditions = [
            'order_id' => session()->get('order_id'),
            'customer_id' => session()->get('user_id'),
        ];
        return $this->builder()->where($conditions)->get()->getResultArray();
    }

    // important function for the analytics details
    public function highestPurchaseAmount()
    {
        return $this->builder()->selectMax('orderdetails_total')->get()->getResultArray()[0]['orderdetails_total'];
    }

    public function lowestPurchaseAmount()
    {
        return $this->builder()->selectMin('orderdetails_total')->get()->getResultArray()[0]['orderdetails_total'];
    }

    public function averagePurchaseAmount()
    {
        return $this->builder()->selectAvg('orderdetails_total')->get()->getResultArray()[0]['orderdetails_total'];
    }

    public function genderWithMostPurchases()
    {
        return $this->builder()->groupBy('gender')->orderBy('order_quantity', 'DESC')->select('gender')->get()->getResultArray()[0]['gender'];
    }

    public function genderWithLeastPurchases()
    {
        return $this->builder()->groupBy('gender')->orderBy('order_quantity', 'ASC')->select('gender')->get()->getResultArray()[0]['gender'];
    }

    public function highestQuantityInOnePurchase()
    {
        return $this->builder()->selectMax('order_quantity')->get()->getResultArray()[0]['order_quantity'];
    }

    public function lowestQuantityInOnePurchase()
    {
        return $this->builder()->selectMin('order_quantity')->get()->getResultArray()[0]['order_quantity'];
    }

    public function averageQuantityInOnePurchase()
    {
        return $this->builder()->selectAvg('order_quantity')->get()->getResultArray()[0]['order_quantity'];
    }

    public function totalItemsPurchased()
    {
        return $this->builder()->selectSum('order_quantity')->get()->getResultArray()[0]['order_quantity'];
    }

    public function mostPurchasedProduct()
    {
        $itemModel = new ItemModel();
        $mostPI_id = $this->builder()->groupBy('product_id')->orderBy('order_quantity', 'ASC')->get()->getResultArray()[0]['product_id'];
        $product_name = $itemModel->getItemWithId($mostPI_id)['product_name'];
        return $product_name;
    }

    public function leastPurchasedProduct()
    {
        $itemModel = new ItemModel();
        $leastPI_id = $this->builder()->groupBy('product_id')->orderBy('order_quantity', 'DESC')->get()->getResultArray()[0]['product_id'];
        $product_name = $itemModel->getItemWithId($leastPI_id)['product_name'];
        return $product_name;
    }

    public function mostPurchasedSubcategory()
    {
        $subcategoryModel = new SubcategoryModel();
        $mostPSub_id = $this->builder()->groupBy('subcategory_id')->orderBy('order_quantity', 'ASC')->get()->getResultArray()[0]['subcategory_id'];
        $subcategory_name = $subcategoryModel->getSubcategoryWithId($mostPSub_id)['subcategory_name'];
        return $subcategory_name;
    }

    public function leastPurchasedSubcategory()
    {
        $subcategoryModel = new SubcategoryModel();
        $mostPSub_id = $this->builder()->groupBy('subcategory_id')->orderBy('order_quantity', 'DESC')->get()->getResultArray()[0]['subcategory_id'];
        $subcategory_name = $subcategoryModel->getSubcategoryWithId($mostPSub_id)['subcategory_name'];
        return $subcategory_name;
    }

    public function userWithMostPurchases()
    {
        $userModel = new UserModel();
        $userMP_id = $this->builder()->groupBy('customer_id')->orderBy('order_quantity', 'ASC')->get()->getResultArray()[0]['customer_id'];
        $firstName = $userModel->getUserWithId($userMP_id)['first_name'];
        $lastName = $userModel->getUserWithId($userMP_id)['last_name'];
        return $firstName . ' ' . $lastName;
    }

    public function userWithLeastPurchases()
    {
        $userModel = new UserModel();
        $userMP_id = $this->builder()->groupBy('customer_id')->orderBy('order_quantity', 'DESC')->get()->getResultArray()[0]['customer_id'];
        $firstName = $userModel->getUserWithId($userMP_id)['first_name'];
        $lastName = $userModel->getUserWithId($userMP_id)['last_name'];
        return $firstName . ' ' . $lastName;
    }

    public function averagePurchaseAmountPerUser()
    {
        return $this->builder()->groupBy('customer_id')->selectAvg('orderdetails_total')->get()->getResultArray()[0]['orderdetails_total'];
    }

    public function usersForLastPurchaseDate()
    {
        $userModel = new UserModel();
        $lastDate = substr($this->builder()->get()->getLastRow()->created_at, 0, 10);
        $ids = $this->builder()->like('created_at', $lastDate, 'left')->distinct()->select('customer_id')->get()->getResultArray();
        $final_ids = array();
        foreach ($ids as $id) {
            foreach ($id as $id_2) {
                array_push($final_ids, $id_2);
            }
        }
        return $userModel->getUserWhereIdIn($final_ids);
    }

    public function usersForItem($id){
        $userModel=new UserModel();
        $ids=$this->builder()->where(['product_id'=>$id])->select('customer_id')->distinct()->get()->getResultArray();
        $final_ids = array();
        foreach ($ids as $id) {
            foreach ($id as $id_2) {
                array_push($final_ids, $id_2);
            }
        }
        return $userModel->getUserWhereIdIn($final_ids);
    }

    public function usersForItemAndDate($id,$date){
        $userModel=new UserModel();
        $ids=$this->builder()->where(['product_id'=>$id])->like('created_at',$date, 'both')->select('customer_id')->distinct()->get()->getResultArray();
        $final_ids = array();
        foreach ($ids as $id) {
            foreach ($id as $id_2) {
                array_push($final_ids, $id_2);
            }
        }
        return $userModel->getUserWhereIdIn($final_ids);
    }

    public function productIdsByCustomerId($id){
        return $this->builder()->where(['customer_id'=>$id])->select('product_id')->distinct()->get()->getResultArray();
    }

    public function productIdsBySalesVolumes($salesVolume){
        return $this->builder()->where(['order_quantity'=>$salesVolume])->get()->getResultArray();
    }

    public function getTransactions(){
        return $this->builder()->get()->getResultArray();
    }

    public function getTransactionsWhereDateBetween($date_start,$date_end){
        return $this->builder()->where(['created_at>'=>$date_start,'created_at<'=>$date_end])->get()->getResultArray();
    }

    public function getTransactionsWhereProductId($product_id){
        return $this->builder()->where(['product_id'=>$product_id])->get()->getResultArray();
    }

}
