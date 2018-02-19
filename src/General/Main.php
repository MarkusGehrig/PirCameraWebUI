<?php

namespace MarkusGehrig\PirCamera\General;

use MarkusGehrig\PirCamera\Templating\View;
use MarkusGehrig\PirCamera\Controller\DashboardController;

class Main {	

	public function __construct() {
		echo("Main Class");

		$this->view();

		return $this;
	}

	public function dispatcher() {
		
	}

	public function view() {

		echo("Main::View");

		$dashboardController = new DashboardController();

		$dashboardController->setUp(__DIR__."/../../picture")->show();
	}

	private function changeView(){
		
	}

} 
