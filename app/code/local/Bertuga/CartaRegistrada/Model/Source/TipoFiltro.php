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
class Bertuga_CartaRegistrada_Model_Source_TipoFiltro {
    const FILTRO_NENHUM = 0;
    const FILTRO_PRODUTO = 1;
    const FILTRO_CATEGORIA = 2;

    public function toOptionArray() {
        return array(
            array('value' => self::FILTRO_NENHUM, 'label' => Mage::helper('adminhtml')->__('Não restringir')),
            array('value' => self::FILTRO_PRODUTO, 'label' => Mage::helper('adminhtml')->__('Produto')),
            array('value' => self::FILTRO_CATEGORIA, 'label' => Mage::helper('adminhtml')->__('Categoria')),
        );
    }
}
