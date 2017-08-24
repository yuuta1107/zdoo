var $selectedItem;
var selectItem = function(item)
{
    $selectedItem = $(item).first();
    $('#triggerModal').modal('hide');
};

$(document).ready(function()
{
    var showSearchModal = function()
    {
        var key  = $('#customers_chosen .chosen-results > li.no-results > span').text();
        var link = createLink('customer', 'ajaxSearchCustomer', 'key=' + key);
        $.zui.modalTrigger.show({url : link});
    };

    $(document).on('change', '#customers', function()
    {
       if($(this).val() === 'showmore')
       {
            showSearchModal();
       }
    });

    $(document).on('click', '#customers_chosen .chosen-results > li.no-results', showSearchModal);

    $(document).on('hide.zui.modal', '#triggerModal', function()
    {
        var key       = '';
        var $customer = $('#customers');
        if($selectedItem && $selectedItem.length)
        {
            key = $selectedItem.data('key');
            if(!$customer.children('option[value="' + key + '"]').length)
            {
                $customer.prepend('<option value="' + key + '">' + $selectedItem.text() + '</option>');
            }
        }
        $customer.val(key).change().trigger("chosen:updated");
        $selectedItem = null;
    });
})
