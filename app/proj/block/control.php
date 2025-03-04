<?php
/**
 * The control file for block module of RanZhi.
 *
 * @copyright   Copyright 2009-2018 青岛易软天创网络科技有限公司(QingDao Nature Easy Soft Network Technology Co,LTD, www.cnezsoft.com)
 * @license     ZPL (http://zpl.pub/page/zplv12.html)
 * @author      Yidong Wang <yidong@cnezsoft.com>
 * @package     block
 * @version     $Id$
 * @link        http://www.ranzhi.org
 */
class block extends control
{
    /**
     * Block Index Page.
     * 
     * @access public
     * @return void
     */
    public function index()
    {
        $lang = $this->get->lang;
        $this->app->setClientLang($lang);
        $this->app->loadLang('block');

        $mode = strtolower($this->get->mode);
        if($mode == 'getblocklist')
        {   
            echo $this->block->getAvailableBlocks();
        }   
        elseif($mode == 'getblockform')
        {   
            $code = strtolower($this->get->blockid);
            $func = 'get' . ucfirst($code) . 'Params';
            echo $this->block->$func();
        }   
        elseif($mode == 'getblockdata')
        {   
            $code = strtolower($this->get->blockid);
            $func = 'print' . ucfirst($code) . 'Block';
            $this->$func();
        }
    }

    /**
     * Block Admin Page.
     * 
     * @param  int    $index 
     * @param  string $blockID 
     * @access public
     * @return void
     */
    public function admin($index = 0, $blockID = '')
    {
        $this->app->loadLang('block', 'sys');
        $title = $index == 0 ? $this->lang->block->createBlock : $this->lang->block->editBlock;

        if(!$index) $index = $this->block->getLastKey('proj') + 1;

        if($_POST)
        {
            $this->block->save($index, 'system', 'proj');
            if(dao::isError())  $this->send(array('result' => 'fail', 'message' => dao::geterror())); 
            $this->send(array('result' => 'success', 'message' => $this->lang->saveSuccess, 'locate' => $this->server->http_referer));
        }

        $block   = $this->block->getBlock($index, 'proj');
        $blockID = $blockID ? $blockID : ($block ? $block->block : '');

        $blocks = json_decode($this->block->getAvailableBlocks(), true);
        $this->view->blocks  = array_merge(array(''), $blocks);

        $this->view->title      = $title;
        $this->view->params     = $blockID ? json_decode($this->block->{'get' . ucfirst($blockID) . 'Params'}(), true) : array();
        $this->view->blockID    = $blockID;
        $this->view->block      = $block;
        $this->view->index      = $index;
        $this->view->modalWidth = 384;
        $this->display();
    }

    /**
     * Sort block. 
     * 
     * @param  string    $oldOrder 
     * @param  string    $newOrder 
     * @access public
     * @return void
     */
    public function sort($oldOrder, $newOrder)
    {
        $this->locate($this->createLink('sys.block', 'sort', "oldOrder=$oldOrder&newOrder=$newOrder&app=proj"));
    }

    /**
     * Resize block 
     * 
     * @param  int    $id 
     * @param  string $type 
     * @param  string $data 
     * @access public
     * @return void
     */
    public function resize($id, $type, $data)
    {
        $this->locate($this->createLink('sys.block', 'resize', "id=$id&type=$type&data=$data"));
    }

    /**
     * Delete block. 
     * 
     * @param  int    $index 
     * @access public
     * @return void
     */
    public function delete($index)
    {
        $this->locate($this->createLink('sys.block', 'delete', "index=$index&app=proj"));
    }

    /**
     * Print task block.
     * 
     * @access public
     * @return void
     */
    public function printTaskBlock()
    {
        $this->lang->task = new stdclass();
        $this->app->loadLang('task');
        $this->session->set('taskList', $this->createLink('dashboard', 'index'));
        if($this->get->app == 'sys') $this->session->set('taskList', 'javascript:$.openEntry("home")');

        $this->processParams();
        if(strpos(join($this->params->status), 'unfinished') !== false)
        {
            $this->params->status[] = 'wait';
            $this->params->status[] = 'doing';
        }

        /* Get project ids. */
        $projects = $this->loadModel('project', 'proj')->getPairs();
        $ids = '';
        foreach($projects as $key => $project) $ids .= ',' . $key;

        $this->view->tasks = $this->dao->select('*')->from(TABLE_TASK)
            ->where('deleted')->eq(0)
            ->andWhere('project')->ne(0)
            ->andWhere('project')->in($ids)
            ->beginIF(isset($this->params->status) and join($this->params->status) != false)->andWhere('status')->in($this->params->status)->fi()
            ->beginIF($this->params->type)->andWhere($this->params->type)->eq($this->params->account)->fi()
            ->orderBy($this->params->orderBy)
            ->limit($this->params->num)
            ->fetchAll('id');

        $this->view->type = $this->params->type;

        $this->display();
    }

