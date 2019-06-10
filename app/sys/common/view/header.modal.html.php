<?php
/**
 * The header.modal view of common module of RanZhi.
 *
 * @copyright   Copyright 2009-2018 青岛易软天创网络科技有限公司(QingDao Nature Easy Soft Network Technology Co,LTD, www.cnezsoft.com)
 * @license     ZPL (http://zpl.pub/page/zplv12.html)
 * @author      Yidong Wang <yidong@cnezsoft.com>
 * @package     common
 * @version     $Id$
 * @link        http://www.ranzhi.org
 */
?>
<?php if(helper::isAjaxRequest()):?>
<?php
$webRoot    = $config->webRoot;
$jsRoot     = $webRoot . "js/";
$themeRoot  = $webRoot . "theme/";

/* Set modal size */
$modalClass = '';
if(isset($modalWidth))
{
    if(is_numeric($modalWidth))
    {
        $modalWidth .= 'px';
    }
    else if($modalWidth == 'lg' || $modalWidth == 'sm' || $modalWidth == 'md' || $modalWidth == 'xs' || $modalWidth == 'fullscreen')
    {
        $modalClass = 'modal-' . $modalWidth;
        $modalWidth = '';
    }
}

if(isset($pageCSS)) css::internal($pageCSS);

/* set requiredField. */
if(isset($config->$moduleName->require->$methodName))
{
    $requiredFields = str_replace(' ', '', $config->$moduleName->require->$methodName);
    js::execute("config.requiredFields = \"$requiredFields\"; setRequiredFields();");
}
?>
<div class='modal-dialog<?php if(!empty($modalClass)) echo ' ' . $modalClass;?>'<?php if(!empty($modalWidth)) echo " style='width:{$modalWidth};'";?>>
  <div class='modal-content'>
    <div class='modal-header'>
      <?php echo html::closeButton();?>
      <strong class='modal-title'><?php if(!empty($title)) echo $title; ?></strong>
      <?php if(!empty($subtitle)) echo "<label class='text-important'>" . $subtitle . '</label>'; ?>
    </div>
    <div class='modal-body'>
<?php else:?>
<?php include $this->app->getAppRoot() . '/common/view/header.html.php';?>
<?php endif;?>
