<?php
session_start();
include "connection.php";
?>

<DOCTYPE html>
<html lang="en">
<head>
         <meta charset="utf-8">
         <title>registration form</title>
         <link rel="stylesheet" type="text/css" href="regform.css">
         <script type="text/javascript" src="reg.js"></script>
         <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
         <script type="text/javascript">
               
         </script>
        
</head>
<body>
       <form name="myForm" method="POST" id="form1" action="n1.php">
       	
       	     <fieldset class="f1">
       	     	  
       	     	      <legend>REGISTRATION-FORM</legend>
       	     	      <div class="a">
                              <label>Name</label>
                              <input type="text" name="username" id="hey" onkeyup ="validation()">
                              <h5 id="first"></h5>
                    </div>
                
                    <div class="b">
                              <label>Address</label>
                              <input type="text" name="address" onkeyup="validation()">
                              <h5 id="second"></h5>
                    </div>
                    
                    <div class="c">
                              <label>Gender</label>
                              <section class="c0">
                                    Male <input type="radio" name="gender" value="Male" checked>
                                    Female<input type="radio" name="gender" value="Female">
                              </section>                
                    </div>

                    <div class="d">
                              <label>Country</label><br>

                              <select name="country" id="con" onchange="state(this.value)" onkeyup="validation()">
                                    <option value="">Select</option>

                                    <script>
                                          fetch_con();
                                     </script>

                              </select>
                              <h5 id="fourth"></h5>
                    </div>

                    <div class="e">      
                              <label>State</label><br>
                              <select name="district" id = "dis" onkeyup="validation()" >
                              <option value="">select</option>
                              </select>
                              <h5 id="fifth"></h5>
                    </div>

                    <div class="f">
                              <label>Zip-code</label><br>
                              <input type="text" name="zc" onkeyup="validation()"/>
                              <h5 id="sixth"></h5>
                    </div>
                    <div class="g">   
                              <label>User-Id</label>
                              <input type="text" name="userid" onkeyup="validation()"/>
                              <h5 id="seventh"><?php echo $_SESSION['error']; ?></h5>
                    </div>

                    <div class="h">   
                             <label>Password</label>
                             <input type="password" name="password" onkeyup="validation()">
                             <h5 id="eigth"></h5>
                    </div>
                  
                    <div class="i">   
                             <label>E-mail</label>
                             <input type="email" name="email" onkeyup="validation()"/>
                             <h5 id="nineth"></h5>
                    </div>
                    
                    <div class="j">   
                             <label>Category</label>
                             <section class="j0">
                                 OBC<input type="checkbox" name="cat" value="OBC" checked>
                                 GENERAL<input type="checkbox" name="cat" value="GENERAL">
                             </section>
                             <h5 id="tenth"></h5>                 
                    </div> 
                    <div>
                     <fieldset class="f2">
                       	      <legend>About</legend> 
                       	      <textarea type="text" name="text" id="textarea" onkeyup="validation()"></textarea>
                     </fieldset>
                     <h5 id="eleventh"></h5>
                    </div>
                    
                    <div class="k">
                             <input class="k1" type="submit" name="button" value="submit"  onclick="return validation()">
                             <button type="button" id="button1"><a href="home.php">HOME</a></button>
 
                    </div>

       	     </fieldset>
             </form>
                
      
</body>
</html>
