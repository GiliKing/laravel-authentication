@if(session()->has('message'))
   <div x-data="{ show: true}" x-init="setTimeout(() => show = false, 9000)" x-show="show" class="container bg-success shadow-xl mt-5 px-3 py-3">

        <p class="text-light">
            {{session('message')}}
        </p>
    </div>
@endif

