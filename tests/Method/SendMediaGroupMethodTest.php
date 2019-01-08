<?php

declare(strict_types=1);

namespace TgBotApi\BotApiBase\Tests\Method;

use TgBotApi\BotApiBase\Method\Interfaces\HasParseModeVariableInterface;
use TgBotApi\BotApiBase\Method\SendMediaGroupMethod;
use TgBotApi\BotApiBase\Tests\Method\Traits\InlineKeyboardMarkupTrait;
use TgBotApi\BotApiBase\Type\InputMedia\InputMediaPhotoType;
use TgBotApi\BotApiBase\Type\InputMedia\InputMediaVideoType;

class SendMediaGroupMethodTest extends MethodTestCase
{
    use InlineKeyboardMarkupTrait;

    /**
     * @throws \TgBotApi\BotApiBase\Exception\BadArgumentException
     * @throws \TgBotApi\BotApiBase\Exception\ResponseException
     */
    public function testEncode()
    {
        $botApi = $this->getBotWithFiles(
            'sendMediaGroup',
            [
                'chat_id' => 'chat_id',
                'media' => [
                    [
                        'media' => '',
                        'caption' => 'InputMediaPhotoType',
                        'parse_mode' => 'Markdown',
                        'type' => 'photo',
                    ],
                    [
                        'media' => '',
                        'caption' => 'InputMediaPhotoType',
                        'parse_mode' => 'Markdown',
                        'type' => 'video',

                        'thumb' => '',
                        'width' => 100,
                        'height' => 100,
                        'duration' => 100,
                        'support_streaming' => true,
                    ],
                ],
                'disable_notification' => true,
                'reply_to_message_id' => 1,
            ],
            ['media' => [
                ['media' => true],
                ['media' => true, 'thumb' => true],
            ]],
            ['media']
        );

        $botApi->sendMediaGroup(SendMediaGroupMethod::create(
            'chat_id',
            [
                InputMediaPhotoType::create(new \SplFileInfo('/dev/null'), [
                    'caption' => 'InputMediaPhotoType',
                    'parseMode' => HasParseModeVariableInterface::PARSE_MODE_MARKDOWN,
                ]),
                InputMediaVideoType::create(new \SplFileInfo('/dev/null'), [
                    'thumb' => new \SplFileInfo('/dev/null'),
                    'width' => 100,
                    'height' => 100,
                    'duration' => 100,
                    'supportStreaming' => true,
                    'caption' => 'InputMediaPhotoType',
                    'parseMode' => HasParseModeVariableInterface::PARSE_MODE_MARKDOWN,
                ]),
            ],
            [
                'disableNotification' => true,
                'replyToMessageId' => 1,
            ]
        ));
    }
}
