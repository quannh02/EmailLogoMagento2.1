<?php
/**
 * Copyright © 2013-2017 Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */
namespace Icube\EmailLogo\Model\Design\Backend;

use Magento\Theme\Model\Design\Backend\Image as CoreLogo;

class Logo extends CoreLogo
{
    /**
     * The tail part of directory path for uploading
     *
     */
    const UPLOAD_DIR = 'logo';

    /**
     * @function save logo email
     *
     * @return string
     */
    protected function _getUploadDir()
    {
        $dataConfig = $this->getData();
        if (isset($dataConfig['path'])) {
            if ($dataConfig['path'] === 'design/email/logo') {
                return $this->_mediaDirectory->getRelativePath($this->_appendScopeInfo('email/logo'));
            }
        }
        return $this->_mediaDirectory->getRelativePath($this->_appendScopeInfo(self::UPLOAD_DIR));
    }

    /**
     * Makes a decision about whether to add info about the scope.
     *
     * @return boolean
     */
    protected function _addWhetherScopeInfo()
    {
        return true;
    }

    /**
     * Getter for allowed extensions of uploaded files.
     *
     * @return string[]
     */
    public function getAllowedExtensions()
    {
        return ['jpg', 'jpeg', 'gif', 'png', 'svg'];
    }
}
