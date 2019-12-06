$(function(){


function show(){	        
	            $.ajax({
	                url:'library/php/spisokper.php',
	                type: "POST",
	                cache: false,
	                success: function(data){
	                	$('#phph').html(data);
	                	 
	                }
	            });
	        }
	show();
$('#logout').click(function(){
	    $('#form-logout').css('display','flex');
	    $('.php').css('display','none');
		$("#lognot").click(function(){
		$("#form-logout").css('display', 'none');
		$('.php').css('display','flex');
		});
		$("#closelog").click(function(){
		$("#form-logout").css('display', 'none');
		$('.php').css('display','flex');
		});

	});


	


$('#phph').delegate('button[value="podrobnee"]','click',function(e){
$('#form-podrob').css('display','flex');
    $('.php').css('display','none');  
		var valpod=$(e.target).siblings("strong").text();
		
		$.ajax({
			url: 'library/php/ajaxvid.php',
			type: 'POST',
			dataType: 'html',
			data:{ 'id': valpod },
			success: function(response){
				result=$.parseJSON(response);
			 	$('#prosmotr').html('<p>'+result.surname+'</p><br>'+'<p>'+result.name+'</p><br>'+
			 		'<p>'+result.patronymic+'</p><br>'+'<p>'+result.phone+'</p><br>'+'<p>'+result.addres+'</p><br>'+'<img src="uploads/'+result.picture+'"><br>');
			show();
			}
		});
   

			$("#closepod").click(function(){
			$("#form-podrob").css('display', 'none');
			$('.php').css('display','flex'); 
			show(); 
			});
 });



});



