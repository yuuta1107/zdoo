<?php
/**
 * The project block view file of block module of RanZhi.
 *
 * @copyright   Copyright 2009-2018 青岛易软天创网络科技有限公司(QingDao Nature Easy Soft Network Technology Co,LTD, www.cnezsoft.com)
 * @license     ZPL (http://zpl.pub/page/zplv12.html)
 * @author      Yidong Wang <yidong@cnezsoft.com>
 * @package     block
 * @version     $Id$
 * @link        http://www.ranzhi.org
 */
?>
<div class='panel-body has-table'>
  <table class='table table-borderless table-fixed table-fixed-head table-hover tablesorter block-project'>
    <thead>
      <tr>
        <th class='text-left'><?php echo $lang->project->name;?></th>
        <th class='text-center w-60px' title="<?php echo $lang->project->note->task;?>"><?php echo $lang->block->doneTask;?></th>
        <th class='text-center w-60px' title="<?php echo $lang->project->note->task;?>"><?php echo $lang->block->waitTask;?></th>
        <th class='text-center w-100px' title="<?php echo $lang->project->note->rate;?>"><?php echo $lang->block->rate;?></th>
      </tr>
    </thead>
    <tbody>
      <?php foreach($projects as $id => $project):?>
      <?php $appid = ($this->get->app == 'sys' and isset($_GET['entry'])) ? "class='app-btn text-center' data-id={$this->get->entry}" : "class='text-center'"?>
      <tr data-url='<?php echo $this->createLink('proj.task', 'browse', "projectID=$id"); ?>' <?php echo $appid?>>
        <td class='text-left' title='<?php echo $project->name;?>'><?php echo $project->name;?></td>
        <td><?php echo $project->done;?></td>
        <td><?php echo $project->wait + $project->doing;?></td>
        <td>
          <div class='progress' title="<?php echo $project->rate?>">
            <div style="width: <?php echo $project->rate;?>" aria-valuemax='100' aria-valuemin='0' aria-valuenow="<?php echo $project->rate?>" role='progressbar' class='progress-bar progress-bar-success'></div>
          </div>
        </td>
      </tr>
      <?php endforeach;?>
    </tbody>
  </table>
</div>
