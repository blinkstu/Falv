<?php
namespace app\user\controller;

use app\user\model\UserModel;
use cmf\controller\UserBaseController;
use think\Db;

class CheckController extends UserBaseController
{
    public function index()
    {
        $userModel = new UserModel();
        $userId = cmf_get_current_user_id();
        $user = $userModel->with('field')->where('id', $userId)->find()->toArray();
        $this->assign('user', $user);
        $field = $user['field'];
        $fullField = Db::name('field')->select()->toArray();
        //$result=array_intersect($field,$fullField);
        foreach ($fullField as $key => $item) {
            $num =  $this->array_search($item['name'],$fullField);
            dump($num);
        }
        dump($fullField);
        dump($field);
        return $this->fetch('check');
    }

    private function array_search($needle, $haystack)
    {
        foreach($haystack as $key => $item)
        {
            if ($item[$field] === $value )
                return $key;
        }
    }
}
