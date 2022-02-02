var nexrec= document.getElementById("nexrec");
nexrec.addEventListener("click", function(){
    var nex = document.createElement("div");
    nex.setAttribute("class","card"); 
    // nex.innerHTML = "hello";

    var nex_nested = document.createElement("img");
    nex_nested.setAttribute("class", "card-img-top");
    nex.appendChild(nex_nested);
    document.getElementById("csec").appendChild(nex);
});
