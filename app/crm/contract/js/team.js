$(function()
{
    $(document).on('click', '.addItem', function()
    {
        var $tr = $(this).parents('tr');
        $tr.after(v.itemRow.replace(/KEY/g, v.key));
        $tr.next().find('input,select').val('');
        $tr.next().find('.chosen').chosen(chosenDefaultOptions);
        v.key++;
    });
    
    $(document).on('click', '.delItem', function()
    {
        if($('.delItem').length == 1)
        {
            $(this).parents('tr').find('input,select').val('');
            return false;
        }
    
        $(this).parents('tr').remove();
        computeTotal();
    });

    $(document).on('focus', '.chosen-container[id^=account]', function()
    {
        var users   = JSON.parse(v.users);
        var $select = $(this).prev('select');
        var account = $select.find('option:selected').val();
        var id      = $select.attr('id');
        
        $('.chosen-container[id^=account]').each(function()
        {
            if($(this).prev('select').attr('id') != id)
            { 
                var selected = $(this).prev('select').find('option:selected').val();
                if(selected && selected != account)
                {
                    delete users[selected];
                }
            }
        });

        $select.empty();
        for(var i in users) $select.append("<option value='" + i + "'>" + users[i] + '</option>');
        $select.val(account).trigger('chosen:updated');
    });

    $(document).on('change', '[name^=account]', function()
    {
        if($(this).val() == '') $(this).parents('tr').find('input').val('').change();
    });

    $(document).on('change', '[name^=rate]', function()
    {
        var rate = $(this).val() == '' ? 0 : $(this).val();
        if(!$.isNumeric(rate)) return;

        var money = Math.round(parseFloat(rate) * parseFloat(v.amount)) / 100;
            money = money == 0 ? '' : money;
        $(this).parents('tr').find('[name^=money]').val(money);

        computeTotal();
    });

    $(document).on('change', '[name^=money]', function()
    {
        if(!$.isNumeric(v.amount) || v.amount == 0) return;

        var money = $(this).val() == '' ? 0 : $(this).val();
        if(!$.isNumeric(money)) return;

        var rate = Math.round(parseFloat(money) / parseFloat(v.amount) * 100);
            rate = rate == 0 ? '' : rate;
        $(this).parents('tr').find('[name^=rate]').val(rate);

        computeTotal();
    });
});

function computeTotal()
{
    var totalRate  = 0;
    var totalMoney = 0;
    var $rateList  = $('[name^=rate]');
    var $moneyList = $('[name^=money]');
    for(var i = 0; i < $rateList.length; i++)
    {
        if($.isNumeric($rateList[i].value))  totalRate  += parseFloat($rateList[i].value);
        if($.isNumeric($moneyList[i].value)) totalMoney += parseFloat($moneyList[i].value);
    }

    totalRate  = totalRate  == 0 ? '' : totalRate + '%';
    totalMoney = totalMoney == 0 ? '' : totalMoney;

    $('#totalRate').html(totalRate);
    $('#totalMoney').html(totalMoney);
    $('#totalRateLabel').remove();
    $('#totalMoneyLabel').remove();
}
