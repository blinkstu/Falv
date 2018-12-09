<?php
namespace app\user\model;

use think\Model;

class AddressModel extends Model{

    public function newAddress($data){
        if (!empty($data)) {
            $userId = cmf_get_current_user_id();
        }
        return 1;
    }
}