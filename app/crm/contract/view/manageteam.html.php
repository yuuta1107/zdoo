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
<?php include '../../../sys/common/view/header.modal.html.php';?>
<?php include '../../../sys/common/view/chosen.html.php';?>
<?php js::set('amount', $contract->amount);?>
<?php js::set('users', helper::jsonEncode($users));?>
<div class='panel'>
  <form id='teamForm' method='post' action='<?php echo inlink('manageTeam', "contractID={$contract->id}");?>'>
    <table class='table table-condensed table-borderless'>
      <thead>
        <tr class='text-center'>
          <th class='w-180px'><?php echo $lang->contract->team->account;?></th>
          <th><?php echo $lang->contract->team->contribution;?></th>
          <th><?php echo $lang->contract->team->money;?></th>
          <th class='w-80px'><?php echo $lang->contract->team->status;?></th>
          <th class='w-80px'><?php echo $lang->actions;?></th>
        </tr>
      </thead>
      <?php $key = 0;?>
      <?php foreach($members as $member):?>
      <tr>
        <td><?php echo html::select("account[$key]", $users, $member->account, "id='account{$key}' class='form-control chosen'");?></td>
        <td><?php echo html::input("contribution[$key]", $member->contribution, "id='contribution{$key}' class='form-control'");?></td>
        <td><?php echo html::input("money[$key]", round($contract->amount * $member->contribution / 100, 2), "id='money{$key}' class='form-control'");?></td>
        <td class='text-center text-middle team-<?php echo $member->status;?>'><?php echo zget($lang->contract->team->statusList, $member->status);?></td>
        <td class='text-center text-middle'>
          <a href='javascript:;' class='btn btn-xs addItem'><i class='icon icon-plus'></i></a>
          <a href='javascript:;' class='btn btn-xs delItem'><i class='icon icon-remove'></i></a>
        </td>
      </tr>
      <?php $key++;?>
      <?php endforeach;?>
      <?php for($i = 0; $i < ($config->contract->memberCount - count($members)); $i++):?>
      <tr>
        <td><?php echo html::select("account[$key]", $users, '', "id='account{$key}' class='form-control chosen'");?></td>
        <td><?php echo html::input("contribution[$key]", '', "id='contribution{$key}' class='form-control'");?></td>
        <td><?php echo html::input("money[$key]", '', "id='money{$key}' class='form-control'");?></td>
        <td class='text-center text-middle team-wait'><?php echo $lang->contract->team->statusList['wait'];?></td>
        <td class='text-center text-middle'>
          <a href='javascript:;' class='btn btn-xs addItem'><i class='icon icon-plus'></i></a>
          <a href='javascript:;' class='btn btn-xs delItem'><i class='icon icon-remove'></i></a>
        </td>
      </tr>
      <?php $key++;?>
      <?php endfor;?>
      <tr>
        <th class='text-center'><?php echo $lang->contract->team->total;?></th>
        <td class='text-right'><div id='totalContribution'></div></td>
        <td class='text-right'><div id='totalMoney'></div></td>
        <td></td>
        <td></td>
      </tr>
      <tr>
        <td class='text-center text-danger' colspan='5'>
          <?php echo html::submitButton();?>
          <?php echo $lang->contract->teamTips;?>
        </td>
      </tr>
    </table>
  </form>
</div>
<?php
$select  = html::select('account[KEY]', $users, '', "id='accountKEY' class='form-control chosen'");
$itemRow = <<<EOT
<tr>
  <td>{$select}</td>
  <td><input type='text' name='contribution[KEY]' id='contributionKEY' class='form-control'></td>
  <td><input type='text' name='money[KEY]' id='moneyKEY' class='form-control'></td>
  <td class='text-center text-middle team-wait'>{$lang->contract->team->statusList['wait']}</td>
  <td class='text-center text-middle'>
    <a href='javascript:;' class='btn btn-xs addItem'><i class='icon icon-plus'></i></a>
    <a href='javascript:;' class='btn btn-xs delItem'><i class='icon icon-remove'></i></a>
  </td>
</tr>
EOT;
?>
<?php js::set('key', $key);?>
<?php js::set('itemRow', $itemRow);?>
<?php include '../../../sys/common/view/footer.modal.html.php';?>
