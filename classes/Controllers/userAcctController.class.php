<?php
  
  class userAcctController extends Controller {

    public function get() {
      $view = new userAcctView;
      $this->html = $view->getHTML();
    }

    public function post() {
      //handle editing of account

    }

    public function put() {

    }

    public function delete() {

    }

  }

