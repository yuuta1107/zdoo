$(document).ready(function()
{    
    $('.side .leftmenu ul').find('a[href*=' + config.currentMethod + ']').parent().addClass('active');
    $('.btn-switch').click(function()
    {
        url = $(this).attr('href');

        $.getJSON(url, function(response)
        {
            if(response.result == 'success')
            {
                bootbox.alert(response.message, function()
                {
                    location.reload();
                });
            }
        });
        return false;
    });
})
