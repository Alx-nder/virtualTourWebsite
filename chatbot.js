const cb_uri = "http://localhost/virtualtourwebsite/chatbot1/chatbot1.py";


$(".send").click(function(){
    const message = $('[name=chat]').val();
    if (message=="")
    {
    }
    else{
        $.ajax({
            url: "http://localhost/virtualtourwebsite/chatbot1/chatbot1.py",
            method: "POST",
            data: {message_py:message},
            dataType: "text",
            success: function(data){
                alert(data);
            }
        })
        // fetch(cb_uri,{
        //     method: "POST",
        //     contentType: "text/html;charset=utf-8",
        //     // data: {message_py: message},
        //     dataType: "text",
        //     body:JSON.stringify({message_py: message})
            
        // })
        // .then(function(response){
        //     return response;
        // })
        // .then((response)=>{
        //     alert("worked", response);
        // })
        // .catch((err)=>{
        //     alert("ERROR", err.message);
        // })
    }
})
