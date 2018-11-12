<?php
/**
 * The edit view file of refund module of RanZhi.
 *
 * @copyright   Copyright 2009-2018 青岛易软天创网络科技有限公司(QingDao Nature Easy Soft Network Technology Co,LTD, www.cnezsoft.com)
 * @license     ZPL (http://zpl.pub/page/zplv12.html)
 * @author      Gang Liu <liugang@cnezsoft.com>
 * @package     refund
 * @version     $Id$
 * @link        http://www.ranzhi.org
 */
?>
<?php include '../../../sys/common/view/header.lite.html.php';?>
<?php include '../../../sys/common/view/datepicker.html.php';?>
<?php include '../../../sys/common/view/chosen.html.php';?>
<div class='xuanxuan-card'>
  <form id='ajaxForm' method='post' action="<?php echo $this->createLink('oa.refund', 'edit', "refundID={$refund->id}")?>">
    <div class='panel'>
      <div class='panel-heading'>
        <strong><?php echo $lang->refund->edit;?></strong>
      </div>
      <div class='panel-body'>
        <table class='table table-form'>
          <tr>
            <th class='w-60px'><?php echo $lang->refund->name?></th>
            <td><?php echo html::input('name', $refund->name, "class='form-control'")?></td>
            <th class='w-20px'></th>
          </tr>
          <tr>
            <th><?php echo $lang->refund->dept?></th>
            <td><?php echo html::select('dept', $deptList, $refund->dept, "class='form-control chosen'")?></td>
            <td></td>
          </tr>
          <tr>
            <th><?php echo $lang->refund->category?></th>
            <td><?php echo html::select('category', $categories, $refund->category, "class='form-control chosen'");?></td>
            <td></td>
          </tr>
          <tr>
            <th></th>
            <td><?php echo html::checkbox('objectType', $lang->refund->objectTypeList, $refund->objectType);?></td>
            <td></td>
          </tr>
          <tr>
            <th><?php echo $lang->refund->customer;?></th>
            <td>
              <div class='required required-wrapper'></div>
              <?php echo html::select('customer', $customers, $refund->customer, "class='form-control chosen' data-no_results_text='" . $lang->searchMore . "'");?>
            </td>
            <td></td>
          </tr>
          <tr>
            <th><?php echo $lang->refund->order;?></th>
            <td>
              <div class='required required-wrapper'></div>
              <?php echo html::select('order', $orders, $refund->order, "class='form-control chosen'");?>
            </td>
            <td></td>
          </tr>
          <tr>
            <th><?php echo $lang->refund->contract;?></th>
            <td>
              <div class='required required-wrapper'></div>
              <?php echo html::select('contract', $contracts, $refund->contract, "class='form-control chosen'");?>
            </td>
            <td></td>
          </tr>
          <tr>
            <th><?php echo $lang->refund->project;?></th>
            <td>
              <div class='required required-wrapper'></div>
              <?php echo html::select('project', $projects, $refund->project, "class='form-control chosen'");?>
            </td>
            <td></td>
          </tr>
          <tr>
            <th><?php echo $lang->refund->money?></th>
            <td>
              <div class='input-group'>
                <div class='input-group-btn w-90px'><?php echo html::select('currency', $currencyList, $refund->currency, "class='form-control'")?></div>
                <?php echo html::input('money', $refund->money, "class='form-control'")?>
                <div class='input-group-addon fix-border'><?php echo $lang->refund->invoice?></div>
                <?php echo html::input('invoice', $refund->invoice, "class='form-control'")?>
                <div class='input-group-btn'><?php echo html::a("javascript:void(0)", "<i class='icon-double-angle-down'></i> " . $lang->refund->detail, "class='btn detail'")?></div>
              </div>
            </td>
            <td></td>
          </tr>
          <tr id='refund-date'>
            <th><?php echo $lang->refund->date?></th>
            <td><?php echo html::input('date', $refund->date, "class='form-control form-date'")?></td>
            <td></td>
          </tr>
          <tr id='refund-related'>
            <th><?php echo $lang->refund->related?></th>
            <td><?php echo html::select('related[]', $users, $refund->related, "class='form-control chosen' multiple")?></td>
            <td></td>
          </tr>
          <tr id='refund-detail' class='hidden'>
            <th><?php echo $lang->refund->detail?></th>
            <td id='detailBox'>
              <table class='table table-detail'>
                <?php $key = 0;?>
                <?php foreach($refund->detail as $d):?>
                <tr>
                  <td>
                    <div class='form-group'>
                      <div class='input-group'>
                        <span class='input-group-addon'><?php echo $lang->refund->date;?></span>
                        <?php echo html::input("dateList[$key]", $d->date, "class='form-control form-date' placeholder='{$lang->refund->date}'")?>
                        <span class='input-group-addon fix-border'><?php echo $lang->refund->money;?></span>
                        <?php echo html::input("moneyList[$key]", $d->money, "class='form-control' placeholder='{$lang->refund->money}'")?>
                        <span class='input-group-addon fix-border'><?php echo $lang->refund->invoice;?></span>
                        <?php echo html::input("invoiceList[$key]", $d->invoice, "class='form-control' placeholder='{$lang->refund->invoice}'")?>
                        <span class='input-group-btn'>
                          <?php echo html::a('javascript:;', "<i class='icon-plus'></i>", "class='plus btn'");?>
                          <?php echo html::a('javascript:;', "<i class='icon-remove'></i>", "class='minus btn'");?>
                        </span>
                      </div>
                      <?php if($categories):?>
                      <div class='input-group'>
                        <span class='input-group-addon'><?php echo $lang->refund->category;?></span>
                        <?php echo html::select("categoryList[$key]", $categories, $d->category, "class='form-control chosen' placeholder='{$lang->refund->category}'")?>
                      </div>
                      <?php endif;?>
                      <div class='input-group'>
                        <span class='input-group-addon'><?php echo $lang->refund->related;?></span>
                        <?php echo html::select("relatedList[$key][]", $users, $d->related, "class='form-control chosen' multiple data-placeholder='{$lang->refund->related}'")?>
                      </div>
                      <div class='input-group'>
                        <span class='input-group-addon'><?php echo $lang->refund->desc;?></span>
                        <?php echo html::textarea("descList[$key]", $d->desc, "class='form-control' style='height:32px;' placeholder='{$lang->refund->desc}'")?>
                      </div>
                    </div>
                  </td>
                </tr>
                <?php $key++;?>
                <?php endforeach;?>
              </table>
            </td>
            <td></td>
          </tr>
          <tr>
            <th><?php echo $lang->refund->desc?></th>
            <td><?php echo html::textarea('desc', $refund->desc, "class='form-control'")?></td>
            <td></td>
          </tr>
          <?php if(commonModel::hasPriv('file', 'uplaod')):?>
          <tr>
            <th><?php echo $lang->refund->files;?></th>
            <td><?php echo $this->fetch('file', 'buildForm')?></td>
            <td></td>
          </tr>
          <?php endif;?>
          <tr>
            <th></th>
            <td><?php echo html::submitButton() . '&nbsp;&nbsp;' . html::backButton();?></td>
            <td></td>
          </tr>
        </table>
      </div>
    </div>
  </form>
