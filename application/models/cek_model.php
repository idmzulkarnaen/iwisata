<?php
class Cek_model extends CI_Model{
    function cekadmin()
    {
        if(!$this->session->userdata('idadmin'))
        {
            redirect('admin/login');
        }
    }

    function cekoperator()
    {
        if(!$this->session->userdata('idoperator'))
        {
            redirect('operator/login');
        }
    }

    function cekkustomer()
    {
        if(!$this->session->userdata('idpelanggan'))
        {
            redirect('masuk');
        }
    }

    function bulan($bln) {

        $array_bulan = array("Januari", "Februari", "Maret",
            "April", "Mei", "Juni",
            "Juli", "Agustus", "September",
            "Oktober", "Nopember", "Desember");

        $bulannya = $array_bulan[ceil($bln) - 1];

        return $bulannya;
    }
	
}
?>