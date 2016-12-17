<?php

require_once __DIR__ .  '/../../vendor/autoload.php';

class playerListView extends View
{
	public function getHTML()
	{
		$client = new MongoDB\Client;
		$nfl = $client->nfl;

		$filter = array();
		$options = ['sort' => ['Name' => 1]];

		$collection = $client->nfl->Players;
		$sorted = $collection->find($filter, $options);
	
		$this->html .= '<style type="text/css"> .table-row{cursor:pointer;}</style>';
		$this->html .= '<div class="page-header" style="margin-top: 60px;">
				<h2 class>&nbsp<span><i class="fa fa-lg fa-archive"></i></span>&nbspPlayer List</h2>
				</div>';

		$this->html .= '<br><div class="container">
					<table class="table table-hover table-responsive">
						<thead>
							<tr>
								<th>Name</th>
								<th>Team</th>
								<th>College</th>
								<th>Position</th>
								<th>Fantasy Position</th>
							</tr>
						</thead>
						<tbody>	
				';
	
		foreach ($collection->find($filter, $options) as $document)
		{
		                        $this->html .= '<tr class="table-row" data-href="index.php?controller=playerProfileController&player='.$document["Name"].'"><td>'.
					$document["FirstName"]. ' ' . $document["LastName"].
					'</td><td>'. 
					$document["CurrentTeam"].
					'</td><td>'.
					$document["College"].
					'</td><td>'.
					$document["Position"].
					'</td><td>'.
					$document["FantasyPosition"]. 
					'</td></a></tr>';
		}

		$this->html .= '</tbody></table></div>';
		$this->html .= '<script type="text/javascript">
				$(document).ready(function($){
					$(".table-row").click(function(){
						window.document.location = $(this).data("href");
					});
				});
				</script>';
				

		return $this->html;
	}
}
