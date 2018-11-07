<?php
/**
 * The reimburse view file of refund module of RanZhi.
 *
 * @copyright   Copyright 2009-2018 青岛易软天创网络科技有限公司(QingDao Nature Easy Soft Network Technology Co,LTD, www.cnezsoft.com)
 * @license     ZPL (http://zpl.pub/page/zplv12.html)
 * @author      Tingting Dai <daitingting@xirangit.com>
 * @package     refund 
 * @version     $Id$
 * @link        http://www.ranzhi.org
 */
?>
<?php include '../../../sys/common/view/header.modal.html.php';?>
<?php include '../../../sys/common/view/kindeditor.html.php';?>
<?php js::set('detail', !empty($refund->detail) ? true : false);?>
<form method='post' id='ajaxForm' action='<?php echo inlink('reimburse', "refundID={$refund->id}")?>'>
  <table class='table table-borderless'>
    <tr class='reviewMoney'>
      <th class='w-120px text-center text-middle'><?php echo $lang->refund->reviewMoney;?></th>
      <td class="w-300px">
        <div class='input-group'>
          <?php echo html::input('money', $refund->money, "class='form-control' readonly");?>
          <span class='input-group-addon'><?php echo zget($lang->currencyList, $refund->currency, $refund->currency);?></span>
        </div>
      </td>
      <td></td>
    </tr>
    <tr class='reason'>
      <th class='text-center text-middle'><?php echo $lang->refund->createTradeTip;?></th>
      <td><?php echo html::radio('trade', array('no' => $lang->no, 'yes' => $lang->yes));?></td>
    </tr>
    <tr>
      <th></th>
      <td><?php echo html::submitButton();?></td>
      <td></td>
    </tr>
  </table>
</form>
<?php include '../../../sys/common/view/footer.modal.html.php';?>
