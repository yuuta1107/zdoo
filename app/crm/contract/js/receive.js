$(document).ready(function()
{
    $('#createTrade').change(function()
    {
        if($(this).prop('checked'))
        {
            $('.tradeTR').show();
            $('#depositor').change();
        }
        else
        {
            $('.tradeTR').hide();
            $('.currencyTR').hide();
        }
    });

    $('#product').change(function()
    {
        var product = $(this).val();
        $.get(createLink('product', 'ajaxGetSubject', 'product=' + product), function(category)
        {
            $('#category').val(category).trigger('chosen:updated');
        });
    });

    $.setAjaxForm('#receiveForm', function(response)
    {
        if(response.result == 'fail')
        {
            if(response.error && response.error.length)
            {
                $('#duplicateError').html($('.errorMessage').html());
                $('#duplicateError .alert').prepend(response.error);
                $('#duplicateError').show();

                $(document).on('click', '#duplicateError #continueSubmit', function()
                {
                    $('#duplicateError').append("<input value='1' name='continue' class='hide'>");
                    $('#submit').attr('type', 'button');
                })
            }
        }
        else
        {
            if(response.locate == 'reload')
            {
                $.reloadAjaxModal(1500);
            }
            else
            {
                setTimeout(function(){location.href = response.locate;}, 1200);
            }
        }
    });

    $('.createDepositor').click(function()
    {
        var skip = false;
        if($(this).data('toggle') == 'modal') skip = true;
        if($(this).hasClass('deleter')) skip = true;
        if($(this).hasClass('reloadDeleter')) skip = true;
        if($(this).hasClass('switcher')) skip = true;

        var href = $(this).prop('href');
        var app  = '';
        if(href.indexOf('/cash/') != -1) app = 'cash';

        if(!skip && app != '')
        {
            $.openEntry(app, href);
            return false;
        }
    });

    $('#depositor').change(function()
    {
        $.get(createLink('cash.trade', 'ajaxGetCurrency', 'depositorID=' + $(this).val()), function(currency)
        {
            if(!currency) return false;

            if(currency != v.mainCurrency) $('.currencyTR').show();
            if(currency == v.mainCurrency) $('.currencyTR').hide();

            $('#currency').val(currency);
            $('#currencyLabel').val(currency);
            $('.exchangeRate').toggle(currency != v.mainCurrency);
        });
    });

    $('#product').change();
    $('.currencyTR').hide();
})
