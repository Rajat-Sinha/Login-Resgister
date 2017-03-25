$(':input').focusin(function() {
	$(this).css('background-color','honeydew').css('color','lightseagreen').css('font-size','20px');
});
$(':input').blur(function() {
	$(this).css('background-color','linen').css('color','black').css('font-size','15px');
});
