var username=document.getElementById("user_id").innerHTML;

$("#my_listings").click(function(){
    username=document.getElementById("user_id").innerHTML;
    $("#current_selection").css("display", "none");
    alert(username);
})

$.ajax({
    url: "http://localhost/recommendAlgo/epsilon2.py",
    method: "POST",
    data: {message_py:username},
    dataType: "text",
    success: function(data){
        alert(data);
    }
})