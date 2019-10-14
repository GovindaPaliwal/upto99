

    $('.cop').click(function() {

        var ur = $(location).attr('href')+'?coupon='+$(this).attr('id');
        var url = $(this).attr('value');
        window.open(url);
        location.href = ur;
                
    });

	$('.coup').click(function() {
	
    var dis = $(this).attr('value');
    var ping = $(this).attr('ping');
	var url = $(location).attr('href')+'&coupon='+$(this).attr('id');
	location.href = url;
	window.open(dis);
	
});

$('#country').change(function() {

    var uri = "";
    var val = $(this).val();
    let searchParams = new URLSearchParams(window.location.search)
    if(searchParams.has('store')){
        let param = searchParams.get('store');
        //uri = $(location).attr('href')+'&country='+val;
        current = location.protocol + '//' + location.host + location.pathname;
        uri = current+'?store='+param+'&country='+val;
        location.href = uri;
    }
    else{
        uri = location.protocol + '//' + location.host + location.pathname+'?country='+val;
        location.href = uri;
    }

});

$('.like').click(function() {
    var like = $(this).attr('id');
    
    $.ajax({
        type: 'POST',
        url: 'admin/Function/Insert.php?form=likeCoupon',
        data: {'like':like},
        success: function(msg){
            var a = JSON.parse(msg);
            if(a == "0"){
                swal("Error","Please Login Before Rate Any Coupon","error");
            }
            else if(a == "1"){
                $('#'+like).css("background-color","black");
            }
            else if(a == "2"){
                $('#'+like).css("background-color","");
            }
            else if(a == "3"){
                $('#'+like).css("background-color","black");
            }
            else if(a == "4"){
                swal("Error","Error While Rating Coupon.","error");
            }
        }
    });

});

$("#loginForm").on('submit', function(e){
      
            e.preventDefault();
            $.ajax({
                type: 'POST',
                url: 'admin/Function/Insert.php?form=userLogin',
                data: new FormData(this),
                contentType: false,
                cache: false,
                processData:false,
                beforeSend: function(){
                    $('#loginForm').css("opacity",".5");
                },
                success: function(msg){
                    $('#loginForm').css("opacity","");
                    var a = JSON.parse(msg);
                    if(a == "1"){
                        swal("Success!","You're successfully Login","success");
                        window.location.href="index";
                    }
                    else if(a == "2"){
                        swal("Error!","Invalid Email Or Password","error");
                    }
                    else if(a == "0"){
                        swal("Error!","Invalid Email","error");
                    }
                }
            });
        });


        $("#signupForm").on('submit', function(e){
            
            e.preventDefault();
            $.ajax({
                type: 'POST',
                url: 'admin/Function/Insert.php?form=userSignup',
                data: new FormData(this),
                contentType: false,
                cache: false,
                processData:false,
                beforeSend: function(){
                    $('#signupForm').css("opacity",".5");
                },
                success: function(msg){
                    $('#signupForm').css("opacity","");
                    var a = JSON.parse(msg);
                    if(a == "1"){
                        swal("Success!","Account Created","success");
                        window.location.href="index";
                    }
                    else if(a == "2"){
                        swal("Error!","Email Already Exist","error");
                    }
                    else if(a == "0"){
                        swal("Error!","Error While Registering Account","error");
                    }
                }
            });
        });

        $("#sub").on('submit', function(e){
            e.preventDefault();
            $.ajax({
                type: 'POST',
                url: 'admin/Function/Insert.php?form=subscriber',
                data: new FormData(this),
                contentType: false,
                cache: false,
                processData:false,
                beforeSend: function(){
                    $('#subscriber').css("opacity",".5");
                },
                success: function(msg){
                    $('#subscriber').css("opacity","");
                    var a = JSON.parse(msg);
                    if(a == "0"){
                        swal("Success","Thank You! You're Successfully Subscribe.","success")
                    }
                    else if(a == "1"){
                        swal("Success","Email Exist! You're already subscribe", "success")
                    }
                    else{
                        swal("Error","Error While Subscribtion.","error")
                    }
      
                }
            });
        });

       $('.logout').click(function() {
            $.ajax({
                type: 'POST',
                url: 'admin/Function/Insert.php?form=logout',
                success: function(msg){
                    var a = JSON.parse(msg);
                    if(a == "0"){
                        window.location= $(location).attr('href');
                    }
      
                }
            });
        });
    



    
        