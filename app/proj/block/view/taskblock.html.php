<?php
/**
 * The task block view file of block module of RanZhi.
 *
 * @copyright   Copyright 2009-2018 青岛易软天创网络科技有限公司(QingDao Nature Easy Soft Network Technology Co,LTD, www.cnezsoft.com)
 * @license     ZPL (http://zpl.pub/page/zplv12.html)
 * @author      Yidong Wang <yidong@cnezsoft.com>
 * @package     block
 * @version     $Id$
 * @link        http://www.ranzhi.org
 */
?>
<div class='panel-body has-table'>
  <table class='table table-borderless table-fixed table-fixed-head table-hover tablesorter block-task'>
    <thead>
      <tr>
        <th class='w-60px'><?php echo $lang->task->pri;?></th>
        <th><?php echo $lang->task->name;?></th>
        <?php if($longBlock):?>
        <th class='text-center w-60px'><?php echo $lang->task->estimate;?></th>
        <th class='text-center w-80px'><?php echo $lang->task->deadline;?></th>
        <?php endif;?>
        <th class='text-center w-60px'><?php echo $lang->task->status;?></th>
        <th class='text-center w-100px'></th>
      </tr>
    </thead>
    <tbody>
      <?php foreach($tasks as $id => $task):?>
      <?php
      if(strpos('createdBy,assignedTo,finishedBy', $type) !== false)
      {
          $isParent  = !empty($task->children);
          $isMulti   = !empty($task->team);
          $startDisabled  = (!$isParent and $this->loadModel('task')->isClickable($task, 'start')) ? '' : 'disabled';
          $finishDisabled = (!$isParent and $this->task->isClickable($task, 'finish')) ? '' : 'disabled';
          $recordEstimateDisabled = (!$isParent and $this->task->isClickable($task, 'recordEstimate')) ? '' : 'disabled';
      }
      ?>
      <?php $appid = ($this->get->app == 'sys' and isset($_GET['entry'])) ? "class='app-btn' data-id={$this->get->entry}" : ''?>
      <tr <?php echo $appid?>>
        <td class='text-center'><span class='active pri pri-<?php echo $task->pri;?>'><?php echo $lang->task->priList[$task->pri];?></span></td>
        <td title='<?php echo $task->name;?>' onclick="<?php echo "$.openEntry('proj', '" . $this->createLink('proj.task', 'view', "taskID=$task->id") . "')";?>"> <a href="###"><?php echo $task->name;?></a></td>
        <?php if($longBlock):?>
        <td class='text-center'><?php echo $task->estimate;?></td>
        <td class='text-center'><?php echo formatTime($task->deadline, DT_DATE1);?></td>
        <?php endif;?>
        <td class='text-center'><?php echo $lang->task->statusList[$task->status];?></td>
        <?php if(strpos('createdBy,assignedTo,finishedBy', $type) !== false):?>
        <td class='actions text-center'>
          <div class='dropdown'>
            <a href='###' data-target='#' data-toggle='dropdown' role='button' id='dLabel'><?php echo $lang->actions;?><span class='caret'></span></a>
            <ul aria-labelledby='dropdownMenu1' role='menu' class='dropdown-menu'>
              <?php $this->task->buildOperateMenu($task, '', 'block');?>
            </ul>
          </div>
        </td>
        <?php endif;?>
      </tr>
      <?php endforeach;?>
    </tbody>
  </table>
</div>
