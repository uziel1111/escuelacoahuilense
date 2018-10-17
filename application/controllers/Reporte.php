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
			$pdf->AddPage('L');

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
				$tema = "Prioridad: {$ruta['tema']}";
				$pdf->Ln(4);
				$pdf->SetFont('Arial','B',11);
				$pdf->SetWidths(array(50,200)); // ancho de primer columna, segunda, tercera
				$pdf->SetFillColor(255,255,255);
				$pdf->SetAligns(array("L","C"));
				$pdf->SetLineW(array(0,0));
				$pdf->SetTextColor(0,0);
					$pdf->Row2(array(
						utf8_decode($orden),
						utf8_decode($tema)
					));

				$obj1 = "Objetivo1: {$ruta['objetivo1']}";
				$pdf->Ln(5);
				$pdf->SetFont('Arial','B',9);
				$pdf->SetWidths(array(250)); // ancho de primer columna, segunda, tercera
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
				$pdf->SetWidths(array(250)); // ancho de primer columna, segunda, tercera
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
				$pdf->SetWidths(array(250)); // ancho de primer columna, segunda, tercera
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
				$pdf->SetWidths(array(250)); // ancho de primer columna, segunda, tercera
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
				$pdf->SetWidths(array(250)); // ancho de primer columna, segunda, tercera
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
				$pdf->SetWidths(array(20,41,40,45,46,46,46)); // ancho de primer columna, segunda, tercera y cuarta

				$result = $this->Reportepdf_model->get_acciones($id_tprioritario);
				// echo "<pre>";
				// print_r($result);
				// die();
				// $ids_responsables = $result[0]['ids_responsables'];

				$cct = Utilerias::get_cct_sesion($this);
				// echo "<pre>";
				// print_r($cct);
				// die();

				
				// echo $responsablesc; die();

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
				$ids = "";
				$responsablesc = "";
				foreach($result as $item){
					// echo "<pre>";
					// print_r($item["ids_responsables"]);
					// die();
					$ids_responsables = $item["ids_responsables"];
					$responsablesc .= $this->get_perosonal_mostrar($cct[0]['cve_centro'], $ids_responsables);
					
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

				// echo $responsablesc; die();

				// $responsables = "Responsables: {$responsablesc}";
				// $pdf->Ln(12);
				// $pdf->SetFont('Arial','B',9);
				// $pdf->SetWidths(array(350)); // ancho de primer columna, segunda, tercera
				// $pdf->SetFillColor(255);
				// $pdf->SetAligns(array("L"));
				// // $pdf->SetColors(array(TRUE));
				// $pdf->SetLineW(array(0.2));
				// $pdf->SetTextColor(0,0,0);
				// 	$pdf->Row2(array(
				// 		utf8_decode($responsablesc)
				// 	));

				$resp = "RESPONSABLES: {$responsablesc}";
				$pdf->Ln();
				$pdf->SetFont('Arial','B',9);
				$pdf->SetWidths(array(250)); // ancho de primer columna, segunda, tercera
				$pdf->SetFillColor(255);
				$pdf->SetAligns(array("L"));
				// $pdf->SetColors(array(TRUE));
				$pdf->SetLineW(array(0.2));
				$pdf->SetTextColor(93,155,155);
				// $pdf->SetTextColor(87,166,57);
					$pdf->Row2(array(
						utf8_decode($resp)
					));
				$pdf->Ln();

		}else{
			redirect('Rutademejora/index');
		}
	}

	public function get_perosonal_mostrar($cct, $ids_responsables){
		
		$ids_responsables = explode(",", $ids_responsables);
		// echo"<pre>"; print_r($ids_responsables); die();
		$curl = curl_init();
		$method = "POST";
		$url = "http://servicios.seducoahuila.gob.mx/wservice/personal/w_service_personal_by_cct.php";
		$data = array("cct" => $cct);

	    switch ($method)
	    {
	        case "POST":
	            curl_setopt($curl, CURLOPT_POST, 1);
	            if ($data)
	                curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
	            break;
	        default:
	            if ($data)
	                $url = sprintf("%s?%s", $url, http_build_query($data));
	    }

	    curl_setopt($curl, CURLOPT_URL, $url);
	    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);

	    $result = curl_exec($curl);

	    curl_close($curl);
	    $response = json_decode($result);

	    // echo "<pre>";
	    // print_r($response->Personal);
	    // die();
	    $personal = $response->Personal;
	    $listap = "";
	    foreach ($personal as $persona) {
	    	// echo "<pre>";
		    // print_r($persona);
		    // die();
		    for($i = 0; $i < count($ids_responsables); $i++){
		    	if($persona->rfc == $ids_responsables[$i]){
		    		$listap .= trim($persona->nombre_completo).", ";
		    	}
		    }
	    }

	    return $listap;
	}


}// class
