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
<?php include '../../../sys/common/view/datepicker.html.php';?>
<?php include '../../../sys/common/view/chosen.html.php';?>
<form method='post' id='ajaxForm' action='<?php echo inlink('review', "id={$makeup->id}")?>'>
  <table class='table table-fixed table-bordered'>

    <thead>
    <tr class='text-center'>
      <th class='w-80px'><?php echo $lang->makeup->createdBy;?></th>
      <th class='w-80px'><?php echo $lang->makeup->type;?></th>
      <th class='w-150px'><?php echo $lang->makeup->begin;?></th>
      <th class='w-150px'><?php echo $lang->makeup->end;?></th>
      <th class='w-90px text-nowrap'><?php echo $lang->makeup->desc;?></th>
      <th class='w-160px'></th>
    </tr>
    </thead>

    <tr class='text-center'>
      <td><?php echo $makeup->createdBy;?></td>
      <td><?php echo $lang->makeup->typeList[$makeup->type];?></td>
      <td><?php echo $makeup->begin . ' ' . $makeup->start;?></td>
      <td><?php echo $makeup->end . ' ' . $makeup->finish;?></td>
      <td class='text-ellipsis' title="<?php echo $makeup->desc;?>"><?php echo $makeup->desc;?></td>
      <td><?php echo html::radio("status", $lang->makeup->reviewStatusList, $makeup->status == 'reject' ? 'reject' : 'pass');?></td>
    </tr>

  </table>
  <table class='table table-borderless'>
    <tr class='comment'>
      <th class='w-50px text-center text-middle'><?php echo $lang->makeup->comment;?></th>
      <td><?php echo html::textarea("comment", '', "class='form-control rowspan=4'");?></td>
      <td class='text-middle'><?php echo html::submitButton();?></td>
    </tr>
  </table>
</form>
<?php include '../../../sys/common/view/footer.modal.html.php';?>
