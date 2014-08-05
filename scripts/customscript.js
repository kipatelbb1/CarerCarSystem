$(document).ready(function()
{

	// TABLE Active
	$('tr').on('mouseover', function()
	{
		
		$(this).css('background-color', '#eee'); 
	}); 

	$('tr').on('mouseout', function()
	{
		
		$(this).css('background-color', 'white'); 
	}); 

	// IN PAGE TABS TOGGLE
	$('.panel-heading').on('click', function()
	{
		var sib = $(this).siblings()
		sib.slideToggle(1000, function()
		{
			//Wait
		})

	}); 


	$('.recents').on('mouseover', function()
	{
	
		$(this).css('background-color', '#eee'); 
	}); 

	$('.recents').on('mouseout', function()
	{
		$(this).css('background-color', 'white'); 
	}); 

	

}); 