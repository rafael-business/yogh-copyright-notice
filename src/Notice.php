<?php

namespace Yogh\Copyright;

class Notice {
   private $notice;
   
   public function __construct() {
      $this->notice  = "This content is created by: ";
      $this->notice .= get_bloginfo('name') . " (";
      $this->notice .= get_bloginfo('url') . ")";
   }

   public function display_copyright_notice ( $content ) {
      if ( !is_singular('post') ) {
         return $content;
      }
      
      $notice_html  = "<p>";
      $notice_html .= "<strong>";
      $notice_html .= $this->notice;
      $notice_html .= "</strong>";
      $notice_html .= "</p>";
  
      return $content . $notice_html;
   }
}
