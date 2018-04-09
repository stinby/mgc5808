<?php

namespace Mazentop\Translate\Model;

use Magento\Eav\Model\Entity\Attribute\Frontend\AbstractFrontend;

class AbstractFrontendPlugin {

	/**

	 * @param AbstractFrontend $subject

	 * @param string $result

	 * @return string

	 */

	public function afterGetLabel(AbstractFrontend $subject, $result) {

        return __($result);

    }

}