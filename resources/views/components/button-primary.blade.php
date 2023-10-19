<button {{ $attributes->class(['btn btn-danger text-white'])->merge(['type' => 'button']) }}>
    {{ $slot }}
</button>
