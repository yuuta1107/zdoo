<style>
.tr-child, .tr-child > td {padding: 0;}
.tr-child > td > table {padding: 5px; background-color: #fff; border: 2px solid #DDDDDD;}
</style>
<div class='panel'>
  <table class='table table-hover table-striped tablesorter table-data table-fixed text-center' id='refundTable'>
    <thead>
      <tr class='text-center'>
        <?php $vars = "date=$date&type=&orderBy=%s&recTotal={$pager->recTotal}&recPerPage={$pager->recPerPage}&pageID={$pager->pageID}";?>
        <th class='w-50px'><?php commonModel::printOrderLink('id', $orderBy, $vars, $lang->refund->id);?></th>
        <th class='w-100px text-left visible-lg'><?php commonModel::printOrderLink('dept', $orderBy, $vars, $lang->refund->dept);?></th>
        <th class='text-left'><?php commonModel::printOrderLink('name', $orderBy, $vars, $lang->refund->name);?></th>
        <th class='w-120px text-left'><?php commonModel::printOrderLink('category', $orderBy, $vars, $lang->refund->category);?></th>
        <th class='w-100px text-right'><?php commonModel::printOrderLink('money', $orderBy, $vars, $lang->refund->money);?></th>
        <th class='w-100px'><?php commonModel::printOrderLink('status', $orderBy, $vars, $lang->refund->status);?></th>
        <th class='w-100px'><?php commonModel::printOrderLink('payee', $orderBy, $vars, $lang->refund->payee);?></th>
        <th class='w-80px'><?php commonModel::printOrderLink('createdDate', $orderBy, $vars, $lang->refund->createdDate);?></th>
        <th class='w-120px'><?php commonModel::printOrderLink('refundBy', $orderBy, $vars, $lang->refund->refundBy);?></th>
        <th class='w-100px'><?php commonModel::printOrderLink('refundDate', $orderBy, $vars, $lang->refund->refundDate);?></th>
        <th class='w-<?php echo $lang->refund->todoActionWidth;?>px'><?php echo $lang->actions;?></th>
      </tr>
    </thead>
    <?php foreach($refunds as $account => $accountRefunds):?>
    <?php foreach($accountRefunds as $currency => $currencyRefunds):?>
    <tr>
      <td><span class="task-toggle"><i class="icon icon-plus"></i></span></td>
      <td class='text-left'><?php echo zget($deptList, $currencyRefunds['dept'], '');?></td>
      <td></td>
      <td></td>
      <td class='text-right'><?php echo zget($currencySign, $currency) . number_format($currencyRefunds['total'], 2, '.', '');?></td>
      <td class='refund-pass'><?php echo zget($lang->refund->statusList, 'pass');?></td>
      <td><?php echo zget($userPairs, $account);?></td>
      <td></td>
      <td></td>
      <td></td>
      <td class='text-left'>
        <?php echo html::a('javascript:$(".task-toggle").click()', $lang->detail);?>
        <?php $idList = helper::safe64Encode(helper::jsonEncode($currencyRefunds['idList']));?>
        <?php echo html::a($this->createLink('refund', 'reimburse', "type=total&refundID={$idList}&currency={$currency}&money={$currencyRefunds['total']}"), $lang->refund->common, "data-toggle='modal' data-width='540'");?>
      </td>
    </tr>
    <tr class='tr-child hide'>
      <td colspan='11'>
        <table class='table table-data table-hover table-fixed'>
          <?php foreach($currencyRefunds['detail'] as $refund):?>
          <tr id='refund<?php echo $refund->id;?>' data-url='<?php echo $this->createLink('refund', 'view', "refundID={$refund->id}&mode={$mode}");?>'>
            <td class='w-50px'><?php echo $refund->id;?></td>
            <td class='w-100px text-left visible-lg'><?php echo zget($deptList, $refund->dept, '');?></td>
            <td class='text-left' title='<?php echo $refund->name;?>'><?php echo $refund->name;?></td>
            <td class='w-120px text-left' title='<?php echo zget($categories, $refund->category);?>'><?php echo zget($categories, $refund->category, ' ');?></td>
            <td class='w-100px text-right'><?php echo zget($currencySign, $refund->currency) . $refund->money;?></td>
            <td class='w-100px refund-<?php echo $refund->status?>' title='<?php echo $refund->statusLabel;?>'><?php echo $refund->statusLabel;?></td>
            <td class='w-100px'><?php echo zget($userPairs, $refund->createdBy);?></td>
            <td class='w-80px'><?php echo formatTime($refund->createdDate, DT_DATE1);?></td>
            <td class='w-120px'><?php echo zget($userPairs, $refund->refundBy);?></td>
            <td class='w-100px'><?php echo formatTime($refund->refundDate, DT_DATE1)?></td>
            <td class='w-<?php echo $lang->refund->todoActionWidth;?>px text-left'>
              <?php echo html::a($this->createLink('refund', 'view', "refundID={$refund->id}&mode={$mode}"), $lang->detail);?>
              <?php echo html::a($this->createLink('refund', 'reimburse', "type=single&refundID={$refund->id}"), $lang->refund->common, "data-toggle='modal' data-width='540'");?>
            </td>
          </tr>
          <?php endforeach;?>
        </table>
      </td>
    </tr>
    <?php endforeach;?>
    <?php endforeach;?>
  </table>
  <div class='table-footer'>
    <?php $totalMoney = 0;//$this->refund->total($refunds);?>
    <?php if($totalMoney):?>
    <div class='pull-left text-danger'><?php echo $lang->refund->total . $totalMoney;?></div>
    <?php endif;?>
    <?php $pager->show();?>
  </div>
</div>
<script>
$('.task-toggle').click(function()
{
    var obj = $(this).find('i');
    if(obj.hasClass('icon-plus'))
    {
       obj.parents('tr').next('tr').show();
       obj.removeClass('icon-plus').addClass('icon-minus');
    }
    else if(obj.hasClass('icon-minus'))
    {
       obj.parents('tr').next('tr').hide();
       obj.removeClass('icon-minus').addClass('icon-plus');
    }
    return false;
});
</script>
