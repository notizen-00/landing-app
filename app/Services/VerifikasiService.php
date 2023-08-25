<?php 
namespace App\Services;

use App\Models\Mitra;

class VerifikasiService
{
    public function verifyMitra($mitraId)
    {
        $mitra = Mitra::find($mitraId);

        if (!$mitra) {
            return [
                'status' => false,
                'message' => 'Mitra tidak ditemukan.'
            ];
        }

        $status = $this->checkStatus($mitra->status_mitra);

        $mitra->update([
            'status_mitra' => $status,
        ]);

        $message = $this->messages($status);

        return [
            'status' => true,
            'message' => $message,
        ];
    }

    public function checkStatus($currentStatus)
    {
        return ($currentStatus == 0) ? 1 : 0;
    }

    public function messages($status)
    {
        return ($status == 1) ? 'Status Verifikasi berhasil.' : 'Status Mitra di Pending.';
    }
}
