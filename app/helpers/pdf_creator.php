<?php

    
    // Create pdf with the Reservation info
    function pdfReservation($data) {
        require APPROOT.'/fpdf/fpdf.php';
        $pdf = new FPDF();

        $lineBreak = 15.81;
		$lb = 17.11;
		$train_name = $data['train_name'];
		$from = $data['start_from'];
	  	$to = $data['end_in'];
	  	$train_id = $data['train_id'];
	  	$date = $data['trip_date'];
	  	$depart_time = $data['depart_time'];
	  	$end_time = $data['end_time'];
		$price = $data['price'];
		$full_name = $data['client_full_name'];
	  	$email = $data['client_email'];
        $image1 = URLROOT.'/public/img/signature.png';

		$pdf->AddPage();
		$pdf->SetFont('Arial','B',16);
		$pdf->Cell(0,10,"Ticket for Train Trip",1,1,'C');
		$pdf->Ln($lineBreak);
		$pdf->Write(5,'Ticket No' . $data['trip_id'] . ' Details','C');
		$pdf->SetFont('Arial','',10);
		$pdf->Ln($lineBreak);
		$pdf->Cell(90,10,"Train Name :",1,0,'C');
		$pdf->Cell(90,10,$train_name,1,1,'C');
		$pdf->Cell(90,10,"Full Name :",1,0,'C');
		$pdf->Cell(90,10,$full_name,1,1,'C');
		$pdf->Cell(90,10,"From :",1,0,'C');
		$pdf->Cell(90,10,$from,1,1,'C');
		$pdf->Cell(90,10,"To :",1,0,'C');
		$pdf->Cell(90,10,$to,1,1,'C');
		$pdf->Cell(90,10,"Train No :",1,0,'C');
		$pdf->Cell(90,10,$train_id,1,1,'C');
		$pdf->Cell(90,10,"Depart Time :",1,0,'C');
		$pdf->Cell(90,10,$depart_time,1,1,'C');
		$pdf->Cell(90,10,"End Time :",1,0,'C');
		$pdf->Cell(90,10,$end_time,1,1,'C');
		$pdf->Cell(90,10,"Date :",1,0,'C');
		$pdf->Cell(90,10,$date,1,1,'C');
		$pdf->Cell(90,10,"Email :",1,0,'C');
		$pdf->Cell(90,10,$email,1,1,'C');
		$pdf->Cell(90,10,"Price :",1,0,'C');
		$pdf->Cell(90,10,$price.'DH',1,1,'C');
		$pdf->Ln($lineBreak);
		$pdf->SetFont('Arial','b',12);
		$pdf->Write(5,'Date and Time: '. (isset($data['reservation_date']) ? $data['reservation_date'] : date("Y-m-d h:i:s")));
		$pdf->Ln($lineBreak);
        $pdf->Cell( 40, 40, $pdf->Image($image1, $pdf->GetX(), $pdf->GetY(), 33.78), 0, 0, 'L', false );
		$pdf->Ln($lb);
		$pdf->Write(5,'Authorized Signature');

        $fill = "$data[client_full_name]_train_reservation".'.pdf';
		$pdf->Output($fill, 'D');
			
    }