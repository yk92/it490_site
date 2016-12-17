<?php

class playerListController extends Controller
{
	public function get()
  {	
    session_start();
    
    if ($_SESSION['token']) {
		  $view = new playerListView;
      $this->html .= $view->getHTML();
    }

    else { 
      $view = new noTokenView;
      $this->html .= $view->getHTML();  
    }
	}

}
