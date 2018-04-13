<?php
/**
 * Copyright © 2017 Ihor Vansach (ihor@magefan.com). All rights reserved.
 * See LICENSE.txt for license details (http://opensource.org/licenses/osl-3.0.php).
 *
 * Glory to Ukraine! Glory to the heroes!
 */

namespace Magefan\Blog\Helper;

use Magento\Framework\App\Action\Action;

/**
 * Magefan Blog Config Helper
 */
class Config extends \Magento\Framework\App\Helper\AbstractHelper
{
    /**
     * Extension enabled config path
     */
    const XML_PATH_EXTENSION_ENABLED = 'mfblog/general/enabled';
    const GUEST_COMMENT = 'mfblog/post_view/comments/guest_comments';
    const NUMBER_OF_COMMENTS = 'mfblog/post_view/comments/number_of_comments';
    const NUMBER_OF_REPLIES = 'mfblog/post_view/comments/number_of_replies';
    const COMMENT_STATUS = 'mfblog/post_view/comments/default_status';

}
