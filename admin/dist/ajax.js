$(function () {
    slider(); //Fetch Slider Details From Insert Api.
    slide1(); //Fetch Slide1 text From Fetxh api.
    slide2(); //Fetch Slide2 text From Fetxh api.
    slide3(); //Fetch Slide3 text From Fetxh api.
    adsenseHome(); //Fetch AdSense Code from Fetch Api.

})

function slider(){

    $.ajax({
        url: "Function/Insert.php?form=sliderDetails",
        type: "POST",
        success: function (msg) {
            $('#homeSlide').html(msg);
    }
});

}

function slide1(){

    $.ajax({
        url: "Function/fetch.php?form=slide1",
        type: "POST",
        success: function (msg) {
            var a = JSON.parse(msg);
            $('#slide1Upper').val(a.txt1);
            $('#slide1Center').val(a.txt2);
            $('#slide1bottom').val(a.txt3);
            if(a.image != null){
            $('#slide1Image').removeAttr("required");
            }
    }
});

}

function slide2(){

    $.ajax({
        url: "Function/fetch.php?form=slide2",
        type: "POST",
        success: function (msg) {
            var a = JSON.parse(msg);
            $('#slide2Upper').val(a.txt1);
            $('#slide2Center').val(a.txt2);
            $('#slide2bottom').val(a.txt3);
            if(a.image != null){
            $('#slide2Image').removeAttr("required");
            }
    }
});

}

function slide3(){

    $.ajax({
        url: "Function/fetch.php?form=slide3",
        type: "POST",
        success: function (msg) {
            var a = JSON.parse(msg);
            $('#slide3Upper').val(a.txt1);
            $('#slide3Center').val(a.txt2);
            $('#slide3bottom').val(a.txt3);
            if(a.image != null){
            $('#slide3Image').removeAttr("required");
            }
    }
});

}

function adsenseHome(){
    var page = "Home";
    $.ajax({
        url: "Function/fetch.php?form=adsenseFetch",
        type: "POST",
        data:{page:page},
        success: function (msg) {
            var a = JSON.parse(msg);
            $('.adsense760').val(a.txt1);
            $('.adsense360').val(a.txt2);
    }
});

}


$('.fetch').click(function() {

    var page = $(this).children("a").attr("class");
    $.ajax({
        url: "Function/fetch.php?form=adsenseFetch",
        type: "POST",
        data:{page:page},
        success: function (msg) {
            var a = JSON.parse(msg);
            $('.adsense760').val(a.txt1);
            $('.adsense360').val(a.txt2);
    }
})

});

$('.fetchMeta').click(function() {

    var page = $(this).attr("id");
    $.ajax({
        url: "Function/fetch.php?form=metaFetch",
        type: "POST",
        data:{page:page},
        success: function (msg) {
            var a = JSON.parse(msg);
            $('.mtitle').val(a.txt1);
            $('.mkeyword').val(a.txt2);
            $('.mdescription').val(a.txt3);
    }
})

});


$('#logout').click(function() {
    window.location = "Function/logout";
});


$("form#Login").submit(function(e){
  
    e.preventDefault();
    var form_data = new FormData(this);
            $.ajax({
            url: "Function/Insert.php?form=Login",
            type: "POST",
            data: form_data,
            async: false,
            contentType: false,
            cache: false,
            processData:false,
            beforeSend:function(){
            $('#Login').css("opacity",".5");
            },
            success: function (msg) {
                 $('#Login')[0].reset();
                var a = JSON.parse(msg);
            if(a == "Admin"){
                window.location = "dashboard";
            }
            else{
                swal("Error!", "Invalid Email Or Password", "error");
            }
        }
    });

});

$("form#addtag").submit(function(e){
  
    e.preventDefault();
    var form_data = new FormData(this);
            $.ajax({
            url: "Function/Insert.php?form=addTag",
            type: "POST",
            data: form_data,
            contentType: false,
            cache: false,
            processData:false,
            beforeSend:function(){
            $('#addtag').css("opacity",".5");
            },
            success: function (msg) {
                $('#addtag').css("opacity","");
                 $('#addtag')[0].reset();
                var a = JSON.parse(msg);
                if(a == 0){
                    swal("Success!","Tag Name Added","success");
                }
                else if(a == 1){
                    swal("Error!","Error Found While Adding TagName","error");
                }
                else if(a == 2){
                    swal("Alert!","TagName Already Exist","info");
                }
        }
    });

});

$('.sel').click(function() {
    $('.sel').removeClass('active');
    $(this).addClass('active');

    var title = $(this).children("a").attr("class");
    var a = $(this).attr("id");
    $('.pageTitle').html(title)
    $('.b').css("display","none");
    $('.'+a).slideToggle(1000);

});

$('.home').click(function() {
    $('.home').removeClass('active');
    $(this).addClass('active');

    var a = $(this).children("a").attr("id");
    $('.h').css("display","none");
    $('.'+a).css("display","");

});

$('.store').click(function() {
    $('.store').removeClass('active');
    $(this).addClass('active');

    var a = $(this).children("a").attr("id");
    $('.s').css("display","none");
    $('.'+a).css("display","");

});

$('.category').click(function() {
    $('.category').removeClass('active');
    $(this).addClass('active');

    var a = $(this).children("a").attr("id");
    $('.c').css("display","none");
    $('.'+a).css("display","");

});

