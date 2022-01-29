<?php

namespace App\Models;
use CodeIgniter\Model;

class ItemModel extends Model{

    protected $table='products';
    protected $allowedFields=['product_id','product_name','product_description','product_image','unit_price','available_quantity','subcategory_id','created_at','updated_at','added_by','is_deleted'];
    protected $primaryKey='product_id';
    protected $db,$builder;
    protected $useTimestamps=true;
    protected $createdField='created_at';
    protected $updatedField='updated_at';

    public function __construct(){
        $db=\Config\Database::connect();
        $this->builder=$db->table($this->table);
    }

    public function saveItem($data){
        $this->builder()->insert($data);
    }

    public function getAllItems(){
        return $this->builder()->get()->getResultArray();
    }

    public function updateItem($id,$data){
        $this->builder()->where(['product_id'=>$id])->update($data);
    }

    public function updateItemWhere($condition,$data){
        $this->builder()->where($condition)->update($data);
    }

    public function getItemWithId($id){
        return $this->builder()->where(['product_id'=>$id])->get()->getResultArray()[0];
    }

    public function getItemWhereIdIn($ids){
        return $this->builder()->whereIn('product_id',$ids)->get()->getResultArray();
    }

    public function getAllItemsWithDetails($subcategory_id,$price,$order){
        if($price!=0){
            return $this->builder()->where(['subcategory_id'=>$subcategory_id,'unit_price'=>$price])->orderBy('unit_price',$order==1?'DESC':'ASC')->get()->getResultArray();
        }
        return $this->builder()->where(['subcategory_id'=>$subcategory_id])->orderBy('unit_price',$order==1?'DESC':'ASC')->get()->getResultArray();
    }

    public function getDistinctPrices(){
        return $this->builder()->select('unit_price')->orderBy('unit_price','ASC')->distinct()->get()->getResultArray();
    }

    public function getItemsWithSubcategory($subcat_id){
        return $this->builder()->where(['subcategory_id'=>$subcat_id])->get()->getResultArray();
    }

    public function getProductsPurchasedByUser($id){
        $orderDetailsModel=new OrderDetailsModel();
        $ids=$orderDetailsModel->productIdsByCustomerId($id);
        $final_ids = array();
        foreach ($ids as $id) {
            foreach ($id as $id_2) {
                array_push($final_ids, $id_2);
            }
        }
        return $this->getItemWhereIdIn($final_ids);
    }

    public function getProductsBySalesVolume($salesVolume){
        $orderDetailsModel=new OrderDetailsModel();
        $ids=$orderDetailsModel->productIdsBySalesVolumes($salesVolume);
        $final_ids = array();
        foreach ($ids as $id) {
            foreach ($id as $id_2) {
                array_push($final_ids, $id_2);
            }
        }
        return $this->getItemWhereIdIn($final_ids);
    }

    public function productsWhereNameLike($name){
        return $this->builder()->like('product_name',$name,'both')->get()->getResultArray();
    }
    
}

?>