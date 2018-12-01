<?php
/**
 * Orange Management
 *
 * PHP Version 7.2
 *
 * @package    Modules\Media
 * @copyright  Dennis Eichhorn
 * @license    OMS License 1.0
 * @version    1.0.0
 * @link       http://website.orange-management.de
 */
declare(strict_types=1);

namespace Modules\Media\Controller;

use Modules\Media\Models\Media;
use Modules\Media\Models\MediaMapper;
use Modules\Media\Models\CollectionMapper;
use Modules\Media\Models\Collection;
use Modules\Media\Views\MediaView;

use Modules\Media\Models\UploadFile;
use Modules\Media\Models\UploadStatus;
use phpOMS\Asset\AssetType;
use phpOMS\Message\RequestAbstract;
use phpOMS\Message\ResponseAbstract;
use phpOMS\Model\Html\Head;
use phpOMS\Module\ModuleAbstract;
use phpOMS\Module\WebInterface;
use phpOMS\System\MimeType;
use phpOMS\Views\View;
use phpOMS\Message\Http\RequestStatusCode;

/**
 * Media class.
 *
 * @package    Modules\Media
 * @license    OMS License 1.0
 * @link       http://website.orange-management.de
 * @since      1.0.0
 */
final class ApiController extends Controller
{

    /**
     * Shows api content.
     *
     * @param RequestAbstract  $request  Request
     * @param ResponseAbstract $response Response
     * @param mixed            $data     Generic data
     *
     * @return void
     *
     * @api
     *
     * @since  1.0.0
     */
    public function apiMediaUpload(RequestAbstract $request, ResponseAbstract $response, $data = null) : void
    {
        $uploads = $this->uploadFiles(
            $request->getFiles(),
            $request->getHeader()->getAccount(),
            (string) ($request->getData('path') ?? __DIR__ . '/../../../Modules/Media/Files')
        );

        $ids = [];
        foreach ($uploads as $file) {
            $ids[] = $file->getId();
        }

        $response->getHeader()->set('Content-Type', MimeType::M_JSON . '; charset=utf-8', true);
        $response->set($request->getUri()->__toString(), $ids);
    }

    /**
     * Shows api content.
     *
     * @param RequestAbstract  $request  Request
     * @param ResponseAbstract $response Response
     * @param mixed            $data     Generic data
     *
     * @return void
     *
     * @api
     *
     * @since  1.0.0
     */
    public function apiMediaCreate(RequestAbstract $request, ResponseAbstract $response, $data = null) : void
    {
        // todo: change database entry for files if has write permission
    }

    /**
     * @param array  $files    Files
     * @param int    $account  Uploader
     * @param string $basePath Base path
     *
     * @return array
     *
     * @since  1.0.0
     */
    public function uploadFiles(array $files, int $account, string $basePath = 'Modules/Media/Files') : array
    {
        $mediaCreated = [];

        if (!empty($files)) {
            $upload = new UploadFile();
            $upload->setOutputDir(self::createMediaPath($basePath));

            $status       = $upload->upload($files);
            $mediaCreated = self::createDbEntries($status, $account);
        }

        return $mediaCreated;
    }

    public static function createMediaPath(string $basePath = 'Modules/Media/Files') : string
    {
        $rndPath = \str_pad(\dechex(\mt_rand(0, 65535)), 4, '0', STR_PAD_LEFT);
        return $basePath . '/' . $rndPath[0] . $rndPath[1] . '/' . $rndPath[2] . $rndPath[3];
    }

    /**
     * @param array $status  Files
     * @param int   $account Uploader
     *
     * @return array
     *
     * @since  1.0.0
     */
    public static function createDbEntries(array $status, int $account) : array
    {
        $mediaCreated = [];

        foreach ($status as $uFile) {
            if (!is_null($created = self::createDbEntry($uFile, $account))) {
                $mediaCreated[] = $created;
            }
        }

        return $mediaCreated;
    }

    public static function createDbEntry(array $status, int $account) : ?Media
    {
        $media = null;

        if ($status['status'] === UploadStatus::OK) {
            $media = new Media();

            $media->setPath(self::normalizeDbPath($status['path']) . '/' . $status['filename']);
            $media->setName($status['name']);
            $media->setSize($status['size']);
            $media->setCreatedBy($account);
            $media->setExtension($status['extension']);

            MediaMapper::create($media);
        }

        return $media;
    }

    private static function normalizeDbPath(string $path) : string
    {
        return \str_replace('\\', '/',
            \str_replace(realpath(__DIR__ . '/../../'), '',
                rtrim($path, '/')
            )
        );
    }
}
