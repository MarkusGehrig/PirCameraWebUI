<?php

namespace MarkusGehrig\PirCamera\Templating;

use Symfony\Component\Templating\PhpEngine;
use Symfony\Component\Templating\TemplateNameParser;
use Symfony\Component\Templating\Loader\FilesystemLoader;


// Main Templating Implementatiom
class View {
	
	private $templateUri = "";
	private $data = null;	

	public function __construct() {

	}

	public function setTemplate($Uri) {
		$this->templateUri = $Uri;
		return $this;
	}

	public function getTemplate() {
		return $this->templateUri;
	}

	public function setData($data) {
		$this->data = $data;
		return $this;
	}

	public function getData($data) {
		return $this->data;
	}	

	public function show() {
		/*
		if ($this->templateUri == "") {
			return false;
		}
		 */
		
		$loader = new FilesystemLoader(__DIR__ . "/../../template/%name%");

		$templating = new PhpEngine(new TemplateNameParser(), $loader);

		echo $templating->render($this->getTemplate(), $this->getData());
		
		print_r($this->data);
	}
}
