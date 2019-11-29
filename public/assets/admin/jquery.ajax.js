$.fn.infoCMS = function(options) {
	var selfCMS = this;
	var defaults = {
		status : true,
		message : ''
	};
    var settings = $.extend(defaults, options);
    if (defaults.status == false) {
    	this.removeClass('alert-success');
    	this.addClass('alert-danger');
    }else{
    	this.removeClass('alert-danger');
    	this.addClass('alert-success');
    }
    this.children('.alert-mesage').html(options.message);
    this.show();
    setTimeout(function(){
    	selfCMS.fadeOut(500);
    }, 3000);
    return this;
}
