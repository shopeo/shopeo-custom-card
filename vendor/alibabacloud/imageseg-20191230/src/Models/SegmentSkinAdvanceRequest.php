<?php

// This file is auto-generated, don't edit it. Thanks.

namespace AlibabaCloud\SDK\Imageseg\V20191230\Models;

use AlibabaCloud\Tea\Model;
use GuzzleHttp\Psr7\Stream;

class SegmentSkinAdvanceRequest extends Model
{
    /**
     * @var Stream
     */
    public $URLObject;
    protected $_name = [
        'URLObject' => 'URL',
    ];

    public function validate()
    {
    }

    public function toMap()
    {
        $res = [];
        if (null !== $this->URLObject) {
            $res['URL'] = $this->URLObject;
        }

        return $res;
    }

    /**
     * @param array $map
     *
     * @return SegmentSkinAdvanceRequest
     */
    public static function fromMap($map = [])
    {
        $model = new self();
        if (isset($map['URL'])) {
            $model->URLObject = $map['URL'];
        }

        return $model;
    }
}
