<?php

  class signupView extends View {

    public function getHTML() {
      //create the Sign Up view
      $this->html .= "<script>
                        function passMatch() {
                          var pass1 = document.getElementById('pw'),
                              pass2 = document.getElementById('confirmPW'),
                              msg = document.getElementById('msg'),
                              good = '#66cc66',
                              bad = '#ff6666';
                          
                          if ( pass1.value == pass2.value ) {
                            pass2.style.backgroundColor = good;
                            msg.style.color = good;
                            msg.innerHTML = 'Passwords Match!'
                            document.getElementById('submit').disabled = false;
                          } else {
                              pass2.style.backgroundColor = bad;
                              msg.style.color = bad;
                              msg.innerHTML = 'Passwords don\'t match!';
                              document.getElementById('submit').disabled = true;
                            }
                        }
                      </script>
                      <div class='page-header' style='margin-top: 60px;'>
                        <h2 class>&nbsp<span><i class='fa fa-lg fa-archive'></i></span>&nbspPlease create an account</h2>
                      </div>
                      <form class='form-horizontal' method='post' action='index.php?controller=signupController'>
                        <div class='form-group'>
                          <label for='username' class='col-sm-2 control-label'>Username </label>
                          <div class='col-sm-4'>
                            <input type='text' class='form-control' id='user' name='user' placeholder='Enter your username'>
                          </div>
                        </div>
                        <div class='form-group'>
                          <label for='email' class='col-sm-2 control-label'>Email </label>
                          <div class='col-sm-4'>
                            <input type='email' class='form-control' id='email' name='email' placeholder='Enter your email'>
                          </div>
                        </div>
                        <div class='form-group'>
                          <label for='password' class='col-sm-2 control-label'>Password </label>
                          <div class='col-sm-4'>
                            <input type='password' class='form-control' id='pw' name='pw' placeholder='Enter password'>
                          </div>
                        </div>
                        <div class='form-group'>
                          <label for='confirmPW' class='col-sm-2 control-label'>Confirm Password </label>
                          <div class='col-sm-4'>
                            <input type='password' class='form-control' id='confirmPW' name='confirmPW' onkeyup='passMatch();' placeholder='Confirm your password'>
                            <span id='msg'></span>
                          </div>
                        </div>
                        <div class='form-group'>
                          <label for ='firstName' class='col-sm-2 control-label'>First name </label>
                          <div class='col-sm-4'>
                            <input type='text' class='form-control' id='firstName' name='firstName' placeholder'First name'>
                          </div>
                        </div>
                        <div class='form-group'>
                          <label for ='lastName' class='col-sm-2 control-label'>Last name </label>
                          <div class='col-sm-4'>
                            <input type='text' class='form-control' id='lastName' name='lastName' placeholder'Last name'>
                          </div>
                        </div>
                        <div class='form-group'>
                          <div class='col-sm-offset-2 col-sm-4'>
                            <button type='submit' id='submit' class='btn btn-success' disabled='true'>Sign up</button>
                          </div>
                        </div>
                      </form>";
                              
      return $this->html;
    }

  }


