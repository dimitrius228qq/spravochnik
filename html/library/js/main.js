$(function(){


function show(){
	         var fil1=$('#filtr1 option:selected').val();
	         var fil2=$('#filtr2 option:selected').val();
	        
	            $.ajax({
	                url:'library/php/spisok.php',
	                type: "POST",
	                data:{ 'name': fil1,'sort': fil2 },
	                cache: false,
	              
	                success: function(data){
	                	$('#phph').html(data);
	                	 
	                }
	            });
	        }
	show();
$('#sort').click(function(){
show();
});

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

	$('#give').click(function(){
	    $('#form-container').css('display','flex');
	    $('.php').css('display','none');
		$(document).ready(function() { 
			$('#photoimg').live('change', function(){ 
				$('#btn').click(function(){
					$("#preview").html('');
					$("#preview").html('<img src="library/loader.gif" class="loading"alt="Uploading...."/>');
					$('#recall-form').ajaxForm({
						url:'library/php/ajaxdob.php',
						target: '#preview',
						success: function(data){
							alert(data); 
							show();
							$('#recall-form')[0].reset();
						}
					}).submit();
					show();
				});
			   	
			});
		
		});
		$("#close").click(function(){
		$("#form-container").css('display', 'none');
		$('.php').css('display','flex');
		show(); 
		});
	});





  $('#phph').delegate('button[value="delete"]','click',function(e){
    $('#form-del').css('display','flex');
    $('.php').css('display','none');  
	$("#delyes").click(function(){
		var valdel=$(e.currentTarget).siblings("strong").text();
		
		$.ajax({
			url: 'library/php/ajaximagedel.php',
			type: 'POST',
			dataType: 'html',
			data:{ 'id': valdel },
			success: function(response){
				$("#form-del").css('display', 'none');
   				$('.php').css('display','flex');
			 	alert("абонент удалён ");
			 	show();
			}
		});
   
	});
	$("#delnot").click(function(){
    $("#form-del").css('display', 'none');
    $('.php').css('display','flex'); 
    show(); 
 	});
 	$("#closedel").click(function(){
    $("#form-del").css('display', 'none');
    $('.php').css('display','flex'); 
    show(); 
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




$('#phph').delegate('button[value="izm"]','click',function(e){
    $('#form-izmenenie').css('display','flex');
    $('.php').css('display','none');
		var valizm = $(e.target).siblings("strong").text();
			$("#previewizm").html('');
			$("#previewizm").html('<img src="library/loader.gif"  class="loading" alt="Uploading...."/>');
		$.ajax({
			url: 'library/php/ajaxizm.php',
			type: 'POST',
			dataType: 'html',
			data:{ 'id': valizm },
			success: function(response){
			 	result=$.parseJSON(response);
			 	$('#input').html( '<p><input type="text" class="form-control" name="surname" id="surname" value="'+result.surname+'" placeholder="Фамилия"></p><br>'+ 
			 	'<input type="text" class="form-control" name="name" id="name" value="'+result.name+'" placeholder="Имя"><br>'+
               '<input type="text" class="form-control" name="patronymic" id="patronymic" value="'+result.patronymic+'" placeholder="Отчество"><br>'+
                '<input type="text" class="form-control" name="phone" id="phone" value="'+result.phone+'" placeholder="Телефон"><br>'+
                '<input type="text" class="form-control" name="addres" id="addres" value="'+result.addres+'" placeholder="Адрес"><br>'+
                '<img src="uploads/'+result.picture+'"><br>'+
                '<input type="file" name="photo" id="photo"><br>'+ 
                '<input type="button" id="izmbtn" value="Сохранить">');
                 alert("Вставьте фото заново");
                

			}
		});
    		$(document).ready(function() { 
			$('#photo').live('change', function(){ 
				$('#izmbtn').click(function(){
					$("#previewizm").html('');
					$("#previewizm").html('<img src="library/loader.gif" alt="Uploading...."/>');
					$('#form-izm').ajaxForm({
						url:'library/php/ajaxizmeneniya.php',
						data:{ 'id': valizm },
						target: '#previewizm',
						success: function(data){
							
							alert(data);
						show();
							
						}
					}).submit();
				});
			   	
			});
			});
	
    

	$("#closeizm").click(function(){
	    $("#form-izmenenie").css('display', 'none');
	    $('.php').css('display','flex');
	    show();
	});
});



});



