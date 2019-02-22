$(function()
{
    $('[name^=categoryDitto]').click(function()
    {
        if($(this).prop('checked'))
        {
            var category = $(this).parents('tr').prev().find('select[name^=category]').val();
            $(this).parents('td').find('select[name^=category]').val(category).trigger('chosen:updated');
        }
    });

    $('[name^=deptDitto]').click(function()
    {
        if($(this).prop('checked'))
        {
            var dept = $(this).parents('tr').prev().find('select[name^=dept]').val();
            $(this).parents('td').find('select[name^=dept]').val(dept).trigger('chosen:updated');
        }
    });

    $('[name^=product]').change(function()
    {
        var $tr = $(this).parents('tr');
        if(v.modeType != 'in') return false;

        var product = $(this).val();
        $.get(createLink('product', 'ajaxGetSubject', 'product=' + product), function(category)
        {
            $tr.find('[name^=category]').val(category).trigger('chosen:updated');
        });
    });
});
