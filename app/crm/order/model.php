<?php
/**
 * The model file of order module of RanZhi.
 *
 * @copyright   Copyright 2009-2018 青岛易软天创网络科技有限公司(QingDao Nature Easy Soft Network Technology Co,LTD, www.cnezsoft.com)
 * @license     ZPL (http://zpl.pub/page/zplv12.html)
 * @author      Tingting Dai <daitingting@xirangit.com>
 * @package     order
 * @version     $Id$
 * @link        http://www.ranzhi.org
 */
class orderModel extends model
{
    /**
     * Get order by id.
     * 
     * @param  int    $id 
     * @access public
     * @return object|bool
     */
    public function getByID($id = 0)
    {
        $customerIdList = $this->loadModel('customer')->getCustomersSawByMe();
        if(empty($customerIdList)) return null;

        $order = $this->dao->select('o.*, c.name as customerName')->from(TABLE_ORDER)->alias('o')
            ->leftJoin(TABLE_CUSTOMER)->alias('c')->on("o.customer=c.id")
            ->where('o.id')->eq($id)
            ->andWhere('o.customer')->in($customerIdList)
            ->fetch();
        if(!$order) return false;

        $products     = $this->dao->select('*')->from(TABLE_PRODUCT)->where('id')->in($order->product)->orderBy('id_desc')->fetchAll();
        $productName  = count($products) > 1 ? current($products)->name . $this->lang->etc : current($products)->name;
        $order->title = sprintf($this->lang->order->titleLBL, $order->customerName, $productName, date('Y-m-d', strtotime($order->createdDate))); 

        $order->products = $products;

        return $order;
    }

    /**
     * Get my order id list.
     * 
     * @param  string $type        view|edit
     * @param  array  $orderIdList 
     * @access public
     * @return array
     */
    public function getOrdersSawByMe($type = 'view', $orderIdList = array())
    {
        $customerIdList = $this->loadModel('customer')->getCustomersSawByMe($type);
        $orderList = $this->dao->select('*')->from(TABLE_ORDER)
            ->where('deleted')->eq(0)
            ->beginIF(!empty($orderIdList))->andWhere('id')->in($orderIdList)->fi()
            ->beginIF(!isset($this->app->user->rights['crm']['manageall']) and ($this->app->user->admin != 'super'))
            ->andWhere('customer')->in($customerIdList)
            ->fi()
            ->fetchAll('id');

        return array_keys($orderList);
    }

