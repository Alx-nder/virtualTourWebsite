// var rec_dict=[3, "Kingston", 20220126, "Lorem ipsum dolor sit amet consectetur adipisicing elit. Eveniet labore hic fugiat vitae id illum numquam quo voluptate, culpa voluptas nulla ipsa impedit expedita laborum ea corporis repellat? Placeat, illum?", 1052442]

import { spawn as spawner } from 'child_process';
        const python_process=spawner('python',['http://localhost/recommendAlgo/epsilon1.py',]);

        python_process.stdout.on('data',(data)=>{
            console.log(JSON.parse(data.toString()));
        });

var nexrec= document.getElementById("nexrec");
   
    nexrec.addEventListener("click", function(){
    
        


    var nex = document.createElement("div");
    nex.setAttribute("class","card"); 
    
    var nex_nested = document.createElement("img");   
    nex_nested.setAttribute("src", "...");
    nex_nested.setAttribute("class", "card-img-top");
    nex_nested.setAttribute("alt","...");
    nex.appendChild(nex_nested);

    var nex_nested_div = document.createElement("div");   
    nex_nested_div.setAttribute("class", "card-body");
    nex.appendChild(nex_nested_div);

    var nex_nested_div_title = document.createElement("h5");   
    nex_nested_div_title.setAttribute("class", "card-title");
    nex_nested_div.appendChild(nex_nested_div_title);
    nex_nested_div_title.innerHTML="Card NEWtitle";

    var nex_nested_div_text = document.createElement("p");   
    nex_nested_div_text.setAttribute("class", "card-text");
    nex_nested_div.appendChild(nex_nested_div_text);
    // nex_nested_div_text.innerHTML =js_rec_des;
    
    var nex_nested_footer = document.createElement("div");   
    nex_nested_footer.setAttribute("class", "card-footer");
    nex.appendChild(nex_nested_footer);
    
    var nex_nested_footer_text = document.createElement("small");   
    nex_nested_footer_text.setAttribute("class", "text-muted");
    nex_nested_footer.appendChild(nex_nested_footer_text);
    nex_nested_footer_text.innerHTML="Last updated 3 mins ago";
    

    document.getElementById("csec").appendChild(nex);
   
    var prev = document.getElementsByClassName('card')[0];
    document.getElementById("csec").removeChild(prev);
});