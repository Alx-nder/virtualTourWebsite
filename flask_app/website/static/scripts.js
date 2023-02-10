$("form[name=register").submit(function(e){
    var $form= ($(this));
    var $error = $form.find(".error");
    var data=$form.serialize();

    e.preventDefault();

    $.ajax({
        url: "/register",
        type: "POST",
        data: data,
        dataType: "json",
        success: function(resp){
            console.log(resp)
    },
        error: function(resp){
        console.log(resp)  
        }
    });

});