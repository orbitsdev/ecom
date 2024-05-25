<div>
    <form action="{{route('logout')}}" method="POST">
        @csrf
      <button type="submit" class="flex items-center gap-x-4 px-6 py-3 text-sm font-semibold leading-6 text-white hover:bg-indigo-700">
        @if (Auth::user()->profile_photo_path)
        <img class="h-8 w-8 rounded-full bg-indigo-700" src="{{Auth::user()->getUserImage()}}" alt="">
          
        @endif
        Logout
     
      </button>
    </form>
</div>
