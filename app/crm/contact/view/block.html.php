<?php
/**
 * The contact List block file of contact module of RanZhi.
 *
 * @copyright   Copyright 2009-2018 青岛易软天创网络科技有限公司(QingDao Nature Easy Soft Network Technology Co,LTD, www.cnezsoft.com)
 * @license     ZPL (http://zpl.pub/page/zplv12.html)
 * @author      Xiying Guan <guanxiying@xirangit.com>
 * @package     common
 * @version     $Id$
 * @link        http://www.ranzhi.org
 */
?>
<style>
.contact-list-item + .contact-list-item {border-top: 1px solid #E7EAF2; margin-top: 5px; padding-top: 6px;}
.contact-list-item > .heading {height: 30px; position: relative; margin-right: 30px;}
.contact-list-item > .heading > .btn-expand {position: absolute; right: -30px; top: 0;}
.contact-list-item .contact-name,
.contact-list-item .contact-title,
.contact-list-item .contact-mobile {float: left; text-overflow: ellipsis; white-space: nowrap; overflow: hidden; line-height: 28px; padding-left: 5px; height: 28px;}
.contact-list-item .contact-name {width: 40%;}
.contact-list-item .contact-name .label {position: relative; top: -2px;}
.contact-list-item .contact-title {width: 22%; padding-left: 10px;}
.contact-list-item .contact-mobile {width: 38%;}
.contact-list-item > .content {position: relative; margin-top: 4px; padding-left: 40%;}
.contact-list-item .contact-vcard {width: 75px; height: 75px; position: absolute; left: 0; top: 0;}
.contact-list-item .contact-infos {min-height: 75px;}
.contact-info-item {position: relative; padding-left: 31%; line-height: 24px;}
.contact-info-item > .info-title {position: absolute; left: 0; top: 0; width: 36%; text-overflow: ellipsis; white-space: nowrap; overflow: hidden;}
</style>
<div class='panel panel-block'>
  <div class='panel-heading'>
    <strong class='title'><?php echo $lang->contact->common;?></strong>
  </div>
  <?php if(isset($customer)):?>
  <div class='panel-actions'>
    <?php echo html::a($this->createLink('crm.customer', 'linkContact', "customerID=$customer->id"), '<i class="icon icon-plus"></i> ' . $lang->contact->create, "class='btn btn-primary'");?>
  </div>
  <?php endif;?>
  <div class='panel-body contact-list' id='contactsList'>
    <?php $isFirstContact = true;?>
    <?php foreach($contacts as $contact):?>
    <div class='contact-list-item'>
      <div class='heading'>
        <div class='contact-name'>
          <?php echo html::a($this->createLink('crm.contact', 'view', "contactID=$contact->id"), $contact->realname, "class='text-fore text-md'");?>
          <?php if($contact->gender == 'f'):?>
          &nbsp; <small class='text-red'><?php echo $lang->contact->lady;?></small>
          <?php elseif($contact->gender == 'm'):?>
          &nbsp; <small class='text-primary'><?php echo $lang->contact->gentleman;?></small>
          <?php endif;?>
          <?php if($contact->maker):?>
          &nbsp; <span class='label label-pale label-lg'><?php echo $lang->resume->maker?></span>
          <?php endif;?>
        </div>
        <div class='contact-title text-md'><?php echo  $contact->title;?></div>
        <div class='contact-mobile text-md'><?php echo  $contact->mobile;?></div>
        <a href='#contact-info-<?php echo $contact->id?>' data-toggle='collapse' data-parent='#contactsList' class='btn btn-link btn-expand<?php if(!$isFirstContact) echo ' collapsed';?>'><i class='icon icon-angle-down icon-lg'></i></a>
      </div>
      <div class='content collapse<?php if($isFirstContact) echo ' in';?>' id='contact-info-<?php echo $contact->id?>'>
        <?php echo html::image(helper::createLink('crm.contact', 'vcard', "contactID={$contact->id}"), "class='contact-vcard'");?>
        <div class='contact-infos'>
          <?php foreach($config->contact->contactWayList as $item):?>
          <?php if($item != 'mobile' && !empty($contact->{$item})):?>
            <div class='contact-info-item'>
              <div class='info-title text-gray'><?php echo $lang->contact->{$item};?></div>
              <div class='info-content'>
                <?php
                  if($item == 'qq')
                  {
                      $site = isset($config->company->name) ? $config->company->name : '';
                      echo html::a("http://wpa.qq.com/msgrd?v=3&uin={$contact->$item}&site={$site}&menu=yes", $contact->$item, "target='_blank'");
                  }
                  else if($item == 'email')
                  {
                      echo html::mailto($contact->{$item}, $contact->{$item});
                  }
                  else if($item != 'qq' and $item != 'email')
                  {
                      echo '<span class="text-gray">' . $contact->{$item} . '</span>';
                  }
                ?>
              </div>
            </div>
          <?php endif;?>
          <?php endforeach;?>
        </div>
      </div>
    </div>
    <?php $isFirstContact = false;?>
    <?php endforeach;?>
  </div>
</div>
<?php if(isset($pageJS)) js::execute($pageJS);?>
