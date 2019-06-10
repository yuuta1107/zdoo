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
  </div>
</div>
<div class='container' id='main'><?php /* '#main' closed in 'footer.html.php'. */ ?>
  <?php
  if(!isset($moduleMenu) || $moduleMenu === true)
  {
      // if $moduleMenu is true or not set then output default module menu
      echo commonModel::createModuleMenu($this->moduleName);
  }
  else if(is_string($moduleMenu))
  {
      // if $moduleMenu is custom by control method in string then output it
      echo $moduleMenu;
  }
  ?>
  <div id='mainContent'><?php /* '#mainContent' closed in 'footer.html.php'. */ ?>
