<?php
require "dbConfig.php";

if(isset($_POST['button1']))
{
	header("location:customer_info.php");
}

if(isset($_POST['button2']))
{
	header("location:transfer_history.php");
}

?>

<html>
  <head>
	<title>Home page</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
	<style>
		body{
			  font-family:"Times New Roman",Times, serif;
			  background-image:url('customer.jpg');
			  background-repeat: no-repeat;
			  background-attachment: fixed; 
			  background-size:55%100%;
			  background-color:#fae4b1;
			}
		.logo{
			  color:#fff;
			  font-weight:bold;
			  line-height:60px;
			  font-size:30px;
			 }
			p{
			  height:60px;
			  background:#eb946e;
			  padding:0 20px;
			 }
		 form{
			  margin-right:90px;
			 }
		input[type='submit']{
			  padding:5px 50px 5px;
			  font-size:20px;
			  border-radius:30px;
			  color:white;
			  background-color:#eb946e;
			}
        input[type='submit']:hover{
			  background-color:#faa72a;
			}
	
	</style>
  </head>
  <body>
   <center>
	<p class="logo">Welcome To TSF Bank</p>
	<div class="container">
		<form method="POST" action="" align="right">
			<img src="transfer.jpg" style="height:200;width:250;margin-top:30px;"/><br>
			<input  type="submit" name="button1" value="View all Customers"/><br>
			<img src="transfer_history.jpg" style="height:200;width:250;margin-top:0px;"/><br>
			<input  type="submit" name="button2" value="Transaction history"/>
        </form>
	</div>
   </center>
  </body>
</html>