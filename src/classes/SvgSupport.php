<?php
namespace JuztStack\JuztOrbit;

class SvgSupport
{
    public function __construct()
    {

        add_filter('wp_check_filetype_and_ext', array($this, 'allowSVG'), 10, 4);
        add_filter('upload_mimes', array($this, 'mymeTypes'));

        add_action('admin_head', array($this, 'fixSVG'));
    }

    public function allowSVG($data, $file, $filename, $mimes)
    {
        global $wp_version;
        if ($wp_version !== '4.7.1') {
            return $data;
        }

        $filetype = wp_check_filetype($filename, $mimes);

        return [
            'ext' => $filetype['ext'],
            'type' => $filetype['type'],
            'proper_filename' => $data['proper_filename'],
        ];

    }

    public function mymeTypes($mimes)
    {
        $mimes['svg'] = 'image/svg+xml';
        return $mimes;
    }

    public function fixSVG()
    {
        echo '<style type="text/css">
            .attachment-266x266, .thumbnail img {
                 width: 100% !important;
                 height: auto !important;
            }
            </style>';
    }

}
