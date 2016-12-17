<?php
  
  class editAccountController extends Controller {

    public function get() {
      $view = new editAccountView;
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

