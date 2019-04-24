<?php
/**
 * The show import view of trade module of RanZhi.
 *
 * @copyright   Copyright 2009-2018 青岛易软天创网络科技有限公司(QingDao Nature Easy Soft Network Technology Co,LTD, www.cnezsoft.com)
 * @license     ZPL (http://zpl.pub/page/zplv12.html)
 * @author      Yidong Wang <yidong@cnezsoft.com>
 * @package     trade
 * @version     $Id$
 * @link        http://www.ranzhi.org
 */
?>
<?php include $app->getModuleRoot() . 'common/view/header.html.php';?>
<?php include '../../../sys/common/view/datepicker.html.php';?>
<?php include '../../../sys/common/view/chosen.html.php';?>
<?php js::set('showExistTrade', $lang->trade->showExistTrade);?>
<?php js::set('hideExistTrade', $lang->trade->hideExistTrade);?>
<form id='ajaxForm' method='post'>
  <div class='panel'>
    <div class='panel-heading'><strong><?php echo $lang->trade->showImport;?></strong></div>
    <table class='table table-hover'>
      <thead>
        <tr class='text-center'>
          <th class='w-100px'><?php echo $lang->trade->depositor;?></th>
          <th class='w-90px'><?php echo $lang->trade->type;?></th> 
          <th class='w-120px'><?php echo $lang->trade->category;?></th> 
          <th class='w-220px'><?php echo $lang->trade->trader;?></th> 
          <th class='w-100px'><?php echo $lang->trade->money;?></th>
          <th class='w-130px'><?php echo $lang->trade->dept;?></th>
          <th class='w-120px'><?php echo $lang->trade->handlers;?></th>
          <th class='w-120px'><?php echo $lang->trade->product;?></th>
          <?php if(!empty($existTrades)):?>
          <th class='w-180px'><?php echo $lang->trade->date;?></th>
          <?php else:?>
          <th class='w-110px'><?php echo $lang->trade->date;?></th>
          <?php endif;?>
          <th><?php echo $lang->trade->desc;?></th>
        </tr>
      </thead>
      <tbody>
        <?php $deptList['ditto'] = $lang->ditto;?>
        <?php $users['ditto']    = $lang->ditto;?>
        <?php foreach($trades as $i => $trade):?>
        <?php
        if($i == 0)
        {
            $trade['dept']     = $trade['dept']     ? $trade['dept']     : '';
            $trade['handlers'] = $trade['handlers'] ? $trade['handlers'] : '';
        }
        else
        {
            $trade['dept']     = $trade['dept']     ? $trade['dept']     : 'ditto';
            $trade['handlers'] = $trade['handlers'] ? $trade['handlers'] : 'ditto';
        }
        ?>
        <tr <?php echo !empty($existTrades[$i]) ? "class='repeat-record' title={$lang->trade->unique} data-toggle='tooltip'" : '';?>>
          <td class='text-middle'><?php echo $depositor->abbr;?></td>
          <td>
            <?php echo html::select("type[$i]", $lang->trade->typeList, $trade['type'], "class='form-control type' id='type{$i}'");?>
          </td>
          <td>
            <?php echo html::select("category[$i]", $incomeTypes, $trade['category'], "class='form-control in' title='" . zget($incomeTypes, $trade['category']) . "' style='display:none'");?>
            <?php echo html::select("category[$i]", $expenseTypes, $trade['category'], "class='form-control out' title='" . zget($expenseTypes, $trade['category']) . "'");?>
          </td>
          <td>
            <?php $hasCustomer = (is_numeric($trade['trader']) or empty($trade['trader']));?>
            <div class='input-group out' <?php if($trade['type'] == 'in') echo "style='display:none'"?>>
              <?php echo html::select("trader[$i]", $traderList, ($hasCustomer ? $trade['trader'] : 0), "class='form-control chosen' id='trader{$i}' data-no_results_text='" . $lang->searchMore . "'");?>
              <?php echo html::input("traderName[$i]", $hasCustomer ? '' : $trade['trader'], "class='form-control' id='traderName{$i}' style='display:none'");?>
              <div class='input-group-addon'>
                <label class="checkbox-inline">
                  <input type="checkbox" name="createTrader[<?php echo $i;?>]" value="1">
                  <?php echo $lang->trade->newTrader;?>
                  <?php if(!$hasCustomer):?><i class='red icon-question' title="<?php echo $lang->trade->noTraderMatch;?>"></i><?php endif;?>
                </label>
              </div>
            </div>
            <div class='input-group in' <?php if($trade['type'] == 'out') echo "style='display:none'"?>>
              <?php echo html::select("trader[$i]", $customerList, ($hasCustomer ? $trade['trader'] : 0), "class='form-control chosen' id='trader{$i}' data-no_results_text='" . $lang->searchMore . "'");?>
              <?php echo html::input("customerName[$i]", ($hasCustomer ? '' : $trade['trader']), "class='form-control' id='customerName{$i}' style='display:none'");?>
              <div class='input-group-addon'>
                <label class="checkbox-inline">
                  <input type="checkbox" name="createCustomer[<?php echo $i;?>]" value="1">
                  <?php echo $lang->trade->newTrader;?>
                  <?php if(!$hasCustomer and empty($trader['trader'])):?><i class='red icon-question' title="<?php echo $lang->trade->noTraderMatch;?>"></i><?php endif;?>
                </label>
              </div>
            </div>
          </td>
          <td><?php echo html::input("money[$i]", $trade['money'], "class='form-control'");?></td>
          <td><?php echo html::select("dept[$i]", $deptList, $trade['dept'], "class='form-control chosen'");?></td>
          <td><?php echo html::select("handlers[$i][]", $users, $trade['handlers'], "class='form-control chosen' id='handlers{$i}' multiple");?></td>
          <td><?php echo html::select("product[$i]", $productList, $trade['product'], "class='form-control chosen' id='product{$i}'");?></td>
          <td>
            <?php if(!empty($existTrades[$i])):?>
            <div class='input-group'>
              <?php echo html::input("date[$i]", $trade['date'], "class='form-control form-date' id='date{$i}' title='{$trade['date']}'");?>
              <div class='input-group-addon'>
                <label class="checkbox-inline">
                  <input type='checkbox' checked='checked' name="ignoreUnique[<?php echo $i;?>]" value='1'>
                  <?php echo $lang->trade->ignore;?>
                </label>
              </div>
              <div class='input-group-btn'>
                <a href='javascript:;' class='btn toggleHide' data-key='<?php echo $i;?>' title='<?php echo $lang->trade->showExistTrade;?>'><i class='icon icon-plus'></i></a>
              </div>
            </div>
            <?php else:?>
            <?php echo html::input("date[$i]", $trade['date'], "class='form-control form-date' id='date{$i}'");?>
            <?php endif;?>
            <?php echo html::hidden("time[$i]", $trade['time']);?>
          </td>
          <td><?php echo html::textarea("desc[$i]", $trade['desc'], "rows='1' class='form-control' title='{$trade['desc']}'");?></td>
        </tr>
        <?php if(!empty($existTrades[$i])):?>
        <?php foreach($existTrades[$i] as $trade):?>
        <tr class='text-middle existTrades<?php echo $i;?> hide'>
          <td class='text-middle'><?php echo $depositor->abbr;?></td>
          <td><?php echo zget($lang->trade->typeList, $trade->type);?></td>
          <td><?php echo $trade->type == 'in' ? zget($incomeTypes, $trade->category, '') : zget($expenseTypes, $trade->category, '');?></td>
          <td><?php echo zget($customerList, $trade->trader, '');?></td>
          <td><?php echo $trade->money;?></td>
          <td><?php echo zget($deptList, $trade->dept, '');?></td>
          <td><?php foreach(explode(',', trim($trade->handlers, ',')) as $handler) echo zget($users, $handler, '') . ' ';?></td>
          <td><?php echo zget($productList, $trade->product, '');?></td>
          <td><?php echo formatTime($trade->date . ' ' . $trade->time, DT_DATETIME1);?></td>
          <td><?php echo $trade->desc;?></td>
        </tr>
        <?php endforeach;?>
        <?php endif;?>
        <?php endforeach;?>
      </tbody>
      <tfoot><tr><td colspan='10' class='text-center'><?php echo html::submitButton() . ' ' . html::backButton();?></td></tr></tfoot>
    </table>
  </div>
</form>
<?php include $app->getModuleRoot() . 'common/view/footer.html.php';?>
