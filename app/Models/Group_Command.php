<?php

namespace Webcraft\Models;

use Webcraft\Models\User;
use Illuminate\Database\Eloquent\Model;

class Group_Command extends Model
{
    protected $table = 'group_commands';

    protected $fillable = [
    	'type',
    	'command'
    ];

    public function group()
    {
    	return $this->belongsTo('Webcraft\Models\Group')->first();
    }

    public function replaceCommand(User $user)
    {
    	return str_replace(['@p', '@g'], [$user->username, str_slug($this->group()->title, ' ')], $this->command);
    }
}