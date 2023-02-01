

<?php

$report = $this->db->get_where('reports', ['id' => $id ])->row_array();

        $content = "";
        $content .= '<img style="float:right;" width="200" height="100" src="'.base_url('assets/img/th.jfif').'">

        <div style="float:right;">
            <h3 style="margin:0px;padding:0px;">Politeknik Kuala Terengganu <br> Kementerian Pengajian Tinggi <br><p style="font-size:12px;">Jalan Sultan Ismail<br>20200 Kuala Terengganu<br> Terengganu</p>  </h3>
            
        </div>';
        //$content .= '';
        $content .= '<hr style="margin:0px;padding:0px;">';
        $content .= '<h3 style="text-align:center;">'.$report['title'].'</h3>';
        
        //
        
        
        $content .= '<div style="float:left;width: 33%;margin:0px;padding:0px;"><p style="margin:0px;padding:0px;">Ttarikh Mula: '.$report['date_start'].' <br> Tarikh Tamat: '.$report['date_end'].'</p> </div>';
        $content .= '<div style="float:left;width: 33%;margin:0px;padding:0px;"><p style="margin:0px;padding:0px;">Masa Mula:'.$report['time_program'] .'<br> Masa Tamat: '.$report['time_program_end'] .'</p> </div>';
        $content .= '<div style="float:left;width: 33%;margin:0px;padding:0px;"><p style="margin:0px;padding:0px;">Tempat: '.$report['place'].' <br> Peringkat: '.$report['level'].' </p> </div>';

        $content .= '<div style="width: 50%;"><p>kumpulan sasaran: '.$report['target_people'].' <br> Jumlah peserta: '.$report['total_people'].'</p> </div>';

        $content .= '<h3>Pengenalan</h3> '.$report['intro'].'';
        $content .= '<h3>Objektif</h3> '.$report['objective'].'';
        $content .= '<h3>Ringkasan Program</h3> '.$report['summary_program'].'';
        $content .= '<h3>Impak Program</h3> '.$report['impak'].'';
        $content .= '<div style="float:left;width: 60%;">
                    <p>Disediakan <br>
                    (...............................) <br> 
                    Nama : '. $this->Users_model->getbyid($report['id_user'])['name'] .' <br>  
                    Jawatan : '. $this->Position_model->getbyid($report['position'])['position'] .' <br> 
                    Tarikh Dihantar:</p>
                    </div>';
        $content .= '                    <div style="float:right; width: 40%;">
                      
        <p>Disahkan <br>
        (...............................) <br> 
        Nama : '. $id_kj['name'] .' <br> 
        Jawatan : '. $this->Position_model->getbyid($id_kj['position'])['position'] .' <br> 
        Tarikh Disahkan:</p>

    </div>';

    $contentS = '';
        $contentS .= '<div style="margin:0px;padding:0px;">';
        if($gallery)
        {
            $contentS .= '<h1 style="text-align:center">Gallery</h1>';
            $i = 1;
            foreach($gallery as $galle)
            {
                $contentS .= '<div class="text-cente">
                <figure style="text-align:center; margin:10px;">
                  <img src="'. base_url('assets/img/gallery/'.$galle['image']) .'" width="100%" height="50%" >
                  <figcaption>Gambar '. $i++ .' '. $galle['figure'] .'</figcaption>
                </figure>
              </div>';
            }
        }
        else
        {
            $contentS .= '<h3 style="text-align:center">Tiada Gambar</h3>';
        }
        
        $contentS .= '</div>';

        $mpdf = new \Mpdf\Mpdf();
		$mpdf->WriteHTML($content);
        $mpdf->Addpage();
        $mpdf->WriteHTML($contentS);

		$mpdf->Output('report_ssar.pdf', \Mpdf\Output\Destination::INLINE);
?>

