<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">

                    @if (Auth::check() && auth()->user())
                    {{-- @php
                        $user = new App\Models\User();
                        dd(auth()->user()->getReferrals())
                    @endphp --}}
                    {{-- {{ dd(auth()->user()->getReferrals()) }} --}}

                        @if (!empty(auth()->user()->getReferrals()))
                            @forelse(auth()->user()->getReferrals() as $referral)
                                <h4>
                                    {{ $referral->program->name }}
                                </h4>
                                <code>
                                    {{ $referral->link }}
                                </code>
                                <p>
                                    Number of referred users: {{ $referral->relationships()->count() }}
                                </p>
                            @empty
                                No referrals
                            @endforelse
                        @endif

                    @endif

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
