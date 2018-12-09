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

            $jsonFild = json_encode($data['field']['data']);

            $Institution = [
                'id'=>$id,
                'user_id' => $user_id,
                'real_name' => $data['real_name'],
                'institution_name' => $data['institution_name'],
                'city_id' => $data['userCityId'],
                'field' => $jsonField,
                'phone_number' => $data['phone_number'],
            ];
            Db::name('institution')->update($Institution);

            Db::name('role_user')->insert([
                'user_id' => $user_id,
                'role_id' => 2, //机构用户
            ]);

            foreach ($data['field']['data'] as $item) {
                Db::name('field_user')->insert([
                    'user_id' => $user_id,
                    'field_id' => $item,
                ]);
            }

            //dump($data);
            return $this->success('注册成功');

            //dump($data);
            $this->success('成功');
        }
    }
}