</div>
<script type='text/template' id='detailTpl'>
<tr>
  <td>
    <div class='form-group'>
      <div class='input-group'>
        <span class='input-group-addon'><?php echo $lang->refund->date;?></span>
        <?php echo html::input("dateList[key]", '', "class='form-control form-date' placeholder='{$lang->refund->date}'")?>
        <span class='input-group-addon fix-border'><?php echo $lang->refund->money;?></span>
        <?php echo html::input("moneyList[key]", '', "class='form-control' placeholder='{$lang->refund->money}'")?>
        <?php echo html::input("invoiceList[key]", '', "class='form-control' placeholder='{$lang->refund->invoice}'")?>
        <span class='input-group-btn'>
          <?php echo html::a('javascript:;', "<i class='icon-plus'></i>", "class='plus btn'");?>
          <?php echo html::a('javascript:;', "<i class='icon-remove'></i>", "class='minus btn'");?>
        </span>
      </div>
      <?php if($categories):?>
      <div class='input-group'>
        <span class='input-group-addon'><?php echo $lang->refund->category;?></span>
        <?php echo html::select("categoryList[key]", $categories, '', "class='form-control chosen' placeholder='{$lang->refund->category}'")?>
      </div>
      <?php endif;?>
      <div class='input-group'>
        <span class='input-group-addon'><?php echo $lang->refund->related;?></span>
        <?php echo html::select("relatedList[key][]", $users, '', "class='form-control chosen' multiple data-placeholder='{$lang->refund->related}'")?>
      </div>
      <div class='input-group'>
        <span class='input-group-addon'><?php echo $lang->refund->desc;?></span>
        <?php echo html::textarea("descList[key]", '', "class='form-control' style='height:32px;' placeholder='{$lang->refund->desc}'")?>
      </div>
    </div>
  </td>
</tr>
</script>
<?php js::set('key', $key)?>
<script>
<?php helper::import('../js/searchcustomer.js');?>
</script>
<?php include '../../common/view/footer.html.php';?>
