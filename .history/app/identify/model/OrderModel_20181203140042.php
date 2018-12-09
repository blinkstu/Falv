<?php
namespace app\identify\model;

use think\Model;

class OrderModel extends Model
{
    public function doOrder($data){
        $userId = cmf_get_current_user_id();
        $insert = [
            'user_id' => $userId,
            'institution_user_id' => 0,
            'status'              => 0,
            'fields'              => $fields,
            'discription'         => $data['discription'],
            'attachment'          => $data['attachment'],
        ]

    }
}
?>