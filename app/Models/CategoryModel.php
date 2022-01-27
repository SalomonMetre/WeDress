<?php

namespace App\Models;
use CodeIgniter\Model;

class CategoryModel extends Model
{
    protected $table='categories';
    protected $allowedFields=['category_id','category_name','is_deleted'];
    protected $primaryKey='category_id';
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

    public function getAllCategories()
    {
        return $this->builder->get()->getResultArray();
    }

    public function getCategoryWithId($id)
    {
        return $this->builder->where('category_id',$id)->get()->getResultArray()[0];
    }

    public function editCategory($id, $data)
    {
        $this->builder->where(['category_id'=>$id])->update($data);
    }

}

?>