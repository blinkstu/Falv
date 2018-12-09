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
        foreach ($fullField as $item) {
            $num =  $this->array_search($field,'id', $item['id']);
            dump($num);
        }
        dump($fullField);
        dump($field);
        return $this->fetch('check');
    }

    private function array_search($array, $field, $value)
    {
        dump($array);
        foreach($array as $item)
        {
            if ($item['id'] === $value){
                return $item;
            }else{
                return $item['id'];
            }

        }
    }
}
