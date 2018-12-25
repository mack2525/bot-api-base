<?php

declare(strict_types=1);

namespace Greenplugin\TelegramBot\Type;

/**
 * Class UserProfilePhotosType.
 *
 * @see https://core.telegram.org/bots/api#userprofilephotos
 */
class UserProfilePhotosType
{
    /**
     * Total number of profile pictures the target user has.
     *
     * @var int
     */
    public $totalCount;

    /**
     * @todo check this field.
     * Requested profile pictures (in up to 4 sizes each)
     *
     * @var PhotoSizeTypeCollection[]
     */
    public $photos;
}
