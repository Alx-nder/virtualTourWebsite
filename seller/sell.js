var username=document.getElementById("user_id").innerHTML;

$("#my_listings").click(function(){
    username=document.getElementById("user_id").innerHTML;
    $("#current_selection").css("display", "none");
    alert(username);
})

$.ajax({
    url: "http://localhost/recommendAlgo/testingajax.py",
    method: "POST",
    data: {message_py:username},
    dataType: "text",
    success: function(data){
        alert(data);
    }
})