$(document).ready(function()
{
    $('#depositor').change(function()
    {
        $.get(createLink('trade', 'ajaxGetCurrency', 'depositorID=' + $(this).val()), function(currency)
        {
            if(!currency) return false;

            $('#currency').val(currency);
            $('#currencyLabel').val(currency);
            $('.exchangeRate').toggle(currency != v.mainCurrency);
        });
    });

    $('#order, #contract').change(function()
    {
        $('#money').val($(this).find('option:selected').attr('data-amount'));
        $('#customer').val($(this).find('option:selected').attr('data-customer'));
        $('#customer').trigger('chosen:updated');
    })

    $('#productCategory').change(function()
    {
        var product = $('#product').val();
        $('#product').load(createLink('product', 'ajaxGetByCategory', 'status=normal&category=' + $(this).val()), function()
        {
            $('#product').val(product).trigger('chosen:updated');
        })
    })

    $('#product').change(function()
    {
        if(v.modeType != 'in') return false;

        var product = $(this).val();
        $.get(createLink('product', 'ajaxGetSubject', 'product=' + product), function(category)
        {
            $('#category').val(category).trigger('chosen:updated');
        });
    });

    $('.exchangeRate').hide();
})

function ajaxGetCategories()
{
    var link = createLink('trade', 'ajaxGetCategories', "type=" + v.modeType);

    $('#' + v.modeType + 'CategoryBox').load(link, function()
    {
        $('#category').chosen();
    });
}