    /** 
     * Get order list.
     * 
     * @param  string $mode 
     * @param  string $param 
     * @param  string $owner
     * @param  string $orderBy 
     * @param  object $pager 
     * @access public
     * @return array
     */
    public function getList($mode = 'all', $param = '', $owner = '', $needQueryCondition = true, $orderBy = 'id_desc', $pager = null)
    {
        $customerIdList = $this->loadModel('customer')->getCustomersSawByMe();
        if(empty($customerIdList)) return array();

        $this->app->loadClass('date', $static = true);
        $thisMonth = date::getThisMonth();
        $thisWeek  = date::getThisWeek();

        /* Process search condition. */
        if($this->session->orderQuery == false) $this->session->set('orderQuery', ' 1 = 1');
        $orderQuery = $this->loadModel('search', 'sys')->replaceDynamic($this->session->orderQuery);

        if(strpos($orderBy, 'status') !== false) $orderBy .= ', closedReason';
        if(strpos($orderBy, 'id') === false) $orderBy .= ', id_desc';

        if(strpos(',past,today,tomorrow,thisweek,thismonth,', ",{$mode},") !== false or ($mode == 'bysearch' && strpos($orderQuery, '`nextDate`') !== false))
        {
            $orders = $this->dao->select('o.*, c.name AS customerName, c.level AS level')->from(TABLE_ORDER)->alias('o')
                ->leftJoin(TABLE_CUSTOMER)->alias('c')->on('o.customer=c.id')
                ->leftJoin(TABLE_DATING)->alias('n')->on('o.id=n.objectID')
                ->where('o.deleted')->eq(0)
                ->andWhere('n.status')->eq('wait')
                ->andWhere('n.objectType')->eq('order')
                ->beginIF($owner == 'my' and strpos('assignedTo,createdBy,signedBy', $mode) === false)
                ->andWhere('o.assignedTo', true)->eq($this->app->user->account)
                ->orWhere('o.createdBy')->eq($this->app->user->account)
                ->orWhere('o.editedBy')->eq($this->app->user->account)
                ->orWhere('o.signedBy')->eq($this->app->user->account)
                ->markRight(1)
                ->fi()
                ->beginIF($mode == 'past')->andWhere('n.date')->ne('0000-00-00')->andWhere('n.date')->lt(helper::today())->andWhere('o.status')->ne('closed')->fi()
                ->beginIF($mode == 'today')->andWhere('n.date')->eq(helper::today())->fi()
                ->beginIF($mode == 'tomorrow')->andWhere('n.date')->eq(formattime(date::tomorrow(), DT_DATE1))->fi()
                ->beginIF($mode == 'thisweek')->andWhere('n.date')->between($thisWeek['begin'], $thisWeek['end'])->fi()
                ->beginIF($mode == 'thismonth')->andWhere('n.date')->between($thisMonth['begin'], $thisMonth['end'])->fi()
                ->beginIF($mode == 'bysearch')->andWhere(str_replace('`nextDate`', 'n.date', $orderQuery))->fi()
                ->andWhere('o.customer')->in($customerIdList)
                ->beginIF(strpos($orderBy, 'date') !== false)->orderBy("n.$orderBy")->fi()
                ->beginIF(strpos($orderBy, 'date') === false)->orderBy("o.$orderBy")->fi()
                ->page($pager, 'o.id')
                ->fetchAll('id');

            if($needQueryCondition) $this->session->set('orderQueryCondition', $this->dao->get());

            $datingList = $this->dao->select('objectID, MIN(date) AS date')->from(TABLE_DATING)
                ->where('status')->eq('wait')
                ->andWhere('objectType')->eq('order')
                ->andWhere('objectID')->in(array_keys($orders))
                ->beginIF($mode == 'past')->andWhere('date')->lt(helper::today())->fi()
                ->beginIF($mode == 'today')->andWhere('date')->eq(helper::today())->fi()
                ->beginIF($mode == 'tomorrow')->andWhere('date')->eq(formattime(date::tomorrow(), DT_DATE1))->fi()
                ->beginIF($mode == 'thisweek')->andWhere('date')->between($thisWeek['begin'], $thisWeek['end'])->fi()
                ->beginIF($mode == 'thismonth')->andWhere('date')->between($thisMonth['begin'], $thisMonth['end'])->fi()
                ->andWhere('date')->ne('0000-00-00')
                ->groupBy('objectID')
                ->fetchPairs();

            foreach($orders as $id => $order) $order->nextDate = zget($datingList, $id, $order->nextDate);
        }

        if(strpos(',all,public,assignedTo,createdBy,signedBy,query,', ",{$mode},") !== false or ($mode == 'bysearch' && empty($orders)))
        {
            $orders = $this->dao->select('o.*, c.name as customerName, c.level as level')->from(TABLE_ORDER)->alias('o')
                ->leftJoin(TABLE_CUSTOMER)->alias('c')->on("o.customer=c.id")
                ->where('o.deleted')->eq(0)
                ->beginIF($owner == 'my' and strpos('assignedTo,createdBy,signedBy', $mode) === false)
                ->andWhere('o.assignedTo', true)->eq($this->app->user->account)
                ->orWhere('o.createdBy')->eq($this->app->user->account)
                ->orWhere('o.editedBy')->eq($this->app->user->account)
                ->orWhere('o.signedBy')->eq($this->app->user->account)
                ->markRight(1)
                ->fi()
                ->beginIF($mode == 'public')->andWhere('public')->eq('1')->fi()
                ->beginIF($mode == 'assignedTo')->andWhere('o.assignedTo')->eq($this->app->user->account)->fi()
                ->beginIF($mode == 'createdBy')->andWhere('o.createdBy')->eq($this->app->user->account)->fi()
                ->beginIF($mode == 'signedBy')->andWhere('o.signedBy')->eq($this->app->user->account)->fi()
                ->beginIF($mode == 'query')->andWhere($param)->fi()
                ->beginIF($mode == 'bysearch')->andWhere($orderQuery)->fi()
                ->andWhere('o.customer')->in($customerIdList)
                ->orderBy("o.$orderBy")
                ->page($pager)
                ->fetchAll('id');

            if($needQueryCondition) $this->session->set('orderQueryCondition', $this->dao->get());
        }

        $products = $this->loadModel('product')->getPairs();

        foreach($orders as $order)
        {
            $order->products = array();
            $productList = explode(',', $order->product);
            foreach($productList as $product) if(isset($products[$product])) $order->products[] = $products[$product];
        }

        foreach($orders as $order)
        {
            $productName = count($order->products) > 1 ? current($order->products) . $this->lang->etc : current($order->products);
            $order->title = sprintf($this->lang->order->titleLBL, $order->customerName, $productName, date('Y-m-d', strtotime($order->createdDate))); 
        }

        return $orders;
    }

