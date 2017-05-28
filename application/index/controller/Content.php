<?php

namespace app\index\controller;


class Content extends Common
{

	public function index()
	{


		$arc_id = input('param.arc_id');
		db('article')->where('arc_id',$arc_id)->setInc('arc_click');
		$articleData = db('article')->field('arc_id,arc_title,arc_author,arc_content,sendtime')->find($arc_id);
		$headConf = ['title'=>"后盾教学博客--{$articleData['arc_title']}"];
		$this->assign('headConf',$headConf);

		$articleData['tags'] = db('arc_tag')->alias('at')
		->join('__TAG__ t','at.tag_id=t.tag_id')
			->where('at.arc_id',$articleData['arc_id'])->field('t.tag_id,t.tag_name')->select();

		$this->assign('articleData',$articleData);
		return $this->fetch();
	}
}
