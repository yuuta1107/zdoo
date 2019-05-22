<?php
/**
 * The header view of common module of RanZhi.
 *
 * @copyright   Copyright 2009-2018 青岛易软天创网络科技有限公司(QingDao Nature Easy Soft Network Technology Co,LTD, www.cnezsoft.com)
 * @license     ZPL (http://zpl.pub/page/zplv12.html)
 * @author      Chunsheng Wang <chunsheng@cnezsoft.com>
 * @package     common
 * @version     $Id: header.html.php 4029 2016-08-26 06:50:41Z liugang $
 * @link        http://www.ranzhi.org
 */
?>
<?php if($extView = $this->getExtViewFile(__FILE__)){include $extView; return helper::cd();}?>
<?php include 'header.lite.html.php';?>
<style>body {padding-top: 58px}</style>
<div id='mainNavbar'>
  <div class='container'>
    <div class='heading'>
      <?php
      if(isset($lang->app))
      {
          echo html::a($this->createLink($this->config->default->module), $lang->app->name);
      }
      else
      {
          echo html::a($this->createLink('admin'), $lang->admin->common);
      }
      ?>
    </div>
    <nav>
      <?php echo commonModel::createMainMenu($this->moduleName);?>
    </nav>
    <div class='actions'>
      <button type='button' class='btn'>Blocks <span class='caret'></span></button>
    </div>
  </div>
</div>
<?php
if(!isset($moduleMenu)) $moduleMenu = commonModel::createModuleMenu($this->moduleName);
if($moduleMenu) echo "$moduleMenu\n<div class='row page-content with-menu'>\n"; else echo "<div class='row page-content'>";
?>
