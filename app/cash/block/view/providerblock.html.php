<?php
/**
 * The provider block view file of block module of RanZhi.
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
  <table class='table table-borderless table-fixed table-fixed-head table-hover tablesorter block-customer'>
    <thead>
      <tr>
        <th><?php echo $lang->provider->name;?></th>
        <th class='w-70px text-center'><?php echo $lang->provider->area;?></th>
        <th class='w-100px'><?php echo $lang->provider->industry;?></th>
      </tr>
    </thead>
    <tbody>
      <?php $appid = ($this->get->app == 'sys' and isset($_GET['entry'])) ? "class='app-btn' data-id='{$this->get->entry}'" : ''?>
      <?php foreach($providers as $id => $provider):?>
      <tr data-url='<?php echo $this->createLink('cash.provider', 'view', "id=$id");?>' <?php echo $appid;?>>
        <td class='nobr'><?php echo $provider->name;?></td>
        <td class='w-120px text-center'><?php echo zget($areas, $provider->area);?></td>
        <td class='w-120px text-center'><?php echo zget($industries, $provider->industry);?></td>
      </tr>
      <?php endforeach;?>
    </tbody>
  </table>
</div>
