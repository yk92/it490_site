<?php

  class signedInView extends View {

    public function getHTML() {
      //create the view
      session_start();
      
      $ch = curl_init();
      $url = "https://api.newsriver.io/v2/search?query=text%3ANFL";                           
      curl_setopt($ch, CURLOPT_URL, $url);                                                    
      curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);                                            
      curl_setopt($ch, CURLOPT_HTTPHEADER, array( 'Authorization: sBBqsGXiYgF0Db5OV5tAw_vgAEVEGVbvC62kfcJrKfGPPdViWsKnXl-knmPH43ZM' ) );
      $output = curl_exec($ch);                                                               
                                                                                                      
      $news_array = json_decode($output, true); 

      $this->html = "<div class='page-header clearfix' style='width: 1150px;'>
                       <h3 class='text-left'> Welcome " . $_SESSION['user']  . "</h3>
                       <a href='index.php?controller=userAcctController&user=" . $_SESSION['user'] . "' role='button' class='btn btn-info pull-right'>
                        <span><i class='fa fa-pencil-square-o'></i></span>&nbspEdit Account
                       </a>
                     </div>
                     <div class='panel-default'>
                       <div class='panel-header'>
                         <h3>All of the latest NFL news in one spot</h3>
                       </div>
                       <ul class='list-group' style='width: 1150px;'>";
      //Styling each article goes here
      foreach($news_array as $article) {
        $this->html .= '<li class="list-group-item">
                          <h4>' . $article["title"] . '</h4></br>' .
                          'Published on: ' . $article["publishDate"] . '</br>' .
                          $article["text"] .
                          '</li>';
      }

      //end here

      $this->html .= "</ul>
                     </div>
                     <h4>Below here will be the tools to use</h4>
                     <div class='row'>
                       <div class='col-sm-6 col-md-4'>
                         <div class='thumbnail'>
                           <img src='#' alt='mock draft picture'>
                           <div class='caption'>
                             <h3> Mock Draft tool </h3>
                             <p> Description of mock draft...</p>
                             <p><a href='index.php?controller=draftOptionController' class='btn btn-primary' role='button'>Draft</a></p>
                           </div>
                         </div>
                       </div>
                       
                       <div class='col-sm-6 col-md-4'>
                         <div class='thumbnail'>
                           <img src='#' alt='player list picture'>
                           <div class='caption'>
                             <h3> List of Players </h3>
                             <p> Description of player list...</p>
                             <p><a href='index.php?controller=playerListController' class='btn btn-primary' role='button'>Players</a></p>
                           </div>
                         </div>
                       </div>       
                       <div class='col-sm-6 col-md-4'>
                         <div class='thumbnail'>
                           <img src='#' alt='start / sit picture'>
                           <div class='caption'>
                             <h3> Start/Sit tool </h3>
                             <p> Description of Start / sit tool...</p>
                             <p><a href='index.php?controller=startSitController' class='btn btn-primary' role='button'>Start/Sit</a></p>
                           </div>
                         </div>
                       </div>
                     </div>";
      return $this->html;
    }

  }


