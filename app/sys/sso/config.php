<?php
$config->filterParam->get['sso']['check']['callback']['reg'] = '/^[a-zA-Z0-9\%\.]+$/';
$config->filterParam->get['sso']['check']['referer']['reg']  = '/^[a-zA-Z0-9\+\/\=]+$/';
$config->filterParam->get['sso']['check']['token']['reg']    = '/^[a-z0-9]{32}$/';
$config->filterParam->get['sso']['check']['auth']['reg']     = '/^[a-z0-9]{32}$/';
$config->filterParam->get['sso']['check']['userIP']['ip']    = '';
