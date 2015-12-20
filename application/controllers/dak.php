<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dak extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if (!$this->session->userdata('is_logged_in')) {
			redirect(base_url('index.php/home'));
		}
		$this->load->model('model_sub_jenis');
	$this->load->model('model_jenis');
	$this->load->model('model_dak');
		}

	public function index($id=false)
	{
		$data['dak'] = $this->model_dak->get($id);
		$data['jenis'] = $this->model_jenis->get('dak');
		$data['sub_jenis'] = $this->model_sub_jenis->get('dak');
		
		if ($id!=false) {
			$this->load->view('template_backoffice/header');
			$this->load->view('content_backoffice/dak/edit_dak', $data);
			$this->load->view('template_backoffice/footer');
		}
		else{
			$this->load->view('template_backoffice/header');
			$this->load->view('content_backoffice/dak/list_dak', $data);
			$this->load->view('template_backoffice/footer');
		}
	}
	public function excel(){
				

				//activate worksheet number 1
				$this->excel->setActiveSheetIndex(0);
				//name the worksheet
				$this->excel->getActiveSheet()->setTitle('DAK');
				//set cell A1 content with some text
				$this->excel->getActiveSheet()->setCellValue('A1', 'No');
					//merge cell A1 until D1
				$this->excel->getActiveSheet()->mergeCells('A1:A4');
				//loro
				$this->excel->getActiveSheet()->setCellValue('B1', 'KEGIATAN');
				$this->excel->getActiveSheet()->mergeCells('B1:D4');
				$this->excel->getActiveSheet()->setCellValue('E1', 'PERENCANAAN KEGIATAN');
				$this->excel->getActiveSheet()->mergeCells('E1:J1');
				$this->excel->getActiveSheet()->setCellValue('E2', 'SATUAN');
				$this->excel->getActiveSheet()->mergeCells('E2:E4');
				$this->excel->getActiveSheet()->setCellValue('F2', 'VOLUME');
				$this->excel->getActiveSheet()->mergeCells('F2:F4');
				$this->excel->getActiveSheet()->setCellValue('G2', 'JUMLAH PENERIMA MANFAAT');
				$this->excel->getActiveSheet()->mergeCells('G2:G4');
				$this->excel->getActiveSheet()->setCellValue('H2', 'JUMLAH');
				$this->excel->getActiveSheet()->mergeCells('H2:J2');
				$this->excel->getActiveSheet()->setCellValue('H3', 'DAK');
				$this->excel->getActiveSheet()->mergeCells('H3:H4');
				$this->excel->getActiveSheet()->setCellValue('I3', 'PENDAMPING');
				$this->excel->getActiveSheet()->mergeCells('I3:I4');
				$this->excel->getActiveSheet()->setCellValue('J3', 'TOTAL');
				$this->excel->getActiveSheet()->mergeCells('J3:J4');
				$this->excel->getActiveSheet()->setCellValue('K1', 'PELAKSANAAN KEGIATAN');
				$this->excel->getActiveSheet()->mergeCells('K1:L2');
				$this->excel->getActiveSheet()->setCellValue('K3', 'SWAKELOLA');
				$this->excel->getActiveSheet()->mergeCells('K3:K4');
				$this->excel->getActiveSheet()->setCellValue('L3', 'KONTRAK');
				$this->excel->getActiveSheet()->mergeCells('L3:L4');
				$this->excel->getActiveSheet()->setCellValue('M1', 'REALISASI');
				$this->excel->getActiveSheet()->mergeCells('M1:O2');
				$this->excel->getActiveSheet()->setCellValue('M3', 'KEUANGAN');
				$this->excel->getActiveSheet()->mergeCells('M3:N3');
				$this->excel->getActiveSheet()->setCellValue('M4', 'Rp');
				$this->excel->getActiveSheet()->setCellValue('N4', '%');
				$this->excel->getActiveSheet()->setCellValue('P1', 'Kesesuaian sasaran dan lokasi dengan RKPD');
				$this->excel->getActiveSheet()->mergeCells('P1:Q3');
				$this->excel->getActiveSheet()->setCellValue('P4', 'Ya');
				$this->excel->getActiveSheet()->setCellValue('Q4', 'Tidak');
				$this->excel->getActiveSheet()->setCellValue('R1', 'Kesesuaian antara DPA-SKPD dengan');
				$this->excel->getActiveSheet()->mergeCells('R1:S3');
				$this->excel->getActiveSheet()->setCellValue('R4', 'Ya');
				$this->excel->getActiveSheet()->setCellValue('S4', 'Tidak');
				$this->excel->getActiveSheet()->setCellValue('T1', ' Kodefikasi Masalah');
				$this->excel->getActiveSheet()->mergeCells('T1:T4');



				//change the font size
				$this->excel->getActiveSheet()->getStyle('A1:T4')->getFont()->setSize(14);
				//make the font become bold
				$this->excel->getActiveSheet()->getStyle('A1:T4')->getFont()->setBold(true);
				


				$data['jenis'] = $this->model_jenis->get('dak');
				$start = 4;
		for ($i=0; $i < count($data['jenis']); $i++) { 
			$start = $start +1;
			$start_awal = $start;
			$data['jenis'][$i]['total_dak'] = 0;
			$data['jenis'][$i]['total_pendamping'] = 0;
			$data['jenis'][$i]['total_total'] = 0;
			$data['jenis'][$i]['total_swakelola_kontrak'] = 0;
			$data['jenis'][$i]['total_realisasi_keuangan'] = 0;
			$data['jenis'][$i]['total_realisasi_persen'] = 0;
			$data['jenis'][$i]['total_realisasi_fisik'] = 0;
			$bantuan1 = 0;
			$bantuan2 = 0;
			$data['jenis'][$i]['sub_jenis'] = $this->model_sub_jenis->get_by_id_jenis('dak', $data['jenis'][$i]['id']);
			$kolom = 'A'.$start_awal;
			$a = $i+1;
			$this->excel->getActiveSheet()->setCellValue($kolom, $a);
			$kolom = 'B'.$start_awal;
			$this->excel->getActiveSheet()->setCellValue($kolom, $data['jenis'][$i]['jenis']);
				
			for ($ii=0; $ii < count($data['jenis'][$i]['sub_jenis']); $ii++) {
				$start = $start +1;
				$kolom = 'B'.$start;
				$b = $ii +1;
				$this->excel->getActiveSheet()->setCellValue($kolom, $a.'.'.$b);
				$kolom = 'C'.$start;
				$this->excel->getActiveSheet()->setCellValue($kolom, $data['jenis'][$i]['sub_jenis'][$ii]['sub_jenis']);
				
				$data['jenis'][$i]['sub_jenis'][$ii]['total_dak']=0;
				$data['jenis'][$i]['sub_jenis'][$ii]['total_pendamping']=0;
				$data['jenis'][$i]['sub_jenis'][$ii]['total_total']=0;
				$data['jenis'][$i]['sub_jenis'][$ii]['total_swakelola_kontrak']=0;
				$data['jenis'][$i]['sub_jenis'][$ii]['total_realisasi_keuangan']=0;
				$data['jenis'][$i]['sub_jenis'][$ii]['total_realisasi_fisik']=0;
				$bantuan3 = 0;
				$bantuan4 =0;
				$data['jenis'][$i]['sub_jenis'][$ii]['isine'] = $this->model_dak->get_by_jenis_sub_jenis($data['jenis'][$i]['id'], $data['jenis'][$i]['sub_jenis'][$ii]['id']);

					for ($iii=0; $iii < count($data['jenis'][$i]['sub_jenis'][$ii]['isine']); $iii++) { 
						$start = $start +1;
						$kolom = 'C'.$start;
						$c = $iii +1;
						$this->excel->getActiveSheet()->setCellValue($kolom, $a.'.'.$b.'.'.$c);
						$kolom = 'D'.$start;
						$this->excel->getActiveSheet()->setCellValue($kolom, $data['jenis'][$i]['sub_jenis'][$ii]['isine'][$iii]['kegiatan']);
						$kolom = 'E'.$start;
						$this->excel->getActiveSheet()->setCellValue($kolom, $data['jenis'][$i]['sub_jenis'][$ii]['isine'][$iii]['satuan']);
						$kolom = 'F'.$start;
						$this->excel->getActiveSheet()->setCellValue($kolom, $data['jenis'][$i]['sub_jenis'][$ii]['isine'][$iii]['volume']);
						$kolom = 'G'.$start;
						$this->excel->getActiveSheet()->setCellValue($kolom, $data['jenis'][$i]['sub_jenis'][$ii]['isine'][$iii]['penerima_manfaat']);
						$kolom = 'H'.$start;
						$this->excel->getActiveSheet()->setCellValue($kolom, $data['jenis'][$i]['sub_jenis'][$ii]['isine'][$iii]['dak']);
						$data['jenis'][$i]['sub_jenis'][$ii]['total_dak']=$data['jenis'][$i]['sub_jenis'][$ii]['total_dak'] + $data['jenis'][$i]['sub_jenis'][$ii]['isine'][$iii]['dak'];
						//pendamping
						$data['jenis'][$i]['sub_jenis'][$ii]['isine'][$iii]['pendamping'] = $data['jenis'][$i]['sub_jenis'][$ii]['isine'][$iii]['dak'] * 10 / 100;
						$kolom = 'I'.$start;
						$this->excel->getActiveSheet()->setCellValue($kolom, $data['jenis'][$i]['sub_jenis'][$ii]['isine'][$iii]['pendamping']);
						$data['jenis'][$i]['sub_jenis'][$ii]['total_pendamping']=$data['jenis'][$i]['sub_jenis'][$ii]['total_pendamping'] + $data['jenis'][$i]['sub_jenis'][$ii]['isine'][$iii]['pendamping'];
						//grand total
						$data['jenis'][$i]['sub_jenis'][$ii]['isine'][$iii]['total'] = $data['jenis'][$i]['sub_jenis'][$ii]['isine'][$iii]['dak'] + $data['jenis'][$i]['sub_jenis'][$ii]['isine'][$iii]['pendamping'];
						$kolom = 'J'.$start;
						$this->excel->getActiveSheet()->setCellValue($kolom, $data['jenis'][$i]['sub_jenis'][$ii]['isine'][$iii]['total']);
						$data['jenis'][$i]['sub_jenis'][$ii]['total_total']=$data['jenis'][$i]['sub_jenis'][$ii]['total_total'] + $data['jenis'][$i]['sub_jenis'][$ii]['isine'][$iii]['total'];
						//swakelola kontrak
						$data['jenis'][$i]['sub_jenis'][$ii]['isine'][$iii]['swakelola_kontrak'] = $data['jenis'][$i]['sub_jenis'][$ii]['isine'][$iii]['total'];
						if($data['jenis'][$i]['sub_jenis'][$ii]['isine'][$iii]['swakelola_kontrak'] == "1"){
						$kolom = 'K'.$start;
						$swakelola = true;	
						}else{
						$kolom = 'L'.$start;
						$swakelola = false;		
						}
						$this->excel->getActiveSheet()->setCellValue($kolom, $data['jenis'][$i]['sub_jenis'][$ii]['isine'][$iii]['swakelola_kontrak']);
						$data['jenis'][$i]['sub_jenis'][$ii]['total_swakelola_kontrak']=$data['jenis'][$i]['sub_jenis'][$ii]['total_swakelola_kontrak'] + $data['jenis'][$i]['sub_jenis'][$ii]['isine'][$iii]['swakelola_kontrak'];
						//realisasi keuangan
						$kolom = 'M'.$start;
						$this->excel->getActiveSheet()->setCellValue($kolom, $data['jenis'][$i]['sub_jenis'][$ii]['isine'][$iii]['realisasi_keuangan']);
						$data['jenis'][$i]['sub_jenis'][$ii]['total_realisasi_keuangan']=$data['jenis'][$i]['sub_jenis'][$ii]['total_realisasi_keuangan'] + $data['jenis'][$i]['sub_jenis'][$ii]['isine'][$iii]['realisasi_keuangan'];
						//realisasi persen
						$data['jenis'][$i]['sub_jenis'][$ii]['isine'][$iii]['realisasi_persen'] = $data['jenis'][$i]['sub_jenis'][$ii]['isine'][$iii]['realisasi_keuangan'] / $data['jenis'][$i]['sub_jenis'][$ii]['isine'][$iii]['total'] * 100;
						$kolom = 'N'.$start;
						$this->excel->getActiveSheet()->setCellValue($kolom, $data['jenis'][$i]['sub_jenis'][$ii]['isine'][$iii]['realisasi_persen']);
						
						$data['jenis'][$i]['sub_jenis'][$ii]['total_realisasi_persen']=$data['jenis'][$i]['sub_jenis'][$ii]['total_realisasi_keuangan'] / $data['jenis'][$i]['sub_jenis'][$ii]['total_total'] * 100;
						//realisasi fisik
						$kolom = 'O'.$start;
						$this->excel->getActiveSheet()->setCellValue($kolom, $data['jenis'][$i]['sub_jenis'][$ii]['isine'][$iii]['realisasi_fisik']);
						
						$kolom = 'T'.$start;
						$this->excel->getActiveSheet()->setCellValue($kolom, $data['jenis'][$i]['sub_jenis'][$ii]['isine'][$iii]['kodefikasi_masalah']);
						
						$bantuan3=$data['jenis'][$i]['sub_jenis'][$ii]['isine'][$iii]['total'] * $data['jenis'][$i]['sub_jenis'][$ii]['isine'][$iii]['realisasi_fisik'] / 100;
						$bantuan4=$bantuan4 + $bantuan3;
						$data['jenis'][$i]['sub_jenis'][$ii]['isine'][$iii]['bantuan'] = $bantuan3;
						//$data['jenis'][$i]['sub_jenis'][$ii]['total_realisasi_fisik'] = $bantuan4 / $data['jenis'][$i]['sub_jenis'][$ii]['total_total'] * 100;
						//$bantuan2 = $bantuan2 + $bantuan4;												

					
					}
					//totalan perbidang
					if(count($data['jenis'][$i]['sub_jenis'][$ii]['isine']) > 0){
					$data['jenis'][$i]['total_dak'] = $data['jenis'][$i]['total_dak'] + $data['jenis'][$i]['sub_jenis'][$ii]['total_dak'];
						
					$data['jenis'][$i]['total_pendamping'] = $data['jenis'][$i]['total_pendamping'] + $data['jenis'][$i]['sub_jenis'][$ii]['total_pendamping'];
					
					$data['jenis'][$i]['total_total'] = $data['jenis'][$i]['total_total'] + $data['jenis'][$i]['sub_jenis'][$ii]['total_total'];
					
					$data['jenis'][$i]['total_swakelola_kontrak'] = $data['jenis'][$i]['total_swakelola_kontrak'] + $data['jenis'][$i]['sub_jenis'][$ii]['total_swakelola_kontrak'];
					
					$data['jenis'][$i]['total_realisasi_keuangan'] = $data['jenis'][$i]['total_realisasi_keuangan'] + $data['jenis'][$i]['sub_jenis'][$ii]['total_realisasi_keuangan'];
				
					$data['jenis'][$i]['total_realisasi_persen']=$data['jenis'][$i]['total_realisasi_keuangan'] / $data['jenis'][$i]['total_total'] * 100;
					
					$data['jenis'][$i]['total_realisasi_fisik']=$bantuan4 / $data['jenis'][$i]['total_total'] * 100;
				
					}
						}
					$kolom = 'H'.$start_awal;
					$this->excel->getActiveSheet()->setCellValue($kolom, $data['jenis'][$i]['total_dak']);
					$kolom = 'I'.$start_awal;
					$this->excel->getActiveSheet()->setCellValue($kolom, $data['jenis'][$i]['total_pendamping']);
						$kolom = 'J'.$start_awal;
					$this->excel->getActiveSheet()->setCellValue($kolom, $data['jenis'][$i]['total_total']);
					if($swakelola == true){
					$kolom = 'K'.$start_awal;
						
					}else{
					$kolom = 'L'.$start_awal;
						
					}
					$this->excel->getActiveSheet()->setCellValue($kolom, $data['jenis'][$i]['total_swakelola_kontrak']);
						$kolom = 'M'.$start_awal;
					$this->excel->getActiveSheet()->setCellValue($kolom, $data['jenis'][$i]['total_realisasi_keuangan']);
					$kolom = 'N'.$start_awal;
					$this->excel->getActiveSheet()->setCellValue($kolom, $data['jenis'][$i]['total_realisasi_persen']);
						$kolom = 'O'.$start_awal;
					$this->excel->getActiveSheet()->setCellValue($kolom, $data['jenis'][$i]['total_realisasi_fisik']);
					
					
		}
				
				//set aligment to center for that merged cell (A1 to D1)
				$this->excel->getActiveSheet()->getStyle('A1:T4')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
				$filename='DAK '.$this->session->userdata('tahun').'.xls'; //save our workbook as this file name
				header('Content-Type: application/vnd.ms-excel'); //mime type
				header('Content-Disposition: attachment;filename="'.$filename.'"'); //tell browser what's the file name
				header('Cache-Control: max-age=0'); //no cache
				            
				//save it to Excel5 format (excel 2003 .XLS file), change this to 'Excel2007' (and adjust the filename extension, also the header mime type)
				//if you want to save it as .XLSX Excel 2007 format
				$objWriter = PHPExcel_IOFactory::createWriter($this->excel, 'Excel5');  
				//force user to download the Excel file without writing it to server's HD
				$objWriter->save('php://output');
				}

	public function report()
	{
		$data['jenis'] = $this->model_jenis->get('dak');
		for ($i=0; $i < count($data['jenis']); $i++) { 
			$data['jenis'][$i]['total_dak'] = 0;
			$data['jenis'][$i]['total_pendamping'] = 0;
			$data['jenis'][$i]['total_total'] = 0;
			$data['jenis'][$i]['total_swakelola_kontrak'] = 0;
			$data['jenis'][$i]['total_realisasi_keuangan'] = 0;
			$data['jenis'][$i]['total_realisasi_persen'] = 0;
			$data['jenis'][$i]['total_realisasi_fisik'] = 0;
			$bantuan1 = 0;
			$bantuan2 = 0;
			$data['jenis'][$i]['sub_jenis'] = $this->model_sub_jenis->get_by_id_jenis('dak', $data['jenis'][$i]['id']);

			for ($ii=0; $ii < count($data['jenis'][$i]['sub_jenis']); $ii++) {
				$data['jenis'][$i]['sub_jenis'][$ii]['total_dak']=0;
				$data['jenis'][$i]['sub_jenis'][$ii]['total_pendamping']=0;
				$data['jenis'][$i]['sub_jenis'][$ii]['total_total']=0;
				$data['jenis'][$i]['sub_jenis'][$ii]['total_swakelola_kontrak']=0;
				$data['jenis'][$i]['sub_jenis'][$ii]['total_realisasi_keuangan']=0;
				$data['jenis'][$i]['sub_jenis'][$ii]['total_realisasi_fisik']=0;
				$bantuan3 = 0;
				$bantuan4 =0;
				$data['jenis'][$i]['sub_jenis'][$ii]['isine'] = $this->model_dak->get_by_jenis_sub_jenis($data['jenis'][$i]['id'], $data['jenis'][$i]['sub_jenis'][$ii]['id']);

					for ($iii=0; $iii < count($data['jenis'][$i]['sub_jenis'][$ii]['isine']); $iii++) { 
						$data['jenis'][$i]['sub_jenis'][$ii]['total_dak']=$data['jenis'][$i]['sub_jenis'][$ii]['total_dak'] + $data['jenis'][$i]['sub_jenis'][$ii]['isine'][$iii]['dak'];
						//pendamping
						$data['jenis'][$i]['sub_jenis'][$ii]['isine'][$iii]['pendamping'] = $data['jenis'][$i]['sub_jenis'][$ii]['isine'][$iii]['dak'] * 10 / 100;
						$data['jenis'][$i]['sub_jenis'][$ii]['total_pendamping']=$data['jenis'][$i]['sub_jenis'][$ii]['total_pendamping'] + $data['jenis'][$i]['sub_jenis'][$ii]['isine'][$iii]['pendamping'];
						//grand total
						$data['jenis'][$i]['sub_jenis'][$ii]['isine'][$iii]['total'] = $data['jenis'][$i]['sub_jenis'][$ii]['isine'][$iii]['dak'] + $data['jenis'][$i]['sub_jenis'][$ii]['isine'][$iii]['pendamping'];
						$data['jenis'][$i]['sub_jenis'][$ii]['total_total']=$data['jenis'][$i]['sub_jenis'][$ii]['total_total'] + $data['jenis'][$i]['sub_jenis'][$ii]['isine'][$iii]['total'];
						//swakelola kontrak
						$data['jenis'][$i]['sub_jenis'][$ii]['isine'][$iii]['swakelola_kontrak'] = $data['jenis'][$i]['sub_jenis'][$ii]['isine'][$iii]['total'];
						$data['jenis'][$i]['sub_jenis'][$ii]['total_swakelola_kontrak']=$data['jenis'][$i]['sub_jenis'][$ii]['total_swakelola_kontrak'] + $data['jenis'][$i]['sub_jenis'][$ii]['isine'][$iii]['swakelola_kontrak'];
						//realisasi keuangan
						$data['jenis'][$i]['sub_jenis'][$ii]['total_realisasi_keuangan']=$data['jenis'][$i]['sub_jenis'][$ii]['total_realisasi_keuangan'] + $data['jenis'][$i]['sub_jenis'][$ii]['isine'][$iii]['realisasi_keuangan'];
						//realisasi persen
						$data['jenis'][$i]['sub_jenis'][$ii]['total_realisasi_persen']=$data['jenis'][$i]['sub_jenis'][$ii]['total_realisasi_keuangan'] / $data['jenis'][$i]['sub_jenis'][$ii]['total_total'] * 100;
						//realisasi fisik
						$bantuan3=$data['jenis'][$i]['sub_jenis'][$ii]['isine'][$iii]['total'] * $data['jenis'][$i]['sub_jenis'][$ii]['isine'][$iii]['realisasi_fisik'] / 100;
						$bantuan4=$bantuan4 + $bantuan3;
						$data['jenis'][$i]['sub_jenis'][$ii]['isine'][$iii]['bantuan'] = $bantuan3;
						//$data['jenis'][$i]['sub_jenis'][$ii]['total_realisasi_fisik'] = $bantuan4 / $data['jenis'][$i]['sub_jenis'][$ii]['total_total'] * 100;
						//$bantuan2 = $bantuan2 + $bantuan4;												

						$data['jenis'][$i]['sub_jenis'][$ii]['isine'][$iii]['realisasi_persen'] = $data['jenis'][$i]['sub_jenis'][$ii]['isine'][$iii]['realisasi_keuangan'] / $data['jenis'][$i]['sub_jenis'][$ii]['isine'][$iii]['total'] * 100;
			
					}
					//totalan perbidang
					if(count($data['jenis'][$i]['sub_jenis'][$ii]['isine']) > 0){
					$data['jenis'][$i]['total_dak'] = $data['jenis'][$i]['total_dak'] + $data['jenis'][$i]['sub_jenis'][$ii]['total_dak'];
					$data['jenis'][$i]['total_pendamping'] = $data['jenis'][$i]['total_pendamping'] + $data['jenis'][$i]['sub_jenis'][$ii]['total_pendamping'];
					$data['jenis'][$i]['total_total'] = $data['jenis'][$i]['total_total'] + $data['jenis'][$i]['sub_jenis'][$ii]['total_total'];
					$data['jenis'][$i]['total_swakelola_kontrak'] = $data['jenis'][$i]['total_swakelola_kontrak'] + $data['jenis'][$i]['sub_jenis'][$ii]['total_swakelola_kontrak'];
					$data['jenis'][$i]['total_realisasi_keuangan'] = $data['jenis'][$i]['total_realisasi_keuangan'] + $data['jenis'][$i]['sub_jenis'][$ii]['total_realisasi_keuangan'];
					$data['jenis'][$i]['total_realisasi_persen']=$data['jenis'][$i]['total_realisasi_keuangan'] / $data['jenis'][$i]['total_total'] * 100;
					$data['jenis'][$i]['total_realisasi_fisik']=$bantuan4 / $data['jenis'][$i]['total_total'] * 100;
					}
						}
		}
		$this->output->set_content_type('application/json')->set_output(json_encode($data));
	
	}

	public function add()
	{
		$data['jenis'] = $this->model_jenis->get('dak');
		$data['sub_jenis'] = $this->model_sub_jenis->get('dak');
		//$data['dak'] = $this->model_dak->get();
	
		$this->load->view('template_backoffice/header');
		$this->load->view('content_backoffice/dak/add_dak', $data);
		$this->load->view('template_backoffice/footer');
	}

	public function submit()
	{

		$this->form_validation->set_rules('kegiatan', 'Kegiatan', 'trim|required');
		// $this->form_validation->set_rules('password', 'Password', 'trim|required|matches[password2]');
		// $this->form_validation->set_rules('password2', 'Password Confirmation', 'trim|required');
		
		$this->form_validation->set_error_delimiters('<h6 class="w-500 alert bg-red">','</h6>');

		if ($this->form_validation->run() == FALSE)
		{
			$data['jenis'] = $this->model_jenis->get('dak');
			$data['sub_jenis'] = $this->model_sub_jenis->get('dak');
		
			$this->load->view('template_backoffice/header');
			$this->load->view('content_backoffice/dak/add_dak', $data);
			$this->load->view('template_backoffice/footer');
		}
		else
		{
			$insert = $this->model_dak->add();
			if ($insert==true) {
				redirect('dak');
			}
			else{
				echo "gagal dimasukkan";
			}
			
		}

	}

	public function edit()
	{
		$this->form_validation->set_rules('kegiatan', 'Bidang', 'trim|required');
		// $this->form_validation->set_rules('password', 'Password', 'trim|required|matches[password2]');
		// $this->form_validation->set_rules('password2', 'Password Confirmation', 'trim|required');
		
		$this->form_validation->set_error_delimiters('<h6 class="w-500 alert bg-red">','</h6>');
		
		if ($this->form_validation->run() == FALSE)
		{

			$data['dak'] = $this->model_dak->get($this->input->post('id'));
			$data['jenis'] = $this->model_jenis->get('dak');
			$data['sub_jenis'] = $this->model_sub_jenis->get('dak');
		
		
			$this->load->view('template_backoffice/header');
			$this->load->view('content_backoffice/dak/edit_dak', $data);
			$this->load->view('template_backoffice/footer');
		}
		else
		{
			$update = $this->model_dak->edit();
			if ($update==true) {
				redirect('dak');
			}
			else{
				echo "gagal dimasukkan";
			}
			
		}
	}

	public function delete( $id)
	{
		$this->model_dak->delete($id);
		redirect('dak');
		}


}

/* End of file user.php */
/* Location: ./application/controllers/user.php */