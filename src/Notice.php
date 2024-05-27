<?php

namespace Yogh\Copyright;

class Notice {
    private $notice;

    /**
     * Initialize the plugin by setting up hooks and filters.
     */
    public function init() {
        $this->the_notice();

        // Insert Copyright Notice
        add_filter(
            'the_content',
            [ $this, 'display_copyright_notice' ],
            100
        );
    }

    /**
     * Generate the notice content.
     */
    public function the_notice() {
        $this->notice = sprintf(
            __( 'This content is created by: %s (%s)', 'yogh-copyright-notice' ),
            get_bloginfo( 'name' ),
            get_bloginfo( 'url' )
        );
    }

    /**
     * Display the notice at the end of the post content.
     *
     * @param string $content The original content.
     * @return string The content with the notice appended.
     */
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
