<?php
/**
 * The detail view file of task module of RanZhi.
 *
 * @copyright   Copyright 2009-2018 青岛易软天创网络科技有限公司(QingDao Nature Easy Soft Network Technology Co,LTD, www.cnezsoft.com)
 * @license     ZPL (http://zpl.pub/page/zplv12.html)
 * @author      Gang Liu <liugang@cnezsoft.com>
 * @package     task
 * @version     $Id$
 * @link        http://www.ranzhi.org
 */
?>
<?php include '../../../sys/common/view/header.lite.html.php';?>
<?php include '../../common/view/kindeditor.html.php';?>
<div class='xuanxuan-card'>
  <div class='panel'>
    <div class='panel-heading'><strong><?php echo $lang->task->basicInfo?></strong></div>
    <div class='panel-body'>
      <table class='table table-info'>
        <?php if($task->parent != 0):?>
        <tr>
          <th class='w-80px'><?php echo $lang->task->parent;?></th>
          <td><?php echo html::a(inlink('view', "id=$parent->id"), $parent->name);?></td>
        </tr>
        <?php endif;?>
        <tr>
          <th class='w-80px'><?php echo $lang->task->name;?></th>
          <td><?php echo $task->name;?></td>
        </tr>
        <tr>
          <th><?php echo $lang->task->project;?></th>
          <td><?php echo $projects[$task->project];?></td>
        </tr>
        <tr>
          <th><?php echo $lang->task->assignedTo;?></th>
          <td><?php echo zget($members, $task->assignedTo, $task->assignedTo);?></td>
        </tr>
        <tr>
          <th><?php echo $lang->task->status;?></th>
          <td><?php echo $lang->task->statusList[$task->status];?></td>
        </tr>
        <tr>
          <th><?php echo $lang->task->pri;?></th>
          <td><?php echo $lang->task->priList[$task->pri];?></td>
        </tr>
        <tr>
          <th><?php echo $lang->task->deadline;?></th>
          <td><?php echo formatTime($task->deadline, DT_DATE1);?></td>
        </tr>
        <tr>
          <th><?php echo $lang->task->estimate;?></th>
          <td><?php echo $task->estimate;?></td>
        </tr>
        <tr>
          <th><?php echo $lang->task->consumed;?></th>
          <td><?php echo $task->consumed;?></td>
        </tr>
        <tr>
          <th><?php echo $lang->task->left;?></th>
          <td><?php echo $task->left;?></td>
        </tr>
      </table>
    </div>
  </div>
  <?php if(!empty($task->team)):?>
  <div class='panel'>
    <table class='table table-data'>
      <thead>
        <tr class='text-center'>
          <th class='text-left'><?php echo $lang->task->team;?></th>
          <th><?php echo $lang->project->role;?></th>
          <th><?php echo $lang->task->estimate?></th>
          <th><?php echo $lang->task->consumed?></th>
          <th><?php echo $lang->task->left?></th>
        </tr>
      </thead>
      <?php foreach($task->team as $member):?>
      <tr class='text-center'>
        <td class='text-left'><?php echo zget($members, $member->account)?></td>
        <td><?php echo $member->role;?></td>
        <td><?php echo $member->estimate?></td>
        <td><?php echo $member->consumed?></td>
        <td><?php echo $member->left?></td>
      </tr>
      <?php endforeach;?>
    </table>
  </div>
  <?php endif;?>
  <div class='panel'>
    <div class='panel-heading'><strong><?php echo $lang->task->life?></strong></div>
    <div class='panel-body'>
      <table class='table table-info'>
        <tr>
          <th class='w-80px'><?php echo $lang->task->createdBy;?></th>
          <td><?php echo zget($users, $task->createdBy, $task->createdBy) . $lang->at . formatTime($task->createdDate, DT_DATETIME1);?></td>
        </tr>
        <?php if($task->finishedBy):?>
        <tr>
          <th><?php echo $lang->task->finishedBy;?></th>
          <td><?php if($task->finishedBy) echo zget($users, $task->finishedBy, $task->finishedBy) . $lang->at . formatTime($task->finishedDate, DT_DATETIME1);?></td>
        </tr>
        <?php endif;?>
        <?php if($task->canceledBy):?>
        <tr>
          <th><?php echo $lang->task->canceledBy;?></th>
          <td><?php if($task->canceledBy) echo zget($users, $task->canceledBy, $task->canceledBy) . $lang->at . formatTime($task->canceledDate, DT_DATETIME1);?></td>
        </tr>
        <?php endif;?>
        <?php if($task->closedBy):?>
        <tr>
          <th><?php echo $lang->task->closedBy;?></th>
          <td><?php if($task->closedBy) echo zget($users, $task->closedBy, $task->closedBy) . $lang->at . formatTime($task->closedDate, DT_DATETIME1);?></td>
        </tr>
        <?php endif;?>
        <?php if($task->closedReason):?>
        <tr>
          <th><?php echo $lang->task->closedReason;?></th>
          <td><?php echo $lang->task->reasonList[$task->closedReason];?></td>
        </tr>
        <?php endif;?>
        <?php if($task->editedBy):?>
        <tr>
          <th><?php echo $lang->task->lastEditedBy;?></th>
          <td><?php if($task->editedBy) echo zget($users, $task->editedBy, $task->editedBy) . $lang->at . formatTime($task->editedDate, DT_DATETIME1);?></td>
        </tr>
        <?php endif;?>
      </table>
    </div>
  </div>
  <?php if($task->desc or $task->files):?>
  <div class='panel'>
    <div class='panel-body'>
      <?php echo $task->desc;?>
      <div><?php echo $this->fetch('file', 'printFiles', array('files' =>$task->files, 'fieldset' => 'false'))?></div>
    </div>
  </div>
  <?php endif;?>
  <?php if(!empty($task->children)):?>
  <div class='panel'>
    <div class='panel-heading'><strong><?php echo $this->lang->task->children;?></strong></div>
    <table class='table table-hover table-data table-fixed'>
      <tr class='text-center'>
        <th>                <?php echo$lang->task->name;?></th>
        <th class='w-80px'> <?php echo$lang->task->assignedTo;?></th>
        <th class='w-90px'> <?php echo$lang->task->status;?></th>
        <th class='w-50px visible-lg'> <?php echo $lang->task->consumedAB . $lang->task->lblHour;?></th>
        <th class='w-50px visible-lg'><?php echo $lang->task->leftAB . $lang->task->lblHour;?></th>
      </tr>
      <?php foreach($task->children as $child):?>
      <tr class='text-center' data-url='<?php echo $this->createLink('task', 'view', "taskID=$child->id"); ?>'>
        <td class='text-left' title='<?php echo $child->name;?>'><?php echo $child->name;?></td>
        <td><?php if(isset($users[$child->assignedTo])) echo $users[$child->assignedTo];?></td>
        <td><?php echo zget($lang->task->statusList, $child->status);?></td>
        <td class='visible-lg'><?php echo $child->consumed;?></td>
        <td class='visible-lg'><?php echo $child->left;?></td>
      </tr>
      <?php endforeach;?>
    </table>
  </div>
  <?php endif;?>
  <?php echo $this->fetch('action', 'history', "objectType=task&objectID={$task->id}");?>
  <div class='page-actions'>
    <?php
    $this->task->buildOperateMenu($task, 'btn', 'view');
    $browseLink = $this->session->taskList ? $this->session->taskList : inlink('browse', "project=$task->project");
    commonModel::printRPN($browseLink, $preAndNext);
    ?>
  </div>
  <fieldset id='commentBox' class='hide'>
    <legend><?php echo $lang->comment;?></legend>
    <form id='ajaxForm' method='post' action='<?php echo inlink('edit', "taskID=$task->id&comment=true")?>'>
      <div class="form-group"><?php echo html::textarea('remark', '',"rows='5' class='w-p100'");?></div>
      <?php echo html::submitButton() . ' ' . html::backButton();?>
    </form>
  </fieldset>      
</div>
<?php include '../../common/view/footer.html.php';?>
