

            
            
        








<?php

$content = '';


$content .= '<h2 style="text-align: center;">'.strtoupper('senarai tahun S.K.P: '.$tahun['tahun'])  .'</h2>';
$u= 0; $l=1;
                foreach($program as $pd)
                {   
                    $content .= '<br><br><table style="width: 100%; text-align: center; border-collapse: collapse; border: 1px solid black;">';
                    $content .= '<thead class="thead-dark text-center">
                                    <tr style=" background-color: #4CAF50; color: white;">
                                        <th style="padding: 8px; border: 1px solid black; text-align: center;" colspan="6">'.strtoupper('Program '.$l++.' - '. $pd['program'] ).'</th>
                                    </tr>
                                    <tr style=" background-color: #4CAF50; color: white;">
                                        <th style="padding: 8px; border: 1px solid black;" scope="col">No</th>
                                        <th style="padding: 8px; border: 1px solid black;" scope="col">Anggaran Yang Berkenaan Tajuk Jawatan</th>
                                        <th style="padding: 8px; border: 1px solid black;" scope="col">Kod Gaji SSM</th>
                                        <th style="padding: 8px; border: 1px solid black;" scope="col">Kod Skim</th>
                                        <th style="padding: 8px; border: 1px solid black;" scope="col">Butir - Butir Perubahan</th>
                                        <th style="padding: 8px; border: 1px solid black;" scope="col">Bilangan Jawatan</th>
                                    </tr>
                                </thead>';
                    $content .= '<tbody>';

                    $query = $this->db->get_where('list_skp',['program_id' => $pd['id']])->result_array();
                    if($query)
                    {
                        $i = 1; $y=0; foreach($query as $p)
                        {
                            $content .= '<tr  >
                                            <td style="padding: 8px; border: 1px solid black;">'. $i++ .'</td>
                                            <td style="padding: 8px; border: 1px solid black;">'. $p['position_title'] .'</td>
                                            <td style="padding: 8px; border: 1px solid black;">'. $p['salary_ssm'] .'</td>
                                            <td style="padding: 8px; border: 1px solid black;">'. $p['skim'] .'</td>
                                            <td style="padding: 8px; border: 1px solid black;">'. $p['detail'] .'</td>
                                            <td style="padding: 8px; border: 1px solid black;">'. $p['position_number'] .'</td>
                                            
                                        </tr>';
                                        $y += $p['position_number'];
                        }
                            $u += $y;
                        $content .= '   <tr >
                                            <td style="padding: 8px; border: 1px solid black;" colspan="5"><b>Jumlah Bilangan '. $pd['program'] .'</b> </td>
                                            <td style="padding: 8px; border: 1px solid black;" colspan="1">'. $y .'</td>
                                        </tr>';
                    }
                    else
                    {
                        $content .= '<tr  >
                                        <th style="padding: 8px; border: 1px solid black;" colspan="6" scope="row">Tiada Data Untuk Dipapar</th>
                                        
                                    </tr>';
                    }
                    $content .= '';
                    $content .= '</tbody>';
                    $content .= '</table>';
                }
$content .= '';
$content .= '';
$content .= '';
$content .= '';
$content .= '';
$content .= '';

$content .= '<h4 class=" text-uppercase">Jumlah Universiti Sains Islam Malaysia(USIM) : <b class=" "> '. $u .'</b></h4>';

$content .= '<p>catatan:
<br> 
Semua jawatan dalam surat kelulusan perjawatan bagi Universiti Sains Islam Malaysia(USIM)
sebelum ini dimansuhkan tarikh kuat kuasa perubahan ini adalah mulai januari 2021.</p>
';


$mpdf = new \Mpdf\Mpdf();
$mpdf->WriteHTML(''.$content);

$mpdf->Output($tahun['tahun'].'.pdf', 'I');



?>


