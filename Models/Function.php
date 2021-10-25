<?php
    /**
    * debug
    **/
    function _debug($data) {

        echo '<pre style="background: #000; color: #fff; width: 100%; overflow: auto">';
        echo '<div>Your IP: ' . $_SERVER['REMOTE_ADDR'] . '</div>';

        $debug_backtrace = debug_backtrace();
        $debug = array_shift($debug_backtrace);

        echo '<div>File: ' . $debug['file'] . '</div>';
        echo '<div>Line: ' . $debug['line'] . '</div>';

        if(is_array($data) || is_object($data)) {
            print_r($data);
        }
        else {
            var_dump($data);
        }
        echo '</pre>';
    }

    /**
     * get input
     */
    
    function  getInput($string)
    {
        return isset($_GET[$string]) ? $_GET[$string] : '';
    }

    /**
     * post Input
     */
    
    function  postInput($string)
    {
        return isset($_POST[$string]) ? $_POST[$string] : '';
    }

    function assets_css()
    {
        return SITE_URL . "Assets/css/";
    }

    function assets_js()
    {
        return SITE_URL . "Assets/js/";
    }

    function uploads()
    {
        return SITE_URL . "public/uploads/";
    }