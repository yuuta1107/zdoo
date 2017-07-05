$(document).ready(function()
{
    $('#order, #contract').change(function()
    {
        $('#money').val($(this).find('option:selected').attr('data-amount'));
        $('#customer').val($(this).find('option:selected').attr('data-customer'));
        $('#customer').trigger('chosen:updated');
    })

    $('#productLine').change(function()
    {
        $('#productBox').load(createLink('product', 'ajaxGetByLine', 'status=&line=' + $(this).val()), function()
        {
            $('#product').chosen(chosenDefaultOptions);
        })
    })
})
