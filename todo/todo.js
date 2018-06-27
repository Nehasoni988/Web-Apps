  
$(document).ready(function()
{     
     print();
     $(".create").click(function()
     {
            $(".create-sub").slideToggle("slow"); 

     });
     $(".search").click(function()
     {
         $(".search-sub").slideToggle("slow");
     });
     $(".second").click(function()
     {
        print();
     });
     $(".first").click(function()
     {
        todaytask();
     });
     $(".third").click(function()
     {
        pasttask();
     });
     $(".fourth").click(function()
     {
        nexttask();
     });
     $(".final").click(function()
     {
        clear();
     });
});

function editTask()
{
           
    var oldTitle = $('#s1').val();
    var oldTask = $('#s2').val();
    var oldDate = $('#s3').val();
    $('#save').click(function()
    {   
        var newTitle = $('#s1').val();
        var newTask = $('#s2').val();
        var newDate = $('#s3').val();
        var today = getCurrentDate();
        if(oldTitle != newTitle || oldTask != newTask ||  oldDate != newDate)
        {
            if(newTitle.length == 0)
            { newTitle = oldTitle; }
            if(newTask.length == 0)
            { newTask = oldTask; }
            if(newDate.length == 0)
            { newDate = oldDate; }                            
            else
            {
                var xhttp = new XMLHttpRequest();
                var data = "oldTitle="+oldTitle+"&newTitle="+newTitle+"&newTask="+newTask+"&newDate="+newDate;
                xhttp.open("POST","editTask.php",true);
                xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                xhttp.send(data);
                xhttp.onreadystatechange = function()
                {
                    if(xhttp.readyState == 4 && xhttp.status == 200)
                    { 
                        print(); 
                        $("#showme").css('display','none');
                    }
                    
                }; 
            }      
        }
        else
        {
            print();
            $("#showme").css('display','none');
        }
     });                           
}

function showme1(str)
{
       var start = str.indexOf("<td>",4);
       start+=4;   
       var remainingStr=str.substr(start);
       var end = remainingStr.indexOf("</td>");
       var title = remainingStr.substr(0,end);
       var xhttp = new XMLHttpRequest();
       xhttp.open("POST","show1.php",true);
       xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
       xhttp.send("title="+title);
       xhttp.onreadystatechange = function()
        {
                if(xhttp.readyState == 4 && xhttp.status == 200)
                {   
                    $("#showme").css("display","block");
                    document.getElementById('showme').innerHTML =  xhttp.responseText;
                    $(".cross").click(function()
                    {
                         $("#showme").css("display","none");
                    
                    });
                    editTask(); 
                }       
        }; 
}
function getCurrentDate()
{
    var today = new Date();
    var dd = today.getDate();
    var mm = today.getMonth()+1;
    var yyyy = today.getFullYear();

    if(dd<10) { dd = '0'+dd } 
    if(mm<10) { mm = '0'+mm } 
    today = yyyy+ '-'+ mm + '-' + dd ;
    return today;
}
function showme(str)
{

        var start = str.indexOf("<td>",4);
        
        start+=4;
        
        var remainingStr=str.substr(start);
        
        var end = remainingStr.indexOf("</td>");
        
        var title = remainingStr.substr(0,end);

        var xhttp = new XMLHttpRequest();
        xhttp.open("POST","show.php",true);
        xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhttp.send("title="+title);

        xhttp.onreadystatechange = function(){
            if(xhttp.readyState == 4 && xhttp.status == 200)
                {   
                    
                    $("#showme").css("display","block");
                    document.getElementById('showme').innerHTML =  xhttp.responseText;
                    $(".cross").click(function()
                    {
                         $("#showme").css("display","none");
                      
                    });
                }
        };

}

