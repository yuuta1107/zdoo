<?php
/**
 * The dashboard view file of block module of RanZhi.
 *
 * @copyright   Copyright 2009-2018 青岛易软天创网络科技有限公司(QingDao Nature Easy Soft Network Technology Co,LTD, www.cnezsoft.com)
 * @license     ZPL (http://zpl.pub/page/zplv12.html)
 * @author      Yidong Wang <yidong@cnezsoft.com>
 * @package     block
 * @version     $Id$
 * @link        http://www.ranzhi.org
 */
if($extView = $this->getExtViewFile(__FILE__)){include $extView; return helper::cd();}
$webRoot   = $config->webRoot;
$jsRoot    = $webRoot . "js/";
$themeRoot = $webRoot . "theme/";
if(isset($pageCSS)) css::internal($pageCSS);
?>
<div id='navbarActions' class='actions'><a class='btn btn-primary' href='<?php echo $this->createLink("block", "admin"); ?>' data-toggle='modal'><i class='icon-plus'></i> <?php echo $lang->block->createBlock?></a></div>

<div class='dashboard auto-fade-in fade' id='dashboard' data-confirm-remove-block='<?php  echo $lang->block->confirmRemoveBlock;?>'>
  <div class='row'>
    <div class='col-main'>
      <?php $index = 0;?>
      <?php foreach($blocks as $key => $block):?>
      <?php
      $index = $key;
      ?>
        <div class='panel panel-block <?php if(isset($block->params->color)) echo 'panel-' . $block->params->color;?>' id='block<?php echo $index?>' data-id='<?php echo $index?>' data-blockid='<?php echo $block->id?>' data-name='<?php echo $block->title?>' data-url='<?php echo $block->blockLink?>' <?php if(!empty($block->height)) echo "data-height='$block->height'";?>>
          <div class='panel-heading'>
            <strong class='title'><?php echo $block->title;?></strong>
          </div>
          <ul class='panel-actions nav nav-default'>
            <?php if(!empty($block->moreLink)) echo '<li>' . html::a($block->moreLink, '<small>MORE</small>', '', "title='{$lang->more}'") . '</li>';?>
            <li class='dropdown'>
              <a href='javascript:;' data-toggle='dropdown' class='panel-action'><i class='icon icon-ellipsis-v'></i></a>
              <ul class='dropdown-menu pull-right'>
                <li><a href='javascript:;' class='refresh-panel'><i class='icon-repeat'></i> <?php echo $lang->refresh;?></a></li>
                <li><a data-toggle='modal' href="<?php echo $this->createLink("block", "admin", "index=$index"); ?>" class='edit-block' data-title='<?php echo $block->title; ?>' data-icon='icon-pencil'><i class='icon-pencil'></i> <?php echo $lang->edit; ?></a></li>
                <li><a href='javascript:;' class='remove-panel'><i class='icon-remove'></i> <?php echo $lang->delete; ?></a></li>
              </ul>
            </li>
          </ul>
          <div class='panel-body'>
          </div>
        </div>
      <?php endforeach;?>
    </div>
    <div class='col-side'>
    </div>
  </div>
</div>
<script>
config.ordersSaved = '<?php echo $lang->block->ordersSaved; ?>';
config.confirmRemoveBlock = '<?php echo $lang->block->confirmRemoveBlock; ?>';
</script>
<?php if($extView = $this->getExtViewFile(__FILE__)){include $extView; return helper::cd();}?>
<?php
if(isset($pageJS)) js::execute($pageJS);

/* Load hook files for current page. */
$extPath      = dirname(dirname(dirname(realpath($viewFile)))) . '/common/ext/view/';
$extHookRule  = $extPath . 'footer.*.hook.php';
$extHookFiles = glob($extHookRule);
if($extHookFiles) foreach($extHookFiles as $extHookFile) include $extHookFile;
?>
