<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Bku extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if (!$this->session->userdata('is_logged_in')) {
			redirect(base_url('index.php/home'));
		}
		$this->load->model('model_sub_jenis');
	$this->load->model('model_jenis');
	$this->load->model('model_bku');
		}

	public function index($id=false)
	{
		$data['bku'] = $this->model_bku->get($id);
		$data['jenis'] = $this->model_jenis->get('bku');
		$data['sub_jenis'] = $this->model_sub_jenis->get('bku');
		
		if ($id!=false) {
			$this->load->view('template_backoffice/header');
			$this->load->view('content_backoffice/bku/edit_bku', $data);
			$this->load->view('template_backoffice/footer');
		}
		else{
			$this->load->view('template_backoffice/header');
			$this->load->view('content_backoffice/bku/list_bku', $data);
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
				//loro
				$this->excel->getActiveSheet()->mergeCells('A1:A4');
				$this->excel->getActiveSheet()->setCellValue('B1', 'KEGIATAN');
				$this->excel->getActiveSheet()->mergeCells('B1:D4');
				$this->excel->getActiveSheet()->setCellValue('E1', 'ANGGARAN');
				$this->excel->getActiveSheet()->mergeCells('E1:F2');
				$this->excel->getActiveSheet()->setCellValue('E3', 'PROVINSI');
				$this->excel->getActiveSheet()->mergeCells('E3:E4');
				$this->excel->getActiveSheet()->setCellValue('F3', 'SHARING');
				$this->excel->getActiveSheet()->mergeCells('F2:F3');
				$this->excel->getActiveSheet()->setCellValue('G1', 'PENGADAAN BARANG/JASA');
				$this->excel->getActiveSheet()->mergeCells('G1:I2');
				$this->excel->getActiveSheet()->setCellValue('G3', 'METODE');
				$this->excel->getActiveSheet()->mergeCells('G3:G4');
				$this->excel->getActiveSheet()->setCellValue('H3', 'TANGGAL PELAKSANAAN');
				$this->excel->getActiveSheet()->mergeCells('H3:H4');
				$this->excel->getActiveSheet()->setCellValue('I3', 'NILAI KONTRAK');
				$this->excel->getActiveSheet()->mergeCells('I3:I4');
				$this->excel->getActiveSheet()->setCellValue('J1', 'REALISASI PENCAIRAN DANA DARI PROVINSI');
				$this->excel->getActiveSheet()->mergeCells('J1:K2');
				$this->excel->getActiveSheet()->setCellValue('K1', 'PELAKSANAAN KEGIATAN');
				$this->excel->getActiveSheet()->mergeCells('K1:L2');
				$this->excel->getActiveSheet()->setCellValue('J3', 'Rp');
				$this->excel->getActiveSheet()->mergeCells('J3:J4');
				$this->excel->getActiveSheet()->setCellValue('K3', '%');
				$this->excel->getActiveSheet()->mergeCells('K3:K4');
				$this->excel->getActiveSheet()->setCellValue('L1', 'REALISASI SPJ [PROV+SHARING)');
				$this->excel->getActiveSheet()->mergeCells('L1:M2');
				$this->excel->getActiveSheet()->setCellValue('L3', 'Rp');
				$this->excel->getActiveSheet()->mergeCells('L3:L4');
				$this->excel->getActiveSheet()->setCellValue('M3', '%');
				$this->excel->getActiveSheet()->mergeCells('M3:M4');
				$this->excel->getActiveSheet()->setCellValue('N1', 'TARGET FISIK');
				$this->excel->getActiveSheet()->mergeCells('N1:N2');
				$this->excel->getActiveSheet()->setCellValue('N3', '%');
				$this->excel->getActiveSheet()->mergeCells('N3:N4');
				$this->excel->getActiveSheet()->setCellValue('O1', 'REALISASI FISIK');
				$this->excel->getActiveSheet()->mergeCells('O1:O2');
				$this->excel->getActiveSheet()->setCellValue('O3', '%');
				$this->excel->getActiveSheet()->mergeCells('O3:O4');
				$this->excel->getActiveSheet()->setCellValue('P1', 'PERMASALAHAN & UPAYA PEMECAHAN ');
				$this->excel->getActiveSheet()->mergeCells('P1:P4');




				//change the font size
				$this->excel->getActiveSheet()->getStyle('A1:P4')->getFont()->setSize(14);
				//make the font become bold
				$this->excel->getActiveSheet()->getStyle('A1:P4')->getFont()->setBold(true);
				


				$start = 4;
				$data['jenis'] = $this->model_jenis->get('bku');
				for ($i=0; $i < count($data['jenis']); $i++) { 
					$start = $start +1;
					$start_awal = $start;
					$data['jenis'][$i]['total_anggaran_provinsi'] = 0;
					$data['jenis'][$i]['total_anggaran_sharing'] = 0;
					$data['jenis'][$i]['total_nilai_kontrak'] = 0;
					$data['jenis'][$i]['total_realisasi_provinsi'] = 0;
					$data['jenis'][$i]['total_realisasi_provinsi_persen'] = 0;
					$data['jenis'][$i]['total_realisasi_spj'] = 0;
					$data['jenis'][$i]['total_realisasi_spj_persen'] = 0;
					$data['jenis'][$i]['total_target_fisik'] = 0;
					$data['jenis'][$i]['total_realisasi_fisik'] = 0;
					$bantuan1 = 0;
					$bantuan2 = 0;
					$data['jenis'][$i]['sub_jenis'] = $this->model_sub_jenis->get_by_id_jenis('bku', $data['jenis'][$i]['id']);
					$kolom = 'A'.$start_awal;
					$a = $i+1;
					$this->excel->getActiveSheet()->setCellValue($kolom, $a);
					$kolom = 'B'.$start_awal;
					$this->excel->getActiveSheet()->setCellValue($kolom, $data['jenis'][$i]['jenis']);
					
					for ($ii=0; $ii < count($data['jenis'][$i]['sub_jenis']); $ii++) {
						$start = $start +1;
						$start_tengah = $start;
						$kolom = 'B'.$start;
						$b = $ii +1;
						$this->excel->getActiveSheet()->setCellValue($kolom, $a.'.'.$b);
						$kolom = 'C'.$start;
						$this->excel->getActiveSheet()->setCellValue($kolom, $data['jenis'][$i]['sub_jenis'][$ii]['sub_jenis']);
						
						$data['jenis'][$i]['sub_jenis'][$ii]['total_anggaran_provinsi']=0;
						$data['jenis'][$i]['sub_jenis'][$ii]['total_anggaran_sharing']=0;
						$data['jenis'][$i]['sub_jenis'][$ii]['total_nilai_kontrak']=0;
						$data['jenis'][$i]['sub_jenis'][$ii]['total_realisasi_provinsi']=0;
						$data['jenis'][$i]['sub_jenis'][$ii]['total_realisasi_provinsi_persen']=0;
						$data['jenis'][$i]['sub_jenis'][$ii]['total_realisasi_spj']=0;
						$data['jenis'][$i]['sub_jenis'][$ii]['total_realisasi_spj_persen'] = 0;
						$data['jenis'][$i]['sub_jenis'][$ii]['total_target_fisik'] = 0;
						$data['jenis'][$i]['sub_jenis'][$ii]['total_realisasi_fisik'] = 0;
						$bantuan3 = 0;
						$bantuan4 =0;
						$data['jenis'][$i]['sub_jenis'][$ii]['isine'] = $this->model_bku->get_by_jenis_sub_jenis($data['jenis'][$i]['id'], $data['jenis'][$i]['sub_jenis'][$ii]['id']);

							for ($iii=0; $iii < count($data['jenis'][$i]['sub_jenis'][$ii]['isine']); $iii++) { 
								$start = $start +1;
								$kolom = 'C'.$start;
								$c = $iii +1;
								$this->excel->getActiveSheet()->setCellValue($kolom, $a.'.'.$b.'.'.$c);
								$kolom = 'D'.$start;
								$this->excel->getActiveSheet()->setCellValue($kolom, $data['jenis'][$i]['sub_jenis'][$ii]['isine'][$iii]['kegiatan']);
								$kolom = 'E'.$start;
								$this->excel->getActiveSheet()->setCellValue($kolom, $data['jenis'][$i]['sub_jenis'][$ii]['isine'][$iii]['anggaran_provinsi']);
								$kolom = 'F'.$start;
								$this->excel->getActiveSheet()->setCellValue($kolom, $data['jenis'][$i]['sub_jenis'][$ii]['isine'][$iii]['anggaran_sharing']);
									$kolom = 'G'.$start;
								$this->excel->getActiveSheet()->setCellValue($kolom, $data['jenis'][$i]['sub_jenis'][$ii]['isine'][$iii]['metode_pengadaan']);
									$kolom = 'H'.$start;
								$this->excel->getActiveSheet()->setCellValue($kolom, $data['jenis'][$i]['sub_jenis'][$ii]['isine'][$iii]['tanggal_pengadaan']);
								$kolom = 'I'.$start;
								$this->excel->getActiveSheet()->setCellValue($kolom, $data['jenis'][$i]['sub_jenis'][$ii]['isine'][$iii]['nilai_kontrak']);
								$kolom = 'J'.$start;
								$this->excel->getActiveSheet()->setCellValue($kolom, $data['jenis'][$i]['sub_jenis'][$ii]['isine'][$iii]['realisasi_provinsi']);
							
								$data['jenis'][$i]['sub_jenis'][$ii]['total_anggaran_provinsi']=$data['jenis'][$i]['sub_jenis'][$ii]['total_anggaran_provinsi'] + $data['jenis'][$i]['sub_jenis'][$ii]['isine'][$iii]['anggaran_provinsi'];
								$data['jenis'][$i]['sub_jenis'][$ii]['total_anggaran_sharing']=$data['jenis'][$i]['sub_jenis'][$ii]['total_anggaran_sharing'] + $data['jenis'][$i]['sub_jenis'][$ii]['isine'][$iii]['anggaran_sharing'];
								$data['jenis'][$i]['sub_jenis'][$ii]['total_nilai_kontrak']=$data['jenis'][$i]['sub_jenis'][$ii]['total_nilai_kontrak'] + $data['jenis'][$i]['sub_jenis'][$ii]['isine'][$iii]['nilai_kontrak'];
								$data['jenis'][$i]['sub_jenis'][$ii]['total_realisasi_provinsi']=$data['jenis'][$i]['sub_jenis'][$ii]['total_realisasi_provinsi'] + $data['jenis'][$i]['sub_jenis'][$ii]['isine'][$iii]['realisasi_provinsi'];
								
								$data['jenis'][$i]['sub_jenis'][$ii]['isine'][$iii]['realisasi_provinsi_persen'] = $data['jenis'][$i]['sub_jenis'][$ii]['isine'][$iii]['realisasi_provinsi'] / $data['jenis'][$i]['sub_jenis'][$ii]['isine'][$iii]['anggaran_provinsi'] * 100;
									$kolom = 'K'.$start;
								$this->excel->getActiveSheet()->setCellValue($kolom, $data['jenis'][$i]['sub_jenis'][$ii]['isine'][$iii]['realisasi_provinsi_persen']);
								
								$data['jenis'][$i]['sub_jenis'][$ii]['total_realisasi_provinsi_persen']=$data['jenis'][$i]['sub_jenis'][$ii]['total_realisasi_provinsi'] / $data['jenis'][$i]['sub_jenis'][$ii]['total_anggaran_provinsi'] * 100;
								
								$data['jenis'][$i]['sub_jenis'][$ii]['total_realisasi_spj']					= $data['jenis'][$i]['sub_jenis'][$ii]['total_realisasi_spj'] + $data['jenis'][$i]['sub_jenis'][$ii]['isine'][$iii]['realisasi_spj'];
									$kolom = 'L'.$start;
								$this->excel->getActiveSheet()->setCellValue($kolom, $data['jenis'][$i]['sub_jenis'][$ii]['isine'][$iii]['realisasi_spj']);
							
								$data['jenis'][$i]['sub_jenis'][$ii]['isine'][$iii]['realisasi_spj_persen']	=$data['jenis'][$i]['sub_jenis'][$ii]['isine'][$iii]['realisasi_spj'] / ($data['jenis'][$i]['sub_jenis'][$ii]['isine'][$iii]['anggaran_provinsi'] + $data['jenis'][$i]['sub_jenis'][$ii]['isine'][$iii]['anggaran_sharing']) * 100;
									$kolom = 'M'.$start;
								$this->excel->getActiveSheet()->setCellValue($kolom, $data['jenis'][$i]['sub_jenis'][$ii]['isine'][$iii]['realisasi_spj_persen']);
							
								$data['jenis'][$i]['sub_jenis'][$ii]['total_realisasi_spj_persen']			=$data['jenis'][$i]['sub_jenis'][$ii]['total_realisasi_spj'] / ($data['jenis'][$i]['sub_jenis'][$ii]['total_anggaran_provinsi'] + $data['jenis'][$i]['sub_jenis'][$ii]['total_anggaran_sharing']) * 100;
								
								$bantuan3 = $bantuan3 + ($data['jenis'][$i]['sub_jenis'][$ii]['isine'][$iii]['anggaran_provinsi'] + $data['jenis'][$i]['sub_jenis'][$ii]['isine'][$iii]['anggaran_sharing']) * $data['jenis'][$i]['sub_jenis'][$ii]['isine'][$iii]['target_fisik'] / 100;
								$bantuan4 = $bantuan4 + ($data['jenis'][$i]['sub_jenis'][$ii]['isine'][$iii]['anggaran_provinsi'] + $data['jenis'][$i]['sub_jenis'][$ii]['isine'][$iii]['anggaran_sharing']) * $data['jenis'][$i]['sub_jenis'][$ii]['isine'][$iii]['realisasi_fisik'] / 100;
								$bantuan1 = $bantuan1 + $bantuan3;
								$bantuan2 = $bantuan2 + $bantuan4;
								$data['jenis'][$i]['sub_jenis'][$ii]['total_target_fisik'] = $bantuan3 / ($data['jenis'][$i]['sub_jenis'][$ii]['total_anggaran_provinsi'] + $data['jenis'][$i]['sub_jenis'][$ii]['total_anggaran_sharing']) * 100;
								$data['jenis'][$i]['sub_jenis'][$ii]['total_realisasi_fisik'] = $bantuan4 / ($data['jenis'][$i]['sub_jenis'][$ii]['total_anggaran_provinsi'] + $data['jenis'][$i]['sub_jenis'][$ii]['total_anggaran_sharing']) * 100;
							
								$kolom = 'N'.$start;
								$this->excel->getActiveSheet()->setCellValue($kolom, $data['jenis'][$i]['sub_jenis'][$ii]['isine'][$iii]['target_fisik']);
									$kolom = 'O'.$start;
								$this->excel->getActiveSheet()->setCellValue($kolom, $data['jenis'][$i]['sub_jenis'][$ii]['isine'][$iii]['realisasi_fisik']);
									$kolom = 'P'.$start;
								$this->excel->getActiveSheet()->setCellValue($kolom, $data['jenis'][$i]['sub_jenis'][$ii]['isine'][$iii]['permasalahan']);
							
									}

									//tengah
									$kolom = 'E'.$start_tengah;
								$this->excel->getActiveSheet()->setCellValue($kolom, $data['jenis'][$i]['sub_jenis'][$ii]['total_anggaran_provinsi']);
								$kolom = 'F'.$start_tengah;
								$this->excel->getActiveSheet()->setCellValue($kolom, $data['jenis'][$i]['sub_jenis'][$ii]['total_anggaran_sharing']);
								$kolom = 'I'.$start_tengah;
								$this->excel->getActiveSheet()->setCellValue($kolom, $data['jenis'][$i]['sub_jenis'][$ii]['total_nilai_kontrak']);
								$kolom = 'J'.$start_tengah;
								$this->excel->getActiveSheet()->setCellValue($kolom, $data['jenis'][$i]['sub_jenis'][$ii]['total_realisasi_provinsi']);
									$kolom = 'K'.$start_tengah;
								$this->excel->getActiveSheet()->setCellValue($kolom, $data['jenis'][$i]['sub_jenis'][$ii]['total_realisasi_provinsi_persen']);
									$kolom = 'L'.$start_tengah;
								$this->excel->getActiveSheet()->setCellValue($kolom, $data['jenis'][$i]['sub_jenis'][$ii]['total_realisasi_spj']);
									$kolom = 'M'.$start_tengah;
								$this->excel->getActiveSheet()->setCellValue($kolom, $data['jenis'][$i]['sub_jenis'][$ii]['total_realisasi_spj_persen']);
								$kolom = 'N'.$start_tengah;
								$this->excel->getActiveSheet()->setCellValue($kolom, $data['jenis'][$i]['sub_jenis'][$ii]['total_target_fisik']);
									$kolom = 'O'.$start_tengah;
								$this->excel->getActiveSheet()->setCellValue($kolom, $data['jenis'][$i]['sub_jenis'][$ii]['total_realisasi_fisik']);
						
							//totalan perbidang
									if(count($data['jenis'][$i]['sub_jenis'][$ii]['isine']) > 0){
					$data['jenis'][$i]['total_anggaran_provinsi'] = $data['jenis'][$i]['total_anggaran_provinsi'] + $data['jenis'][$i]['sub_jenis'][$ii]['total_anggaran_provinsi'];
					$data['jenis'][$i]['total_anggaran_sharing'] = $data['jenis'][$i]['total_anggaran_sharing'] + $data['jenis'][$i]['sub_jenis'][$ii]['total_anggaran_sharing'];
					$data['jenis'][$i]['total_nilai_kontrak'] = $data['jenis'][$i]['total_nilai_kontrak'] + $data['jenis'][$i]['sub_jenis'][$ii]['total_nilai_kontrak'];
					$data['jenis'][$i]['total_realisasi_provinsi'] = $data['jenis'][$i]['total_realisasi_provinsi'] + $data['jenis'][$i]['sub_jenis'][$ii]['total_realisasi_provinsi'];
					$data['jenis'][$i]['total_realisasi_provinsi_persen'] = $data['jenis'][$i]['total_realisasi_provinsi'] / $data['jenis'][$i]['total_anggaran_provinsi'] * 100;
					$data['jenis'][$i]['total_realisasi_spj'] = $data['jenis'][$i]['total_realisasi_spj'] + $data['jenis'][$i]['sub_jenis'][$ii]['total_realisasi_spj'];
					$data['jenis'][$i]['total_realisasi_spj_persen'] = $data['jenis'][$i]['total_realisasi_spj'] / ($data['jenis'][$i]['total_anggaran_provinsi'] + $data['jenis'][$i]['total_anggaran_sharing']) * 100;
					$data['jenis'][$i]['total_target_fisik'] = $bantuan1 / ($data['jenis'][$i]['total_anggaran_provinsi'] + $data['jenis'][$i]['total_anggaran_sharing']) * 100;
					$data['jenis'][$i]['total_realisasi_fisik'] = $bantuan2 / ($data['jenis'][$i]['total_anggaran_provinsi'] + $data['jenis'][$i]['total_anggaran_sharing']) * 100;
							}
								}
								//awal
										$kolom = 'E'.$start_awal;
								$this->excel->getActiveSheet()->setCellValue($kolom, $data['jenis'][$i]['total_anggaran_provinsi']);
								$kolom = 'F'.$start_awal;
								$this->excel->getActiveSheet()->setCellValue($kolom, $data['jenis'][$i]['total_anggaran_sharing']);
								$kolom = 'I'.$start_awal;
								$this->excel->getActiveSheet()->setCellValue($kolom, $data['jenis'][$i]['total_nilai_kontrak']);
								$kolom = 'J'.$start_awal;
								$this->excel->getActiveSheet()->setCellValue($kolom, $data['jenis'][$i]['total_realisasi_provinsi']);
									$kolom = 'K'.$start_awal;
								$this->excel->getActiveSheet()->setCellValue($kolom, $data['jenis'][$i]['total_realisasi_provinsi_persen']);
									$kolom = 'L'.$start_awal;
								$this->excel->getActiveSheet()->setCellValue($kolom, $data['jenis'][$i]['total_realisasi_spj']);
									$kolom = 'M'.$start_awal;
								$this->excel->getActiveSheet()->setCellValue($kolom, $data['jenis'][$i]['total_realisasi_spj_persen']);
								$kolom = 'N'.$start_awal;
								$this->excel->getActiveSheet()->setCellValue($kolom, $data['jenis'][$i]['total_target_fisik']);
									$kolom = 'O'.$start_awal;
								$this->excel->getActiveSheet()->setCellValue($kolom, $data['jenis'][$i]['total_realisasi_fisik']);
						
				}
	
				//merge cell A1 until D1
				
				//set aligment to center for that merged cell (A1 to D1)
				$this->excel->getActiveSheet()->getStyle('A1:P4')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
				$filename='BKU '.$this->session->userdata('tahun').'.xls'; //save our workbook as this file name
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
		$data['jenis'] = $this->model_jenis->get('bku');
		for ($i=0; $i < count($data['jenis']); $i++) { 
			$data['jenis'][$i]['total_anggaran_provinsi'] = 0;
			$data['jenis'][$i]['total_anggaran_sharing'] = 0;
			$data['jenis'][$i]['total_nilai_kontrak'] = 0;
			$data['jenis'][$i]['total_realisasi_provinsi'] = 0;
			$data['jenis'][$i]['total_realisasi_provinsi_persen'] = 0;
			$data['jenis'][$i]['total_realisasi_spj'] = 0;
			$data['jenis'][$i]['total_realisasi_spj_persen'] = 0;
			$data['jenis'][$i]['total_target_fisik'] = 0;
			$data['jenis'][$i]['total_realisasi_fisik'] = 0;
			$bantuan1 = 0;
			$bantuan2 = 0;
			$data['jenis'][$i]['sub_jenis'] = $this->model_sub_jenis->get_by_id_jenis('bku', $data['jenis'][$i]['id']);

			for ($ii=0; $ii < count($data['jenis'][$i]['sub_jenis']); $ii++) {
				$data['jenis'][$i]['sub_jenis'][$ii]['total_anggaran_provinsi']=0;
				$data['jenis'][$i]['sub_jenis'][$ii]['total_anggaran_sharing']=0;
				$data['jenis'][$i]['sub_jenis'][$ii]['total_nilai_kontrak']=0;
				$data['jenis'][$i]['sub_jenis'][$ii]['total_realisasi_provinsi']=0;
				$data['jenis'][$i]['sub_jenis'][$ii]['total_realisasi_provinsi_persen']=0;
				$data['jenis'][$i]['sub_jenis'][$ii]['total_realisasi_spj']=0;
				$data['jenis'][$i]['sub_jenis'][$ii]['total_realisasi_spj_persen'] = 0;
				$data['jenis'][$i]['sub_jenis'][$ii]['total_target_fisik'] = 0;
				$data['jenis'][$i]['sub_jenis'][$ii]['total_realisasi_fisik'] = 0;
				$bantuan3 = 0;
				$bantuan4 =0;
				$data['jenis'][$i]['sub_jenis'][$ii]['isine'] = $this->model_bku->get_by_jenis_sub_jenis($data['jenis'][$i]['id'], $data['jenis'][$i]['sub_jenis'][$ii]['id']);

					for ($iii=0; $iii < count($data['jenis'][$i]['sub_jenis'][$ii]['isine']); $iii++) { 
						$data['jenis'][$i]['sub_jenis'][$ii]['total_anggaran_provinsi']=$data['jenis'][$i]['sub_jenis'][$ii]['total_anggaran_provinsi'] + $data['jenis'][$i]['sub_jenis'][$ii]['isine'][$iii]['anggaran_provinsi'];
						$data['jenis'][$i]['sub_jenis'][$ii]['total_anggaran_sharing']=$data['jenis'][$i]['sub_jenis'][$ii]['total_anggaran_sharing'] + $data['jenis'][$i]['sub_jenis'][$ii]['isine'][$iii]['anggaran_sharing'];
						$data['jenis'][$i]['sub_jenis'][$ii]['total_nilai_kontrak']=$data['jenis'][$i]['sub_jenis'][$ii]['total_nilai_kontrak'] + $data['jenis'][$i]['sub_jenis'][$ii]['isine'][$iii]['nilai_kontrak'];
						$data['jenis'][$i]['sub_jenis'][$ii]['total_realisasi_provinsi']=$data['jenis'][$i]['sub_jenis'][$ii]['total_realisasi_provinsi'] + $data['jenis'][$i]['sub_jenis'][$ii]['isine'][$iii]['realisasi_provinsi'];
						
						$data['jenis'][$i]['sub_jenis'][$ii]['isine'][$iii]['realisasi_provinsi_persen'] = $data['jenis'][$i]['sub_jenis'][$ii]['isine'][$iii]['realisasi_provinsi'] / $data['jenis'][$i]['sub_jenis'][$ii]['isine'][$iii]['anggaran_provinsi'] * 100;
						$data['jenis'][$i]['sub_jenis'][$ii]['total_realisasi_provinsi_persen']=$data['jenis'][$i]['sub_jenis'][$ii]['total_realisasi_provinsi'] / $data['jenis'][$i]['sub_jenis'][$ii]['total_anggaran_provinsi'] * 100;
						
						$data['jenis'][$i]['sub_jenis'][$ii]['total_realisasi_spj']= $data['jenis'][$i]['sub_jenis'][$ii]['total_realisasi_spj'] + $data['jenis'][$i]['sub_jenis'][$ii]['isine'][$iii]['realisasi_spj'];
						$data['jenis'][$i]['sub_jenis'][$ii]['isine'][$iii]['realisasi_spj_persen']=$data['jenis'][$i]['sub_jenis'][$ii]['isine'][$iii]['realisasi_spj'] / ($data['jenis'][$i]['sub_jenis'][$ii]['isine'][$iii]['anggaran_provinsi'] + $data['jenis'][$i]['sub_jenis'][$ii]['isine'][$iii]['anggaran_sharing']) * 100;
						$data['jenis'][$i]['sub_jenis'][$ii]['total_realisasi_spj_persen']=$data['jenis'][$i]['sub_jenis'][$ii]['total_realisasi_spj'] / ($data['jenis'][$i]['sub_jenis'][$ii]['total_anggaran_provinsi'] + $data['jenis'][$i]['sub_jenis'][$ii]['total_anggaran_sharing']) * 100;
						
						$bantuan3 = $bantuan3 + ($data['jenis'][$i]['sub_jenis'][$ii]['isine'][$iii]['anggaran_provinsi'] + $data['jenis'][$i]['sub_jenis'][$ii]['isine'][$iii]['anggaran_sharing']) * $data['jenis'][$i]['sub_jenis'][$ii]['isine'][$iii]['target_fisik'] / 100;
						$bantuan4 = $bantuan4 + ($data['jenis'][$i]['sub_jenis'][$ii]['isine'][$iii]['anggaran_provinsi'] + $data['jenis'][$i]['sub_jenis'][$ii]['isine'][$iii]['anggaran_sharing']) * $data['jenis'][$i]['sub_jenis'][$ii]['isine'][$iii]['realisasi_fisik'] / 100;
						$bantuan1 = $bantuan1 + $bantuan3;
						$bantuan2 = $bantuan2 + $bantuan4;
						$data['jenis'][$i]['sub_jenis'][$ii]['total_target_fisik'] = $bantuan3 / ($data['jenis'][$i]['sub_jenis'][$ii]['total_anggaran_provinsi'] + $data['jenis'][$i]['sub_jenis'][$ii]['total_anggaran_sharing']) * 100;
						$data['jenis'][$i]['sub_jenis'][$ii]['total_realisasi_fisik'] = $bantuan4 / ($data['jenis'][$i]['sub_jenis'][$ii]['total_anggaran_provinsi'] + $data['jenis'][$i]['sub_jenis'][$ii]['total_anggaran_sharing']) * 100;
				
							}
					//totalan perbidang
							if(count($data['jenis'][$i]['sub_jenis'][$ii]['isine']) > 0){
			$data['jenis'][$i]['total_anggaran_provinsi'] = $data['jenis'][$i]['total_anggaran_provinsi'] + $data['jenis'][$i]['sub_jenis'][$ii]['total_anggaran_provinsi'];
			$data['jenis'][$i]['total_anggaran_sharing'] = $data['jenis'][$i]['total_anggaran_sharing'] + $data['jenis'][$i]['sub_jenis'][$ii]['total_anggaran_sharing'];
			$data['jenis'][$i]['total_nilai_kontrak'] = $data['jenis'][$i]['total_nilai_kontrak'] + $data['jenis'][$i]['sub_jenis'][$ii]['total_nilai_kontrak'];
			$data['jenis'][$i]['total_realisasi_provinsi'] = $data['jenis'][$i]['total_realisasi_provinsi'] + $data['jenis'][$i]['sub_jenis'][$ii]['total_realisasi_provinsi'];
			$data['jenis'][$i]['total_realisasi_provinsi_persen'] = $data['jenis'][$i]['total_realisasi_provinsi'] / $data['jenis'][$i]['total_anggaran_provinsi'] * 100;
			$data['jenis'][$i]['total_realisasi_spj'] = $data['jenis'][$i]['total_realisasi_spj'] + $data['jenis'][$i]['sub_jenis'][$ii]['total_realisasi_spj'];
			$data['jenis'][$i]['total_realisasi_spj_persen'] = $data['jenis'][$i]['total_realisasi_spj'] / ($data['jenis'][$i]['total_anggaran_provinsi'] + $data['jenis'][$i]['total_anggaran_sharing']) * 100;
			$data['jenis'][$i]['total_target_fisik'] = $bantuan1 / ($data['jenis'][$i]['total_anggaran_provinsi'] + $data['jenis'][$i]['total_anggaran_sharing']) * 100;
			$data['jenis'][$i]['total_realisasi_fisik'] = $bantuan2 / ($data['jenis'][$i]['total_anggaran_provinsi'] + $data['jenis'][$i]['total_anggaran_sharing']) * 100;
					}
						}
		}
		$this->output->set_content_type('application/json')->set_output(json_encode($data));
	
	}
	public function add()
	{
		$data['jenis'] = $this->model_jenis->get('bku');
		$data['sub_jenis'] = $this->model_sub_jenis->get('bku');
		//$data['dak'] = $this->model_dak->get();
	
		$this->load->view('template_backoffice/header');
		$this->load->view('content_backoffice/bku/add_bku', $data);
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
			$data['jenis'] = $this->model_jenis->get('bku');
			$data['sub_jenis'] = $this->model_sub_jenis->get('bku');
		
			$this->load->view('template_backoffice/header');
			$this->load->view('content_backoffice/bku/add_bku', $data);
			$this->load->view('template_backoffice/footer');
		}
		else
		{
			$insert = $this->model_bku->add();
			if ($insert==true) {
				redirect('bku');
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

			$data['bku'] = $this->model_bku->get($this->input->post('id'));
			$data['jenis'] = $this->model_jenis->get('bku');
			$data['sub_jenis'] = $this->model_sub_jenis->get('bku');
		
		
			$this->load->view('template_backoffice/header');
			$this->load->view('content_backoffice/bku/edit_bku', $data);
			$this->load->view('template_backoffice/footer');
		}
		else
		{
			$update = $this->model_bku->edit();
			if ($update==true) {
				redirect('bku');
			}
			else{
				echo "gagal dimasukkan";
			}
			
		}
	}

	public function delete( $id)
	{
		$this->model_bku->delete($id);
		redirect('bku');
		}


}

/* End of file user.php */
/* Location: ./application/controllers/user.php */