var nexrec= document.getElementById("nexrec");
nexrec.addEventListener("click", function(){
    // alert("ada");
    var nex = document.createElement("div");
    nex.innerHTML = "hello";
    document.getElementById("csec").appendChild(nex);
});
