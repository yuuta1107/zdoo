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
<form method='post' id='ajaxForm' action='<?php echo inlink('reimburse', "type={$type}&refundID={$refundID}&currency={$currency}&money={$money}")?>'>
  <table class='table table-form'>
    <tr>
      <th class='w-100px'><?php echo $lang->refund->reviewMoney;?></th>
      <td>
        <div class='input-group'>
          <?php echo html::input('money', $money, "class='form-control' readonly");?>
          <span class='input-group-addon'><?php echo zget($lang->currencyList, $currency, $currency);?></span>
        </div>
      </td>
      <td class='w-40px'></td>
    </tr>
    <tr>
      <th class='text-center text-middle'><?php echo $lang->refund->createTrade;?></th>
      <td><?php echo html::radio('trade', array('yes' => $lang->yes, 'no' => $lang->no), 'yes');?></td>
      <td></td>
    </tr>
    <tr>
      <th></th>
      <td><?php echo html::submitButton();?></td>
      <td></td>
    </tr>
  </table>
</form>
<?php include '../../../sys/common/view/footer.modal.html.php';?>
