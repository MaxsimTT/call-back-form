<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    use HasFactory;

    protected $admin;
    protected $email;

    public function __construct()
    {
        $this->admin = config('admin.name');
        $this->email = config('admin.email');
    }
}