    /** 
     * Get order list By idList.
     * 
     * @param  array   $idList 
     * @access public
     * @return array
     */
    public function getByIdList($idList = array())
    {
        $orders = $this->dao->select('o.*, c.name as customerName')->from(TABLE_ORDER)->alias('o')
            ->leftJoin(TABLE_CUSTOMER)->alias('c')->on("o.customer=c.id")
            ->where('o.id')->in($idList)
            ->fetchAll('id');

        $this->setProductsForOrders($orders);

        foreach($orders as $order)
        {
            $productName = count($order->products) > 1 ? current($order->products) . $this->lang->etc : current($order->products);
            $order->title = sprintf($this->lang->order->titleLBL, $order->customerName, $productName, date('Y-m-d', strtotime($order->createdDate))); 
        }

        return $orders;
    }

    /** 
     * Get order pairs.
     * 
     * @param  int      $customer 
     * @param  string   $status 
     * @access public
     * @return array
     */
    public function getPairs($customer = 0, $status = '')
    {
        $customerIdList = $this->loadModel('customer')->getCustomersSawByMe();
        if(empty($customerIdList)) return array();

        $orders = $this->dao->select('o.id, o.createdDate, o.product, c.name as customerName')->from(TABLE_ORDER)->alias('o')
            ->leftJoin(TABLE_CUSTOMER)->alias('c')->on("o.customer=c.id")
            ->where('o.deleted')->eq(0)
            ->beginIF($customer)->andWhere('customer')->eq($customer)->fi()
            ->beginIF($status)->andWhere('status')->eq($status)->fi()
            ->andWhere('o.customer')->in($customerIdList)
            ->fetchAll('id');

        $this->setProductsForOrders($orders);

        foreach($orders as $key => $order)
        {
            $productName = count($order->products) > 1 ? current($order->products) . $this->lang->etc : current($order->products);
            $orders[$key] = sprintf($this->lang->order->titleLBL, $order->customerName, $productName, date('Y-m-d', strtotime($order->createdDate))); 
        }

        return $orders;
    }

    /**
     * Get orders of the customer for create contract.
     * 
     * @param  int      $customerID 
     * @param  string   $status 
     * @access public
     * @return array
     */
    public function getOrderForCustomer($customerID = 0, $status = '')
    {
        $orders = $this->dao->select('id, `plan`, customer, product, createdDate, currency, editedDate')->from(TABLE_ORDER)
            ->where(1)
            ->beginIF($customerID)->andWhere('customer')->eq($customerID)->fi()
            ->beginIF($status)->andWhere('status')->eq($status)->fi()
            ->fetchAll('id');

        $customers = $this->loadModel('customer')->getPairs('client');

        $this->setProductsForOrders($orders);

        foreach($orders as $order)
        {
            $productName  = count($order->products) > 1 ? current($order->products) . $this->lang->etc : current($order->products);
            $order->title = sprintf($this->lang->order->titleLBL, $customers[$order->customer], $productName, date('Y-m-d', strtotime($order->createdDate))); 
        }

        return array('0' => '') + $orders;
    }

    /**
     * Get amount.
     * 
     * @param  int|string|array    $idList 
     * @access public
     * @return float
     */
    public function getAmount($idList = array())
    {
        $orders = $this->dao->select('*')->from(TABLE_ORDER)->where('id')->in($idList)->fetchAll();

        $amount = 0;
        foreach($orders as $order)
        {
            $amount += $order->real == '0.00' ? $order->plan : $order->real;
        }

        return $amount;
    }

    /**
     * Get contract of an order.
     * 
     * @param  int    $orderID 
     * @access public
     * @return object
     */
    public function getContract($orderID)
    {
        return $this->dao->select('*')
            ->from(TABLE_CONTRACTORDER)->alias('t1')
            ->leftJoin(TABLE_CONTRACT)->alias('t2')->on('t1.contract=t2.id')
            ->where('`order`')->eq($orderID)
            ->fetch();
    }

