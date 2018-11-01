<?php
/**
 * The browse view file of leads module of RanZhi.
 *
 * @copyright   Copyright 2009-2018 青岛易软天创网络科技有限公司(QingDao Nature Easy Soft Network Technology Co,LTD, www.cnezsoft.com)
 * @license     ZPL (http://zpl.pub/page/zplv12.html)
 * @author      Gang Liu <liugang@cnezsoft.com>
 * @package     leads
 * @version     $Id$
 * @link        http://www.ranzhi.org
 */
?>
<?php include '../../../sys/common/view/header.lite.html.php';?>
<div class='panel xuanxuan-card'>
  <table class='table table-bordered table-hover table-striped table-bordered tablesorter table-data table-fixed' id='contactList'>
    <thead>
      <tr class='text-center'>
        <?php $vars = "mode={$mode}&status={$status}&origin={$origin}&orderBy=%s&recTotal={$pager->recTotal}&recPerPage={$pager->recPerPage}&pageID={$pager->pageID}";?>
        <th class='w-80px text-left'><?php commonModel::printOrderLink('realname', $orderBy, $vars, $lang->contact->realname);?></th>
        <th><?php commonModel::printOrderLink('company', $orderBy, $vars, $lang->contact->company);?></th>
        <th class='w-160px'><?php commonModel::printOrderLink('phone', $orderBy, $vars, $lang->contact->phone . $lang->slash . $lang->contact->mobile);?></th>
        <th class='w-160px'><?php commonModel::printOrderLink('email', $orderBy, $vars, $lang->contact->email);?></th>
      </tr>
    </thead>
    <tbody>
    <?php foreach($contacts as $contact):?>
    <tr class='text-center'>
      <td class='text-left' title='<?php echo $contact->realname;?>'><?php echo html::a(inlink('view', "contactID={$contact->id}&mode={$mode}&status={$status}"), $contact->realname);?></td>
      <td class='text-left' title='<?php echo $contact->company;?>'><?php echo $contact->company;?></td>
      <?php $phoneAndMobile =  $contact->phone . (($contact->phone && $contact->mobile) ? $lang->slash : '') . $contact->mobile;?>
      <td class='text-left' title='<?php echo $phoneAndMobile;?>' ><?php echo $phoneAndMobile;?></td>
      <td title='<?php echo $contact->email;?>'><?php echo html::mailto($contact->email, $contact->email)?></td>
    </tr>
    <?php endforeach;?>
    </tbody>
  </table>
  <div class='table-footer'><?php $pager->show($align = 'right', $type = 'short');?></div>
</div>
<?php include '../../common/view/footer.html.php';?>
