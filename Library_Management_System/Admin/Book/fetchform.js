$(document).find('#book_no').on('change',function(){
    var book_id = $(this).val();
    // alert(book_id);
    $.ajax({
                url:"fetch_book_info.php",    //the page containing php script
                type: "post",    
                data: {book_id:book_id},
                success:function(result){
    //  console.log(result);
    $('#issuebook_id').html('');
    $('#issuebook_id').html(result);
                }
            });
    })