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
            console.log(resp)
    },
        error: function(resp){

            console.log(resp) 
            //read error message
            $error.text("reugyugsp");
            $error.removeClass("error--hidden");

            alert();

        }
    });

});