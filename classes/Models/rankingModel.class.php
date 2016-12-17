<?php

require_once __DIR__ . '/../../vendor/autoload.php';

class rankingModel
{

	private $pos="";
	private $week="";

	public function __construct($pos, $week)
	{
    $this->pos = $pos;
    $this->week = $week;
	}

	public function getRanks()
	{
    if( isset($this->pos) && isset($this->week) ) {
		  $ch = curl_init();
		  $url = "http://www.fantasyfootballnerd.com/service/weekly-rankings/json/jtpvyv9gg4as/". $this->pos . "/" . $this->week . "/";
		  curl_setopt($ch, CURLOPT_URL, $url);
		  curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		  $output = curl_exec($ch);
      curl_close();
      $out = json_decode($output, true);
    
      $this->html .= '<div class="panel panel-default">
                        <div class="panel-heading">Weekly Ranking | ' . $this->pos . '</div>
                        <table class="table table-striped">
                          <tr>
                            <th>Rank</th>
                            <th>Name</th>
                            <th>Team</th>
                            <th>Points</th>
                          </tr>';
      $count = 1;
      foreach($out["Rankings"] as $element) {
        $this->html .= '<tr>
                          <td>' . $count . '</td>
                          <td>' . $element["name"] . '</td>
                          <td>' . $element["team"] . '</td>
                          <td>' . $element["standard"] . '</td>
                        </tr>';
        $count++;
      }

      $this->html .= '</table></div>';

      return $this->html;
    }
    else {
		  $ch = curl_init();
		  $url = "http://www.fantasyfootballnerd.com/service/weekly-rankings/json/jtpvyv9gg4as/QB/2/";
		  curl_setopt($ch, CURLOPT_URL, $url);
		  curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		  $output = curl_exec($ch);
      curl_close();
      $out = json_decode($output, true);

      $this->html .= '<div class="panel panel-default">
                        <div class="panel-heading">Weekly Ranking | QB</div>
                        <table class="table table-striped">
                          <tr>
                            <th>Rank</th>
                            <th>Name</th>
                            <th>Team</th>
                            <th>Points</th>
                          </tr>';
      $count = 1;
      foreach($out["Rankings"] as $element) {
        $this->html .= '<tr>
                          <td>' . $count . '</td>
                          <td>' . $element["name"] . '</td>
                          <td>' . $element["team"] . '</td>
                          <td>' . $element["standard"] . '</td>
                        </tr>';
        $count++;
      }

      $this->html .= '</table></div>';

      return $this->html;
    }

  }
}
