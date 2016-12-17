<?php

  class userAcctView extends View {

    public function getHTML() {
      //create the userAcct view
      require __DIR__ . "/../../config.php";
      $acct = array();
      $acct['user'] = $_REQUEST['user'];

      $client = new Thumper\RpcClient( $registry->getConnection() );
      $client->initClient();
      $client->addRequest( serialize($acct), 'userInfo', 'userInfo');
      $replies = $client->getReplies();

      $data = unserialize( $replies['userInfo'] );

      $this->html = "<div class='panel-default' style:'width: 1150px;'>
                       <div class='panel-header'>
                         <h3>" . $_REQUEST['user'] . "'s profile</h3>
                       </div>
                       <p>
                         Name: " . $data[0]['Firstname'] . " " . $data[0]['Lastname'] . "</br>" .
                         "Email: " . $data[0]['Email'] . "</br>" .
                         "Joined On: " . $data[0]['Signup'] . "</br>" .
                         "<button type='submit' class='btn btn-danger'>Change PW</button></p></div>

                     <div class='panel-default'>
                       <h3>Remaining User profile still under construction</h3>
                     </div>";

      return $this->html;
    }

  }


