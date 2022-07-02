<a {{ $attributes->merge(['class' => 'inline-flex items-center px-2 py-1 bg-gray-300 border border-transparent rounded-md font-semibold text-xs text-gray-600 uppercase tracking-widest hover:bg-gray-400 active:bg-gray-400 focus:outline-none focus:border-gray-400 focus:ring focus:ring-gray-300 disabled:opacity-25 transition']) }}>
    {{ $slot }}
</a>