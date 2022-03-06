var list_img = document.getElementsByClassName('list_img');
var nexrec= document.getElementById("nexrec");
   nexrec.addEventListener("click", function(){
$.ajax({
    url:"http://localhost/recommendAlgo/epsilon1.py",
    type:"POST",
    success:  function(resp){
        
        resp=JSON.parse(resp);

        var outer_div = document.createElement("div");
        outer_div.setAttribute("class","col"); 
        

        var nex = document.createElement("div");
        nex.setAttribute("class","card h-100 bg-light"); 
        outer_div.appendChild(nex);
        
        var nex_nested = document.createElement("img");   
        nex_nested.setAttribute("src", resp[5]);
        nex_nested.setAttribute("class", "card-img-top list_img my_img");
        nex_nested.setAttribute("style", "max-width:100%; height:auto; object-fit:contain;");
        nex.appendChild(nex_nested);

        var nex_nested_div = document.createElement("div");   
        nex_nested_div.setAttribute("class", "card-body");
        nex.appendChild(nex_nested_div);

        var nex_nested_div_title = document.createElement("h5");   
        nex_nested_div_title.setAttribute("class", "card-title");
        nex_nested_div.appendChild(nex_nested_div_title);
        nex_nested_div_title.innerHTML=""+ resp[1] + "<br>"+ new Intl.NumberFormat('en-US', { style: 'currency', currency: 'USD' }).format(resp[4]);

        var nex_nested_div_text = document.createElement("p");   
        nex_nested_div_text.setAttribute("class", "card-text");
        nex_nested_div.appendChild(nex_nested_div_text);
        nex_nested_div_text.innerHTML =resp[3];
        
        var nex_nested_footer = document.createElement("div");   
        nex_nested_footer.setAttribute("class", "card-footer");
        nex.appendChild(nex_nested_footer);
        
        var nex_nested_footer_text = document.createElement("small");   
        nex_nested_footer_text.setAttribute("class", "text-muted");
        nex_nested_footer.appendChild(nex_nested_footer_text);
        nex_nested_footer_text.innerHTML="Posted: "+ resp[2];
        
        document.getElementById("csec").appendChild(outer_div);
    
        // var prev = document.getElementsByClassName('card')[0];
        // document.getElementById("csec").removeChild(prev);  

        list_img = document.getElementsByClassName('list_img');
   
       }
})
      
});
   // // Get the modal
        var modal = document.getElementById('myModal');

        // // Get the image and insert it inside the modal - use its "alt" text as a caption
        // list_img = document.getElementsByClassName('list_img');
        var modalImg = document.getElementById("img01");
        // var captionText = document.getElementById("caption");

        for (var i = 0, len = list_img.length; i < len; ++i) {
            list_img[i].onclick=function () {
                modal.style.display = "block";
                modalImg.src = list_img[i].src;
                // captionText.innerHTML = this.alt;
            }
        }
        // // Get the <span> element that closes the modal
        var span = document.getElementsByClassName("close")[0];
        // When the user clicks on <span> (x), close the modal
        span.onclick = function() { 
        modal.style.display = "none";
        } 