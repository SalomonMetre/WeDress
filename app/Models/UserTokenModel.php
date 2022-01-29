<?php

namespace App\Models;
use CodeIgniter\Model;

class UserTokenModel extends Model{

    protected $table='apiusers';
    protected $allowedFields=['apiuser_id','user_id','key','created_at','updated_at','added_by','is_deleted'];
    protected $useTimestamps=true;
    protected $primaryKey='apiuser_id';
    protected $createdField='created_at',$updatedField='updated_at';
    protected $db,$builder;
    
    public function __construct(){
        $db=\Config\Database::connect();
        $this->builder=$db->table($this->table);
    }

    public function saveAccessToken($data){
        $this->builder()->insert($data);
    }

    public function getAccessKey($id){
        return $this->builder()->where(['user_id'=>$id])->get()->getResultArray();
    }

    public function isAccessKeyValid($key){
        return count($this->builder()->where('key',$key)->get()->getResultArray())>0?true:false;
    }
}


?>