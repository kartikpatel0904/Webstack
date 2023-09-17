
function bindSelectListByIdFromDatasource(elementId,option){
    $.ajax({
        url: "bindselectlist.php",
        type: "POST",
        data: option,
        success: function(result){
            $("#"+elementId).empty();
            $("#"+elementId).append(result);
        },
    
     });
}


function bindTableByIdFromDatasource(elementId,option){
    $.ajax({
        url: "table.php",
        type: "POST",
        data: option,
        success: function(result){
            $("#"+elementId).empty();
            $("#"+elementId).append(result);
        },
    
    });
}
