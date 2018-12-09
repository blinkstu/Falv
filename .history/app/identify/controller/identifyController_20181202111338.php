<?php
namespace app\identify\controller;

use cmf\controller\UserBaseController;
use think\Db;

class IdentifyController extends UserBaseController
{
    public function newIdentifyCase()
    {
        $field = Db::name('field')->select();
        $userId = cmf_get_current_user_id();
        $user = Db::name('user')->where('id',$userId)->find();
        $this->assign('field',$field);
        return $this->fetch(':new_case');
    }

    public function newCasePost(){

    }
}