<?php
namespace app\identify\controller;

use cmf\controller\UserBaseController;
use think\Db;
use app\identify\model\UserModel;
use think\Validate;

class IdentifyController extends UserBaseController
{
    public function newIdentifyCase()
    {
        $field = Db::name('field')->select();

        $userId = cmf_get_current_user_id();

        $userModel = new UserModel;

        $user = $userModel->with('address')->where('id',$userId)->order('id asc')->find()->toArray();

        $this->assign('address',$user['address']);

        $this->assign('user',$user);

        $this->assign('field',$field);

        return $this->fetch(':new_case');
    }

    public function newCasePost(){
        $data = $this->request->param();
        
        $rules = [
            'fields'        => 'require',
            'discription'   => 'require',
            'city_id'       => 'require',
            'address_text'  => 'require'
        ];

        $validate = new Validate($rule);

        
    }
}