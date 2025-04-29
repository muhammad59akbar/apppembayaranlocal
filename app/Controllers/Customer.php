<?php

namespace App\Controllers;

use App\Models\CustomerModels;
use App\Models\PaketsModels;
use Myth\Auth\Models\GroupModel;
use Myth\Auth\Models\UserModel;
use Myth\Auth\Password;

class Customer extends BaseController
{
    protected $paketModels;
    protected $MemberModels;
    protected $GroupModels;
    protected $CustomerModels;

    public function __construct()
    {
        $this->paketModels = new PaketsModels();
        $this->MemberModels = new UserModel();
        $this->GroupModels = new GroupModel();
        $this->CustomerModels = new CustomerModels();
    }
    public function index(): string
    {
        $data = [
            'title' => 'List Customer',
            'paketInternet' => $this->paketModels->findAll(),
            'memberku' => $this->CustomerModels->getCust()
        ];
        return view('Member/DataCustomer', $data);
    }


    public function suratJalan($url_pel)
    {
        $data = [
            'title' => 'Surat Jalan',
            'memberku' => $this->CustomerModels->getCust($url_pel)
        ];
        return view('Member/SuratInstalasi', $data);
    }

    public function tambahCustomer()
    {
        $validasiform = [
            'email' => [
                'rules' => 'required|is_unique[users.email]',
                'errors' => [
                    'required' => '{field} Wajib diisi',
                    'is_unique' => '{field} Sudah Ada !!!',
                ]
            ],
            'username' => [
                'rules' => 'required|min_length[5]|max_length[30]|regex_match[/^[a-zA-Z0-9\s]+$/]|is_unique[users.username]',
                'errors' => [
                    'is_unique' => '{field} already registered.'
                ]
            ],
            'notelp' => [
                'rules' => 'required|max_length[15]|numeric',
                'errors' => [
                    'required' => 'No Telp Wajib Diisi',
                    'numeric' => 'No Telp hanya di awali 08'
                ]
            ],

            'password' => 'required',
            'confpass' => 'required|matches[password]',
            'namalengkap' => [
                'rules' => 'required|min_length[3]|max_length[100]|regex_match[/^[a-zA-Z0-9\s]+$/]|',
                'errors' => [
                    'required' => 'Nama Wajib diisi',
                    'min_length' => 'Nama Minimal 3 Karakter',
                    'regex_match' => 'Nama Harap Diisi Dengan Benar !!!'
                ]
            ],
            'alamat' => 'required',
            'paket' => 'required'
        ];

        if (!$this->validate($validasiform)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $dataCust = [
            'email' => $this->request->getPost('email'),
            'username' => $this->request->getPost('username'),
            'nama_lengkap' => $this->request->getPost('namalengkap'),
            'active' => 1,
            'password_hash' => Password::hash($this->request->getVar('password'))
        ];
        $customerID = $this->MemberModels->insert($dataCust);

        if ($customerID) {
            $role = $this->request->getPost('role');
            $this->GroupModels->addUserToGroup($customerID, $role);

            $nokode = '000';

            $no_pelanggan = $nokode . str_pad($customerID, 7, '0', STR_PAD_LEFT);

            $dataCust = [
                'no_telp_cust' => $this->request->getPost('notelp'),
                'alamat_cust' => $this->request->getPost('alamat'),
                'id_paket' => $this->request->getPost('paket'),
                'status' => 'Pemasangan',
                'id_us' => $customerID,
                'no_pelanggan' => $no_pelanggan

            ];
            $this->CustomerModels->save($dataCust);
            return redirect()->back()->with('message', 'Data berhasil ditambahkan !!!');
        }
    }
}
