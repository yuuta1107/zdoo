<?php
/**
 * The edit view file of provider module of RanZhi.
 *
 * @copyright   Copyright 2009-2018 青岛易软天创网络科技有限公司(QingDao Nature Easy Soft Network Technology Co,LTD, www.cnezsoft.com)
 * @license     ZPL (http://zpl.pub/page/zplv12.html)
 * @author      Gang Liu <liugang@cnezsoft.com>
 * @package     provider
 * @version     $Id$
 * @link        http://www.ranzhi.org
 */
?>
<?php include '../../../sys/common/view/header.lite.html.php';?>
<?php include '../../common/view/kindeditor.html.php';?>
<?php include '../../common/view/chosen.html.php';?>
<div class='panel xuanxuan-card'>
  <div class='panel-heading'>
    <strong><i class="icon-edit"></i> <?php echo $lang->provider->edit;?></strong>
  </div>
  <div class='panel-body'>
    <form method='post' id='ajaxForm' class='form'>
      <table class='table table-form'>
        <tr>
          <th class='w-80px'><?php echo $lang->provider->name;?></th>
          <td><?php echo html::input('name', $provider->name, "class='form-control'");?></td>
        </tr>
        <tr>
          <th><?php echo $lang->provider->category;?></th>
          <td><?php echo html::select('category', $categories, $provider->category, "class='form-control chosen'");?></td>
        </tr>
        <tr>
          <th><?php echo $lang->provider->relation;?></th>
          <td><?php echo html::select('relation', $lang->provider->relationList, $provider->relation, "class='form-control'");?></td>
        </tr>
        <tr>
          <th><?php echo $lang->provider->type;?></th>
          <td><?php echo html::select("type", $lang->provider->typeList, $provider->type, "class='form-control'");?></td>
        </tr>
        <tr>
          <th><?php echo $lang->provider->size;?></th>
          <td><?php echo html::select('size', $lang->provider->sizeList, $provider->size, "class='form-control'");?></td>
        </tr>
        <tr>
          <th><?php echo $lang->provider->industry;?></th>
          <td><?php echo html::select('industry', $industries, $provider->industry, "class='form-control chosen'");?></td>
        </tr>
        <tr>
          <th><?php echo $lang->provider->area;?></th>
          <td><?php echo html::select('area', $areas,  $provider->area, "class='form-control chosen'");?></td>
        </tr>
        <tr>
          <th><?php echo $lang->provider->weibo;?></th>
          <td><?php echo html::input('weibo', $provider->weibo ? $provider->weibo : 'http://weibo.com/', "class='form-control'");?></td>
        </tr>
        <tr>
          <th><?php echo $lang->provider->weixin;?></th>
          <td><?php echo html::input('weixin', $provider->weixin, "class='form-control'");?></td>
        </tr>
        <tr>
          <th><?php echo $lang->provider->site;?></th>
          <td><?php echo html::input('site', $provider->site ? $provider->site : 'http://', "class='form-control'");?></td>
        </tr>
        <tr>
          <th><?php echo $lang->provider->desc;?></th>
          <td><?php echo html::textarea('desc', $provider->desc, "rows='2' class='form-control'");?></td>
        </tr>
        <tr>
          <th></th>
          <td><?php echo html::submitButton() . '&nbsp;&nbsp;' . html::backButton();?></td>
        </tr>
      </table>
    </form>
  </div>
</div>
<?php include '../../common/view/footer.html.php';?>
