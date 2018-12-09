<?php
namespace app\user\model;

use think\Model;

class AddressModel extends Model{

    public function newAddress($data){
        if (!empty($data)) {
            $userId = cmf_get_current_user_id();
            $insert = [
                'user_id'  => $userId,
                'province' => $data['userProvinceId'],
                'city'     => $data['userCityId'],
                'district' => $data['userStreet'],
                'street'   => $data['userStreet']
            ];
            $this->insert($data);
        }
        return 1;
    }
}