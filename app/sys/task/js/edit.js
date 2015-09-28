$(document).ready(function()
{
    /* Get team. */
    $('#teamShow').on('change', function()
    {
      var $select = $(this);
      var $options = $select.children('option');
      setTimeout(function()
      {
          var selections = $select.next('.chosen-container').find('.search-choice-close').map(function()
          {
            return $options.eq($(this).data('optionArrayIndex')).val();
          }).get().join(',');
          $('#team').val(selections);
      }, 100);
    });
});
