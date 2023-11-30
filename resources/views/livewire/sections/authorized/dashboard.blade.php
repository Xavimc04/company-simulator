<main x-data="{ page: '{{ $default_page }}' }">
    {{-- @ Navigation --}} 
    <section class="flex items-center gap-2 overflow-x-scroll"> 
        @foreach ($pages as $page)
            <button 
                x-on:click="page = '{{ $page }}'" 
                :class="{ 'bg-blue-500 text-white': page === '{{ $page }}', 'bg-gray-100': page !== '{{ $page }}' }"
                class="transition-all px-5 py-2 rounded text-ellipsis truncate min-w-[150px]"
            >{{ $page }}</button>
        @endforeach
    </section>

    {{-- @ Content --}}
    <section 
        x-show="page === 'Comunicados'" 
        x-transition
        class="flex-1 mt-10 flex flex-col gap-5 justify-between"
    >
        @foreach ($this->announcements as $announce)
            <div class="flex gap-7 items-center">
                <span class="material-symbols-outlined">campaign</span>

                <div class="flex-1">
                    <h1 class="text-md font-bold">{{ $announce->title }}</h1>
                    <p class="text-sm mt-1">{{ $announce->content }}</p>
                </div>
            </div>
        @endforeach

        <div class="mt-5">
            {{ $this->announcements->links() }}
        </div>
    </section>
</main>