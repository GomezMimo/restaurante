<?php


Class Template {
	
	//Page Template attributes
    private $title;
    private $scripts;
    private $styles;
    private $baseProject = "http://localhost/Restaurant";

    function getHead(){
    	$this->addDefaultStyles();
        $html =  "<!DOCTYPE html>";
        $html .= "\n<html lang=\"es\">";
        $html .= "\n  <head>";
        $html .= "\n   <title>" . $this->getTitlePage() . "</title>";
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
        $this->styles .= "\n   <link rel=\"StyleSheet\" href=\".$style\">";
    }

    function getStyles(){
        return $this->styles;
    }

    function addDefaultStyles(){
    	$this->addStyle('/styles/vendor/bootstrap.min.css');
    	$this->addStyle('/styles/vendor/bootstrap.min.css.map');
    	$this->addStyle('/styles/vendor/font-awesome.min.css');
        $this->addStyle('/styles/main.css');
    }

    function addScript($script){
        $this->scripts .= "\n   <script src=\".$script\"></script>";
    }

    function getScripts(){
        return $this->scripts;
    }

    function addDefaultScripts(){
    	$this->addScript('/scripts/vendor/jquery-3.1.1.min.js');
    	$this->addScript('/scripts/vendor/tether.min.js');
    	$this->addScript('/scripts/vendor/bootstrap.min.js');
        $this->addScript('/scripts/main.js');
    }

}

?>