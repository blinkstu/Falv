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
        $users = $UserModel::hasWhere('role', ['role_id' => '2'])->with('institution2,field')->order("create_time DESC")->where('user_status=3')->select();

        $users = $users->toArray();

        $data = [
            'code' => 0,
            'msg' => '',
            'count' => count($count),
            'data' => $users,
        ];

        return json_encode($data);

    }

    public function passPost(){
        $data = $this->request->param();
        $id = $data['id'];
        Db::name('user')->where('id',$id)->update();
    }

    public function refusePost(){
        $data = $this->request->param();

    }
}
