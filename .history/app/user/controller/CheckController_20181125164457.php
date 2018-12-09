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
        $user = $userModel->with('field,institution')->where('id', $userId)->find()->toArray();
        $this->assign('user', $user);
        $field = $user['field'];
        $fullField = Db::name('field')->select()->toArray();
        $exceptField = array();
        //$result=array_intersect($field,$fullField);
        foreach ($fullField as $key => $item) {
            $result = $this->search($field , $item['id']);
            if($result == null){
                $exceptField[] = $item;
            }
        }

        //dump($user['institution']);

        $this->assign('institution', $user['institution']);
        $this->assign('user',$user);
        $this->assign('field',$field);
        $this->assign('exceptField',$exceptField);

        return $this->fetch('check');
    }


    private function search($field,$find){
        foreach ($field as $key => $vo) {
            if ($vo['id'] == $find) {
                return 1;
            }
        }
    }

    public function editProfilePost(){
        if($this->request->isPost()){
                    $data = $this->request->param();
                    $rules = [
            'user_login' => 'require|unique:user',
            'captcha' => 'require',
            'code' => 'require',
            'password' => 'require|min:6|max:32',
            'real_name' => 'require|chs',
            'institution_name' => 'require',
            'userCityId' => 'require|number',
            'phone_number' => 'require|number',
            'accept' => 'accepted',
        ];

        $isOpenRegistration = cmf_is_open_registration();

        if ($isOpenRegistration) {
            unset($rules['code']);
        }

        $validate = new Validate($rules);
        $validate->message([
            'user_login' => '用户名不能为空',
            'user_login.unique' => '用户名已存在',
            'code.require' => '验证码不能为空',
            'code.require' => '验证码不能为空',
            'password.require' => '密码不能为空',
            'password.max' => '密码不能超过32个字符',
            'password.min' => '密码不能小于6个字符',
            'captcha.require' => '验证码不能为空',
            'real_name.require' => '真实姓名不能为空',
            'institution_name.require' => '机构名称不能为空',
            'userCityId.require' => '所在地不能为空',
            'phone_number.require' => '联系方式不能为空',
            'real_name.chs' => '真实姓名格式错误',
            'userCityId.number' => '所在地格式错误',
            'phone_number.number' => '联系方式格式错误',
            'accept.accepted' => '请阅读并接受《华信网站点服务条款》',
        ]);

        $data = $this->request->post();
        if (!$validate->check($data)) {
            $this->error($validate->getError());
        }

            $userId = cmf_get_current_user_id();

            $jsonField = json_encode($data['field']['data']);

            $Institution = [
                'id'                => $data['id'],
                'real_name'         => $data['real_name'],
                'institution_name'  => $data['institution_name'],
                'city_id'           => $data['userCityId'],
                'field'             => $jsonField,
                'phone_number'      => $data['phone_number'],
            ];
            Db::name('institution')->update($Institution);

            Db::name('field_user')->where('user_id', $userId)->delete();
            foreach ($data['field']['data'] as $item) {
                Db::name('field_user')->insert([
                    'user_id' => $userId,
                    'field_id' => $item,
                ]);
            }
            //dump($data);
            $this->success('成功');
        }
    }
}
