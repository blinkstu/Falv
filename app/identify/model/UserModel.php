<?php
namespace app\identify\model;

use think\Model;

class UserModel extends Model{

    public function address(){
        $result = $this->hasMany('AddressModel')->order('id desc');
        return $result; 
    }
}