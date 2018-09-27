<?php
/**
 * The detail view file of product module of RanZhi.
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
<div class='xuanxuan-card'>
  <div class='panel'>
    <div class='panel-heading'><strong><i class='icon-file-text-alt'></i> <?php echo $lang->product->basicInfo;?></strong></div>
    <div class='panel-body'>
      <table class='table table-info'>
        <tr>
          <th class='w-70px'><?php echo $lang->product->name;?></th>
          <td><?php echo $product->name;?></td>
        </tr>
        <tr>
          <th><?php echo $lang->product->code;?></th>
          <td><?php echo $product->code;?></td>
        </tr>
        <?php if($product->category):?>
        <tr>
          <th><?php echo $lang->product->category;?></th>
          <td><?php echo $categories[$product->category];?></td>
        </tr>
        <?php endif;?>
        <?php if($product->type):?>
        <tr>
          <th><?php echo $lang->product->type;?></th>
          <td><?php echo $lang->product->typeList[$product->type];?></td>
        </tr>
        <?php endif;?>
        <?php if($product->status):?>
        <tr>
          <th><?php echo $lang->product->status;?></th>
          <td><?php echo $lang->product->statusList[$product->status];?></td>
        </tr>
        <?php endif;?>
      </table>
    </div>
  </div> 
  <?php if($product->files):?>
  <div class='panel'>
    <div class='panel-heading'><strong><?php echo $lang->files;?></strong></div>
    <div class='panel-body'><?php echo $this->fetch('file', 'printFiles', array('files' => $product->files, 'fieldset' => 'false'))?></div>
  </div>
  <?php endif;?>
  <?php echo $this->fetch('action', 'history', "objectType=product&objectID={$product->id}");?>
  <div class='page-actions'>
    <?php
    echo "<div class='btn-group'>";
    commonModel::printLink('product', 'edit',   "productID=$product->id", $this->lang->edit,   "class='btn btn-default' data-toggle='modal'");
    commonModel::printLink('product', 'delete', "productID=$product->id", $this->lang->delete, "class='deleter btn btn-default'");
    echo '</div>';
    echo html::backButton();
    ?>
  </div>
</div>
<?php include '../../common/view/footer.html.php';?>
