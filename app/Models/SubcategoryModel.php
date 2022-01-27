<?php

namespace App\Models;
use CodeIgniter\Model;

class SubcategoryModel extends Model
{
    protected $table='subcategories';
    protected $allowedFields=['subcategory_id','subcategory_name','category','is_deleted'];
    protected $primaryKey='subcategory_id';
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

    public function getAllSubcategories()
    {
        return $this->builder->get()->getResultArray();
    }

    public function getSubcategoryWithId($id)
    {
        return $this->builder->where('subcategory_id',$id)->get()->getResultArray()[0];
    }

    public function editSubcategory($id, $data)
    {
        $this->builder->where(['subcategory_id'=>$id])->update($data);
    }

}

?>