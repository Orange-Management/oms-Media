<?php
/**
 * Orange Management
 *
 * PHP Version 7.1
 *
 * @category   TBD
 * @package    TBD
 * @copyright  Dennis Eichhorn
 * @license    OMS License 1.0
 * @version    1.0.0
 * @link       http://orange-management.com
 */
declare(strict_types=1);
namespace Modules\Media\Models;

/**
 * Media class.
 *
 * @category   Modules
 * @package    Modules\Media
 * @license    OMS License 1.0
 * @link       http://orange-management.com
 * @since      1.0.0
 */
class Collection extends Media
{

    /**
     * Resource id.
     *
     * @var int[]
     * @since 1.0.0
     */
    private $sources = [];

    protected $extension = 'collection';

    protected $versioned = false;

    /**
     * Constructor.
     *
     * @since  1.0.0
     */
    public function __construct()
    {
        $this->createdAt = new \DateTime();
    }

    /**
     * Set sources.
     *
     * @param array $sources Source array
     *
     * @return void
     *
     * @since  1.0.0
     */
    public function setSources(array $sources)
    {
        $this->sources = $sources;
    }

    /**
     * Set sources.
     *
     * @param int|Media $source Source
     *
     * @return void
     *
     * @since  1.0.0
     */
    public function addSource($source)
    {
        $this->sources[] = $source;
    }

    /**
     * Get sources.
     *
     * @return array
     *
     * @since  1.0.0
     */
    public function getSources() : array
    {
        return $this->sources;
    }

    public function setExtension(string $extension)
    {
    }

    public function setVersioned(bool $versioned)
    {
    }
}
