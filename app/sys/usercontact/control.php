<?php
/**
 * The control file of usercontact module of RanZhi.
 *
 * @copyright   Copyright 2009-2018 青岛易软天创网络科技有限公司(QingDao Nature Easy Soft Network Technology Co,LTD, www.cnezsoft.com)
 * @license     ZPL (http://zpl.pub/page/zplv12.html)
 * @author      Gang Liu <liugang@cnezsoft.com>
 * @package     usercontact 
 * @version     $Id$
 * @link        http://www.ranzhi.org
 */
class usercontact extends control
{
    /**
     * Create a contact group.
     *
     * @access public
     * @return void
     */
    public function create()
    {
        if($_POST)
        {
            $id = $this->usercontact->create();
            if(dao::isError()) $this->send(array('result' => 'fail', 'message' => dao::getError()));

            $this->loadModel('action')->create('usercontact', $id, 'created');

            $this->send(array('result' => 'success', 'message' => $this->lang->saveSuccess, 'locate' => 'reload'));
        }

        $this->view->title = $this->lang->usercontact->view;
        $this->view->users = $this->loadModel('user', 'sys')->getPairs();
        $this->display();
    }

    /**
     * Edit a contact group. 
     *
     * @param  int    $id
     * @access public
     * @return void
     */
    public function edit($id)
    {
        if($_POST)
        {
            $changes = $this->usercontact->update($id);
            if(dao::isError()) $this->send(array('result' => 'fail', 'message' => dao::getError()));

            if($changes)
            {
                $actionID = $this->loadModel('action')->create('usercontact', $id, 'edited');
                $this->action->logHistory($actionID, $changes);
            }

            $this->send(array('result' => 'success', 'message' => $this->lang->saveSuccess, 'locate' => 'reload'));
        }

        $this->view->title   = $this->lang->usercontact->view;
        $this->view->contact = $this->usercontact->getById($id);
        $this->view->users   = $this->loadModel('user', 'sys')->getPairs();
        $this->display();
    }

    /**
     * Delete a contact group.
     *
     * @param  int    $id
     * @access public
     * @return void
     */
    public function delete($id)
    {
        $this->usercontact->delete($id);
        if(dao::isError()) $this->send(array('result' => 'fail', 'message' => dao::getError()));

        $this->send(array('result' => 'success'));
    }
}
