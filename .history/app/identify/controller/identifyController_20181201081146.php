<?php
namespace app\identify\controller;

use cmf\controller\UserBaseController;

class identifyController extends UserBaseController
{
    public function newIndentifyCase
    {
        return $this->fetch('new_case');
    }
}