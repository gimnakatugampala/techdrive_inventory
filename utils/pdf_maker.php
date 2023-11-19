<?php                
require_once '../includes/db_config.php';
require_once '../lib/tcpdf_6_3_2/tcpdf/tcpdf.php';
// include_once('lib/tcpdf_6_2_13/tcpdf/tcpdf.php');

$MST_ID=$_GET['MST_ID'];

$inv_mst_query = "SELECT * FROM tbsalesorder WHERE socode ='".$MST_ID."' ";             
$inv_mst_results = mysqli_query($conn,$inv_mst_query);   
$count = mysqli_num_rows($inv_mst_results);  
if($count>0) 
{
	$inv_mst_data_row = mysqli_fetch_array($inv_mst_results, MYSQLI_ASSOC);

	//----- Code for generate pdf
	$pdf = new TCPDF('P', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
	$pdf->SetCreator(PDF_CREATOR);  
	//$pdf->SetTitle("Export HTML Table data to PDF using TCPDF in PHP");  
	$pdf->SetHeaderData('', '', PDF_HEADER_TITLE, PDF_HEADER_STRING);  
	$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));  
	$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));  
	$pdf->SetDefaultMonospacedFont('helvetica');  
	$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);  
	$pdf->SetMargins(PDF_MARGIN_LEFT, '5', PDF_MARGIN_RIGHT);  
	$pdf->setPrintHeader(false);  
	$pdf->setPrintFooter(false);  
	$pdf->SetAutoPageBreak(TRUE, 10);  
	$pdf->SetFont('helvetica', '', 12);  
	$pdf->AddPage(); //default A4
	//$pdf->AddPage('P','A5'); //when you require custome page size 
	
	$content = ''; 

	$content .= '
<style type="text/css">
	body{
	font-size:12px;
	line-height:24px;
	font-family:"Helvetica Neue", "Helvetica", Helvetica, Arial, sans-serif;
	color:#000;
	}
	table.table, th.th, td.td {
		border: 1px solid black;
		border-collapse: collapse;
		padding:10px;
	  }

	  td.card{
		padding:100px;
	  }


	</style>    
	<table cellpadding="0" cellspacing="0">
	<table style="width:100%;" >
	<tr><td colspan="2">&nbsp;</td></tr>
	<tr><td colspan="2" align="center"><b>TECHDRIVE TECHNOLOGIES</b></td></tr>
	<tr><td colspan="2" align="center"><b>CONTACT: +94 764961 707</b></td></tr>
	<tr><td colspan="2" align="center"><b>WEBSITE: WWW.TECHDRIVE.LK</b></td></tr>

	<br />
	<br />

	<tr>
	<td style="font-size:10px;margin-bottom:45px;">CUSTOMER INFO:</td>
	<td style="font-size:10px;margin-bottom:45px;" align="right">INVOICE INFO:</td>
	</tr>

	<br />

	<tr>
	<td><b>CUSTOMER NAME: GIMNA KATUGAMPALA </b></td>
	<td align="right"><b>SALES CODE: 1f15f22c-484f-49fc-a1e5-b9a080a1d65d</b> </td>
	</tr>
	<br />

	<tr>
	<td><b>EMAIL: gimna@gmail.com </b></td>
	<td align="right"><b>PAYMENT STATUS: ADVANCE</b> </td>
	</tr>

	<br />

	<tr>
	<td><b>MOBILE: +94 764961707 </b></td>
	<td align="right"><b>STATUS: INPROGRESS</b> </td>
	</tr>
	<br />

	<tr>
	<td><b>COLOMBO</b></td>
	<td align="right">&nbsp;</td>
	</tr>

	<tr>
	<td>&nbsp;</td>
	<td align="right"><b>PLACED DATE: 2023-11-19</b> </td>
	</tr>

	<br />

	<tr>
	<td>&nbsp;</td>
	<td align="right"><b>COMPLETED DATE: 2023-11-19</b> </td>
	</tr>

	<p>--------------------------------------------------------------------------------------------------------------------------------</p>


	<tr><td colspan="2" align="center"><b>SALES ORDER INVOICE</b></td></tr>
	<p></p>

	<table class="table" align="center">
	<tr bgcolor="##BFC9CA">
		<th class="th"  colspan="1">
			<b>PRODUCT NAME</b>
		</th>

		<th class="th" colspan="1">
		<b>QTY</b>
		</th>

		<th class="th" colspan="1">
			<b>PRICE (RS.)</b>
		</th>

		<th class="th" colspan="1">
			<b>DISCOUNT (RS.)</b>
		</th>

		<th class="th" colspan="1">
			<b>SUBTOTAL (RS.)</b>
		</th>

	</tr>
	


	<tbody>
	';
	$total=0;
	$inv_det_query = "SELECT * FROM tborderitem WHERE salesorderid=37";
	$inv_det_results = mysqli_query($conn,$inv_det_query);    
	while($inv_det_data_row = mysqli_fetch_array($inv_det_results, MYSQLI_ASSOC))
	{	
	$content .= '
	  <tr class="itemrows">
		  <td class="td" colspan="1">
			  Mac Book Pro
		  </td>

		  <td class="td"  colspan="1">
			  10
		  </td>

		  <td class="td"  colspan="1">
		  204
			</td colspan="1">

		 <td class="td"  colspan="1">
		 2034
		</td>

		<td class="td"  colspan="1">
		 2034
		</td>
		
	  </tr>';
		$total=$total+$inv_det_data_row['price'];
	}

	$content .= '</tbody></table>';

		
		$content .= '
		<div></div>
		<div></div>

		<table>

		<tr>
		<td colspan="2" align="right">
		<b>TOTAL DISCOUNT : 1020</b>
		</td>
		</tr>

		<tr>
		<td colspan="2" align="right">
		<b>PAID AMOUNT : 1020</b>
		</td>
		</tr>

		<tr>
		<td colspan="2" align="right">
		<b>TO BE PAID : 1020</b>
		</td>
		</tr>

		<tr colspan="2">
		<td>&nbsp;</td>
		<td align="right">------------------------</td>
		</tr>

		<tr>
		<td colspan="2" align="right">
		<b>GRAND&nbsp;TOTAL:&nbsp;'.$total.'</b>
		</td>
		</tr>

		<tr><td colspan="2" align="right">------------------------</td></tr>

		
		<tr><td colspan="2">&nbsp;</td></tr>
		<tr><td colspan="2" align="center"><b>THANK YOU ! VISIT AGAIN</b></td></tr>
		<tr><td colspan="2">&nbsp;</td></tr>
		</table>
	</table>
</table>'; 
$pdf->writeHTML($content);

$file_location = "../uploads/"; //add your full path of your server
//$file_location = "/opt/lampp/htdocs/examples/generate_pdf/uploads/"; //for local xampp server

$datetime=date('dmY_hms');
$file_name = "INV_".$datetime.".pdf";
ob_end_clean();

if($_GET['ACTION']=='VIEW') 
{
	$pdf->Output($file_name, 'I'); // I means Inline view
} 
else if($_GET['ACTION']=='DOWNLOAD')
{
	$pdf->Output($file_name, 'D'); // D means download
}
else if($_GET['ACTION']=='UPLOAD')
{
$pdf->Output($file_location.$file_name, 'F'); // F means upload PDF file on some folder
echo "Upload successfully!!";
}

//----- End Code for generate pdf
	
}
else
{
	echo 'Record not found for PDF.';
}

?>