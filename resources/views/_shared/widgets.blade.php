@if($todayBirthdays->count())
    <div class="block shadow rounded-lg p-10 bg-blue-500 relative">
        <div class="absolute left-5 top-5 z-0 pointer-events-none select-none text-9xl text-blue-600/50">
            <i class="fas fa-birthday-cake"></i>
        </div>
        <div class="relative z-10 space-y-[2rem]">
            <div class="space-y-2 filter drop-shadow-lg">
                <div class="block text-center text-5xl text-white flex justify-center items-center space-x-2">
                    <div class="text-4xl font-bold ">{{ $todayBirthdays->count() }}</div>
                </div>
                <div class="block text-sm text-white font-bold uppercase tracking-widest text-center">
                    <div>birthdays</div>
                    <div>today</div>
                </div>
            </div>
            <div class="space-y-2">
                <div class="relative w-full overflow-auto" data-scrollbar='{"autoHide": "never"}'>
                    <div class="flex gap-1">
                        @foreach($todayBirthdays as $user)
                            <a href="{{ route('users.show', $user->id) }}">
                               <x-hito::UserAvatar size="2rem" :user="$user" border="md"/>
                            </a>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endif
@if($monthBirthdays->count())
    <div class="block shadow rounded-lg p-10 bg-blue-500 relative">
        <div class="absolute left-5 top-5 z-0 pointer-events-none select-none text-9xl text-blue-600/50">
            <i class="fas fa-birthday-cake"></i>
        </div>
        <div class="relative z-10 space-y-[2rem]">
            <div class="space-y-2 filter drop-shadow-lg">
                <div class="block text-center text-5xl text-white flex justify-center items-center space-x-2">
                    <div class="text-4xl font-bold ">{{ $monthBirthdays->count() }}</div>
                </div>
                <div class="block text-sm text-white font-bold uppercase tracking-widest text-center">
                    <div>birthdays</div>
                    <div>this month</div>
                </div>
            </div>
            <div class="space-y-2">
                <div class="relative w-full overflow-auto" data-scrollbar='{"autoHide": "never"}'>
                    <div class="flex space-x-1">
                        @foreach($monthBirthdays as $user)
                            <a href="{{ route('users.show', $user->id) }}">
                               <x-hito::UserAvatar size="2rem" :user="$user" border="md"/>
                            </a>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endif
