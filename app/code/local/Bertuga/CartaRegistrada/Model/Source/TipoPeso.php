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
class Bertuga_CartaRegistrada_Model_Source_TipoPeso {
    const PESO_GR = 'gr';
    const PESO_KG = 'kg';

    public function toOptionArray() {
        return array(
            array('value' => self::PESO_GR, 'label' => Mage::helper('adminhtml')->__('Gramas')),
            array('value' => self::PESO_KG, 'label' => Mage::helper('adminhtml')->__('Quilos')),
        );
    }
}
