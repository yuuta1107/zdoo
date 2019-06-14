<style>
.block-dynamic .timeline > li .timeline-text {display: block; overflow: hidden; text-overflow: ellipsis; max-height: 20px; display: -webkit-box; -webkit-line-clamp: 1; -webkit-box-orient: vertical; }
.block-dynamic .panel-body {padding-top: 0;}
</style>
<div class='panel-body scrollbar-hover'>
  <ul class="timeline timeline-tag-left no-margin">
    <?php
    foreach($actions as $action)
    {
        $user = isset($users[$action->actor]) ? $users[$action->actor] : $action->actor;
        if($action->action == 'login' or $action->action == 'logout') $action->objectName = $action->objectLabel = '';
        $active = $action->major ? 'active' : '';
        $attr = (empty($action->toggle) and $action->appName != 'sys') ? "class='app-btn {$active}' data-id='{$action->appName}' data-url='{$action->objectLink}'" : ($active ? "class='active'" : '');
        echo "<li $attr>";
        echo '<div>';
        printf($lang->block->dynamicInfo, $action->date, $user, $action->actionLabel, $action->objectLabel, $action->objectLink, $action->objectName, $action->toggle, $action->objectName);
        echo "</div></li>";
    }
    ?>
  </ul>
</div>
