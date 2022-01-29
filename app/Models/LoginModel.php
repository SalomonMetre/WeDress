<?php

namespace App\Models;
use CodeIgniter\Model;

class LoginModel extends Model
{
    protected $table='logins';
    protected $allowedFields=['userlogin_id','user_id','user_ip','login_time','logout_time','is_deleted'];
    protected $primaryKey='userlogin_id';
    protected $db, $builder;

    function __construct()
    {
        $db=\Config\Database::connect();
        $this->builder=$db->table($this->table);
    }

    public function saveData($data)
    {
        $this->builder->insert($data);
    }

    public function getLastId()
    {
        return count($this->builder->get()->getResultArray());
    }

    public function updateData($id, $data)
    {
        $this->builder->where('userlogin_id',$id)->update($data);
    }

    public function deleteData($id)
    {
        $this->builder->delete(['userlogin_id'=>$id]);
    }

    public function lastUserLogin(){
        $userModel=new UserModel();
        $id=$this->builder()->get()->getLastRow()->user_id;
        return $userModel->getUserWithId($id);
    }
}

?>