<?php
namespace BK2K\BootstrapPackage\ViewHelpers;

/***************************************************************
 *
 *  The MIT License (MIT)
 *
 *  Copyright (c) 2014 Benjamin Kott, http://www.bk2k.info
 *
 *  Permission is hereby granted, free of charge, to any person obtaining a copy
 *  of this software and associated documentation files (the "Software"), to deal
 *  in the Software without restriction, including without limitation the rights
 *  to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
 *  copies of the Software, and to permit persons to whom the Software is
 *  furnished to do so, subject to the following conditions:
 *
 *  The above copyright notice and this permission notice shall be included in
 *  all copies or substantial portions of the Software.
 *
 *  THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
 *  IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
 *  FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
 *  AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
 *  LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
 *  OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
 *  THE SOFTWARE.
 *
 ***************************************************************/

use BK2K\BootstrapPackage\Utility\ExternalMediaUtility;
use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Fluid\Core\ViewHelper\AbstractViewHelper;

/**
 * @author Benjamin Kott <info@bk2k.info>
 */
class ExternalMediaViewHelper extends AbstractViewHelper {

	/**
	 * Checks if the URL is a valid YouTube/Vimeo Link is. If the video id can
	 * be extracted the embed code will be returned, else the content of the
	 * ViewHelper will be displayed.
	 *
	 * @param string $url
	 * @param string $ratio
	 * @return string
	 */
	public function render($url, $ratio) {
		$externalMediaUtility = GeneralUtility::makeInstance(ExternalMediaUtility::class);
		$content = $externalMediaUtility->getEmbedCode($url, $ratio);
		if(!$content){
			$content = $this->renderChildren();
		}
		return $content;
	}

}