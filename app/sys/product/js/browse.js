$(function()
{
    $('#category' + v.category).parent('li').addClass('active');
    if(v.mode == 'browse') $('#menu li').removeClass('active').find('[href*=' + v.status + ']').parent().addClass('active');
})
