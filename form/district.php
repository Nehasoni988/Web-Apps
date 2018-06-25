<?php

include "connection.php";

$country = $_GET['country'];

$result = mysqli_query($conn,"SELECT * from district where country_Name='$country'");

echo "<select>";
while($row = mysqli_fetch_assoc($result))
{
echo "<option>"; echo $row["dis_name"] ; echo "</option>";
}
echo "</select>";
?>