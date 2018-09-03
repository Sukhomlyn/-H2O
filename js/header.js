$(document).ready (function (){
	//������ ����� ��� ����� ����� �� ����
	$("#enter").click(function(){
		if($("#comeIn").hasClass("hide")){
			$("#comeIn").show();
		};
	});
	//������ ��� �������� ����� ����� �� ����
	$("#clear").click(function(){
		$("#comeIn").hide();
	});
	
	//���� � �������
	$("#submit").click(function(){
		var login = $('#login').val();
		var pas = $('#password').val();
		console.log(login);
		console.log(pas);
		if(login && pas){
		 $("#comeIn").hide();//������� ���� ����� ������ � ������
		 $("#registry").hide();//������� ���� � ������������
		 $("#exit").show();//���������� ������ ��� ������ � �����
		 $("#user").append(login);//������� ����� ������������
		}
		else {
			$("#error").text("You make a mistake");
		}
	});
	
	//����� � �����
	$("#output").click(function(){
		$("#exit").hide();
		$("#registry").show();
	});

	//��� ������� �� ����
	$("#icon").click(function(){
		if($("#search").hasClass("hide")){
			$("#search").show();
		}
	});
	
	//��� ������� ������ ����� 
	$("#buttonSearch").click(function(){
		var search = $("#enterText").val();
		console.log(search);
		//$("#search").hide();
	});
	//��� ������� ��� ���� Search ��� �����������
	$(document).mouseup(function(e){
		var reaserch = $("#search");
		if(reaserch.has(e.target).length === 0){
			reaserch.hide();
		};
	});
});