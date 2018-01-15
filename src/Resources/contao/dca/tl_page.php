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

use Contao\CoreBundle\DataContainer\PaletteManipulator;


/**
 * Fields
 */
$GLOBALS['TL_DCA']['tl_page']['fields']['animsitionEnable'] = array
(
	'label' => ['Animsition aktivieren', 'Aktiviert Animsition Optionen für diese Seite.'],
	'inputType' => 'checkbox',
	'eval' => ['submitOnChange' => true, 'tl_class' => 'clr'],
	'sql' => ['type' => 'boolean', 'default' => 0],
);

$GLOBALS['TL_DCA']['tl_page']['fields']['animsitionInClass'] = array
(
	'label' => ['Eingangsanimation', 'Setzt eine Eingangsanimation für die Seite.'],
	'inputType' => 'select',
	'options' => $GLOBALS['ANIMSITION_OPTIONS']['in'],
	'eval' => ['includeBlankOption'=>true, 'tl_class' => 'clr w50'],
	'sql' => ['type'=>'string', 'length'=>255, 'nullable'=>true],
);

$GLOBALS['TL_DCA']['tl_page']['fields']['animsitionOutClass'] = array
(
	'label' => ['Ausgangsanimation', 'Setzt eine Ausgangsanimation für die Seite.'],
	'inputType' => 'select',
	'options' => $GLOBALS['ANIMSITION_OPTIONS']['out'],
	'eval' => ['includeBlankOption'=>true, 'tl_class' => 'w50'],
	'sql' => ['type'=>'string', 'length'=>255, 'nullable'=>true],
);

$GLOBALS['TL_DCA']['tl_page']['fields']['animsitionInDuration'] = array
(
	'label' => ['Dauer der Eingangsanimation', 'Setzt die Dauer der Eingangsanimation in Millisekunden.'],
	'inputType' => 'text',
	'default' => 1500,
	'eval' => ['rgxp'=>'natural', 'tl_class' => 'clr w50'],
	'sql' => ['type'=>'integer', 'nullable'=>true],
);

$GLOBALS['TL_DCA']['tl_page']['fields']['animsitionOutDuration'] = array
(
	'label' => ['Dauer der Ausgangsanimation', 'Setzt die Dauer der Ausgangsanimation in Millisekunden.'],
	'inputType' => 'text',
	'default' => 800,
	'eval' => ['rgxp'=>'natural', 'tl_class' => 'w50'],
	'sql' => ['type'=>'integer', 'nullable'=>true],
);


/**
 * Palettes
 */
$GLOBALS['TL_DCA']['tl_page']['palettes']['__selector__'][] = 'animsitionEnable';
$GLOBALS['TL_DCA']['tl_page']['subpalettes']['animsitionEnable'] = 'animsitionInClass,animsitionOutClass,animsitionInDuration,animsitionOutDuration';

PaletteManipulator::create()
	->addLegend('animsition_legend', 'publish_legend', PaletteManipulator::POSITION_BEFORE)
	->addField('animsitionEnable', 'animsition_legend', PaletteManipulator::POSITION_APPEND)
	->applyToPalette('regular', 'tl_page');

$GLOBALS['TL_LANG']['tl_page']['animsition_legend'] = 'Animsition';
