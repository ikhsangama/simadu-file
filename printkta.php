<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<!-- 
HTML Template KTM Poltekkes Kemenkes Semarang
created by Ikhsan Wisnuadji G, 17 Juli 2019
-->

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="author" content="Ikhsan Wisnuadji G" />
	<meta name="description" content="0719.<?= $item->f_kodemahasiswa ?>" />
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
				width: 8.65cm;
				height: 5.4cm;
				position: relative;
				padding: 0 0 0 0;
				margin: 0 0 0 0;
				z-index: 99;
			}

			#barcode {
				position: absolute;
				bottom: 0cm;
			}
		</style>

		<?
		if ($this->input->post('f_kodemahasiswa')) $this->db->where('f_kodemahasiswa', $this->input->post('f_kodemahasiswa'));
		$q2 = $this->db->get('ms_datamahasiswa');
		$r = $q2->result();
		foreach ($r as $item) {
			?>

			<div class="wrapper">

				<div class="kartu" style="display: block; width: 8.65cm; height: 5.4cm; border-top:1px solid white; margin:auto;">
					<img src="<?= base_url() ?>assets/images/kta/bg-2.jpg" style="position:absolute;width: 8.7cm; height: 5.38cm; z-index:-9999;" />
					<img src="<?= base_url() ?>foto/<?= $item->f_kodemahasiswa ?>" style="position:absolute; width: 1.5cm; height: 2cm; top: 1.5cm; left: 0.3cm; z-index:99;" class="foto" />
					<div class="content">
						<h6 style="margin: auto; width: 50%; padding-left:1cm; padding-top:2.2cm"><u><?= $item->f_namamahasiswa ?></u></h6>
						<!-- GANTI TAHUN LULUSAN DISINI -->
						<h6 style="margin: auto; width: 50%; padding-left:1cm;">0819.<?= $item->f_kodemahasiswa ?></h6>
						<!-- .GANTI TAHUN LULUSAN DISINI -->
						<div style="padding-left:0.3cm; padding-top:1.1cm">
							<div id="barcode" style="background:transparent;">
								<img style="width:1.1cm; height:1.1cm; border:0.2cm solid white" src="https://api.qrserver.com/v1/create-qr-code/?size=150x150&data=0819.<?= $item->f_kodemahasiswa ?>" />
							</div>
						</div>
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
					width: 8.7cm;
					height: 5.38cm;
					position: relative;
					padding: 0 0 0 0;
					margin: 0 0 0 0;
					z-index: 99;
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
				<div class="kartu" style="width: 8.65cm; height: 5.4cm; border-top:1px solid white; margin:auto;">
					<img src="<?= base_url() ?>assets/images/kta/bg-blkg.png" style="position:absolute; width: 8.6cm; height: 5.4cm; z-index:-9;" />
					<div class="content">
						<div>
							<ul style="display:block; align:left; margin:0.1cm 0 0 0; padding-right:1cm; padding-top:1cm; font-size:6pt; text-align:justify">
								<li><b>Kartu ini adalah identitas Ikatan Alumni Politeknik Kesehatan Kemenkes Semarang</b></li>
								<li><b>Apabila kartu ini rusak/ hilang, harap hubungi Sekretariat IKAPOLSEMAR</b></li>
								<li><b>Apabila menemukan kartu ini, harap mengembalikan ke Sekretariatan IKAPOLSEMAR</b></li>
								<li><b>Dengan Kartu Ini mendapatkan fasilitas kemudahan berupa, menginap di Guest House
										Kampus 1 dan Mengakses Perpustakaan di Seluruh Poltekkes Kemenkes Semarang
									</b></li>
							</ul>
						</div>
						<div style="font-size:5pt; align:left; padding-left:0.7cm; padding-top:0.5cm">
							<p>
								<b>Sekretariat</b> <br>
								Direktorat Poltekkes Kemenkes Semarang <br>
								Jl. Tirto Agung, Pedalangan, Banyumanik, Semarang <br>
								Telp./ Fax (024) - 7460274 <br>
								website : www.poltekkes-smg.ac.id <br>
							</p>
						</div>
						<div style="position: absolute; bottom:0.25cm; right:0.8cm; font-size:5pt;">
							<p style="text-align:center">
								Semarang, 01 Agustus 2019 <br>
								<b>Ketua</b>
								<br><br><br><br><br>
								Rochyatun, S.Kep., Ns., MARS
							</p>
						</div>
						<img style="position:absolute; width:1cm; right:1.4cm; bottom:0.6cm" src="<?= base_url() ?>assets/images/kta/ttd2.png">
					</div>

				</div>

			</div>
		<?
		}
		?>
</body>

</html>



<!-- 
@ikhsangama 
ikhsangama@asia.com
-->