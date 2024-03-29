<?php
use MagazineVibe\Modules\Header\Lib;

if(!function_exists('magazinevibe_edge_set_header_object')) {
    function magazinevibe_edge_set_header_object() {
        $header_type = 'header-type3';

        $object = Lib\HeaderFactory::getInstance()->build($header_type);

        if(Lib\HeaderFactory::getInstance()->validHeaderObject()) {
            $header_connector = new Lib\HeaderConnector($object);
            $header_connector->connect($object->getConnectConfig());
        }
    }

    add_action('wp', 'magazinevibe_edge_set_header_object', 1);
}