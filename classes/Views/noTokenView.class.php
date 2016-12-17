<?php

  class noTokenView extends View {

    public function getHTML() {
      //create the Sign Up view
      $this->html .= "<div class='panel-default'>
                        <h3>You are missing out on amazing stuff!</h3>
                        <h4>
                          Please <a href='index.php?controller=signupController'>Sign up</a> to get in on the action</br>
                          or <a href='index.php?controller=loginController'>Log in</a> for a new token.</h4>
                        <h4>Thanks!</h4>
                        <img src='https://s-media-cache-ak0.pinimg.com/236x/5f/47/79/5f47791ffef43ca6c6515e4a9f43f13d.jpg' class='img-rounded' width='300px' height='400px'>
                      </div>";
                              
      return $this->html;
    }

  }


