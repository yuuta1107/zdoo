<?php
/**
 * The detail view file of leads module of RanZhi.
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
<?php include '../../../sys/common/view/kindeditor.html.php';?>
<div class='xuanxuan-card'>
    <div class='panel'>
      <div class='panel-heading'><strong><?php echo $lang->contact->basicInfo;?></strong></div>
      <div class='panel-body'>
        <table class='table table-info'>
          <tr>
            <th class='w-70px'><?php echo $lang->contact->realname;?></th>
            <td><?php echo $contact->realname;?></td>
          </tr>
          <?php if($contact->company):?>
          <tr>
            <th><?php echo $lang->contact->company;?></th>
            <td><?php echo $contact->company;?></td>
          </tr>
          <?php endif;?>
          <?php if(formatTime($contact->birthday, DT_DATE1)):?>
          <tr>
            <th><?php echo $lang->contact->birthday;?></th>
            <td><?php echo formatTime($contact->birthday, DT_DATE1);?></td>
          </tr>
          <?php endif;?>
          <?php if($contact->gender != 'u'):?>
          <tr>
            <th><?php echo $lang->contact->gender;?></th>
            <td><?php echo zget($lang->genderList, $contact->gender, '');?></td>
          </tr>
          <?php endif;?>
          <?php if(formatTime($contact->createdDate, DT_DATE1)):?>
          <tr>
            <th><?php echo $lang->contact->createdDate;?></th>
            <td><?php echo formatTime($contact->createdDate, DT_DATE1);?></td>
          </tr>
          <?php endif;?>
        </table>
      </div>
    </div>
    <div class='panel'>
      <div class='panel-heading'><strong><?php echo $lang->contact->contactInfo;?></strong></div>
      <div class='panel-body'>
        <table class='table table-info contact-info'>
          <tr>
            <td>
              <dl class='contact-info'>
              <?php foreach($config->contact->contactWayList as $item):?>
              <?php if(!empty($contact->{$item})):?>
                <dd>
                  <span><?php echo $lang->contact->{$item};?></span>
                  <?php $site = isset($config->company->name) ? $config->company->name : '';?>
                  <?php if($item == 'qq') echo html::a("http://wpa.qq.com/msgrd?v=3&uin={$contact->$item}&site={$site}&menu=yes", $contact->$item, "target='_blank'");?>
                  <?php if($item == 'email') echo html::mailto($contact->{$item}, $contact->{$item});?>
                  <?php if($item != 'qq' and $item != 'email') echo $contact->{$item};?>
                </dd>
              <?php endif;?>
              <?php endforeach;?>
              </dl>
            </td>
          </tr>
        </table>
      </div>
    </div>
    <?php if($addresses):?>
    <div class='panel'>
      <div class='panel-heading'><strong><?php echo $lang->contact->address;?></strong></div>
      <table class='table table-data'>
        <?php foreach($addresses as $address):?>
        <tr>
          <td><?php echo $address->title . $lang->colon . $address->fullLocation;?></td>
        </tr>
        <?php endforeach;?>
      </table>
    </div>
    <?php endif;?>
    <?php if($contact->desc):?>
    <div class='panel'>
      <div class='panel-heading'><strong><?php echo $lang->contact->desc;?></strong></div>
      <div class='panel-body'><?php echo $contact->desc;?></div>
    </div>
    <?php endif;?>
    <?php if($fileList) echo $this->fetch('file', 'printFiles', array('files' => $fileList, 'fieldset' => 'true'))?>
    <?php echo $this->fetch('action', 'history', "objectType=contact&objectID={$contact->id}")?>
    <div class='page-actions'>
      <?php
      echo "<div class='btn-group'>";
      commonModel::printLink('leads', 'assign', "contactID=$contact->id", $lang->contact->assign, "class='btn' data-toggle='modal'");
      commonModel::printLink('action', 'createRecord', "objectType=contact&objectID={$contact->id}&customer=&history=", $lang->contact->record, "data-toggle='modal' data-width='800' class='btn'");
      commonModel::printLink('address', 'browse', "objectType=contact&objectID=$contact->id", $lang->contact->address, "data-toggle='modal' class='btn'");
      commonModel::printLink('leads', 'edit', "contactID=$contact->id", $lang->edit, "class='btn'");
      commonModel::printLink('leads', 'transform', "contactID=$contact->id", $lang->confirm, "class='btn' data-toggle='modal'");
      if($contact->status != 'ignore') commonModel::printLink('leads', 'ignore', "contactID=$contact->id", $lang->ignore, "class='btn' data-toggle='modal'");
      if($contact->status == 'ignore') commonModel::printLink('leads', 'delete', "contactID=$contact->id", $lang->delete, "class='btn deleter'");
      echo html::a('#commentBox', $this->lang->comment, "class='btn btn-default' onclick=setComment()");
      echo "</div>";

      echo html::backButton();
      ?>
    </div>
    <fieldset id='commentBox' class='hide'>
      <legend><?php echo $lang->comment;?></legend>
      <form id='ajaxForm' method='post' action='<?php echo inlink('edit', "contactID={$contact->id}&mode={$mode}&status={$status}&comment=true")?>'>
        <div class='form-group'><?php echo html::textarea('comment', '',"rows='5' class='w-p100'");?></div>
        <?php echo html::submitButton();?>
      </form>
    </fieldset>      
</div>
<?php include '../../common/view/footer.html.php';?>
