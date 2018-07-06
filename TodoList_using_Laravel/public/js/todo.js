$(document).ready(function()
{

    $('#input').focusin(function()
    {
        $(this).attr('placeholder', '');
    });
    $('#input').focusout(function()
    {
        $(this).attr('placeholder','WHAT YOU WANT TO SEARCH');
    });
    $('#t').focusin(function()
    {
        $(this).attr('placeholder', '');
    });
    $('#t').focusout(function()
    {
        $(this).attr('placeholder','Task-Name');
    });
    $('#d').focusin(function()
    {
        $(this).attr('placeholder', '');
    });
    $('#d').focusout(function()
    {
        $(this).attr('placeholder','About');
    });
    $('#web').addClass('web');
 
    $('div.alert').not('.alert-important').delay(2000).slideUp(300);
  
})  
function del()
{

return confirm("Do you want to delete this item?");

}
function sea()
{
    var value = document.getElementById('input').value;
    if(value == "")
    return false;
    else
    return true;
}

function cl()
{
    return confirm("Are You Sure ??");
}