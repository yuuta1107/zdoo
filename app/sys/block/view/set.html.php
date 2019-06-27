<?php
/**
 * The set view file of block module of RanZhi.
 *
 * @copyright   Copyright 2009-2018 青岛易软天创网络科技有限公司(QingDao Nature Easy Soft Network Technology Co,LTD, www.cnezsoft.com)
 * @license     ZPL (http://zpl.pub/page/zplv12.html)
 * @author      Yidong Wang <yidong@cnezsoft.com>
 * @package     block
 * @version     $Id$
 * @link        http://www.ranzhi.org
 */
?>
<?php
if($type == 'html')
{
    $webRoot   = $config->webRoot;
    $jsRoot    = $webRoot . "js/";
    $themeRoot = $webRoot . "theme/";
    include '../../common/view/kindeditor.html.php';
}
?>
<form method='post' id='blockForm' class='form form-horizontal' action='<?php echo $this->createLink('block', 'set', "index=$index&type=$type&blockID=$blockID")?>'>
  <table class='table table-form'>
    <tbody>
      <?php include 'publicform.html.php';?>
      <?php if($type == 'rss'):?>
      <tr>
        <th><?php echo $lang->block->lblRss?></th>
        <td><?php echo html::input('params[link]', $block ? $block->params->link : '', "class='form-control'")?></td>
      </tr>
      <tr>
        <th><?php echo $lang->block->lblNum?></th>
        <td><?php echo html::input('params[num]', $block ? $block->params->num : 0, "class='form-control'")?></td>
      </tr>
      <?php elseif($type == 'html'):?>
      <tr>
        <th class='w-60px'><?php echo $lang->block->lblHtml;?></th>
        <td><?php echo html::textarea('html', $block ? $block->params->html : '', "class='form-control' rows='10'")?></td>
      </tr>
      <?php endif;?>
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
    <tfoot><tr><td colspan='2' class='text-center'><?php echo html::submitButton()?></td></tr></tfoot>
  </table>
</form>
<?php if(!isset($block->name)):?>
<script>
$(function()
{
    var blockTitle = ''; 

    options = $('#allEntries ').find("option").text();
    blockTitle = $('#allEntries').find("option:selected").text();
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
