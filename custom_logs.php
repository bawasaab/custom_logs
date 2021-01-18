<?php
$common = __DIR__;
$src = dirname($common);
$treecom = dirname($src);

require_once "{$src}/include/define.inc";

define('LOG_DIR', APP_BASE . '/public_html/test/logs');

if( !function_exists('wh_log') ) {

    function wh_log($log_msg) {

        $log_directory = LOG_DIR;
        $log_filename = 'log_' . date('d-M-Y') . '.log';
        if (!file_exists($log_directory)) {
            // create directory/folder uploads.
            mkdir($log_directory, 0777, true);
        }
        $log_file_data = $log_directory .'/'. $log_filename;

        $before = "\n********************-". date('Y-m-d H:i:s') ." starts here-********************\n";
        $after = "\n********************-". date('Y-m-d H:i:s') ." ends here-**********************\n";
        $log_msg = $before . $log_msg .$after;

        // if you don't add `FILE_APPEND`, the file will be erased each time you add a log
        file_put_contents($log_file_data, $log_msg . "\n", FILE_APPEND);
    }
}

if( !function_exists('wh_clear_log') ) {
    function wh_clear_log( $dated = null ) {
        $log_directory = LOG_DIR;
        if( $dated ) {
            $log_filename = 'log_' . $dated . '.log';
        } else {
            $log_filename = 'log_' . date('d-M-Y') . '.log';
        }

        if (file_exists($log_directory)) {
            // unlink file.
            $log_file_to_be_deleted = $log_directory .'/'. $log_filename;
            unlink($log_file_to_be_deleted);
        }
    }
}

// call to function
//wh_log("this is my log message");
//wh_clear_log('15-Jan-2022');
?>
