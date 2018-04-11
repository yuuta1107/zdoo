$(document).ready(function()
{
    $('.pager a').addClass('loadInModal');

    $('#ajaxModal').on('escaping.zui.modal, hide.zui.modal', function()
    {
        location.href = location.href;
    })
})
