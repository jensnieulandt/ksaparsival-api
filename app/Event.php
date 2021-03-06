<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Event extends EloquentBaseModel
{
    use SoftDeletes;
    protected $dates = ['deleted_at'];
    protected $fillable = [
        'event_type_id',
        'group_id',
        'user_id',
        'last_updated_by',
        'published',
        'title',
        'description',
        'start',
        'end',
        'allDay',
        'end',
        'url',
        'className',
        'editable',
        'startEditable',
        'durationEditable',
        'resourceEditable',
        'rendering',
        'overlap',
        'constraint',
        'source',
        'color',
        'backgroundColor',
        'borderColor',
        'textColor',
    ];
    protected $forcedNullFields = [
        'allDay',
        'end',
        'url',
        'className',
        'editable',
        'startEditable',
        'durationEditable',
        'recourceEditable',
        'rendering',
        'overlap',
        'constraint',
        'source',
        'color',
        'backgroundColor',
        'borderColor',
        'textColor',
    ];

    public function eventType()
    {
        return $this->hasOne('App\EventType');
    }

    public function group()
    {
        return $this->belongsTo('App\Group');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function lastUpdatedBy() {
        return $this->belongsTo('App\User', 'last_updated_by');
    }

    public function users() {
        return $this->user->merge($this->lastUpdatedBy());
    }

    public function eventPage() {
        return $this->hasOne('App\EventPage');
    }

    public function images() {
        return $this->hasMany('App\Image');
    }
}
