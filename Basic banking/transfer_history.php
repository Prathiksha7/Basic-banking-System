<html>
	<head>
		<title>
			Transfer history
		</title>
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
		<center><p class="logo">Transaction history
					<a href="home.php"><button type="button" name="button"class="btn btn-success">Home</button></a>
				</p>
		</center>
		<div class="container">
			<table class="table table-striped table-hover" align='center'>
				<thead>
					<tr> 
						<th>SL.NO</th>
						<th>Sender Name</th>
						<th>Recepient</th>
						<th>Amount</th>
						<th>Date and time</th>
					</tr>
				</thead>
				<tbody>
					<?php require "dbConfig.php";
					$sql="select * from transfer_history"; //SQL Query to fetch history of transactions from transfer_history table
					$res=mysqli_query($conn,$sql);
					while($row=mysqli_fetch_assoc($res)){
					?>
					<tr>
						<td><?php echo $row['id'];?></td>
						<td><?php echo $row['sender_name'];?></td>
						<td><?php echo $row['receiver_name'];?></td>
						<td><?php echo $row['amount'];?></td>
						<td><?php echo $row['datetime'];?></td>
					</tr>
					<?php } ?>
				</tbody>
			</table>
		</div>
	</body>
</html>