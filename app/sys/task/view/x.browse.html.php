<?php
/**
 * The browse view file of task module of RanZhi.
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
<div class='panel xuanxuan-card'>
  <?php if(commonModel::hasPriv('task', 'batchClose')):?>
  <form id='ajaxForm' method='post' action="<?php echo $this->createLink('proj.task', 'batchClose');?>">
  <?php endif;?>
    <table class='table table-hover table-striped tablesorter table-data' id='taskList'>
      <thead>
        <tr class='text-center'>
          <?php $vars = "projectID=$projectID&mode={$mode}&orderBy=%s&recTotal={$pager->recTotal}&recPerPage={$pager->recPerPage}&pageID={$pager->pageID}";?>
          <?php if(commonModel::hasPriv('task', 'batchClose')):?>
          <th class='w-60px'><?php commonModel::printOrderLink('id',         $orderBy, $vars, $lang->task->id);?></th>
          <?php endif;?>
          <th>               <?php commonModel::printOrderLink('name',       $orderBy, $vars, $lang->task->name);?></th>
          <th class='w-80px'><?php commonModel::printOrderLink('assignedTo', $orderBy, $vars, $lang->task->assignedTo);?></th>
          <th class='w-90px'><?php commonModel::printOrderLink('status',     $orderBy, $vars, $lang->task->status);?></th>
          <th class='w-80px'><?php commonModel::printOrderLink('consumed',   $orderBy, $vars, $lang->task->consumedAB . $lang->task->lblHour);?></th>
          <th class='w-80px'><?php commonModel::printOrderLink('left',       $orderBy, $vars, $lang->task->leftAB . $lang->task->lblHour);?></th>
        </tr>
      </thead>
      <tbody>
        <?php foreach($tasks as $task):?>
        <tr class='text-center'>
          <?php if(commonModel::hasPriv('task', 'batchClose')):?>
          <td class='text-left'><label class='checkbox-inline'><input type='checkbox' name='taskIDList[]' value='<?php echo $task->id;?>'/> <?php echo $task->id;?></td>
          <?php endif;?>
          <td class='text-left' title="<?php echo $task->name;?>">
            <?php if($task->parent != 0) echo "<span class='label label-info'>{$lang->task->childrenAB}</span>"?>
            <?php if(!empty($task->team)) echo "<span class='label label-info'>{$lang->task->multipleAB}</span>"?>
            <?php echo html::a($this->createLink('task', 'view', "taskID=$task->id"), $task->name);?>
            <?php if(!empty($task->children)) echo "<span class='task-toggle'>&nbsp;&nbsp;<i class='icon icon-minus'></i>&nbsp;&nbsp;</span>"?>
          </td>
          <td><?php if(isset($users[$task->assignedTo])) echo $users[$task->assignedTo];?></td>
          <td class="<?php echo $task->status;?>"><?php echo zget($lang->task->statusList, $task->status);?></td>
          <td><?php echo $task->consumed;?></td>
          <td><?php echo $task->left;?></td>
        </tr>
        <?php if(!empty($task->children)):?>
        <tr class='tr-child'>
          <td colspan='10'>
            <table class='table table-data table-hover table-fixed'>
              <?php foreach($task->children as $child):?>
              <tr class='text-center'>
                <?php if(commonModel::hasPriv('task', 'batchClose')):?>
                <td class='w-60px'><?php echo $child->id;?></td>
                <?php endif;?>
                <td class='text-left' title="<?php echo $child->name;?>">
                  <span class='label label-info'><?php echo $lang->task->childrenAB?></span>
                  <?php echo html::a($this->createLink('task', 'view', "taskID=$child->id"), $child->name);?>
                </td>
                <td class='w-80px'><?php if(isset($users[$child->assignedTo])) echo $users[$child->assignedTo];?></td>
                <td class="w-90px <?php echo $child->status;?>"><?php echo zget($lang->task->statusList, $child->status);?></td>
                <td class='w-80px'><?php echo $child->consumed;?></td>
                <td class='w-100px'><?php echo $child->left;?></td>
              </tr>
              <?php endforeach;?>
            </table>
          </td>
        </tr>
        <?php endif;?>
        <?php endforeach;?>
      </tbody>
      <tfoot>
        <tr>
          <td colspan='10'>
            <?php if(commonModel::hasPriv('task', 'batchClose') && $tasks):?>
            <div class='pull-left'><?php echo html::selectButton() . html::submitButton($lang->close);?></div>
            <?php endif;?>
            <?php $pager->show($align = 'right', $type = 'short');?>
          </td>
        </tr>
      </tfoot>
    </table>
  <?php if(commonModel::hasPriv('task', 'batchClose')):?>
  </form>
  <?php endif;?>
</div>
<?php include '../../common/view/footer.html.php';?>
