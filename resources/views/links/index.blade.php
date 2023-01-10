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
                  <h2>  Your links </h2>
                    <table class="table">
                        <thead>
                          <tr>
                            <th scope="col">Name</th>
                            <th scope="col">Url</th>
                            <th scope="col">Visits</th>
                            <th scope="col">Last Visit</th>
                            <th scope="col">Actions</th>
                          </tr>
                        </thead>
                        <tbody>
                          @foreach ($links as $link)


                          <tr>
                            <td>{{$link->name}}</td>
                            <td> <a href="{{$link->link}}">{{$link->link}} </a> </td>
                            <td>{{$link->visits_count}}</td>
                            @php

                              // pull out latest_visit from links visits relationship
                            //  $latest_visit =$link->visits()->latest();
                             //   dd($link);
                            @endphp
                            <td>{{$link->latest_visit ? $link->latest_visit->created_at->format('M j Y -H:ia') : 'N/A'}}</td>
                            <td> <a href="{{url('/dashboard/links/'. $link->id )}}"> Edit </a></td>
                          </tr>
                          @endforeach


                        </tbody>
                      </table>
                      <a href="{{route('create')}}" class="btn btn-primary">Add Link </a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
