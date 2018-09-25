<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Reporte extends CI_Controller {

	function __construct() {
		parent::__construct();
		$this->load->helper('form');
		// $this->load->library('Utilerias');

		// $this->load->model('Producto_model');
		$this->load->model('Reportepdf_model');

		$this->load->library('PDF_MC_Table');
	}// __construct()


	function get_inventario(){
		// if(Utilerias::verifica_sesion_redirige($this)){
			/**/
			$fecha = date("Y-m-d H:i:s");
			$fecha2 = explode(" ",$fecha);
			$segundos = $fecha2[1];
			$arr_aux = explode("-",$fecha2[0]);

			$anio_i = $arr_aux[0];
			$mes_i = $arr_aux[1];
			$dia_i = $arr_aux[2];
			// $nombre_mes_i = Utilerias::get_nombremes($mes_i);
			$fecha = "Fecha: ".$dia_i." ".$mes_i." ".$anio_i." Hora: ".$segundos;

			$pdf = new PDF_MC_Table();
			$pdf->AliasNbPages();
			$pdf->AddPage();

			// Arial bold 16
			$pdf->SetFont('Arial','B',16);
			// Logo
			$pdf->Image(base_url().'assets/img/logoC-SE.png',10,8,70);

			

			$pdf->Ln(1);
			$pdf->SetFont('Arial','B',11);
			$pdf->MultiCell(0,5,utf8_decode('CCT:'),0,"R");
			$pdf->Ln(2);
			$pdf->SetFont('Arial','B',11);
			$pdf->MultiCell(0,5,utf8_decode('ESCUELA:'),0,"R");
			$pdf->Ln(3);
			$pdf->SetFont('Arial','B',11);
			$pdf->MultiCell(0,5,utf8_decode('CICLO:'),0,"R");
			// Movernos a la derecha, 85cm

			// Título
			$pdf->SetTextColor(0,0,0);
			$pdf->SetFont('Arial','B',16);
			$pdf->Cell(75);
			$pdf->Cell(40,20,'Ruta de Mejora',0,1,'C');

			//DATOS
			$pdf->Ln(4);
			$pdf->SetY(50); /* Set 20 Eje Y */
			$pdf->SetFont('Arial','B',11);
			$pdf->Cell(0,5,utf8_decode('Orden:'),0,1,"L");
			$pdf->SetY(50); /* Set 20 Eje Y */
			$pdf->SetFont('Arial','B',11);
			$pdf->Cell(0,5,utf8_decode('Tema:'),0,1,"C");
			$pdf->SetY(50); /* Set 20 Eje Y */
			$pdf->SetFont('Arial','B',11);
			$pdf->Cell(0,5,utf8_decode('Indicador APA:'),0,1,"R");

			$pdf->Ln(5);
			$pdf->SetY(55); /* Set 20 Eje Y */
			$pdf->SetFont('Arial','B',11);
			$pdf->Cell(0,5,utf8_decode('Objetivo1:'),0,1,"L");
			$pdf->Ln(6);
			$pdf->SetY(60); /* Set 20 Eje Y */
			$pdf->SetFont('Arial','B',11);
			$pdf->Cell(0,5,utf8_decode('Objetivo2:'),0,1,"L");
			$pdf->Ln(7);
			$pdf->SetY(65); /* Set 20 Eje Y */
			$pdf->SetFont('Arial','B',11);
			$pdf->Cell(0,5,utf8_decode('Problematicas:'),0,1,"L");
			$pdf->Ln(8);
			$pdf->SetY(70); /* Set 20 Eje Y */
			$pdf->SetFont('Arial','B',11);
			$pdf->Cell(0,5,utf8_decode('Evidencias:'),0,1,"L");
			$pdf->Ln(9);
			$pdf->SetY(75); /* Set 20 Eje Y */
			$pdf->SetFont('Arial','B',11);
			$pdf->Cell(0,5,utf8_decode('Observaciones:'),0,1,"L");
			$pdf->Ln(10);
			$pdf->SetY(80); /* Set 20 Eje Y */
			$pdf->SetFont('Arial','B',11);
			$pdf->Cell(0,5,utf8_decode('Observaciones supervisor:'),0,1,"L");


			$pdf->Ln(11);
			/**/
			$pdf->SetFont('Arial','B',11);

			//Table with 4 columns
			$pdf->SetWidths(array(10,31,30,35,26,26,26)); // ancho de primer columna, segunda, tercera y cuarta

			$result = $this->Reportepdf_model->get_acciones(15);

			$pdf->SetFillColor(255,255,255);
			// $pdf->SetDrawColor(0, 0, 0);
			$pdf->SetAligns(array("C","C","C","C","C","C","C"));
			$pdf->SetColors(array(TRUE,TRUE,TRUE,TRUE,TRUE,TRUE,TRUE));
			$pdf->SetLineW(array(0.2,0.2,0.2,0.2,0.2,0.2,0.2));
			$pdf->SetTextColor(0,0,0);
			$pdf->Row(array(
				utf8_decode("No."),
				utf8_decode("Actividad"),
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
			$pdf->Output();

		// }
	}// get_inventario()

	
}// class
