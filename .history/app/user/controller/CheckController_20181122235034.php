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
        foreach ($field as $key => $item) {
            //if($item['id'])
        }
        $merge = array_intersect($field, $fullField);
        dump($fullField);
        dump($field);
        dump($merge);
        return $this->fetch('check');
    }

    private function array_search_re($needle, $haystack, $a = 0, $nodes_temp = array())
    {
        global $nodes_found;
        $a++;
        foreach ($haystack as $key1 => $value1) {
            $nodes_temp[$a] = $key1;
            if (is_array($value1)) {
                array_search_re($needle, $value1, $a, $nodes_temp);
            } else if ($value1 === $needle) {
                $nodes_found[] = $nodes_temp;
            }
        }
        return $nodes_found;
    }
}
