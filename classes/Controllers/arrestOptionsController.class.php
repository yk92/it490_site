<?php
  
  class arrestOptionsController extends Controller {

    public function get() {
      $view = new arrestOptionsView;
      $this->html = $view->getHTML();
    }

    public function post() {

    }

    public function put() {

    }

    public function delete() {

    }

  }

