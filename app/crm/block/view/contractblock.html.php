<?php
/**
 * The contract block view file of block module of RanZhi.
 *
 * @copyright   Copyright 2009-2018 青岛易软天创网络科技有限公司(QingDao Nature Easy Soft Network Technology Co,LTD, www.cnezsoft.com)
 * @license     ZPL (http://zpl.pub/page/zplv12.html)
 * @author      Yidong Wang <yidong@cnezsoft.com>
 * @package     block
 * @version     $Id$
 * @link        http://www.ranzhi.org
 */
?>
<div class='panel-body has-table'>
  <table class='table table-borderless table-fixed table-fixed-head table-hover tablesorter block-contract'>
    <thead>
      <tr>
        <th><?php echo $lang->contract->name;?></th>
        <th class='w-90px'><?php echo $lang->contract->amount;?></th>
        <th class='w-70px'><?php echo $lang->contract->delivery . $lang->contract->status;?></th>
        <th class='w-70px'><?php echo $lang->contract->return . $lang->contract->status;?></th>
      </tr>
    </thead>
    <tbody>
      <?php foreach($contracts as $id => $contract):?>
      <?php $appid = ($this->get->app == 'sys' and isset($_GET['entry'])) ? "class='app-btn' data-id='{$this->get->entry}'" : ''?>
      <tr data-url='<?php echo $this->createLink('crm.contract', 'view', "id=$id");?>' <?php echo $appid;?>>
        <td class='nobr'><?php echo $contract->name;?></td>
        <td class='w-80px text-danger'><?php echo zget($currencySign, $contract->currency) . $contract->amount?></td>
        <td class='w-120px'><?php echo $lang->contract->deliveryList[$contract->delivery];?></td>
        <td class='w-120px'><?php echo $lang->contract->returnList[$contract->return];?></td>
      </tr>
      <?php endforeach;?>
    </tbody>
  </table>
