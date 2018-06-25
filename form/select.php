<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

<form method="post" name="form">
	
	<select name="country" id = "con" onchange="country_select()">
		<option>select</option>
        <?php
        include "connection.php";
        $result = mysqli_query($conn,"SELECT * from country");
        while($row = mysqli_fetch_assoc($result))
        {
        ?>
        <option value="<?php echo $row['ID'];?>"><?php echo $row["country_Name"];?> </option>
        <?php 
        }
        ?>

	</select>
    <select name="district" id = "dis">
    <option>select</option>
    </select>
</form>
<script type="text/javascript">
function country_select()
{
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.open("GET","district.php?country="+document.getElementById('con').value,false);
    xmlhttp.send();
    document.getElementById('dis').innerHTML = xmlhttp.responseText;
}    

</script>

</body>
</html>