$('.deal').click(function() {
    $('.deal').removeClass('active');
    $(this).addClass('active');

    var a = $(this).children("a").attr("id");
    $('.d').css("display","none");
    $('.'+a).css("display","");

});

$('.homead').submit(function(e) {

    e.preventDefault();
    var form_data = new FormData(this);
            $.ajax({
            url: "Function/Insert.php?form=homeAd",
            type: "POST",
            data: form_data,
            contentType: false,
            cache: false,
            processData:false,
            beforeSend:function(){
            $('.homead').css("opacity",".5");
            },
            success: function (msg) {
                $('.homead').css("opacity","");
                var a = JSON.parse(msg);
                if(a == "update"){
                   swal("Success","Changes Saved Successfully.","success");
                   adsenseHome();
                }
                else{
                    swal("Error","Error While Saving Changes.","error");
                }
        }
    });

});

$('.homeMeta').submit(function(e) {

    e.preventDefault();
    var form_data = new FormData(this);
            $.ajax({
            url: "Function/Insert.php?form=homeMeta",
            type: "POST",
            data: form_data,
            contentType: false,
            cache: false,
            processData:false,
            beforeSend:function(){
            $('.homeMeta').css("opacity",".5");
            },
            success: function (msg) {
                $('.homeMeta').css("opacity","");
                var a = JSON.parse(msg);
                if(a == "update"){
                    swal("Success","Changes Saved Successfully.","success");
                }
                else{
                    swal("Error","Error While Saving Changes.","error");
                }
        }
    });

});

$('.homeSlider').submit(function(e) {

    e.preventDefault();
    var form_data = new FormData(this);
            $.ajax({
            url: "Function/Insert.php?form=homeSlider",
            type: "POST",
            data: form_data,
            contentType: false,
            cache: false,
            processData:false,
            beforeSend:function(){
            $('.homeSlider').css("opacity",".5");
            },
            success: function (msg) {
                $('.homeSlider').css("opacity","");
                var a = JSON.parse(msg);
                if(a == "update"){
                    swal("Success","Changes Saved Successfully.","success");
                    slider(); slide1(); slide2(); slide3();
                }
                else{
                    swal("Error","Error While Saving Changes.","error");
                }
        }
    });

});


$('#imageLink').submit(function(e) {

    e.preventDefault();
    var form_data = new FormData(this);
            $.ajax({
            url: "Function/Insert.php?form=imageLink",
            type: "POST",
            data: form_data,
            contentType: false,
            cache: false,
            processData:false,
            beforeSend:function(){
            $('#imageLink').css("opacity",".5");
            },
            success: function (msg) {
                $('#imageLink').css("opacity","");
                var a = JSON.parse(msg);
                if(a.message == "1"){
                    var urlPath = window.location.protocol+'//'+window.location.host +'/upto'+ a.path;
                    $('#urlPath').html(urlPath);
                    $('#urlPath').css('font-weight','bold');
                    $('#hiddenField').val(urlPath);
                    var copyText = $('#hiddenField').val();
                    copyText.select();
                    document.execCommand("copy");
                }
                if(a == "0"){
                    swal("Error","Error While Getting Image Link","error");
                }
        }
    });

});


$('#imageLinkForm').submit(function(e) {

    e.preventDefault();
    var form_data = new FormData(this);
            $.ajax({
            url: "Function/Insert.php?form=imageLinkForm",
            type: "POST",
            data: form_data,
            contentType: false,
            cache: false,
            processData:false,
            beforeSend:function(){
            $('#imageLinkForm').css("opacity",".5");
            $('#linkBtn').attr("disabled","disabled");
            },
            success: function (msg) {
                $('#imageLinkForm').css("opacity","");
                $('#linkBtn').removeAttr("disabled");
                $("#imageLinkForm")[0].reset();
                var a = JSON.parse(msg);
                if(a.message == "1"){
                    var urlPath = a.path;
                    $('#imageLink').html(urlPath);
                    $('#imageLink').css('font-weight','bold');
                }
                if(a == "0"){
                    swal("Error","Error While Getting Image Link","error");
                }
        }
    });

});



$(document).on('click', '.slideDelete', function(){
    var id = $(this).attr("id");
    var val = $(this).val();
    if(confirm("Are you sure you want to remove this ?"))
    {
     $.ajax({
      url:"Function/Insert.php?form=SlideDelete",
      method:"POST",
      data:{id:id,val:val},
      success:function(msg){
        var a = JSON.parse(msg);
        if(a == "Deleted"){
            swal("Success","Slide Deleted Successfully.","success");
        }
        else{
            swal("Error","Error While Deleting Slide.","error");
        }
       slider();
      }
     });

    }
   });

$('#btnsub').click(function() {
    
    var category = $('input[name="category[]"]:checked').length > 0;
    var subcategory = $('input[name="subcategory[]"]:checked').length > 0;
    if(category){
        if(subcategory){

        }
        else{
            swal("Error","Select Atleast One Sub Category.","error")
            $('.subcategory').html('Select Atleast One Sub Category');
            $('.subcategory').css("display","");
            return false;    
        }
    }
    else{
        swal("Error","Select Atleast One Main Category.","error")
        $('.category').html('Select Atleast One Main Category');
        $('.category').css("display","");
        return false;
    }
});


