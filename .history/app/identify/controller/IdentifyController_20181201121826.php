<?php
namespace app\identify\controller;

use cmf\controller\UserBaseController;

class IdentifyController extends UserBaseController
{
    public function newIdentifyCase()
    {
        $field = think\Db::name('field')->select();
        $this->assign('field',$field);
        return $this->fetch(':new_case');
    }
}