    /**
     * Create an order.
     * 
     * @access public
     * @return int
     */
    public function create()
    {
        $now = helper::now();
        $order = fixer::input('post')
            ->add('createdBy', $this->app->user->account)
            ->add('createdDate', $now)
            ->setDefault('status', 'normal')
            ->setDefault('assignedBy', $this->app->user->account)
            ->setDefault('assignedTo', $this->app->user->account)
            ->setDefault('assignedDate', $now)
            ->setDefault('customer', 0)
            ->join('product', ',')
            ->remove('createCustomer, name, contact, phone, email, qq, continue, createProduct, productName, code, category, type, status')
            ->get();

        /* Check data. */
        if($this->post->createProduct)
        {
            $this->loadModel('product');
            if(!commonModel::hasPriv('product', 'create')) return array('result' => 'fail', 'message' => sprintf($this->lang->order->deny, $this->lang->product->common));
            
            $errors = array();
            if($this->post->productName == '') $errors['productName'] = sprintf($this->lang->error->notempty, $this->lang->product->name);
            if($this->post->code        == '') $errors['code'] = sprintf($this->lang->error->notempty, $this->lang->product->code);
            $count = $this->dao->select('COUNT(*) as count')->from(TABLE_PRODUCT)->where('code')->eq($this->post->code)->fetch('count');
            if($count > 0) $errors['code'] = sprintf($this->lang->error->unique, $this->lang->product->code, $this->post->code);
            $this->app->loadClass('filter', true);
            if(!validater::checkCode($this->post->code)) $errors['code'] = sprintf($this->lang->error->code, $this->lang->product->code);
            if(!validater::checkNotInt($this->post->code)) $errors['code'] = sprintf($this->lang->error->notInt, $this->lang->product->code);
            if(!empty($errors)) return array('result' => 'fail', 'message' => $errors);
            
            if(!$this->post->continue) 
            {
                $result = $this->product->checkUnique($this->post->productName);
                if($result['result'] == 'fail') return $result;
            }
        }
        if(!$this->post->createCustomer and $this->post->createProduct)
        {
            $this->dao->insert(TABLE_ORDER)->data($order)->autoCheck()->check('customer', 'notempty');
            if(dao::isError()) return array('result' => 'fail', 'message' => dao::getError());
        }
        if($this->post->createCustomer and !$this->post->createProduct)
        {
            $this->dao->insert(TABLE_ORDER)->data($order)->autoCheck()->check('product', 'notempty');
            if(dao::isError()) return array('result' => 'fail', 'message' => dao::getError());
        }

        if($this->post->createCustomer)
        {
            if(!commonModel::hasPriv('customer', 'create')) return array('result' => 'fail', 'message' => sprintf($this->lang->order->deny, $this->lang->customer->common));

            $customer = new stdclass();
            $customer->name        = $this->post->name ? $this->post->name : $this->post->contact;
            $customer->contact     = $this->post->contact; 
            $customer->phone       = $this->post->phone; 
            $customer->email       = $this->post->email; 
            $customer->qq          = $this->post->qq; 
            $customer->relation    = 'client'; 
            $customer->assignedTo  = $this->app->user->account;
            $customer->createdBy   = $this->app->user->account;
            $customer->createdDate = helper::now();

            $return = $this->loadModel('customer')->create($customer);
            if($return['result'] == 'fail') return $return;
            $customerID = $return['customerID'];
            $order->customer = isset($customerID) ? $customerID : '';
        }

        if($this->post->createProduct)
        {
            $product = new stdclass();
            $product->name        = $this->post->productName;
            $product->code        = strtolower($this->post->code);
            $product->category    = $this->post->category;
            $product->type        = $this->post->type;
            $product->status      = $this->post->status;
            $product->createdBy   = $this->app->user->account;
            $product->createdDate = helper::now();
            $product->editedDate  = helper::now();

            $this->dao->insert(TABLE_PRODUCT)
                ->data($product)
                ->autoCheck()
                ->exec();

            if(dao::isError()) return array('result' => 'fail', 'message' => dao::getError());
            $order->product = $this->dao->lastInsertID(); 
        }

        $order->product  = !empty($order->product) ? ',' . $order->product . ',' : '';

        $this->dao->insert(TABLE_ORDER)
            ->data($order)
            ->autoCheck()
            ->batchCheck($this->config->order->require->create, 'notempty')
            ->exec();

        if(dao::isError()) return array('result' => 'fail', 'message' => dao::getError());

        $orderID = $this->dao->lastInsertID();
        $this->loadModel('action', 'sys')->create('order', $orderID, 'Created', '');
        $this->loadModel('action', 'sys')->create('customer', $this->post->customer, 'createOrder', '', html::a(helper::createLink('order', 'view', "orderID=$orderID"), $orderID));

        return array('result' => 'success', 'message' => $this->lang->saveSuccess, 'locate' => helper::createLink('order', 'browse'), 'orderID' => $orderID);
    }

