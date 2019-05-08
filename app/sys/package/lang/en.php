<?php
/**
 * The package module en file of RanZhi.
 *
 * @copyright   Copyright 2009-2018 青岛易软天创网络科技有限公司(QingDao Nature Easy Soft Network Technology Co,LTD, www.cnezsoft.com)
 * @license     ZPL (http://zpl.pub/page/zplv12.html)
 * @author      Chunsheng Wang <chunsheng@cnezsoft.com>
 * @package     package
 * @version     $Id$
 * @link        http://www.zdoo.org
 */
$lang->package->common        = 'Packages';
$lang->package->browse        = 'View';
$lang->package->install       = 'Install';
$lang->package->installAuto   = 'Auto Install';
$lang->package->installForce  = 'Force Install';
$lang->package->uninstall     = 'Uninstall';
$lang->package->activate      = 'Activate';
$lang->package->deactivate    = 'Deactivate';
$lang->package->obtain        = 'Extension';
$lang->package->view          = 'Info';
$lang->package->download      = 'Download';
$lang->package->downloadAB    = 'Down';
$lang->package->upload        = 'Upload to install';
$lang->package->erase         = 'Erase';
$lang->package->upgrade       = 'Upgrade Package';
$lang->package->agreeLicense  = 'I agree to the license';
$lang->package->settemplate   = 'Templates';
$lang->package->search        = 'Search';

$lang->package->structure   = 'Structure';
$lang->package->installed   = 'Installed';
$lang->package->deactivated = 'Deactivated';
$lang->package->available   = 'Downloaded';

$lang->package->id          = 'ID';
$lang->package->name        = 'Name';
$lang->package->code        = 'Alias';
$lang->package->version     = 'Version';
$lang->package->compatible  = 'Compatible';
$lang->package->latest      = '<small>Latest:<strong><a href="%s" target="_blank" class="package">%s</a></strong>，requires Zdoo <a href="http://api.zdoo.org/goto.php?item=latest" target="_blank"><strong>%s</strong></small>';
$lang->package->author      = 'Author';
$lang->package->license     = 'License';
$lang->package->intro       = 'Description';
$lang->package->abstract    = 'Abstract';
$lang->package->site        = 'Site';
$lang->package->addedTime   = 'Added';
$lang->package->updatedTime = 'Updated';
$lang->package->downloads   = 'Download';
$lang->package->public      = 'Public';
$lang->package->compatible  = 'Compatible';
$lang->package->grade       = 'Grade';
$lang->package->depends     = 'Dependent';

$lang->package->publicList[0] = 'Manually';
$lang->package->publicList[1] = 'Auto';

$lang->package->compatibleList[0] = 'Unknow';
$lang->package->compatibleList[1] = 'Compatible';

$lang->package->byDownloads   = 'Download';
$lang->package->byAddedTime   = 'Just added';
$lang->package->byUpdatedTime = 'Last updated';
$lang->package->bySearch      = 'Search';
$lang->package->byCategory    = 'By Category';

$lang->package->installFailed            = '%s failed. The reason is:';
$lang->package->uninstallFailed          = 'Uninstallation failed. The reason is:';
$lang->package->confirmUninstall         = 'Uninstallation will delete or modify the database. Do you want to uninstall?';
$lang->package->noticeBackupDB           = 'Before uninstalling, we recommend that you back up the database.';
$lang->package->installFinished          = 'OK, the package has been %sed.';
$lang->package->refreshPage              = 'Refresh';
$lang->package->uninstallFinished        = 'Package has been uninstalled.';
$lang->package->deactivateFinished       = 'Package has been deactivated.';
$lang->package->activateFinished         = 'Package has been activated.';
$lang->package->eraseFinished            = 'Package has been erased.';
$lang->package->unremovedFiles           = 'Some files cannot be removed. Please remove them manually';
$lang->package->executeCommands          = '<h3>Run the following commands to fix them:</h3>';
$lang->package->successDownloadedPackage = 'Downloaded the package file.';
$lang->package->successUploadedPackage   = 'Uploaded the package file.';
$lang->package->successCopiedFiles       = 'Files are copied. ';
$lang->package->successInstallDB         = 'Installed database.';
$lang->package->viewInstalled            = 'View installed packages.';
$lang->package->viewAvailable            = 'View available packages';
$lang->package->viewDeactivated          = 'View deactivated packages';
$lang->package->backDBFile               = 'Extesnsion data is backed up to %s!';

$lang->package->upgradeExt     = 'Upgrade';
$lang->package->installExt     = 'Install';
$lang->package->upgradeVersion = '(Upgrade from %s to %s)';

$lang->package->waring = 'Waring';

$lang->package->errorOccurs                  = 'Error:';
$lang->package->errorGetModules              = "Failed to get package category data from the www.zdoo.org. ";
$lang->package->errorGetPackages             = 'Failed to get packages from www.zdoo.org. You can visit <a href="http://www.zdoo.org/extension/" target="_blank">www.zdoo.org</a> to find your packages, download it manually and then upload to Zdoo to install it.';
$lang->package->errorDownloadPathNotFound    = 'The path of the package file <strong>%s</strong>does not exist.<br />For linux users, execute <strong>mkdir -p %s</strong> to fix it.';
$lang->package->errorDownloadPathNotWritable = 'The path of the package file <strong>%s</strong>is not writable.<br />For linux users, execute <strong>sudo chmod 777 %s</strong> to fix it.';
$lang->package->errorPackageFileExists       = 'There is a file with the same name <strong>%s</strong>.<h3> If you want to %s again, <a href="%s" class="alert-link loadInModal">click this link</a>.</h3>';
$lang->package->errorDownloadFailed          = 'Download failed. Please try again. Or you can download it manually and upload it to install.';
$lang->package->errorMd5Checking             = 'Failed to check the download files. Please download it manually and upload it to install';
$lang->package->errorExtracted               = 'Failed to get the package file <strong> %s </strong>. The error is:<br />%s';
$lang->package->errorCheckIncompatible       = 'This extenion is not compatible with current Zdoo version. <h3>You can <a href="%s" class="loadInModal">Force %s</a> or <a href="#" onclick=parent.location.href="%s">Cancel</a></h3>.';
$lang->package->errorFileConflicted          = 'There are some files conflicted: <br />%s <h3>You can <a href="%s" class="loadInModal">Overide them</a> or <a href="#" onclick=parent.location.href="%s">Cancel</a></h3>.';
$lang->package->errorPackageNotFound         = 'The package file <strong>%s </strong> cannot be found. It might be download failure. Try again.';
$lang->package->errorTargetPathNotWritable   = 'Target path <strong>%s </strong>is not writable.';
$lang->package->errorTargetPathNotExists     = 'Target path <strong>%s </strong> does not exists.';
$lang->package->errorInstallDB               = 'Failed to run the database SQL. The error is: %s';
$lang->package->errorConflicts               = 'Conflict with "%s"!';
$lang->package->errorDepends                 = 'The following extension depends on this one is not installed or the version is incorrect:<br /><br /> %s';
$lang->package->errorIncompatible            = 'The extension with your Zdoo is incompatible.';
$lang->package->errorUninstallDepends        = '"%s" is dependent on this extension which cannot be uninstalled.';
