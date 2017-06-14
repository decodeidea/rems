<!DOCTYPE html>
<html>
<head>
	<title>Pengajuan Harga</title>
</head>
<body style="padding: 0; margin: 0;">
<div style="width: 95%; margin:0 auto; position: relative;">
<div style="height: auto; width: 100%; background: #33414e; padding: 10px;box-sizing:border-box;">
<!-- <img src="http://localhost/rgproperty/assets/uploads/app_settings/57e8e70c9b6b7-original.png" width="60px"> -->
</div>

<div style="border: 2px solid #eee; width: 100%; height: auto; padding: 10px;box-sizing:border-box; margin-top: 10px">
	<span style="font-weight: bold; color: #323334; font-size: 18px;">Hallo, <?php echo $username ?></span><br><br>
	<span>Sales anda mengajukan harga.</span>
		<table>
		<tr>
			<td>Customer</td>
			<td>:</td>
			<td><?php echo $customer ?></td>
		</tr>
		<tr>
			<td>Harga Pengajuan</td>
			<td>:</td>
			<td><?php echo $price; ?></td>
		</tr>
	</table> 
	<span>Silahkan klik tombol ini untuk melihat detail</span><br><br>
	<a href="<?php echo $link ?>" style="text-decoration: none"><button style="cursor:pointer;background: #636c74;; border: 0px solid; width: 100%; padding: 10px; font-size: 18px; color: #f5f5f5;">Detail Pengajuan Harga</button></a>
</div>

<div style="font-size: 13px;">
			<p>&copy; 2016 by PT. LIMA PUTRA REALTI. All rights reserved.</p>
</div>
</div>
</body>
</html>