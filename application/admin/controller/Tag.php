<?php

namespace app\admin\controller;



class Tag extends Common
{
	protected $db;
	public function _initialize ()
	{
		parent::_initialize();
		$this->db = new \app\common\model\Tag();
	}

	public function index()
	{
		$field = db('tag')->paginate(2);
		$this->assign('field',$field);
		return $this->fetch();
	}
    public function store()
    {
        $tag_id = input('param.tag_id');
        if(request()->isPost())
        {
            $res = $this->db->store(input('post.'));
            if($res['valid'])
            {
                $this->success($res['msg'],'index');exit;
            }else{
                $this->error($res['msg']);exit;
            }
        }
        if($tag_id)
        {
            $oldData = $this->db->find($tag_id);

        }else{
            $oldData = ['tag_name'=>''];
        }
        $this->assign('oldData',$oldData);
        return $this->fetch();
    }

    public function del()
    {
        $tag_id = input('get.tag_id');

        if(\app\common\model\Tag::destroy($tag_id))
        {
            $this->success('操作成功','index');exit;
        }else{
            $this->error('操作失败');exit;
        }
    }

}
