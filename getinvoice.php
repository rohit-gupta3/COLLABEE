
<?php
    require "connection.php";
    $invoice = $_GET['id'];
    $sql = "SELECT * FROM expensedetail WHERE invoice = '$invoice';";
    $result = mysqli_fetch_assoc(mysqli_query($conn,$sql));

?>
<html>
	<head>
		<meta charset="utf-8">
		<title>Invoice</title>
		<link rel="stylesheet" href="style.css">
		<link rel="license" href="https://www.opensource.org/licenses/mit-license/">
		<script src="scriptforInvoice.js"></script>
        <link rel="stylesheet" href="Invoice.css">
		<script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js"></script>
    	<script src="pdf.js"></script>
    	<style>
			#download{
				background-color: greenyellow;
				padding:8px;
				font-size: 16px;
			}
			#download:hover{
				background-color: rgb(241, 241, 14);
				cursor:pointer;
			}
		</style>
	</head>
	<body id="letter">
		<header>
			<h1>Invoice</h1>
			<address contenteditable>
				<p>Information Technology</p>
				<p>Er. ROHIT KUMAR GUPTA<br>Collabee Pvt. Ltd.</p>
				<p>(800) 555-1234</p>
			</address>
			
		</header>
		<article>
			<!-- <h1>Recipient</h1> -->
			<address contenteditable>
				<p>Project - <?php echo $result['ptitle'];?><br><?php echo $result['person'];?> </p>
			</address>
			<table class="meta">
				<tr>
					<th><span contenteditable>Invoice #</span></th>
					<td><span contenteditable><?php echo $result['invoice'];?></span></td>
				</tr>
				<tr>
					<th><span contenteditable>Date</span></th>
					<td><span contenteditable><?php echo $result['date'];?></span></td>
				</tr>
				
			</table>
			<table class="inventory">
				<thead>
					<tr>
						<th><span contenteditable>Item</span></th>
						<th><span contenteditable>Description</span></th>
						<th><span contenteditable>Rate</span></th>
						<th><span contenteditable>Quantity</span></th>
						<th><span contenteditable>Price</span></th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td><span contenteditable><?php echo $result['spendedon'];?></span></td>
						<td><span contenteditable><?php echo $result['detail'];?></span></td>
						<td><span data-prefix>$</span><span contenteditable><?php echo $result['amount'];?></span></td>
						<td><span contenteditable>1</span></td>
						<td><span data-prefix>$</span><span><?php echo $result['amount'];?></span></td>
					</tr>
				</tbody>
			</table>
			<table class="balance">
				<tr>
					<th><span contenteditable>Total</span></th>
					<td><span data-prefix>$</span><span><?php echo $result['amount'];?></span></td>
				</tr>
				<tr>
			</table>
		</article>
		<aside>
			<h1><span contenteditable>Additional Notes</span></h1>
			<div contenteditable>
				<p>This is the auto generated invoice for above expense</p>
			</div>
		</aside>
		<button id="download" style="float:right; margin-right:100px;margin-top:50px;">Download</button>
	</body>
</html>