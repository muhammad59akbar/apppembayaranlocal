<?php

namespace App\Controllers;

class Pembayaran extends BaseController
{
    public function index(): string
    {
        $data = [
            'title' => 'Dashboard Jaringanku',

        ];
        return view('Member/Dashboard', $data);
    }
}
