<button
    {{ $attributes->class(['btn'])->style(['background-color : #D80032; color: #fff'])->merge(['type' => 'button']) }}>
    {{ $slot }}
</button>
