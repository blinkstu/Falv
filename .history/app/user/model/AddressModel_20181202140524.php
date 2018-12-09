<?php
namespace app\user\model;

use think\Model;

class AddressModel extends Model{

    public function newAddress($data){
        if (!empty($data)) {
            $userId = cmf_get_current_user_id();
            $insert = [
                'user_id'  => $userId,
                'province' => $data['province'],
                'city'     => $data['city'],
                'district' => $data['district'],
                'street'   => $data['street'],
                'details'  => $data['details']
            ];
            $this->save($insert);
            $id = $this->user_id;
            return $id;
        }
        return 0;
    }
}