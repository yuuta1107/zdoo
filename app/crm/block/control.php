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
        $this->app->loadLang('common', 'crm');
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

        if(!$index) $index = $this->block->getLastKey('crm') + 1;

        if($_POST)
        {
            $this->block->save($index, 'system', 'crm');
            if(dao::isError())  $this->send(array('result' => 'fail', 'message' => dao::geterror()));
            $this->send(array('result' => 'success', 'message' => $this->lang->saveSuccess, 'locate' => $this->server->http_referer));
        }

        $block   = $this->block->getBlock($index, 'crm');
        $blockID = $blockID ? $blockID : ($block ? $block->block : '');

        $this->view->title      = $title;
        $this->view->blocks     = array_merge(array(''), json_decode($this->block->getAvailableBlocks(), true));
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
        $this->locate($this->createLink('sys.block', 'sort', "oldOrder=$oldOrder&newOrder=$newOrder&app=crm"));
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
        $this->locate($this->createLink('sys.block', 'delete', "index=$index&app=crm"));
    }

    /**
     * Print order block.
     * 
     * @access public
     * @return void
     */
    public function printOrderBlock()
    {
        $this->app->loadLang('order', 'crm');

        $params = $this->get->param;
        $params = json_decode(base64_decode($params));
        if(!isset($params->type)) $params->type = '';

        $this->session->set('orderList', $this->createLink('crm.dashboard', 'index'));
        if($this->get->app == 'sys') $this->session->set('orderList', 'javascript:$.openEntry("home")');

        $customerIdList = $this->loadModel('customer')->getCustomersSawByMe('view');
        $orders = $this->dao->select('*')->from(TABLE_ORDER)
            ->where('deleted')->eq(0)
            ->andWhere('customer')->in($customerIdList)
            ->beginIF($params->type and strpos($params->type, 'status') === false)->andWhere($params->type)->eq($params->account)->fi()
            ->beginIF($params->type and strpos($params->type, 'status') !== false)->andWhere('status')->eq(str_replace('status' , '', $params->type))->fi()
            ->orderBy($params->orderBy)
            ->limit($params->num)
            ->fetchAll('id');

        $products  = $this->loadModel('product')->getPairs();
        $customers = $this->loadModel('customer')->getPairs('client');
        foreach($orders as $order)
        {
            $order->products = array();
            $productList = explode(',', $order->product);
            foreach($productList as $product) if(isset($products[$product])) $order->products[] = $products[$product];
        }
        foreach($orders as $order)
        {
            $productName = count($order->products) > 1 ? current($order->products) . $this->lang->etc : current($order->products);
            $order->name = sprintf($this->lang->order->titleLBL, zget($customers, $order->customer), $productName, date('Y-m-d', strtotime($order->createdDate))); 
        }

        $this->view->sso          = base64_decode($this->get->sso);
        $this->view->code         = $this->get->blockid;
        $this->view->products     = $products;
        $this->view->currencySign = $this->loadModel('common')->getCurrencySign();
        $this->view->orders       = $orders;
        $this->view->longBlock    = $this->get->longblock;

        $this->display();
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

        $params = $this->get->param;
        $params = json_decode(base64_decode($params));

        $this->view->sso  = base64_decode($this->get->sso);
        $this->view->code = $this->get->blockid;

        $this->view->tasks = $this->dao->select('*')->from(TABLE_TASK)
            ->where('deleted')->eq(0)
            ->andWhere('createdBy', true)->eq($params->account)->orWhere('assignedTo')->eq($params->account)->markRight(1)
            ->beginIF(isset($params->status) and join($params->status) != false)->andWhere('status')->in($params->status)->fi()
            ->orderBy($params->orderBy)
            ->limit($params->num)
            ->fetchAll('id');

        $this->display();
    }

    /**
     * Print contract block.
     * 
     * @access public
     * @return void
     */
    public function printContractBlock()
    {
        $this->lang->contract = new stdclass();
        $this->app->loadLang('contract', 'crm');

        $params = $this->get->param;
        $params = json_decode(base64_decode($params));
        if(!isset($params->type)) $params->type = '';

        $this->session->set('contractList', $this->createLink('crm.dashboard', 'index'));
        if($this->get->app == 'sys') $this->session->set('contractList', 'javascript:$.openEntry("home")');

        $this->view->sso          = base64_decode($this->get->sso);
        $this->view->code         = $this->get->blockid;
        $this->view->currencySign = $this->loadModel('common')->getCurrencySign();

        $this->view->contracts = $this->dao->select('*')->from(TABLE_CONTRACT)
            ->where('deleted')->eq(0)
            ->beginIF($params->type and strpos($params->type, 'status') === false)->andWhere($params->type)->eq($params->account)->fi()
            ->beginIF($params->type and strpos($params->type, 'status') !== false)->andWhere('status')->eq(str_replace('status' , '', $params->type))->fi()
            ->orderBy($params->orderBy)
            ->limit($params->num)
            ->fetchAll('id');

        $this->display();
    }

    /**
     * Print customer block.
     * 
     * @access public
     * @return void
     */
    public function printCustomerBlock()
    {
        $params = $this->get->param;
        $params = json_decode(base64_decode($params));
        if(!isset($params->type)) $params->type = '';
        $this->app->loadClass('date');
        $thisWeek = date::getThisWeek();

        $this->session->set('customerList', $this->createLink('crm.dashboard', 'index'));
        if($this->get->app == 'sys') $this->session->set('customerList', 'javascript:$.openEntry("home")');

        $customerIdList = $this->loadModel('customer')->getCustomersSawByMe();
        if(empty($customerIdList))
        {
            $customers = array();
        }
        else
        {
            $customers = $this->dao->select('t1.*')->from(TABLE_CUSTOMER)->alias('t1')
                ->leftJoin(TABLE_DATING)->alias('t2')->on('t1.id=t2.objectID')
                ->where('t1.deleted')->eq(0)
                ->andWhere('t1.id')->in($customerIdList)
                ->beginIF($params->type and $params->type == 'today')->andWhere('t2.date')->eq(helper::today())->fi()
                ->beginIF($params->type and $params->type == 'thisweek')->andWhere('t2.date')->between($thisWeek['begin'], $thisWeek['end'])->fi()
                ->orderBy($params->orderBy)
                ->limit($params->num)
                ->fetchAll('id');

            $datingList = $this->dao->select('objectID, MIN(date) AS date')->from(TABLE_DATING)
                ->where('status')->eq('wait')
                ->andWhere('objectType')->eq('customer')
                ->andWhere('objectID')->in(array_keys($customers))
                ->beginIF($params->type and $params->type == 'today')->andWhere('date')->eq(helper::today())->fi()
                ->beginIF($params->type and $params->type == 'thisweek')->andWhere('date')->between($thisWeek['begin'], $thisWeek['end'])->fi()
                ->andWhere('date')->ne('0000-00-00')
                ->groupBy('objectID')
                ->fetchPairs();

            foreach($customers as $id => $customer) $customer->nextDate = zget($datingList, $id, $customer->nextDate);
        }

        $this->view->sso       = base64_decode($this->get->sso);
        $this->view->code      = $this->get->blockid;
        $this->view->customers = $customers;
        $this->view->longBlock = $this->get->longblock;

        $this->display();
    }
}
