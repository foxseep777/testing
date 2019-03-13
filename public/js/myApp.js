$(document).ready(function(){

    $('#myForm').on('submit', function(ev){
		
        ev.preventDefault();
        $.ajax({
            type: 'POST',
            url: '/adduser',
            data:  $('#myForm').serialize(),					
			success: function(response){
				$(".content").html(response);
			}
		});
		$('#myModal').css('display','none');
		document.formAddMast.reset();
    });


});

$(document).ready(function(){

    $('#addCompForm').on('submit', function(ev){
        ev.preventDefault();
        $.ajax({
            type: 'POST',
            url: '/addcompany',
            data:  $('#addCompForm').serialize(),					
			success: function(response){
				$(".content").html(response);
			}
		});
		$('#myModal').css('display','none');
		document.formAddCom.reset();
    });


});
$(document).ready(function(){
		$.ajaxSetup({
			headers: {
			'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		}
		});
    $('#month').on('submit', function(e){
        e.preventDefault();

        $.ajax({
            type: 'GET',
            url: '/report',
            data: $('#month').serialize(),
           cache: false,						
			success: function(response){
				$("#resSearch").html(response);
			}
        });
    });


});


window.onload = function(){
	var generate = document.getElementById('generate');
	generate.onclick=function(){
	
		var res = confirm('Do you really want to generate data?');	

		if(res != true){
			return false;
		}
		
		document.getElementById("preloader_malc").style.display = "block";	
	};
};
function companyAdd(id,month){
	$.ajax({type: `GET`,
					url: `/reportAbusers`,
					data:'month='+month+'&id='+id, 
					success:function(response){$('#resSearch').html(response)}});
}

 