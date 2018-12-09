<?php
namespace app\user\controller;

use think\Db;
use cmf\controller\AdminBaseController;

class AdminCheckController extends AdminBaseController
{
    public function index(){
        return $this->fetch(':admin_check');
    }
}
