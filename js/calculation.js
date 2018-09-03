$( document ).ready(function() {
	//обработка Вибіріть кліматичний район:
	$("select[name='area']").bind("change", function() {
		$("select[name='building']").empty();
		$.get("json.php",{area: $("select[name='area']").val()}, function(data){
			data = JSON.parse(data);
			for(var id in data){
				$("select[name='building']").append($("<option value='" + id + "'>" + data[id] + "</option>"));
			}
		});


	});

	//обработка Вибіріть вид будівлі:
	$("select[name='building']").bind("change", function() {
		$("select[name='consumers']").empty();
		$.get("json.php",{building: $("select[name='building']").val()}, function(data){
			data = JSON.parse(data);
			for(var id in data){
				$("select[name='consumers']").append($("<option value='" + id + "'>" + data[id] + "</option>"));
			}
		});
	});

	//обработка кнопки #calculation с отправкой данных с формы name ="form"

	function funcSuccess(data){
		data = JSON.parse(data);
			$("#middlingDayGeneral").text(data['general']);
			$("#middlingDayHot").text(data['hot']);
			$("#middlingDayCold").text(data['cold']);
			$("#maxDayGeneral").text(data['general']);
			$("#maxDayHot").text(data['hot']);
			$("#maxDayCold").text(data['cold']);
			$("#maxHourGeneral").text(data['general']);
			$("#maxHourHot").text(data['hot']);
			$("#maxHourCold").text(data['cold']);
	};
	//передача данных на сервер для расчета первой части
	$("#calculation").bind("click", function(){
		var resid = $("input[name='residents']").val();
		var calc = $("select[name='consumers']").val();// берем значение с поля
		$.ajax ({ // вызываем функцию ajax
			url: "calc.php", // указываем место обработки
			type: "POST", // указываем способ передачи
			data: ({consumers: calc,resident: resid}),
			dataType: "html",
			success: funcSuccess
		});
	});
	//для расчета по приборам
	$("select[name='kindHouse']").bind("change", function() {
		$("#device").empty();
		$.get("json.php",{kindHouse: $("select[name='kindHouse']").val()}, function(data){
			data = JSON.parse(data);
			for(var id in data){
				$("#device").append($("<label for='"+ id +"'>" + data[id] + ":</label><input type='text' id='" + id + "'/><br/>"));
			}
		});
	});
	//обработка события при нажатии на плюсик
	$("#plus").click(function(){
		if($("#subjects").hide()){
			$("#subjects").show();
		};
	});
});
