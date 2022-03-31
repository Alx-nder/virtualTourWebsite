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
$(".submit").click(function(){

$.ajax({
    url: "http://localhost/virtualTourWebsite/seller/estimation.py",
    method: "POST",
    data: {message_py:""},
    dataType: "text",
    success: function(data){
        data=JSON.parse(data);
            var living_space= $("[name=living_space]").val();
            var land=$("[name=land]").val();
            var age=$('[name=age]').val();
            var bedrooms= $("[name=bedrooms]").val();
            var building_class=$("[name=building_class]").val();
            var bathrooms=$("[name=bathrooms]").val();
            var the_estimate=((living_space*data[0])+(bathrooms*data[1])+(bedrooms*data[2])+(building_class*data[3])+(land*data[4])+(age*data[5])); 
            $('#the_estimate').attr('placeholder',the_estimate);
            
    }
})
})
// alert(lm_coefficients)

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