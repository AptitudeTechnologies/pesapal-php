<?php
// include 'vendor\autoload.php';
?>
<form action="Iframe.php" method="post">
	<table>
		<tr>
			<td>Amount:</td>
			<td><input type="text" name="amount" value="1" />
			(in Kshs)
			</td>
		</tr>
		<tr>
			<td>Type:</td>
			<td><input type="text" name="type" value="MERCHANT" readonly="readonly" />
			(leave as default - MERCHANT)
			</td>
		</tr>
		<tr>
			<td>Description:</td>
			<td><input type="text" name="description" value="Test Order" /></td>
		</tr>
		<tr>
			<td>Reference:</td>
			<td><input type="text" name="reference" value="001" />
			(the Order ID )
			</td>
		</tr>
		<tr>
			<td>Shopper's First Name:</td>
			<td><input type="text" name="first_name" value="Ian" /></td>
		</tr>
		<tr>
			<td>Shopper's Last Name:</td>
			<td><input type="text" name="last_name" value="Surii" /></td>
		</tr>
		<tr>
			<td>Shopper's Email Address:</td>
			<td><input type="text" name="email" value="test@loribaridi.com" /></td>
		</tr>
		<tr>
			<td colspan="2"><input type="submit" value="Make Payment" /></td>
		</tr>
	</table>
</form>