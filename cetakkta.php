<script>
    $("#tabs ul").idTabs("tabs2");
    $(document).ready(function() {


        $('#aprint').click(function() {
            jsPrintSetup.setPrinter($('#printer_name').val());
            jsPrintSetup.setPaperSizeData($('#paper_size').val());
            // set portrait orientation
            jsPrintSetup.setOption('orientation', $('#orientations').val());
            // set top margins in millimeters
            jsPrintSetup.setOption('marginTop', $('#marginTop').val());
            jsPrintSetup.setOption('marginBottom', $('#marginBottom').val());
            jsPrintSetup.setOption('marginLeft', $('#marginLeft').val());
            jsPrintSetup.setOption('marginRight', $('#marginRight').val());
            // set page header
            jsPrintSetup.setOption('headerStrLeft', 'Si-Madu | Sistem Informasi Manajemen Akademik Terpadu');
            jsPrintSetup.setOption('headerStrCenter', '');
            jsPrintSetup.setOption('headerStrRight', '');
            // set empty page footer
            jsPrintSetup.setOption('footerStrLeft', '');
            jsPrintSetup.setOption('footerStrCenter', '');
            jsPrintSetup.setOption('footerStrRight', '');
            jsPrintSetup.clearSilentPrint();
            jsPrintSetup.setOption('printSilent', 0);
            jsPrintSetup.setOption('printBGColors', 1);

            jsPrintSetup.printWindow(window.frames[0]);
        });

        $('#asettings').click(function() {
            var printers = jsPrintSetup.getPrintersList();
            printers = printers.split(',');
            $('#printer_name').empty();
            $.each(printers, function(index, val) {
                $('#printer_name').append(
                    $('<option></option>').val(val).html(val)
                );
            });

            var paperSizeList = jsPrintSetup.getPaperSizeList();
            $('#paper_size').empty();
            paperSizeList = jQuery.parseJSON(paperSizeList);
            $.each(paperSizeList, function(index, val) {
                var m = "";
                if (val.M == "0") {
                    m = "in";
                } else if (val.M == "1") {
                    m = "mm";
                }
                $('#paper_size').append(
                    $('<option></option>').val(val.PD).html(val.Name + " " + val.W + "x" + val.H + m)
                );
            });
            $("#setings").dialog('open');
        });

        $('#paper_size').change(function() {
            var o = "";
            if ($(this).val().indexOf('potrait') > 1) {
                o = "jsPrintSetup.kPortraitOrientation";
            } else {
                o = "jsPrintSetup.kLandscapeOrientation";
            }
            //$('#orientations').val(o);
            //$('#divIframe').html('<iframe id="page_print" class="'+$(this).val()+'" src="<?= $url ?>" frameborder="0" scrolling="yes"></iframe>');
        });

        $('.or').click(function() {
            $('#orientations').val($(this).val());
        });

        $("#setings").dialog({
            modal: true,
            width: 400,
            height: 400,
            autoOpen: false,
            buttons: {
                "Print": function() {
                    $('#aprint').trigger('click');
                    $(this).dialog("close");

                },
                Cancel: function() {
                    $(this).dialog("close");
                }
            }
        });

        if (typeof(jsPrintSetup) == 'undefined') {
            $('#warning').show();
            $('#print_preview').hide();
        } else {
            $('#warning').hide();
            //$('#print_preview').show();

        }


        <?
        if ($this->session->userdata('f_kodefakultas') == "") {
            ?>
            combo_fakultas();
        <?
        } else {
            ?>combo_jurusan();
        <?
        }
        ?>

        <?
        if ($this->session->userdata('f_kodejurusan') == "") {
            ?>
            $("#f_kodejurusan").combobox();
        <?
        } else {
            ?>combo_progdi();
        <?
        }
        ?>

        <?
        if ($this->session->userdata('f_kodeprogdi') == "") {
            ?>
            $("#f_kodeprogdi").combobox();
        <?
        }
        ?>

        $("#f_kodekurikulum").combobox();
        $("#f_kodejadwal").combobox();

        $(".f_kodefakultas").blur(function() {
            combo_jurusan();
        });

        $(".f_kodejurusan").blur(function() {
            combo_progdi();
        });


        $("#f_kodefakultas").change(function() {
            $(".f_kodefakultas").val($("#f_kodefakultas option:selected").text());
        });

        $("#f_kodejurusan").change(function() {
            $(".f_kodejurusan").val($("#f_kodejurusan option:selected").text());
        });

        $("#f_kodeprogdi").change(function() {
            $(".f_kodeprogdi").val($("#f_kodeprogdi option:selected").text());
        });

        $('.f_kodejurusan').blur(function() {
            $('#jur').val($('.f_kodejurusan').val());
        });

        $('#tampil').click(function() {
            $('#jur').val($('.f_kodejurusan').val());
            $('#prog').val($('.f_kodeprogdi').val());
            $('#form').submit();
        });

    });
