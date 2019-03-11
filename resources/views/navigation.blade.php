<h3 class="flex items-center font-normal text-white mb-6 text-base no-underline">
    <svg class="sidebar-icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
        <path fill="var(--sidebar-icon)"d="M9.26 13a2 2 0 0 1 .01-2.01A3 3 0 0 0 9 5H5a3 3 0 0 0 0 6h.08a6.06 6.06 0 0 0 0 2H5A5 5 0 0 1 5 3h4a5 5 0 0 1 .26 10zm1.48-6a2 2 0 0 1-.01 2.01A3 3 0 0 0 11 15h4a3 3 0 0 0 0-6h-.08a6.06 6.06 0 0 0 0-2H15a5 5 0 0 1 0 10h-4a5 5 0 0 1-.26-10z"/>
    </svg>
    <span class="sidebar-label">{{ __('Links') }}</span>
</h3>
<ul class="list-reset mb-8">
    @foreach ($links as $link)
        <li class="leading-wide mb-4 text-sm">
            <a href="{{ $link['href'] }}" class="text-white ml-8 no-underline dim"
                     target="{{ $link['target'] }}">
                {{ $link['name'] }}
            </a>
        </li>
    @endforeach
</ul>