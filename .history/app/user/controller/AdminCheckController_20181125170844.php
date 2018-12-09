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
        $count = $UserModel::hasWhere('role', ['role_id' => '2'])->order("create_time DESC")->where('user_status=3')->select();
        $users = $UserModel::hasWhere('role', ['role_id' => '2'])->with('institution')->order("create_time DESC")->where('user_status=3')->select();

        $users = $users->toArray();
        dump($users);

        $data = [
            'code' => 0,
            'msg' => '',
            'count' => count($count),
            'data' => $users,
        ];

        return json_encode($data);

    }
}
