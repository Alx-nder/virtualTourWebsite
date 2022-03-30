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

// $.ajax({
//     url: "http://localhost/recommendAlgo.py",
//     method: "POST",
//     data: {message_py:username},
//     dataType: "text",
//     success: function(data){
//         alert(data);
//     }
// })



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