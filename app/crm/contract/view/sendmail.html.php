<?php
/**
 * The send mail view file of contract module of RanZhi.
 *
 * @copyright   Copyright 2009-2018 青岛易软天创网络科技有限公司(QingDao Nature Easy Soft Network Technology Co,LTD, www.cnezsoft.com)
 * @license     ZPL (http://zpl.pub/page/zplv12.html)
 * @author      Gang Liu <liugang@cnezsoft.com>
 * @package     contract
 * @version     $Id$
 * @link        http://www.ranzhi.org
 */
?>
<?php include '../../../sys/common/view/mail.header.html.php';?>
<tr>
  <td>
    <table cellpadding='0' cellspacing='0' width='600' style='border: none; border-collapse: collapse;'>
      <tr>
        <td style='padding: 10px; background-color: #F8FAFE; border: none; font-size: 14px; font-weight: 500; border-bottom: 1px solid #e5e5e5;'>
          <?php echo $lang->contract->common . '#' . $contract->name;?>
        </td>
      </tr>
    </table>
  </td>
</tr>
<tr>
  <td style='padding: 10px; border: none;'>
    <table>
      <thead>
        <tr>
          <th><?php echo $lang->contract->team->account;?></th>
          <th><?php echo $lang->contract->team->rate;?></th>
          <th><?php echo $lang->contract->team->money;?></th>
          <th><?php echo $lang->contract->team->status;?></th>
        </tr>
      </thead>
      <?php foreach($members as $member):?>
      <tr>
        <td><?php echo zget($users, $member->account);?></td>
        <td><?php echo $member->rate == 0 ? '' : $member->rate;?></td>
        <td><?php echo round($contract->amount * $member->rate / 100, 2);?></td>
        <td><?php echo zget($lang->contract->team->statusList, $member->status);?></td>
      </tr>
      <?php endforeach;?>
    </table>
  </td>
</tr>
<?php include '../../../sys/common/view/mail.footer.html.php';?>
