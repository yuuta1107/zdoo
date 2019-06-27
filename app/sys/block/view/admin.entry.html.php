<?php
/**
 * The admin view file of block module of RanZhi.
 *
 * @copyright   Copyright 2009-2018 青岛易软天创网络科技有限公司(QingDao Nature Easy Soft Network Technology Co,LTD, www.cnezsoft.com)
 * @license     ZPL (http://zpl.pub/page/zplv12.html)
 * @author      Hao Sun <catouse@me.com>
 * @package     block
 * @version     $Id$
 * @link        http://www.ranzhi.org
 */
?>
<?php include "../../../sys/common/view/header.modal.html.php";?>
<?php include "../../../sys/common/view/chosen.html.php";?>
<?php js::set('index', $index);?>
<table class='table table-form'>
  <tbody>
    <tr>
      <th class='w-60px'><?php echo $lang->block->lblBlock?></th>
      <td><?php echo html::select('blocks', $blocks, $blockID, "class='form-control'")?></td>
    </tr>
  </tbody>
</table>
<?php if($blockID or $params):?>
<form method='post' id='ajaxForm' action='<?php echo inlink('admin', "index=$index&blockID=$blockID")?>'>
  <table class='table table-form'>
    <tbody>
      <?php include 'publicform.html.php';?>
      <?php foreach($params as $key => $param):?>
      <tr>
        <th><?php echo $param['name']?></th>
        <td>
          <?php
          if(!isset($param['control'])) $param['control'] = 'input';
          if(!method_exists('html', $param['control'])) $param['control'] = 'input';

          $control = $param['control'];
          $attr    = empty($param['attr']) ? '' : $param['attr'];
          $default = $block ? (isset($block->params->$key) ? $block->params->$key : '') : (isset($param['default']) ? $param['default'] : '');
          $options = isset($param['options']) ? $param['options'] : array();
          if($control == 'select' or $control == 'radio' or $control == 'checkbox')
          {
              $chosen = $control == 'select' ? 'chosen' : '';
              if(strpos($attr, 'multiple') !== false)
              {
                  echo html::$control("params[$key][]", $options, $default, "class='form-control " . $chosen . "' $attr");
              }
              else
              {
                  echo html::$control("params[$key]", $options, $default, "class='form-control " . $chosen .  "' $attr");
              }
          }
          else
          {
              echo html::$control("params[$key]", $default, "class='form-control' $attr");
          }
          ?>
        </td>
      </tr>
      <?php endforeach;?>
      <tr>
        <th><?php echo $lang->block->style;?></th>
        <td>
          <div class='input-group'>
            <span class='input-group-addon'><?php echo $lang->block->grid;?></span>
            <?php echo html::select('grid', $lang->block->gridOptions, $block ? $block->grid : 8, "class='form-control'")?>
            <div class='input-group-btn block'>
              <?php $btn = isset($block->params->color) ? 'btn-' . $block->params->color : 'btn-default'?>
              <button type='button' class="btn <?php echo $btn;?> dropdown-toggle" data-toggle='dropdown'>
                <?php echo $lang->block->color;?> <span class='caret'></span>
              </button>
              <?php echo html::hidden('params[color]', isset($block->params->color) ? $block->params->color : 'default');?>
              <div class='dropdown-menu buttons'>
                <li><button type='button' data-id='default' class='btn btn-block btn-default'>&nbsp;</li>
                <li><button type='button' data-id='primary' class='btn btn-block btn-primary'>&nbsp;</li>
                <li><button type='button' data-id='warning' class='btn btn-block btn-warning'>&nbsp;</li>
                <li><button type='button' data-id='danger' class='btn btn-block btn-danger'>&nbsp;</li>
                <li><button type='button' data-id='success' class='btn btn-block btn-success'>&nbsp;</li>
                <li><button type='button' data-id='info' class='btn btn-block btn-info'>&nbsp;</li>
              </div>
            </div>
          </div>
        </td>
      </tr>
    </tbody>
    <tfoot>
      <tr><th></th><td><?php echo html::submitButton() . html::hidden('block', $blockID);?></td></tr>
    </tfoot>
  </table>
</form>
<?php endif;?>
<?php if(!isset($block->name)):?>
<script>
$(function()
{
    var blockTitle = ''; 

    options = $('#blocks').find("option").text();
    blockTitle = $('#blocks').find("option:selected").text();
    if(options.indexOf($('#title').val()) >= 0)
    {
        $('#title').val(blockTitle);
        if($('#paramstype').length > 0) $('#title').val(blockTitle + ' - ' + $('#paramstype').find('option:selected').html());
    }

    $(document).on('change', '#paramstype', function()
    {   
        $('#title').val(blockTitle + ' - ' + $(this).find('option:selected').html());
    }); 

})
</script>
<?php endif;?>
<?php include "../../../sys/common/view/footer.modal.html.php";?>
