<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-rose-50 ">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
  @yield('bodyContent')

</x-app-layout>

