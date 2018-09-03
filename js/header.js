$(document).ready (function (){
	//мен€ем класс дл€ формы входа на сайт
	$("#enter").click(function(){
		if($("#comeIn").hasClass("hide")){
			$("#comeIn").show();
		};
	});
	//кнопка для удаления формы входа на сайт
	$("#clear").click(function(){
		$("#comeIn").hide();
	});
	
	//вход в систему
	$("#submit").click(function(){
		var login = $('#login').val();
		var pas = $('#password').val();
		console.log(login);
		console.log(pas);
		if(login && pas){
		 $("#comeIn").hide();//убераем поле ввода пороля и логина
		 $("#registry").hide();//удаляем поле с регистрацией
		 $("#exit").show();//показываем кнопку для выходя с сайта
		 $("#user").append(login);//выводим логин пользователя
		}
		else {
			$("#error").text("You make a mistake");
		}
	});
	
	//выход с сайта
	$("#output").click(function(){
		$("#exit").hide();
		$("#registry").show();
	});

	//при нажатии на лупу
	$("#icon").click(function(){
		if($("#search").hasClass("hide")){
			$("#search").show();
		}
	});
	
	//при нажатии кнопки поиск 
	$("#buttonSearch").click(function(){
		var search = $("#enterText").val();
		console.log(search);
		//$("#search").hide();
	});
	//при нажатии вне поля Search оно закрывается
	$(document).mouseup(function(e){
		var reaserch = $("#search");
		if(reaserch.has(e.target).length === 0){
			reaserch.hide();
		};
	});
});