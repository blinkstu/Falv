<?php
namespace app\user\controller;

use think\Db;
use cmf\controller\AdminBaseController;
use app\user\model\UserModel;

class AdminCheckController extends AdminBaseController
{
    public function index(){
        return $this->fetch('admin_check');
    }

    public function userFetch(){
        $param = $this->request->param();
        $UserModel = new UserModel;
        $count = $UserModel::hasWhere('role', ['role_id' => '2'])->order("create_time DESC")->where('user_status=2')->select();
        $field = $UserModel->order('id desc')->page($param['page'] . ',' . $param['limit'])->select();

        $field = $field->toArray();

        $data = [
            'code' => 0,
            'msg' => '',
            'count' => count($count),
            'data' => $field,
        ];

        return json_encode($data);

    }
}
