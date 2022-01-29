<?php

namespace App\Models;
use CodeIgniter\Model;

class ProductTokenModel extends Model{

    protected $table='tokens';
    protected $allowedFields=['token_id','user_id','product_name','token','created_at','expires_on','is_deleted'];
    protected $useTimestamps=true;
    protected $primaryKey='token_id';
    protected $createdField='created_at';
    protected $db,$builder;
    
    public function __construct(){
        $db=\Config\Database::connect();
        $this->builder=$db->table($this->table);
    }

    public function saveProductToken($data){
        $this->builder()->insert($data);
    }

    public function getTokensWithId($id){
        return $this->builder()->where(['user_id'=>$id])->get()->getResultArray();
    }

    public function isTokenValid($conditions){
        return count($this->builder()->where($conditions)->get()->getResultArray())>0?true:false;
    }
}


?>