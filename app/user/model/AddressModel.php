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
                'details'  => $data['details'],
                'name'  => $data['name'],
                'phone'  => $data['phone']
            ];
            $this->save($insert);
            $id = $this->id;
            return $id;
        }
        return 0;
    }
}