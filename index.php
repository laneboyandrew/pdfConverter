<?php
require_once __DIR__ . '/../vendor/autoload.php';

use Dompdf\Dompdf;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

$app = $app = new Silex\Application();
$app->get('/converter', function (Request $request) {

        $dompdf = new Dompdf();
    $dompdf->loadHtml("govnooo");
    $dompdf->setPaper('A4', 'landscape');
    $dompdf->render();
   $output = $dompdf->output();
    file_put_contents('dompdf.pdf', $output);
    $mail = new PHPMailer(true);
    try{
        $mail->SMTPDebug = SMTP::DEBUG_SERVER;
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->Port = 587;
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->SMTPAuth = true;
        $mail->Username = 'mylifewebdev@gmail.com';
        $mail->Password = 'Cs1/6sours';
        $mail->From = 'mylifewebdev@gmail.com';
        $mail->FromName = 'Laneboy Andrew';
        $mail->addAddress('parazzzit0709@gmail.com', 'Jo Jo');
        $mail->Subject = 'Subject will be here';
        $mail->Body = 'Please check attached PDF File';
        $mail->isHTML(true);
        if (file_exists('dompdf.pdf')){
            $mail->addAttachment('dompdf.pdf');
        } else {
            $mail->addAttachment('logos.png');
        }
//        unlink(dompdf.pdf);
        $mail->send();

    } catch (Exception $e){
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
//    $dompdf->stream('govno.pdf');
    return new Response('ggg', 200);
});
$app->run();






//Object orineted variant
//    class PdfConverter extends FPDF
//    {
//        public function convert(Request $request) {
//            return $request->get('name');
//        }
//
//        function header(){
//            $this->Image('logo.png', 10, 6);
//            $this->SetFont('Arial','B', 14);
//            $this->Cell(276,5,'text',0,0,'C');
//        }
//    }
//    return new Response((new PdfConverter())->convert($request), 200);