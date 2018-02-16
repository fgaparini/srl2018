$(function() {
    
    $('.tr_todos').hide();
});

function folder_change(tr_class)
{
    //alert(tr_class);
    $('.'+tr_class).toggle();
}