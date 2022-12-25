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
                    <h2>Edit link Information</h2>
                    <form action="{{url('/dashboard/links/'. $link->id )}} " method="post">
                        @csrf
                        <div class="mb-3">
                          <label for="name" class="form-label">Link Name</label>
                          <input type="text" class="form-control {{ $errors->first('name') ? 'invalid-feedback1' : ' '  }} " id="name" name="name" value="{{ $link->name }}" aria-describedby="emailHelp">


                        </div>
                        @if($errors->first('name'))
                        <div id="invalid-feedback1" class="invalid-feedback1">
                            <p class="text-danger"> {{ $errors->first('name')  }}</p>
                        </div>
                        @endif
                        <div class="mb-3">
                            <label for="link" class="form-label">Link URL</label>
                            <input type="text" class="form-control {{ $errors->first('link') ? 'invalid-feedback2' : ' '  }} " id="link" name="link" placeholder="Social media profile link" value="{{ $link->link }}" aria-describedby="emailHelp">

                          </div>
                          @if($errors->first('link'))
                          <div id="invalid-feedback2" class="invalid-feedback2">
                            <p class="text-danger"> {{ $errors->first('link')  }}</p>
                          </div>
                          @endif

                        <button type="submit" class="btn btn-primary">Update Link</button>
                        <button type="button" class="btn btn-secondary" onclick="event.preventDefault();document.getElementById('delete-form').submit();">Delete Link</button>
                      </form>
                      <form id="delete-form" action="{{url('/dashboard/links/'. $link->id )}}" method="post">
                        @csrf
                        @method('DELETE')
                      </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

