<?php 
include("MPDF57/mpdf.php");
function export_PDF($res)
{
	 require_once "functions_view.inc";
  require_once "mrbs_sql.inc";
print($res);
exit();

	
	 
$mpdf=new mPDF('win-1252','A4','','',15,10,16,10,10,10);//A4 page in portrait for landscape add -L.
$mpdf->SetHeader('|Your Header here|');
$mpdf->setFooter('{PAGENO}');// Giving page number to your footer.
$mpdf->useOnlyCoreFonts = true;    // false is default
$mpdf->SetDisplayMode('fullpage');
// Buffer the following html with PHP so we can store it to a variable later
ob_start();
?>
<?php include "phppage.php";

print($res);
	 


 //This is your php page ?>
<?php 

$html = ob_get_contents();
ob_end_clean();
// send the captured HTML from the output buffer to the mPDF class for processing
$mpdf->WriteHTML($html);
//$mpdf->SetProtection(array(), 'user', 'password'); uncomment to protect your pdf page with password.
$mpdf->Output();
exit;
}
 ?>

  echo"<form action=\"\" method=\"get\">

            <input type=\"button\" name=\"imprimir\" value=\"Imprimir\"  onClick=\"window.print(); \"/>
            </form>";