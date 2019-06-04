<?php
/**
 * The view file for the method of view of order module of RanZhi.
 *
 * @copyright   Copyright 2009-2018 青岛易软天创网络科技有限公司(QingDao Nature Easy Soft Network Technology Co,LTD, www.cnezsoft.com)
 * @license     ZPL (http://zpl.pub/page/zplv12.html)
 * @author      Tingting Dai <daitingting@xirangit.com>
 * @package     customer
 * @version     $Id$
 * @link        http://www.ranzhi.org
 */
?>
<?php $moduleMenu = false; ?>
<?php include '../../common/view/header.html.php'; ?>
<?php include '../../../sys/common/view/kindeditor.html.php';?>
<div id='mainContent' class='main-row'>
  <div class='main-col col-8'>
    <div class='panel panel-block table-row' id='orderDetailPanel'>
      <?php
      $payed = $order->status == 'payed';
      $customerLink = html::a($this->createLink('customer', 'view', "customerID={$customer->id}"), $customer->name);
      $productLink = '';
      foreach($order->products as $product)
      {
          $productLink .= html::a($this->createLink('product', 'view', "productID={$product->id}"), $product->name);
      }

      if($contract) $contractLink = html::a($this->createLink('contract', 'view', "contractID={$contract->id}"), $contract->name);
      ?>
      <div class='panel-heading table-col col-4 no-padding-right text-middle'>
        <div class='table-row table-auto'>
          <div class='table-col text-lg strong title'><?php printf($lang->order->infoBuy, $customerLink, $productLink);?></div>
          <div class='table-col text-middle has-padding-sm-h no-padding-right'>
            <?php if(isset($lang->customer->levelNameList[$customer->level])):?>
            <span class='label label-pale label-lg'><span class='text-yellow'><?php echo $lang->customer->levelNameList[$customer->level];?></span></span>
            <?php endif;?>
            <span class='label label-pale label-lg'><?php echo $lang->order->statusList[$order->status];?></span>
          </div>
        </div>
      </div>
      <div class='panel-body table-col has-padding-lg col-8'>
        <div class='table-row width-auto'>
          <div class='table-col divider-left has-padding-h'></div>
          <?php if($contract):?>
          <div class='table-col has-padding-lg-h has-padding-sm-v'>
            <div class='text-gray space-sm'><?php echo $lang->order->infoContract;?></div>
            <div class='text-lg'><?php echo $contractLink;?></div>
          </div>
          <?php endif;?>
          <div class='table-col has-padding-lg-h has-padding-sm-v'>
            <div class='text-gray space-sm'><?php echo $lang->order->infoPlanAmount;?></div>
            <div class='text-lg'><?php echo zget($currencySign, $order->currency, '');?><strong><?php echo formatMoney($order->plan);?></strong></div>
          </div>
          <div class='table-col has-padding-lg-h has-padding-sm-v'>
            <div class='text-gray space-sm'><?php echo $lang->order->infoRealAmount;?></div>
            <div class='text-lg'><?php echo zget($currencySign, $order->currency, '');?><strong class='text-red'><?php echo formatMoney($order->real);?></strong></div>
          </div>
          <?php if(formatTime($order->contactedDate)):?>
          <div class='table-col has-padding-lg-h has-padding-sm-v'>
            <div class='text-gray space-sm'><?php echo $lang->order->infoContacted;?></div>
            <div><?php echo formatTime($order->contactedDate, DT_DATETIME1);?></div>
          </div>
          <?php endif;?>
          <?php if(formatTime($order->nextDate)):?>
          <div class='table-col has-padding-lg-h has-padding-sm-v'>
            <div class='text-gray space-sm'><?php echo $lang->order->infoNextDate;?></div>
            <div><?php echo formatTime($order->nextDate, DT_DATETIME1);?></div>
          </div>
          <?php endif;?>
        </div>
      </div>
    </div>
    <?php echo $this->fetch('action', 'history', "objectType=order&objectID={$order->id}");?>
    <div class='main-actions'>
      <div class='btn-toolbar'>
        <?php
        commonModel::printLink('action', 'createRecord', "objectType=order&objectID={$order->id}&customer={$order->customer}&history=", $lang->order->record, "class='btn' data-toggle='modal' data-width='800'");
        if($order->status == 'normal') commonModel::printLink('contract', 'create', "customer={$order->customer}&orderID={$order->id}", $lang->order->sign, "class='btn btn-default'");

        if($order->status != 'normal') echo html::a('###', $lang->order->sign, "class='btn' disabled='disabled' class='disabled'");
        if($order->status != 'closed') commonModel::printLink('order', 'assign', "orderID=$order->id", $lang->assign, "data-toggle='modal' class='btn btn-default'");

        if($order->status == 'closed') echo html::a('###', $lang->assign, "data-toggle='modal' class='btn btn-default disabled' disabled");

        echo "<div class='divider'></div>";

        if($order->status != 'closed') commonModel::printLink('order', 'close', "orderID=$order->id", $lang->close, "class='btn btn-default' data-toggle='modal'");
        if($order->closedReason == 'payed') echo html::a('###', $lang->close, "disabled='disabled' class='disabled btn'");
        if($order->closedReason != 'payed' and $order->status == 'closed') commonModel::printLink('order', 'activate', "orderID=$order->id", $lang->activate, "class='btn' data-toggle='modal'");
        if($order->closedReason == 'payed' or  $order->status != 'closed') echo html::a('###', $lang->activate, "class='btn disabled' data-toggle='modal'");

        echo "<div class='divider'></div>";

        commonModel::printLink('order', 'edit', "orderID=$order->id", $lang->edit, "class='btn btn-default'");
        if($order->status == 'normal' or $order->closedReason == 'failed') commonModel::printLink('order', 'delete', "orderID=$order->id", $lang->delete, "class='btn btn-default deleter'");
        echo html::a('#commentBox', $this->lang->comment, "class='btn btn-default' onclick=setComment()");

        echo "<div class='divider'></div>";

        $browseLink = $this->session->orderList ? $this->session->orderList : inlink('browse');
        commonModel::printRPN($browseLink, $preAndNext);
        ?>
      </div>
    </div>
  </div>
  <div class='side-col col-4'>
    <?php echo $this->fetch('contact', 'block', "customer={$order->customer}");?>
    <div class='panel panel-block'>
      <div class='panel-heading'><strong class='title'><?php echo $lang->order->lifetime;?></strong></div>
      <div class='panel-body'>
        <?php $payed = $order->status == 'payed';?>
        <table class='table table-data'>
          <tr>
            <th class='w-100px'><?php echo $lang->lifetime->createdBy;?></th>
            <td><?php echo zget($users, $order->createdBy) . $lang->at . formatTime($order->createdDate, DT_DATETIME1);?></td>
          </tr>
          <tr>
            <th><?php echo $lang->lifetime->assignedTo;?></th>
            <td><?php if($order->assignedTo) echo zget($users, $order->assignedTo) . $lang->at . formatTime($order->assignedDate, DT_DATETIME1);?></td>
          </tr>
          <tr>
            <th><?php echo $lang->lifetime->closedBy;?></th>
            <td><?php if($order->closedBy) echo zget($users, $order->closedBy) . $lang->at . formatTime($order->closedDate, DT_DATETIME1);?></td>
          </tr>
          <tr>
            <th><?php echo $lang->lifetime->closedReason;?></th>
            <td><?php echo $lang->order->closedReasonList[$order->closedReason];?></td>
          </tr>
          <tr>
            <th><?php echo $lang->lifetime->signedBy;?></th>
            <td>
              <?php if($contract and $contract->signedBy and $contract->status != 'canceled') echo zget($users, $contract->signedBy) . $lang->at . formatTime($contract->signedDate, DT_DATE1);?>
            </td>
          </tr>
          <tr>
            <th><?php echo $lang->order->editedBy;?></th>
            <td><?php if($order->editedBy) echo zget($users, $order->editedBy) . $lang->at . formatTime($order->editedDate, DT_DATETIME1);?></td>
          </tr>
        </table>
      </div>
    </div>
  </div>
