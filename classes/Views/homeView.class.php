<?php

class homeView extends View {

  public function getHTML() {
	//create the view
    $this->html .= '<h2 class="text-center">The #1 Site for Finding NFL Criminals !</h2> 
                    <div id="myCarousel" class="carousel slide" data-ride="carousel"
                     style="max-width: 1100px; margin: 0 auto;">
										<!-- Indicators -->
											<ol class="carousel-indicators">
												<li data-target="#myCarousel" data-slide-to="0" class="active"></li>
												<li data-target="#myCarousel" data-slide-to="1"></li>
												<li data-target="#myCarousel" data-slide-to="2"></li>
											</ol>
							      <div class="carousel-inner" role="listbox">
							        <div class="item active">
                        <img class="img-responsive center-block first-slide" src="/../../img/c1.gif" alt="First slide"
                         style="height: 450px;">
                      </div>					
												
											<div class="item">					
                        <img class="img-responsive center-block second-slide" src="/../../img/c2.jpg" alt="Second slide">												 
                      </div>
											<div class="item">
                        <img class="img-responsive center-block third-slide" src="/../../img/c3.jpg" alt="Third slide"
                         style="height: 450px;">
                      </div>                                                                                                                                                                                                                                                                                                                                                                                                  
                    </div>
                                                                                                                                                                                                                                                                                                                                                                                                                                
                  <a class="left carousel-control ccl" href="#myCarousel" role="button" data-slide="prev">                                                                                                                                                                                                                                                                                                                                                                                                                      
                    <span style="margin-top: 100px;"><i class="fa fa-4x fa-hand-o-left" aria-hidden="true"></i></span>                                                                                                                                                                                                                                                                                                                                                                                                                            
                    <span class="sr-only">Previous</span>
                  </a>
                  <a class="right carousel-control ccr" href="#myCarousel" role="button" data-slide="next">
                    <i class="fa fa-4x fa-hand-o-right" aria-hidden="true"></i>
                    <span class="sr-only">Next</span>
                  </a>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                      
                </div>
                <!-- /.carousel -->';

                $this->html .= "<div class='container' style='clear:both; margin-top:30px;'>
                                  <div class='row'>
                                    <div class='col-sm-6 col-md-4'>
                                    <div class='thumbnail'>
                                      <img src='http://jocktalkla.com/wp-content/uploads/2014/09/NFL-Meme.jpg' alt='arrest picture' style='height:300px;'>
                                      <div class='caption'>
                                        <h3> Arrests Dashboard </h3>
                                        <p> Laugh at the stupidity of NFL players here.</p>
                                      </div>
                                    </div>
                                    </div>
                                    <div class='col-sm-6 col-md-4'>
                                    <div class='thumbnail'>
                                      <img src='http://www.gannett-cdn.com/-mm-/156bb441e3f10c1dd098d7367505844135fe2c73/c=0-0-3088-2322&r=x404&c=534x401/local/-/media/2016/01/27/DetroitFreePress/DetroitFreePress/635894976697472847-AP-Redskins-Falcons-Football.jpg' style='height:300px;' alt='player list picture'>
                                      <div class='caption'>
                                        <h3> NFL Players </h3>
                                        <p> Browse our list of players. </p>
                                      </div>
                                    </div>
                                    </div>       
                                    <div class='col-sm-6 col-md-4'>
                                    <div class='thumbnail'>
                                      <img src='https://captaincomeback.files.wordpress.com/2013/06/downgoesrex.jpg' style='height:300px;' alt='start / sit picture'>
                                      <div class='caption'>
                                        <h3> Start/Sit tool </h3>
                                        <p> Find out who to start or sit. </p>
                                      </div>
                                    </div>
                                    </div>
                                  </div>
                                </div>";

                return $this->html;
  
  }
}


