<?php
/**
 * The index view file of index module of RanZhi.
 *
 * @copyright   Copyright 2009-2018 青岛易软天创网络科技有限公司(QingDao Nature Easy Soft Network Technology Co,LTD, www.cnezsoft.com)
 * @license     ZPL (http://zpl.pub/page/zplv12.html)
 * @author      Yidong Wang <yidong@cnezsoft.com>
 * @package     index
 * @version     $Id: index.html.php 4205 2016-10-24 08:19:13Z liugang $
 * @link        http://www.ranzhi.org
 */
include "../../common/view/header.lite.html.php";
js::import($jsRoot . 'jquery/ips.js');
$isSuperAdmin = $this->app->user->admin == 'super';
js::set('attend', commonModel::isAvailable('attend') ? 1 : 0);
?>
<!-- Desktop -->
<div id='desktop' class='fullscreen-mode'>
  <div id='topBar' class='dock-top unselectable'>
  <div id='topLeftBar' class='dock-left'>
    <ul class='bar-menu'>
      <li><button type='button' data-toggle='tooltip' data-placement='bottom' title='Expand/Collapse' class='btn-toggle-taskbar' id='toggleTaskBarBtn'><i class="icon icon-dashboard"></i><i class="icon icon-angle-right"></i></button></li>
    </ul>
  </div>
    <div id='taskbar'><ul class='bar-menu'></ul></div>
    <div id='topRightBar' class='dock-right'>
      <ul class='bar-menu'>
        <?php echo isset($signButtons) ? $signButtons : ''?>
        <li><button id='showNotifications' type='button' class='fullscreen-btn icon-bell' data-toggle='tooltip' data-placement='bottom' title='Notifications'></button></li>
        <li><button id='showSearch' type='button' class='fullscreen-btn icon-search' data-toggle='tooltip' data-placement='bottom' title='search'></button></li>
      </ul>
    </div>
  </div>
  <div id='leftBar' class='dock-left unselectable'>
    <div id='appsMenu'>
      <ul class='bar-menu apps-menu apps-main-menu'></ul>
      <ul class='bar-menu'>
        <li>
          <button id='moreOptionBtn' data-toggle='tooltip' data-tip-class='s-menu-tooltip' data-placement='right' data-btn-type='menu' class='btn-more' title='<?php echo $lang->index->more;?>'><i class='icon icon-ellipsis-h'></i><span class='text'><?php echo $lang->index->more;?></span></button>
          <ul id='moreOptionMenu' class='bar-menu dropdown-menu fade'>
          </ul>
        </li>
      </ul>
    </div>
    <div id='leftBottomBar' class='dock-bottom'>
      <ul class='bar-menu apps-menu apps-extra-menu'>
      </ul>
      <ul class='bar-menu'>
        <li class='dropdown dropdown-hover'>
          <button id='start' type='button' title="<?php echo $app->user->realname;?>" data-toggle='dropdown'>
            <div class='avatar avatar-md avatar-circle'><?php if(!empty($app->user->avatar)) echo html::image($app->user->avatar);?></div>
            <span class='text'><?php echo $app->user->realname;?></span>
          </button>
          <ul id='startMenu' class='dropdown-menu fade'>
            <li class='with-avatar'><?php echo html::a($this->createLink('user', 'profile'), "<div class='avatar avatar-md avatar-circle'>" . (empty($app->user->avatar) ? '' : html::image($app->user->avatar)) . "</div><strong>{$app->user->realname}</strong>", "data-toggle='modal' data-id='profile'");?></li>
            <li class="divider"></li>
            <li class='dropdown-submenu'><?php include '../../common/view/selectlang.html.php';?></li>
            <li class='dropdown-submenu'><?php include '../../common/view/selecttheme.html.php';?></li>
            <li><a href='<?php echo $this->createLink('misc', 'about');?>' data-id='about' data-toggle='modal' data-width='500'><i class='icon icon-info-sign'></i> <?php echo $lang->index->about?></a></li>
            <li class="divider"></li>
            <?php if($isSuperAdmin):?>
            <li><?php echo html::a($this->createLink('entry', 'create'), "<i class='icon icon-plus'></i> {$lang->index->addEntry}", "data-id='superadmin' class='app-btn'"  )?></li>
            <?php endif;?>
            <li><a href='javascript:;' class='fullscreen-btn' data-id='allapps'><i class='icon icon-th-large'></i> <?php echo $lang->index->allEntries?></a></li>
            <li class="divider"></li>
            <li><?php echo html::a($this->createLink('user', 'logout'), "<i class='icon icon-signout'></i> {$lang->logout}")?></li>
          </ul>
        </li>
        <li><button type='button' data-toggle='tooltip' data-placement='right' title='Expand/Collapse' class='btn-toggle-leftbar' id='toggleLeftBarBtn'><i class="icon icon-double-angle-right"></i></button></li>
      </ul>
    </div>
  </div>
  <div id='allapps' class='fullscreen unselectable'>
    <header>
      <ul class='nav' id='appSearchNav'>
        <li><a href="javascript:;" class='app-search' data-key=''><i class='icon-th-large'></i> <span><?php echo $lang->index->allEntries?></span> &nbsp;<small class='muted entries-count'></small></a></li>
        <li><a href="javascript:;" class='app-search' data-key=':menu'><i class=''></i> <span><?php echo $lang->index->showOnLeft?></span> &nbsp;<small class='muted search-count'></small></a></li>
        <li><a href="javascript:;" class='app-search' data-key=':!menu'><i class=''></i> <span><?php echo $lang->index->notOnLeft?></span> &nbsp;<small class='muted search-count'></small></a></li>
      </ul>
      <div class='search-input'>
        <i class='icon-search icon'></i>
        <input id='search' type='text' class='form-control-pure form-control'>
        <button id='cancelSearch' class='btn btn-pure btn-mini' type='button'><i class='icon-remove'></i></button>
      </div>
      <div class='actions'>
        <?php if($isSuperAdmin):?>
        <?php echo html::a($this->createLink('entry', 'create'), "<i class='icon-plus'></i> {$lang->index->addEntry}", "data-id='superadmin' class='app-btn btn btn-pure'")?>
        <?php endif;?>
      </div>
    </header>
    <div class='all-apps-list' id='allAppsList'>
      <ul class='bar-menu'>
      </ul>
    </div>
  </div>
  <div id='deskContainer'></div>
  <div id='modalContainer'></div>
