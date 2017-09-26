<?php
/**
 * The detail view file of project module of RanZhi.
 *
 * @copyright   Copyright 2009-2016 青岛易软天创网络科技有限公司(QingDao Nature Easy Soft Network Technology Co,LTD, www.cnezsoft.com)
 * @license     ZPL (http://zpl.pub/page/zplv12.html)
 * @author      Gang Liu <liugang@cnezsoft.com>
 * @package     project 
 * @version     $Id$
 * @link        http://www.ranzhico.com
 */
?>
<?php include '../../../sys/common/view/header.modal.html.php';?>
<table class="table table-form">
  <tr>
     <th class='w-70px'><?php echo $lang->project->status;?></th>
     <td><?php echo zget($lang->project->statusList, $project->status);?></td>
  </tr>
  <tr>
     <th><?php echo $lang->project->desc;?></th>
     <td><?php echo $project->desc;?></td>
  </tr>
  <tr>
     <th><?php echo $lang->project->begin;?></th>
     <td><?php echo $project->begin;?></td>
  </tr>
  <tr>
     <th><?php echo $lang->project->end;?></th>
     <td><?php echo $project->end;?></td>
  </tr>
  <tr>
     <th><?php echo $lang->project->manager;?></th>
     <td><?php foreach($project->members as $member) if($member->role == 'manager') echo  zget($users, $member->account);?></td>
  </tr>
     <th><?php echo $lang->project->member;?></th>
     <td><?php foreach($project->members as $member) if($member->role == 'member') echo  zget($users, $member->account) . " ";?></td>
  </tr>
  <tr>
     <th><?php echo $lang->project->createdBy;?></th>
     <td><?php echo zget($users, $project->createdBy);?></td>
  </tr>
  <tr>
     <th><?php echo $lang->project->createdDate;?></th>
     <td><?php echo formatTime($project->createdDate, DT_DATE1);?></td>
  </tr>
</table>
<?php include '../../../sys/common/view/footer.modal.html.php';?>
