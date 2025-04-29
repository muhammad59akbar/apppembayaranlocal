<?php

namespace App\Models;

use CodeIgniter\Model;

class CustomerModels extends Model
{
    protected $table      = 'inetcustomer';
    protected $primaryKey = 'id_pelanggan';
    protected $allowedFields = ['id_us', 'id_paket', 'no_pelanggan', 'alamat_cust', 'foto_lokasi', 'n_teknisi1', 'n_teknisi2', 'no_telp_cust', 'status'];
    protected $useTimestamps = true;


    public function getCust($url_pel = false)
    {
        $userId = user_id();
        $queryget = $this->select('inetcustomer.*, paketsinternet.*, member.username, member.nama_lengkap as nama_member, member.email,  teknisi1.nama_lengkap as teknisi')
            ->join('paketsinternet', 'paketsinternet.id_paket = inetcustomer.id_paket', 'left')
            ->join('users as member', 'member.id = inetcustomer.id_us', 'left')
            ->join('users as teknisi1', 'teknisi1.id = inetcustomer.n_teknisi', 'left');

        if (in_groups(['Direktur', 'Admin'])) {
        } else {
            $queryget
                ->where('inetcustomer.n_teknisi', $userId);
        }
        if ($url_pel) {
            $no_pel = $queryget->where(['inetcustomer.no_pelanggan' => $url_pel])->first();
            if (!$no_pel) {
                throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound("Member dengan $url_pel tidak ditemukan.");
            }
            return $no_pel;
        }
        return $queryget->get()->getResultArray();
    }
}
