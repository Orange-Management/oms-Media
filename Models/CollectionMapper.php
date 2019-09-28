<?php
/**
 * Orange Management
 *
 * PHP Version 7.4
 *
 * @package   Modules\Media\Models
 * @copyright Dennis Eichhorn
 * @license   OMS License 1.0
 * @version   1.0.0
 * @link      https://orange-management.org
 */
declare(strict_types=1);

namespace Modules\Media\Models;

/**
 * Mapper class.
 *
 * @package Modules\Media\Models
 * @license OMS License 1.0
 * @link    https://orange-management.org
 * @since   1.0.0
 */
final class CollectionMapper extends MediaMapper
{
    /**
     * Has many relation.
     *
     * @var   array<string, array<string, null|string>>
     * @since 1.0.0
     */
    protected static array $hasMany = [
        'sources' => [
            'mapper' => MediaMapper::class, /* mapper of the related object */
            'table'  => 'media_relation', /* table of the related object, null if no relation table is used (many->1) */
            'dst'    => 'media_relation_dst',
            'src'    => 'media_relation_src',
        ],
    ];

    /**
     * Primary table.
     *
     * @var   string
     * @since 1.0.0
     */
    protected static string $table = 'media';

    /**
     * Created at.
     *
     * @var   string
     * @since 1.0.0
     */
    protected static string $createdAt = 'media_created_at';

    /**
     * Primary field name.
     *
     * @var   string
     * @since 1.0.0
     */
    protected static string $primaryField = 'media_id';
}
