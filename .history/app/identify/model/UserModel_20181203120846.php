<?php
namespace app\identify\model;

use think\Model;

class UserModel extends Model{

    public function address(){
        return $this->hasMany('AddressModel');
    }
}