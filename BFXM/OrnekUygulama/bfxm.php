<?php
	$step = isset($_POST['step']) ? $_POST['step'] : 1;
	$uuid = isset($_POST['uuid']) ? $_POST['uuid'] : false;
	$caller = isset($_POST['caller']) ? $_POST['caller'] : false;
	$callee = isset($_POST['callee']) ? $_POST['callee'] : false;
	$returnvar = isset($_POST['returnvar']) ? $_POST['returnvar'] : false;

	if(!($uuid || $caller || $callee))
	{
		header('Content-Type: application/json');
		echo json_encode(['error'=>'parameters missing']);
		die();
	}
	
	switch ($step) {
		case 1:
			$cevap = [
				"bfml" => ["version" => 1],
				"seq" => [[
					"action" => "play",
					"args" => ["url" => "http://bfxmdemo.bulutfon.com/demosesler/demo-hosgeldiniz.mp3"]
				],
				[
					"action" => "gather",
					"args" => [
				        "min_digits"  => 1,
				        "max_digits"  => 1,
				        "max_attempts"  => 3,
				        "ask"  => "http://bfxmdemo.bulutfon.com/demosesler/numara-tuslayiniz.mp3",
				        "play_on_error"  => "http://bfxmdemo.bulutfon.com/demosesler/hatali-giris.mp3",
				        "variable_name"  => "returnvar",
				]

				]],

			];
			header('Content-Type: application/json');
			echo json_encode($cevap);
			break;
		case 2:
			$cevap = [
				"bfml" => ["version" => 1],
				"seq" => [[
					"action" => "play",
					"args" => ["url" => "http://bfxmdemo.bulutfon.com/demosesler/tesekkurler.mp3"]
				],
				[
					"action" => "hangup"

				]],

			];
			header('Content-Type: application/json');
			echo json_encode($cevap);

			$mesaj = "Son arayan " . $caller . " " . $returnvar . " tuşladı.\n";

			$file = "call_log.txt";
			/**
			 * Write to file
			 */
			$fh = fopen($file, 'w');
			fwrite($fh,$mesaj);
			fclose($fh);

			break;
		default:
			die("Uygulamadan cik");
			break;
	}