function todaytask()
{
    var xhttp = new XMLHttpRequest();
    xhttp.open("POST","todaydate.php",true);
    xhttp.send();
    xhttp.onreadystatechange = function()
    {
        if(this.readyState == 4 && this.status == 200)
        {
             document.getElementById('table1').innerHTML = xhttp.responseText;
        }
    };
}
function pasttask()
{
    
    var xhttp = new XMLHttpRequest();
    xhttp.open("POST","pastdate.php",true);
    xhttp.send();
    xhttp.onreadystatechange = function()
    {
        if(this.readyState == 4 && this.status == 200)
        {
             document.getElementById('table1').innerHTML = xhttp.responseText;
        }
    };
}
function nexttask()
{
    var xhttp = new XMLHttpRequest();
    xhttp.open("POST","futuredate.php",true);
    xhttp.send();
    xhttp.onreadystatechange = function()
    {
        if(this.readyState == 4 && this.status == 200)
        {
             document.getElementById('table1').innerHTML = xhttp.responseText;
        }
    };
    
}
function print()
{
    var xhttp = new XMLHttpRequest();
    xhttp.open("POST","tabledata.php",true);
    xhttp.send();
    xhttp.onreadystatechange = function()
    {
        if(this.readyState == 4 && this.status == 200)
        {
             document.getElementById('table1').innerHTML = xhttp.responseText;
        }
    };
}
function search()
{
    var title = document.getElementById("search").value;
    if(title == "")
    {
        print();
    }
    else
    {
        var xhttp = new XMLHttpRequest();
        xhttp.open("POST","search.php",true);
        xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhttp.send("t="+title);
        xhttp.onreadystatechange = function()
        {
            if(this.readyState == 4 && this.status == 200)
           {
             document.getElementById('table1').innerHTML = xhttp.responseText;
             //$("#table1 tr td:contains('"+title+"')").css("color","red");
             
           }
       };
    }   
}
function clear()
{

      var xhttp = new XMLHttpRequest();
      xhttp.open("POST","delete.php",true);
      xhttp.send();
      xhttp.onreadystatechange = function()
      {
        if(this.readyState == 4 && this.status == 200)
        {
             var x = xhttp.responseText;
             if(x == "No record avaliable")
             {
                alert("THERE IS NO RECORD TO DELETE");
             }
             else
             {
                if(confirm("are you sure you want to delete this data"))
                {
                  document.getElementById('table1').innerHTML = xhttp.responseText;
                } 
             }
        }
      };
}
function deleteTask(str)
{
    var x = confirm("Are you sure you want to permanently delete this task?")
    if(x == true)
    {
        var start = str.indexOf("<td>",4);
        start+=4;
        var remainingStr=str.substr(start);
        var end = remainingStr.indexOf("</td>");
        var title = remainingStr.substr(0,end);
        var xhttp = new XMLHttpRequest();
        xhttp.open("POST","deleteTask.php",true);
        xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhttp.send("title="+title);
        xhttp.onreadystatechange = function()
        {
            if(xhttp.readyState == 4 && xhttp.status == 200)
                {   
                    print();
                }
        };
    }

}
function validate()
{
    var date2 = $("#datepicker").val();
    var c = new Date();
    var m = (c.getMonth()+1).toString().length;
    var d = c.getDate().toString().length;
    if(m < 2  && d < 2 )
    {
      var date1 =  c.getFullYear()+'-0'+(c.getMonth()+1)+'-0'+c.getDate();
    }
    else if(m<2 && d==2)
    {
        var date1 =  c.getFullYear()+'-0'+(c.getMonth()+1)+'-'+c.getDate();        
    }
    else if(m==2 && d<2)
    {
        var date1 =  c.getFullYear()+'-'+(c.getMonth()+1)+'-0'+c.getDate();
    }
    else
    {
        var date1 =  c.getFullYear()+'-'+(c.getMonth()+1)+'-'+c.getDate();  
    }
    if(date2 < date1)
    {
        alert("Please enter valid date");
        return false;
    }
    else
    {
        return true;
    }
}
