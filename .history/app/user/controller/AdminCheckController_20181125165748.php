<?php
namespace app\user\controller;

use think\Db;
use cmf\controller\AdminBaseController;

class AdminCheckController extends AdminBaseController
{
    public function index(){
        return $this->fetch('admin_check');
    }

    public function userFetch(){
        $param = $this->request->param();
        $FieldModel = new FieldModel;
        $count = $FieldModel->order('id desc')->select();
        $field = $FieldModel->order('id desc')->page($param['page'] . ',' . $param['limit'])->select();

        $field = $field->toArray();
        //$field = json_encode($field);

        $data = [
            'code' => 0,
            'msg' => '',
            'count' => count($count),
            'data' => $field,
        ];

        return json_encode($data);

    }
}
