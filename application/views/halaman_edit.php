<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit Gambar <?= $data->nama ?></title>
</head>
<body>
    <p>Gambar Sebelumnya</p>
    <img src="<?= base_url('uploads/'.$data->foto) ?>" width='20%'>
    <hr>
    <?php echo form_open_multipart('editUpload');?>
    <input type="hidden" name='id' value='<?= $data->id ?>'>
    <p>Judul Gambar</p>
	<input type="text" name='judul' value='<?= $data->nama ?>'><br>
    <p>Gambar</p>
	<input type="file" name="userfile" size="20" />
	<br /><br />

	<button type='submit'>Update</button>

	<?= form_close(); ?>
</body>
</html>