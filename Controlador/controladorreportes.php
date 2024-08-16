<?php
session_start();
include_once 'Modelo/clsReportes.php';
include_once 'LibreriaFPDF/fpdf.php';

class controladorreportes
{
    public function reporteBonos()
    {
        $reporte = new clsReportes(); // Clase que está en el modelo

        if (!empty($_POST)) {
            // Recibo las cajas de texto del formulario HTML
            $nombre = $_POST['txtNombre'];
            $ap = $_POST['txtAp'];
            $am = $_POST['txtAm'];

            // Validación simple para asegurar que los campos no estén vacíos
            if(empty($nombre) || empty($ap) || empty($am)) {
                echo "<script>alert('Por favor, completa todos los campos.');</script>";
                return;
            }

            // Consulta a la base de datos para obtener los abonos y préstamos del cliente
            $consulta = $reporte->reporteAbono($nombre, $ap, $am);

            if ($consulta && $consulta->num_rows > 0) {
                
                // Iniciar el buffer de salida
                ob_start();

                // Crear el objeto FPDF
                $pdf = new FPDF();
                // Agregar una página
                $pdf->AddPage();

                // Ruta absoluta a la imagen
                $imagePath = realpath('./img/bbva-azul.png'); // Asegúrate de que la ruta sea correcta

                // Verificar si la imagen existe
                if ($imagePath && file_exists($imagePath)) {
                    $pdf->Cell(190, 30, $pdf->Image($imagePath, 130, 12, 60, 30), 0, 1, 'R');
                } else {
                    // Manejar el error de imagen faltante
                    $pdf->SetFont('Arial', 'B', 14);
                    $pdf->Cell(0, 10, 'Logo no disponible', 0, 1, 'R');
                }

                // Establecer la fuente y el tamaño de la fecha
                $pdf->SetFont('Arial', '', 9);

                // Agregar la fecha
                $fecha = date("Y-m-d H:i:s");
                $pdf->SetXY(10, 12); // Posicionar la fecha en la esquina superior izquierda
                $pdf->Cell(0, 10, utf8_decode('Fecha: ' . $fecha), 0, 1, 'L');

                // Título del reporte
                $pdf->SetFont('Arial', 'B', 11);
                $pdf->Cell(0, 40, utf8_decode('Reporte de Abonos y Préstamos de: ' . $nombre . ' ' . $ap . ' ' . $am), 0, 1, 'C');

                // Centrar la tabla
                $pdf->SetLeftMargin(10); // Ajustar el margen izquierdo para centrar la tabla

                // Establecer la fuente y el tamaño del encabezado de la tabla
                $pdf->SetFont('Arial', 'B', 10);
                // Imprimir los encabezados de la tabla
                $pdf->Cell(40, 10, 'ID Abono', 1, 0, 'C');
                $pdf->Cell(40, 10, 'Abono', 1, 0, 'C');
                $pdf->Cell(60, 10, 'Fecha Abono', 1, 1, 'C');

                // Establecer la fuente y el tamaño del contenido de la tabla
                $pdf->SetFont('Arial', '', 10);
                // Imprimir los datos de la tabla
                while ($row = $consulta->fetch_assoc()) {
                    $pdf->Cell(40, 10, $row["idAbono"], 1, 0, 'L');
                    $pdf->Cell(40, 10, $row["Abono"], 1, 0, 'L');
                    $pdf->Cell(60, 10, $row["fecha"], 1, 1, 'C');
                }

                // Salto de línea después de la tabla
                $pdf->Ln(10);

                // Limpiar el buffer de salida y no enviar su contenido al navegador
                ob_end_clean();

                // Mostrar el PDF
                $pdf->Output();

            } else {
                echo "<script>alert('No se encontraron registros para este cliente.');</script>";
            }
        } else {
            $vista="Vistas/Admin/frmReportesAbono.php"; 
            include_once("Vistas/frmAdmin.php");
        }
    }
}
?>