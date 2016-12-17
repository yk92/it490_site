<?php

require_once __DIR__ .  '/../../vendor/autoload.php';

class rankingView extends View {

	public function getHTML() {

    $this->html .= '<div style="margin-top: 30px;">
                    <h2 class="pull-left"><i class="fa fa-lg fa-free-code-camp"></i>&nbsp&nbspNFL Weekly Rankings | <i>Top 15 Players</i></h2>
                      <div class="pull-right" style="margin-right: 40px; margin-top: 20px;"> 
                            <form class="form-inline" action="index.php?controller=rankingController" method="post">
                              <div class="form-group">
                                <label for="Position" class="control-label">Position:</label>
                                <select class="form-control" id="Position" name="position">
                                  <option>QB</option>
                                  <option>RB</option>
                                  <option>WR</option>
                                  <option>TE</option>
                                  <option>K</option>
                                  <option>DEF</option>
                                </select>
                              </div>
                              <div class="form-group">
                                <label for="Week" class="control-label">Week:</label>
                                <select class="form-control" id="Week" name="week">
                                  <option>1</option>
                                  <option>2</option>
                                  <option>3</option>
                                  <option>4</option>
                                  <option>5</option>
                                  <option>6</option>
                                  <option>7</option>
                                  <option>8</option>
                                  <option>9</option>
                                  <option>10</option>
                                  <option>11</option>
                                  <option>12</option>
                                  <option>13</option>
                                  <option>14</option>
                                  <option>15</option>
                                  <option>16</option>
                                  <option>17</option>
                                </select>
                              </div>
                              <div class="form-group">
                                <button type="submit" class="btn btn-primary">Get Ranking</button>
                              </div>      
                            </form>
                          </div>
                        </div>
                          <div class="clearfix">
                          </div>';
    //Need to do an API call to nerd API for rankings and display default rankings, then when options are 
    //selected and submit is hit, show new rankings.
    //Need to differentiate between default and after options selected
    
    return $this->html;
	}
}
