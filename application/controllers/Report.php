<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Report extends CI_Controller {

	function __construct() {
		parent::__construct();
		$this->load->library('ExcelPHP');
		$this->load->model('Escuela_model');

		$this->style_encabezado = array(
			'borders' => array(
				'allborders' => array(
					'style' => PHPExcel_Style_Border::BORDER_THIN
				)
			),
			'fill' => array(
				'type'  => PHPExcel_Style_Fill::FILL_SOLID,
				'color' => array(
					'rgb' => 'F4FCFC')
				),
				'font' => array(
					'name'  => 'Arial',
					'bold'  => true,
					'color' => array(
						'rgb' => '000000'
					)
				)
			);
			$this->style_contenido = array(
				'borders' => array(
					'allborders' => array(
						'style' => PHPExcel_Style_Border::BORDER_THIN
					)
				),
				'fill' => array(
					'type'  => PHPExcel_Style_Fill::FILL_SOLID
				),
				'font' => array(
					'name'  => 'Arial',
					// 'bold'  => true,
					'color' => array(
						'rgb' => '000000'
					)
				),
				'alignment' =>  array(
					'horizontal'=> PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
					'vertical'  => PHPExcel_Style_Alignment::VERTICAL_CENTER
					// 'wrap'      => TRUE
				)
			);

			$this->style_titulo = array(
				'borders' => array(
					'allborders' => array(
						'style' => PHPExcel_Style_Border::BORDER_THIN
					)
				),
				'fill' => array(
					'type'  => PHPExcel_Style_Fill::FILL_SOLID,
					'color' => array(
						'rgb' => 'DFF5F5')
					),
					'font' => array(
						'name'  => 'Arial',
						'bold'  => true,
						'color' => array(
							'rgb' => '000000'
						)
					),
					'alignment' =>  array(
						'horizontal'=> PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
						'vertical'  => PHPExcel_Style_Alignment::VERTICAL_CENTER
						// 'wrap'      => TRUE
					)
				);

			}

			public function por_escuela(){
				$cve_municipio = $this->input->post('slc_busquedalista_municipio_reporte');
				$cve_nivel = $this->input->post('slc_busquedalista_nivel_reporte');
				$cve_sostenimiento = $this->input->post('slc_busquedalista_sostenimiento_reporte');
				$nombre_escuela = $this->input->post('itxt_busquedalista_nombreescuela_reporte');

				$result_escuelas = $this->Escuela_model->get_xparams($cve_municipio,$cve_nivel,$cve_sostenimiento,$nombre_escuela);

				$obj_excel = new PHPExcel();
				$obj_excel->getActiveSheet()->SetCellValue('A1', 'Lista de escuelas');
				$obj_excel->getActiveSheet()->SetCellValue('A2', 'CCT');
				$obj_excel->getActiveSheet()->SetCellValue('B2', 'Turno');
				$obj_excel->getActiveSheet()->SetCellValue('C2', 'Nombre');
				$obj_excel->getActiveSheet()->SetCellValue('D2', 'Nivel');
				$obj_excel->getActiveSheet()->SetCellValue('E2', 'Municipio');
				$obj_excel->getActiveSheet()->SetCellValue('F2', 'Localidad');
				$obj_excel->getActiveSheet()->SetCellValue('G2', 'Domicilio');

				$obj_excel->getActiveSheet()->mergeCells('A1:G1');
				$obj_excel->getActiveSheet()->getStyle('A1:G1')->applyFromArray($this->style_titulo);
				$obj_excel->getActiveSheet()->getColumnDimension('A')->setAutoSize(true);
				$obj_excel->getActiveSheet()->getColumnDimension('B')->setAutoSize(true);
				$obj_excel->getActiveSheet()->getColumnDimension('C')->setAutoSize(true);
				$obj_excel->getActiveSheet()->getColumnDimension('D')->setAutoSize(true);
				$obj_excel->getActiveSheet()->getColumnDimension('E')->setAutoSize(true);
				$obj_excel->getActiveSheet()->getColumnDimension('F')->setAutoSize(true);
				$obj_excel->getActiveSheet()->getColumnDimension('G')->setAutoSize(true);
				$obj_excel->getActiveSheet()->getStyle('A2:G2')->applyFromArray($this->style_encabezado);

				$aux = 3;
				foreach ($result_escuelas as $row) {
					$obj_excel->getActiveSheet()->SetCellValue('A'.$aux, utf8_encode($row['cve_centro']) );
					$obj_excel->getActiveSheet()->SetCellValue('B'.$aux, utf8_encode($row['turno']) );
					$obj_excel->getActiveSheet()->SetCellValue('C'.$aux, utf8_encode($row['nombre_centro']) );
					$obj_excel->getActiveSheet()->SetCellValue('D'.$aux, utf8_encode($row['nivel_educativo']) );
					$obj_excel->getActiveSheet()->SetCellValue('E'.$aux, utf8_encode($row['municipio']) );
					$obj_excel->getActiveSheet()->SetCellValue('F'.$aux, utf8_encode($row['localidad']) );
					$obj_excel->getActiveSheet()->SetCellValue('G'.$aux, utf8_encode($row['domicilio']) );
					$obj_excel->getActiveSheet()->getStyle('A'.$aux.':G'.$aux)->applyFromArray($this->style_contenido);
					$aux++;
				}

				$hoy = date("Y-m-d");
				$name_file = "Reporte_escuelas_".$hoy.'.xlsx';
				$this->downloand_file($obj_excel,$name_file);
			}// por_escuela()

			private function downloand_file($obj_excel,$nombre){
				// Se modifican los encabezados del HTTP para indicar que se envia un archivo de Excel.
				header("Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet");
				header("Content-Disposition: attachment;filename={$nombre}");
				header("Cache-Control: max-age=0");
				$obj_writer = PHPExcel_IOFactory::createWriter($obj_excel, "Excel2007");
				ob_end_clean();
				$obj_writer->save("php://output");
			}// downloand_file()

		}// Report
