<?php
  
  class homepageController extends Controller {

    public function get() {
      
      $v = new homeView;
      $this->html = $v->getHTML();  
    }

    public function post() {

    }

    public function put() {

    }

    public function delete() {

    }

  }

