$(document).ready(function()
{
    $('.finishDating').click(function()
    {
        var url = $(this).attr('href');
        bootbox.confirm(v.lang.confirmFinish, function(result)
        {
            if(result)
            {
                $.getJSON(url, function(response)
                {
                    location.reload();
                });
            }
        });
        return false;
    });

    $('.pager').find('a').click(function()
    {
        $('#actionBox').load($(this).attr('href'));
        return false;
    });
});
