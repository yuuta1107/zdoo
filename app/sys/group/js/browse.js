$(document).ready(function()
{
    //var setHeight = '35';
    var setHeight = '18';
    $('.user-list').each(function()
    {
        var height = $(this).height();
        if(height > setHeight)
        {
            $(this).children(':first').css('height', setHeight + 'px');
            $(this).children('a:first').css('margin-top', setHeight - 18 + 'px')
            $(this).children('a:first').show();
        }
    })
    $('.more-list').click(function()
    {
        $(this).parent().children(':first').css('height', '')
        $(this).hide();
        $(this).prev().children('a:first').show();
    })
    $('.hide-list').click(function()
    {
        $(this).parent().css('height', setHeight + 'px');
        $(this).hide();
        $(this).parent().next().show();
    })
})
