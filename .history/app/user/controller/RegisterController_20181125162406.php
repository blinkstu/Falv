<?php
// +----------------------------------------------------------------------
// | ThinkCMF [ WE CAN DO IT MORE SIMPLE ]
// +----------------------------------------------------------------------
// | Copyright (c) 2013-2018 http://www.thinkcmf.com All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: Powerless < wzxaini9@gmail.com>
// +----------------------------------------------------------------------
namespace app\user\controller;

use cmf\controller\HomeBaseController;
use think\Validate;
use app\user\model\UserModel;
use think\Db;

class RegisterController extends HomeBaseController
{

    /**
     * 前台用户注册
     */
    public function index()
    {
        $redirect = $this->request->post("redirect");
        if (empty($redirect)) {
            $redirect = $this->request->server('HTTP_REFERER');
        } else {
            $redirect = base64_decode($redirect);
        }
        session('login_http_referer', $redirect);

        if (cmf_is_user_login()) {
            return redirect($this->request->root() . '/');
        } else {
            return $this->fetch(":register");
        }
    }

    /**
     * 前台用户注册提交
     */
    public function doRegister()
    {
        if ($this->request->isPost()) {
            $rules = [
                'user_login'=> 'require|unique:user',
                'captcha'  => 'require',
                'code'     => 'require',
                'password' => 'require|min:6|max:32',

            ];

            $isOpenRegistration = cmf_is_open_registration();

            if ($isOpenRegistration) {
                unset($rules['code']);
            }

            $validate = new Validate($rules);
            $validate->message([
                'code.require' => '验证码不能为空',
                'user_login' => '用户名不能为空',
                'user_login.unique' => '用户名已存在',
                'code.require'     => '验证码不能为空',
                'password.require' => '密码不能为空',
                'password.max'     => '密码不能超过32个字符',
                'password.min'     => '密码不能小于6个字符',
                'captcha.require'  => '验证码不能为空',
            ]);

            $data = $this->request->post();
            if (!$validate->check($data)) {
                $this->error($validate->getError());
            }

            $captchaId = empty($data['_captcha_id']) ? '' : $data['_captcha_id'];
            if (!cmf_captcha_check($data['captcha'], $captchaId)) {
                $this->error('验证码错误');
            }

            if (!$isOpenRegistration) {
                $errMsg = cmf_check_verification_code($data['username'], $data['code']);
                if (!empty($errMsg)) {
                    $this->error($errMsg);
                }
            }

            $register          = new UserModel();
            $user['user_pass'] = $data['password'];
            $user['user_login'] = $data['user_login'];
            if (Validate::is($data['username'], 'email')) {
                $user['user_email'] = $data['username'];
                $log                = $register->register($user, 3);
            } else if (cmf_check_mobile($data['username'])) {
                $user['mobile'] = $data['username'];
                $log            = $register->register($user, 2);
            } else {
                $log = 2;
            }
            $sessionLoginHttpReferer = session('login_http_referer');
            $redirect                = empty($sessionLoginHttpReferer) ? cmf_get_root() . '/' : $sessionLoginHttpReferer;
            $redirect = cmf_get_root() . '/user/profile/center';
            switch ($log) {
                case 0:
                    $this->success('注册成功', $redirect);
                    break;
                case 1:
                    $this->error("您的账户已注册过");
                    break;
                case 2:
                    $this->error("您输入的账号格式错误");
                    break;
                default :
                    $this->error('未受理的请求');
            }

        } else {
            $this->error("请求错误");
        }

    }

    public function doRegisterInstitution()
    {
        if ($this->request->isPost()) {
            $rules = [
                'user_login' => 'require|unique:user',
                'captcha' => 'require',
                'code' => 'require',
                'password' => 'require|min:6|max:32',
                'real_name' => 'require|chs',
                'institution_name' => 'require',
                'userCityId'  => 'require|number',
                'phone_number'=> 'require|number',
                'accept'=> 'accepted'
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
                'real_name.require'=>'真实姓名不能为空',
                'institution_name.require' => '机构名称不能为空',
                'userCityId.require' => '所在地不能为空',
                'phone_number.require' => '联系方式不能为空',
                'real_name.chs' => '真实姓名格式错误',
                'userCityId.number' => '所在地格式错误',
                'phone_number.number' => '联系方式格式错误',
                'accept.accepted'=> '请阅读并接受《华信网站点服务条款》'
            ]);

            $data = $this->request->post();
            if (!$validate->check($data)) {
                $this->error($validate->getError());
            }
            
            if(empty($data['field']['data']) || count($data['field']['data']) == 0){
                $this->error('擅长领域不能为空');
            }

            $captchaId = empty($data['_captcha_id']) ? '' : $data['_captcha_id'];
            if (!cmf_captcha_check($data['captcha'], $captchaId)) {
                $this->error('验证码错误');
            }

            if (!$isOpenRegistration) {
                $errMsg = cmf_check_verification_code($data['username'], $data['code']);
                if (!empty($errMsg)) {
                    $this->error($errMsg);
                }
            }

            $register = new UserModel();
            $user['user_pass'] = $data['password'];
            $user['user_login'] = $data['user_login'];
            if (Validate::is($data['username'], 'email')) {
                $user['user_email'] = $data['username'];
                $log = $register->registerInsitituion($user, 3);
            } else if (cmf_check_mobile($data['username'])) {
                $user['mobile'] = $data['username'];
                $log = $register->registerInsitituion($user, 2);
            } else {
                $log = ['code'=>2];
            }
            $sessionLoginHttpReferer = session('login_http_referer');
            $redirect = empty($sessionLoginHttpReferer) ? cmf_get_root() . '/' : $sessionLoginHttpReferer;
            $redirect = cmf_get_root() . '/user/profile/center';
            switch ($log['code']) {
                case 0:
                    $this->doInstituion($data,$log['user_id']);
                    break;
                case 1:
                    $this->error("您的账户已注册过");
                    break;
                case 2:
                    $this->error("您输入的账号格式错误");
                    break;
                default:
                $this->error("未知错误");
            }

        } else {
            $this->error("请求错误");
        }
    }



    public function doInstituion($data,$user_id){

        $jsonFild = json_encode($data['field']['data']);

        $newInstitution = [
            'user_id' => $user_id,
            'real_name' => $data['real_name'],
            'institution_name'=> $data['institution_name'],
            'city_id'=> $data['userCityId'],
            'field' => $jsonFild,
            'phone_number'=> $data['phone_number']
        ];
        Db::name('institution')->insert($newInstitution);

        Db::name('role_user')->insert([
            'user_id' => $user_id,
            'role_id' => 2 //机构用户
        ]);

        foreach($data['field']['data'] as $item){
            Db::name('field_user')->insert([
                'user_id' => $user_id,
                'field_id' => $item
            ]);
        }

        //dump($data);
        return $this->success('注册成功');

    }
}