@props(['item'])

@php($isDisabled = $item['type'] === 'external' && $item['url'] === '#')

@if ($isDisabled)
    <div aria-disabled="true" class="flex h-full cursor-not-allowed flex-col rounded-xl border border-gray-100 bg-gray-50 p-6 shadow-sm">
@else
    <a
        href="{{ $item['type'] === 'internal' ? route($item['route']) : $item['url'] }}"
        @if ($item['type'] === 'external') target="_blank" rel="noopener noreferrer" @endif
        class="group flex h-full flex-col rounded-xl border border-gray-100 bg-white p-6 shadow-sm transition duration-200 hover:-translate-y-0.5 hover:border-transparent hover:bg-primary hover:shadow-md focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-primary focus-visible:ring-offset-2"
    >
@endif
    <div class="flex items-start justify-between gap-4">
        <span class="inline-flex h-12 w-12 shrink-0 items-center justify-center rounded-xl bg-secondary text-primary">
            <svg viewBox="0 0 24 24" class="h-6 w-6" fill="none" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                @switch ($item['icon'])
                    @case('regulasi')
                        <path d="M6 3.75h8l4 4v12.5H6z" />
                        <path d="M14 3.75v4h4M9 12h6M9 15.5h6M9 8.5h2" />
                        @break
                    @case('rup')
                        <rect x="5" y="4.5" width="15" height="16" rx="2" />
                        <path d="M9 4.5v-1h7v1M9 10h7M9 13.5h7M9 17h4" />
                        @break
                    @case('lpse')
                        <rect x="3.5" y="4" width="17" height="12" rx="1.5" />
                        <path d="M8 20h8M12 16v4M8.5 9.5h7M12 7v5M10 10l2 2 2-2" />
                        @break
                    @case('daftar')
                        <path d="m5 7 1.5 1.5L9 6M11 7h8M5 13l1.5 1.5L9 12M11 13h8M5 19l1.5 1.5L9 18M11 19h8" />
                        @break
                    @case('dokumen')
                        <path d="M3.5 7.5h7l2 2h8v9a2 2 0 0 1-2 2h-13a2 2 0 0 1-2-2z" />
                        <path d="M3.5 7.5v-2a2 2 0 0 1 2-2H10l2 2h5a2 2 0 0 1 2 2v2" />
                        @break
                    @case('grafik')
                        <path d="M11.5 3.5v8h8A8 8 0 1 1 11.5 3.5Z" />
                        <path d="M15.5 3.5a8 8 0 0 1 4 4h-4z" />
                        @break
                @endswitch
            </svg>
        </span>
        @if ($item['type'] === 'external' && !$isDisabled)
            <svg viewBox="0 0 24 24" class="mt-1 h-5 w-5 shrink-0 text-primary transition-colors duration-200 group-hover:text-white" fill="none" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                <path d="M14 4h6v6M20 4l-9 9" />
                <path d="M18 13v5a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h5" />
            </svg>
        @endif
    </div>
    <h2 class="mt-5 break-words text-lg font-semibold leading-snug text-gray-900 transition-colors duration-200 group-hover:text-white">
        {{ $item['title'] }}
    </h2>
    <p class="mt-2 text-sm leading-relaxed text-gray-600 transition-colors duration-200 group-hover:text-white/90">
        {{ $item['description'] }}
    </p>
    @if ($isDisabled)
        <span class="mt-4 text-xs font-medium text-gray-500">Segera tersedia</span>
    @endif
@if ($isDisabled)
    </div>
@else
    </a>
@endif
