<?php
namespace app\identify\model;

use think\Model;

class OrderModel extends Model
{
    public function doOrder($data){
        $userId = cmf_get_current_user_id();
        
        $fields = $data['field']['data'];

        $fields = json_encode($fields);

        $attachment = '';
        
        if(!empty($data['file_name']) && !empty($data['file_url'])){
            $attachment = ['file_name' => $data['file_name'], 'file_url' => $data['file_url']];
        }

        $attachment = json_encode($attachment);

        $insert = [
            'user_id' => $userId,
            'institution_user_id' => 0,
            'status'              => 0,
            'fields'              => $fields,
            'discription'         => $data['discription'],
            'attachment'          => $attachment,
            'city_id'             => $data['city_id'],
            'address_id'             => $data['address_id']
        ];

        $result = $this->save($insert);
        
        return $result;
    }
}
?>