<?php
namespace app\identify\model;

use think\Model;
use app\identify\model\FieldModel;

class OrderModel extends Model
{
    /**
     * 格式化新建订单
     */
    public function doOrder($data){
        $userId = cmf_get_current_user_id();
        
        $fields = $data['field']['data'];

        $fields = json_encode($fields);

        $attachment = '';
        if(isset($data['files'])){
            $attachment = json_encode($data['files']);
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
        $result = $this->id;

        $order_id = (Int) $this->gennerateOrderId($result);

        $this->save(['order_id'=>$order_id],['id'=>$result]);
        
        return $result;
    }

    /**
     * 获取4位数字，如果超出4位数字就截取最后4位
     */
    private function subnumber($number){
        $var = sprintf("%04d", $number);
        if(strlen($var) > 4){
            $var = substr($var,-4);
        }
        return $var;
    }

    /**
     * 生成订单编号一共12位数字
     */
    private function gennerateOrderId($order_id){
        $userId = cmf_get_current_user_id();
        $p0 = '1';
        $p1 = (String) $this->subnumber($order_id);
        $p2 = (String) $this->subnumber($userId);
        $p3 = (String) $this->subnumber(time());

        return sprintf("%d%d%d%d", $p0, $p1, $p2, $p3 );
    }


    /**
     * 格式化订单中的 领域 附件
     * **/
    public function ordersFormat($user_id){

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
            $orders[$key]['attachment'] = $attachment;
        }

        return $orders;
    }
}
?>