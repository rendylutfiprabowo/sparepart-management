{{-- INI TOMBOL UTAMA BISA UNTUK DIPAKAI BERULANG-ULANG, 
    DARI PADA BUAT CODINGAN TERUS MENERUS YANG MEMBUAT CODE SEMAKIN BANYAK --}}

{{-- PENGGUNAAN --}}
{{-- <x-primary-button > TEXT </x-primary-button> --}}

<button {{ $attributes->class(['btn btn-danger text-white'])->merge(['type' => 'button']) }}>
    {{ $slot }}
</button>
