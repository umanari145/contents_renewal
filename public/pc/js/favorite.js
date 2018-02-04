$(function(){

  var basic_url = $('#basic_url').val();
  var item_id = $('#item_id').val();

  var is_fav = $('#is_fav').val();

  if (is_fav == '1') {
    $('#add_favorite').css('display','none');
  } else {
    $('#delete_favorite').css('display', 'none');
  }


  $('#add_favorite').click(function(){

    $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $.ajax({
        url: basic_url +'/regist_favorite',
        type:"POST",
        data:{
          'item_id':item_id
        }
      }).done(function(data){
          alert('お気に入りに登録しました。');
          $('#add_favorite').css('display', 'none');
          $('#delete_favorite').css('display', 'inline-block');
      }).fail(function(data){
          alert('お気に入り登録に失敗しました。');
      });
    })

    $('#delete_favorite').click(function(){

      $.ajaxSetup({
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
      });

      $.ajax({
          url: basic_url +'/delete_favorite',
          type:"POST",
          data:{
            'item_id':item_id
          }
        }).done(function(data){
            alert('お気に入りを削除しました。');
            $('#add_favorite').css('display', 'inline-block');
            $('#delete_favorite').css('display', 'none');
        }).fail(function(data){
            alert('お気に入り削除に失敗しました。');
        });
      })
});
