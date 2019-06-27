<?php
/**
 * The public form items of block of RanZhi.
 *
 * @copyright   Copyright 2009-2018 青岛易软天创网络科技有限公司(QingDao Nature Easy Soft Network Technology Co,LTD, www.cnezsoft.com)
 * @license     ZPL (http://zpl.pub/page/zplv12.html)
 * @author      guanxiying <guanxiying@xirangit.com>
 * @package     block
 * @version     $Id$
 * @link        http://www.ranzhi.org
 */
?>
<?php $this->loadModel('block', 'sys');?>
<tr>
  <th class='w-60px'><?php echo $lang->block->name?></th>
  <td><?php echo html::input('title', $block ? $block->title : '', "class='form-control'")?></td>
</tr>
