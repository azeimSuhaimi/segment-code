
<link href="<?= base_url('assets/')?>css/table_pdf.css" rel="stylesheet">

<?php

$x = 1; $y = 0;
$content = '';

$content .='<h2 style="text-align: center;"> Program:  '. strtoupper($title['program']) .'</h2>';

$content .= '<P style="text-align: right;">'. strtoupper($tahun['tahun']) .'</P>';
$content .='<table style="width: 100%; text-align: center; border-collapse: collapse; border: 1px solid black;"  id="customers">';
$content .='    <tr style=" background-color: #4CAF50; color: white;">
                    <th style="padding: 8px; border: 1px solid black; text-align: center;" colspan="6">'.strtoupper('universiti sains islam malaysia').'</th>
                </tr>
                <tr style=" background-color: #4CAF50; color: white;">
                    <th style="padding: 8px; border: 1px solid black;">No</th>
                    <th style="padding: 8px; border: 1px solid black;">Anggaran Yang Berkenaan Tajuk jawatan</th>
                    <th style="padding: 8px; border: 1px solid black;">Kod gaji ssm</th>
                    <th style="padding: 8px; border: 1px solid black;">Kod skim</th>
                    <th style="padding: 8px; border: 1px solid black;">Butir - butir perubahan</th>
                    <th style="padding: 8px; border: 1px solid black;">Bilangan jawatan</th>
                </tr>';
                if($list)
                {
                    foreach($list as $i)
                    {
                        $content .='<tr style="">
                                        <td style="padding: 8px; border: 1px solid black;">'. $x++ .'</td>
                                        <td style="padding: 8px; border: 1px solid black;">'. $i["position_title"] .'</td>
                                        <td style="padding: 8px; border: 1px solid black;">'. $i["salary_ssm"] .'</td>
                                        <td style="padding: 8px; border: 1px solid black;">'. $i["skim"] .'</td>
                                        <td style="padding: 8px; border: 1px solid black;">'. $i["detail"] .'</td>
                                        <td style="padding: 8px; border: 1px solid black;">'. $i["position_number"] .'</td>
                                    </tr>';
                        $y += $i["position_number"];
                    }

                    $content .='<tr style="">
                                    <td style="padding: 8px; border: 1px solid black;" colspan="5"><b>Jumlah bilangan jawatan</b> </td>
                                    <td style="padding: 8px; border: 1px solid black;" colspan="1">'. $y .'</td>
                                </tr>';
                }
                else
                {
                    $content .='<tr style="">
                                    <th colspan="6" style="padding: 8px; border: 1px solid black;">Tiada Data Untuk Dipapar</th>
                                    
                                </tr>
                                <tr style="">
                                    <td style="padding: 8px; border: 1px solid black;" colspan="5"><b>Jumlah Bilangan Jawatan</b> </td>
                                    <td style="padding: 8px; border: 1px solid black;" colspan="1">0</td>
                                </tr>';
                }
$content .='';

$content .='</table>';

$content .='<p></p>';
$content .='<p>catatan:<br> Semua jawatan dalam surat kelulusan perjawatan bagi Universiti Sains Islam Malaysia(USIM) sebelum ini dimansuhkan tarikh kuat kuasa perubahan ini adalah mulai januari 2021</p>';

$content .='';

//echo $content;

$mpdf = new \Mpdf\Mpdf();
$mpdf->WriteHTML(''.$content);

$mpdf->Output('ProgramSkp.pdf', 'I');

?>







           

            




        


        


        
        
    



<?php







//$mpdf->Output('test.pdf', 'I');
//$mpdf->Output('test.pdf', 'D');

//$mpdf->Output('test.pdf', \Mpdf\Output\Destination::DOWNLOAD);









?>