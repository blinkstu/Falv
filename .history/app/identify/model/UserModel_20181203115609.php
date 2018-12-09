<?php
namespace app\identify\model;

use think\Model;

class UserModel extends Model{
    public function address(){
        $this->hasOne('AddressModel','user_id','id');
    }
}