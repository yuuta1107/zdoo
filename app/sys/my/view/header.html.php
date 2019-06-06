<?php
/**
 * The header view of my module of RanZhi.
 *
 * @copyright   Copyright 2009-2018 青岛易软天创网络科技有限公司(QingDao Nature Easy Soft Network Technology Co,LTD, www.cnezsoft.com)
 * @license     ZPL (http://zpl.pub/page/zplv12.html)
 * @author      Tingting Dai <daitingting@xirangit.com>
 * @package     my
 * @version     $Id$
 * @link        http://www.ranzhi.org
 */
?>
<?php include $app->getModuleRoot() . '../sys/common/view/header.lite.html.php';?>
<div id='mainNavbar'>
  <div class='container'>
    <div class='heading'>
      <?php
      if($this->app->appName == 'sys')
      {
          $isActive = $this->methodName == 'index' ? 'active': '';
          echo html::a($this->createLink('my'), $lang->my->common, $isActive ? "class='active'" : '');
      }
      else
      {
          $isActive = $this->methodName == 'admin' ? 'active': '';
          echo html::a($this->createLink('admin'), $lang->admin->common, $isActive ? "class='active'" : '');
      }
      ?>
    </div>
    <nav>
      <?php
      if($this->app->appName == 'sys')
      {
          echo commonModel::createDashboardMenu();
      }
      else
      {
          echo commonModel::createMainMenu($this->moduleName);
      }
      ?>
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
