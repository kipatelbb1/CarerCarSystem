
function checkInputs()
{

	var checks_passed = 0; 

	var dateText = document.getElementById('datepicker'); 
	if(dateText.value == '')
	{
		dateText.style.border = "1px solid red"; 
		dateText.style.backgroundColor = "yellow"; 
		return false; 
	}
	else
	{
		checks_passed++; 
	}


	var PLoc = document.getElementById('PTime'); 
	if(PLoc.value == '')
	{
		PLoc.style.border = "1px solid red"; 
		PLoc.style.backgroundColor = "yellow"; 
		return false; 
	}
	else
	{
		checks_passed++; 
	}



	var num = document.getElementById('num'); 
	if(dateText.value == '')
	{
		num.style.border = "1px solid red"; 
		num.style.backgroundColor = "yellow"; 
		return false; 
	}
	else
	{
		checks_passed++; 
	}






}