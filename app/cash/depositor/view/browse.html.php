<?php 
/**
 * The browse view file of depositor module of RanZhi.
 *
 * @copyright   Copyright 2009-2018 青岛易软天创网络科技有限公司(QingDao Nature Easy Soft Network Technology Co,LTD, www.cnezsoft.com)
 * @license     ZPL (http://zpl.pub/page/zplv12.html)
 * @author      Tingting Dai <daitingting@xirangit.com>
 * @package     depositor 
 * @version     $Id$
 * @link        http://www.ranzhi.org
 */
?>
<?php include '../../common/view/header.html.php';?>
<div class='panel'>
  <div class='panel-heading'>
    <strong><i class="icon-group"></i> <?php echo $lang->depositor->browse;?></strong>
    <?php echo html::a(inlink('browse', "tag=&status=normal"), $lang->depositor->normalBrowse, $status == 'normal' ? "class='active'" : '');?>
    <?php foreach($tags as $tag):?>
    <?php echo html::a(inlink('browse', "tag=$tag&status=all"), $tag, $currentTag == $tag ? "class='active'" : '');?>
    <?php endforeach;?>
    <?php echo html::a(inlink('browse', "tag=&status=disable"), $lang->depositor->disabledBrowse, $status == 'disable' ? "class='active'" : '');?>
    <div class='panel-actions pull-right'>
      <?php commonModel::printLink('depositor', 'export', '', $lang->exportIcon . $lang->export, "class='iframe btn btn-primary' data-width='700'");?></li>
      <?php commonModel::printLink('depositor', 'create', '', "<i class='icon-plus'></i> {$lang->depositor->create}", "class='btn btn-primary' data-toggle='modal'")?>
    </div>
    <?php 
    if($app->user->admin == 'super' or isset($app->user->rights['balance']['browse']))
    {
        $savedHtml = '';
        foreach($balances as $currency => $balanceList)
        {
            $sum = 0;
            foreach($balanceList as $balance) 
            {
                if(!isset($depositors[$balance->depositor])) continue;
                $depositor = $depositors[$balance->depositor];
                if($depositor->status != 'normal') continue;
                $sum += $balance->money;
            }
            if($sum) $savedHtml .= " <strong title='$sum'>" . $currencyList[$currency] . $lang->colon . commonModel::tidyMoney($sum) . '</strong>';
        }
        $totalMoney = array();
        foreach($depositors as $depositor)
        {
            if(empty($depositor->computed)) continue;

            if(isset($totalMoney[$depositor->currency]))
            {
                $totalMoney[$depositor->currency] += $depositor->computed;
            }
            else
            {
                $totalMoney[$depositor->currency] = $depositor->computed;
            }
        }
        $computedHtml = '';
        foreach($totalMoney as $currency => $total)
        {
            if($total) $computedHtml .= " <strong title='$total'>" . $currencyList[$currency] . $lang->colon . commonModel::tidyMoney($total) . '</strong>';
        }
        if($savedHtml)
        {
            $savedHtml = "<div class='text-success'>{$lang->depositor->saveBalance}{$savedHtml}</div>";
        }
        if($computedHtml)
        {
            $computedHtml = "<div class='text-danger'>{$lang->depositor->computedValue}{$computedHtml}</div>";
        }
        if($savedHtml or $computedHtml)
        {
            echo "<div class='pull-right balance'>$savedHtml$computedHtml</div>";
        }
    }    
    ?>
  </div>
  <div class='panel-body'>
    <div class="cards">
      <?php foreach($depositors as $depositor):?>
      <div class='col-md-4 col-sm-6'>
        <div class='card card-depositor'>
          <div class='card-heading <?php echo $depositor->type;?>'>
            <div class='info'><span class='label' title='<?php echo $lang->depositor->type?>'><i class='icon'></i> <?php echo $lang->depositor->typeList[$depositor->type]?></span></div>
            <h4 class='title'><?php echo $depositor->abbr;?></h4>
            <div class='subtitle'>
              <?php if($depositor->type != 'cash' && !empty($depositor->title) && $depositor->title != $depositor->abbr):?>
              <span class='cell text-muted' title='<?php echo $lang->depositor->title;?>'><?php echo $depositor->title;?></span>
              <?php endif;?>
            </div>
          </div>
          <div class='card-caption row' data-id="<?php echo $depositor->id;?>">
            <?php if($depositor->type != 'cash'):?>
            <?php if($depositor->type == 'bank') echo "<dl class='dl-horizontal'><dt>{$lang->depositor->bankProvider} {$lang->colon} </dt><dd>$depositor->provider </dd></dl>";?>
            <?php if($depositor->type == 'online') echo "<dl class='dl-horizontal'><dt>{$lang->depositor->serviceProvider} {$lang->colon} </dt><dd>{$lang->depositor->providerList[$depositor->provider]} </dd></dl>";?>
            <?php echo "<dl class='dl-horizontal'><dt>{$lang->depositor->account} {$lang->colon} </dt><dd>$depositor->account</dd></dl>";?>
            <?php if($depositor->type == 'bank') echo "<dl class='dl-horizontal'><dt>{$lang->depositor->bankcode} {$lang->colon} </dt><dd>$depositor->bankcode</dd></dl>";?>
            <?php endif;?>
            <?php if(($app->user->admin == 'super' or isset($app->user->rights['balance']['browse'])) and isset($balances[$depositor->currency][$depositor->id])):?>
            <?php $balances[$depositor->currency][$depositor->id]->money = 8000;?>
            <?php $depositor->computed                                   = 8000;?>
            <?php if($balances[$depositor->currency][$depositor->id]->money == 0):?>
            <?php $savedBalance = $balances[$depositor->currency][$depositor->id]->money;?>
            <?php else:?>
            <?php $savedBalance = formatMoney($balances[$depositor->currency][$depositor->id]->money);?>
            <?php endif;?>
            <?php if($depositor->computed == 0):?>
            <?php $computedBalance = $depositor->computed;?>
            <?php else:?>
            <?php $computedBalance = formatMoney($depositor->computed);?>
            <?php endif;?>
            <?php $lenA  = strlen(strval($savedBalance))    - substr_count(strval($savedBalance), ',')    + (strpos(strval($savedBalance), '.')    === false ? 1 : 0);?>
            <?php $lenB  = strlen(strval($computedBalance)) - substr_count(strval($computedBalance), ',') + (strpos(strval($computedBalance), '.') === false ? 1 : 0);?>
            <?php $width = ($lenA > $lenB ? 10 * $lenA : 10 * $lenB) + 20;?>
            <dl class='dl-horizontal'>
              <dt class='balance-label'><?php echo $lang->depositor->saveBalance . $lang->colon;?></dt>
              <dd class='balance-value text-success text-right' style='width: <?php echo $width;?>px'>
                <?php echo zget($lang->currencySymbols, $depositor->currency);?>
                <?php echo $savedBalance;?>
              </dd>
            </dl>
            <dl class='dl-horizontal'>
              <dt class='balance-label'><?php echo $lang->depositor->computedValue . $lang->colon;?></dt>
              <dd class='balance-value text-danger text-right' style='width: <?php echo $width;?>px'>
                <?php echo zget($lang->currencySymbols, $depositor->currency);?>
                <?php echo $computedBalance;?>
              </dd>
            </dl>
            <?php endif;?>
          </div>
          <div class='card-actions'>
            <div class='pull-right'>
              <?php commonModel::printLink('depositor', 'edit', "depositorID=$depositor->id", $lang->edit, "data-toggle='modal'");?>
              <?php commonModel::printLink('depositor', 'check', "depositorID=$depositor->id", $lang->depositor->check);?>
              <?php if($depositor->status == 'normal') commonModel::printLink('depositor', 'forbid', "depositorID=$depositor->id", $lang->depositor->forbid, "data-toggle=modal");?>
              <?php if($depositor->status == 'disable') commonModel::printLink('depositor', 'activate', "depositorID=$depositor->id", $lang->depositor->activate, "data-toggle=modal");?>
              <?php commonModel::printLink('balance', 'browse', "depositorID=$depositor->id", $lang->depositor->balance, "data-toggle='modal'");?>
              <?php if(empty($trades[$depositor->id])) commonModel::printLink('depositor', 'delete', "depositorID=$depositor->id", $lang->delete, "class='deleter'");?>
            </div>
            <?php echo "<span class='text-" . ($depositor->status == 'normal' ? 'success': 'danger') . "'>{$lang->depositor->statusList[$depositor->status]}</span>";?>
          </div>
        </div>
      </div>
      <?php endforeach;?>
    </div>
      <?php $pager->show();?>
  </div>
</div>
<?php include '../../common/view/footer.html.php';?>
