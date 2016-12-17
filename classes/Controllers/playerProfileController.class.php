<?php


class playerProfileController extends Controller
{

	public function get()
	{
		$player = new playerModel($_REQUEST["player"]);
		$this->html = $player->getHTML();
	}
}
