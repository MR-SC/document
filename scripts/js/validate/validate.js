//email validate
var email = $('#email').val();
var rexp_email = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
if(!rexp_email.test(email)){
	alert('請輸入正確的email信箱');
}


