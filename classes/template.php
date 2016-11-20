<?php


Class Template {
	
	//Page Template attributes
    private $title;
    private $scripts;
    private $styles;
    private $vars = array();

	function __set($index, $value)
	{
		$this->vars[$index] = $value;
	}

	function show($name) {
		$path = __SITE_PATH . '/views' . '/' . $name . '.php';

		if (file_exists($path) == false)
		{
			throw new Exception('Template not found in '. $path);
			return false;
		}

		// Load variables
		foreach ($this->vars as $key => $value)
		{
			$$key = $value;
		}

		include ($path);
	}

    function getHead(){
    	$this->addDefaultStyles();
        $html =  "<!DOCTYPE html>";
        $html .= "\n<html lang=\"es\">";
        $html .= "\n  <head>";
        $html .= "\n      <title> " . $this->getTitlePage() . "</title>";
        $html .= $this->getStyles();
        $html .= "\n  </head>";
        $html .= "\n  <body>\n";
        return $html;
    }
	
	function getMenu(){
		$html = "<div>menu</div>";
		return $html; 
	}
	
    function getFooter(){
        $this->addDefaultScripts();
        $html = $this->getScripts();
		$html .="\n</body>\n</html>";
        return $html;
    }

    function getTitlePage(){
        return $this->title;
    }

    function setTitle($title){
        $this->title = $title;
    }
    
    function addStyle($style){
        $this->styles .= "\n   <link rel=\"StyleSheet\" href=\"$style\">";
    }

    function getStyles(){
        return $this->styles;
    }

    function addDefaultStyles(){
    	$this->addStyle('/styles/vendor/bootstrap.min.css');
    	$this->addStyle('/styles/vendor/bootstrap.min.css.map');
    	$this->addStyle('/styles/vendor/font-awesome.min.css');
    }

    function addScript($script){
        $this->scripts .= "\n   <script src=\"$script\"></script>";
    }

    function getScripts(){
        return $this->scripts;
    }

    function addDefaultScripts(){
    	$this->addScript('/scripts/vendor/jquery-3.1.1.min.js');
    	$this->addScript('/scripts/vendor/tether.min.js');
    	$this->addScript('/scripts/vendor/bootstrap.min.js');
    }

}

?>