<?php
/**
 * Orange Management
 *
 * PHP Version 8.0
 *
 * @package   Modules\Media\Controller
 * @copyright Dennis Eichhorn
 * @license   OMS License 1.0
 * @version   1.0.0
 * @link      https://orange-management.org
 */
declare(strict_types=1);

namespace Modules\Media\Controller;

use phpOMS\Asset\AssetType;
use phpOMS\Message\RequestAbstract;
use phpOMS\Message\ResponseAbstract;

/**
 * Options trait.
 *
 * @package Modules\Media\Controller
 * @license OMS License 1.0
 * @link    https://orange-management.org
 * @since   1.0.0
 */
trait FileUploaderTrait
{
    /**
     * Setup file uploader.
     *
     * @param RequestAbstract  $request  Request
     * @param ResponseAbstract $response Response
     * @param mixed            $data     Misc. data
     *
     * @return void
     *
     * @since 1.0.0
     * @codeCoverageIgnore
     */
    public static function setUpFileUploaderTrait(RequestAbstract $request, ResponseAbstract $response, $data = null) : void
    {
        $head = $response->get('Content')->getData('head');
        $head->addAsset(AssetType::JS, '/Modules/Media/Controller.js', ['type' => 'module']);
    }
}
