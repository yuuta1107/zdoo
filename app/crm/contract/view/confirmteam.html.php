<?php
/**
 * The yyy view file of contract module of RanZhi.
 *
 * @copyright   Copyright 2009-2018 青岛易软天创网络科技有限公司(QingDao Nature Easy Soft Network Technology Co,LTD, www.cnezsoft.com)
 * @license     ZPL (http://zpl.pub/page/zplv12.html)
 * @author      Gang Liu <liugang@cnezsoft.com>
 * @package     contract
 * @version     $Id$
 * @link        http://www.ranzhi.org
 */
?>
<?php include '../../common/view/header.html.php';?>
<div class='panel container'>
  <table class='table table-condensed table-borderless'>
    <thead>
      <tr class='text-center'>
        <th class='w-200px'><?php echo $lang->contract->team->account;?></th>
        <th><?php echo $lang->contract->team->rate;?></th>
        <th><?php echo $lang->contract->team->money;?></th>
        <th class='w-80px'><?php echo $lang->contract->team->status;?></th>
        <th class='w-80px'><?php echo $lang->actions;?></th>
      </tr>
    </thead>
    <?php foreach($members as $member):?>
    <tr class='text-center text-middle'>
      <td><?php echo zget($users, $member->account);?></td>
      <td><?php echo $member->rate == 0 ? '' : $member->rate;?></td>
      <td><?php echo round($contract->amount * $member->rate / 100, 2);?></td>
      <td class='team-<?php echo $member->status;?>'><?php echo zget($lang->contract->team->statusList, $member->status);?></td>
      <td class='w-100px'>
        <?php if($member->status != 'accept' && $member->account == $this->app->user->account):?>
        <?php commonModel::printLink('crm.contract', 'confirmTeam', "contractID={$contract->id}&status=accept", $lang->contract->team->accept, "class='btn btn-xs jsoner'");?>
        <?php commonModel::printLink('crm.contract', 'confirmTeam', "contractID={$contract->id}&status=reject", $lang->contract->team->reject, "class='btn btn-xs jsoner'");?>
        <?php endif;?>
      </td>
    </tr>
    <?php endforeach;?>
  </table>
</div>
<?php include '../../common/view/footer.modal.html.php';?>
