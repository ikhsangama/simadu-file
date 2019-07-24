<?php

class Mahasiswa extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('master/master_model');
        $this->load->model('master/nilai_model');
        $this->load->model('mahasiswa_model');
        if (!$this->session->userdata('sid')) {
            echo "<script>top.location='" . base_url() . "auth_core';</script>";
        }
    }

    function Mahasiswa()
    { }

    function datamahasiswa()
    {
        $this->load->model('datamahasiswa_model');
        $this->datamahasiswa_model->load();
    }

    function uploaddokumenmahasiswa()
    {
        $this->load->model('utility/jenisdokumen_model');
        $this->load->model('datamahasiswa_model');
        $this->load->view('uploadrepo');
    }

    function cutimahasiswa()
    {
        $this->load->model('cutimahasiswa_model');
        $this->cutimahasiswa_model->load();
    }

    function aktivasicutimahasiswa()
    {
        $this->load->model('cutimahasiswa_model');
        $this->cutimahasiswa_model->aktivasi();
    }


    function mahasiswa_combo()
    {
        $this->mahasiswa_model->combo_mahasiswa();
    }
    function mahasiswa_combo_alih()
    {
        $this->mahasiswa_model->combo_mahasiswa_alih();
    }
    function mahasiswa_combo2()
    {
        $this->mahasiswa_model->combo_mahasiswa2();
    }

    function listmahasiswa()
    {
        $this->mahasiswa_model->list_mahasiswa();
    }
    /**
     * End Mahasiswa
     */

    function aktivasimahasiswa()
    {
        $this->load->model('aktivasimahasiswa_model');
        $this->aktivasimahasiswa_model->load();
    }

    function importsipenmaru()
    {
        $this->load->model('importsipenmaru_model');
        $this->importsipenmaru_model->load();
    }

    function skpi()
    {
        $this->load->model('skpi_model');
        $this->skpi_model->load();
    }

    function form_skpi()
    {
        $nim  = $this->input->post('nim');
        $data = $this->core_model->get_data_mhs($nim);
        // echo 'testing';
        $this->load->view('form_skpi', $data);
    }

    function skkm()
    {
        $this->load->model('skkm_model');
        $this->skkm_model->load();
    }

    function verify_skkm()
    {
        $this->load->model('master/skkm_model');
        $this->load->model('mhs/mhs_model');
        $nim  = $this->input->post('nim');
        $data['nim'] = $nim;
        $this->load->view('verify_skkm', $data);
    }

    function rekapskkm()
    {
        $this->load->model('monitorskkm_model');
        $this->monitorskkm_model->load();
    }

    function listmonitorskkm()
    {
        $this->load->model('monitorskkm_model');
        $jurusan     = $this->input->post('f_kodejurusan');
        $prodi       = $this->input->post('f_kodeprogdi');
        $thangkatan  = $this->input->post('f_thangkatan');
        $data['jurusan'] = $this->core_model->getname_jurusan($jurusan);
        $data['prodi']   = $this->core_model->getname_progdi($prodi);
        $data['thangkatan'] = $thangkatan;
        $data['mhs']     = $this->monitorskkm_model->getlistskkm($jurusan, $prodi, $thangkatan);
        $this->load->view('listskkm', $data);
    }

    function prestasi()
    {
        $this->load->model('prestasi_model');
        $this->prestasi_model->load();
    }

    function verify()
    {
        $id   = $this->input->post('id');
        $ver  = $this->input->post('verify');

        if ($ver) {
            $data['verified_at'] = date('Y-m-d H:i:s');
            $data['verified_by'] = $this->session->userdata('iduser');
        } else {
            $data['verified_at'] = '0000-00-00';
            $data['verified_by'] = '';
        }
        $data['f_status'] = $ver;
        $updt = $this->db->where('id', $id)->update('tb_skkm', $data);

        echo ($updt) ? '1' : '0';
    }

    function file_mhs()
    {
        $nim  = $this->input->post('nim');
        $this->load->model('utility/jenisdokumen_model');
        $data['f_kodemahasiswa'] = $nim;
        $this->load->view('list_repo', $data);
    }

    function cetakktm()
    {
        $uri = $this->uri->segment(3);
        $dt['title'] =  "Cetak KTM";
        $dt['url'] = base_url() . "mahasiswa/cetakktm/print";
        switch ($uri) {
            case "print": {
                    $data['nmjurusan'] = $this->core_model->getarray_jurusan();
                    $data['nmprogdi'] = $this->core_model->getarray_progdi();
                    $this->load->view('printktm', $data);
                };
                break; ###end loaddata            

            default:
                $this->load->view('cetakktm', $dt);
                break;
        }
    }

    // Ikhsan
    function cetakkta()
    {
        $uri = $this->uri->segment(3);
        $dt['title'] =  "Cetak KTA";
        $dt['url'] = base_url() . "mahasiswa/cetakkta/print";
        switch ($uri) {
            case "print": {
                    $data['nmjurusan'] = $this->core_model->getarray_jurusan();
                    $data['nmprogdi'] = $this->core_model->getarray_progdi();
                    $this->load->view('printkta', $data);
                };
                break; ###end loaddata            

            default:
                $this->load->view('cetakkta', $dt);
                break;
        }
    }
    // .Ikhsan

    function kelulusan($view = 'form')
    {
        $this->load->model('master/progdi_model');
        switch ($view) {
            case "form": {
                    $this->load->view('kelulusan_form');
                };
                break; ###end loaddata            
            case "save": {
                    $input = $_POST;
                    foreach ($input['f_aktif'] as $nim => $f_aktif) {
                        /*
                    $arr_upd = array(
                        'f_aktif' => $f_aktif,
                        'f_no_sk_lulus' => @$input['f_no_sk_lulus'][$nim],
                        'f_tgl_sk_lulus' => @$input['f_tgl_sk_lulus'][$nim],
                        'f_thlulus' => @explode('-', $input['f_tgl_sk_lulus'][$nim])[0],
                        'f_no_ijasah' => @$input['f_no_ijasah'][$nim],
                        'f_tgl_ijasah' => @$input['f_tgl_ijasah'][$nim],
                        'f_lulus' => (($f_aktif == 'Lulus')?'1':'0'),
                    );
                     * 
                     */
                        $q = "update ms_datamahasiswa set "
                            . "f_aktif = '$f_aktif' , "
                            . "f_no_sk_lulus = '" . $input['f_no_sk_lulus'][$nim] . "' , "
                            . "f_tgl_sk_lulus = '" . $input['f_tgl_sk_lulus'][$nim] . "' ,"
                            . "f_thlulus = '" .  substr($input['f_tgl_sk_lulus'][$nim], 0, 4) . "' , "
                            . "f_no_ijasah = '" . $input['f_no_ijasah'][$nim] . "' ,"
                            . "f_tgl_ijasah = '" . $input['f_tgl_ijasah'][$nim] . "', "
                            . "f_lulus = '" . (($f_aktif == 'Lulus') ? '1' : '0') . "' where f_kodemahasiswa = '$nim' ";
                        if ($nim != '') {
                            $this->db->query($q);
                        }
                    }
                    echo 'Berhasil Disimpan';
                };
                break; ###end loaddata            
            case "post": {
                    $input = $_POST;
                    $this->load->view('kelulusan_submit', $input);
                };
                break; ###end loaddata            

            case "print": {
                    $data['nmjurusan'] = $this->core_model->getarray_jurusan();
                    $data['nmprogdi'] = $this->core_model->getarray_progdi();
                    $this->load->view('printktm', $data);
                };
                break; ###end loaddata            

            default:
                $this->load->view('cetakktm');
                break;
        }
    }


    function uploadfoto()
    {
        $this->load->model('uploadfoto_model');
        $this->uploadfoto_model->load();
    }

    function upload_data()
    {
        $id_u = $this->session->userdata('iduser');
        if (isset($_FILES['f_namadokumen']['name'])) {
            $input['f_kodemahasiswa'] = $this->input->post('f_kodemahasiswa');
            $input['f_judul'] = $this->input->post('f_judul');
            $input['f_jenisdokumen'] = $this->input->post('f_jenisdokumen');

            $config['upload_path']   = FCPATH . 'repo_mhs';
            $config['allowed_types'] = ['pdf'];
            $config['max_size']      = '5000000';
            $temp  = explode('.', $_FILES['f_namadokumen']['name']);
            $ext   = end($temp);
            @unlink(FCPATH . 'repo/' . $_FILES['name'] . '-' . $id_u . '.' . $ext);

            if (in_array($ext, $config['allowed_types']) && $_FILES['f_namadokumen']['size'] <= $config['max_size']) {
                $nama = str_replace(' ', '-', $_FILES['f_namadokumen']['name']);
                $nama = str_replace('.pdf', '', $nama);
                if (move_uploaded_file($_FILES['f_namadokumen']['tmp_name'], FCPATH . 'repo_mhs/' . $nama . '-' . $this->input->post('f_kodemahasiswa') . '.' . $ext)) {
                    $input['f_path'] = FCPATH . 'repo_mhs/' . $nama . '-' . $this->input->post('f_kodemahasiswa') . '.' . $ext;
                    $input['f_namadokumen'] = $nama . '-' . $this->input->post('f_kodemahasiswa') . '.' . $ext;
                    $input['f_uploader'] = $id_u;
                    $this->db->insert('ms_repo_mhs', $input);
                    echo '1';
                }
            } else {
                echo 'Gagal Upload';
            }
        }
    }

    function delete_file()
    {
        $this->db->delete('ms_repo_mhs', array('f_kodemahasiswa' => $this->input->post('f+f_kodemahasiswa'), 'f_path' => $this->input->post('f_path')));
        @unlink($this->input->post('f_path'));
        echo '1';
    }

    function del_penghargaan()
    {
        $id = $this->input->post('id');
        // return $this->db->update('tb_skpi_penghargaan', array('f_kodemahasiswa' => '', 'f_penghargaan' => ''), array('id' => $id));
        return 1;
    }

    function del_organisasi()
    {
        $id = $this->input->post('id');
        // return $this->db->update('tb_skpi_organisasi', array('f_kodemahasiswa' => '', 'f_organisasi' => ''), array('id' => $id));
        return 1;
    }

    function del_magang()
    {
        $id = $this->input->post('id');
        // return $this->db->update('tb_skpi_magang', array('f_kodemahasiswa' => '', 'f_magang' => ''), array('id' => $id));
        return 1;
    }

    function del_sertifikasi()
    {
        $id = $this->input->post('id');
        // return $this->db->update('tb_skpi_sertifikasi', array('f_kodemahasiswa' => '', 'f_sertifikasi' => ''), array('id' => $id));
        return 1;
    }

    function del_karakter()
    {
        $id = $this->input->post('id');
        // return $this->db->update('tb_skpi_karakter', array('f_kodemahasiswa' => '', 'f_karakter' => ''), array('id' => $id));
        return 1;
    }
}
