
var url = 'ajax/search.php';

$('#searchbox').on('keyup',function(){
	var query = $(this).val();

	if(query.length > 0)
	{
			$.ajax({
		    type : 'POST',
		    url : url ,
		    data : {
		    	query : query 
		    },
		    beforeSend : function(){
		    	$("#spinner").show();
		    },
		    success : function(data){
		    	$("#spinner").hide();
				$('#display-results').html(data).show();
		    }
	    });
	}else{
		$('#display-results').hide();
	}
	


});  