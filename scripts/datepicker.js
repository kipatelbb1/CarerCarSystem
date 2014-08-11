$(document).ready(function()
{
	//$( "#datepicker" ).datepicker({dateFormat: 'dd/mm/yy'});



	$("#datepicker").datepicker(
    { dateFormat: 'dd/mm/yy',
      minDate: new Date() // Min Date to Today. 
     
    });

}); 