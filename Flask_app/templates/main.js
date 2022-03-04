var mic_input=document.getElementById("test");

mic_input.addEventListener("click", function(){
$.ajax({
   url:"https://localhost/virtualtourwebsite/chatbot1/speech_module.py",
      type:"POST",
      success:function(data) {
        //do nothing
      }
    })
});  

// var mic_input= document.getElementById("mic_input");
//    mic_input.addEventListener("click", function(){
// $.ajax({
//     url:"http://localhost/virtualtourwebsite/chatbot1/speech_module.py",
//     type:"GET",
//     success:  function(resp){
//     alert(resp.type);
//     }
//   })    
// });
