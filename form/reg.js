function fetch_con()
{
var xhttp = new XMLHttpRequest();
        xhttp.open("GET", "country_state.json", true);
        xhttp.send();
        xhttp.onreadystatechange = function()
            {
                if (xhttp.readyState == 4 && xhttp.status == 200 )
                     {
                         var jsObj = JSON.parse(xhttp.responseText);
                         for(var i=0;i<jsObj.countries.length;i++)
                         document.getElementById("con").innerHTML += "<option>"+jsObj.countries[i].country+"</option>";
                     }      
            };
}
 function state(str)
 {
    var xhttp = new XMLHttpRequest();
    xhttp.open("GET","country_state.json",true);
    xhttp.send();
    xhttp.onreadystatechange = function()
    {
        if(this.readyState == 4 && this.status == 200)
        {
            var obj = JSON.parse(xhttp.responseText);
            if(str=="")
            {
                var x = document.getElementById('con');
                x.innerHTML = "<option>Select</option>";
           
            }
            else
            {
                for(i=0;i<obj.countries.length;i++)
                {
                    if(str==obj.countries[i].country)
                    {
                      for(j=0;j<obj.countries[i].states.length;j++)
                      {
                         var p = document.getElementById("dis");
                         p.innerHTML += "<option>"+obj.countries[i].states[j]+"</option>";

                      }
                    }
                }
            }
        }
    };    
 } 
 function username()
{
    var uname = document.forms["myForm"]["username"].value;
    if(uname == "")
    {
        document.getElementById('first').innerHTML = "*required";
        return 1; 
    }
    else if(uname.search(/[0-9\.\$\@\!\%\^\&\*\(\)\#]/)!= -1)
    {
        document.getElementById('first').innerHTML = "*username cananot be a number or a Special Charater";
        return 1;
    }
    else
    {
      document.getElementById('first').innerHTML = "";
      return uname;
    }
}
function address()
{
   var add = document.forms["myForm"]["address"].value;
    if(add == "")
    {
        document.getElementById('second').innerHTML = "*required";
        return 1;
    } 
    else if(add.search(/[\.\$\@\!\%\^\&\*\(\)\#]/g) != -1)
    {
        document.getElementById('second').innerHTML = "*Special Charaters Not Allowd";
         return 1;
    }
    else if( add.search(/[a-z]/gi) == -1)
    {
        document.getElementById('second').innerHTML = "*Address Must Contain At-Least One Charater";
        return 1;
    }
    else if(add.search(/[0-9]/g) == -1)
    {
      document.getElementById('second').innerHTML = "*Address Must Contain At-Least One Digit ";
      return 1;
    }
   
    else
    {
        document.getElementById('second').innerHTML = "";
        return add;
    }
}
function gender()
{
    var m = document.forms["myForm"]["gender"];
    if(m[0].checked==true)
    {

        return m[0].value;
    }
    else
    {
        return m[1].value;
    }
}
function country()
{
     var cn = document.forms["myForm"]["country"];
     if(cn.selectedIndex == 0)
     {
        document.getElementById('fourth').innerHTML = "*Required";
        return 1;
     }
    var i;
    var option;
    for(i=1;i<cn.options.length;i++)
    {
        option = cn.options[i];
        if( option.selected == true)
            {
               break;
            }
     }
     document.getElementById('fourth').innerHTML = "";
     return option.value;
}
function district()
{
    
     var d = document.forms["myForm"]["district"];
     if(d.selectedIndex == 0)
     {

        document.getElementById('fifth').innerHTML = "*Required";
        return 1;
     }
     document.getElementById('fifth').innerHTML = "";
     return d.value;
}
function zipcode() 
{
    
    var zipcode = document.forms["myForm"]["zc"].value;
    if(zipcode == "")
    {
        document.getElementById('sixth').innerHTML = "*Required";
        return 1;
    }
    else if( zipcode.match(/\D/g) == null)
    {
        if(zipcode.length > 5 && zipcode.length<7)
        {   
            document.getElementById('sixth').innerHTML = "";
            return zipcode;
        }    
        else
        {    
            document.getElementById('sixth').innerHTML = "Less Than 7 digit";
            return 1;
        }    
    }
    else
    {
       document.getElementById('sixth').innerHTML = "Only  digits Are Allowd";
       return 1;
    }
}
function userid()
{
    var uid = document.forms["myForm"]["userid"].value;
    if(uid=="")
    {
        document.getElementById('seventh').innerHTML = "*required";
        return 1;
    
    }
    else if(uid.search(/[0-9]/g)==-1 || uid.search(/[\D]/g) == -1)
    {
        document.getElementById('seventh').innerHTML = "*please choose combination of characters and digit";
        return 1;
    }
    else if(uid.length<5 || uid.length > 8)
    {
      document.getElementById('seventh').innerHTML = "More Than 5 & Less Than 8 characters";
      return 1;
    }

    document.getElementById('seventh').innerHTML = "";
    return uid;
}
function password()
 {
    var ui = document.forms["myForm"]["userid"].value;
    var pwd = document.forms["myForm"]["password"].value;
    if(pwd == "")
    {
        document.getElementById('eigth').innerHTML = "Required";
        return 1;
    }
    else if(pwd==ui)
    {
        document.getElementById('eigth').innerHTML = "*Password must be different from username";
        return 1;
    }
    else if(pwd.search(/[0-9]/g)==-1 || pwd.search(/[\D]/g) == -1)
    {
        document.getElementById('eigth').innerHTML = "*please choose combination of characters and digit";
        return 1;
    }
    else if(pwd.length < 7 || pwd.length > 11)
    {
        document.getElementById('eigth').innerHTML = "*More than 6 digits & Less than 11 digit";
        return 1;
    }
    document.getElementById('eigth').innerHTML = "";
    return pwd;

}
function email()
{
    var em = document.forms["myForm"]["email"].value;
    var dotIndex = em.indexOf('.');
    var index = em.indexOf('@'); 
    
    if(em == "")
    {
        document.getElementById('nineth').innerHTML = "*Required";
        return 1;
    }
    else if(em.search(/@/)==-1 || em.search(/\./) == -1)
    {
        document.getElementById('nineth').innerHTML = "*@ or '.' is missing";
        return 1;
    }
    else if(em.search(/\s/) == -1  && em.search(/^@/) == -1 && em.search(/@$/)==-1 && 
             em.search(/^\./) == -1 && em.search(/\.$/)  ==  -1 && (dotIndex != index+1 ) )
      {
        document.getElementById('nineth').innerHTML = "";
        return em;
      }
      else
      {
        document.getElementById('nineth').innerHTML = "Invalid Email Address";
      }
}
function category()
{
    var p = document.forms["myForm"]["cat"];
    if(p[0].checked==true && p[1].checked==true)
    {
       document.getElementById('tenth').innerHTML = "select any one";
       return 1;   
    }
    else if(p[0].checked==true)
    {
        document.getElementById('tenth').innerHTML = "";
        return p[0].value;
    }
    else
    {
        document.getElementById('tenth').innerHTML = "";
        return p[1].value;
    }
    
}
function text()
{
     var text = document.forms["myForm"]["text"].value;
    if(text == "")
    {
        document.getElementById('eleventh').innerHTML = "*Required";
        return 1;
    }
    document.getElementById('eleventh').innerHTML = "";
    return text;
}
//validation for login form
function logvalid()
{

   var l = document.getElementById('i1').value;

}
                                 

function validation() 
{ 
        $(document).ready(function()
        {
        $("input").focus(function(){$(this).css("background-color","grey")});
        $("input").blur(function(){$(this).css("background-color","white")});
        });
         
    var u = username();
    var a = address();
    var g = gender();
    var co = country();
    var d = district();
    var z = zipcode();
    var ui = userid();
    var p = password();
    var e = email();
    var c = category();
    var t = text(); 
    if(u==1||a==1||co==1||d==1||z==1||ui==1||p==1||e==1||c==1||t==1)
    {
       //document.getElementById('last').innerHTML = ""; 
       return false;

    }   
    else
    {
     /*document.getElementById('last').innerHTML ="NAME = "+u+"<br>"+"ADDRESS = "+a+"<br>"+"GENDER = "+g+"<br>"+
      "COUNTRY = "+co+"<br>"+"DISTRICT = "+d+"<br>"+"ZIPCODE = "+z+"<br>"+
     "USER-ID = "+ui+"<br>"+"PASSWORD = "+p+"<br>"+"EMAIL = "+e+"<br>"+
     "CATEGORY = "+c+"<br>"+"ABOUT = "+t; */
     return true;  
    }
}
// this is for database method
 /*function country_select()
 { 
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.open("GET","district.php?country="+document.getElementById('con').value,false);
    xmlhttp.send();
    document.getElementById('dis').innerHTML = xmlhttp.responseText;
 } */   
 //this is for json file method
 