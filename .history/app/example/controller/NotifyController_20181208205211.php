<?php

namespace app\example\controller;

use think\Db;
use think\Log;
use think\Request;
use app\common\controller\NotifyHandler;

/**
* 通知处理控制器
*
* 完善getOrder, 获取订单信息, 注意必须数组必须包含out_trade_no与total_amount
* 完善checkOrderStatus, 返回订单状态, 按要求返回布尔值
* 完善handle, 进行业务处理, 按要求返回布尔值
*
* 请求地址为index, NotifyHandler会自动调用以上三个方法
*/
class NotifyController extends NotifyHandler
{
    protected $params; // 订单信息

    public function index()
    {
        if(!empty($_Post)){
            $uri = $this->getPostLog($_POST);
        }
        $time = date('M-d H:m:s',time());
        Log::record('['. $time .']'.'这是访问的URI'.$uri);
        dump('这是访问的URI' . $time . $uri);
        parent::init();
    }

    private function getPostLog(array $_data = array(), $n = '')
    {
        $_gPOST = empty($_data) ? I('post.') : $_data;
        $_rs = array();
        foreach ($_gPOST as $name => $value) {
            if (is_array($value)) {
                $_rs[] = getPostLog($value, $name);
            } else {
                if (!empty($_data)) {
                    $_rs[] = $n  . $name . '=' . $value;
                } else {
                    $_rs[] = $name . '=' . $value;
                }
            }
        }
        $_rs = implode('&', $_rs);
        return $_rs;
    }

    /**
     * 获取订单信息, 必须包含订单号和订单金额
     *
     * @return string $params['out_trade_no'] 商户订单
     * @return float  $params['total_amount'] 订单金额
     */
    public function getOrder()
    {
        // 以下仅示例
        $out_trade_no = $_POST['out_trade_no'];
        $order = Db::name('order')->where('out_trade_no', $out_trade_no)->find();
        $params = [
            'out_trade_no' => $order['out_trade_no'],
            'total_amount' => $order['total_amount'],
            'status'       => $order['status'],
            'id'           => $order['id']
        ];

        $this->params = $params;
    }

    /**
     * 检查订单状态
     *
     * @return Boolean true表示已经处理过 false表示未处理过
     */
    public function checkOrderStatus()
    {
        // 以下仅示例
        if($this->params['status'] == 0) {
            // 表示未处理
            return false;
        } else {
            return true;
        }
    }

    /**
     * 业务处理
     * @return Boolean true表示业务处理成功 false表示处理失败
     */
    public function handle()
    {
        // 以下仅示例
        $result = Db::name('order')->where('id', $this->params['id'])->update(['status'=>1]);
        if($result) {
            return true;
        } else {
            return false;
        }
    }
}