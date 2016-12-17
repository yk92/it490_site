<?php
  
  class loginController extends Controller {

    public function get() {
      
      $view = new loginView;
      $this->html .= $view->getHTML();  
    }

    public function post() {

      //require the Thumper config file
      require __DIR__ . '/../../config.php';

      //instantiate a new producer for logging system and initialize it to topic exchange
      $producer = new Thumper\Producer($registry->getConnection());
      $producer->setExchangeOptions( array( 'name'=>'logs-exchange', 'type'=>'topic' ) );

      //grab user's credentials from $_POST array (form data)
      $creds = array();
      $creds['user'] = $_POST['user'];
      $creds['pw'] = $_POST['pw'];
      
      //instantiate a Thumper client to pass log in data to verification server
      $client = new Thumper\RpcClient($registry->getConnection());
      $client->initClient();

      //send login request to rabbitmq exchange
      $client->addRequest(serialize($creds), 'doLogin', 'doLogin');
      $replies = $client->getReplies();
      $data = unserialize($replies["doLogin"]);

      //handle response from verification server
      if ( $data["success"] == "Yes" ) {
        //send success message to logging system
        $logMsg = $this->DateStamp() . " : " . $_POST['user'] . " logged in and was given token: " . $data['token'];
        $producer->publish( $logMsg , 'app.info' );

        //store user credential and token in session
        session_start();
        $_SESSION['user'] = $_POST['user'];
        $_SESSION['token'] = $data["token"];

        //redirect to signedInView
        header('Location: index.php?controller=signedInController');
      }
      else {
        //if verification failed send error message to logger
        $logMsg = $this->DateStamp() . " :[ERROR] - " . $_POST['user'] . " tried to log in and failed!";
        $producer->publish( $logMsg , 'app.error' );

        //redirect to sign up page (need to change this maybe to error page or something)
        header('Location: index.php?controller=signupController');
      }
    }

    public function put() {

    }

    public function delete() {

    }

  }

