<?php
$filter = new stdclass();
$filter->rules   = new stdclass();
$filter->default = new stdclass(); 
$filter->trade   = new stdclass();
$filter->entry   = new stdclass();
$filter->file    = new stdclass();
$filter->sso     = new stdclass();
$filter->upgrade = new stdclass();
$filter->user    = new stdclass();
$filter->rss     = new stdclass();
$filter->doc     = new stdclass();
$filter->project = new stdclass();
$filter->my      = new stdclass();
$filter->todo    = new stdclass();
$filter->webapp  = new stdclass();
$filter->reply   = new stdclass();
$filter->thread  = new stdclass();

$filter->rules->md5        = '/^[a-z0-9]{32}$/';
$filter->rules->base64     = '/^[a-zA-Z0-9\+\/\=]+$/';
$filter->rules->checked    = '/^[0-9,]+$/';
$filter->rules->idList     = '/^[0-9\|]+$/';
$filter->rules->lang       = '/^[a-zA-Z_\-]+$/';
$filter->rules->any        = '/./';
$filter->rules->number     = '/^[0-9]+$/';
$filter->rules->orderBy    = '/^\w+_(desc|asc)$/i';
$filter->rules->word       = '/^\w+$/';
$filter->rules->paramName  = '/^[a-zA-Z0-9_\.]+$/';
$filter->rules->paramValue = '/^[a-zA-Z0-9=_\-]+$/';
$filter->rules->common     = '/^[a-zA-Z0-9_]+$/';
$filter->rules->character  = '/^[a-zA-Z_\-]+$/';
$filter->rules->browseType = '/^by[a-z]+$/';
$filter->rules->key        = '/^[a-z0-9]{32}+$/';
$filter->rules->path       = '/(^//.|^/|^[a-zA-Z])?:?/.+(/$)?/';
$filter->rules->callback   = '/^[a-zA-Z0-9\%\.]+$/';

$filter->default->moduleName = 'code';
$filter->default->methodName = 'code';
$filter->default->paramName  = 'reg::paramName';
$filter->default->paramValue = 'reg::paramValue';

$filter->default->get['onlybody'] = 'equal::yes';
$filter->default->get['HTTP_X_REQUESTED_WITH'] = 'equal::XMLHttpRequest';

$filter->entry->get['visit']['referer']           = 'reg::base64';
$filter->entry->get['depts']['key']               = 'reg::key';
$filter->entry->get['users']['key']               = 'reg::key';
$filter->file->get['ajaxueditorupload']['action'] = 'equal::config';
$filter->file->get['filemanager']['path']         = 'reg::path';
$filter->file->get['filemanager']['order']        = 'reg::common';

$filter->sso->get['check']['callback']            = 'reg::callback';
$filter->sso->get['check']['referer']             = 'reg::base64';
$filter->sso->get['check']['token']               = 'reg::key';
$filter->sso->get['check']['auth']                = 'reg::key';
$filter->sso->get['check']['userIP']              = 'ip';
$filter->upgrade->get['upgradelicense']['agree']  = 'equal::true';
$filter->user->get['login']['lang']               = 'reg::lang';
$filter->rss->get['index']['type']                = 'reg::common';

$filter->default->cookie['lang']      = 'reg::lang';
$filter->default->cookie['theme']     = 'reg::common';
$filter->default->cookie['device']    = 'reg::common';
$filter->default->cookie['ra']        = 'reg::common';
$filter->default->cookie['rp']        = 'reg::common';
$filter->default->cookie['keepLogin'] = 'equal::on';

$filter->trade->cookie['browse']['treeview']           = 'code';
$filter->doc->cookie['browse']['browseType']           = 'reg::browseType';
$filter->project->cookie['index']['taskListType']      = 'code';
$filter->file->cookie['download'][$config->sessionVar] = 'reg::common';
$filter->my->cookie['project']['taskListType']         = 'code';
$filter->todo->cookie['calendar']['todoCalendarSide']  = 'equal::hide';
$filter->webapp->cookie['obtain']['pagerWebappObtain'] = 'int';

$filter->project->default->cookie['lastProject'] = 'int';
$filter->project->default->cookie['projectMode'] = 'code';
$filter->reply->default->cookie['r']             = 'reg::checked';
$filter->thread->default->cookie['t']            = 'reg::checked';
