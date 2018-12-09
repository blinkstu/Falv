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
use think\Db;

class SearchController extends HomeBaseController
{
    public function index()
    {
        $param = $this->request->param();
        $keyword = $param['keyword'];
        if(empty($param['page'])){
            $page = 1;
        }else{
            $page = $param['page'];
        }


        if (empty($keyword)) {
            $this -> error("关键词不能为空！请重新输入！");
        }


        $articles = Db::name('portal_post')
        ->where('post_title',['like','%'.$keyword.'%'],['like','%'.$keyword.'%'])
        ->whereOr('post_content',['like','%'.$keyword.'%'],['like','%'.$keyword.'%'])
        ->paginate(10);

        //dump($articles);

        $this->assign('articles',$articles);

        $this -> assign("keyword", $keyword);
        return $this->fetch('/search');
    }
}
