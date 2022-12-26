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
                    <h2>Editing User Settings</h2>
                    <form action="{{route('updatesettings')}} " method="post">
                        @csrf
                        <div class="mb-3">
                          <label for="background_color" class="form-label">Background Color</label>
                          <input type="text" class="form-control {{ $errors->first('background_color') ? 'invalid-feedback1' : ' '  }} " id="background_color" name="background_color" value="{{ $user->background_color }}">


                        </div>
                        @if($errors->first('background_color'))
                        <div id="invalid-feedback1" class="invalid-feedback1">
                            <p class="text-danger"> {{ $errors->first('background_color')  }}</p>
                        </div>
                        @endif
                        <div class="mb-3">
                            <label for="text_color" class="form-label">Text Color</label>
                            <input type="text" class="form-control {{ $user->first('text_color') ? 'invalid-feedback2' : ' '  }} " id="text_color" name="text_color"  value="{{ $user->text_color }}" >

                          </div>
                          @if($errors->first('text_color'))
                          <div id="invalid-feedback2" class="invalid-feedback2">
                            <p class="text-danger"> {{ $errors->first('text_color')  }}</p>
                          </div>
                          @endif

                        <button type="submit" class="btn btn-primary {{session('success') ? 'is-valid' : ' '}}">Update Settings</button>
                         @if(session('success'))
                         <div class="valid-feedback">
                            {{session('success')}}
                         </div>
                         @endif
                      </form>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>

