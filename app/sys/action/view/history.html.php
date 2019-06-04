<?php
/**
 * The action view of common module of RanZhi.
 *
 * @copyright   Copyright 2009-2018 青岛易软天创网络科技有限公司(QingDao Nature Easy Soft Network Technology Co,LTD, www.cnezsoft.com)
 * @license     ZPL (http://zpl.pub/page/zplv12.html)
 * @author      Chunsheng Wang <chunsheng@cnezsoft.com>
 * @package     common
 * @version     $Id: chosen.html.php 7417 2013-12-23 07:51:50Z wwccss $
 * @link        http://www.ranzhi.org
 */
?>
<?php if($extView = $this->getExtViewFile(__FILE__)){include $extView; return helper::cd();}?>
<script src='<?php echo $config->webRoot;?>js/jquery/reverseorder/raw.js' type='text/javascript'></script>

<?php if(strpos(',order,contract,customer,provider,contact,leads,', ",{$objectType},") !== false && $datingList):?>
<div class='panel panel-block panel-nextContact'>
  <div class='panel-heading'><strong class='title'><?php echo $lang->action->nextDate;?></strong></div>
  <div class='panel-body'>
    <table class='table table-bordered'>
      <thead>
        <tr class='text-center'>
          <th class='w-100px'><?php echo $lang->action->record->nextDate;?></th>
          <?php if($objectType != 'contact' && $objectType != 'leads'):?>
          <th class='w-90px'><?php echo $lang->action->record->nextContact;?></th>
          <?php endif;?>
          <th class='w-80px'><?php echo $lang->action->record->contactedBy;?></th>
          <th><?php echo $lang->action->record->desc;?></th>
          <th class='w-80px'><?php echo $lang->action->record->status;?></th>
          <th class='w-80px'><?php echo $lang->action->record->createdBy;?></th>
          <th class='w-90px'><?php echo $lang->action->record->createdDate;?></th>
          <th class='w-100px'><?php echo $lang->actions;?></th>
        </tr>
      </thead>
      <?php $account = $this->app->user->account;?>
      <?php foreach($datingList as $dating):?>
      <tr class='text-center'>
        <td><?php echo formatTime($dating->date, DT_DATE1);?></td>
        <?php if($objectType != 'contact' && $objectType != 'leads'):?>
        <td><?php echo zget($contacts, $dating->contact, '');?></td>
        <?php endif;?>
        <td><?php echo zget($users, $dating->account);?></td>
        <td class='text-left' title='<?php echo $dating->desc;?>'><?php echo $dating->desc;?></td>
        <td><?php echo zget($lang->action->record->statusList, $dating->status);?></td>
        <td><?php echo zget($users, $dating->createdBy);?></td>
        <td><?php echo formatTime($dating->createdDate, DT_DATE1);?></td>
        <td>
          <?php
          if($dating->status == 'wait')
          {
              if($this->app->user->admin == 'super' or $dating->createdBy == $account or $dating->account == $account or commonModel::hasPriv('action', 'finishAllDating'))
              {
                  commonModel::printLink('action', 'finishDating', "id={$dating->id}", $lang->finish, "class='finishDating'");
              }
              else
              {
                  echo html::a('javascript:;', $lang->finish, "class='disabled'");
              }
              if($this->app->user->admin == 'super' or $dating->createdBy == $account or commonModel::hasPriv('action', 'deleteAllDating'))
              {
                  commonModel::printLink('action', 'deleteDating', "id={$dating->id}", $lang->delete, "class='deleter'");
              }
              else
              {
                  echo html::a('javascript:;', $lang->delete, "class='disabled'");
              }
          }
          ?>
        </td>
      </tr>
      <?php endforeach;?>
    </table>
  </div>
</div>
<?php endif;?>

<div class='panel panel-block histories'>
  <div class='panel-heading'>
    <strong class='title'><?php echo $lang->history?></strong>
    <button type='button' class='btn btn-mini only-icon btn-reverse' title='<?php echo $lang->reverse;?>'><i class='icon icon-arrow-up'></i></button>
    <button type='button' class='btn btn-mini only-icon btn-expand-all' title='<?php echo $lang->switchDisplay;?>'><i class='icon icon-plus'></i></button>
  </div>
  <div class='panel-body'>
    <ol class='histories-list'>
      <?php $i = 1; ?>
      <?php foreach($actions as $action):?>
      <?php $canEditComment = ($action->action != 'record' and end($actions) == $action and $action->comment and (strpos($this->server->request_uri, 'view') !== false) and $action->actor == $this->app->user->account);?>
      <li value='<?php echo $i ++;?>'>
      <?php
      if(isset($users[$action->actor])) $action->actor = $users[$action->actor];
      if($action->action == 'assigned' and isset($users[$action->extra]) ) $action->extra = $users[$action->extra];
      if(strpos($action->actor, ':') !== false) $action->actor = substr($action->actor, strpos($action->actor, ':') + 1);
      ?>
      <span>
        <?php $this->action->printAction($action);?>
        <?php if(!empty($action->history)):?>
        <button type='button' class='btn btn-mini switch-btn only-icon btn-expand' title='<?php echo $lang->switchDisplay;?>'><i class='change-show icon icon-plus icon-sm'></i></button>
        <?php endif;?>
      </span>
      <?php if(!empty($action->comment) or !empty($action->history)):?>
      <?php if(!empty($action->comment)) echo "<div class='history'>";?>
        <div class='history-changes'>
        <?php echo $this->action->printChanges($action->objectType, $action->history, $action->action);?>
        </div>
        <?php if($canEditComment):?>
        <?php echo html::a('#lastCommentBox', '<i class="icon icon-edit"></i>', "class='btn-edit-comment btn-edit-action'")?>
        <?php endif;?>
        <?php if($action->action == 'record'):?>
        <?php
        if(helper::isAjaxRequest())
        {
            $append = $from == 'record' ? "class='btn-edit-action loadInModal'" : "class='btn-edit-action'";
        }
        else
        {
            $append = $from == 'view' ?  "class='btn-edit-action' data-toggle='modal'" : "class='btn-edit-action'";
        }
        $editUrl =$this->createLink('action', 'editRecord', "id={$action->id}&from={$from}");
        echo html::a($editUrl, '<i class="icon icon-edit"></i>', $append)
        ?>
        <?php endif;?>
        <?php
        if($action->comment)
        {
            echo "<div class='comment comment$action->id'>";
            echo strip_tags($action->comment) == $action->comment ? nl2br($action->comment) : $action->comment;
            echo "</div>";
        }
        ?>
        <?php if($canEditComment):?>
        <form class='comment-edit-form' method='post' id='ajaxForm' action='<?php echo $this->createLink('action', 'editComment', "actionID=$action->id")?>'>
          <div class='form-group'><?php echo html::textarea('lastComment', $action->comment);?></div>
          <div class='form-actions no-margin'>
            <?php echo html::submitButton() . html::commonButton($lang->goback, 'btn btn-hide-form');?>
          </div>
        </form>
        <?php endif;?>
        <?php if(!empty($action->files)):?>
        <p class='files'>
          <span><strong><?php echo $lang->action->record->uploadFile;?></strong></span>
          <?php foreach($action->files as $file) echo "<span style='margin-right:5px'>" . html::a(helper::createLink('file', 'download', "fileID=$file->id&mouse=left"), $file->title, "target='_blank'") . '</span>';?>
        </p>
        <?php endif;?>
        <?php if(!empty($action->comment)) echo "</div>";?>
        <?php endif;?>
      </li>
      <?php endforeach;?>
    </ol>
  </div>
</div>
<?php js::execute($pageJS);?>
