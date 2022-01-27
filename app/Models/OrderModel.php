<?php

namespace App\Models;
use CodeIgniter\Model;

class OrderModel extends Model{

    protected $table='orders';
    protected $allowedFields=['order_id','customer_id','order_amount','order_status','created_at','updated_at','payment_type','is_deleted'];
    protected $primaryKey='order_id';
    protected $db,$builder;

    public function __construct(){
        $db=\Config\Database::connect();
        $this->builder=$db->table($this->table);
    }

    public function getAllOrders(){
        return $this->builder()->get()->getResultArray();
    }

    public function saveOrder($data){
        $this->builder()->insert($data);
    }

    public function getOrderWithId($id){
        return $this->builder()->where(['order_id'=>$id])->get()->getResultArray();
    }

    public function updateOrder($id,$data){
        $this->builder()->where(['order_id'=>$id])->update($data);
    }

    public function getPurchaseHistory(){
        $user_id=session()->get('user_id');
        return $this->builder()->where('customer_id',$user_id)->orderBy('created_at','DESC')->get()->getResultArray();
    }
}
