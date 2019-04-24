<?php
/**
 * The detail view file of customer module of RanZhi.
 *
 * @copyright   Copyright 2009-2018 青岛易软天创网络科技有限公司(QingDao Nature Easy Soft Network Technology Co,LTD, www.cnezsoft.com)
 * @license     ZPL (http://zpl.pub/page/zplv12.html)
 * @author      Gang Liu <liugang@cnezsoft.com>
 * @package     customer
 * @version     $Id$
 * @link        http://www.ranzhi.org
 */
?>
<?php include '../../../sys/common/view/header.lite.html.php';?>
<?php include '../../common/view/kindeditor.html.php';?>
<div class='xuanxuan-card'>
  <div class='panel'>
    <div class='panel-heading'><strong><i class="icon-list-info"></i> <?php echo $lang->customer->basicInfo;?></strong></div>
    <div class='panel-body'>
      <table class='table table-info'>
        <tr>
          <th class='w-70px'><?php echo $lang->customer->name;?></th>
          <td><?php echo $customer->name;?></td>
        </tr>
        <?php if($customer->source):?>
        <tr>
          <th class='w-70px'><?php echo $lang->customer->source;?></th>
          <td><?php echo zget($lang->customer->sourceList, $customer->source);?></td>
        </tr>
        <?php endif;?>
        <?php if($customer->sourceNote):?>
        <tr>
          <th><?php echo $lang->customer->sourceNote;?></th>
          <td><?php echo $customer->sourceNote;?></td>
        </tr>
        <?php endif;?>
        <?php if($customer->level):?>
        <tr>
          <th><?php echo $lang->customer->level;?></th>
          <td><?php if($customer->level) echo $lang->customer->levelNameList[$customer->level];?></td>
        </tr>
        <?php endif;?>
        <?php if($customer->status):?>
        <tr>
          <th><?php echo $lang->customer->status;?></th>
          <td><?php if($customer->status) echo $lang->customer->statusList[$customer->status];?></td>
        </tr>
        <?php endif;?>
        <?php if($customer->assignedTo):?>
        <tr>
          <th><?php echo $lang->customer->assignedTo;?></th>
          <td><?php echo zget($users, $customer->assignedTo);?></td>
        </tr>
        <?php endif;?>
        <?php if($customer->type):?>
        <tr>
          <th><?php echo $lang->customer->size;?></th>
          <td><?php echo $lang->customer->sizeNameList[$customer->size];?></td>
        </tr>
        <?php endif;?>
        <?php if($customer->type):?>
        <tr>
          <th><?php echo $lang->customer->type;?></th>
          <td><?php echo $lang->customer->typeList[$customer->type];?></td>
        </tr>
        <?php endif;?>
        <?php if($customer->industry):?>
        <tr>
          <th><?php echo $lang->customer->industry;?></th>
          <td><?php if($customer->industry) echo $industryList[$customer->industry];?></td>
        </tr>
        <?php endif;?>
        <?php if($customer->area):?>
        <tr>
          <th><?php echo $lang->customer->area;?></th>
          <td><?php if($customer->area) echo $areaList[$customer->area];?></td>
        </tr>
        <?php endif;?>
        <?php if($customer->weibo):?>
        <tr>
          <th><?php echo $lang->customer->weibo;?></th>
          <td><?php echo html::a("$customer->weibo", $customer->weibo, "target='_blank'");?></td>
        </tr>
        <?php endif;?>
        <?php if($customer->weixin):?>
        <tr>
          <th><?php echo $lang->customer->weixin;?></th>
          <td><?php echo $customer->weixin;?></td>
        </tr>
        <?php endif;?>
        <?php if($customer->site):?>
        <tr>
          <th><?php echo $lang->customer->site;?></th>
          <td><?php echo html::a("$customer->site", $customer->site, "target='_blank'");?></td>
        </tr>
        <?php endif;?>
        <?php if($customer->nextDate != '0000-00-00'):?>
        <tr>
          <th><?php echo $lang->customer->nextDate;?></th>
          <td><?php echo formatTime($customer->nextDate, DT_DATE1);?></td>
        </tr>
        <?php endif;?>
      </table>
    </div>
  </div>
  <?php if($customer->desc):?>
  <div class='panel'>
    <div class='panel-heading'><strong><?php echo $lang->customer->desc;?></strong></div>
    <div class='panel-body'><?php echo $customer->desc;?></div>
  </div>
  <?php endif;?>
  <?php if($customer->intension):?>
  <div class='panel'>
    <div class='panel-heading'><strong><?php echo $lang->customer->intension;?></strong></div>
    <div class='panel-body'><?php echo $customer->intension;?></div>
  </div>
  <?php endif;?>
  <?php if($customer->depositor):?>
  <div class='panel'>
    <div class='panel-heading'><strong><?php echo $lang->customer->depositor;?></strong></div>
    <div class='panel-body'><?php echo $customer->depositor;?></div>
  </div>
  <?php endif;?>
  <?php if(!empty($returnList)):?>
  <div class='panel'>
    <div class='panel-heading'><strong><?php echo $lang->contract->returnRecords;?></strong></div>
    <table class='table'>
      <tr>
        <th><?php echo $lang->contract->common;?></th>
        <th class='w-100px'><?php echo $lang->contract->returnedDate;?></th>
        <th class='w-80px'><?php echo $lang->contract->returnedBy;?></th> 
        <th class='w-80px text-right'><?php echo $lang->contract->amount;?></th> 
      </tr>
      <?php foreach($returnList as $return):?>
      <?php $contract = $contracts[$return->contract];?>
      <tr>
        <td title='<?php echo $contract->name;?>'><?php echo $contract->name;?></td>
        <td><?php echo formatTime($return->returnedDate, DT_DATE1);?></td>
        <td><?php echo zget($users, $return->returnedBy, $return->returnedBy);?></td>
        <td class='text-right'><?php echo zget($currencySign, $contract->currency, '') . formatMoney($return->amount);?></td>
      </tr>
      <?php endforeach;?>
    </table>
  </div>
  <?php endif;?>
  <?php echo $this->fetch('contact', 'block', "customer={$customer->id}", 'crm')?>
  <?php if(!empty($contracts)):?>
  <div class='panel'>
    <table class='table table-data table-condensed'>
      <tr>      
        <th><?php echo $lang->customer->contract;?></th>
        <th class='w-100px text-right'><?php echo $lang->order->amount;?></th> 
        <th class='w-80px text-center'><?php echo $lang->order->status;?></th> 
      </tr>
      <?php foreach($contracts as $contract):?>
      <tr data-url='<?php echo $this->createLink('crm.contract', 'view', "contractID=$contract->id"); ?>'>
        <td><?php echo $contract->name;?></td>
        <td class='text-right'><?php echo zget($currencySign, $contract->currency, '') . $contract->amount;?></td>
        <td class='text-center <?php echo "contract-{$contract->status}";?>'><?php echo $lang->contract->statusList[$contract->status];?></td>
      </tr>
      <?php endforeach;?>
    </table>
  </div>
  <?php endif;?>

  <?php if(!empty($orders)):?>
  <div class='panel'>
    <table class='table table-data table-condensed'>
      <tr>      
        <th><?php echo $lang->customer->order;?></th>
        <th class='w-100px text-right'><?php echo $lang->order->plan;?></th>
        <th class='w-100px text-right'><?php echo $lang->order->real;?></th>
        <th class='w-80px text-center'><?php echo $lang->order->status;?></th>
      </tr>
      <?php foreach($orders as $order):?>
      <tr data-url='<?php echo $this->createLink('crm.order', 'view', "orderID=$order->id"); ?>'>
        <td><?php foreach($order->products as $product) echo $product . ' ';?></td>
        <td class='text-right'><?php echo $order->plan;?></td>
        <td class='text-right'><?php echo zget($currencySign, $order->currency, '') . $order->real;?></td>
        <td class='text-center <?php echo "order-{$order->status}";?>'><?php echo $lang->order->statusList[$order->status];?></td>
      </tr>
      <?php endforeach;?>
    </table>
  </div>
  <?php endif;?>

  <?php if(!empty($productList)):?>
  <div class='panel'>
    <div class='panel-heading'>
    </div>
    <table class='table table-data table-condensed'>
      <tr>      
        <th><?php echo $lang->customer->purchasedProducts;?></th>
        <th class='w-100px'><?php echo $lang->product->category;?></th>
        <th class='w-100px'><?php echo $lang->product->type;?></th>
        <th class='w-80px text-center'><?php echo $lang->product->status;?></th>
      </tr>
      <?php foreach($productList as $product):?>
      <tr data-url='<?php echo $this->createLink('crm.product', 'view', "productID=$product->id"); ?>'>
        <td><?php echo $product->name;?></td>
        <td><?php echo zget($productCategories, $product->category, '');?></td>
        <td><?php echo zget($lang->product->typeList, $product->type);?></td>
        <td class='text-center'><?php echo zget($lang->product->statusList, $product->status);?></td>
      </tr>
      <?php endforeach;?>
    </table>
  </div>
  <?php endif;?>

  <?php if(!empty($addresses)):?>
  <div class='panel'>
    <div class='panel-heading'><strong><?php echo $lang->customer->address;?></strong></div>
    <table class='table table-data table-condensed'>
      <?php foreach($addresses as $address):?>
      <tr>
        <td><?php echo $address->title . $lang->colon . $address->fullLocation;?></td>
      </tr>
      <?php endforeach;?>
    </table>
  </div>
  <?php endif;?>

  <?php if(!empty($files)) echo $this->fetch('file', 'printFiles', array('files' => $files, 'fieldset' => 'true'))?>
  <?php echo $this->fetch('action', 'history', "objectType=customer&objectID={$customer->id}")?>
  <div class='page-actions'>
    <?php
    echo "<div class='btn-group'>";
    commonModel::printLink('crm.order', 'create', "customer=$customer->id", $lang->order->common, "class='btn'");
    commonModel::printLink('crm.contract', 'create', "customer=$customer->id", $lang->contract->common, "class='btn'");
    echo '</div>';
    echo "<div class='btn-group'>";
    commonModel::printLink('action', 'createRecord', "objectType=customer&objectID={$customer->id}&customer={$customer->id}&history=", $lang->customer->record, "class='btn' data-toggle='modal' data-width='800'");
    commonModel::printLink('customer', 'assign', "customerID=$customer->id", $lang->customer->assign, "class='btn' data-toggle='modal'");
    commonModel::printLink('customer', 'contact', "customerID=$customer->id", $lang->customer->contact,  "class='btn' data-toggle='modal'");
    commonModel::printLink('address',  'browse', "objectType=customer&objectID=$customer->id", $lang->customer->address, "class='btn' data-toggle='modal'");
    echo '</div>';
    echo "<div class='btn-group'>";
    commonModel::printLink('customer', 'edit', "customerID=$customer->id", $lang->edit, "class='btn'");
    commonModel::printLink('customer', 'delete', "customerID=$customer->id", $lang->delete, "class='deleter btn'");
    echo html::a('#commentBox', $this->lang->comment, "class='btn btn-default' onclick=setComment()");
    echo '</div>';
    ?>
  </div>
  <fieldset id='commentBox' class='hide'>
    <legend><?php echo $lang->comment;?></legend>
    <form id='ajaxForm' method='post' action='<?php echo inlink('edit', "customerID={$customer->id}&comment=true")?>'>
      <div class='form-group'><?php echo html::textarea('comment', '',"rows='5' class='w-p100'");?></div>
      <?php echo html::submitButton();?>
    </form>
  </fieldset>      
</div>
<?php include '../../common/view/footer.html.php';?>
