<?php

namespace App\Models;

use App\Enums\UseFlag;
use App\Enums\VideoAllowInSample;
use App\Enums\VideoTypeAllowed;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Modules\Ecs\Services\FileService;
use Illuminate\Database\Eloquent\Builder;

class Video extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = "videos";

    protected $fillable
        = [
            'talent_id',
            'requested_video_id',
            'thumbnail',
            'original_name',
            'name',
            'duration',
            'size',
            'path',
            'allow_in_sample',
            'use_flag'
        ];

    protected $appends = [
            'url',
            'videoThumbnail'
        ];

    public function requestedVideo()
    {
        return $this->belongsTo(RequestedVideo::class, 'requested_video_id');
    }

    public function getVideoThumbnailAttribute() : ?string
    {
        $url = null;

        if (!is_null($this->thumbnail)) {
            $url = !empty(config('constants.aws.cloud_front_img'))
                ? config('constants.aws.cloud_front_img') . $this->thumbnail
                : FileService::url($this->thumbnail, config('filesystems.default'));
        }

        return $url;
    }

    public function getUrlAttribute() : ?string
    {
        $url       = null;
        $extension = config('constants.file_upload_folder.talent.extension_video', '.mp4');
        $filePath  = pathinfo($this->path);

        if (!is_null($this->name)
            && in_array(strtolower($filePath['extension']), VideoTypeAllowed::scopeAll())
        ) {
            $url = !empty(config('constants.aws.cloud_front_video'))
                ? config('constants.aws.cloud_front_video') .
                  config('constants.file_upload_folder.talent.path_download') .
                  $filePath['dirname'] . '/' . $filePath['filename'] . $extension
                : FileService::url($this->path, config('filesystems.disks.output_video.disk_name'));
        }

        return $url;
    }

    public function scopeTalentSampleVideo(Builder $query): void
    {
        $query->where('allow_in_sample', VideoAllowInSample::AGREE->value)
              ->where('use_flag', UseFlag::AVAILABILITY->value)
              ->whereNull('requested_video_id');
    }
}