</div>
<div id='noticeBox'>
  <?php echo $notice;?>
</div>
<script>
<?php $dashboardMenu = (isset($dashboard) and isset($dashboard->visible) and $dashboard->visible == 0) ? 'list' : 'all';?>
var entries = [
{
    id        : 'dashboard',
    code      : 'dashboard',
    name      : '<?php echo $lang->index->dashboard;?>',
    abbr      : '<?php echo $lang->index->dashboardAbbr;?>',
    open      : 'iframe',
    desc      : '<?php echo $lang->index->dashboard?>',
    menu      : '<?php echo $dashboardMenu;?>',
    sys       : true,
    icon      : 'icon-home',
    url       : '<?php echo $this->createLink('my', 'index')?>',
    order     : 0,
},
{
    id        : 'allapps',
    code      : 'allapps',
    name      : '<?php echo $lang->index->allEntries?>',
    display   : 'fullscreen',
    desc      : '<?php echo $lang->index->allEntries?>',
    menu      : 'menu-extra',
    icon      : 'icon-th-large',
    sys       : true,
    forceMenu : true,
    order     : 9999997
}];

<?php if($isSuperAdmin || commonModel::hasAppPriv('superadmin')):?>

entries.push(
{
    id    : 'superadmin',
    code  : 'superadmin',
    name  : '<?php echo $lang->index->superAdmin;?>',
    open  : 'iframe',
    desc  : '<?php echo $lang->index->superAdmin?>',
    menu  : 'menu-extra',
    sys   : true,
    icon  : 'icon-cog',
    url   : "<?php echo $this->createLink('admin')?>",
    order : 9999998
});
<?php endif;?>

var ipsLang = {};
<?php
foreach ($lang->index->ips as $key => $value)
{
    echo 'ipsLang["' . $key . '"] = "' . $value . '";';
}
?>

<?php echo $allEntries;?>
</script>
<?php include "../../common/view/footer.html.php"; ?>
