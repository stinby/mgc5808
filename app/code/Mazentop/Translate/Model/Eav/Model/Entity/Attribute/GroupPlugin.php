<?php
namespace Mazentop\Translate\Model\Eav\Model\Entity\Attribute;
use Magento\Eav\Model\Entity\Attribute\Group;
class GroupPlugin {
	/**
	 * @param AbstractFrontend $subject
	 * @param string $result
	 * @return string
	 */
	public function afterGetAttributeGroupName(Group $subject, $result) {
        return __($result);
    }
}