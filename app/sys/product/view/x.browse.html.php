<?php
/**
 * The browse view file of product module of RanZhi.
 *
 * @copyright   Copyright 2009-2018 青岛易软天创网络科技有限公司(QingDao Nature Easy Soft Network Technology Co,LTD, www.cnezsoft.com)
 * @license     ZPL (http://zpl.pub/page/zplv12.html)
 * @author      Gang Liu <liugang@cnezsoft.com>
 * @package     product
 * @version     $Id$
 * @link        http://www.ranzhi.org
 */
?>
<?php include '../../../sys/common/view/header.lite.html.php';?>
<div class='panel xuanxuan-card'>
  <table class='table table-bordered table-hover table-striped tablesorter table-data' id='productList'>
    <thead>
      <tr class='text-center'>
        <?php $vars = "mode={$mode}&status={$status}&category={$category}&orderBy=%s&recTotal={$pager->recTotal}&recPerPage={$pager->recPerPage}&pageID={$pager->pageID}";?>
        <th><?php commonModel::printOrderLink('name', $orderBy, $vars, $lang->product->name);?></th>
        <th class='w-60px'><?php commonModel::printOrderLink('type', $orderBy, $vars, $lang->product->type);?></th>
        <th class='w-70px'><?php commonModel::printOrderLink('status', $orderBy, $vars, $lang->product->status);?></th>
      </tr>
    </thead>
    <tbody>
      <?php foreach($products as $product):?>
      <tr class='text-center' data-url="<?php echo $this->createLink('product', 'view', "productID={$product->id}");?>">
        <td class='text-left'><?php echo $product->name;?></td>
        <td><?php echo $lang->product->typeList[$product->type];?></td>
        <td><?php echo $lang->product->statusList[$product->status];?></td>
      </tr>
      <?php endforeach;?>
    </tbody>
  </table>
  <div class='table-footer'><?php $pager->show($align = 'right', $type = 'short');?></div>
</div>
<?php include '../../common/view/footer.html.php';?>