</script>
<h3><img src="<?= base_url() ?>assets/images/page_table_chart.png" align="absbottom" /><?= $title ?></h3>
<div id="setings" title="Printer Settings">
    <input type="hidden" name="orientations" id="orientations" value="0">
    <table width="100%" style="margin-top: 10px" cellpadding="3" border="0">
        <tr>
            <td colspan="2">Paper Orientation</td>
        </tr>
        <tr>
            <td colspan="2"><input type="radio" name="or" class="or" value="0" checked="checked">
                Potrait
                <img src="<?= base_url() ?>assets/images/paper_p.png" align="middle" />
                <input type="radio" name="or" class="or" value="1">
                Landscape
                <img src="<?= base_url() ?>assets/images/paper_l.png" align="middle" />
            </td>
        </tr>
        <tr>
            <td colspan="2">Printer Name</td>
        </tr>
        <tr>
            <td colspan="2"><select id="printer_name">
                </select>
            </td>
        </tr>
        <tr>
            <td width="30%">Paper Size</td>
            <td width="70%" class="row">: <select id="paper_size"></select>
            </td>
        </tr>
        <!--tr>
            <td>Font Size</td>
            <td>: <select id="font_size">
                </select>
            </td>    
        </tr-->
        <tr>
            <td align="center">Margin Top <br><input type="text" id="marginTop" class="input small2" value="15">mm</td>
            <td align="left">Margin Bottom <br><input type="text" id="marginBottom" class="input small2" value="15">mm</td>
        </tr>
        <tr>
            <td align="center">Margin Left <br><input type="text" id="marginLeft" class="input small2" value="15">mm</td>
            <td align="left">Margin Right <br><input type="text" id="marginRight" class="input small2" value="15">mm</td>
        </tr>
    </table>



</div>
<div id="tabs" class="tabs">
    <div class="div" id="tab2">
        <form id="form" name="form" action="<?= $url ?>" target="_blank" method="post">
            <input type="hidden" name="jur" id="jur" value="">
            <input type="hidden" name="prog" id="prog" value="">
            <?
            if ($this->session->userdata('f_kodefakultas') != "") {
                ?>
                <input type="hidden" name="f_kodefakultas" id="f_kodefakultas" value="<?= $this->session->userdata('f_kodefakultas') ?>">
            <?
            } else {
                ?>
                <label>Fakultas</label>
                <select id="f_kodefakultas" name="f_kodefakultas" title="select">
                    <option value=""></option>
                </select>
            <?
            }
            ?>
            <table width="100%" border="0" cellspacing="0" cellpadding="2" style="border-collapse:collapse" bordercolor="#CCCCCC">
                <tr>
                    <td width="10%">Jurusan</td>
                    <td width="90%">:&nbsp;
                        <?
                        if ($this->session->userdata('f_kodejurusan') != "") {
                            ?>
                            <input type="hidden" name="f_kodejurusan" id="f_kodejurusan" value="<?= $this->session->userdata('f_kodejurusan') ?>">
                            <span class="skd"><?= $this->core_model->getname_jurusan($this->session->userdata('f_kodejurusan')) ?></span>
                        <?
                        } else {
                            ?>
                            <select id="f_kodejurusan" name="f_kodejurusan">
                                <option value=""></option>
                            </select>
                        <?
                        }
                        ?>
                    </td>
                </tr>
                <tr>
                    <td>Program Studi</td>
                    <td>:&nbsp;
                        <?
                        if ($this->session->userdata('f_kodeprogdi') != "") {
                            ?>
                            <input type="hidden" name="f_kodeprogdi" id="f_kodeprogdi" value="<?= $this->session->userdata('f_kodeprogdi') ?>">
                            <span class="skd"><?= $this->core_model->getname_progdi($this->session->userdata('f_kodeprogdi')) ?></span>
                        <?
                        } else {
                            ?>
                            <select id="f_kodeprogdi" name="f_kodeprogdi">
                                <option value=""></option>
                            </select>
                        <?
                        }
                        ?></td>
                </tr>
                <tr>
                    <td>Tahun Angkatan</td>
                    <td>:&nbsp;
                        <input type="text" name="f_thangkatan" id="f_thangkatan" value="<?= date('Y') ?>" class="input small"></td>
                </tr>
                <tr>
                    <td>Mahasiswa Transfer?</td>
                    <td>:&nbsp;
                        <select id="f_transfer" name="f_transfer" title="select">
                            <option value="0">Tidak</option>
                            <option value="1">Ya</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>Semester Masuk</td>
                    <td>:&nbsp;
                        <select id="f_semester_masuk" name="f_semester_masuk" title="select">
                            <option value="0">Ganjil</option>
                            <option value="1">Genap</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>NIM</td>
                    <td>:&nbsp;
                        <input type="text" name="f_kodemahasiswa" id="f_kodemahasiswa" value="" class="input"></td>
                </tr>
                <tr>
                    <td>Tampilan</td>
                    <td>:&nbsp;
                        <select name="tampilan" id="tampilan" class="select">
                            <option value="1">Depan</option>
                            <option value="2">Belakang</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td colspan="2"><input type="button" name="tampil" id="tampil" class="button" value="Tampilkan Data"></td>
                </tr>
            </table>
        </form>
        <div id="warning" style="text-align: center">
            <h4>SILAKAN download and install JsPrint Firefox Plugins Terlebih Dahulu. Borwser yang digunakan harus Firefox. <br>
                <a href="<?= base_url() ?>jsprintsetup-0.9.2.xpi" style="color:#005a00"><img src="<?= base_url() ?>assets/images/download.png"><br>Download & Install</a></h4>
        </div>
        <div id="print_preview" style="display:none">
            <div id="print-modal-controls">
                <a href="#" id="aprint" class="print" title="Print Page">Print page</a>
                <a href="#" id="asettings" class="close" title="Settings">Settings</a>
            </div>
            <div id="divIframe" style="display: none;">
                <iframe id="page_print" name="page_print" class="page_letter_potrait" src="" frameborder="0" scrolling="yes"></iframe>
            </div>

        </div>
    </div>
</div>