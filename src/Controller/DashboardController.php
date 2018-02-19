<?php

namespace MarkusGehrig\PirCamera\Controller;

use MarkusGehrig\PirCamera\Utility\File;
use MarkusGehrig\PirCamera\Templating\View;

class DashboardController extends View {
	
	private $files;

	public function __construct() {
		echo("DashboardController");
	}

	public function getFiles() {
		return $this->files;
	}

	public function setUp($folder) {
		echo("setUp");

		$file = new File();
		$this->files = $file->getFileList($folder);	

		$html = '<div class="pictures">';

		foreach ($this->files as $file) {
			$uri = "picture/" . $file->getRelativePathname();
			
			$html .= '<div class="picture"><img src="'. $uri .'"/></div>';
			
		}

		$html .= '</div>';

		$this->setTemplate("Dashboard.php");
		$this->setData(array("html" => $html));
		
		return $this;
	}

}
