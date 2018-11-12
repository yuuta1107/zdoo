$(document).ready(function()
{
    //var setHeight = '35';
    var setHeight = '18';
    $('.user-list').each(function()
    {
        var height = $(this).children(':first').height();
        $(this).children(':first').css('height', setHeight + 'px');
        var thisHeight = $(this).height(); 
        $(this).children(':first').css('height', '');
        if(height > thisHeight)
        {
            $(this).children(':first').css('height', thisHeight + 'px');
            $(this).children('a:first').css('margin-top', thisHeight - 18 + 'px')
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
        var thisHeight = $(this).parent().next().css('margin-top');
        thisHeight = parseInt(thisHeight) + 18;
        $(this).parent().css('height', thisHeight + 'px');
        $(this).hide();
        $(this).parent().next().show();
    })
})
