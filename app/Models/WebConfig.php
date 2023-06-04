<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WebConfig extends Model
{
    use HasFactory;
    public static function getCloudinaryConfig()
    {
        $config = WebConfig::first();
        return $config->cloudinary_upload_api;
    }

    public static function getGuaranteeTime()
    {
        $config = WebConfig::first();
        return $config->guarantee_time;
    }
}
