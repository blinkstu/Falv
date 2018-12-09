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
        $field = $user['field'];
        $fullField = Db::name('field')->select()->toArray();
        //$result=array_intersect($field,$fullField);
        foreach($field as $key => $item){
            unset($field[$key]['pivot']);
        }
        $merge = array_merge($field , $fullField);
        dump($fullField);
        dump($field);
        dump($merge);
        return $this->fetch('check');
    }
}