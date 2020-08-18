<!DOCTYPE html>
<html lang="id">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Halaman Penjualan</title>
	<link href="<?php echo base_url('assets/css/bootstrap.min.css');?>" rel="stylesheet">
	<link href="<?php echo base_url('assets/css/page.css');?>" rel="stylesheet">

</head>
<body>
	<div class="container">
		<br>
		<h2>Data Penjualan</h2>
		<br>
		<form action="<?php echo base_url('filter/');?>" method="POST">
			<table width="100%" border="0">
				<tr>
					<td width="10%">Tgl. Penjualan</td>
					<td width="14%">
						<input type="date" name="awal">
					</td>
					<td width="5%">s/d</td>
					<td width="14%">
						<input type="date" name="akhir">
					</td>
					<td>
						<button class="btn btn-primary">Terapkan</button>
					</td>
				</tr>
			</table>
		</form>
		<br>
		<table class="table">
			<thead>
				<tr>
					<th scope="col">ID PENJUALAN</th>
					<th scope="col">NAMA PRODUK</th>
					<th scope="col">JUMLAH</th>
					<th scope="col">HARGA SATUAN</th>
					<th scope="col">SUB TOTAL</th>
					<th scope="col">DISKON</th>
					<th scope="col">TOTAL HARGA</th>
					<th scope="col">TGL. PENJUALAN</th>
				</tr>
			</thead>
			<tbody class="list-wrapper">
				<?php foreach ($data->result() as $row):?>
				<tr class="list-item">
					<th scope="row"><?php echo $row->id_penjualan;?></th>
					<td><?php echo $row->nama_produk;?></td>
					<td><?php echo $row->jumlah_beli;?></td>
					<td><?php echo number_format($row->harga_satuan, 0, ',', '.');?></td>
					<td><?php echo number_format($row->subtotal, 0, ',', '.');?></td>
					<td><?php echo $row->diskon;?>%</td>
					<td><?php echo number_format(round($row->totalharga,0), 0, ',', '.');?></td>
					<td><?php echo $row->tgl_penjualan;?></td>
				</tr>
				<?php endforeach; ?>
			</tbody>
		</table>
	</div>
</body>
</html>