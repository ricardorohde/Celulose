$(function(){
	Celulose.init();
	$('a.box').click(function(e){
		e.preventDefault();
		Celulose.box.open(this);
	});
	
});
$(window).load(function(){
	
});