</div>



<div class='row-table'>
  <div class='col-main hide'>
    <div class='page-actions hidden'>
      <?php
      echo "<div class='btn-group'>";
      commonModel::printLink('action', 'createRecord', "objectType=order&objectID={$order->id}&customer={$order->customer}&history=", $lang->order->record, "class='btn' data-toggle='modal' data-width='800'");
      if($order->status == 'normal') commonModel::printLink('contract', 'create', "customer={$order->customer}&orderID={$order->id}", $lang->order->sign, "class='btn btn-default'");

      if($order->status != 'normal') echo html::a('###', $lang->order->sign, "class='btn' disabled='disabled' class='disabled'");
      if($order->status != 'closed') commonModel::printLink('order', 'assign', "orderID=$order->id", $lang->assign, "data-toggle='modal' class='btn btn-default'");

      if($order->status == 'closed') echo html::a('###', $lang->assign, "data-toggle='modal' class='btn btn-default disabled' disabled");
      echo '</div>';

      echo "<div class='btn-group'>";
      if($order->status != 'closed') commonModel::printLink('order', 'close', "orderID=$order->id", $lang->close, "class='btn btn-default' data-toggle='modal'");
      if($order->closedReason == 'payed') echo html::a('###', $lang->close, "disabled='disabled' class='disabled btn'");
      if($order->closedReason != 'payed' and $order->status == 'closed') commonModel::printLink('order', 'activate', "orderID=$order->id", $lang->activate, "class='btn' data-toggle='modal'");
      if($order->closedReason == 'payed' or  $order->status != 'closed') echo html::a('###', $lang->activate, "class='btn disabled' data-toggle='modal'");
      echo '</div>';

      echo "<div class='btn-group'>";
      commonModel::printLink('order', 'edit', "orderID=$order->id", $lang->edit, "class='btn btn-default'");
      if($order->status == 'normal' or $order->closedReason == 'failed') commonModel::printLink('order', 'delete', "orderID=$order->id", $lang->delete, "class='btn btn-default deleter'");
      echo html::a('#commentBox', $this->lang->comment, "class='btn btn-default' onclick=setComment()");
      echo '</div>';

      $browseLink = $this->session->orderList ? $this->session->orderList : inlink('browse');
      commonModel::printRPN($browseLink, $preAndNext);
      ?>
    </div>
    <fieldset id='commentBox' class='hide'>
      <legend><?php echo $lang->comment;?></legend>
      <form id='ajaxForm' method='post' action='<?php echo inlink('edit', "orderID={$order->id}&comment=true")?>'>
        <div class='form-group'><?php echo html::textarea('comment', '',"rows='5' class='w-p100'");?></div>
        <?php echo html::submitButton();?>
      </form>
    </fieldset>
  </div>
  <div class='col-side'>
  </div>
</div>
<?php include '../../common/view/footer.html.php';?>
