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
		'20'  => 4.5,
		'50'  => 5,
		'100' => 5.65,
		'150' => 6.2,
		'200' => 6.8,
		'250' => 7.35,
		'300' => 7.9,
		'350' => 8.45,
		'400' => 9,
		'450' => 9.55,
		'500' => 10.1,
	);
	
	public function getPesosValores() {
		return $this->_pesosValores;
	}
}
