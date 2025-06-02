<?php

if (!function_exists('getBackUrlFrom')) {
    function getBackUrlFrom() {
        $from = request()->query('from', 'ekios');
        $backUrl = url('ekios'); // default

        switch ($from) {
            case 'px-personal':
                $backUrl = url('px-personal');
                break;
            case 'px-personal-lama':
                $backUrl = url('px-personal-lama');
                break;
            case 'px-bpjs':
                $backUrl = url('px-bpjs');
                break;
            case 'px-bpjs-lama':
                $backUrl = url('px-bpjs-lama');
                break;
            case 'pilih-norujukan':
                $backUrl = url('pilih-norujukan');
                break;
            case 'input-norm-tgllahir':
                $backUrl = url('input-norm-tgllahir');
                break;
            case 'pilih-poli-dokter':
                $backUrl = url('pilih-poli-dokter');
                break;
            case 'konfirmasidata':
                $backUrl = url('konfirmasidata');
                break;
            case 'px-checkin':
                $backUrl = url('px-checkin');
                break;
        }

        return $backUrl;
    }
}
