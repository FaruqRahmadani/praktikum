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
			width: 920px;
		}
		div.p{
			background-color: red;
			width: 250px;
			align-content: center;
			/*align-self: center;
			align-items: center;*/
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
									<div class="p">
										<p style="color: white; text-align: center;">Pemberitahuan !!!</p>
									</div>
									<div>
										<p style="color: black; margin-bottom: 0px;">Hai {{$data['1']->nama}},</p>

					           <br/>
					           <br/>
										<p>Kelas praktikum akan segera dimulai. Diharapkan untuk segera berhadir.</p>
										<p>Untuk keterangan lebih lanjut silahkan lihat tabel dibawah ini :</p>
											<table class="tableisi">
												<tr>
													<th style="width: 100px;">Materi Praktikum</th>
													<th style="width: 50px;">Pertemuan</th>
													<th style="width: 150px;">Nama Kelas</th>
													<th style="width: 150px;">Ruangan</th>
													<th style="width: 100px;">Tanggal</th>
													<th style="width: 100px;">Jam Mulai</th>
													<th style="width: 100px;">Jam Selesai</th>
												</tr>
												<tr>
													<td style="color: black; padding-left: 8px; border: 1px solid black;">{{$data{'3'}->materi_praktikum}}</td>
													<td style="color: black; text-align: center; border: 1px solid black;">{{$data['2']->pertemuan}}</td>
													<td style="color: black; padding-left: 8px; border: 1px solid black;">{{$data['2']->nama_kelas}}</td>
													<td style="color: black; padding-left: 8px; border: 1px solid black;">{{$data['2']->ruangan}}</td>
													<td style="color: black; padding-left: 8px; border: 1px solid black;">{{$data['2']->tanggal}}</td>
													<td style="color: black; padding-left: 8px; border: 1px solid black;">{{$data['2']->waktu_mulai}}</td>
													<td style="color: black; padding-left: 8px; border: 1px solid black;">{{$data['2']->waktu_selesai}}</td>
												</tr>
											</table>
									</div>
								</td>
								<td width="100">&nbsp;</td>
							</tr>
						</table>
						<br>
						<p>Terima kasih atas perhatiannya.</p>
						<br>
						<p>Salam semangat !!</p>
					</div>

					<table cellpadding="0" cellspacing="0" border="0" align="center" width="600">
						<tr>
							<td width="100%" colspan="2" style="padding-top:65px;">
								<hr style=" width: 920px; height:1px; border:none; color:#333; background-color:#ddd;" />
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

{{-- <head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
	<title>[SUBJECT]</title>
	<style type="text/css">

@media screen and (max-width: 600px) {
    table[class="container"] {
        width: 95% !important;
    }
}

	#outlook a {padding:0;}
		body{width:100% !important; -webkit-text-size-adjust:100%; -ms-text-size-adjust:100%; margin:0; padding:0;}
		.ExternalClass {width:100%;}
		.ExternalClass, .ExternalClass p, .ExternalClass span, .ExternalClass font, .ExternalClass td, .ExternalClass div {line-height: 100%;}
		#backgroundTable {margin:0; padding:0; width:100% !important; line-height: 100% !important;}
		img {outline:none; text-decoration:none; -ms-interpolation-mode: bicubic;}
		a img {border:none;}
		.image_fix {display:block;}
		p {margin: 1em 0;}
		h1, h2, h3, h4, h5, h6 {color: black !important;}

		h1 a, h2 a, h3 a, h4 a, h5 a, h6 a {color: blue !important;}

		h1 a:active, h2 a:active,  h3 a:active, h4 a:active, h5 a:active, h6 a:active {
			color: red !important;
		 }

		h1 a:visited, h2 a:visited,  h3 a:visited, h4 a:visited, h5 a:visited, h6 a:visited {
			color: purple !important;
		}

		table td {border-collapse: collapse;}

		table { border-collapse:collapse; mso-table-lspace:0pt; mso-table-rspace:0pt; }

		a {color: #000;}

		@media only screen and (max-device-width: 480px) {

			a[href^="tel"], a[href^="sms"] {
						text-decoration: none;
						color: black; /* or whatever your want */
						pointer-events: none;
						cursor: default;
					}

			.mobile_link a[href^="tel"], .mobile_link a[href^="sms"] {
						text-decoration: default;
						color: orange !important; /* or whatever your want */
						pointer-events: auto;
						cursor: default;
					}
		}


		@media only screen and (min-device-width: 768px) and (max-device-width: 1024px) {
			a[href^="tel"], a[href^="sms"] {
						text-decoration: none;
						color: blue; /* or whatever your want */
						pointer-events: none;
						cursor: default;
					}

			.mobile_link a[href^="tel"], .mobile_link a[href^="sms"] {
						text-decoration: default;
						color: orange !important;
						pointer-events: auto;
						cursor: default;
					}
		}

		@media only screen and (-webkit-min-device-pixel-ratio: 2) {
			/* Put your iPhone 4g styles in here */
		}

		@media only screen and (-webkit-device-pixel-ratio:.75){
			/* Put CSS for low density (ldpi) Android layouts in here */
		}
		@media only screen and (-webkit-device-pixel-ratio:1){
			/* Put CSS for medium density (mdpi) Android layouts in here */
		}
		@media only screen and (-webkit-device-pixel-ratio:1.5){
			/* Put CSS for high density (hdpi) Android layouts in here */
		}
		/* end Android targeting */
		h2{
			color:#181818;
			font-family:Helvetica, Arial, sans-serif;
			font-size:22px;
			line-height: 22px;
			font-weight: normal;
		}
		a.link1{

		}
		a.link2{
			color:#fff;
			text-decoration:none;
			font-family:Helvetica, Arial, sans-serif;
			font-size:16px;
			color:#fff;border-radius:4px;
		}
		p{
			color:#555;
			font-family:Helvetica, Arial, sans-serif;
			font-size:16px;
			line-height:160%;
		}
	</style>

<script type="colorScheme" class="swatch active">
  {
    "name":"Default",
    "bgBody":"ffffff",
    "link":"fff",
    "color":"555555",
    "bgItem":"ffffff",
    "title":"181818"
  }
</script>

</head>
<body>
	<!-- Wrapper/Container Table: Use a wrapper table to control the width and the background color consistently of your email. Use this approach instead of setting attributes on the body tag. -->
	<table cellpadding="0" width="100%" cellspacing="0" border="0" id="backgroundTable" class='bgBody'>
	<tr>
		<td>
	<table cellpadding="0" width="620" class="container" align="center" cellspacing="0" border="0">
	<tr>
		<td>
		<!-- Tables are the most common way to format your email consistently. Set your table widths inside cells and in most cases reset cellpadding, cellspacing, and border to zero. Use nested tables as a way to space effectively in your message. -->


		<table cellpadding="0" cellspacing="0" border="0" align="center" width="600" class="container">
			<tr>
				<td class='movableContentContainer bgItem'>

					<div class='movableContent'>
						<table cellpadding="0" cellspacing="0" border="0" align="center" width="600" class="container">
							<tr height="40">
								<td width="200">&nbsp;</td>
								<td width="200">&nbsp;</td>
								<td width="200">&nbsp;</td>
							</tr>
							<tr>
								<td width="200" valign="top">&nbsp;</td>
								<td width="200" valign="top" align="center">
									<div class="contentEditableContainer contentImageEditable">
					                	<div class="contentEditable" align='center' >
					                  		<img src="https://lh3.googleusercontent.com/-TZOiJ_qa0EU/Va0RZSGyWjI/AAAAAAAAAFU/A4Up5MyrJXo/w2039-h2048/UNISKA%2BLogo%2BUkuran%2BBiasa.png" width="155" height="155"  alt='Logo'  data-default="placeholder" />
					                	</div>
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

					<div class='movableContent'>
						<table cellpadding="0" cellspacing="0" border="0" align="center" width="600" class="container">
							<tr>
								<td width="100%" colspan="3" align="center" style="padding-bottom:10px;padding-top:25px;">
									<div class="contentEditableContainer contentTextEditable">
					                	<div class="contentEditable" align='center' >
					                  		<h2 >Praktikum FTI Uniska</h2>
					                	</div>
					              	</div>
								</td>
							</tr>
							<tr>
								<td width="100">&nbsp;</td>
								<td width="400" align="center">
									<div class="contentEditableContainer contentTextEditable">
					                	<div class="contentEditable" align='left' >
															<p >Hi {{$data['1']->nama}},
					                  			<br/>
					                  			<br/>
																	Anda telah mengambil jadwal praktikum {{$data['3']->materi_praktikum}} oleh Dosen {{$data['4']->nama}} dengan rincian jadwal sebagai berikut
												</p>
												<table class="table1" style="font-family: sans-serif; color: #232323; border-collapse: collapse; border: 1px solid #999;">
													<tr style="font-family: sans-serif; color: #232323; border-collapse: collapse; border: 1px solid #999;">
														<th style="font-family: sans-serif; color: #232323; border-collapse: collapse; border: 1px solid #999;">No</th>
														<th style="font-family: sans-serif; color: #232323; border-collapse: collapse; border: 1px solid #999;">Pertemuan</th>
														<th style="font-family: sans-serif; color: #232323; border-collapse: collapse; border: 1px solid #999;">Nama Kelas</th>
														<th style="font-family: sans-serif; color: #232323; border-collapse: collapse; border: 1px solid #999;">Ruangan</th>
														<th style="font-family: sans-serif; color: #232323; border-collapse: collapse; border: 1px solid #999;">Tanggal</th>
														<th style="font-family: sans-serif; color: #232323; border-collapse: collapse; border: 1px solid #999;">Jam Mulai</th>
														<th style="font-family: sans-serif; color: #232323; border-collapse: collapse; border: 1px solid #999;">Jam Selesai</th>
													</tr>
														<tr style="font-family: sans-serif; color: #232323; border-collapse: collapse; border: 1px solid #999;">
															<td style="font-family: sans-serif; color: #232323; border-collapse: collapse; border: 1px solid #999;">1</td>
															<td style="font-family: sans-serif; color: #232323; border-collapse: collapse; border: 1px solid #999;">{{$data['2']->pertemuan}}</td>
															<td style="font-family: sans-serif; color: #232323; border-collapse: collapse; border: 1px solid #999;">{{$data['2']->nama_kelas}}</td>
															<td style="font-family: sans-serif; color: #232323; border-collapse: collapse; border: 1px solid #999;">{{$data['2']->ruangan}}</td>
															<td style="font-family: sans-serif; color: #232323; border-collapse: collapse; border: 1px solid #999;">{{$data['2']->tanggal}}</td>
															<td style="font-family: sans-serif; color: #232323; border-collapse: collapse; border: 1px solid #999;">{{$data['2']->waktu_mulai}}</td>
															<td style="font-family: sans-serif; color: #232323; border-collapse: collapse; border: 1px solid #999;">{{$data['2']->waktu_selesai}}</td>
														</tr>
												</table>
														</div>
					              	</div>
								</td>
								<td width="100">&nbsp;</td>
							</tr>
						</table>
						{{-- <table cellpadding="0" cellspacing="0" border="0" align="center" width="600" class="container">
							<tr>
								<td width="200">&nbsp;</td>
								<td width="200" align="center" style="padding-top:25px;">
									<table cellpadding="0" cellspacing="0" border="0" align="center" width="200" height="50">
										<tr>
											<td bgcolor="#ED006F" align="center" style="border-radius:4px;" width="200" height="50">
												<div class="contentEditableContainer contentTextEditable">
								                	<div class="contentEditable" align='center' >
																		<label style="color:white;"><b></b></label>
								                  		<!-- <a target='_blank' href="#" class='link2'>Click here to reset it</a> -->
								                	</div>
								              	</div>
											</td>
										</tr>
									</table>
								</td>
								<td width="200">&nbsp;</td>
							</tr>
						</table> --}}
					{{-- </div> --}}
{{--

					<div class='movableContent'>
						<table cellpadding="0" cellspacing="0" border="0" align="center" width="600" class="container">
							<tr>
								<td width="100%" colspan="2" style="padding-top:65px;">
									<hr style="height:1px;border:none;color:#333;background-color:#ddd;" />
								</td>
							</tr>
							<tr>
								<td width="60%" height="70" valign="middle" style="padding-bottom:20px;">
									<div class="contentEditableContainer contentTextEditable">
					                	<div class="contentEditable" align='left' >
					                  		<span style="font-size:13px;color:#181818;font-family:Helvetica, Arial, sans-serif;line-height:200%;">Sent to [email] by [CLIENTS.COMPANY_NAME]</span>
											<br/>
											<span style="font-size:11px;color:#555;font-family:Helvetica, Arial, sans-serif;line-height:200%;">[CLIENTS.ADDRESS] | [CLIENTS.PHONE]</span>
											<br/>
								</td>

</body>
{{-- </html> --}}
