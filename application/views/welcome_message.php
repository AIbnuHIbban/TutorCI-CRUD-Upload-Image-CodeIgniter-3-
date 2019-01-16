<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Upload File</title>
</head>
<style>
table{
	text-align:center
}
</style>
<body>
	<table border='1' cellspacing='0' cellpadding='10' width='100%'>
		<thead>
			<tr>
				<th>No</th>
				<th width='30%'>Gambar</th>
				<th>Judul Gambar</th>
				<th>Aksi</th>
			</tr>
		</thead>
		<tbody>
			<?php $no = 1; foreach ($gambar as $gb): ?>
			<tr>
				<td><?= $no++ ?></td>
				<td>
					<img width='50%' src="<?= base_url('uploads/'.$gb->foto) ?>" alt="">
				</td>
				<td><?= $gb->nama ?></td>
				<td>
				<a href="<?= base_url('edit/'.$gb->id) ?>">Edit</a>
				<a href="<?= base_url('hapusFile/'.$gb->id) ?>">Hapus</a>
				</td>
			</tr>
			<?php endforeach; ?>
		</tbody>
	</table>
	<hr>
	<?php if($error !== null): echo $error; endif;?>

	<?php echo form_open_multipart('upload');?>

	<input type="text" name='judul' placeholder='Judul Gambar'><br><br><br>
	<input type="file" name="userfile" size="20" />

	<br /><br />

	<input type="submit" value="upload" />

	<?= form_close(); ?>
	
</body>
</html>