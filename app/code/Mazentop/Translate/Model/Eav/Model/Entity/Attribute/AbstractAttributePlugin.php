<?php
namespace Mazentop\Translate\Model\Eav\Model\Entity\Attribute;
use Magento\Eav\Model\Entity\Attribute\AbstractAttribute;
class AbstractAttributePlugin {
	/**
	 * @param AbstractFrontend $subject
	 * @param string $result
	 * @return string
	 */
	public function afterGetDefaultFrontendLabel(AbstractAttribute $subject, $result) {
        return __($result);
    }
}