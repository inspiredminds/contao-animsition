<?php

/**
 * This file is part of the ContaoAnimsition Bundle.
 *
 * (c) inspiredminds <https://github.com/inspiredminds>
 *
 * @package   ContaoAnimsition
 * @author    Fritz Michael Gschwantner <https://github.com/fritzmg>
 * @license   LGPL-3.0+
 * @copyright inspiredminds 2018
 */


/**
 * Hooks
 */
$GLOBALS['TL_HOOKS']['generatePage'][] = ['inspiredminds_contao_animsition.listener.inject', 'onGeneratePage'];


/**
 * Options
 */
$GLOBALS['ANIMSITION_OPTIONS'] = [
	'in' => [
		'fade-in',
		'fade-in-down',
		'fade-in-down-lg',
		'fade-in-down-sm',
		'fade-in-left',
		'fade-in-left-lg',
		'fade-in-left-sm',
		'fade-in-right',
		'fade-in-right-lg',
		'fade-in-right-sm',
		'fade-in-up',
		'fade-in-up-lg',
		'fade-in-up-sm',
		'flip-in-x',
		'flip-in-x-fr',
		'flip-in-x-nr',
		'flip-in-y',
		'flip-in-y-fr',
		'flip-in-y-nr',
		'overlay-slide-in-bottom',
		'overlay-slide-in-left',
		'overlay-slide-in-right',
		'overlay-slide-in-top',
		'rotate-in',
		'rotate-in-lg',
		'rotate-in-sm',
		'zoom-in',
		'zoom-in-lg',
		'zoom-in-sm',
	],
	'out' => [
		'fade-out',
		'fade-out-down',
		'fade-out-down-lg',
		'fade-out-down-sm',
		'fade-out-left',
		'fade-out-left-lg',
		'fade-out-left-sm',
		'fade-out-right',
		'fade-out-right-lg',
		'fade-out-right-sm',
		'fade-out-up',
		'fade-out-up-lg',
		'fade-out-up-sm',
		'flip-out-x',
		'flip-out-x-fr',
		'flip-out-x-nr',
		'flip-out-y',
		'flip-out-y-fr',
		'flip-out-y-nr',
		'overlay-slide-out-bottom',
		'overlay-slide-out-left',
		'overlay-slide-out-right',
		'overlay-slide-out-top',
		'rotate-out',
		'rotate-out-lg',
		'rotate-out-sm',
		'zoom-out',
		'zoom-out-lg',
		'zoom-out-sm',
	],
];