<?php

namespace app\index\controller;

use think\Controller;
use think\Request;

class Common extends Controller
{
    public function __construct ( Request $request = null )
	{
		parent::__construct( $request );

		$webset = $this->loadWebSet();
		$this->assign('_webset',$webset);

		$cateData = $this->loadCateData();
		$this->assign('_cateData',$cateData);

		$allCateData = $this->localAllCateData();
		$this->assign('_allCateData',$allCateData);

		$tagData = $this->loadTagData();
		$this->assign('_tagData',$tagData);

		$articleData = $this->loadArticleData();
		$this->assign('_articleData',$articleData);

		$linkData = $this->loadLinlData();
		$this->assign('_linkData',$linkData);
	}

	private function loadLinlData()
	{
		return db('link')->order('link_sort desc')->select();
	}

	private function loadArticleData()
	{
		return db('article')->order('sendtime desc')->limit(2)->field('arc_id,arc_title,sendtime')->select();
	}

	private function loadTagData()
	{
		return db('tag')->select();
	}

	private function localAllCateData()
	{
		return db('cate')->order('cate_sort desc')->select();
	}

	private function loadCateData(){
		return db('cate')->where('cate_pid',0)->order('cate_sort desc')->limit(3)->select();
	}

	private function loadWebSet()
	{
		return db('webset')->column('webset_value','webset_name');
	}
}
