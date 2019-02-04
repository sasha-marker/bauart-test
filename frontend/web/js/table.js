(function($){

  $(document).on('click', '#update-table', function(){
    $formData = JSON.stringify($('#table-from').serializeArray());

    $.ajax({
      type: 'post',
      url: '/table/update',
      data: {
        json_data: $formData
      },
      success: function(response){
        var $response = jQuery.parseJSON(response);

        $('.response-table').text($response.status);
        $('.response-table').removeClass('hidden');

        setTimeout(function(){
          $('.response-table').text('');
          $('.response-table').addClass('hidden');
        }, 2000);
      }
    });
  });

})(jQuery);
