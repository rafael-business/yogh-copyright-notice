<?php

namespace Yogh\Copyright;

class Notice {
   private $notice;

   public function init() {
      $this->the_notice();

      // Insert Copyright Notice
      add_filter(
         'the_content',
         [ $this, 'display_copyright_notice' ],
         100
      );
   }

   public function the_notice() {
      $this->notice = sprintf(
         __( 'This content is created by: %s (%s)', 'yogh-copyright-notice' ),
         get_bloginfo( 'name' ),
         get_bloginfo( 'url' )
      );
   }

   public function display_copyright_notice( $content ) {
      if ( ! is_singular( 'post' ) ) {
         return $content;
      }
   
      $notice_html  = '<p>';
      $notice_html .= '<strong>';
      $notice_html .= $this->notice;
      $notice_html .= '</strong>';
      $notice_html .= '</p>';

      return $content . $notice_html;
   }
}
