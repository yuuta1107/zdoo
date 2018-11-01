<?php
/**
 * The browse view file of doc module of RanZhi.
 *
 * @copyright   Copyright 2009-2018 青岛易软天创网络科技有限公司(QingDao Nature Easy Soft Network Technology Co,LTD, www.cnezsoft.com)
 * @license     ZPL (http://zpl.pub/page/zplv12.html)
 * @author      Gang Liu <liugang@cnezsoft.com>
 * @package     doc
 * @version     $Id$
 * @link        http://www.ranzhi.org
 */
?>
<?php include '../../../sys/common/view/header.lite.html.php';?>
<?php js::set('libID ', $libID);?>
<?php js::set('libType', $lib->project ? 'project' : 'custom');?>
<?php include dirname(__FILE__) . '/x.browsebymenu.html.php';?>
<?php include '../../common/view/footer.html.php';?>
