
<?php
$this->load->helper("Tanggalku_helper");

?>
<?php
    include_once BASEPATH.'../assets/lib/fpdf/fpdf.php';
	
    	$pdf=new FPDF();
		$pdf->Addpage('landscape','Legal');

		$pdf->SetFont('Times','',10);
		$pdf->MultiCell(0,5, 'LAPORAN DATA PEMESANAN PAKET WISATA',0,'C');
		$pdf->MultiCell(0,5, ' ',0,'C');
		$pdf->MultiCell(0,5, ' ',0,'C');
		
		$pdf->SetFont('Times','',9);
		$pdf->MultiCell(0,5, $label,0,'L');

		$pdf->SetLineWidth(0);
		$pdf->SetFont('Times','B',9);
		$pdf->SetFillColor(204,204,204);

		$pdf->Cell(10,5,'No',1,0,'C',1);
		$pdf->Cell(30,5,'ID Pemesanan',1,0,'C',1);
		$pdf->Cell(40,5,'Nama Pelanggan',1,0,'C',1);
		$pdf->Cell(45,5,'Paket Wisata',1,0,'C',1);
		$pdf->Cell(35,5,'Jml Orang Dewasa',1,0,'C',1);
		$pdf->Cell(35,5,'Jml Anak -Anak',1,0,'C',1);
		$pdf->Cell(25,5,'Total Harga',1,0,'C',1);
		$pdf->Cell(25,5,'Status',1,1,'C',1);

		$pdf->SetFillColor(255,255,255);
		$no=1;
		$tharga =0;
		$Jharga =0;
		$jdewasa = 0;
		$janak = 0;
		foreach ($result as $row) {
			$harga = $row->harga*($row->jml_dewasa+$row->jml_anak);
			$Jharga=$Jharga+$harga;
			$jdewasa = $jdewasa + $row->jml_dewasa;
			$janak = $janak + $row->jml_anak;
			if($row->sts_pesan=="2"){ $sts = "Lunas";$tharga=$tharga+$harga;}else{$sts = "Belum Lunas";}
            	$pdf->Cell(10,5,$no,1,0,'C',1);
				$pdf->Cell(30,5,$row->id_reservasi,1,0,'C',1);
				$pdf->Cell(40,5,$row->nama_kustomer,1,0,'C',1);
				$pdf->Cell(45,5,$row->nama_paket,1,0,'C',1);
				$pdf->Cell(35,5,$row->jml_dewasa,1,0,'C',1);
				$pdf->Cell(35,5,$row->jml_anak,1,0,'C',1);
				$pdf->Cell(25,5,rupiah($harga),1,0,'C',1);
				$pdf->Cell(25,5,$sts,1,1,'C',1);
				$no++;
            }
        $pdf->Cell(125,5,"Jumlah",1,0,'L',1);
        $pdf->Cell(35,5,$jdewasa,1,0,'C',1);
		$pdf->Cell(35,5,$janak,1,0,'C',1);
		$pdf->Cell(25,5,rupiah($Jharga),1,0,'C',1);
		$pdf->Cell(25,5,' ',1,1,'C',1);
        $pdf->SetFont('Times','',10);
        $pdf->Ln(6);
        $pdf->MultiCell(0,8, 'Total Pendapatan : '.rupiah($tharga),0,'l');
        
		$pdf->Output();	
?>
