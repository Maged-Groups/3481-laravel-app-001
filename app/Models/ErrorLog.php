<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Attributes\Fillable;

#[Fillable(['message', 'file', 'line', 'class', 'previous', 'trace', 'method', 'url', 'ip', 'user_agent', 'user_id', 'user_name', 'user_email'])]
class ErrorLog extends Model
{
    /** @use HasFactory<\Database\Factories\ErrorLogFactory> */
    use HasFactory;
}
