$("#enter").click(function(){
    $.post("cars.php",
        {
            owner: $("#form_owner").val(),
            license: $("#form_license").val(),
            model: $("#form_model").val(),
            make: $("#form_make").val()
        },
        function(data, status){
            $("#alert").html("<div class='alert alert-"+data.message.type+"'>" + data.message.body + "</div>");
            $("#user_table_body").html('');

            $.getJSON("cars.php", function(result){
                $.each(result['cars'], function(i,field){
                    $("#user_table_body").append("<tr><td>" + field.id + "</td><td>" + field.owner + "</td><td>" + field.license + "</td><td>" + field.model + "</td><td>" + field.make + "</td><td>"+field.date+"</td></tr>");
                });
            });
        });
//        $.get("show.php", function(data, status){
//            console.log(data);
//        });
});
///////// Show last entries
$("#filt").click(function(){
    $.getJSON("cars.php",
        {
            filt: $("#filt").val(),
        },
        function(result){
            $("#user_table_body").html('');

            $.each(result['cars'], function(i,field){
                $("#user_table_body").append("<tr><td>" + field.id + "</td><td>" + field.owner + "</td><td>" + field.license + "</td><td>" + field.model + "</td><td>" + field.make + "</td><td>"+field.date+"</td></tr>");
            });
        });
});
////////////// Filt by model
$("#filter").keyup(function(){
    $.getJSON("cars.php",
        {
            filter: $("#filter").val(),
        },
        function(result){
            $("#user_table_body").html('');

            $.each(result['cars'], function(i,field){
                $("#user_table_body").append("<tr><td>" + field.id + "</td><td>" + field.owner + "</td><td>" + field.license + "</td><td>" + field.model + "</td><td>" + field.make + "</td><td>"+field.date+"</td></tr>");
            });
        });
});
////////////// Filt by owner or license
$("#filtras").keyup(function(){
    $.getJSON("cars.php",
        {
            filtras: $("#filtras").val(),
        },
        function(result){
            $("#user_table_body").html('');

            $.each(result['cars'], function(i,field){
                $("#user_table_body").append("<tr><td>" + field.id + "</td><td>" + field.owner + "</td><td>" + field.license + "</td><td>" + field.model + "</td><td>" + field.make + "</td><td>"+field.date+"</td></tr>");
            });
        });
});

$.getJSON("cars.php", function(result){
    $("#user_table_body").html('');

    $.each(result['cars'], function(i,field){
        $("#user_table_body").append("<tr><td>" + field.id + "</td><td>" + field.owner + "</td><td>" + field.license + "</td><td>" + field.model + "</td><td>" + field.make + "</td><td>"+field.date+"</td></tr>");
    });
});