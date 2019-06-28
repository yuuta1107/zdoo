<?php
/**
 * The trade block view file of block module of RanZhi.
 *
 * @copyright   Copyright 2009-2018 青岛易软天创网络科技有限公司(QingDao Nature Easy Soft Network Technology Co,LTD, www.cnezsoft.com)
 * @license     ZPL (http://zpl.pub/page/zplv12.html)
 * @author      Yidong Wang <yidong@cnezsoft.com>
 * @package     block
 * @version     $Id$
 * @link        http://www.ranzhi.org
 */
?>
<div class='panel-body has-table scrollbar-hover'>
  <table class='table table-borderless table-fixed table-fixed-head table-hover tablesorter block-basefacts'>
    <thead>
      <tr class='text-center'>
        <th class='w-50px'><?php echo $lang->trade->month;?></th>
        <th><?php echo $lang->trade->in . '(' . zget($currencySign, $this->config->setting->mainCurrency) . ')';?></th>
        <th><?php echo $lang->trade->out . '(' . zget($currencySign, $this->config->setting->mainCurrency) . ')';?></th>
        <th><?php echo $lang->trade->profit . '/' . $lang->trade->loss . ' (' . zget($currencySign, $this->config->setting->mainCurrency) . ')';?></th>
      </tr>
    </thead>
    <tbody>
      <?php foreach($annualChartDatas as $month => $monthChartData):?>
      <tr class='text-center'>
        <td><?php echo $month;?></td>
        <td><?php echo $monthChartData['in'];?></td>
        <td><?php echo $monthChartData['out'];?></td>
        <td><?php echo $monthChartData['profit'];?></td>
      </tr>
      <?php endforeach;?>
    </tbody>
  </table>
</div>
