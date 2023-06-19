<?php include("config.php"); ?>

<!DOCTYPE html>
<html>
<head>
	<title>Admin</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</head>

<body>
	<nav class="navbar">
        <div class="container-fluid">
            <img src="images/logo_tulisan.png" alt="logo" href="dashboard.php" class="logo-image" style="width: 150px; height: auto;">
        </div>
    </nav>	
	<div class="container">
		<div class="table-container">
		<table class="table">
			<thead>
				<tr>
					<th>Id Booking</th>
					<th>Tanggal</th>
					<th>Nama Pemesan</th>
					<th>Total Penumpang</th>
					<th>Asal Keberangkatan</th>
					<th>Tujuan Keberangkatan</th>
					<th>Kelas</th>
					<th>Harga</th>
				</tr>
			</thead>
			<tbody>		
			<?php
				$sql = "SELECT reservasi.R_ID, reservasi.R_Tanggal, pemesan.Pm_Nama, reservasi.R_Jumlah_Kursi, jadwal_penerbangan.Jp_Bandara_Asal, jadwal_penerbangan.Jp_Bandara_Tujuan, harga.H_Harga, kelas.K_Nama
						FROM reservasi
						JOIN pemesan ON reservasi.Pm_ID = pemesan.Pm_ID
						JOIN penerbangan ON penerbangan.Pn_ID = reservasi.Pn_ID
						JOIN jadwal_penerbangan ON penerbangan.Pn_ID = jadwal_penerbangan.Pn_ID
						JOIN harga ON harga.Pn_ID = penerbangan.Pn_ID
						JOIN kelas ON harga.K_ID = kelas.K_ID
      					GROUP BY reservasi.R_ID";
						
						
				$query = mysqli_query($db, $sql);
				
				if ($query) {
					while ($hasil = mysqli_fetch_array($query)) {
						echo "<tr>";
						echo "<td>".$hasil['R_ID']."</td>";
						echo "<td>".$hasil['R_Tanggal']."</td>";
						echo "<td>".$hasil['Pm_Nama']."</td>";
						echo "<td>".$hasil['R_Jumlah_Kursi']."</td>";
						echo "<td>".$hasil['Jp_Bandara_Asal']."</td>";
						echo "<td>".$hasil['Jp_Bandara_Tujuan']."</td>";
						echo "<td>".$hasil['K_Nama']."</td>";
						echo "<td>".$hasil['H_Harga']."</td>";
						echo "</tr>";
					}
				} else {
					echo "Query execution failed: " . mysqli_error($db);
				}
			?>
			</tbody>
		</table>
		</div>
	</div>
</body>
</html>
