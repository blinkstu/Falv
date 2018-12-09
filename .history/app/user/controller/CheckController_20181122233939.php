<?php
namespace app\user\controller;

use think\Db;
use cmf\controller\UserBaseController;
use app\user\model\UserModel;
use app\user\model\FieldModel;


class CheckController extends UserBaseController
{
    public function index(){
        $userModel = new UserModel();
        $userId = cmf_get_current_user_id();
        $user = $userModel->with('field')->where('id',$userId)->find()->toArray();
        $this->assign('user',$user);
        dump($user);
        return $this->fetch('check');
    }
}