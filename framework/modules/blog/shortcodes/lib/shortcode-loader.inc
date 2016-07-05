<?php

namespace MagazineVibe\Modules\Blog\Shortcodes\Lib;

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

/**
 * Class ShortcodeLoader
 */
class ShortcodeLoader {
	/**
	 * @var private instance of current class
	 */
	private static $instance;
	/**
	 * @var array
	 */
	private $loadedShortcodes = array();

	/**
	 * Private constuct because of Singletone
	 */
	private function __construct() {}

	/**
	 * Private sleep because of Singletone
	 */
	private function __wakeup() {}

	/**
	 * Private clone because of Singletone
	 */
	private function __clone() {}

	/**
	 * Returns current instance of class
	 * @return ShortcodeLoader
	 */
	public static function getInstance() {
		if(self::$instance == null) {
			return new self;
		}

		return self::$instance;
	}

	/**
	 * Adds new shortcode. Object that it takes must implement ListShortcode
	 * @param ListShortcode $shortcode
	 */
	private function addShortcode(ListShortcode $shortcode) {
		if(!array_key_exists($shortcode->getBase(), $this->loadedShortcodes)) {
			$this->loadedShortcodes[$shortcode->getBase()] = $shortcode;
		}
	}

	/**
	 * Adds all shortcodes.
	 *
	 * @see ShortcodeLoader::addShortcode()
	 */
	private function addShortcodes() {
		$this->addShortcode(new PostSplitSlider());
		$this->addShortcode(new PostClassicSlider());
		$this->addShortcode(new PostLayoutOne());
		$this->addShortcode(new SinglePostLayout());
		$this->addShortcode(new PostLayoutSmall());
		$this->addShortcode(new PostLayoutFour());
		$this->addShortcode(new PostLayoutMinimal());
		$this->addShortcode(new PostLayoutMinimalWithThumb());
		$this->addShortcode(new PostLayoutBoxes());
		$this->addShortcode(new BlockOne());
        $this->addShortcode(new BlockTwo());
        $this->addShortcode(new BlockThree());
		$this->addShortcode(new BlockFour());
		$this->addShortcode(new BlockFive());
		$this->addShortcode(new BlockSix());
		$this->addShortcode(new BlockSeven());
        $this->addShortcode(new BlockEight());
        $this->addShortcode(new BlockNine());
        $this->addShortcode(new BlockTen());
	}
	/**
	 * Calls ShortcodeLoader::addShortcodes and than loops through added shortcodes and calls render method
	 * of each shortcode object
	 */
	public function load() {
		$this->addShortcodes();

		foreach ($this->loadedShortcodes as $shortcode) {
			add_shortcode($shortcode->getBase(), array($shortcode, 'renderHolders'));
		}
	}
}

$shortcodeLoader = ShortcodeLoader::getInstance();
$shortcodeLoader->load();