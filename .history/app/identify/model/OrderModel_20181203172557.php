<?php
namespace app\identify\model;

use think\Model;
use app\identify\model\FieldModel;

class OrderModel extends Model
{
    public function doOrder($data){
        $userId = cmf_get_current_user_id();
        
        $fields = $data['field']['data'];

        $fields = json_encode($fields);

        $attachment = '';

        if(!empty($data['file_name']) && !empty($data['file_url'])){
            $attachment = ['file_name' => $data['file_name'], 'file_url' => $data['file_url']];
            $attachment = json_encode($attachment);
        }

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

    public function fields($user_id){

        $orders = $this->where('user_id',$user_id)->select();
        
        $fieldsModel = new FieldModel();
    
        foreach($orders as $key => $order){
            //处理fields
            $fields = $order['fields'];
            $fields = json_decode($fields,true);
            $fields_list = $fieldsModel::all($fields)->toArray();
            $orders[$key]['fields_list'] = $fields_list;

            //处理附件
            $attachment = $order['attachment'];
            $attachment = json_decode($attachment, true);
        }

        return $orders;
    }
}
?>