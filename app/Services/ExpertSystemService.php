<?php

namespace App\Services;

class ExpertSystemService
{
    public function evaluateLoanApplication($age, $slik, $vehicleYear, $salary, $residenceType, $employmentStatus)
    {
        // Aturan R01
        if ($age < 21) {
            return ['status' => 0, 'message' => 'Pengajuan Ditolak: Usia Anda belum mencukupi (kurang dari 21 tahun).'];
        }

        // Aturan R02
        if ($age >= 21 && $slik === 'buruk') {
            return ['status' => 0, 'message' => 'Pengajuan Ditolak: Reputasi kredit Anda tidak baik (SLIK buruk).'];
        }

        // Aturan R03
        if ($age >= 21 && $slik === 'baik' && $vehicleYear === 'tinggi' && $salary < 5000000) {
            return ['status' => 0, 'message' => 'Pengajuan Ditolak: Gaji Anda tidak mencukupi (kurang dari Rp 5.000.000).'];
        }

        // Aturan R04
        if ($age >= 21 && $slik === 'baik' && $vehicleYear === 'tinggi' && $salary >= 5000000 && $residenceType === 'tetap' && $employmentStatus === 'tetap') {
            return ['status' => 1, 'message' => 'Pengajuan Anda diterima.'];
        }

        // Aturan R05
        if ($age >= 21 && $slik === 'baik' && $vehicleYear === 'tinggi' && $salary >= 5000000 && $residenceType === 'tetap' && ($employmentStatus !== 'tetap' || $employmentStatus === 'kurang dari setahun')) {
            return ['status' => 0, 'message' => 'Pengajuan Ditolak: Status pekerjaan Anda belum stabil (pekerjaan kurang dari setahun atau belum tetap).'];
        }

        // Aturan R06
        if ($age >= 21 && $slik === 'baik' && $vehicleYear === 'tinggi' && $salary >= 5000000 && $residenceType === 'ngontrak/kost' && $employmentStatus === 'lebih dari setahun') {
            return ['status' => 0, 'message' => 'Pengajuan Ditolak: Anda tinggal di tempat ngontrak/kost lebih dari setahun.'];
        }

        // Aturan R07
        if ($age >= 21 && $slik === 'baik' && $vehicleYear === 'tinggi' && $salary >= 5000000 && $residenceType === 'ngontrak/kost' && $employmentStatus === 'kurang dari setahun') {
            return ['status' => 0, 'message' => 'Pengajuan Ditolak: Anda tinggal di tempat ngontrak/kost kurang dari setahun.'];
        }

        // Aturan R08
        if ($age >= 21 && $slik === 'baik' && $vehicleYear === 'rendah' && $salary >= 5000000 && $residenceType === 'tetap') {
            return ['status' => 1, 'message' => 'Pengajuan Anda diterima.'];
        }

        // Aturan R09
        if ($age >= 21 && $slik === 'baik' && $vehicleYear === 'rendah' && $salary >= 5000000 && $residenceType === 'kost/kontrak' && $employmentStatus === 'lebih dari setahun') {
            return ['status' => 1, 'message' => 'Pengajuan Anda diterima.'];
        }

        // Aturan R10
        if ($age >= 21 && $slik === 'baik' && $vehicleYear === 'rendah' && $salary >= 5000000 && $residenceType === 'ngontrak/kost' && $employmentStatus === 'tetap') {
            return ['status' => 1, 'message' => 'Pengajuan Anda diterima.'];
        }

        // Aturan R11
        if ($age >= 21 && $slik === 'baik' && $vehicleYear === 'rendah' && $salary >= 5000000 && $residenceType === 'ngontrak/kost' && ($employmentStatus !== 'tetap' || $employmentStatus === 'kurang dari setahun')) {
            return ['status' => 0, 'message' => 'Pengajuan Ditolak: Status pekerjaan Anda belum stabil (pekerjaan kurang dari setahun atau belum tetap).'];
        }

        // Aturan R12
        if ($age >= 21 && $slik === 'baik' && $vehicleYear === 'rendah' && $salary < 5000000 && $residenceType === 'tetap') {
            return ['status' => 1, 'message' => 'Pengajuan Anda diterima.'];
        }

        // Aturan R13
        if ($age >= 21 && $slik === 'baik' && $vehicleYear === 'rendah' && $salary < 5000000 && $residenceType === 'kost/kontrak' && $employmentStatus === 'lebih dari setahun') {
            return ['status' => 1, 'message' => 'Pengajuan Anda diterima.'];
        }

        // Aturan R14
        if ($age >= 21 && $slik === 'baik' && $vehicleYear === 'rendah' && $salary < 5000000 && $residenceType === 'ngontrak/kost' && $employmentStatus === 'tetap') {
            return ['status' => 1, 'message' => 'Pengajuan Anda diterima.'];
        }

        // Aturan R15
        if ($age >= 21 && $slik === 'baik' && $vehicleYear === 'rendah' && $salary < 5000000 && $residenceType === 'ngontrak/kost' && ($employmentStatus !== 'tetap' || $employmentStatus === 'kurang dari setahun')) {
            return ['status' => 0, 'message' => 'Pengajuan Ditolak: Status pekerjaan Anda belum stabil (pekerjaan kurang dari setahun atau belum tetap).'];
        }

        return ['status' => 0, 'message' => 'Pengajuan Ditolak: Kondisi tidak memenuhi aturan yang berlaku.'];
    }
}
