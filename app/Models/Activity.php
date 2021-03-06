<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Poll;

class Activity extends Model
{
    protected $fillable = [
        'user_id',
        'poll_id',
        'type',
        'name',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function poll()
    {
        return $this->belongsTo(Poll::class);
    }

    public function getActivity($name)
    {
        $types = [
            config('settings.activity.participated') => [
                'level' => 'primary',
                'text' => trans('history.participated'),
            ],
            config('settings.activity.all_participants_deleted') => [
                'level' => 'danger',
                'text' => trans('history.all_participants_deleted'),
            ],
            config('settings.activity.added_a_comment') => [
                'level' => 'success',
                'text' => trans('history.added_a_comment'),
            ],
            config('settings.activity.reset_link') => [
                'level' => 'info',
                'text' => trans('history.reset_link'),
            ],
            config('settings.activity.delete_comment') => [
                'level' => 'warning',
                'text' => trans('history.delete_comment'),
            ],
            config('settings.activity.edit_vote') => [
                'level' => 'default',
                'text' => trans('history.edit_vote'),
            ],
        ];
        $textTemplate = "<label class='label label-%s'>%s</label>";
        $type = $types[$this->type];

        return sprintf($textTemplate, $type['level'], $name . ' ' . $type['text']);
    }
}
