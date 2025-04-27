<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Player extends Model
{
    use HasFactory;
    protected $tableName = 'players';
    protected $primaryKey = 'id';
    protected $fillable = ['team_id','player_name','player_logo','Player_role'];
}
