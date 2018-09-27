<?php
/**
 * The edit view file of contact module of RanZhi.
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
<?php include '../../common/view/datepicker.html.php';?>
<?php include '../../../sys/common/view/chosen.html.php';?>
<div class='xuanxuan-card'>
  <form method='post' id='contactForm' class='form-condensed' action="<?php echo helper::createLink('contact', 'edit', "contactID=$contact->id")?>">
    <div class='panel'>
      <div class='panel-heading'><strong><?php echo $lang->contact->basicInfo;?></strong></div>
      <div class='panel-body'>
        <table class='table table-info table-form'>
          <tr>
            <th class='w-80px'><?php echo $lang->contact->realname;?></th>
            <td>
              <div class='input-group'>
                <?php echo html::input('realname', $contact->realname, "class='form-control'");?>
                <span class='input-group-addon'>
                  <label class='checkbox-inline'>
                    <?php $checked = $contact->maker ? "checked='checked'" : '';?>
                    <input type='checkbox' name='maker' id='maker' value='1' <?php echo $checked?>/> <?php echo $lang->resume->maker;?>
                  </label>
                </span>
              </div>
            </td>
          </tr>
          <tr>
            <th><?php echo $lang->contact->customer;?></th>
            <td><?php echo html::select('customer', $customers, $contact->customer, "class='form-control chosen' data-no_results_text='" . $lang->searchMore . "'");?></td>
          </tr>
          <tr>
            <th><?php echo $lang->resume->dept;?></th>
            <td colspan='2'><?php echo html::input('dept', $contact->dept, "class='form-control'");?></td>
          </tr>
          <tr>
            <th><?php echo $lang->resume->title;?></th>
            <td colspan='2'><?php echo html::input('title', $contact->title, "class='form-control'");?></td>
          </tr>
          <tr>
            <th><?php echo $lang->resume->join;?></th>
            <td colspan='2'><?php echo html::input('join', $contact->join, "class='form-control form-date'");?></td>
          </tr>
          <tr>
            <th><?php echo $lang->contact->birthday;?></th>
            <td colspan='2'><?php echo html::input('birthday', $contact->birthday != '0000-00-00' ? $contact->birthday : '', "class='form-control form-date'");?></td>
          </tr>
          <tr>
            <th><?php echo $lang->contact->gender;?></th>
            <td colspan='2'><?php unset($lang->genderList->u); echo html::radio('gender', $lang->genderList, $contact->gender);?></td>
          </tr>
        </table>
      </div>
    </div>
    <div class='panel'>
      <div class='panel-heading'><strong><?php echo $lang->contact->contactInfo;?></strong></div>
      <div class='panel-body'>
        <table class='table table-info'>
          <?php foreach($config->contact->contactWayList as $item):?>
          <tr>
            <th class='w-70px'><?php echo $lang->contact->{$item};?></th>
            <td>
              <?php
              $itemValue = $contact->$item;
              if($item == 'site' and empty($contact->$item)) $itemValue = 'http://';
              if($item == 'weibo' and empty($contact->$item)) $itemValue = 'http://weibo.com/';
              $placeholder = $item == 'email' ? "placeholder='{$lang->contact->emailTip}'" : '';
              echo html::input($item, $itemValue, "class='form-control' $placeholder");
              ?>
            </td>
          </tr>
          <?php endforeach;?>
        </table>
      </div>
    </div>
    <div class='panel'>
      <div class='panel-body'>
        <table class='table table-form'>
          <tr>
            <th class='w-50px'><?php echo $lang->contact->desc;?></th>
            <td colspan='2'><?php echo html::textarea('desc', $contact->desc, "rows='3' class='form-control'");?></td>
          </tr>
        </table>
      </div>
    </div>
    <?php echo $this->fetch('action', 'history', "objectType=contact&objectID={$contact->id}")?>
    <div class='page-actions'>
      <?php echo html::submitButton() . ' ' . html::backButton();?>
    </div>
  </form>
</div>
<script>
<?php helper::import('../js/searchcustomer.js');?>
</script>
<?php include '../../common/view/footer.html.php';?>
