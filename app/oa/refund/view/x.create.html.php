<?php
/**
 * The create view file of refund module of RanZhi.
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
  <form id='ajaxForm' method='post' action="<?php echo $this->createLink('oa.refund', 'create')?>">
    <div class='panel'>
      <div class='panel-heading'>
        <strong><?php echo $lang->refund->create;?></strong>
      </div>
      <div class='panel-body'>
        <table class='table table-form'>
          <tr>
            <th class='w-60px'><?php echo $lang->refund->name?></th>
            <td><?php echo html::input('name', '', "class='form-control'")?></td>
            <th class='w-20px'></th>
          </tr>
          <tr>
            <th><?php echo $lang->refund->dept?></th>
            <td><?php echo html::select('dept', $deptList, $this->app->user->dept, "class='form-control chosen'")?></td>
            <td></td>
          </tr>
          <tr>
            <th><?php echo $lang->refund->category?></th>
            <td><?php echo html::select('category', $categories, '', "class='form-control chosen'");?></td>
            <td></td>
          </tr>
          <tr>
            <th></th>
            <td><?php echo html::checkbox('objectType', $lang->refund->objectTypeList);?></td>
            <td></td>
          </tr>
          <tr class='hide'>
            <th><?php echo $lang->refund->customer;?></th>
            <td>
              <div class='required required-wrapper'></div>
              <?php echo html::select('customer', $customers, '', "class='form-control chosen' data-no_results_text='" . $lang->searchMore . "'");?>
            </td>
            <td></td>
          </tr>
          <tr class='hide'>
            <th><?php echo $lang->refund->order;?></th>
            <td>
              <div class='required required-wrapper'></div>
              <?php echo html::select('order', '', '', "class='form-control chosen'");?>
            </td>
            <td></td>
          </tr>
          <tr class='hide'>
            <th><?php echo $lang->refund->contract;?></th>
            <td>
              <div class='required required-wrapper'></div>
              <?php echo html::select('contract', '', '', "class='form-control chosen'");?>
            </td>
            <td></td>
          </tr>
          <tr class='hide'>
            <th><?php echo $lang->refund->project;?></th>
            <td>
              <div class='required required-wrapper'></div>
              <?php echo html::select('project', $projects, '', "class='form-control chosen'");?>
            </td>
            <td></td>
          </tr>
          <tr>
            <th><?php echo $lang->refund->money?></th>
            <td>
              <div class='input-group'>
                <div class='input-group-btn w-90px'><?php echo html::select('currency', $currencyList, '', "class='form-control'")?></div>
                <?php echo html::input('money', '', "class='form-control'")?>
                <div class='input-group-addon w-90px fix-border'><?php echo $lang->refund->invoice?></div>
                <?php echo html::input('invoice', '', "class='form-control'")?>
                <div class='input-group-btn'><?php echo html::a("javascript:void(0)", "<i class='icon-double-angle-down'></i> " . $lang->refund->detail, "class='btn detail'")?></div>
              </div>
            </td>
            <td></td>
          </tr>
          <tr id='refund-date'>
            <th><?php echo $lang->refund->date?></th>
            <td><?php echo html::input('date', '', "class='form-control form-date'")?></td>
            <td></td>
          </tr>
          <tr id='refund-related'>
            <th><?php echo $lang->refund->related?></th>
            <td><?php echo html::select('related[]', $users, $this->app->user->account, "class='form-control chosen' multiple")?></td>
            <td></td>
          </tr>
          <tr id='refund-detail' class='hidden'>
            <th><?php echo $lang->refund->detail?></th>
            <td id='detailBox'>
              <table class='table table-detail'>
                <tr>
                  <td>
                    <div class='form-group'>
                      <div class='input-group'>
                        <span class='input-group-addon'><?php echo $lang->refund->date;?></span>
                        <?php echo html::input("dateList[1]", '', "class='form-control form-date' placeholder='{$lang->refund->date}'")?>
                        <span class='input-group-addon fix-border'><?php echo $lang->refund->money;?></span>
                        <?php echo html::input("moneyList[1]", '', "class='form-control' placeholder='{$lang->refund->money}'")?>
                        <span class='input-group-addon fix-border'><?php echo $lang->refund->invoice;?></span>
                        <?php echo html::input("invoiceList[1]", '', "class='form-control' placeholder='{$lang->refund->invoice}'")?>
                        <span class='input-group-btn'>
                          <?php echo html::a('javascript:;', "<i class='icon-plus'></i>", "class='plus btn'");?>
                          <?php echo html::a('javascript:;', "<i class='icon-remove'></i>", "class='minus btn'");?>
                        </span>
                      </div>
                      <?php if($categories):?>
                      <div class='input-group'>
                        <span class='input-group-addon'><?php echo $lang->refund->category;?></span>
                        <?php echo html::select("categoryList[1]", $categories, '', "class='form-control chosen' placeholder='{$lang->refund->category}'")?>
                      </div>
                      <?php endif;?>
                      <div class='input-group'>
                        <span class='input-group-addon'><?php echo $lang->refund->related;?></span>
                        <?php echo html::select("relatedList[1][]", $users, '', "class='form-control chosen' multiple data-placeholder='{$lang->refund->related}'")?>
                      </div>
                      <div class='input-group'>
                        <span class='input-group-addon'><?php echo $lang->refund->desc;?></span>
                        <?php echo html::textarea("descList[1]", '', "class='form-control' placeholder='{$lang->refund->desc}'")?>
                      </div>
                    </div>
                  </td>
                </tr>
              </table>
            </td>
            <td></td>
          </tr>
          <tr>
            <th><?php echo $lang->refund->desc?></th>
            <td><?php echo html::textarea('desc', '', "class='form-control'")?></td>
            <td></td>
          </tr>
          <?php if(commonModel::hasPriv('file', 'upload')):?>
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
        <?php echo html::textarea("descList[key]", '', "class='form-control' placeholder='{$lang->refund->desc}'")?>
      </div>
    </div>
  </td>
</tr>
</script>
<?php js::set('key', 2)?>
<script>
<?php helper::import('../js/searchcustomer.js');?>
</script>
<?php include '../../common/view/footer.html.php';?>
