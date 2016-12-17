<?php

require_once __DIR__ . '/../../vendor/autoload.php';

class startSitModel
{

	private $name="";
	private $html="";

	public function __construct($playerName)
	{
		$this->name = $playerName;
	}

	public function getHTML()
	{
		// Mongo goes here
		$client = new MongoDB\Client;
		$nfl = $client->nfl;

		$collection = $client->nfl->Players;

		$documents = $collection->find( [ 'Name' =>  $this->name  ]);
		$array = $documents->toArray();
	    
		$result_count = count($array);


		if ($result_count == 1)
		{
			// build player profile
			$this->html .= '<div class="panel panel-default" style="margin-top: 60px; background-color: #E0E0E0; width: 1150px;">
					              <div class="row">
						              <div class="col-sm-2">
							              <div class="main-content">
								              <img src=' . "\"" . $array[0]["PhotoUrl"] . "\"" . ' width="150px" height="175px" style="margin-bottom: 10px; margin-left: 10px;"/>
							              </div>
						              </div>
						              <div class="col-sm-10">
							              <h3><strong>'.$array[0]['Name'].'</strong></h3>
							                <div class="row">
								                <div class="col-sm-12">'.
									                '<p><i><strong>Age:</strong></i> '. $array[0]['Age'].'<br>'.
									                   '<i><strong>Birthdate: </strong></i> '. $array[0]['BirthDateString'].'<br>'.
									                   '<i><strong>Position: </strong></i>  '. $array[0]['Position'].'<br>'.
									                   '<i><strong>Team: </strong></i>' . $array[0]['CurrentTeam'].'<br>'.
									                   '<i><strong>College: </strong></i>'. $array[0]['College'].'<br>'.
									                   '<i><strong>Experience: </strong></i>' .$array[0]['Experience'].' years <br>
                                   							</p>
								                 </div>	
							                </div>
						               </div>
					              </div>';
    

    		}

    return $this->html;
  }
}
