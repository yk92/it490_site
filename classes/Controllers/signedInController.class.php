<?php
  
  class signedInController extends Controller {

    public function get() {
      $view = new signedInView;
      $this->html = $view->getHTML();
    }

    public function post() {

    }

    public function put() {

    }

    public function delete() {

    }

  }

