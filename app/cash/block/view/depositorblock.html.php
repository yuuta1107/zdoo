<?php
/**
 * The depositor list block view file of block module of RanZhi.
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
  <table class='table table-borderless table-fixed table-fixed-head table-hover tablesorter block-depositor'>
    <thead>
      <tr>
        <th><?php echo $lang->depositor->title;?></th>
        <th><?php echo $lang->depositor->account;?></th>
        <th><?php echo $lang->depositor->type;?></th>
      </tr>
    </thead>
    <tbody>
      <?php foreach($depositors as $id => $depositor):?>
      <?php $provider = $depositor->type == 'bank' ? $depositor->provider : $lang->depositor->providerList[$depositor->provider]; ?>
      <tr>
        <td><?php echo $depositor->title;?></td>
        <td><?php echo $depositor->account;?></td>
        <td><?php echo $provider;?></td>
      </tr>
      <?php endforeach;?>
    </tbody>
  </table>
</div>
</div>
