<?php

//top header bar
add_action('magazinevibe_edge_before_page_header', 'magazinevibe_edge_get_header_top');

//mobile header
add_action('magazinevibe_edge_after_page_header', 'magazinevibe_edge_get_mobile_header');