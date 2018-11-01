<?php
/**
 * The browse view file of contact module of RanZhi.
 *
 * @copyright   Copyright 2009-2018 青岛易软天创网络科技有限公司(QingDao Nature Easy Soft Network Technology Co,LTD, www.cnezsoft.com)
 * @license     ZPL (http://zpl.pub/page/zplv12.html)
 * @author      Gang Liu <liugang@cnezsoft.com>
 * @package     contact
 * @version     $Id$
 * @link        http://www.ranzhi.org
 */
?>
<?php include '../../../sys/common/view/header.lite.html.php';?>
<div class='panel xuanxuan-card'>
  <table class='table table-hover table-striped table-bordered tablesorter table-data table-fixed' id='contactList'>
    <thead>
      <tr class='text-center'>
        <?php $vars = "mode={$mode}&status={$status}&origin={$origin}&orderBy=%s&recTotal={$pager->recTotal}&recPerPage={$pager->recPerPage}&pageID={$pager->pageID}";?>
        <th class='w-100px text-left'><?php commonModel::printOrderLink('realname', $orderBy, $vars, $lang->contact->realname);?></th>
        <th class="text-left"><?php commonModel::printOrderLink('customer', $orderBy, $vars, $lang->contact->customer);?></th>
        <th class='w-200px text-left'><?php commonModel::printOrderLink('phone', $orderBy, $vars, $lang->contact->phone . $lang->slash . $lang->contact->mobile);?></th>
      </tr>
    </thead>
    <tbody>
    <?php foreach($contacts as $contact):?>
    <tr class='text-center'>
      <td class='text-left'><?php echo html::a(inlink('view', "contactID=$contact->id&status=$contact->status"), $contact->realname);?></td>
      <td class='text-left'><?php echo html::a($this->createLink('customer', 'view', "customerID=$contact->customer"), $customers[$contact->customer]);?></td>
      <td class='text-left'><?php echo $contact->phone . ' ' . $contact->mobile;?></td>
    </tr>
    <?php endforeach;?>
    </tbody>
  </table>
  <div class='table-footer'><?php $pager->show($align = 'right', $type = 'short');?></div>
</div>
<?php include '../../common/view/footer.html.php';?>
