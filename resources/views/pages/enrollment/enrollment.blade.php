@extends('layouts.dashboard_compenent');

@section('bodyContent')

<a href="#modal-add" class="px-4 py-2 font-bold text-white bg-green-700 rounded hover:bg-blue-700">
    Add enrollment
</a>

<div id="modal-add" class="fixed inset-0 z-50 flex items-center justify-center invisible transition-all duration-300 bg-gray-900 bg-opacity-50 opacity-0 target:opacity-100 target:visible">

    <div class="relative w-full max-w-md p-6 mx-auto transition-all duration-300 transform scale-95 bg-white rounded-lg shadow-xl target:scale-100">

        <div class="flex items-center justify-between pb-2 mb-4 border-b">
            <h3 class="text-xl font-semibold">Add New enrollment</h3>
            <a href="#" class="text-gray-400 transition-colors hover:text-gray-600">
                <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </a>
        </div>

  <form method="POST" action="{{route('Storeenrollment')}}" class="space-y-4">
            @csrf
            <div>
                <label for="student-select" class="block text-sm font-medium text-gray-700">Students</label>
                <select name="student_id" id="student-select" class="block w-full p-2 mt-1 border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm">
                    <option value="">Select a student</option>
                    @foreach ($Students as $student)
                        <option value="{{$student->student_id}}">
                            {{$student->first_name}} {{$student->last_name}}
                        </option>
                    @endforeach
                </select>
            </div>
            <div>
                <label for="course-select" class="block text-sm font-medium text-gray-700">Courses</label>
                <select name="course_id" id="course-select" class="block w-full p-2 mt-1 border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm">
                    <option value="">Select a course</option>
                    @foreach ($Courses as $course)
                        <option value="{{$course->course_id}}">
                            {{$course->course_name}}
                        </option>
                    @endforeach
                </select>
            </div>

            <input type="date" name="enrollment_date" id="">
            <div class="mt-6 text-right">
                <button type="submit" class="inline-flex justify-center px-4 py-2 text-sm font-medium text-white bg-blue-600 border border-transparent rounded-md shadow-sm hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                    Add Enrollment
                </button>
            </div>
        </form>

    </div>

</div>


<div class="flex flex-col overflow-x-hidden">
    <div class="sm:-mx-6 lg:-mx-8">
        <div class="inline-block min-w-full py-2 sm:px-6 lg:px-8">
            <div class="overflow-hidden">
                <table class="min-w-full text-sm font-light text-left text-surface dark:text-white">
                    <thead class="font-medium border-b border-neutral-200 dark:border-white/10">
                        <tr>
                            <th scope="col" class="px-6 py-4">Enrollment ID</th>
                            <th scope="col" class="px-6 py-4">Student Name</th>
                            <th scope="col" class="px-6 py-4">Course Name</th>
                            <th scope="col" class="px-6 py-4">Enrollment Date</th>
                            <th scope="col" class="px-6 py-4">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($Authenrollment as $enrollment)
                            <tr class="border-b border-neutral-200 dark:border-white/10">
                                <td class="px-6 py-4 font-medium whitespace-nowrap">{{ $enrollment->enroll_id }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">{{ $enrollment->student->first_name }} {{ $enrollment->student->last_name }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">{{ $enrollment->course->course_name }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">{{ $enrollment->enrollment_date }}</td>
                                <td>
                                    <a href="#modal-{{$enrollment->enroll_id}}" class="px-4 py-2 font-bold text-white rounded bg-sky-500 me-2 hover:bg-blue-700">
                                        UPDATE
                                    </a>

                                    <div id="modal-{{$enrollment->enroll_id}}" class="fixed inset-0 z-50 flex items-center justify-center invisible transition-all duration-300 bg-gray-900 bg-opacity-50 opacity-0 target:opacity-100 target:visible">

                                        <div class="relative w-full max-w-md p-6 mx-auto transition-all duration-300 transform scale-95 bg-white rounded-lg shadow-xl target:scale-100">

                                            <div class="flex items-center justify-between pb-2 mb-4 border-b">
                                                <h3 class="text-xl font-semibold">Update Enrollment</h3>
                                                <a href="#" class="text-gray-400 transition-colors hover:text-gray-600">
                                                    <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                                                    </svg>
                                                </a>
                                            </div>

                                            <form method="POST" action="{{route('Updateenrollment', $enrollment->enroll_id)}}" class="space-y-4">
                                                @csrf
                                                @method('PUT')
                                                 <div>
                <label for="student-select" class="block text-sm font-medium text-gray-700">Students</label>
                <select name="student_id" id="student-select" class="block w-full p-2 mt-1 border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm">
                    <option value="">Select a student</option>
                    @foreach ($Students as $student)
                        <option value="{{$student->student_id}}">
                            {{$student->first_name}} {{$student->last_name}}
                        </option>
                    @endforeach
                </select>
            </div>
            <div>
                <label for="course-select" class="block text-sm font-medium text-gray-700">Courses</label>
                <select name="course_id" id="course-select" class="block w-full p-2 mt-1 border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm">
                    <option value="">Select a course</option>
                    @foreach ($Courses as $course)
                        <option value="{{$course->course_id}}">
                            {{$course->course_name}}
                        </option>
                    @endforeach
                </select>
            </div>

            <input type="date" name="enrollment_date" id="">

                                                <div class="mt-6 text-right">
                                                    <button type="submit" class="inline-flex justify-center px-4 py-2 text-sm font-medium text-white bg-blue-600 border border-transparent rounded-md shadow-sm hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                                                        Save Changes
                                                    </button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>

                                    <form class="inline-block" method="post" action="{{route('deletenrollment', $enrollment->enroll_id)}}">
                                        @csrf
                                        @method('DELETE') 
                                        <button
                                            type="submit"
                                            class="inline-block rounded bg-red-600 px-6 pb-2 pt-2.5 text-xs font-medium uppercase leading-normal text-white shadow-red-300 transition duration-150 ease-in-out hover:bg-red-700 hover:shadow-red-200 focus:bg-red-700 focus:shadow-red-200 focus:outline-none focus:ring-0 active:bg-red-800 active:shadow-red-200 motion-reduce:transition-none">
                                            Delete
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@endsection







               