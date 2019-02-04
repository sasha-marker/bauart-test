(function($){

  $(document).on('click', '#add-article', function(){

    $form = $('#articles-form');

    $form.yiiActiveForm('validateAttribute', 'articles-title');
    $form.yiiActiveForm('validateAttribute', 'articles-text');

    setTimeout(function(){
      if(!$form.find('.has-error').length){

        $formData = $form.serialize();

        $.ajax({
          type: 'post',
          url: '/articles/create',
          data: $formData,
          success: function(response){
            var $item = jQuery.parseJSON(response);
            var $_articlesList = $('.articles-list').find('.list-view');

            var $element = `<div class="item" data-key="${$item.id}">
                               <li data-model_id="${$item.id}"> ${$item.title} <span class="article-actions"><i class="glyphicon glyphicon-eye-open article-view"></i><i class="glyphicon glyphicon-trash article-delete"></i></span></li>
                            </div>`;

            $form[0].reset();
            $_articlesList.append($element);
          }
        });
      }
    }, 200);

  });

  $(document).on('click', '.article-delete', function(){
    var $id = $(this).closest('li').data('model_id');
    var $_articleItem = $(this).closest('li');

    $.ajax({
      type: 'post',
      url: '/articles/delete',
      data: {
        id: $id
      },
      success: function(response){
        var $response = jQuery.parseJSON(response);

        if($response.status == 'success'){
          $_articleItem.remove();

          var view_id = $('.articles-view__content').data('view_id');
          if(view_id == $id){
            $('.articles-view__content').remove();
          }
        }
      }
    });

  });

  $(document).on('click', '.article-view', function(){
    var $id = $(this).closest('li').data('model_id');

    $.ajax({
      type: 'post',
      url: '/articles/view',
      data: {
        id: $id
      },
      success: function(response){
        var $item = jQuery.parseJSON(response);

        var $element = `<div data-view_id="${$item.id}" class="articles-view__content">
                          <h3>${$item.title}</h3>
                          <p>${$item.text}</p>
                          <div class="text-right">
                            <p>${$item.date}</p>
                          </div>
                        </div>`;

        $('.articles-view').html($element);
        $('.articles-view').removeClass('hidden');
      }

    });

  });

})(jQuery);
