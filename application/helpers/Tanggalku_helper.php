<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	function tanggal($tanggal) {
	    $array_bulan = array("Januari", "Februari", "Maret",
	        "April", "Mei", "Juni",
	        "Juli", "Agustus", "September",
	        "Oktober", "Nopember", "Desember"
	        );

	    $tanggalnya = substr($tanggal, 8, 2);
	    $bulannya = $array_bulan[ceil(substr($tanggal, 5, 2)) - 1];
	    $tahunnya = substr($tanggal, 0, 4);
	    $jamnya = substr($tanggal, 11, 2);
	    $menitnya = substr($tanggal, 14, 2);
	    $detiknya = substr($tanggal, 17, 2);
	    if( $jamnya!=""){
	        $tglsekarang = $tanggalnya . " " . $bulannya . " " . $tahunnya . " " . $jamnya . ":" . $menitnya . " WIB";
	    }else{
	        $tglsekarang = $tanggalnya . " " . $bulannya . " " . $tahunnya;
	    }

	    return $tglsekarang;
	}


	function rupiah($uang) 
	{
	    $rp = "";
	    $digit = strlen($uang);

	    while ($digit > 3) {
	        $rp = "." . substr($uang, -3) . $rp;
	        $lebar = strlen($uang) - 3;
	        $uang = substr($uang, 0, $lebar);
	        $digit = strlen($uang);
	    }
	    $rp = $uang . $rp . ",-";
	    return "Rp. " . $rp;
	}

	function konverstanggal($tanggal) 
	{

	    $array_bulan = array("Januari", "Februari", "Maret",
	        "April", "Mei", "Juni",
	        "Juli", "Agustus", "September",
	        "Oktober", "Nopember", "Desember");

	    $tanggalnya = substr($tanggal, 8, 2);
	    $bulannya = $array_bulan[ceil(substr($tanggal, 5, 2)) - 1];
	    $tahunnya = substr($tanggal, 0, 4);
	    $jamnya = substr($tanggal, 11, 2);
	    $menitnya = substr($tanggal, 14, 2);
	    $detiknya = substr($tanggal, 17, 2);
	    if( $jamnya!=""){
	        $tglsekarang = $tanggalnya . " " . $bulannya . " " . $tahunnya . " " . $jamnya . ":" . $menitnya;
	    }else{
	        $tglsekarang = $tanggalnya . " " . $bulannya . " " . $tahunnya;
	    }

	    return $tglsekarang;
	}