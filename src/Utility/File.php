<?php

namespace MarkusGehrig\PirCamera\Utility;

use Symfony\Component\Filesystem\Filesystem;
use Symfony\Component\Filesystem\Exception\IOExceptionInterface;

use Symfony\Component\Finder\Finder;

public class File {
	
	public __construct() {

	}

	public getFileList($folder) {
		// Instance Finder Object every time when FileList is called. 
		$finder = new Finder();
		$files = $finder->files()->in($folder);

		return $files;
	}

	public deleteFile($path) {
		$filesystem = new Filesystem();
		$filesystem->remove($path);
	}
}
