<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-200 ">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12 bg-gray-900">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-xl dark:bg-gray-800 sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">

               
                    <div class="grid grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-4">

                        {{-- ------------------------Student Card------------------------------------ --}}
                        <div class="block text-center text-white bg-gray-900 shadow-lg bgrounded-lg dark:bg-gray-700 dark:text-white">
                            <div class="px-6 py-3 border-b-2 border-neutral-100 dark:border-gray-600">
                                <h2 class="text-xl font-semibold">Student</h2>
                            </div>
                            <div class="p-6">
                                <h5 class="mb-2 text-3xl font-bold leading-tight">
                                    {{$AuthStudent}}
                                </h5>
                                <p class="mb-4 text-base text-gray-600 dark:text-gray-300">
                                    Total Student In Your School
                                </p>
                                <a
                                    href="{{ route('showStudent') }}"
                                    class="inline-block rounded bg-indigo-600 px-6 pb-2 pt-2.5 text-xs font-medium uppercase leading-normal text-white shadow-md transition duration-150 ease-in-out hover:bg-indigo-700 focus:bg-indigo-700 active:bg-indigo-800"
                                    data-twe-ripple-init
                                    data-twe-ripple-color="light">
                                    Show All Student data
                                </a>
                            </div>
                        </div>

                        {{-- ------------------------Teacher Card------------------------------------ --}}
                        <div class="block text-center text-white bg-gray-900 rounded-lg shadow-lg dark:bg-gray-700 dark:text-white">
                            <div class="px-6 py-3 border-b-2 border-neutral-100 dark:border-gray-600">
                                <h2 class="text-xl font-semibold">Teacher</h2>
                            </div>
                            <div class="p-6">
                                <h5 class="mb-2 text-3xl font-bold leading-tight">
                                    {{$AuthTeacher}}
                                </h5>
                                <p class="mb-4 text-base text-gray-600 dark:text-gray-300">
                                    Total Teacher In Your School
                                </p>
                                <a
                                    href="{{ route('teachers') }}"
                                    class="inline-block rounded bg-indigo-600 px-6 pb-2 pt-2.5 text-xs font-medium uppercase leading-normal text-white shadow-md transition duration-150 ease-in-out hover:bg-indigo-700 focus:bg-indigo-700 active:bg-indigo-800"
                                    data-twe-ripple-init
                                    data-twe-ripple-color="light">
                                    Show All Teacher data
                                </a>
                            </div>
                        </div>

                        {{-- ------------------------Enrollment Card------------------------------------ --}}
                        <div class="block text-center text-white bg-gray-900 rounded-lg shadow-lg dark:bg-gray-700 dark:text-white">
                            <div class="px-6 py-3 border-b-2 border-neutral-100 dark:border-gray-600">
                                <h2 class="text-xl font-semibold">Enrollment</h2>
                            </div>
                            <div class="p-6">
                                <h5 class="mb-2 text-3xl font-bold leading-tight">
                                    {{$AuthEnrollment}}
                                </h5>
                                <p class="mb-4 text-base text-gray-600 dark:text-gray-300">
                                    Total Enrollment In Your School
                                </p>
                                <a
                                    href="{{ route('showenrollment') }}"
                                    class="inline-block rounded bg-indigo-600 px-6 pb-2 pt-2.5 text-xs font-medium uppercase leading-normal text-white shadow-md transition duration-150 ease-in-out hover:bg-indigo-700 focus:bg-indigo-700 active:bg-indigo-800"
                                    data-twe-ripple-init
                                    data-twe-ripple-color="light">
                                    Show All Enrollment data
                                </a>
                            </div>
                        </div>

                        {{-- ------------------------Courses Card------------------------------------ --}}
                        <div class="block text-center text-white bg-gray-900 rounded-lg shadow-lg dark:bg-gray-700 dark:text-white">
                            <div class="px-6 py-3 border-b-2 border-neutral-100 dark:border-gray-600">
                                <h2 class="text-xl font-semibold">Courses</h2>
                            </div>
                            <div class="p-6">
                                <h5 class="mb-2 text-3xl font-bold leading-tight">
                                    {{$Authcourse}}
                                </h5>
                                <p class="mb-4 text-base text-gray-600 dark:text-gray-300">
                                    Total Courses In Your School
                                </p>
                                <a
                                    href="{{ route('showCourse') }}"
                                    class="inline-block rounded bg-indigo-600 px-6 pb-2 pt-2.5 text-xs font-medium uppercase leading-normal text-white shadow-md transition duration-150 ease-in-out hover:bg-indigo-700 focus:bg-indigo-700 active:bg-indigo-800"
                                    data-twe-ripple-init
                                    data-twe-ripple-color="light">
                                    Show All Courses data
                                </a>
                            </div>
                        </div>

                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>