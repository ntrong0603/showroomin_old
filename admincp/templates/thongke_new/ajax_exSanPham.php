<?php session_start();
		include_once "../../PHPExcel/PHPExcel.php";
		$thongke_excel=$_SESSION['excel'];
		// Bước 3: Khởi tạo đối tượng mới và xử lý
		$objPHPExcel = new PHPExcel();
		 
		// Bước 4: Chọn sheet - sheet bắt đầu từ 0
		$objPHPExcel->setActiveSheetIndex(0);
		 
		// Bước 5: Tạo tiêu đề cho sheet hiện tại
		$objPHPExcel->getActiveSheet()->setTitle('Thong Ke San Pham');
		// Bước 6: Tạo tiêu đề cho từng cell excel, 
		// Các cell của từng row bắt đầu từ A1 B1 C1 ...
		$objPHPExcel->getActiveSheet()->setCellValue('A1', 'STT');
		$objPHPExcel->getActiveSheet()->setCellValue('B1', 'Tên');
		$objPHPExcel->getActiveSheet()->setCellValue('C1', 'Lượt xem');
		$objPHPExcel->getActiveSheet()->setCellValue('D1', 'Lượt mua');
		$objPHPExcel->getActiveSheet()->setCellValue('E1', 'Tên nhà sản xuất');
		// Bước 7: Lặp data và gán vào file
		// Vì row đầu tiên là tiêu đề rồi nên những row tiếp theo bắt đầu từ 2
		$rowNumber = 2;
		foreach ($thongke_excel as $index => $item) 
		{
			// A1, A2, A3, ...
			$objPHPExcel->getActiveSheet()->setCellValue('A' . $rowNumber, $item['stt']);
			 
			// B1, B2, B3, ...
			$objPHPExcel->getActiveSheet()->setCellValue('B' . $rowNumber, $item['ten']);
		 
			// C1, C2, C3, ...
			$objPHPExcel->getActiveSheet()->setCellValue('C' . $rowNumber, $item['luotxem']);
			$objPHPExcel->getActiveSheet()->setCellValue('D' . $rowNumber, $item['luotmua']);
			$objPHPExcel->getActiveSheet()->setCellValue('E' . $rowNumber, $item['tennhasx']);

			// Tăng row lên để khỏi bị lưu đè
			$rowNumber++;
		}

		// Bước 8: Khởi tạo đối tượng Writer
		$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
		ob_end_clean();
		// Bước 9: Trả file về cho client download
		// Redirect output to a client’s web browser (Excel5)
		header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
		header('Content-Disposition: attachment;filename="thongke.xlsx"');
		header('Cache-Control: max-age=0');
		
		if(isset($objWriter)){
			$objWriter->save('php://output');
		}
?>
