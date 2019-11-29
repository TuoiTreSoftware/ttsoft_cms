$(function(){
	$("body").on('click', '#checkbox-all', function() {
	    var checked = this.checked;
	    $(".checkbox-selected").each(function() { 
	        this.checked = checked; 
	    }); 
	});

	$('#checkall').click(function(){
        var checked_status = this.checked;
         
        $(".mycheckbox").each(function() { 
            this.checked = checked_status; 
        }); 
    });
    
    $('.checkroles').click(function(){
        var clazz = $(this).attr('data-value');
        var checked_status = this.checked;
         
        $("."+clazz).each(function() { 
            this.checked = checked_status; 
        }); 
    });

    $("input[class=title]").on("blur",function(){
        var slug = $(this).val();
        $('input[name=slug]').val(convertTitle(slug));
    });

    $("input[class=name]").on("blur",function(){
        var slug = $(this).val();
        $('input[name=slug]').val(convertTitle(slug));
    });

    $('select').select2();

    jQuery('.datepicker').datepicker({
        autoclose: true,
        todayHighlight: true,
        format : 'dd-mm-yyyy'
    });
});

function convertTitle(alias)
{
    var str = alias;
    str= str.toLowerCase(); 
    str= str.replace(/à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ/g,"a"); 
    str= str.replace(/è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ/g,"e"); 
    str= str.replace(/ì|í|ị|ỉ|ĩ/g,"i"); 
    str= str.replace(/ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ/g,"o"); 
    str= str.replace(/ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ/g,"u"); 
    str= str.replace(/ỳ|ý|ỵ|ỷ|ỹ/g,"y"); 
    str= str.replace(/đ/g,"d"); 
    str= str.replace(/!|@|%|\^|\*|\(|\)|\+|\=|\<|\>|\?|\/|,|\.|\:|\;|\'| |\"|\&|\#|\[|\]|~|$|_/g,"-");
    str= str.replace(/-+-/g,"-");
    str= str.replace(/^\-+|\-+$/g,""); 
    return str;
}
function format_price(str){
    str += '';
    var x = str.split('.');
    var x1 = x[0];
    var x2 = x.length > 1 ? '.' + x[1] : '';
    var rgx = /(\d+)(\d{3})/;
    while (rgx.test(x1)) {
        x1 = x1.replace(rgx, '$1' + '.' + '$2');
    }
    return x1 + x2;
 }
function onDelete(){
    return confirm('Bạn có thực sự muốn xóa nội dung này?');
}