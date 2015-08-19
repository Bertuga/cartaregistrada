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
		'20'  => 5,
		'50'  => 5.55,
		'100' => 6.3,
		'150' => 6.9,
		'200' => 7.5,
		'250' => 8.1,
		'300' => 8.75,
		'350' => 9.35,
		'400' => 9.95,
		'450' => 10.55,
		'500' => 11.15,
	);
	
	public function getPesosValores() {
		return $this->_pesosValores;
	}
}
