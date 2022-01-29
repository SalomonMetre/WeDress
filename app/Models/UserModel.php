<?php

namespace App\Models;
use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table='users';
    protected $allowedFields=['user_id','first_name','last_name','email','password','role','is_deleted','approved'];
    protected $primaryKey='user_id';
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

    public function getData($conditions)
    {
        return $this->builder->where($conditions)->limit(1)->get()->getResultArray();
    }

    public function getAllUsers()
    {
        return $this->builder->get()->getResultArray();
    }

    public function getUserWithId($user_id)
    {
        return $this->builder->where(['user_id'=>$user_id])->get()->getResultArray()[0];
    }

    public function editUser($user_id, $data)
    {
        $this->builder->where('user_id',$user_id)->update($data);
    }

    public function getUserWithEmail($email){
        return $this->builder->where(['email'=>$email])->get()->getResultArray();
    }

    public function getUserWithGender($gender){
        return $this->builder()->where(['gender'=>$gender])->get()->getResultArray();
    }

    public function getUserWhereIdIn($ids){
        return $this->builder()->whereIn('user_id',$ids)->get()->getResultArray();
    }

    public function getUserWithGenderAndFilter($gender,$filter){
        return $this->builder()->like('first_name',$filter)->orLike('last_name',$filter)->where('gender',$gender)->get()->getResultArray();
    }

}

?>