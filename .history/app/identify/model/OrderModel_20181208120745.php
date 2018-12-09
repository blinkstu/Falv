<?php
namespace app\identify\model;

use think\Model;
use app\identify\model\FieldModel;
use think\Db;

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

        $order_id = $this->gennerateOrderId($result);

        $this->save(['out_trade_no'=>$order_id],['id'=>$result]);
        
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
        $p1 = $this->subnumber($order_id);
        $p2 = $this->subnumber($userId);
        $p3 = $this->subnumber(time());

        $number = $p0 . $p1 . $p2 . $p3;

        return $number;
    }


    /**
     * 格式化订单中的 领域 附件
     * **/
    public function ordersFormat($user_id){

        $orders = $this->order('id desc')->where('user_id',$user_id)->select();
        
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

            //处理地址
            $address_id = $order['address_id'];
            $address = Db::name('address')->find($address_id);
            $orders[$key]['address'] = $address['province'].' '.$address['city'].' '.$address['district'].' '.$address['street'].$address['details'];
        }

        return $orders;
    }

    public function findOrder($id){

        $order = $this->find($id);

        if($order == null){
            return null;
        }

        //处理fields
        $fieldsModel = new FieldModel();
        $fields = $order['fields'];
        $fields = json_decode($fields,true);
        $fields_list = $fieldsModel::all($fields)->toArray();
        $order['fields_list'] = $fields_list;

        //处理附件
        $attachment = $order['attachment'];
        $attachment = json_decode($attachment, true);
        $order['attachment'] = $attachment;

        //处理地址
        $address_id = $order['address_id'];
        $address = Db::name('address')->find($address_id);
        $order['address'] = $address['province'].' '.$address['city'].' '.$address['district'].' '.$address['street'].$address['details'].' '. $address['name'] . '收 ' .$address['phone'];

        return $order;
    }
}
?>