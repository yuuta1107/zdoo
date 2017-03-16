<?php
/**
 * The detail view file of leave module of RanZhi.
 *
 * @copyright   Copyright 2009-2017 青岛易软天创网络科技有限公司(QingDao Nature Easy Soft Network Technology Co,LTD, www.cnezsoft.com)
 * @license     ZPL (http://zpl.pub/page/zplv12.html)
 * @author      Gang Liu <liugang@cnezsoft.com>
 * @package     leave 
 * @version     $Id$
 * @link        http://www.ranzhico.com
 */
?>
<?php include '../../../sys/common/view/header.modal.html.php';?>
<table class='table table-condensed'>
  <tr>
    <th><?php echo $lang->leave->createdBy;?></th>
    <td><?php echo zget($users, $leave->createdBy);?></th>
    <th><?php echo $lang->user->dept;?></th>
    <td><?php echo zget($depts, $user->dept);?></td>
    <th><?php echo $lang->leave->type;?></th>
    <td><?php echo zget($lang->leave->typeList, $leave->type);?></td>
  </tr>
</table>
<?php include '../../../sys/common/view/footer.modal.html.php';?>
