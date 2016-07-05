<?php

use MagazineVibe\Modules\Blog\Shortcodes\PostLayoutMinimal\PostLayoutMinimal;
use MagazineVibe\Modules\Blog\Shortcodes\PostLayoutMinimalWithThumb\PostLayoutMinimalWithThumb;
use MagazineVibe\Modules\Blog\Shortcodes\PostClassicSlider\PostClassicSlider;
use MagazineVibe\Modules\Blog\Shortcodes\PostLayoutOne\PostLayoutOne;
use MagazineVibe\Modules\Blog\Shortcodes\PostLayoutFour\PostLayoutFour;
use MagazineVibe\Modules\Blog\Shortcodes\PostSplitSlider\PostSplitSlider;
use MagazineVibe\Modules\Blog\Shortcodes\SinglePostLayout\SinglePostLayout;
use MagazineVibe\Modules\Blog\Shortcodes\PostLayoutBoxes\PostLayoutBoxes;
use MagazineVibe\Modules\Blog\Shortcodes\PostLayoutSmall\PostLayoutSmall;

/*
	Blocks - combinations of several shortcodes
*/
use MagazineVibe\Modules\Blog\Shortcodes\BlockOne\BlockOne;
use MagazineVibe\Modules\Blog\Shortcodes\BlockTwo\BlockTwo;
use MagazineVibe\Modules\Blog\Shortcodes\BlockThree\BlockThree;
use MagazineVibe\Modules\Blog\Shortcodes\BlockFour\BlockFour;
use MagazineVibe\Modules\Blog\Shortcodes\BlockFive\BlockFive;
use MagazineVibe\Modules\Blog\Shortcodes\BlockSix\BlockSix;
use MagazineVibe\Modules\Blog\Shortcodes\BlockSeven\BlockSeven;
use MagazineVibe\Modules\Blog\Shortcodes\BlockEight\BlockEight;
use MagazineVibe\Modules\Blog\Shortcodes\BlockNine\BlockNine;
use MagazineVibe\Modules\Blog\Shortcodes\BlockTen\BlockTen;

if(!function_exists('magazinevibe_edge_list_ajax')) {
    function magazinevibe_edge_list_ajax()
    {

        $params = ($_POST);

        switch($params['base']){
            case 'edgtf_block_one' : {
                $newShortcode = new BlockOne();
            }   break;
            case 'edgtf_block_two' : {
                $newShortcode = new BlockTwo();
            }   break;
            case 'edgtf_block_three' : {
                $newShortcode = new BlockThree();
            }   break;
            case 'edgtf_block_four' : {
                $newShortcode = new BlockFour();
            }   break;
            case 'edgtf_block_five' : {
                $newShortcode = new BlockFive();
            }   break;
            case 'edgtf_block_six' : {
                $newShortcode = new BlockSix();
            }   break;
            case 'edgtf_block_seven' : {
                $newShortcode = new BlockSeven();
            }   break;
            case 'edgtf_block_eight' : {
                $newShortcode = new BlockEight();
            }   break;
            case 'edgtf_block_nine' : {
                $newShortcode = new BlockNine();
            }   break;
            case 'edgtf_block_ten' : {
                $newShortcode = new BlockTen();
            }   break;
            case 'edgtf_post_layout_one' : {
                $newShortcode = new PostLayoutOne();
            }   break;
            case 'edgtf_single_post_layout' : {
                $newShortcode = new SinglePostLayout();
            }   break;
            case 'edgtf_post_layout_small' : {
                $newShortcode = new PostLayoutSmall();
            }   break;
            case 'edgtf_post_layout_four' : {
                $newShortcode = new PostLayoutFour();
            }   break;
            case 'edgtf_post_layout_minimal' : {
                $newShortcode = new PostLayoutMinimal();
            }   break;
            case 'edgtf_post_layout_minimal_with_thumb' : {
                $newShortcode = new PostLayoutMinimalWithThumb();
            }   break;
            case 'edgtf_post_layout_boxes' : {
                $newShortcode = new PostLayoutBoxes();
            }   break;
        }

        $params['query_result'] = $newShortcode->generatePostsQuery($params);
        $html_response = $newShortcode->render($params);

        $show_next_page = true;
        if ($params['paged'] < 1 || $params['paged'] > $params['query_result']->max_num_pages) {
            $show_next_page = false;
        }


        $return_obj = array(
            'html' => $html_response,
            'showNextPage' => $show_next_page
        );

        echo json_encode($return_obj); exit;
    }

    add_action('wp_ajax_magazinevibe_edge_list_ajax', 'magazinevibe_edge_list_ajax');
    add_action( 'wp_ajax_nopriv_magazinevibe_edge_list_ajax', 'magazinevibe_edge_list_ajax' );
}