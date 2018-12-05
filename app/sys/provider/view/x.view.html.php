<?php
/**
 * The view view file of provider module of RanZhi.
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
<div class='xuanxuan-card'>
  <div class='panel'>
    <div class='panel-heading'><strong><i class="icon-list-info"></i> <?php echo $lang->provider->basicInfo;?></strong></div>
    <table class='table table-info'>
      <tr>
        <th class='w-70px'><?php echo $lang->provider->name;?></th>
        <td><?php echo $provider->name;?></td>
      </tr>
      <?php if($provider->size):?>
      <tr>
        <th><?php echo $lang->provider->size;?></th>
        <td><?php echo $lang->provider->sizeList[$provider->size];?></td>
      </tr>
      <?php endif;?>
      <?php if($provider->type):?>
      <tr>
        <th><?php echo $lang->provider->type;?></th>
        <td><?php echo $lang->provider->typeList[$provider->type];?></td>
      </tr>
      <?php endif;?>
      <?php if($provider->industry):?>
      <tr>
        <th><?php echo $lang->provider->industry;?></th>
        <td><?php echo zget($industries, $provider->industry, '');?></td>
      </tr>
      <?php endif;?>
      <?php if($provider->area):?>
      <tr>
        <th><?php echo $lang->provider->area;?></th>
        <td><?php echo zget($areas, $provider->area, '');?></td>
      </tr>
      <?php endif;?>
      <?php if($provider->weibo):?>
      <tr>
        <th><?php echo $lang->provider->weibo;?></th>
        <td><?php echo html::a("$provider->weibo", $provider->weibo, "target='_blank'");?></td>
      </tr>
      <?php endif;?>
      <?php if($provider->weixin):?>
      <tr>
        <th><?php echo $lang->provider->weixin;?></th>
        <td><?php echo $provider->weixin;?></td>
      </tr>
      <?php endif;?>
      <?php if($provider->site):?>
      <tr>
        <th><?php echo $lang->provider->site;?></th>
        <td><?php echo html::a("$provider->site", $provider->site, "target='_blank'");?></td>
      </tr>
      <?php endif;?>
    </table>
  </div>
  <?php if($provider->depositor):?>
  <div class='panel'>
    <div class='panel-heading'><strong><?php echo $lang->provider->depositor;?></strong></div>
    <div class='panel-body'><?php echo $provider->depositor;?></div>
  </div>
  <?php endif;?>
  <?php if($provider->desc):?>
  <div class='panel'>
    <div class='panel-heading'><strong><?php echo $lang->provider->desc;?></strong></div>
    <div class='panel-body'><?php echo $provider->desc;?></div>
  </div>
  <?php endif;?>
  <?php foreach($contacts as $contact):?>
  <div class='panel' <?php if($contact->left) echo "title='" . sprintf($lang->contact->leftAt, $contact->left) . "'";?>>
    <table class='table table-bordered table-contact'>
      <tr>
        <th class='w-120px text-center alert v-middle'>
          <?php $class = $contact->maker ? "class='text-red'" : "";?>
          <span class='lead'><?php echo html::a('###', $contact->realname, "id={$contact->id} {$class}");?></span>
          <?php if($contact->left):?>
          <span><i class='icon-lock text-muted'></i></span>
          <?php endif;?>
          <div><?php echo $contact->dept . ' ' . $contact->title;?></div>
        </th>
        <td>
          <div class='col-sm-10'>
            <div class='contact-info'>
              <?php if($contact->phone or $contact->mobile) echo "<div><i class='icon-phone-sign'></i> $contact->phone $contact->mobile</div>";?>
              <?php if($contact->qq) echo "<div class='f-14'><i class='icon-qq'></i> $contact->qq</div>";?>
              <?php if($contact->email) echo "<div class='f-14'><i class='icon-envelope-alt'></i> $contact->email </div>";?>
            </div>
            <p class='vcard text-center'><?php echo html::image(helper::createLink('crm.contact', 'vcard', "contactID={$contact->id}"), "style='height:120px'");?></p>
          </div>
          <div class='text-right col-sm-2'>
            <i class='btn-vcard icon icon-qrcode icon-2x text-info'> </i>
          </div>
        </td>
      </tr>
    </table>
  </div>
  <?php endforeach;?>
  <?php echo $this->fetch('action', 'history', "objectType=customer&objectID={$provider->id}")?>
  <div class='page-actions'>
    <?php
    echo "<div class='btn-group'>";
    commonModel::printLink('action', 'createRecord', "objectType=provider&objectID=$provider->id&customer=$provider->id", $lang->customer->record, "class='btn' data-toggle='modal'");
    commonModel::printLink('provider', 'edit', "providerID=$provider->id", $lang->edit, "class='btn'");
    commonModel::printLink('provider', 'delete', "providerID=$provider->id", $lang->delete, "class='deleter btn'");
    echo '</div>';

    $browseLink = $this->session->providerList ? $this->session->providerList : inlink('browse');
    echo html::a($browseLink, $lang->goback, "class='btn btn-default'");
    ?>
  </div>
</div>
<?php include '../../common/view/footer.html.php';?>
