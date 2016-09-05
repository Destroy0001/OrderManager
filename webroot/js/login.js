/*
 * Filename: login.js
 * Contains Code for logging into the server
 */

$(function(){
	$('#login').click(function(){
		var email = $('#email').val();
		var password =$('#password').val(); 
		if(!email.length || !password.length){
			$('#errorAlert').html('Invalid Credentials!').show();
			return; 
		}
		
		$('#errorAlert').html('').hide();
		var loginData ={
				email:email, 
				password:password
		}; 
		
		$.post('/login',loginData,function(data,status){
			if(data.login)
				window.location.replace("/home");
			else{
				$('#errorAlert').html('Invalid Credentials!').show();
				return; 
			}
		},'json');
		
	});
});