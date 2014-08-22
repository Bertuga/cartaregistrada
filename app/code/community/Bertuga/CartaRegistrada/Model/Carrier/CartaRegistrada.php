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
class Bertuga_CartaRegistrada_Model_Carrier_CartaRegistrada extends Mage_Shipping_Model_Carrier_Abstract {

	protected $_code = 'bertuga_cartaregistrada';
	
	public function collectRates(Mage_Shipping_Model_Rate_Request $request) {
		if (!Mage::getStoreConfig('carriers/'.$this->_code.'/active'))
			return false;
		
		if (!$this->isDisponivel($request))
			return false;
		
		if ( Mage::getStoreConfig('carriers/'.$this->_code.'/free_shipping_enable') && $this->getValorTotal($request) >  Mage::getStoreConfig('carriers/'.$this->_code.'/free_shipping_subtotal'))
			$valor = 0;
		else
			if ($this->getValorFrete($request))
				$valor = $this->getValorFrete($request);
			else
				return false;
				
		$result = Mage::getModel('shipping/rate_result');
		
		$method = Mage::getModel('shipping/rate_result_method');
		
		$method->setCarrier($this->_code);
		$method->setCarrierTitle(Mage::getStoreConfig('carriers/'.$this->_code.'/title'));

		$method->setMethod('cartaregistrada');

		$method->setCost($valor);

		$method->setPrice($valor);
		$result->append($method);

		return $result;
	}
	
	public function getPesoTotal(Mage_Shipping_Model_Rate_Request $request) {
		$peso = 0;
		if ($request->getAllItems())
			foreach($request->getAllItems() as $item)
				$peso += $item->getWeight() * $item->getQty();
		if ( $this->getTipoPeso() == Bertuga_CartaRegistrada_Model_Source_TipoPeso::PESO_GR )
			return $peso;
		else
			return $peso*1000;
	}
	
	public function getValorTotal(Mage_Shipping_Model_Rate_Request $request) {
		$valor = 0;
		if ($request->getAllItems())
			foreach($request->getAllItems() as $item)
				$valor += $item->getPrice() * $item->getQty();
		return $valor;
	}
	
	public function getTipoPeso() {
		return Mage::getStoreConfig('carriers/'.$this->_code.'/weight_type');
	}
	
	public function getValorFrete(Mage_Shipping_Model_Rate_Request $request) {
		$handling = (float) Mage::getStoreConfig('carriers/'.$this->_code.'/handling_fee');
		$peso = $this->getPesoTotal($request);
		foreach(Mage::helper('cartaregistrada')->getPesosValores() as $peso => $valor )
			if ( $peso <= intval($peso) )
				return $valor+$handling;
		return false;
	}
	
	public function validarProdutosPermitidos(Mage_Shipping_Model_Rate_Request $request) {
		$produtos = array();
		foreach($request->getAllItems() as $item)
			$produtos[] = $item->getProductId();
		$produtos_permitidos = Mage::getStoreConfig('carriers/'.$this->_code.'/filter_value');
		$produtos_permitidos = strstr($produtos_permitidos,',') ? explode(',',$produtos_permitidos) : array($produtos_permitidos);
		foreach($produtos as $produto)
			if (intval($produto) != 0 && !in_array($produto,$produtos_permitidos))
				return false;
		return true;
	}
	
	public function validarCategoriasPermitidas(Mage_Shipping_Model_Rate_Request $request) {
		$categorias_permitidas = Mage::getStoreConfig('carriers/'.$this->_code.'/filter_value');
		$categorias_permitidas = strstr($categorias_permitidas,',') ? explode(',',$categorias_permitidas) : array($categorias_permitidas);
		foreach($request->getAllItems() as $item) {
			$categorias_produtos = array();
			foreach($item->getProduct()->getCategoryIds() as $categoria)
				$categorias_produtos[] = $categoria;
			foreach($categorias_permitidas as $categoria_permitida)
				if (intval($categoria_permitida) != 0 && in_array($categoria_permitida,$categorias_produtos))
					continue 2;
			return false;
		}
		return true;
	}
	
	public function isDisponivel(Mage_Shipping_Model_Rate_Request $request) {
		if ( Mage::getStoreConfig('carriers/'.$this->_code.'/filter_type') == Bertuga_CartaRegistrada_Model_Source_TipoFiltro::FILTRO_PRODUTO )
			return $this->validarProdutosPermitidos($request);
		else if( Mage::getStoreConfig('carriers/'.$this->_code.'/filter_type') == Bertuga_CartaRegistrada_Model_Source_TipoFiltro::FILTRO_CATEGORIA )
			return $this->validarCategoriasPermitidas($request);
		else
			return true;
	}
	
	public function getAllowedMethods() {
		return array($this->_code => $this->getConfigData('name'));
	}
}