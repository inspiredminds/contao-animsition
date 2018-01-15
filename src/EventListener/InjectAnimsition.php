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

namespace InspiredMinds\ContaoAnimsition\EventListener;

use Contao\FrontendTemplate;
use Contao\LayoutModel;
use Contao\PageModel;
use Contao\PageRegular;

class InjectAnimsition
{
	/**
	 * The animsition options array
	 * @var array
	 */
	protected static $arrAnimsitionOptions = [];


	/**
	 * Sets animsition options
	 * @param  array
	 */
	public static function setOptions(array $options)
	{
		self::$arrAnimsitionOptions = $options;
	}


	/**
	 * Returns the merged animsition options.
	 * @param  PageModel
	 * @return array
	 */
	protected function getOptions(PageModel $objPage = null)
	{
		if (null !== $objPage)
		{
			if ($objPage->animsitionEnable)
			{
				if ($objPage->animsitionInClass && $objPage->animsitionInDuration)
				{
					$arrAnimsitionOptions['inClass'] = $objPage->animsitionInClass;
					$arrAnimsitionOptions['inDuration'] = (int)$objPage->animsitionInDuration;
				}

				if ($objPage->animsitionOutClass && $objPage->animsitionOutDuration)
				{
					$arrAnimsitionOptions['outClass'] = $objPage->animsitionOutClass;
					$arrAnimsitionOptions['outDuration'] = (int)$objPage->animsitionOutDuration;
				}

				if (stripos($arrAnimsitionOptions['inClass'], 'overlay-')  !== false || 
				    stripos($arrAnimsitionOptions['outClass'], 'overlay-') !== false )
				{
					$arrAnimsitionOptions['overlay'] = true;
				}

				return array_merge($arrAnimsitionOptions, self::$arrAnimsitionOptions);
			}
		}

		return self::$arrAnimsitionOptions;
	}


	/**
	 * Injects HTML, CSS and JS
	 * @param  
	 */
	public function onGeneratePage(PageModel $objPageModel, LayoutModel $objLayoutModel, PageRegular $objPageRegular)
	{
		$arrAnimsitionOptions = $this->getOptions($objPageModel);

		if ($arrAnimsitionOptions)
		{
			$GLOBALS['TL_CSS'][] = 'bundles/contaoanimsition/animsition.min.css';
			$GLOBALS['TL_JAVASCRIPT'][] = 'bundles/contaoanimsition/animsition.min.js';
			$objTemplate = new FrontendTemplate('animsition');
			$objTemplate->options = $arrAnimsitionOptions;
			$GLOBALS['TL_BODY'][] = $objTemplate->parse();
		}
	}
}
