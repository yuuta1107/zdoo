$(document).ready(function()
{
    $('#submit').click(function()
    {
        var data = $('#ajaxForm').serialize();
        $.ajax(
        {
            contentType: 'application/x-www-form-urlencoded',
            type: "POST",
            data: data,
            url: $('#ajaxForm').attr('action'),
            dataType: 'json',
            success: function(response)
            {
                if(response.result == 'fail') return bootbox.alert(response.message);
                if(response.result == 'success' && response.trade == 'yes')
                {
                    $('.modal').load(createLink('refund', 'createTrade', 'type=' + response.type + '&refundID=' + response.refundID), '', function()
                    {
                        $('.modal').modal('ajustPosition', 'fit');
                    });
                    return false;
                }
                else
                {
                    location.reload();
                }
            }
        });
        return false;
    })
});
