<?php
// +----------------------------------------------------------------------
// | ThinkCMF [ WE CAN DO IT MORE SIMPLE ]
// +----------------------------------------------------------------------
// | Copyright (c) 2013-2018 http://www.thinkcmf.com All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: 老猫 <thinkcmf@126.com>
// +----------------------------------------------------------------------
namespace app\portal\controller;

use cmf\controller\HomeBaseController;
use app\portal\model\PortalCategoryModel;
use think\Db;

class ListController extends HomeBaseController
{
    public function index()
    {
        $id                  = $this->request->param('id', 0, 'intval');
        $portalCategoryModel = new PortalCategoryModel();

        $category = $portalCategoryModel->where('id', $id)->where('status', 1)->find();

        
        $selected = Db::name('portal_category')->where('id', $id)->find();
        $path = $selected['path'];
        $path = explode("-", $path);
        $topId = $path[1];
        $topCategory = Db::name('portal_category')->where('id', $topId)->find();


        $categoryTree = $portalCategoryModel->adminCategoryTreeFrontend($id , $topId);

       
        $this->assign('category', $category);
        $this->assign('categoryTree', $categoryTree);
        $this->assign('topCategory',$topCategory);

        $listTpl = empty($category['list_tpl']) ? 'list' : $category['list_tpl'];

        return $this->fetch('/' . $listTpl);
    }

}
