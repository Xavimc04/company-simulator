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
        class="flex-1 flex-col lg:flex-row mt-10 flex gap-10 justify-between"
    >
        {{-- @ Fixed announcements --}}
        <div class="w-full lg:w-[500px] flex flex-col gap-5">
            @foreach ($this->fixed_announcements as $announce)
                <div class="flex gap-2 flex flex-col bg-{{ $this->getLevelColor($announce->level) }}-100 border border-{{ $this->getLevelColor($announce->level) }}-500 p-5 rounded-md pb-5">
                    @if ($announce->user)
                        <section class="flex items-center gap-3">
                            @if ($announce->user['profile_url'])
                                <img class="w-[20px] rounded-full h-[20px]" src="{{ asset('storage/profile-pictures/' . $announce->user['profile_url']) }}" />
                            @endif

                            <span class="text-sm flex-1">
                                {{ $announce->user['name'] }}

                                <small class="text-gray-500">
                                    , {{ $announce->created_at->diffForHumans() }}
                                </small>
                            </span>

                            <span class="material-symbols-outlined text-sm text-{{ $this->getLevelColor($announce->level) }}-500">
                                push_pin
                            </span>
                        </section>
                    @endif

                    <p class="font-bold mt-2 flex gap-3 items-center">  
                        {{ $announce->title }}
                    </p>

                    <small class="text-gray-500 mt-2">
                        {{ $announce->content }}
                    </small> 
                </div>
            @endforeach
        </div>

        {{-- @ Last announcements --}}
        <div class="flex-1 flex flex-col gap-5">
            @foreach ($this->last_announcements as $announce)
                <div class="flex gap-2 flex flex-col border-b pb-5">
                    @if ($announce->user)
                        <section class="flex items-center gap-3">
                            @if ($announce->user['profile_url'])
                                <img class="w-[20px] rounded-full h-[20px]" src="{{ asset('storage/profile-pictures/' . $announce->user['profile_url']) }}" />
                            @endif

                            <span class="text-sm">
                                {{ $announce->user['name'] }}

                                <small class="text-gray-500">
                                    , {{ $announce->created_at->diffForHumans() }}
                                </small>
                            </span>
                        </section>
                    @endif

                    <p class="font-bold mt-2 flex gap-3 items-center">  
                        {{ $announce->title }}

                        @if($announce['level'] == 0) 
                            <span class="text-gray-500 text-xs uppercase border border-gray-500 bg-gray-100 px-3 py-1 rounded-md">{{ $levels[$announce['level']] }}</span>
                        @elseif($announce['level'] == 1)
                            <span class="text-orange-500 border text-xs uppercase border-orange-500 bg-orange-100 px-3 py-1 rounded-md">{{ $levels[$announce['level']] }}</span>
                        @elseif($announce['level'] == 2)
                            <span class="text-red-500 border text-xs uppercase border-red-500 bg-red-100 px-3 py-1 rounded-md">{{ $levels[$announce['level']] }}</span>
                        @endif
                    </p>

                    <small class="text-gray-500 mt-2">
                        {{ $announce->content }}
                    </small> 
                </div>
            @endforeach

            <div class="mt-5">
                {{ $this->last_announcements->links() }}
            </div>
        </div>
    </section>
</main>