<?php
namespace app\admin\controller;

use think\Db;
use app\admin\model\UserModel;
use cmf\controller\AdminBaseController;
use app\admin\model\FieldModel;

class FieldController extends AdminBaseController
{
    function index(){
        $UserModel = new UserModel;
        $user = $UserModel->Where('id',1)->with('field')->find();
        //dump($user->toArray());
 
        return  $this->fetch('admin_field');
    }

    function fieldFetch(){
        $param = $this->request->param();
        $FieldModel = new FieldModel;
        $count = $FieldModel->order('id desc')->select();
        $field = $FieldModel->order('id desc')->page($param['page'].','.$param['limit'])->select();
        
        $field = $field->toArray();
        //$field = json_encode($field);

        $data = [
            'code' => 0,
            'msg' => '',
            'count' => count($count),
            'data' => $field
        ];

        return json_encode($data);

    }

    function deletePost(){
        $param = $this->request->param();
        $id =$param['id'];

        Db::name('field')->where('id',$id)->delete();
        Db::name('field_user')->where('field_id',$id)->delete();

        return $this->success('删除成功');
    }

    function editPost(){
        $param = $this->request->param();
        $id = $param['id'];
        $name = $param['name'];
        
        if($name == ''){
            return $this->error('不能为空值');
        }

        Db::name('field')->update([
            'id'=>$id,
            'name'=>$name
        ]);

        return $this->success("修改成功");
    }

    function addPost(){
        $param = $this->request->param();
        $name = $param['name'];

        Db::name('field')->insert([
            'name' => $name
        ]);

        return $this->success('添加成功');
    }
}