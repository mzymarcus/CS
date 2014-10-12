var testingEnvironment = true;
var urlPrefix = "http://128.199.213.71:9292/";
var serverPrefix = "http://localhost/cs/index.php/member_area/"; 
var actualUrlPrefix = (testingEnvironment ? serverPrefix : urlPrefix);

function setCurrentRic(ric){
	if (!ric) ric = "0002.HK";
	$("#search").attr("placeholder",ric);
	$("input[name='sid'").attr("placeholder",ric);
}

function getCurrentRic(){
	return $("#search").attr("placeholder");	
}

function getPrice(){
	return $("input[name='price']").val();	
}


function getAmount(){
	return $("input[name='amount']").val();
}

