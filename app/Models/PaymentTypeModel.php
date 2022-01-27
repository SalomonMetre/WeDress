<?php

namespace App\Models;
use CodeIgniter\Model;

class PaymentTypeModel extends Model{

    protected $table='paymenttypes';
    protected $allowedFields=['paymenttype_id','paymenttype_name','description','is_deleted'];
    protected $primaryKey='paymenttype_id';
    protected $db,$builder;

    public function __construct(){
        $db=\Config\Database::connect();
        $this->builder=$db->table($this->table);
    }

    public function getAllPaymentTypes(){
        return $this->builder()->get()->getResultArray();
    }
}
