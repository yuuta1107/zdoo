<?php
/**
 * The recordEstimate view file of task module of Ranzhi.
 *
 * @copyright   Copyright 2009-2018 青岛易软天创网络科技有限公司(QingDao Nature Easy Soft Network Technology Co,LTD, www.cnezsoft.com)
 * @license     ZPL (http://zpl.pub/page/zplv12.html)
 * @author      chujilu <chujilu@cnezsoft.com>
 * @package     task
 * @version     $Id$
 * @link        http://www.ranzhi.org
 */
?>
<?php include '../../../sys/common/view/header.modal.html.php';?>
<?php include '../../common/view/kindeditor.html.php';?>
<form method='post' id='estimateForm' action='<?php echo $this->createLink('task', 'recordEstimate', "taskID=$task->id")?>'>
  <table class='table table-form'>
    <tr>
      <th class='w-100px'><?php echo $lang->task->myConsumption;?></th>
      <td class='w-p45'><?php echo html::input('consumed', $task->consumed, "class='form-control' placeholder='{$lang->task->hour}'");?></td>
      <td></td>
    </tr>
    <tr>
      <th><?php echo $lang->task->left;?></th>
      <td><?php echo html::input('left', $left, "class='form-control'");?></td>
      <td></td>
    </tr>
    <tr>
      <th><?php echo $lang->comment?></th>
      <td colspan='2'><?php echo html::textarea('comment');?></td>
    </tr>
    <tr>
      <th></th>
      <td><?php echo html::submitButton();?></td>
      <td></td>
    </tr>
  </table>
</form>
<?php include '../../../sys/common/view/footer.modal.html.php';?>
