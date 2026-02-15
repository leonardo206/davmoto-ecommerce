<?php

namespace GrandPrixCore\Lib;

/**
 * interface PostTypeInterface
 * @package GrandPrixCore\Lib;
 */
interface PostTypeInterface {
	/**
	 * @return string
	 */
	public function getBase();
	
	/**
	 * Registers custom post type with WordPress
	 */
	public function register();
}