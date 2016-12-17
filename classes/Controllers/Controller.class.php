<?php
  
  abstract class controller {

    protected $html;

    public function get() {

    }

    public function post() {

    }

    public function put() {

    }

    public function delete() {

    }

    public function getHTML() {
      return $this->html;
    }
    /**
     * @param $strDateTime default to null or passed the current date
     * @param $strTimeZone defaults to America/New_York timezone
     */

    public function DateStamp($strDateTime = null, $strTimeZone = "America/New_York") {
      $objTimeZone = new DateTimeZone($strTimeZone);

      $objDateTime = new DateTime();
      $objDateTime->setTimeZone($objTimeZone);

      if (!empty($strDateTime)) {
        $fltUnixTime = (is_string($strDateTime)) ? strtotime($strDateTime) : $strDateTime;

        if (method_exists($objDateTime, "setTimestamp")) {
          $objDateTime->setTimestamp($fltUnixTime);
        } else {
          $arrDate = getdate($fltUnixTime);
          $objDateTime->setDate($arrDate['year'], $arrDate['mon'], $arrDate['mday']);
          $objDateTime->setTime($arrDate['hours'], $arrDate['minutes'], $arrDate['seconds']);
        }
      }
      return $objDateTime->format("Y-m-d H:i:s");
    }

  }

