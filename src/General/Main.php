<?php

namespace MarkusGehrig\PirCamera\General;

use MarkusGehrig\PirCamera\Templating\View;
use MarkusGehrig\PirCamera\Controller\DashboardController;

class Main {	

	public function __construct() {

		$this->view();

		return $this;
	}

	public function dispatcher() {
		
	}

	public function view() {

		$dashboardController = new DashboardController();

		$dashboardController->setUp(__DIR__."/../../picture")->show();
	}

	private function changeView(){
		
	}

} 
