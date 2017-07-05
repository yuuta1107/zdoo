$(document).ready(function()
{
    /* Add a trade detail item. */
    $(document).on('click', '.icon-plus', function()
    {
        if($('#hiddenDetail').length)
        {
            $(this).parents('tr').after($('#hiddenDetail').html().replace(/key/g, v.key));
            $(this).parents('tr').next().find("[name*='handlers']").chosen({no_results_text: '', placeholder_text:' ', disable_search_threshold: 1, search_contains: true, width: '100%'});
            $(this).parents('tr').next().find("[name*='category']").chosen({no_results_text: '', placeholder_text:' ', disable_search_threshold: 1, search_contains: true, width: '100%'});
        }

        v.key ++;
    });

    /* Remove a trade detail item. */
    $(document).on('click', '.icon-remove', function()
    {
        if($('#hiddenDetail').length)
        {
            if($('#ajaxForm > table tbody tr').size() > 1)
            {
                $(this).parents('tr').remove();
            }
            else
            {
                $(this).parents('tr').find('input,select').val('');
            }
        }
    });

    $('#submit').click(function()
    {
        var tradeChecked = false;

        $('[name*=tradeIDList]').each(function()
        {
            if($(this).prop('checked')) tradeChecked = true;
        })

        return tradeChecked;
    });

    if(v.treeview == '') 
    {
        $('a[href*=' + v.currentYear + ']').parents('li.expandable').find('ul').show();
        $('a[href*=' + v.currentYear + ']').parents('li').replaceClass('expandable', 'collapsable');
        $('a[href*=' + v.currentYear + ']').parents('li').replaceClass('lastExpandable', 'lastCollapsable');
        $('a[href*=' + v.currentYear + ']').parents('li').find('.hitarea').replaceClass('expandable-hitarea', 'collapsable-hitarea');
    }

    fixTableFooter($('#tradeList'));

    $(document).on('click', "#querybox td[id^='valueBox']", function()
    {
        if($(this).closest('tr').find("select[id^='field']").val() == 'trader')
        {
            $valueBox = $(this);
            if($('#querybox #boxtrader').attr('data-loaded') != 1)
            {
                var defaultTrader = $('#querybox #boxtrader').html();
                $('#querybox #boxtrader').load(createLink('customer', 'ajaxGetPairs'), function()
                {
                    $('#querybox #boxtrader #trader').addClass('searchSelect');
                    $('#querybox #boxtrader #trader').append("<option value='null'>" + v.null + "</option>");
                    $('#querybox #boxtrader').attr('data-loaded', 1);
 
                    $value  = $valueBox.find("select[id^='value']");
                    valueID = $value.attr('id');
                    value   = $value.val();
 
                    $valueBox.html($('#querybox #boxtrader').children().clone());
                    $valueBox.children().attr({name : valueID, id : valueID});
 
                    $value = $valueBox.find("select[id^='value']");
                    $value.val(value);
                    $value.addClass('chosen').chosen(chosenDefaultOptions);
                    $value.trigger("chosen:open");
                })
            }
        }
    });
});
