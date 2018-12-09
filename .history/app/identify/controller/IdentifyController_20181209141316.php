<?php
namespace app\identify\controller;

use cmf\controller\UserBaseController;
use think\Db;
use app\identify\model\UserModel;
use think\Validate;
use app\identify\model\OrderModel;
use think\Request;
use alipay\Query;

class IdentifyController extends UserBaseController
{
    function _initialize()
    {
        parent::_initialize();
        $userId = cmf_get_current_user_id();
        $current_action = Request::instance()->action();
        $current_controller = Request::instance()->controller();
        $userId = cmf_get_current_user_id();
        $role = Db::name('role_user')->where('user_id', $userId)->find();
        $user = Db::name('user')->find($userId);

        $this->assign('role_info', $role);
        $this->assign('user_info', $user);
        $this->assign('current_action', $current_action);
        $this->assign('current_controller', $current_controller);

        if (isset($userId)) {
            $user = Db::name('user')->where('id', $userId)->find();
            $action = Request::instance()->action();
            if ($user['user_status'] == 3 || $user['user_status'] == 4) {
                //$this->redirect('/User/Check');
            }
        }
    }

    public function newIdentifyCase()
    {
        $field = Db::name('field')->select();

        $userId = cmf_get_current_user_id();

        $userModel = new UserModel;

        $user = $userModel->with('address')->where('id',$userId)->order('id asc')->find()->toArray();

        $this->assign('address',$user['address']);

        $this->assign('user',$user);

        $this->assign('field',$field);

        return $this->fetch(':new_case');
    }

    public function newCasePost(){
        $data = $this->request->param();

        $rules = [
            'field'        => 'require',
            'discription'   => 'require',
            'city_id'       => 'require',
            'address_id'    => 'require'
        ];

        $msg = [
            'city_id.require'    => '请选择城市',
            'address_id.require' => '请选择收货地址'
        ];

        $validate = new Validate($rules,$msg);
        if(!$validate->check($data)){
            $this->error($validate->getError());
        }

        $orderModel = new OrderModel();
        
        $result = $orderModel->doOrder($data);

        if($result != null){
            $this->success('提交成功',url('identify/identify/orderDetails',['id'=>$result]));
        }else{
            $this->error('出现未知错误');
        }

    }

    public function myOrder(){

        $userId = cmf_get_current_user_id();
        
        $orderModel = new OrderModel();

        $orders = $orderModel->ordersFormat($userId);

        $this->assign('orders',$orders);

        //dump($orders);
        return $this->fetch(':my_order');
    }

    public function myOrderDetails(){
        $data = $this->request->param();
        
        $id = $data['id'];

        $orderModel = new OrderModel;
    }

    public function orderDetails(){

        $data = $this->request->param();

        $id = $data['id'];

        $orderModel = new OrderModel;

        $order = $orderModel->findOrder($id);
        
        if($order == null){
            return $this->error('未找到此订单');    
        }

        switch ($order['status']) {
            case 1:
                $statusInfo = [
                    'color'=> '#4183c4',
                    'step'=>2
                ];
                break;
            default:
                $statusInfo = [
                    'color' => '#4183c4
',
                    'step' => 1
                ];
                break;
        }
        
        $order = $order->toArray();

        $this->assign('order',$order);
        $this->assign('statusInfo', $statusInfo);

        return $this->fetch(':order_details');

    }

    public function checkPayment(){
        $data = $this->request->param();
        $out_trade_no = $data['out_trade_no'];
        $result  = \alipay\Query::exec($out_trade_no);

        return json_encode($result);
    }

    public function jumpAlipay(){
        $data = $this->request->param();
        $out_trade_no = $data['out_trade_no'];
        
        $order = Db::name('order')->where('out_trade_no',$out_trade_no)->find();
        $total_amount = $order['total_amount'];

        $userId = cmf_get_current_user_id();
        if($userId != $order['user_id']){
            return $this->error('不能为其他用户付款');
        }

        $params = [
            'out_trade_no' => $data['out_trade_no'],
            'product_code' => 'FAST_INSTANT_TRADE_PAY',
            'total_amount' => $total_amount,
            'subject' => 'newtime'
        ];
        $alipay = \alipay\Pagepay::pay($params);
    }

    public function AliPay(){
        $params = [
            'app_id' => '2016092300577513',
            'out_trade_no' => '1002300111852',
            'product_code' => 'FAST_INSTANT_TRADE_PAY',
            'total_amount' => '300.00',
            'subject' => '法律鉴定服务',
            'sign_type' => 'RSA2'
        ];
        $alipay = \alipay\Pagepay::pay($params);
    }
}