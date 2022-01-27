<?php

namespace App\Models;
use CodeIgniter\Model;

class UserTokenModel extends Model{

    protected $table='apiusers';
    protected $allowedFields=['apiuser_id','username','key','created_at','updated_at','added_by','is_deleted'];
    protected $useTimestamps=true;
    protected $createdField='created_at',$updatedField='updated_at';
    protected $db,$builder;
    
    public function __construct(){
        $db=\Config\Database::connect();
        $this->builder=$db->table($this->table);
    }

    public function saveAccessToken($data){
        $this->builder()->insert($data);
    }
}


?>