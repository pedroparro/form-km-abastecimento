//select form
$("#carros").change(function(){
    if($(this).data('options') == undefined){
        $(this).data('options', $('#placas option').clone());
    }

    var id = $(this).val();
    if(id == "all"){
        var options = $(this).data('options');
        $('#placas').html(options);
    }else{
        var options = $(this).data('options').filter('[data-name=' + id + ']');
        $('#placas').html(options);
    }
});