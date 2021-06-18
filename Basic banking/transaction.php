<?php 
	require "dbConfig.php";
	$sender_id=$_GET['id'];                                  //Get sender id from customer details 
	$sql="select * from customers_info where id=$sender_id" ;//SQL query to fetch sender details
	$res=mysqli_query($conn,$sql);
	$row=mysqli_fetch_assoc($res);
	$sq="select * from customers_info where id!=$sender_id" ;//SQL query to fetch all receiver details
	$rs=mysqli_query($conn,$sq);
?>
<html>
	<head>
		<title>Transaction</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
		<style>
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
				
			button{
				float:right;
				margin-right:5px;
				margin-top:10px;
				margin-bottom:10px;
				font-size:15px;
				font-weight:bold;
				}
		</style>
	</head>
	<body>
		<form method="POST">
			<div class="form-group">
				<center>
					<p class="logo">Transaction
						<a href="home.php"><button type="button" name="button"class="btn btn-success">Home</button></a>
					</p>
				</center>
				<div class="container">
					<table class="table table-striped table-hover">
						<thead>
							<tr>
								<th>Id</th>
								<th>Name</th>
								<th>Email id</th>
								<th>Balance</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td><?php echo $row['id'];?></td>
								<td><?php echo $sender_name=$row['name'];?></td>
								<td><?php echo $row['email_id'];?></td>
								<td><?php echo $sender_balance=$row['balance'];?></td>
							</tr>
						</tbody>
					</table>

					Transfer To:
						<select class="form-control" name="customer"  required >      
							<option class="dropdown-menu"value="">select customer.....</option>
							<?php while($rw=mysqli_fetch_assoc($rs)) {?>
							<option class="dropdown-item"value="<?php echo $rw['id'];?>"><?php echo $rw['name'];?></option>
							<?php }?>
						</select><br>             

					Amount:
					<input class="form-control" type="number" name="amount" /><br>
					<center><input class="btn btn-primary" type="submit" name="button" value="Transfer amount" /></center>
					<?php if(isset($_POST['button']))
					{
						$receiver=$_POST['customer'];
						$amount=$_POST['amount'];
						if(isset($receiver))
						{
							// constraint to check input of negative value by user
							if (($amount)<0)
							{
								echo '<script>alert("Transaction failed! Negative values cannot be transferred")</script>';
							}
  
							// constraint to check insufficient balance.
							else if($amount > $row['balance']) 
							{
								echo '<script>alert("Transaction failed! Insufficient Balance")</script>';  // showing an alert box.
							}
   
							// constraint to check zero values
							else if($amount == 0){
								echo '<script>alert("Transaction failed! Zero value cannot be transferred")</script>';
							}

							else
							{

								$balance=$sender_balance-$amount;                             //sender balance after transaction
								$query="select * from customers_info where id=$receiver";     //receiver details
								$re=mysqli_query($conn,$query);
								$row1=mysqli_fetch_assoc($re);

								$rec_bal=$row1['balance'];                                    //receiver balance before transaction
								$Receiver_Name=$row1['name'];
								$cust_bal=$amount+$rec_bal;                                   //receiver balance after transaction
								$s="INSERT INTO transfer_history (sender_name,receiver_name,amount,datetime) VALUES ('$sender_name','$Receiver_Name','$amount',CURRENT_TIMESTAMP)";
								$se=mysqli_query($conn,$s);
								
								$sql1="update customers_info set balance=$balance where id=$sender_id";     //sender balance update
								$res1=mysqli_query($conn,$sql1);
								
								$sql2="update customers_info set balance=$cust_bal where id=$receiver";   //reciver balance update
								$res2=mysqli_query($conn,$sql2);
								
								if ($res2)
								{
										echo ' <script>alert("Transaction successful")</script> ';
										header("refresh:0; url=transfer_history.php");
								}
							}
						}
					}  
				?>
			</div>
		</form>
	</body>
</html>
