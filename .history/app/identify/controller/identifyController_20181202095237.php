<?php
namespace app\identify\controller;

use cmf\controller\UserBaseController;
use think\Db;

class IdentifyController extends UserBaseController
{
    public function newIdentifyCase()
    {
        $field = Db::name('field')->select();
        $this->assign('field',$field);
        return $this->fetch(':new_case');
    }

    public function newCasePost(){
        
    }
}