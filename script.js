$.getJSON("cars.php", function(result){
    $("#cars_table_body").html('');
    $.each(result['models'], function(i,field){
        $("#cars_table_body").append("<tr><td>" + field.id + "</td><td>" + field.owner + "</td><td>" + field.licence + "</td><td>" + field.model + "</td><td>" + field.make + "</td><td>" + field.date + "</td></tr>");
    });
});


$("#ajax_post").click(function(){
    $.post("cars.php",
        {
            owner: $("#owner").val(),
            licence: $("#licence").val(),
            model: $("#model").val(),
            make: $("#make").val(),
            date:$("#date").val()
        },
        function(data, status){
            $("#alert").html("<div class='alert alert-"+data.message.type+"'>" + data.message.body + "</div>");
            $("#cars_table_body").html('');
            $.getJSON("cars.php", function(result){

                $.each(result['models'], function(i,field){
                    $("#cars_table_body").append("<tr><td>" + field.id + "</td><td>" + field.owner + "</td><td>" + field.licence + "</td><td>" + field.model + "</td><td>" + field.make + "</td><td>" + field.date + "</td></tr>");
                });
            });
        });
//        $.get("show.php", function(data, status){
//            console.log(data);
//        });
});

$("#paskutiniai").click(function(){
    $.getJSON("cars.php",
        {
            paskutiniai: $("#paskutiniai").val(),
        },
        function(result){
        $("#cars_table_body").html('');
        $.each(result['models'], function(i, field){
            $("#cars_table_body").append("<tr><td>" + field.id + "</td><td>" + field.owner + "</td><td>" + field.licence + "</td><td>" + field.model + "</td><td>" + field.make + "</td><td>" + field.date + "</td></tr>");
        });
    });
});

$("#paskutiniai").keyup(function(){
    $.getJSON("cars.php",
        {
            filter: $("#filter").val(),
        },
        function(result){
        $("#cars_table_body").html('');
        $.each(result['models'], function(i, field){
            $("#cars_table_body").append("<tr><td>" + field.id + "</td><td>" + field.owner + "</td><td>" + field.licence + "</td><td>" + field.model + "</td><td>" + field.make + "</td><td>" + field.date + "</td></tr>");
        });
    });
});

