$(document).ready(function()
{
    $.setAjaxDeleter('.deleteCategory', function()
    {
        $.getJSON(createLink('entry', 'getJSONEntries'), function(entries)
        {
            $.refreshDesktop(entries, true);
        });
    });
})
