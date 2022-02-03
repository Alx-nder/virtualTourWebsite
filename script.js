var nexrec= document.getElementById("nexrec");
nexrec.addEventListener("click", function(){
    var nex = document.createElement("div");
    nex.setAttribute("class","card"); 
    // nex.innerHTML = "hello";

    var nex_nested = document.createElement("img");   
    nex_nested.setAttribute("src", "...");
    nex_nested.setAttribute("class", "card-img-top");
    nex.appendChild(nex_nested);

    var nex_nested_div = document.createElement("div");   
    nex_nested_div.setAttribute("class", "card-body");
    nex.appendChild(nex_nested_div);

    var nex_nested_div_title = document.createElement("h5");   
    nex_nested_div_title.setAttribute("class", "card-title");
    nex_nested_div.appendChild(nex_nested_div_title);
    nex_nested_div_title.innerHTML="Card title";

    var nex_nested_div_text = document.createElement("p");   
    nex_nested_div_text.setAttribute("class", "card-text");
    nex_nested_div.appendChild(nex_nested_div_text);
    nex_nested_div_text.innerHTML="This is a wider card with supporting text below as a natural lead-in to additional content. This card has even longer content than the first to show that equal height action.";

    var nex_nested_footer = document.createElement("div");   
    nex_nested_footer.setAttribute("class", "card-footer");
    nex.appendChild(nex_nested_footer);
    
    var nex_nested_footer_text = document.createElement("small");   
    nex_nested_footer_text.setAttribute("class", "text-muted");
    nex_nested_footer.appendChild(nex_nested_footer_text);
    nex_nested_footer_text.innerHTML="Last updated 3 mins ago";
    

    document.getElementById("csec").appendChild(nex);
});
