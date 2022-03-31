var username=document.getElementById("user_id").innerHTML;

$("#upload_listing_page").css("display", "none");


$("#profile").click(function(){
    username=document.getElementById("user_id").innerHTML;
    $("#profile_page").css("display", "inline-block");
    $("#upload_listing_page").css("display", "none");
})

$("#upload_listing").click(function(){
    $("#profile_page").css("display", "none");
    $("#upload_listing_page").css("display", "inline-block");
})

var lm_coefficients=[];
$.ajax({
    url: "http://localhost/virtualTourWebsite/seller/estimation.py",
    method: "POST",
    data: {message_py:""},
    dataType: "text",
    success: function(data){
        // alert(data);
        lm_coefficients=data;
    }
})

$(".submit").click(function(){
    var living_space= $("[name=living_space]").val();
    var land=$("[name=land]").val();
    var age=$('[name=age]').val();
    var bedrooms= $("[name=bedrooms]").val();
    var building_class=$("[name=building_class]").val();
    var bathrooms=$("[name=bathrooms]").val();
    var message = JSON.stringify({ living_space,land,age,bedrooms,building_class,bathrooms});
    if (message=="")
    {
    }
    else{
        alert(lm_coefficients)
        // alert((living_space*lm_coefficients[0])+(bathrooms*lm_coefficients[1])+(bedrooms*lm_coefficients[2])+(building_class*lm_coefficients[3])+(land*lm_coefficients[4])+(age*lm_coefficients[5]));
    }
})

// var house_details = document.getElementsByClassName('house_details');
// var request_body=JSON.stringify({username,house_location,living_space,bathrooms,bedrooms, building_class,age,land});

// for (var i = 0, len = list_img.length; i < len; ++i) {
//     house_details[i].onclick=function () {
//         // alert("awda")
//         // modal.style.display = "block";
//         var house_location= $("#house_location");
//         var living_space= $("#living_space");
//         var bathrooms=$("#bathrooms");
//         var bedrooms=$("#bedrooms");
//         var building_class=$("#building_class");
//         var age=$("#age");
//         var land=$("#land");
//         request_body=JSON.stringify({username,house_location,living_space,bathrooms,bedrooms, building_class,age,land});
//         estimate();
//     }
// }


// request_body=JSON.stringify({username,house_location,living_space,bathrooms,bedrooms, building_class,age,land});


// function estimate(){
//     username=document.getElementById("user_id").innerHTML;

//     var request_body=JSON.stringify({username,house_location,living_space,bathrooms,bedrooms, building_class,age,land});
//     $.ajax({
//         url: "http://localhost/recommendAlgo/testingajax.py",
//         method: "POST",
//         data: {message_py:request_body},
//         dataType: "text",
//         success: function(data){
//             alert(data);
//         }
//     })    
// }