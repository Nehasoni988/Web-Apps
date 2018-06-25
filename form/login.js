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
function fetch_state(str)
{
	
	var xhttp = new XMLHttpRequest();
		xhttp.open("GET", "country_state.json", true);
	    xhttp.send();
	 	xhttp.onreadystatechange = function()
	 	{
	 		if (xhttp.readyState == 4 && xhttp.status == 200 )
			{
				var jsObj = JSON.parse(xhttp.responseText);
               if(str=="select")
               {
               	document.getElementById("states").innerHTML = "<option>selct country first</option>";
 
               }
               else
               {
                 for(i=0;i<jsObj.countries.length;i++)
                 {
                 	if(str == jsObj.countries[i].country)
                 	{
                 		
                 		for(j=0;j<jsObj.countries[i].states.length;j++)
                 		{
                 			
                 		    var p = document.getElementById("states");
                 			p.innerHTML += "<option>"+jsObj.countries[i].states[j]+"</option>";
                 		}
                 	}
                 }
               }
			}
	 	}
 }