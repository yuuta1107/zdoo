<?php
/**
 * The review view file of lieu module of RanZhi.
 *
 * @copyright   Copyright 2009-2016 青岛易软天创网络科技有限公司(QingDao Nature Easy Soft Network Technology Co,LTD, www.cnezsoft.com)
 * @license     ZPL (http://zpl.pub/page/zplv12.html)
 * @author      Tingting Dai <daitingting@xirangit.com>
 * @package     lieu 
 * @version     $Id$
 * @link        http://www.ranzhico.com
 */
?>
<?php include '../../../sys/common/view/header.modal.html.php';?>
<?php include '../../../sys/common/view/kindeditor.html.php';?>
<form method='post' id='ajaxForm' action='<?php echo inlink('review', "id={$lieu->id}")?>'>
  <table class='table table-fixed table-bordered'>

    <thead>
    <tr class='text-center'>
      <th class='w-80px'><?php echo $lang->lieu->createdBy;?></th>
      <th class='w-100px'><?php echo $lang->lieu->begin;?></th>
      <th class='w-100px'><?php echo $lang->lieu->end;?></th>
      <th><?php echo $lang->lieu->overtime;?></th>
      <th class='w-90px text-nowrap'><?php echo $lang->lieu->desc;?></th>
      <th class='w-120px'></th>
    </tr>
    </thead>

    <tr class='text-center'>
      <td><?php echo zget($users, $lieu->createdBy);?></td>
      <td><?php echo substr($lieu->begin, 2) . ' ' . substr($lieu->start, 0, 5);?></td>
      <td><?php echo substr($lieu->end, 2) . ' ' . substr($lieu->finish, 0, 5);?></td>
      <?php $overtimeTitle = ''?>
      <?php foreach(explode(',', trim($lieu->overtime, ',')) as $overtime):?>
      <?php if(!$overtime) continue;?>
      <?php $overtimeTitle .= zget($overtimePairs, $overtime) . '</br>';?>
      <?php endforeach;?>
      <td title='<?php echo str_replace('</br>', "\n", $overtimeTitle)?>'><?php echo $overtimeTitle?></td>
      <td class='text-ellipsis' title="<?php echo $lieu->desc;?>"><?php echo $lieu->desc;?></td>
      <td><?php echo html::radio("status", $lang->lieu->reviewStatusList, $lieu->status == 'reject' ? 'reject' : 'pass');?></td>
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
