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
      <tr class='text-center'>
        <th class='w-200px'><?php echo $lang->contract->team->account;?></th>
        <th><?php echo $lang->contract->team->rate;?></th>
        <th><?php echo $lang->contract->team->money;?></th>
        <th class='w-80px'><?php echo $lang->actions;?></th>
      </tr>
      <?php $key = 0;?>
      <?php foreach($members as $member):?>
      <tr>
        <td><?php echo html::select("account[$key]", $users, $member->account, "id='account{$key}' class='form-control chosen'");?></td>
        <td><?php echo html::input("rate[$key]", $member->rate, "id='rate{$key}' class='form-control'");?></td>
        <td><?php echo html::input("money[$key]", round($contract->amount * $member->rate / 100, 2), "id='money{$key}' class='form-control'");?></td>
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
        <td><?php echo html::input("rate[$key]", '', "id='rate{$key}' class='form-control'");?></td>
        <td><?php echo html::input("money[$key]", '', "id='money{$key}' class='form-control'");?></td>
        <td class='text-center text-middle'>
          <a href='javascript:;' class='btn btn-xs addItem'><i class='icon icon-plus'></i></a>
          <a href='javascript:;' class='btn btn-xs delItem'><i class='icon icon-remove'></i></a>
        </td>
      </tr>
      <?php $key++;?>
      <?php endfor;?>
      <tr>
        <th class='text-center'><?php echo $lang->contract->team->total;?></th>
        <td class='text-right'><div id='totalRate'></div></td>
        <td class='text-right'><div id='totalMoney'></div></td>
        <td></td>
      </tr>
      <tr>
        <td class='text-danger'><?php echo $lang->contract->teamTips;?></td>
        <td class='text-center'><?php echo html::submitButton();?></td>
        <td colspan='2'></td>
      </tr>
    </table>
  </form>
</div>
<?php
$select  = html::select('account[KEY]', $users, '', "id='accountKEY' class='form-control chosen'");
$itemRow = <<<EOT
<tr>
  <td>{$select}</td>
  <td><input type='text' name='rate[KEY]' id='rateKEY' class='form-control'></td>
  <td><input type='text' name='money[KEY]' id='rateKEY' class='form-control'></td>
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
