const cb_uri = "http://localhost/virtualtourwebsite/chatbot1/chatbot1.py";
const mic_url="http://localhost/virtualtourwebsite/chatbot1/speech_module.py";

$(".mic").click(function(){
    $.ajax({
        url:mic_url,
        method:"Get",
        success: function(mic_bot){
            alert(mic_bot);
        }
    })
})

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
    }
})
