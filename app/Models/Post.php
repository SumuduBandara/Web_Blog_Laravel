<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;



}


// ALTER TABLE `driwebnsys`.`Posts`
// ADD COLUMN `created_by` INT NOT NULL AFTER `view_count`,
// ADD COLUMN `created_at` TIMESTAMP NULL AFTER `created_by`,
// ADD COLUMN `updated_at` TIMESTAMP NULL AFTER `created_at`;
