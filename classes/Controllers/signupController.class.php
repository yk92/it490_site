<?php
  
  class signupController extends Controller {

    public function get() {
      $view = new signupView;
      $this->html = $view->getHTML();
    }

    public function post() {

      require __DIR__ . '/../../config.php';

      $acct = array();
      $acct['user'] = $_POST['user'];
      $acct['email'] = $_POST['email'];
      $acct['pw'] = $_POST['pw'];
      $acct['firstName'] = $_POST['firstName'];
      $acct['lastName'] = $_POST['lastName'];
      $acct['signup'] = $this->DateStamp();

      $client = new Thumper\RpcClient( $registry->getConnection() );
      $client->initClient();
      $client->addRequest( serialize($acct), 'signup', 'signup');
      $replies = $client->getReplies();

      $data = unserialize( $replies['signup'] );
      
      $producer = new Thumper\Producer($registry->getConnection());
      $producer->setExchangeOptions( array( 'name'=>'logs-exchange', 'type'=>'topic' ) );
      
      //if account signup was successful -> alert user and redirect
      if ( $data['success'] == "Yes" ) {
        //send message to info log that account was successfully created
        $logMsg = $this->DateStamp() . ": New account successfully created for User: " . $_POST['user'] . " and token: " . $data['token'] . " assigned.";
        $producer->publish($logMsg, 'app.info');

        //store the new user's credentials in session
        session_start();
        $_SESSION['user'] = $data['user'];
        $_SESSION['token'] = $data['token'];

        //let user know about successful account creation, then redirect
        echo "<script>
                window.setTimeout(function() {
                  window.location = 'index.php?controller=signedInController';
                  }, 5000);
              </script>
              <div class='panel-default'>
                <h3>Congratulations! Your account is set up.</h3>
                <p>You can now enjoy the awesome power of NFL Arrests lol...</br>
                   Destroy your friends, stomp your neighbors, steal money from</br>
                   old people, and take candy from babies. You are a boss!
                </p>
                <p><span><i class='fa fa-pulse fa-spinner fa-cog'></i></span>Redirecting in 5 seconds...</p>
              </div>";
      }
      else {
        //send error message to error log about account creation failure
        $logMsg = $this->DateStamp() . ": [ERROR] - Account creation failed!\nAttempted account creation for User: " . $_POST['user'];
        $producer->publish($logMsg, 'app.error');

        //let user know about creation failure, then redirect back to sign up
        echo "<div class='page-header'>
                <h3>Error in creating account! | <small>Please try again</small></h3>
                <h5><span><i class='fa fa-pulse fa-spinner fa-cog'></i></span>Redirecting in 5 seconds...</h5>
              </div>
              <script>
                window.setTimeout(function() {
                  window.location = 'index.php?controller=signupController';
                }, 5000);
              </script>";
      }
    }

    public function put() {

    }

    public function delete() {

    }

  }

