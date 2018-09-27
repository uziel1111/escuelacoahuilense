<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Reporte extends CI_Controller {

	function __construct() {
		parent::__construct();
		$this->load->helper('form');
		$this->load->library('Utilerias');
		$this->load->model('Reportepdf_model');
		$this->load->library('PDF_MC_Table');
	}// __construct()


	public function get_reporte(){
		if(Utilerias::haySesionAbiertacct($this)){
			$cct = Utilerias::get_cct_sesion($this);
			$id_cct = $cct[0]['id_cct'];
			$str_cct = "CCT: {$cct[0]['cve_centro']}";
			$str_nombre = "ESCUELA: {$cct[0]['nombre_centro']}";

			$fecha = date("Y-m-d");
			$arr_aux = explode("-",$fecha);

			$anio_i = $arr_aux[0];
			$mes_i = $arr_aux[1];
			$dia_i = $arr_aux[2];
			$fecha = " Fecha: ".$dia_i."/".$mes_i."/".$anio_i;
			$ciclo =$this->Reportepdf_model->get_ciclo($id_cct);
			$ciclo = "CICLO:".$ciclo[0]->ciclo.$fecha;

			$pdf = new PDF_MC_Table($str_cct, $str_nombre, $ciclo);
			//incializamos variables de header
			$pdf->SetvarHeader($str_cct, $str_nombre, $ciclo);
			$pdf->AliasNbPages();
			$pdf->AddPage();

			$rutas = $this->Reportepdf_model->get_rutasxcct($id_cct);
			foreach ($rutas as $ruta) {
				$id_tprioritario = $ruta['id_tprioritario'];
				//DATOS
				$this->pinta_ruta($pdf, $ruta, $pdf->GetY()+5, $id_tprioritario);

			}
			$pdf->Output();
		}
	}// get_reporte()

	public function pinta_ruta($pdf, $ruta, $y, $id_tprioritario){
		if(Utilerias::haySesionAbiertacct($this)){
				$orden = "Orden: {$ruta['orden']}";
				$tema = "Tema: {$ruta['tema']}";
				$pdf->Ln(4);
				$pdf->SetFont('Arial','B',11);
				$pdf->SetWidths(array(50,80,50)); // ancho de primer columna, segunda, tercera
				$pdf->SetFillColor(255,255,255);
				$pdf->SetAligns(array("L","C","C"));
				$pdf->SetLineW(array(0,0,0));
				$pdf->SetTextColor(0,0,0);
					$pdf->Row2(array(
						utf8_decode($orden),
						utf8_decode($tema),
						utf8_decode('Indicador APA:')
					));

				$obj1 = "Objetivo1: {$ruta['objetivo1']}";
				$pdf->Ln(5);
				$pdf->SetFont('Arial','B',9);
				$pdf->SetWidths(array(80)); // ancho de primer columna, segunda, tercera
				$pdf->SetFillColor(255);
				$pdf->SetAligns(array("L"));
				// $pdf->SetColors(array(TRUE));
				$pdf->SetLineW(array(0.2));
				$pdf->SetTextColor(0,0,0);
					$pdf->Row2(array(
						utf8_decode($obj1)
					));

				$obj2 = "Objetivo2: {$ruta['objetivo2']}";
				$pdf->Ln(6);
				$pdf->SetFont('Arial','B',9);
				$pdf->SetWidths(array(80)); // ancho de primer columna, segunda, tercera
				$pdf->SetFillColor(255);
				$pdf->SetAligns(array("L"));
				// $pdf->SetColors(array(TRUE));
				$pdf->SetLineW(array(0.2));
				$pdf->SetTextColor(0,0,0);
					$pdf->Row2(array(
						utf8_decode($obj2)
					));

				$problematica = "Problematicas: {$ruta['otro_problematica']}";
				$pdf->Ln(7);
				$pdf->SetFont('Arial','B',9);
				$pdf->SetWidths(array(80)); // ancho de primer columna, segunda, tercera
				$pdf->SetFillColor(255);
				$pdf->SetAligns(array("L"));
				// $pdf->SetColors(array(TRUE));
				$pdf->SetLineW(array(0.2));
				$pdf->SetTextColor(0,0,0);
					$pdf->Row2(array(
						utf8_decode($problematica)
					));
				
				
				$evidencia = "Evidencias: {$ruta['otro_evidencia']}";
				$pdf->Ln(8);
				$pdf->SetFont('Arial','B',9);
				$pdf->SetWidths(array(80)); // ancho de primer columna, segunda, tercera
				$pdf->SetFillColor(255);
				$pdf->SetAligns(array("L"));
				// $pdf->SetColors(array(TRUE));
				$pdf->SetLineW(array(0.2));
				$pdf->SetTextColor(0,0,0);
					$pdf->Row2(array(
						utf8_decode($evidencia)
					));

				$observaciondir = "Observaciones: {$ruta['obs_direc']}";
				$pdf->Ln(9);
				$pdf->SetFont('Arial','B',9);
				$pdf->SetWidths(array(80)); // ancho de primer columna, segunda, tercera
				$pdf->SetFillColor(255);
				$pdf->SetAligns(array("L"));
				// $pdf->SetColors(array(TRUE));
				$pdf->SetLineW(array(0.2));
				$pdf->SetTextColor(0,0,0);
					$pdf->Row2(array(
						utf8_decode($observaciondir)
					));
				


				$pdf->Ln(10);
				/**/
				$pdf->SetFont('Arial','B',11);

				//Table with 4 columns
				$pdf->SetWidths(array(10,31,30,35,26,26,26)); // ancho de primer columna, segunda, tercera y cuarta

				$result = $this->Reportepdf_model->get_acciones($id_tprioritario);

				$pdf->SetFillColor(255,255,255);
				// $pdf->SetDrawColor(0, 0, 0);
				$pdf->SetAligns(array("C","C","C","C","C","C","C"));
				// $pdf->SetColors(array(TRUE,TRUE,TRUE,TRUE,TRUE,TRUE,TRUE));
				$pdf->SetLineW(array(0.2,0.2,0.2,0.2,0.2,0.2,0.2));
				$pdf->SetTextColor(0,0,0);
				$pdf->Row(array(
					utf8_decode("No."),
					utf8_decode("Acción"),
					utf8_decode("Ámbito"),
					utf8_decode("Fecha inicio"),
					utf8_decode("Fecha fin"),
					utf8_decode("Recursos"),
					utf8_decode("Avance"),
				));


				$pdf->SetFont('Arial','',10);
				$pdf->SetAligns(array("L","L","L","L","L","L","L"));
				$pdf->SetColors(array(FALSE,FALSE,FALSE,FALSE,FALSE,FALSE,FALSE));
				$pdf->SetLineW(array(0.09,0.09,0.09,0.09,0.09,0.09,0.09));
				$cont=0;
				foreach($result as $item){
					$cont++;
					$pdf->Row(array(
						$cont,
						utf8_decode($item["accion"]),
						utf8_decode($item["ambito"]),
						utf8_decode($item["accion_f_inicio"]),
						utf8_decode($item["accion_f_termino"]),
						utf8_decode($item["mat_insumos"]),
						utf8_decode($item["avance"])
					));
				}
		}
	}


}// class
