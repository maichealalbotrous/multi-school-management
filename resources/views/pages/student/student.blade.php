@extends('layouts.dashboard_compenent');

@section('bodyContent')

  <a href="#modal" class=" py-2 #font-bold text-white bg-green-700 rounded px-4 hover:bg-blue-700">
Add Student
</a>

  <div id="modal" class="fixed inset-0 z-50 flex items-center justify-center invisible transition-all duration-300 bg-gray-900 bg-opacity-50 opacity-0 target:opacity-100 target:visible">

    <div class="relative w-full max-w-md p-6 mx-auto transition-all duration-300 transform scale-95 bg-white rounded-lg shadow-xl target:scale-100">

      <div class="flex items-center justify-between pb-2 mb-4 border-b">
        <h3 class="text-xl font-semibold">Add New Student</h3>
        <a href="#" class="text-gray-400 transition-colors hover:text-gray-600">
          <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
          </svg>
        </a>
      </div>
                <form method="POST" action="{{route('StoreStudent')}}" class="space-y-4">
        @csrf
        <div>
          <label for="input1" class="block text-sm font-medium text-gray-700">First-Name</label>
          <input name="first_name" type="text" id="input1" class="block w-full p-2 mt-1 border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm">
        </div>
        <div>
          <label for="input2" class="block text-sm font-medium text-gray-700">Last-Name</label>
          <input name="last_name" type="text" id="input2" class="block w-full p-2 mt-1 border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm">
        </div>
        <div>
          <label for="input3" class="block text-sm font-medium text-gray-700">grade </label>
          <input  name="grade" type="text" id="input3" class="block w-full p-2 mt-1 border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm">
        </div>

         <div class="mt-6 text-right">
        <button type="submit" href="#" class="inline-flex justify-center px-4 py-2 text-sm font-medium text-white bg-blue-600 border border-transparent rounded-md shadow-sm hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
          Save Change
        </button>
      </div>

      </form>

     
    </div>
  </div>

          <div class="flex flex-col overflow-x-hidden ">

  <div class=" sm:-mx-6 lg:-mx-8">
    <div class="inline-block min-w-full py-2 sm:px-6 lg:px-8">
      <div class="overflow-hidden">
        <table
          class="min-w-full text-sm font-light text-left text-surface dark:text-white">
          <thead
            class="font-medium border-b border-neutral-200 dark:border-white/10">
            <tr>
              <th scope="col" class="px-6 py-4">#</th>
              <th scope="col" class="px-6 py-4">First-Name</th>
              <th scope="col" class="px-6 py-4">Last-Name</th>
              <th scope="col" class="px-6 py-4">grade</th>
              <th scope="col" class="px-6 py-4">Action</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($AuthStudent as $SingelStudent)
          
            <tr class="border-b border-neutral-200 dark:border-white/10">
              <td class="px-6 py-4 font-medium whitespace-nowrap">{{$SingelStudent->student_id}}</td>
              <td class="px-6 py-4 whitespace-nowrap">{{$SingelStudent->first_name}}</td>
              <td class="px-6 py-4 whitespace-nowrap">{{$SingelStudent->last_name}}</td>
              <td class="px-6 py-4 whitespace-nowrap">{{$SingelStudent->grade}}</td>
              <td>   

                          
{{-- Line 88 (Error line) --}}
<a href="#modal-{{$SingelStudent->student_id}}" class="px-4 py-2 font-bold text-white rounded bg-sky-500 me-2 hover:bg-blue-700">
  UPDATE
</a>


<div id="modal-{{$SingelStudent->student_id}}" class="fixed inset-0 z-50 flex items-center justify-center invisible transition-all duration-300 bg-gray-900 bg-opacity-50 opacity-0 target:opacity-100 target:visible">

    <div class="relative w-full max-w-md p-6 mx-auto transition-all duration-300 transform scale-95 bg-white rounded-lg shadow-xl target:scale-100">

      <div class="flex items-center justify-between pb-2 mb-4 border-b">
        <h3 class="text-xl font-semibold">Update Student</h3>
        <a href="#" class="text-gray-400 transition-colors hover:text-gray-600">
          <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
          </svg>
        </a>
      </div>

      
            {{-- Corrected form action route --}}
            <form method="POST" action="{{route('UpdateStudent',$SingelStudent->student_id)}}" class="space-y-4">
        @csrf
        @method('PUT')
        <div>
          <label for="input1" class="block text-sm font-medium text-gray-700">First-Name</label>
          <input name="first_name" type="text" id="input1" class="block w-full p-2 mt-1 border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm">
        </div>
        <div>
          <label for="input2" class="block text-sm font-medium text-gray-700">Last-Name</label>
          <input name="last_name" type="text" id="input2" class="block w-full p-2 mt-1 border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm">
        </div>
        <div>
          <label for="input3" class="block text-sm font-medium text-gray-700">grade </label>
          <input name="grade" type="text" id="input3" class="block w-full p-2 mt-1 border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm">
        </div>

         <div class="mt-6 text-right">
        <button type="submit" href="#" class="inline-flex justify-center px-4 py-2 text-sm font-medium text-white bg-blue-600 border border-transparent rounded-md shadow-sm hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
          Save Change
        </button>
      </div>

      </form>

     
    </div>
  </div>
                              {{-- Corrected form action route --}}
                    <form class="inline-block" method="post" action="{{route('deletStudent',$SingelStudent->student_id)}}">
                      @csrf
                      @method('DELETE')  
                      <button
                    type="submit"
                    class="inline-block rounded bg-danger px-6 pb-2 pt-2.5 text-xs font-medium uppercase leading-normal text-white shadow-danger-3 transition duration-150 ease-in-out hover:bg-danger-accent-300 hover:shadow-danger-2 focus:bg-danger-accent-300 focus:shadow-danger-2 focus:outline-none focus:ring-0 active:bg-danger-600 active:shadow-danger-2 motion-reduce:transition-none dark:shadow-black/30 dark:hover:shadow-dark-strong dark:focus:shadow-dark-strong dark:active:shadow-dark-strong">
                    Delet
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