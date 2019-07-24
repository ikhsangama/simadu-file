<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<!-- 
HTML Template KTM Poltekkes Kemenkes Semarang
created by Rudi Kurniawan 29/08/2012 
-->

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="author" content="Rudi Kurniawan" />
	<meta name="description" content="Politeknik Kesehatan Kemenkes Semarang " />
	<meta name="keywords" content="poltekkes,semarang,jawa tengah,jateng,kemenkes" />
	<title>Poltekkes Kemenkes Semarang</title>
	<script type="text/javascript" src="<?= base_url() ?>assets/js/jquery-1.7.1.min.js"></script>

	<script>
		$(document).ready(function() {
			//$('.jurusan').html($('.f_kodejurusan', window.parent.document).val());
			//$('.progdi').html($('.f_kodeprogdi', window.parent.document).val());

		});
	</script>
</head>

<body>
	<?
	if ($this->input->post('tampilan') == 1) {
		?>
		<style media="all">
			body {
				font-family: Helvetica, Arial, Geneva, "Sans-Serif";
				font-size: 5pt/1em;
				font-weight: bold;
				color: #000000;
				margin: 0;
				padding: 0;
			}

			h1,
			h2,
			h3,
			h4,
			h5,
			h6 {
				margin: 0 0 0 0;
				padding: 0 0 0 0;
				font-weight: bold;
			}

			div.wrapper {
				position: relative;
			}

			div.kartu {
				position: relative;
			}

			div.content {
				width: 6.9cm;
				height: 3.45cm;
				position: relative;
				padding: 3pt 0 0 0;
				margin: 0 0 0 0.2cm;
				z-index: 99;
			}

			div.row {
				display: block;
				margin: 0 0 -0.333em 0;
				padding: 0 0 0 0;
				width: 6.55cm;
			}

			p,
			label,
			span.tidua,
			span.data {
				display: inline-table;
				font-size: 7pt;
				margin: 0 0 0 0;
				padding: 0 0 0 0;
				text-align: left;
			}

			label {
				font-weight: bold;
				width: 1.75cm;
				vertical-align: top;
			}

			span.tidua {
				width: 0.10cm;
				vertical-align: top;
			}

			span.data {
				width: 4.45cm;
				vertical-align: top;
			}

			span.mb {
				display: block;
				font-size: 6pt;
			}

			#barcode {
				position: absolute;
				bottom: 0.15cm;
				left: 2%;
			}

			div.direktur {
				font-size: 6pt;
				margin: 0 0 0 0.6cm;
				padding: 0 0 0 0;
				position: relative;
				text-align: center;
				top: 3px;
				z-index: -9;
			}

			div.direktur span.direktur1 {
				display: block;
			}

			div.direktur h6,
			div.direktur span.direktur1 {
				font-size: 6pt;
			}
		</style>

		<?
		if ($this->input->post('f_kodejurusan')) $this->db->where('f_kodejurusan', $this->input->post('f_kodejurusan'));
		if ($this->input->post('f_kodeprogdi')) $this->db->where('f_kodeprogdi', $this->input->post('f_kodeprogdi'));
		if ($this->input->post('f_thangkatan')) $this->db->where('f_thangkatan', $this->input->post('f_thangkatan'));
		if ($this->input->post('f_kodemahasiswa')) $this->db->where('f_kodemahasiswa', $this->input->post('f_kodemahasiswa'));
		if ($this->input->post('f_transfer') == 1) $this->db->where('f_transfer', $this->input->post('f_transfer'));
		$q2 = $this->db->get('ms_datamahasiswa');
		$r = $q2->result();
		foreach ($r as $item) {
			?>

			<div class="wrapper">

				<div class="kartu" style="display: block; width: 8.7cm; height: 5.38cm; border-top:1px solid black; margin:auto;">
					<img src="<?= base_url() ?>assets/images/ktm/bg4.jpg" style="position:absolute;width: 8.7cm; height: 5.38cm; z-index:-9999;" />
					<img src="<?= base_url() ?>assets/images/ktm/header2.png" style="position:absolute; z-index:9; width:8.3cm; margin: 0.15cm 0 0 0.1cm;" />
					<img src="<?= base_url() ?>foto/<?= $item->f_kodemahasiswa ?>" style="position:absolute; width: 1.5cm; height: 2cm; top: 2cm; right: 0.3cm; z-index:99;" class="foto" />

					<h6 style="color:black;text-align:center; margin: 1.35cm 0 0 0; font-size:0.85em;">KARTU TANDA MAHASISWA</h6>
					<div class="content">
						<div class="row">
							<label>Nama</label>
							<span class="tidua">:</span>
							<span class="data"><?= $item->f_namamahasiswa ?></span>
						</div>
						<div class="row">
							<label>NIM</label>
							<span class="tidua">:</span>
							<span class="data"><?= $item->f_kodemahasiswa ?></span>
						</div>
						<?
						if ($this->input->post('f_kodejurusan') == '1.4') {
							?>
							<div class="row" style="margin-bottom:0;">
								<label>Jurusan</label>
								<span class="tidua">:</span>
								<span class="data jurusan"><?= $this->input->post('jur') ?></span>
							</div>
							<div class="row">
								<label>Program Studi</label>
								<span class="tidua">:</span>
								<span class="data progdi"><?= $this->input->post('prog') ?></span>
							</div>
						<?
						} else {
							?>
							<div class="row">
								<label>Jurusan</label>
								<span class="tidua">:</span>
								<span class="data jurusan"><?= $this->input->post('jur') ?></span>
							</div>
							<div class="row">
								<label>Program Studi</label>
								<span class="tidua">:</span>
								<span class="data progdi"><?= $this->input->post('prog') ?></span>
							</div>

						<?
						}
						?>
						<div class="row">
							<label>Alamat</label>
							<span class="tidua">:</span>
							<span class="data"><?= $item->f_alamat ?></span>
						</div>



						<!--div style="position: absolute; bottom:0.1cm; left:3cm; z-index:-9;">
													<div class="direktur">
														<h6 style="margin-bottom: 0.1cm;">Direktur</h6>
														<img src="<?= base_url() ?>assets/images/ktm/ttd2.jpg" style="position:absolute; margin:0 0 0 0; bottom:0.3cm; left:0.2cm; width:2.2cm; z-index:-9;" />
														<p>&nbsp;</p>
														<span class="ttd">&nbsp;</span>
														<span class="direktur1">Sugiyanto, S.Pd., M.App., Sc.</span>
														<span class="direktur1">NIP: 19660722 198903 1002</span>
													</div>
												</div-->
						<div id="barcode" style="background:transparent; border:1px solid #cccccc; width:4.7cm; height:0.9cm;">
							<img style="width:4.7cm; height:0.9cm;" src="<?= base_url() ?>barcode.php?mid=<?= $item->f_kodemahasiswa ?>" />
						</div>


					</div>
					<div style="position: absolute; bottom:0.1cm; right:0.2cm; z-index:-9;">
						<div class="direktur">
							<h6 style="margin-bottom: 0.1cm;">Direktur</h6>
							<img src="<?= base_url() ?>assets/images/ktm/ttd2.png" style="position:absolute; margin:0 0 0 0; bottom:0.1cm; left:0.2cm; width:2.2cm; z-index:-9;">
							<p>&nbsp;</p>
							<span class="ttd">&nbsp;</span>
							<span class="direktur1">Warijan, S.Pd., A.Kep., M.Kes.</span>
							<span class="direktur1">NIP: 19630715 198403 1004</span>
						</div>
					</div>
					<!--<div style="position:absolute; bottom:0; left:0.2cm; padding:0 0 0.3em 0;">
												<span class="mb">Masa Berlaku s/d</span>
												<span class="mb">31 Agustus 2015</span>
											</div>
											<img src="<? //=base_url()
														?>assets/images/ktm/ttd2.png" style="position:absolute; margin:0; bottom:0.4cm; left:3.4cm; width:2.2cm; z-index:1;" />-->
					<!--<div style="position:absolute; bottom:0; left:3cm; z-index:9;">
                								<div class="direktur">
                    								<h6>Direktur</h6>
                    								<span class="ttd">&nbsp;</span><br/><br/>
                    								<span class="direktur1">Sugiyanto, S.Pd., M.App., Sc.</span>
                    								<span class="direktur1">NIP: 19660722 198903 1002</span>
                								</div>
            								</div>-->
				</div>

			</div>
		<?
		}
	} else {
		?>
		<!-- <style media="all">
				body{
					margin:0;
					padding:0;
					font-family: Helvetica, Arial, Geneva, "Sans-Serif";
					font-size: 7pt/1em;
					color:#000000;
				}
				h1, h2, h3, h4, h5, h6{ 
					margin:0 0 0 0; padding:0 0 0 0; font-weight: bold;
				}
				div.wrapper{
					position:relative;
				}
				div.kartu{
					position:relative;
				}
				div.content{
					width: 8.6cm; 
					height: 3.55cm; 
					position:absolute;
					padding:0 0 0 0;
					text-align: center;
					margin: 0.1cm 0 0 0; 
					z-index:99;
				}
				div.content h6{
					font-size: 7pt;
					margin: 0.5em 0 0 0;
				}
				p{
					display:inline-table;
					font-size: 6pt;
					margin: 0 0 0 0;
					padding: 0 0 0 0;
					text-align: center;
				}
				#barcode{
					position: absolute;
					bottom: 0.1cm;
					left: 20%;
				}
			</style> -->
		<style media="all">
			body {
				margin: 0;
				padding: 0;
				font-family: Helvetica, Arial, Geneva, "Sans-Serif";
				font-size: 7pt/1em;
				color: #000000;
			}

			h1,
			h2,
			h3,
			h4,
			h5,
			h6 {
				margin: 0 0 0 0;
				padding: 0 0 0 0;
				font-weight: bold;
			}

			div.wrapper {
				position: relative;
			}

			div.kartu {
				position: relative;
			}

			div.content {
				width: 8.6cm;
				height: 3.55cm;
				position: absolute;
				padding: 0 0 0 0;
				text-align: center;
				margin: 0.1cm 0 0 0;
				z-index: 99;
			}

			div.content h6 {
				font-size: 7pt;
				margin: 0.5em 0 0 0;
			}

			p {
				display: inline-table;
				font-size: 6pt;
				margin: 0 0 0 0;
				padding: 0 0 0 0;
				text-align: center;
			}

			span.mb {
				display: block;
				font-size: 6pt;
			}
		</style>
		<?
		if ($this->input->post('f_kodejurusan')) $this->db->where('f_kodejurusan', $this->input->post('f_kodejurusan'));
		if ($this->input->post('f_kodeprogdi')) $this->db->where('f_kodeprogdi', $this->input->post('f_kodeprogdi'));
		if ($this->input->post('f_thangkatan')) $this->db->where('f_thangkatan', $this->input->post('f_thangkatan'));
		if ($this->input->post('f_kodemahasiswa')) $this->db->where('f_kodemahasiswa', $this->input->post('f_kodemahasiswa'));
		if ($this->input->post('f_transfer') == 1) $this->db->where('f_transfer', $this->input->post('f_transfer'));
		$q2 = $this->db->get('ms_datamahasiswa');
		$r = $q2->result();
		foreach ($r as $item) {
			?>
			<!-- <div class="wrapper">

										<div class="kartu" style="display: block; width: 8.6cm; height: 5.4cm; margin:auto;">
											<img src="<?= base_url() ?>assets/images/ktm/bg-blk.jpg" style="position:absolute; width: 8.6cm; height: 5.4cm; z-index:-9;" />
											<div class="content">
												<div style="margin:-0.1cm 0 0 0; padding:0;">&nbsp;</div>
												<h6 style=" display:block; text-align:center; margin:0 0 0 0;"><u>VISI</u></h6>
												<p style="display:block; margin: 0.1cm 0 0.1cm 0; font-size: 11pt;">Mandiri dan Unggul</p>
												<div style="margin:-0.35cm 0 0 0; padding:0;">&nbsp;</div>
												<h6 style="display:block; text-align:center; margin:0;"><u>MISI</u></h6>
												<ol style="display:block; align:left; margin:0.1cm 0 0 0; padding-right:0.5cm; font-size:6pt; text-align:left;">
													<li>Peningkatan pelayanan pendidikan bermutu yang maju, professional dan terpadu dengan didukung teknologi informasi secara terus menerus.</li>
													<li>Mendukung kreativitas, produktivitas dan kualitas Sumber Daya Manusia untuk meningkatkan pelaksanaan Tri Dharma Perguruan Tinggi.</li>
													<li>Peningkatan sarana prasarana yang mutakhir dan memadai.</li>
													<li> Menjaga eksistensi Poltekkes Kemenkes Semarang dengan inovasi program dan peningkatan kerja sama.</li>
												</ol>
											</div>
											<div id="barcode" style="background:#ffffff; border:1px solid #cccccc; width:4.76cm; height:0.78cm;">
												<img style="width:4.76cm; height:0.78cm;" src="<?= base_url() ?>barcode.php?mid=<?= $item->f_kodemahasiswa ?>" />
											</div>
										</div>

									</div> -->
		<?
		}
		?>
		<div class="wrapper">

			<div class="kartu" style="display: block; width: 8.6cm; height: 5.4cm; margin:auto;">
				<img src="<?= base_url() ?>assets/images/ktm/bg-blk.jpg" style="position:absolute; width: 8.6cm; height: 5.4cm; z-index:-9;" />
				<!-- <span style="position:absolute; top:0; left:0; margin:0.1cm 0 0 0.15cm; font-size:5pt;">www.poltekkes-smg.ac.id</span>
							<span style="position:absolute; top:0; right:0; margin:0.1cm 0.15cm 0 0; font-size:5pt">POLTEKKES KEMENKES SEMARANG</span> -->
				<!-- <div class="magnetik" style="position:absolute; width: 8.6cm; height:1.3cm; margin: 0.5cm 0 0 0;"></div> -->
				<div class="content"><b><b><b>
								<div style="margin:-0.1cm 0 0 0; padding:0;">&nbsp;</div>
								<h6 style=" display:block; text-align:center; margin:0 0 0 0;"><u>VISI</u></h6>
								<p style="display:block; margin: 0.1cm 0 0.1cm 0; font-size: 11pt;">Mandiri dan Unggul</p>
								<div style="margin:-0.35cm 0 0 0; padding:0;">&nbsp;</div>
								<h6 style="display:block; text-align:center; margin:0;"><u>MISI</u></h6>
								<ol style="display:block; align:left; margin:0.1cm 0 0 0; padding-right:0.5cm; font-size:6pt; text-align:justify;">
									<li><b>Peningkatan pelayanan pendidikan bermutu yang maju, professional dan terpadu dengan didukung teknologi informasi secara terus menerus.</li>
									<li>Mendukung kreativitas, produktivitas dan kualitas Sumber Daya Manusia untuk meningkatkan pelaksanaan Tri Dharma Perguruan Tinggi.</li>
									<li>Peningkatan sarana prasarana yang mutakhir dan memadai.</li>
									<li>Menjaga eksistensi Poltekkes Kemenkes Semarang dengan inovasi program dan peningkatan kerja sama.</li>
								</ol>
				</div>
				<div style="position:absolute; bottom:0; right:0.5cm; padding:0 0 0.3em 0;">
					<span class="mb">Masa Berlaku s/d</span>
					<span class="mb"><?
										if ($this->input->post('f_semester_masuk') == 1) {
											$bulan_berlaku = "Maret";
										} else {
											$bulan_berlaku = "Agustus";
										}

										if ($this->input->post('f_transfer') == 1) {
											$berlaku = $item->f_thangkatan + 1;
										} else {
											if (strpos($this->input->post('prog'), 'III')) {
												$berlaku = $item->f_thangkatan + 3;
											} else {
												$berlaku = $item->f_thangkatan + 4;
											}
										}
										echo "31 " . $bulan_berlaku . " " . $berlaku;
										?></span>
				</div>
			</div>

		</div>
	<?
	}
	?>
</body>

</html>



<!-- 
@rhudaynesia 
www.rudinesia.com
-->