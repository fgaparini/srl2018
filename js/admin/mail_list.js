
function select_todos()
{
    if($('#head_check').is(':checked'))
    {
        $('.input_check').attr('checked', true);   
    }
    else
    {
        $('.input_check').attr('checked', false);     
    }
}

function enviar()
{
    total= $('#total_count').val();
    comas="";
    for (x = 1; x <= total; x++)
    {
        //document.write("El número es " + x + "<br>");
        if($('#'+x).is(':checked'))
        {
            alo = $('#'+x).val();   
            comas = alo+","+comas;
        }
    }
    
    if(comas=="")
    {
        alert("No selecciono ningun alojamiento.");
    }
    else
    {
        $('#comas_input').val(comas);
        $('#mail_list').submit();
    }
    
    
}



