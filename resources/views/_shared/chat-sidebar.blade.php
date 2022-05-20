<div class="space-y-4">
    <div>
        <div class="uppercase font-bold text-sm p-4">Users</div>
        <div>
            @foreach($users as $user)
                <div class="chatnav__item chatnav__item--offline" data-id="{{ $user->id }}">
                    <div class="flex items-center justify-between space-x-2">
                        <div>
                            <x-hito::UserAvatar size="2rem" :user="$user"/>
                        </div>
                        <div class="text-sm">{{ $user->full_name }}</div>
                    </div>
                    <div>
                        <div class="chatnav__item-presence"></div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    @if(!empty($teams) && $teams->count())
    <div>
        <div class="uppercase font-bold text-sm p-4">Teams</div>
        <div>
            @foreach($teams as $team)
                <div class="chatnav__item">
                    <div class="flex items-center justify-between space-x-2">
                        <div>
                            <div class="rounded-full overflow-hidden w-[30px] h-[30px] flex justify-center items-center bg-blue-500 text-white">
                                <span class="uppercase font-bold">{{ implode('', $team->initials) }}</span>
                            </div>
                        </div>
                        <div class="text-sm">{{ $team->name }}</div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    @endif
</div>
