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
        $count = $UserModel::hasWhere('role', ['role_id' => '2'])->order("create_time DESC")->where('user_status=3','user_status=4')->select();
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

    public function checkDetail(){
        $data = $this->request->param();

        $id = $data['id'];

        $userModel = new UserModel();

        $user = $userModel->with('institution,field')->where('id',$id)->find()->toArray();

        $qualify_pics = json_decode($user['institution']['qualify_pics'],true);

        $this->assign('user',$user);
        $this->assign('qualify_pics',$qualify_pics);

        return $this->fetch('check_detail');
    }

    public function passPost(){
        $data = $this->request->param();
        $id = $data['id'];

        //管理员操作记录
        $ADMIN_ID = cmf_get_current_user_id();
        $ADMIN = Db::name('user')->where('id', $id)->find();
        Db::name('admin_operation')->insert([
            'admin_id' => $ADMIN_ID,
            'user_id' => $id,
            'operation_time' => time(),
            'operation_desc' => '审核通过',
            'operation_type' => 1,
            //'operation_note' => $data['reason']
        ]);

        Db::name('user')->where('id',$id)->update([
            'user_status'=>1
        ]);
        $this->success('通过成功');
    }

    public function refusePost(){
        $data = $this->request->param();
        $id = $data['id'];

        if($data['reason']==''){
            return $this->error('请输入拒绝原因');
        }

        //管理员操作记录
        $ADMIN_ID = cmf_get_current_user_id();
        $ADMIN = Db::name('user')->where('id', $id)->find();
        Db::name('admin_operation')->insert([
            'admin_id' => $ADMIN_ID,
            'user_id' => $id,
            'operation_time' => time(),
            'operation_desc' => '拒绝通过',
            'operation_type' => 2,
            //'operation_note' => $data['reason']
        ]);

        Db::name('user')->where('id', $id)->update([
            'user_status' => 4,
        ]);
        $this->success('拒绝成功');
    }
}