    /**
     * Update an order.
     * 
     * @param  int $orderID 
     * @access public
     * @return void
     */
    public function update($orderID)
    {
        $oldOrder = $this->getByID($orderID);
        $now      = helper::now();

        $order = fixer::input('post')
            ->setDefault('nextDate', '0000-00-00')
            ->setDefault('signedDate', '0000-00-00')
            ->setDefault('closedDate', '0000-00-00 00:00:00')
            ->join('product', ',')

            ->setIF($this->post->signedBy, 'status', 'signed')
            ->setIF($this->post->closedBy, 'status', 'closed')

            ->setIF($this->post->status == 'closed' and !$this->post->closedBy, 'closedBy', $this->app->user->account)
            ->setIF($this->post->status == 'closed' and !$this->post->closedDate, 'closedDate', $now)

            ->setIF($this->post->status == 'signed' and !$this->post->signedBy, 'signedBy', $this->app->user->account)
            ->setIF($this->post->status == 'signed' and !$this->post->signedDate, 'signedDate', substr($now, 0, 10))

            ->add('editedBy',   $this->app->user->account)
            ->add('editedDate', $now)

            ->get();

        $order->product = $order->product ? ',' . $order->product . ',' : '';

        $this->dao->update(TABLE_ORDER)
            ->data($order, $skip = 'referer')
            ->autoCheck()
            ->batchCheck($this->config->order->require->edit, 'notempty')
            ->where('id')->eq($orderID)
            ->exec();

        if(dao::isError()) return false;

        return commonModel::createChanges($oldOrder, $order);
    }

    /**
     * Close an order.
     * 
     * @param  int    $orderID 
     * @access public
     * @return bool
     */
    public function close($orderID)
    {
        $now   = helper::now();
        $order = fixer::input('post')
            ->add('closedDate', $now)
            ->add('closedBy', $this->app->user->account)
            ->add('status', 'closed')
            ->add('assignedTo', 'closed')
            ->add('editedBy', $this->app->user->account)
            ->add('editedDate', $now)
            ->get();

        $this->dao->update(TABLE_ORDER)->data($order, $skip = 'uid, closedNote')
            ->autoCheck()
            ->where('id')->eq($orderID)
            ->exec();

        return !dao::isError();
    }

    /**
     * Activate an order.
     * 
     * @param  int    $orderID 
     * @access public
     * @return bool
     */
    public function activate($orderID)
    {
        $now = helper::now();
        $order = fixer::input('post')
            ->add('activatedDate', $now)
            ->add('activatedBy', $this->app->user->account)
            ->setDefault('closedBy,closedReason,signedBy', '')
            ->setDefault('signedDate', '0000-00-00')
            ->setDefault('closedDate', '0000-00-00 00:00:00')
            ->setDefault('status', 'normal')
            ->add('editedBy', $this->app->user->account)
            ->add('editedDate', $now)
            ->get();

        $this->dao->update(TABLE_ORDER)->data($order, $skip='uid, comment')->autoCheck()->where('id')->eq($orderID)->exec();

        return !dao::isError();
    }

    /**
     * Assign an order to a member again.
     * 
     * @param  int    $orderID 
     * @access public
     * @return void
     */
    public function assign($orderID)
    {
        $now = helper::now();
        $order = fixer::input('post')
            ->setDefault('assignedBy', $this->app->user->account)
            ->setDefault('assignedDate', $now)
            ->add('editedBy', $this->app->user->account)
            ->add('editedDate', $now)
            ->get();

        $this->dao->update(TABLE_ORDER)
            ->data($order, $skip = 'uid, comment')
            ->autoCheck()
            ->where('id')->eq($orderID)
            ->exec();

        return !dao::isError();
    }

