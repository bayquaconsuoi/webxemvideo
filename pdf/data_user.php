<?php
$db = new PDO('mysql:host=localhost;dbname=cloneyoutube','root','');

require('tfpdf.php');

$pdf = new tFPDF();
$pdf->AddPage();

// Add a Unicode font (uses UTF-8)
$pdf->AddFont('DejaVu','','DejaVuSansCondensed.ttf',true);
$pdf->SetFont('DejaVu','',14);

$pdf->SetFont('dejaVu','',14);
$pdf->Ln(10);
$pdf->Cell(200,5,'Trung\'s YOUTUBE',0,0,'C');
$pdf->Ln(10);

$pdf->Cell(200,5,'THỐNG KÊ NGƯỜI DÙNG',0,0,'C');
$pdf->Ln(10);

$pdf->Cell(16,10,'ID',1,0,'C');
$pdf->Cell(40,10,'Tên người dùng',1,0,'C');
$pdf->Cell(40,10,'Số video đã đăng',1,0,'C');
$pdf->Cell(30,10,'Số lượt xem',1,0,'C');
$pdf->Cell(60,10,'Ngày tham gia',1,0,'C');
$pdf->Ln();

$stmt = $db->query('SELECT account.id, account.user_name, account.created_at, sum(video.view_count) as view, count(video.user_id) as video FROM account LEFT JOIN video ON account.id = video.user_id GROUP BY account.id');
while($data = $stmt->fetch(PDO::FETCH_OBJ)){
    $pdf->Cell(16,10,$data->id,1,0,'C');
    $pdf->Cell(40,10,$data->user_name,1,0,'C');
    $pdf->Cell(40,10,$data->video,1,0,'C');
    $pdf->Cell(30,10,$data->view,1,0,'C');
    $pdf->Cell(60,10,$data->created_at,1,0,'C');
    $pdf->Ln();
}

$pdf->Output();
?>
