<?php

/**
 * This source file is subject to the MIT License.
 * It is also available through http://opensource.org/licenses/MIT
 *
 * @category  Bertuga
 * @package   Bertuga_CartaRegistrada
 * @copyright Copyright (c) 2014 Bruno Bertuga (https://github.com/Bertuga)
 * @author    Bruno Bertuga <bertuga@gmail.com>
 * @license   http://opensource.org/licenses/MIT
 */
class Bertuga_CartaRegistrada_Helper_Data extends Mage_Core_Helper_Abstract {
	
	protected $_pesosValores = array(
		'20'  => 6.1,
		'50'  => 6.85,
		'100' => 7.8,
		'150' => 8.55,
		'200' => 9.35,
		'250' => 10.15,
		'300' => 10.95,
		'350' => 11.75,
		'400' => 12.5,
		'450' => 13.3,
		'500' => 14.1,
	);
	
	public function getPesosValores() {
		return $this->_pesosValores;
	}
}
