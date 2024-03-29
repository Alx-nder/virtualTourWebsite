// collecting user id to deliver preference

// var username=document.getElementById("user_id").innerHTML;
// var logout=document.getElementById("logout");
// var login=document.getElementById("login");
// var sign_up=document.getElementById("sign_up");
// if (username=="guest"){
//     logout.style.display = "none";
//     login.style.display="block";
//     sign_up.style.display="block";
// }
// var username_tag=document.getElementById("user_id");
// username_tag.style.display="none";

// function that send a recommendation to html
function a_recommendation(){
$.ajax({
    url: "http://localhost/recommendAlgo/epsilon.py",
    method: "POST",
    data: {message_py:username},
    dataType: "text",
    success: function(resp){
        resp=JSON.parse(resp);
        var div = document.createElement("div");
        div.setAttribute("class","col"); 

        var card = document.createElement("div");
        card.setAttribute("class","card  bg-light"); 
        div.appendChild(card);
        
        var card_img = document.createElement("img");   
        card_img.setAttribute("src", resp[5]);
        card_img.setAttribute("class", "list_img my_img rounded my-2 mx-2");
        card_img.setAttribute("style", "max-width:100%; height:auto; object-fit:contain;");
        card_img.setAttribute("alt",resp[6]);
        card.appendChild(card_img);

        var card_body = document.createElement("div");   
        card_body.setAttribute("class", "card-body");
        card.appendChild(card_body);

        var card_title = document.createElement("h5");   
        card_title.setAttribute("class", "card-title");
        card_body.appendChild(card_title);
        card_title.innerHTML=""+ resp[1]; 

        var listing_price = document.createElement("h5");   
        listing_price.setAttribute("class", "card-title");
        card_body.appendChild(listing_price);
        listing_price.innerHTML= resp[4];

        var listing_id = document.createElement("p");   
        listing_id.setAttribute("class", "card-title");
        card_body.appendChild(listing_id);
        listing_id.innerHTML= resp[0];

        var card_sub_body = document.createElement("p");   
        card_sub_body.setAttribute("class", "card-text fs-6");
        card_body.appendChild(card_sub_body);
        card_sub_body.innerHTML ="Total acres of land: "+resp[12]+"<br>"+"Total acres of living space: "+resp[7]+"<br>"+"No. of Bedrooms: "+resp[9]+"<br>"+"No. of Bathrooms: "+resp[8]+"<br>"+"Built/renovated: "+resp[11]+" years ago";
        
        var card_footer = document.createElement("div");   
        card_footer.setAttribute("class", "card-footer");
        card.appendChild(card_footer);
        
        var card_footer_txt = document.createElement("small");   
        card_footer_txt.setAttribute("class", "text-muted");
        card_footer.appendChild(card_footer_txt);
        card_footer_txt.innerHTML="Contact: "+ resp[13];
        
        document.getElementById("csec").appendChild(div);

        // code to use the image to open tour in modal ... this is included because the tour script (contains a list of the recommendations and that list) needs to be updated after every new recommendation is called 
        enter_tour();
    }
})
}
// first few recommendations
a_recommendation();
a_recommendation();
a_recommendation();
a_recommendation();
a_recommendation();

// FUNCTION TO UPDATE THE INTERACTION VIA PYTHON SCRIPT FOR A specific USER
function update_preference(image_tag){
    var parent_card=image_tag.parentElement;
    var card_location= parent_card.getElementsByClassName("card-title")[0].innerHTML;
    var card_price= parent_card.getElementsByClassName("card-title")[1].innerHTML;
    var listing_id= parent_card.getElementsByClassName("card-title")[2].innerHTML;
    var request_body=JSON.stringify({username,card_price,card_location,listing_id});

    $.ajax({
        url: "http://localhost/recommendAlgo/update_pref.py",
        method: "POST",
        data: {message_py:request_body},
        dataType: "text",
        success: function(){ 
            // console.log
        } 
    })
}      

 // // Get the modal
 function enter_tour(){
    var modal = document.getElementById('myModal');
    var list_img = document.getElementsByClassName('list_img');
    for (var i = 0, len = list_img.length; i < len; ++i) {
        list_img[i].onclick=function () {
            modal.style.display = "block";
            var modal_embed=document.getElementById("for_tour");
            modal_embed.type="text/html";
            modal_embed.src=this.alt;
            modal_embed.height="100%";
            // update the preference while viewing
            update_preference(this);
        }
    }
    // // Get the <span> element that closes the modal
    var span = document.getElementsByClassName("close")[0];
    // When the user clicks on <span> (x), close the modal
    span.onclick = function() { 
        modal.style.display = "none";
    }
   }

// infinite scroll
$(document).ready(function(){
    $(window).scroll(function () {
        $("#loader_image").css('display', 'none');
        if ($(document).height() <= $(window).scrollTop() + $(window).height()) {            
            $("#loader_image").css('display', 'inline-block');
            a_recommendation();
            a_recommendation();
            a_recommendation();
        }
    });    
});

// search function
$("#search_close").click(function(){
    var search_open = document.getElementById('search_open')
    if (search_open.style.display === "none") {
        search_open.style.display = "block";
      } else {
        search_open.style.display = "none";
      }
})