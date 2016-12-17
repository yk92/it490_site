<?php

require_once __DIR__ . '/../../vendor/autoload.php';
  
  class startSitController extends Controller {

    public function get() {
     
      session_start();

      if ($_SESSION['token']) {  
        $view = new startSitView;
        $this->html .= $view->getHTML();
      }

      else {
        $view = new noTokenView;
        $this->html = $view->getHTML();
      }  
    }

    public function post() 
		{

      $view = new startSitView;
      $this->html .= $view->getHTML();  

			$player1 = $_POST['player1'];
			$player2 = $_POST['player2'];
			
			//call mongo
			$client = new MongoDB\Client;
			$nfl = $client->nfl;

			//setup filters for search
			$player1Query = array('Name' => $player1);
			$player2Query = array('Name' => $player2);

			//go to collection of Players and their IDs
			$collection = $client->nfl->playerIDs;

			// search for players we need
			$player1Info = $collection->find($player1Query);
			$player2Info = $collection->find($player2Query);

			$p1array = $player1Info->toArray();
			$p2array = $player2Info->toArray();

			//save the player ID
			$p1id = $p1array[0]["PlayerID"];
			$p2id = $p2array[0]['PlayerID'];

			//API Call to get fantasy score (must use IDs to make API call work)
			$ch = curl_init();
				$url1 = 'https://api.fantasydata.net/v3/nfl/projections/JSON/PlayerGameProjectionStatsByPlayerID/2016REG/15/'. $p1id;
				curl_setopt($ch, CURLOPT_URL, $url1);
				curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
				curl_setopt($ch, CURLOPT_HTTPHEADER, array('Ocp-Apim-Subscription-Key: de372be4105d4def9afc7921aefc6804'));
				$p1stats = curl_exec($ch);
			curl_close();
				
			$ch2 = curl_init();
				$url2 = 'https://api.fantasydata.net/v3/nfl/projections/JSON/PlayerGameProjectionStatsByPlayerID/2016REG/15/'. $p2id;
				curl_setopt($ch2, CURLOPT_URL, $url2);
				curl_setopt($ch2, CURLOPT_RETURNTRANSFER, 1);
				curl_setopt($ch2, CURLOPT_HTTPHEADER, array('Ocp-Apim-Subscription-Key: de372be4105d4def9afc7921aefc6804'));
				$p2stats = curl_exec($ch2);
			curl_close();

			// player statistics decoded to json
			$p1data = json_decode($p1stats, true);
			$p2data = json_decode($p2stats, true);
			$p1score = $p1data['FantasyPointsDraftKings'];
			$p2score = $p2data['FantasyPointsDraftKings'];

			if (intval($p1score) > intval($p2score))
      { 
        $this->html .= "<div>
                          <h2>The Winner is: </h2>
                        </div>";
        $model = new startSitModel($p1data['Name']);
        $this->html .= $model->getHTML();
			}
			else {

        $model = new startSitModel($p2data['Name']);
        $this->html .= $model->getHTML();
			}
    }

    public function put() {

    }

    public function delete() {

    }

  }
