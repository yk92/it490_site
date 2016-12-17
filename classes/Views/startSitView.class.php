<?php

require_once __DIR__ . '/../../vendor/autoload.php';

  class startSitView extends View 
	{

    public function getHTML() 
		{
      //create the Start/Sit view

      $this->html .= "<div class='page-header' style='margin-top: 60px;'>
                        <h2 class='text-left'>&nbsp<span><i class='fa fa-lg fa-bed'></i></span>&nbspStart/Sit Tool</h2>
                      </div>

											<form class='form-inline' method='post' action='index.php?controller=startSitController'>
												<div class='form-group'>
													<div class='col-sm-12 input-group'>
														<span class='input-group-addon><i class='fa fa-search'></i></span>
														<input type='text' class='form-control' id='player1' name='player1' placeholder='Search by player name'>
													</div>
												</div>
												<div class='form-group'>
													<div class='col-sm-12 input-group'>
														<span class='input-group-addon><i class='fa fa-search'></i></span>
														<input type='text' class='form-control' id='player2' name='player2' placeholder='Search by player name'>
													</div>
												</div>
												<div class='form-group'>
													<div class='col-sm-4'>
														<button type='submit' class='btn btn-success'>Search</button>
													</div>
												</div>
											</form>
                      ";        
      return $this->html;
    }

  }


