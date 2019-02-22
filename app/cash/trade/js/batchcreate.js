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

    $('[name^=product]').change(function()
    {
        var $tr = $(this).parents('tr');
        if($tr.find('[name^=type]').val() != 'in') return false;

        var product = $(this).val();
        $.get(createLink('product', 'ajaxGetSubject', 'product=' + product), function(category)
        {
            $tr.find('[name^=category]').val(category).trigger('chosen:updated');
        });
    });

    $('.type').change();
});
