<?php
namespace app\user\controller;

use app\user\model\UserModel;
use app\user\model\InstitutionModel;
use cmf\controller\UserBaseController;
use think\Db;
use think\Validate;
use think\Request;

class CheckController extends UserBaseController
{
    function _initialize()
    {
        parent::_initialize();
        $userId = cmf_get_current_user_id();
        $current_action = Request::instance()->action();
        $current_controller = Request::instance()->controller();
        $userId = cmf_get_current_user_id();
        $role = Db::name('role_user')->where('user_id', $userId)->find();
        $user = Db::name('user')->find($userId);

        $this->assign('role_info', $role);
        $this->assign('user_info', $user);
        $this->assign('current_action', $current_action);
        $this->assign('current_controller', $current_controller);

    }

    public function index()
    {
        $userModel = new UserModel();
        $userId = cmf_get_current_user_id();
        $user = $userModel->with('field,institution')->where('id', $userId)->find()->toArray();
        $this->assign('user', $user);

        if ($user['user_status'] === 3) {
            $msg ='您的账号资料当前正在审核中，审核通过后即可进行正常操作';
            $class = "warning";
        } else if ($user['user_status'] === 4) {
            $msg ='您的账号资料已被管理员拒绝，请重新提交';
            $class = "danger";
        } else if ($user['user_status'] === 5) {
            $msg = '请提交您的机构资质文件，通过审核后您可以进行更多操作';
            $class = "info";
        } else {
            $this->redirect(cmf_url('/center'));
        }

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
        $this->assign('user', $user);
        $this->assign('class', $class);
        $this->assign('msg', $msg);
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

    public function userCheckPost(){
        $data = $this->request->param();
        if(empty($data['photo_url_1']) || empty($data['photo_url_2'])){
            $this->error('请上传图片');
        }

        $qualify_pics = [
          0 => $data['photo_url_1'],
          1 => $data['photo_url_2']  
        ];

        $qualify_pics = json_encode($qualify_pics);

        $userId = cmf_get_current_user_id();
        $institutionModel = new InstitutionModel();
        $user = $institutionModel->save(['qualify_pics'=>$qualify_pics],['user_id'=>$userId]);
        if($user){
            $this->success('成功');
        } else {
            $this->error(lang('NO_NEW_INFORMATION'));
        }
    }

    public function editProfilePost(){
        if($this->request->isPost()){
            $data = $this->request->param();
            $rules = [
                'real_name' => 'require|chs',
                'institution_name' => 'require',
                'userCityId' => 'require|number',
                'phone_number' => 'require|number',
            ];
            $validate = new Validate($rules);
            $validate->message([
                'real_name.require' => '真实姓名不能为空',
                'institution_name.require' => '机构名称不能为空',
                'userCityId.require' => '所在地不能为空',
                'phone_number.require' => '联系方式不能为空',
                'real_name.chs' => '真实姓名格式错误',
                'userCityId.number' => '所在地格式错误',
                'phone_number.number' => '联系方式格式错误',
            ]);

            if (empty($data['field']['data']) || count($data['field']['data']) == 0) {
                $this->error('擅长领域不能为空');
            }

            if (!$validate->check($data)) {
                $this->error($validate->getError());
            }

            $userId = cmf_get_current_user_id();

            $jsonField = json_encode($data['field']['data']);

            $Institution = [
                'real_name'         => $data['real_name'],
                'institution_name'  => $data['institution_name'],
                'city_id'           => $data['userCityId'],
                'field'             => $jsonField,
                'phone_number'      => $data['phone_number'],
            ];
            $institutionModel = new InstitutionModel();
            if(!$institutionModel->save($Institution, ['id' => $data['id']])){
                $this->error('没有新的修改信息！');
            }

            Db::name('field_user')->where('user_id', $userId)->delete();

            //Db::name('user')->update([
            //    'id' => $userId,
            //    'user_status' => 3,
            //]);

            foreach ($data['field']['data'] as $item) {
                Db::name('field_user')->insert([
                    'user_id' => $userId,
                    'field_id' => $item,
                ]);
            }
            //dump($data);
            $this->success('保存成功');
        }
    }
}
