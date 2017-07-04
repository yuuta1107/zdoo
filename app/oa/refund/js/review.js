$(document).ready(function()
{
    $('#submit').click(function()
    {
        $('input[name^=status]').each(function()
        {
            if($(this).prop('checked'))
            {
                if(typeof(status) == 'undefined' || status == '')
                {
                    if($(this).val() == 'pass')
                    {
                      $('#allPass').val('1');
                      $('#allReject').val('0');
                    }
                    else
                    {
                        $('#allPass').val('0');
                        $('#allReject').val('1');
                    }
                }

                if(typeof(status) != 'undefined' && status != '' && status != $(this).val())
                {
                    $('#allPass').val('0');
                    $('#allReject').val('0');
                }

                status = $(this).val();
            }
        })
        
        status = '';
    })
})
