@extends('layouts.shop_common')
@section('title', 'MY PAGE')
@section('content')
<div class="container w-1/2 mx-auto mt-10">
    <h1 class="text-center text-2xl font-bold mb-6"><span class="text-sky-700">{{ $userName }}</span> PROFILE EDIT</h1>
    <!-- 사용자 정보 -->
    <div class="p-6 rounded-lg">
        {{-- <h2 class="text-xl text-center font-semibold mb-10">User Information</h2> --}}
        <div class="space-y-4">
            {{-- <div class="flex justify-start">
                <p>NAME: </p>
                <p class="font-bold">{{ Auth::user()->name }}</p>
            </div>
            <div class="flex justify-start">
                <p>E-MAIL: </p>
                <p class="font-bold">{{ Auth::user()->email }}</p>
            </div>
            <div class="flex justify-start">
                <p>PHONE: </p>
                <p class="font-bold">{{ Auth::user()->phone ?? 'N/A' }}</p>
            </div>
            <div class="flex justify-start">
                <p>ADDRESS: </p>
                <p class="font-bold">{{ Auth::user()->address ?? 'N/A' }}</p>
            </div> --}}
            <div class="bg-white mt-10">
                @if (Laravel\Fortify\Features::canUpdateProfileInformation())
                    @livewire('profile.update-profile-information-form')

                    <x-section-border />
                @endif

                @if (Laravel\Fortify\Features::enabled(Laravel\Fortify\Features::updatePasswords()))
                    <div class="mt-10 sm:mt-0">
                        @livewire('profile.update-password-form')
                    </div>

                    <x-section-border />
                @endif

                @if (Laravel\Fortify\Features::canManageTwoFactorAuthentication())
                    <div class="mt-10 sm:mt-0">
                        @livewire('profile.two-factor-authentication-form')
                    </div>

                    <x-section-border />
                @endif

                <div class="mt-10 sm:mt-0">
                    @livewire('profile.logout-other-browser-sessions-form')
                </div>

                @if (Laravel\Jetstream\Jetstream::hasAccountDeletionFeatures())
                    <x-section-border />

                    <div class="mt-10 sm:mt-0">
                        @livewire('profile.delete-user-form')
                    </div>
                @endif
            </div>
        </div>
    </div>
    <!-- 회원 탈퇴 버튼 -->
</div>
@endsection