    /**
     * Print task block for created by me.
     * 
     * @access public
     * @return void
     */
    public function printMyCreatedTaskBlock()
    {
        $this->lang->task = new stdclass();
        $this->app->loadLang('task');
        $this->session->set('taskList', $this->createLink('dashboard', 'index'));
        if($this->get->app == 'sys') $this->session->set('taskList', 'javascript:$.openEntry("home")');

        $this->processParams();

        $this->view->tasks = $this->dao->select('*')->from(TABLE_TASK)
            ->where('createdBy')->eq($this->params->account)
            ->andWhere('deleted')->eq(0)
            ->andWhere('project')->ne(0)
            ->beginIF(isset($this->params->status) and join($this->params->status) != false)->andWhere('status')->in($this->params->status)->fi()
            ->orderBy($this->params->orderBy)
            ->limit($this->params->num)
            ->fetchAll('id');

        $this->display();
    }

    /**
     * Print task block for assigned to me.
     * 
     * @access public
     * @return void
     */
    public function printAssignedMeTaskBlock()
    {
        $this->lang->task = new stdclass();
        $this->app->loadLang('task');
        $this->session->set('taskList', $this->createLink('dashboard', 'index'));
        if($this->get->app == 'sys') $this->session->set('taskList', 'javascript:$.openEntry("home")');

        $this->processParams();

        $this->view->tasks = $this->dao->select('*')->from(TABLE_TASK)
            ->where('assignedTo')->eq($this->params->account)
            ->andWhere('deleted')->eq(0)
            ->andWhere('project')->ne(0)
            ->beginIF(isset($this->params->status) and join($this->params->status) != false)->andWhere('status')->in($this->params->status)->fi()
            ->orderBy($this->params->orderBy)
            ->limit($this->params->num)
            ->fetchAll('id');

        $this->display();
    }

    /**
     * Print broject block.
     * 
     * @access public
     * @return void
     */
    public function printProjectBlock()
    {
        $this->lang->project = new stdclass();
        $this->app->loadLang('project', 'proj');
        $this->loadModel('task');

        $this->processParams();

        if($this->params->status == 'involved')
        {
            $projects = $this->dao->select('t1.*')->from(TABLE_PROJECT)->alias('t1')
                ->leftJoin(TABLE_TEAM)->alias('t2')->on('t1.id=t2.id')
                ->where('t1.deleted')->eq(0)
                ->andWhere('t2.type')->eq('project')
                ->andWhere('t2.account')->eq($this->app->user->account)
                ->fetchAll('id');
        }
        else
        {
            $projects = $this->dao->select('*')->from(TABLE_PROJECT)
                ->where('deleted')->eq(0)
                ->andWhere('status')->eq(isset($this->params->status) ? $this->params->status : 'doing')
                ->orderBy($this->params->orderBy)
                ->limit($this->params->num)
                ->fetchAll('id');
        }

        /* Get task info of project. */
        $this->loadModel('project', 'proj');
        foreach($projects as $project)
        {
            if(!$this->project->checkPriv($project->id))
            {
                unset($projects[$project->id]);
                continue;
            }

            $tasks = $this->task->getList($project->id, null, 'id_desc', null, 'status');

            $left     = 0;
            $consumed = 0;
            foreach($tasks as $group)
            {
                foreach($group as $task)
                {
                    $left     += $task->left;
                    $consumed += $task->consumed;
                }
            }
            $total = $left + $consumed;

            $project->wait  = isset($tasks['wait']) ? count($tasks['wait']) : 0;
            $project->doing = isset($tasks['doing']) ? count($tasks['doing']) : 0;
            $project->done  = (isset($tasks['done']) ? count($tasks['done']) : 0) + (isset($tasks['closed']) ? count($tasks['closed']) : 0);
            $project->rate  = $total ? round(($consumed / $total), 3) * 100 . '%' : '0%';
        }

        $this->view->users    = $this->loadModel('user')->getPairs();
        $this->view->projects = $projects;

        $this->display();
    }

    /**
     * Process params.
     * 
     * @access public
     * @return void
     */
    public function processParams()
    {
        $params = $this->get->param;
        $this->params = json_decode(base64_decode($params));

        $this->view->sso       = base64_decode($this->get->sso);
        $this->view->code      = $this->get->blockid;
        $this->view->longBlock = $this->get->longblock;
    }
}