    /**
     * Build operate menu of an order.
     * 
     * @param  object    $order 
     * @access public
     * @return string
     */
    public function buildOperateMenu($order)
    {
        $menu = '';
        $menu .= commonModel::printLink('crm.order', 'view', "orderID=$order->id", $this->lang->view, '', false);
        $menu .= commonModel::printLink('action', 'createRecord', "objectType=order&objectID={$order->id}&customer={$order->customer}", $this->lang->order->record, "data-toggle='modal' data-width='860'", false);
        $menu .= commonModel::printLink('customer', 'contact', "customerID={$order->customer}", $this->lang->order->contact, "data-toggle='modal'", false);

        if($order->status == 'normal') $menu .= commonModel::printLink('crm.contract', 'create', "customerID={$order->customer}&orderID={$order->id}", $this->lang->order->sign, '', false);
        if($order->status != 'normal') $menu .= html::a('###', $this->lang->order->sign, "disabled='disabled' class='disabled'");

        $menu .= commonModel::printLink('crm.order', 'edit', "orderID=$order->id", $this->lang->edit, '', false);
        $menu .="<div class='dropdown'><a data-toggle='dropdown' href='javascript:;'>" . $this->lang->more . "<span class='caret'></span> </a><ul class='dropdown-menu pull-right'>";
        $menu .= commonModel::printLink('crm.order', 'assign', "orderID=$order->id", $this->lang->assign, "data-toggle='modal'", false, '', 'li');

        if($order->status != 'closed')
        {
            $menu .= commonModel::printLink('crm.order', 'close', "orderID=$order->id", $this->lang->close, "data-toggle='modal'", false, '', 'li');
            $menu .= "<li disabled='disabled' class='disabled'>" . html::a('###', $this->lang->activate) . "</li>";
        }
        else
        {
            if($order->closedReason == 'payed') $menu .= "<li disabled='disabled' class='disabled'>" . html::a('###', $this->lang->close) . "</li>";
            if($order->closedReason == 'payed') $menu .= "<li disabled='disabled' class='disabled'>" . html::a('###', $this->lang->activate) . "</li>";
            if($order->closedReason != 'payed') $menu .= commonModel::printLink('crm.order', 'activate', "orderID=$order->id", $this->lang->activate, "data-toggle='modal'", false, '', 'li');
        }
        if($order->status == 'normal' or $order->closedReason == 'failed')
        {
            $menu .= commonModel::printLink('crm.order', 'delete', "orderID=$order->id", $this->lang->delete, "class='deleter'", false, '', 'li');
        }
        $menu .= '</ul></div>';

        return $menu;
    }

    /**
     * Count amount.
     * 
     * @param  array  $orders 
     * @param  string $type 
     * @access public
     * @return array
     */
    public function countAmount($orders)
    {
        $totalAmount  = array();
        $currencyList = $this->loadModel('common', 'sys')->getCurrencyList();
        $currencySign = $this->common->getCurrencySign();

        foreach($orders as $order)
        {
            if($order->status == 'closed' and $order->closedReason != 'payed') continue;
            foreach($currencyList as $key => $currency)
            {
                if($order->currency == $key)
                {
                   if(!isset($totalAmount['plan'][$key])) $totalAmount['plan'][$key] = 0;
                   if(!isset($totalAmount['real'][$key])) $totalAmount['real'][$key] = 0;

                    $totalAmount['plan'][$key] += $order->plan;
                    $totalAmount['real'][$key] += $order->real;
                }
            }
        }

        foreach($totalAmount as $type => $currencyAmount) foreach($currencyAmount as $currency => $amount) $totalAmount[$type][$currency] = "<span title='$amount'>" . $currencySign[$currency] . commonModel::tidyMOney($amount) . "</span>";

        return $totalAmount;
    }

    /**
     * Set pruducts for orders.
     * 
     * @param  array  $orders 
     * @access public
     * @return void
     */
    public function setProductsForOrders($orders)
    {
        $products = $this->loadModel('product')->getPairs();

        foreach($orders as $order)
        {
            $order->products = array();
            $productList = explode(',', $order->product);
            foreach($productList as $product) if(isset($products[$product])) $order->products[] = $products[$product];
        }
    }
}
