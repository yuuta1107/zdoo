<?php
/**
 * The browse view file of provider module of RanZhi.
 *
 * @copyright   Copyright 2009-2018 青岛易软天创网络科技有限公司(QingDao Nature Easy Soft Network Technology Co,LTD, www.cnezsoft.com)
 * @license     ZPL (http://zpl.pub/page/zplv12.html)
 * @author      Gang Liu <liugang@cnezsoft.com>
 * @package     provider
 * @version     $Id$
 * @link        http://www.ranzhi.org
 */
?>
<?php include '../../../sys/common/view/header.lite.html.php';?>
<div class='panel xuanxuan-card'>
  <table class='table table-bordered table-hover table-striped tablesorter table-data'>
    <thead>
      <tr class='text-center'>
        <?php $vars = "mode=all&param=&orderBy=%s&recTotal={$pager->recTotal}&recPerPage={$pager->recPerPage}&pageID={$pager->pageID}";?>
        <th>                <?php commonModel::printOrderLink('name', $orderBy, $vars, $lang->provider->name);?></th>
        <th class='w-110px'><?php commonModel::printOrderLink('size', $orderBy, $vars, $lang->provider->size);?></th>
        <th class='w-70px'> <?php commonModel::printOrderLink('type', $orderBy, $vars, $lang->provider->type);?></th>
      </tr>
    </thead>
    <tbody>
      <?php $areas[0] = '';?>
      <?php $industries[0] = '';?>
      <?php foreach($providers as $provider):?>
      <tr class='text-center' data-url='<?php echo $this->createLink('provider', 'view', "providerID=$provider->id"); ?>'>
        <td class='text-left'><?php echo $provider->name;?></td>
        <td><?php echo $lang->provider->sizeList[$provider->size];?></td>
        <td><?php echo $lang->provider->typeList[$provider->type];?></td>
      </tr>
      <?php endforeach;?>
    </tbody>
    <tfoot>
      <tr>
        <td colspan='8'><?php $pager->show($align = 'right', $type = 'short');?></td>
      </tr>
    </tfoot>
  </table>
</div>
<?php include '../../common/view/footer.html.php';?>
