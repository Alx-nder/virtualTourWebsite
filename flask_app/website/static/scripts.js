$("form[name=register").submit(function(e){
    var $form= $(this);
    var $error = $form.find(".error");
    var data=$form.serialize();

    // prevent reloading submit
    e.preventDefault();

    $.ajax({
        url: "/signup",
        type: "POST",
        data: data,
        dataType: "json",
        success: function(resp){
            // send to hompage after signup
            window.location.href='/index';
    },
        error: function(resp){

            console.log(resp) 
            //read error message
            $error.text(resp['responseText']);
            $error.removeClass("error--hidden");

        }
    });

});