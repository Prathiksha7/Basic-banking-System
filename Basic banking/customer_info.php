<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  		<title>Customers details</title>
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
		<center>
			<p class="logo">CUSTOMER DETAILS
				<a href="home.php"><button type="button" name="button"class="btn btn-success">Home</button></a>
			</p>
			<div class="container">
				<table  class="table table-striped table-hover" align='center'>
					<thead class="table-warning">
						<tr> 
							<th>SL.NO</th>
							<th>Name</th>
							<th>Email</th>
							<th>Balance</th>
							<th></th>
						</tr>
					</thead>
					<tbody>
						<?php
							require "dbConfig.php";
							$sql="select * from customers_info";   //SQL Query to fetch customer details from customers_info table
							$res=mysqli_query($conn,$sql);
							while($row=mysqli_fetch_assoc($res)){  
						?>
						<tr>
							<td><?php echo $row['id'];?></td>
							<td><?php echo $row['name'];?></td>
							<td><?php echo $row['email_id'];?></td>
							<td><?php echo $row['balance'];?></td>
							<td><a href="transaction.php?id=<?php echo $row["id"]; ?>">Transfer</a></td>
						</tr>
						<?php } ?>
					</tbody>
				</table>
			</div>
	</body>
</html>