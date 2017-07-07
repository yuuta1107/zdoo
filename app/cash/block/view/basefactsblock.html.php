<?php
/**
 * The trade block view file of block module of RanZhi.
 *
 * @copyright   Copyright 2009-2016 青岛易软天创网络科技有限公司(QingDao Nature Easy Soft Network Technology Co,LTD, www.cnezsoft.com)
 * @license     ZPL (http://zpl.pub/page/zplv12.html)
 * @author      Yidong Wang <yidong@cnezsoft.com>
 * @package     block
 * @version     $Id$
 * @link        http://www.ranzhico.com
 */
?>
<table class='table table-data table-hover block-contract table-fixed'>
  <?php $appid = ($this->get->app == 'sys' and isset($_GET['entry'])) ? "class='app-btn' data-id='{$this->get->entry}'" : ''?>
  <?php foreach($annualChartDatas as $currency => $annualChartData):?>
  <?php foreach($annualChartData as $month => $monthChartData):?>
  <tr>
    <td class='w-50px'><?php echo $month . ' ' . $lang->trade->month;?></td>
    <td class='w-100px text-left'><?php echo $lang->trade->in . ' ' . $currencySign[$currency] . $monthChartData['in'];?></td>
    <td class='w-100px text-left'><?php echo $lang->trade->out . ' ' . $currencySign[$currency] . $monthChartData['out'];?></td>
    <td class='w-100px text-left'><?php echo $lang->trade->profit . '/' . $lang->trade->loss . ' ' . $currencySign[$currency] . $monthChartData['profit'];?></td>
  </tr>
  <?php endforeach;?>
  <?php endforeach;?>
</table>
