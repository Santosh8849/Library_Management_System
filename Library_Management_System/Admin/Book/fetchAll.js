"use strict";

function Onpageload(){
	$.ajax({
            url:"fetch_book_info.php",    //the page containing php script
            type: "post",    
            data: '',
            success:function(result){
                $('#issuebook_id').html(result);
            }
        });
}
Onpageload();

