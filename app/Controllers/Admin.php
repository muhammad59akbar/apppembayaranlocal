<?php

namespace App\Controllers;

use Myth\Auth\Models\GroupModel;
use Myth\Auth\Models\UserModel;
use Myth\Auth\Password;

class Admin extends BaseController
{
    protected $MemberModels;
    protected $GroupModels;

    public function __construct()
    {
        $this->MemberModels = new UserModel();
        $this->GroupModels = new GroupModel();
    }
    public function index(): string
    {
        $data = [
            'title' => 'Data Member Jaringanku',
            'all_member' => $this->MemberModels->getMembersWithRoles()
        ];
        return view('Member/DataUser', $data);
    }

    public function TambahUser()
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
            'role' => 'required'


        ];
        if (!$this->validate($validasiform)) {

            return redirect()->to('/billing/Admin/DataUser')->withInput()->with('errors', $this->validator->getErrors());
        }

        $data = [
            'email' => $this->request->getPost('email'),
            'username' => $this->request->getPost('username'),
            'nama_lengkap' => $this->request->getPost('namalengkap'),
            'active' => 1,
            'password_hash' => Password::hash($this->request->getVar('password'))
        ];

        $memberID = $this->MemberModels->insert($data);

        if ($memberID) {
            $role = $this->request->getPost('role');
            $this->GroupModels->addUserToGroup($memberID, $role);
            return redirect()->back()->with('message', 'Data berhasil ditambahkan !!!');
        } else {
            return redirect()->back()->with('message', 'Gagal menambahkan Member.');
        }
    }


    public function detailMember($url)
    {
        $data = [
            'title' => 'Detail Member - ' . $this->MemberModels->GetUserbyURL($url)['nama_lengkap'],
            'user' => $this->MemberModels->GetUserbyURL($url),
            'roles' => $this->GroupModels->select('id, name')->findAll()

        ];
        return view('Member/DetailMember', $data);
    }

    public function updateMember($id_member)
    {
        $validasiform = [
            'email' => [
                'rules' => 'required|is_unique[users.email, id,' . $id_member . ']',
                'errors' => [
                    'required' => '{field} Wajib diisi',
                    'is_unique' => '{field} Sudah Ada !!!',
                ]
            ],
            'username' => [
                'rules' => 'required|min_length[5]|max_length[30]|regex_match[/^[a-zA-Z0-9\s]+$/]|is_unique[users.username, id,' . $id_member . ']',
                'errors' => [
                    'is_unique' => '{field} already registered.'
                ]
            ],
            'password' => 'permit_empty|min_length[5]',

            'namalengkap' => [
                'rules' => 'required|min_length[3]|max_length[100]|regex_match[/^[a-zA-Z0-9\s]+$/]|',
                'errors' => [
                    'required' => 'Nama Wajib diisi',
                    'min_length' => 'Nama Minimal 3 Karakter',
                    'regex_match' => 'Nama Harap Diisi Dengan Benar !!!'
                ]
            ],
            'role' => 'required'


        ];

        if (!$this->validate($validasiform)) {

            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $namalengkap = $this->request->getPost('namalengkap');
        $url = str_replace(' ', '-', $namalengkap);

        $password = $this->request->getPost('password');
        $checkpassword = $this->MemberModels->find($id_member);

        if (!empty($password)) {
            $newpassword = Password::hash($password, PASSWORD_BCRYPT);
        } else {
            $newpassword = $checkpassword->password_hash;
        }

        $data = [
            'id' => $id_member,
            'email' => $this->request->getPost('email'),
            'username' => $this->request->getPost('username'),
            'nama_lengkap' =>  $namalengkap,
            'password_hash' => $newpassword
        ];

        $this->MemberModels->save($data);
        $role = $this->request->getPost('role');
        $this->GroupModels->updateUserGroup($id_member, $role);
        \Config\Services::cache()->clean();
        return redirect()->to('billing/Admin/detailMember/' . $url)->with('message', 'Data pengguna berhasil diubah!');
    }

    public function DeleteMember($id_member)
    {
        $member = $this->MemberModels->find($id_member);
        if ($member) {
            $role = $this->GroupModels->getGroupsForUser($id_member);
            foreach ($role as $r) {
                $this->GroupModels->removeUserFromGroup($id_member, $r['group_id']);
            }
        }

        $this->MemberModels->delete($id_member, true);
        return redirect()->to('/billing/Admin/DataUser')->with('message', 'Data pengguna berhasil diHapus !!!');
    }
}
