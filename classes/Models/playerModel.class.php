<?php

require_once __DIR__ . '/../../vendor/autoload.php';

class playerModel
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

		$ch = curl_init();
		    $url = "http://www.nflarrest.com/api/v1/player/arrests/" . $this->name;
		    curl_setopt($ch, CURLOPT_URL, $url);
		    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		    $output = curl_exec($ch);
		    curl_close();

	    $arrest_data = json_decode($output, true);


	      $ch = curl_init();
	      $url = "https://api.newsriver.io/v2/search?query=text%3A". $array[0]['FirstName']. '%20' . $array[0]['LastName']. '&limit=5';                 
	      curl_setopt($ch, CURLOPT_URL, $url);                                                    
	      curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);                                            
	      curl_setopt($ch, CURLOPT_HTTPHEADER, array( 'Authorization: sBBqsGXiYgF0Db5OV5tAw_vgAEVEGVbvC62kfcJrKfGPPdViWsKnXl-knmPH43ZM' ) );
	      $output = curl_exec($ch);          

		$news_array = json_decode($output, true);

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
    if ($arrest_data === NULL) 
      $this->html .= '<div class="panel-default" style="margin-top: 40px; width: 1150px;">
                        <h3>This player has never been arrested! Amazing...</h3>
                      </div>';
    else {
      $this->html .= '<div class="panel-default" style="margin-top: 40px; width: 1150px;">
                        <div class="panel-header">
                          <h3 style="margin-left: 10px;">Arrest Information</h3>
                        </div>
                        <ul class="list-group">';
      foreach($arrest_data as $record) {
        $this->html .= '<li class="list-group-item">
                          <h4><span><i class="fa fa-thumbs-down"></i></span><i class="text-danger">&nbspOn ' . $record["Date"] . " " . $this->name . ' was arrested for ' . $record["Category"] . '</i></h4>' . 
                          '<strong>Description: </strong>' . $record["Description"] . '</br>' .
                          '<strong>Outcome: </strong>' . $record["Outcome"] .
                       '</li>';
      }

      $this->html .= '</ul></div>';

	if($news_array === NULL)
	$this->html .= '<div class="panel-default" style="margin-top: 40px; width: 1150px;">
			<h3>This player is irrelevant.</h3>
			</div>';
	else{
	$this->html .= '<div class="panel-default" style="margin-top: 40px; width: 1150px;">
			<div class="panel-header">
				<h3 style="margin-left: 10px;">News</h3>
			</div>
			<ul class="list-group">';
			
		foreach($news_array as $article)
			{
				$this->html .= '<li class="list-group-item">
						<h3>'.$article["title"].'</h3>'.
						'<h4>'.'Published on '. $article["publishDate"].'</h4>'.'</br>'.
						'<p style="font-size:16px">'.$article["text"].'</p></li>';
			}
	}

    }

    return $this->html;
  }
}
