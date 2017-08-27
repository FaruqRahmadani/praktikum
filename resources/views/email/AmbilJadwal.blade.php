<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
	<title>PEMBERITAHUAN</title>
	<style>
		h2{
			color:#181818;
			font-family:Helvetica, Arial, sans-serif;
			font-size:22px;
			line-height: 22px;
			font-weight: normal;
		}
		p{
			color: black;
			text-align: left;
			font-family:Helvetica, Arial, sans-serif;
			font-size:16px;
			line-height:160%;
			margin-top: 0px;
		}
		th{
			border-collapse: collapse;
			border: 1px solid black;
			background-color: #3CB371;
			text-align: center;
			color: black;
		}
		table.tableisi{
			border-collapse: collapse;
			border: 1px solid black;
			width: 900px;
		}
	</style>
</head>
<body>
	<!-- Wrapper/Container Table: Use a wrapper table to control the width and the background color consistently of your email. Use this approach instead of setting attributes on the body tag. -->
	<table cellpadding="0" width="100%" cellspacing="0" border="0">
	<tr>
		<td>
	<table cellpadding="0" width="620" class="container" align="center" cellspacing="0" border="0">
	<tr>
		<td>
		<!-- Tables are the most common way to format your email consistently. Set your table widths inside cells and in most cases reset cellpadding, cellspacing, and border to zero. Use nested tables as a way to space effectively in your message. -->


		<table cellpadding="0" cellspacing="0" border="0" align="center" width="600">
					<div>
						<table cellpadding="0" cellspacing="0" border="0" align="center" width="600">
							<tr height="40">
								<td width="200">&nbsp;</td>
								<td width="200">&nbsp;</td>
								<td width="200">&nbsp;</td>
							</tr>
							<tr>
								<td width="200" valign="top">&nbsp;</td>
								<td width="200" valign="top" align="center">
									<div align='center' >
					          	<img src="https://lh3.googleusercontent.com/-TZOiJ_qa0EU/Va0RZSGyWjI/AAAAAAAAAFU/A4Up5MyrJXo/w2039-h2048/UNISKA%2BLogo%2BUkuran%2BBiasa.png" width="155" height="155"  alt='Logo'  data-default="placeholder" />
					          </div>
					     	</td>
								<td width="200" valign="top">&nbsp;</td>
							</tr>
							<tr height="25">
								<td width="200">&nbsp;</td>
								<td width="200">&nbsp;</td>
								<td width="200">&nbsp;</td>
							</tr>
						</table>
					</div>

					<div>
						<table cellpadding="0" cellspacing="0" border="0" align="center" width="600">
							<tr>
								<td width="100%" colspan="3" align="center" style="padding-bottom:10px; padding-top:25px;">
									<div align='center' >
											<h2>PRAKTIKUM UNISKA</h2>
									</div>
								</td>
							</tr>
							<tr>
								<td width="100">&nbsp;</td>
								<td width="100%" align="center">
									<div>
										<p style="color: black; margin-bottom: 0px;">Hai {{$data['1']->nama}},</p>
					           <br/>
					           <br/>
										<p>
											Terima kasih telah mendaftarkan diri pada jadwal praktikum {{$data['3']->materi_praktikum}} oleh Dosen {{$data['4']->nama}} dengan rincian jadwal sebagai berikut :
										</p>
											<table class="tableisi">
												<tr>
													<th style="width: 25px;">No</th>
													<th style="width: 100px;">Pertemuan</th>
													<th style="width: 150px;">Nama Kelas</th>
													<th style="width: 150px;">Ruangan</th>
													<th style="width: 100px;">Tanggal</th>
													<th style="width: 100px;">Jam Mulai</th>
													<th style="width: 100px;">Jam Selesai</th>
												</tr>
												@php
													$no = 0;
												@endphp
												@foreach ($data['2'] as $datas)
													<tr>
														<td style="color: black; text-align: center; border: 1px solid black;">{{$no+=1}}</td>
														<td style="color: black; text-align: center; border: 1px solid black;">{{$datas->pertemuan}}</td>
														<td style="color: black; padding-left: 8px; border: 1px solid black;">{{$datas->nama_kelas}}</td>
														<td style="color: black; padding-left: 8px; border: 1px solid black;">{{$datas->ruangan}}</td>
														<td style="color: black; padding-left: 8px; border: 1px solid black;">{{$datas->tanggal}}</td>
														<td style="color: black; padding-left: 8px; border: 1px solid black;">{{$datas->waktu_mulai}}</td>
														<td style="color: black; padding-left: 8px; border: 1px solid black;">{{$datas->waktu_selesai}}</td>
													</tr>
												@endforeach
											</table>
									</div>
								</td>
								<td width="100">&nbsp;</td>
							</tr>
						</table>
						<br>
						<p>Mohon untuk berhadir 15 menit sebelum praktikum dimulai. Kami akan mengirimkan pesan kembali untuk mengingatkan.</p>
						<br>
						<p>Salam semangat !!</p>
					</div>

					<table cellpadding="0" cellspacing="0" border="0" align="center" width="600">
						<tr>
							<td width="100%" colspan="2" style="padding-top:65px;">
								<hr style=" width: 900px; height:1px; border:none; color:#333; background-color:#ddd;" />
							</td>
						</tr>
						<tr>
							<td width="60%" height="70" valign="middle" style="padding-bottom:20px;">
								<div align='left'>
					      	<span style="font-size:13px;color:#181818;font-family:Helvetica, Arial, sans-serif;line-height:200%;">Email ini dikirimkan otomatis oleh sistem</span>
									<br/>
									<span style="font-size:11px;color:#555;font-family:Helvetica, Arial, sans-serif;line-height:200%;">UNIVERSITAS ISLAM KALIMANTAN MUHAMMAD ARSYAD AL BANJARI</span>
									<br/>
								</div>
							</td>
						</tr>
</body>
</html>
