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
<ul id='menuTitle'>
  <li><?php commonModel::printLink('contract', 'browse', '', $lang->contract->list);?></li>
  <li class='divider angle'></li>
  <li class='title'><?php echo $contract->name;?></li>
</ul>
<div class='panel container'>
  <table class='table table-condensed table-borderless'>
    <thead>
      <tr class='text-center'>
        <th><?php echo $lang->contract->team->account;?></th>
        <th><?php echo $lang->contract->team->contribution;?></th>
        <th><?php echo $lang->contract->team->money;?></th>
        <th><?php echo $lang->contract->team->status;?></th>
        <th class='w-100px'><?php echo $lang->actions;?></th>
      </tr>
    </thead>
    <?php foreach($members as $member):?>
    <tr class='text-center text-middle'>
      <td><?php echo zget($users, $member->account);?></td>
      <td><?php echo $member->contribution == 0 ? '' : $member->contribution;?></td>
      <td><?php echo round($contract->amount * $member->contribution / 100, 2);?></td>
      <td class='team-<?php echo $member->status;?>'><?php echo zget($lang->contract->team->statusList, $member->status);?></td>
      <td>
        <?php if($member->status != 'accept' && $member->account == $this->app->user->account):?>
        <?php commonModel::printLink('crm.contract', 'confirmTeam', "contractID={$contract->id}&status=accept", $lang->contract->team->accept, "class='btn btn-xs jsoner'");?>
        <?php commonModel::printLink('crm.contract', 'confirmTeam', "contractID={$contract->id}&status=reject", $lang->contract->team->reject, "class='btn btn-xs jsoner'");?>
        <?php endif;?>
      </td>
    </tr>
    <?php endforeach;?>
  </table>
  <div class='table-footer text-center'><?php commonModel::printLink('crm.contract', 'view', "contractID={$contract->id}", $lang->goback, "class='btn btn-primary'");?></div>
</div>
<?php include '../../common/view/footer.html.php';?>
