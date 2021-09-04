<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function me() {
    return ['NIS' => 3103119152,
        'Nama' => 'Rahman Sucipto',
        'Jenis Kelamin' => 'Laki-laki',
        'Telepon' => '081337995963',
        'Kelas' => 'XII RPL 5'];
  }
}
