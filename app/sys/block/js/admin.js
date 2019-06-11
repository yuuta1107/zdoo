/**
 * Get all blocks.
 *
 * @param string entryID
 * @access public
 * @return void
 */
function getBlocks(entryID)
{
    entryID = entryID || $('#allEntries').val();
    var $blockList = $('#blockList').hide();

    $('#blockParam').empty();
    if(entryID == '') return false;

    if(entryID.indexOf('hiddenBlock') != -1)
    {
        getRssAndHtmlParams('html', entryID.replace('hiddenBlock', ''));
        return true;
    }
    if(entryID == 'rss' || entryID == 'html' || entryID == 'allEntries' || entryID == 'dynamic')
    {
        getRssAndHtmlParams(entryID);
        return true;
    }

    $.get(createLink('entry', 'blocks', 'entryID=' + entryID + '&index=' + v.index), function(data)
    {
        $blockList.html(data).show();
        $.zui.initPage($blockList);
        $.zui.ajustModalPosition();
    })
}

/**
 * Get rss and html params.
 *
 * @param  string $type
 * @param  int    $blockID
 * @access public
 * @return void
 */
function getRssAndHtmlParams(type, blockID)
{
    blockID = blockID === undefined ? 0 : blockID;
    $.get(createLink('block', 'set', 'index=' + v.index + '&type=' + type + '&blockID=' + blockID), function(data)
    {
        var $blockParam = $('#blockParam').html(data);
        $.setAjaxForm('#ajaxForm', function(){parent.location.href=config.webRoot + config.appName;});
        $.zui.initPage($blockParam);
        $.zui.ajustModalPosition();
    });
}

/**
 * Get block params.
 *
 * @param  string $blockID
 * @param  int    $entryID
 * @access public
 * @return void
 */
function getBlockParams(blockID, entryID)
{
    var $blockParam = $('#blockParam').empty();
    if(blockID == '') return false;

    $.get(createLink('entry', 'setBlock', 'index=' + v.index + '&entryID=' + entryID + '&blockID=' + blockID), function(data)
    {
        $blockParam.html(data);
        $.setAjaxForm('#ajaxForm', function(){parent.location.href=config.webRoot + config.appName;});
        $.zui.initPage($blockParam);
        $.zui.ajustModalPosition();
    });
}

$(function()
{
    $('#allEntries').on('change', function(){getBlocks()});
    getBlocks();

    $.setAjaxForm('#blockForm', reloadHome);

    $(document).on('click', '.dropdown-menu.buttons .btn', function()
    {
        var $this = $(this);
        var $group = $this.closest('.input-group-btn');
        $group.find('.dropdown-toggle').removeClass().addClass('btn dropdown-toggle btn-' + $this.data('id'));
        $group.find('input[name^="params[color]"]').val($this.data('id'));
    });
})
