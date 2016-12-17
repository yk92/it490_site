<?php

  class arrestOptionsView extends View {

    public function getHTML() {
      //create the draftOptions view

      $this->html = "<div class='draftContainer'>
                      <div id='left'><h2>Left</h2></div>
                     <div id='center'><h2>Center</h2></div>
                     <div id='right'><h2>Right</h2></div>
                    </div>";

      return $this->html;
    }

  }


