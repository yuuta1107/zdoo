<?php
/**
 * The review view file of makeup module of RanZhi.
 *
 * @copyright   Copyright 2009-2016 青岛易软天创网络科技有限公司(QingDao Nature Easy Soft Network Technology Co,LTD, www.cnezsoft.com)
 * @license     ZPL (http://zpl.pub/page/zplv12.html)
 * @author      Tingting Dai <daitingting@xirangit.com>
 * @package     makeup 
 * @version     $Id$
 * @link        http://www.ranzhico.com
 */
?>
<?php include '../../../sys/common/view/header.modal.html.php';?>
<?php include '../../../sys/common/view/kindeditor.html.php';?>
<form method='post' id='ajaxForm' action='<?php echo inlink('review', "id={$makeup->id}")?>'>
  <table class='table table-fixed table-bordered'>

    <thead>
    <tr class='text-center'>
      <th class='w-80px'><?php echo $lang->makeup->createdBy;?></th>
      <th class='w-100px'><?php echo $lang->makeup->begin;?></th>
      <th class='w-100px'><?php echo $lang->makeup->end;?></th>
      <th><?php echo $lang->makeup->leave;?></th>
      <th class='w-90px text-nowrap'><?php echo $lang->makeup->desc;?></th>
      <th class='w-120px'></th>
    </tr>
    </thead>

    <tr class='text-center'>
      <td><?php echo zget($users, $makeup->createdBy);?></td>
      <td><?php echo substr($makeup->begin, 2) . ' ' . substr($makeup->start, 0, 5);?></td>
      <td><?php echo substr($makeup->end, 2) . ' ' . substr($makeup->finish, 0, 5);?></td>
      <?php $leaveTitle = '';?>
      <?php foreach(explode(',', trim($makeup->leave, ',')) as $leave):?>
      <?php if(!$leave) continue;?>
      <?php $leaveTitle .= zget($leavePairs, $leave) . '</br>';?>
      <?php endforeach;?>
      <td title='<?php echo str_replace('</br>', "\n", $leaveTitle)?>'><?php echo $leaveTitle?></td>
      <td class='text-ellipsis' title="<?php echo $makeup->desc;?>"><?php echo $makeup->desc;?></td>
      <td><?php echo html::radio("status", $lang->makeup->reviewStatusList, $makeup->status == 'reject' ? 'reject' : 'pass');?></td>
    </tr>

  </table>
  <table class='table table-borderless'>
    <tr class='comment'>
      <th class='w-50px text-center text-middle'><?php echo $lang->comment;?></th>
      <td><?php echo html::textarea("comment", '', "class='form-control'");?></td>
      <td class='text-middle'><?php echo html::submitButton();?></td>
    </tr>
  </table>
</form>
<?php include '../../../sys/common/view/footer.modal.html.php';?>
