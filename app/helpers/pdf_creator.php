<?php

    
    // Create pdf with the Reservation info
    function pdfReservation($data) {
        require APPROOT.'/fpdf/fpdf.php';
        $pdf = new FPDF();

        $lineBreak=15.81;
		$lb=17.11;
		$from=$data['trip']->from;
	  	$to=$data['trip']->to;
	  	$train_id=$data['trip']->id;
	  	$date=$data['trip']->trip_date;
		$full_name=$user_info['client_full_name'];
	  	$depart_time=$data['trip']->depart_hour;
	  	$end_time=$data['trip']->end_hour;
	  	$email=$user_info['client_email'];
        $image1 = URLROOT.'/public/img/signature.png';

		$pdf->AddPage();
		$pdf->SetFont('Arial','B',16);
		$pdf->Cell(0,10,"Ticket for Train Trip",1,1,'C');
		$pdf->Ln($lineBreak);
		$pdf->Write(5,'Ticket Details','C');
		$pdf->SetFont('Arial','',10);
		$pdf->Ln($lineBreak);
		$pdf->Cell(90,10,"First Name :",1,0,'C');
		$pdf->Cell(90,10,$full_name,1,1,'C');
		$pdf->Cell(90,10,"From :",1,0,'C');
		$pdf->Cell(90,10,$from,1,1,'C');
		$pdf->Cell(90,10,"To :",1,0,'C');
		$pdf->Cell(90,10,$to,1,1,'C');
		$pdf->Cell(90,10,"Bus No. :",1,0,'C');
		$pdf->Cell(90,10,$train_id,1,1,'C');
		$pdf->Cell(90,10,"Depart Time :",1,0,'C');
		$pdf->Cell(90,10,$depart_time,1,1,'C');
		$pdf->Cell(90,10,"End Time :",1,0,'C');
		$pdf->Cell(90,10,$end_time,1,1,'C');
		$pdf->Cell(90,10,"Date :",1,0,'C');
		$pdf->Cell(90,10,$date,1,1,'C');
		$pdf->Cell(90,10,"Email :",1,0,'C');
		$pdf->Cell(90,10,$email,1,1,'C');
		$pdf->Ln($lineBreak);
        $pdf->Cell( 40, 40, $pdf->Image($image1, $pdf->GetX(), $pdf->GetY(), 33.78), 0, 0, 'L', false );
		$pdf->Ln($lb);
		$pdf->Write(5,'Authorized Signature');

        $fill = "$user_info[client_full_name]_train_reservation".'.pdf';
		$pdf->Output($fill, 'D');	
    }