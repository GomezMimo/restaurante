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
        $html .= "\n   <meta charset=\"UTF-8\">";
        $html .= "\n   <title>" . $this->getTitlePage() . "</title>";
        $html .= $this->getStyles();
        $html .= "\n  </head>";
        $html .= "\n  <body>\n";
        return $html;
    }
	
	function getMenu($userName, $currentPage) {
        $links =[
            "tickets" => array(
                    "url" => "tickets.php",
                    "isActive" => ($currentPage == "tickets"),
                    "name" => "Tickets" 
                ),
            "restaurant" => array(
                    "url" => "restaurants.php",
                    "isActive" => ($currentPage == "restaurants"),
                    "name" => "Restaurants" 
                )
        ];

		$html = '
    <nav class="navbar navbar-fixed-top navbar-dark bg-inverse">
        <!-- Brand -->
        <a class="navbar-brand" href="/restaurante"><i class="fa fa-cutlery" aria-hidden="true"></i>
 Restaurant App</a>
        <!-- Links -->
        <ul class="nav navbar-nav pull-xs-right">
            <li class="nav-item">
                <a class="nav-link"><span><i class="fa fa-user-o" aria-hidden="true"></i>
</span> ' . $userName . '</a>
            </li>
        ';


        foreach($links as $link){
            $activeStyle = $link["isActive"] ? "active" : "";

            $html .= '<li class="nav-item">
                <a class="nav-link ' . $activeStyle . '" href="' . $link["url"] . '">' . $link["name"] .'</a>
            </li>';
        }
            
        $html .= '
                <li class="nav-item">
                    <a class="nav-link" href="signout.php">Sign Out</a>
                </li>
            </ul>
        </nav>';

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