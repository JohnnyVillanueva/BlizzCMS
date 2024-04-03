<?php

namespace App\Entities;

use CodeIgniter\Entity\Entity;

class Comment extends Entity
{
    protected $datamap = [
        'newsId'    => 'news_id',
        'userId'    => 'user_id',
        'createdAt' => 'created_at',
        'updatedAt' => 'updated_at',
        'deletedAt' => 'deleted_at',
    ];
    protected $dates   = ['created_at', 'updated_at', 'deleted_at'];
    protected $casts   = [];
}
