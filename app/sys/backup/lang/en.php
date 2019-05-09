<?php
$lang->backup->common      = 'Backup';
$lang->backup->index       = 'Home';
$lang->backup->history     = 'History';
$lang->backup->delete      = 'Delete';
$lang->backup->backup      = 'Backup';
$lang->backup->restore     = 'Restore';
$lang->backup->setSaveDays = 'Set on-hold days';

$lang->backup->name     = 'Name';
$lang->backup->time     = 'Time';
$lang->backup->files    = 'Files';
$lang->backup->size     = 'Size';
$lang->backup->saveDays = 'On-Hold days';

$lang->backup->waitting       = 'Restoring...';
$lang->backup->confirmDelete  = 'Do you want to delete this backup?';
$lang->backup->confirmRestore = 'Do you want to restore this backup?';
$lang->backup->deleteInfo     = 'Delete backup before %s days';

$lang->backup->success = new stdclass();
$lang->backup->success->backup  = 'Backup!';
$lang->backup->success->restore = 'Restore!';

$lang->backup->error = new stdclass();
$lang->backup->error->noWritable  = "Failed to backup! <code>%s</code> cannot be written! Please check the directory permissions.";
$lang->backup->error->noDelete    = "The file %s cannot be deleted. Change its privilege or delete it manually.";
$lang->backup->error->restoreSQL  = "The database restoration failed. Error: %s";
$lang->backup->error->restoreFile = "Failed to restore files. Error: %s";
$lang->backup->error->backupFile  = "Failed to back up files. Error: %s";
$lang->backup->error->setSaveDays = "Backup should be saved more than 0 days";
