$(document).ready(function(){

    var i=1;
    $("#add_row").click(function(){
        $('#addr'+i).html("<td>"+ (i+1) +"</td><td><input id='word"+i+"' type='text' placeholder='Word' class='form-control input-md'  /> </td><td><input  id='definition"+i+"' type='text' placeholder='Definition'  class='form-control input-md'></td><td><input  id='synonym"+i+"' type='text' placeholder='Synonyms'  class='form-control input-md'></td>");
        $('#tab_logic').append('<tr id="addr'+(i+1)+'"></tr>');
        i++;

    });
    $("#delete_row").click(function(){
        if(i>1){
            $("#addr"+(i-1)).html('');
            i--;
        }
    });

});

/**
 * Created by etunk066 on 4/23/2015.
 */
