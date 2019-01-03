$(document).ready(function()
{
    removeDitto(); //Remove 'ditto' in first row.

    $(document).on('change', '.type', function()
    {
        var type = $(this).val();
        $(this).parents('tr').find('.in, .out').attr('disabled', true).next('.chosen-container').hide().find('*').attr('disabled', true);
        $(this).parents('tr').find('.' + type).attr('disabled', false).next('.chosen-container').show().find('*').attr('disabled', false);
        $(this).parents('tr').find('.in, .out').hide();
        $(this).parents('tr').find('div.' + type).show();
    })

    $('.type').change();
});
