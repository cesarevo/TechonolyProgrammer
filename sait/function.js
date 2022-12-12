

function makeRequest(url) {
	$.ajax({
		type:'GET',
		url: url,
		dataType:'html',
	}).done(function(data){
		window.location.hash = url.split('.')[0];
		document.getElementById('wrapper').innerHTML=data;
	})

}
function makeTodo(url) {
	$.ajax({
		type:'GET',
		url: url,
		dataType:'html',
	}).done(function(data){
		document.getElementById('todolist').append(data);
	})

}

function checkHash() {
	if (window.location.hash.length>1){
		let hash = window.location.hash.slice(1) + '.php';
		console.log(hash);
		makeRequest(hash);
		}
}
function validateEmail(email) {
	var re = /[a-z0-9!#$%&'*+/=?^_`{|}~-]+(?:\.[a-z0-9!#$%&'*+/=?^_`{|}~-]+)*@(?:[a-z0-9](?:[a-z0-9-]*[a-z0-9])?\.)+[a-z0-9](?:[a-z0-9-]*[a-z0-9])?/;
	return re.test(String(email).toLowerCase());
}
function registration(e) {
	event.preventDefault();
	
	let name = $('input[name="regist-name"]').val();
	let email = $('input[name="regist-email"]').val();
	let pwd = $('input[name="regist-pass"]').val();
	let pwdrepeat = $('input[name="regist-reqpass"]').val();
	
	if (name === "" | email === "" | pwd === "" | pwdrepeat === "")
	{
		return $('.msg').text('Заполните пустые поля');
	}
	if (pwd !== pwdrepeat)
	{
		return $('.msg').text('Пароли не совпадают');
	}
	//console.log(validateEmail(email));
	
	if (validateEmail(email) === false) {
		return $('.msg').text('Меил не соответствует');
    }

	$.ajax({	
		type: 'POST',
		url: 'includes/regist.inc.php',
		dataType: 'json',
		data: {
			name: name,
			email: email,
			pwd:pwd
		},
		success(data){
			console.log(data);
			console.log("Успешно");
			if(data.status)
			{
				makeRequest('profile.php');
			}
			else{
				$('.msg').text(data.message);
			}
		}
		
	})

	//function register(){
	/*	event.preventDefault();

	if(email==""|pwd==""|pwdrepeat==""| name == ""){
			document.getElementById('error').innerHTML='<span style = "color:red">Заполните поля</span>';return;
	}
	if(pwd!=pwdrepeat){
			document.getElementById('error').innerHTML='<span style = "color:red">Пароли не совпадают</span>';return;
	}	
	if(document.getElementById('email').validity.typeMismatch){
	   document.getElementById('error').innerHTML='<span style = "color:red">Невалидный email</span>';return;
	}
		$.ajax({
		type: 'POST',
		url: 'includes/regist.inc.php',
		data: {name:name, email: email, pwd: pwd},
		});	
	console.log("rjt");*/

}			

			
	
	
	
function loadtodo(e,mail){
	e.preventDefault();
	//console.log($('h4[name="Email"]').val());
	//let email = $takeemial;

	$ajax({
		type:'POST',
		url: 'includes/todo.inc.php',
		dataType:'json',
		data: {
			email: email
		},
		success(data){
			data.array.forEach(element => {
				makeTodo(data);
			});
		}
	})
}



function addtodo(e,profemail){
	e.preventDefault();

	let user = profemail;
	let todo_name = $('input[name="todo-name"]').val();
	let todo_text =$('input[name="todo-text"]').val();

	if(todo_name == "" | todo_text == "" )
	{
		return $('.msg').text('Заполните пустые поля');
	}
	$.ajax({
		type:'POST',
		url: 'includes/todo.inc.php',
		dataType:'json',
		data: {
			user:user,
			todo_name:todo_name,
			todo_text:todo_text
		},
		success(data)
		{
			console.log(user);
			if(data == true)
			{
				loadtodo(e,$email);;
			}
			
		}
	})

}
function login(e) {
	e.preventDefault();
	let email = $('input[name="login-email"]').val();
	let pwd = $('input[name="login-pwd"]').val();
	//let email = document.getElementById('login-email').value;
	
	//let pwd = document.getElementById('login-pwd').value;

	
	if (email === "" | pwd === "") {
		return $('.msg').text('Заполните пустые поля');;
	}

	if (validateEmail(email) === false) {
		return $('.msg').text('Неправильный email');;
    }

	$.ajax({
		type:'POST',
		url: 'includes/login.inc.php',
		dataType:'json',
		data: {
			email: email,
			pwd: pwd,
		},
		success (data){
			
			if(data.status)
			{
				makeRequest('profile.php');

				//document.location.href = '/profile.php'
			}
			else{
				$('.msg').text(data.message);
			}
			
		}
		/*$('form').serialize(),
	}).done(function(data){
		console.log(data);
		console.log('work');*/
	})

}

function logout(e)
{
	e.preventDefault();

	//makeRequest('login.php');

	$.ajax({
		type:'POST',
		url: 'includes/logout.inc.php',
		dataType:'json',
		data: {
		},
		success (data){
			
			if(data.status)
			{
				makeRequest('login.php');
				//document.location.href = '/profile.php'
			}
			/*else{
				$('.msg').text(data.message);
			}*/
			
		}
		/*$('form').serialize(),
	}).done(function(data){
		console.log(data);
		console.log('work');*/
	})

}


function validateLogin(e){
	e.preventDefault();
	let emptyFields = $('input').filter(function() {return $.trim($(this).val()).length == 0}).length ==0;
	if (!emptyFields){
		alert('Fill input');
	}
	else{
		$.ajax({
			type:'POST',
			url: 'includes/login.inc.php',
			dataType:'json',
			data: {

			}
			/*$('form').serialize(),
		}).done(function(data){
			console.log(data);*/
		})
	}
}
/*function checkUser(){
	$.ajax({
		type:'GET',
		url: 'includes/user.inc.php',
		dataType:'json'
	}).done(function(data){
		if(data !== false)
		{
			console.log(data);
		} else{
			console.log('сессии нет');
		}
		
	});
	
}*/
/*function donwload(input){
	let file = input.files;
	let reader = new FileReader();
	reader.readAsDataURL(file);

	reader.onload = function(){
		let img = document.createElement('.img');
		wrapper.appendChild(img);
		img.src = reader.result;

	}

}*/
function readUrl(){
	let video = $('input[name="video-link"]').val();
	console.log(video);
	$.ajax({
		type:'POST',
		url: 'includes/vid.inc.php',
		dataType:'json',
		data: {

		}
		/*$('form').serialize(),
	}).done(function(data){
		console.log(data);*/
	})
}




