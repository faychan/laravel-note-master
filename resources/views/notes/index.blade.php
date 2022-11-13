<x-app-layout>
    <style type="text/css">
        li{
            list-style: none;
            background: #e2e2e2;
            margin-left: 5px;
            text-align: center;
            border-radius:5px;
        }
        li span{
            font-size: 20px;
        }
        ul li{
            display: inline-block;
            padding: 10px 10px 5px;
        }
        #social-links{
            float: left;
        }
    </style>
     {{-- <div class="card-body">
        <strong class="float-left pt-2">Social Media : </strong>
        {!! $socialShare !!}
    </div> --}}
    
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ request()->routeIs('notes.index') ?  __('Notes') : __('Trash') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <x-alert-success>
                {{ session('success') }}
            </x-alert-success>
            @if (request()->routeIs('notes.index'))
                <a href="{{ route('notes.create') }}" class="btn-link btn-lg mb-2">+ New Note</a>  
            @endif  
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    @if (count($priority))
                        <h2 class="text-xl font-bold">Priority Notes</h2>
                        <div class="mb-6 pb-6">
                            @forelse ($priority as $note)
                                <div class="my-6 p-6 bg-white border-b border-gray-200 shadow-sm sm:rounded-lg flex items-center justify-between">
                                    <div class="">
                                        <h2 class="font-bold text-2xl">                      
                                            <a  
                                                @if (request()->routeIs('notes.index'))
                                                    href="{{ route('notes.show', $note) }}"
                                                @else
                                                    href="{{ route('trashed.show', $note) }}"
                                                @endif
                                                >{{ $note->title }}</a>
                                        </h2>
                                        <p class="mt-2">
                                            {{ Str::limit($note->text, 200) }}
                                        </p>
                                        <span class="block mt-4 text-sm opacity-70">{{ $note->updated_at->diffForHumans() }}</span>
                                    </div>
        
                                    <button class="p-2 btn text-xs bg-cyan-900 capitalize " value="{{ $note->uuid }}" onclick="copyLink(this)">Share</button>
        
                                </div>
                                @empty
                                @if (request()->routeIs('notes.index'))
                                @else
                                    <p>No items in trash.</p>
                                @endif
                            @endforelse
                        </div>
                    @endif

                    @if (count($notes))
                        <h2 class="text-xl font-bold">My Notes</h2>
                        @forelse ($notes as $note)
                            <div class="my-6 p-6 bg-white border-b border-gray-200 shadow-sm sm:rounded-lg flex items-center justify-between">
                                <div class="">
                                    <h2 class="font-bold text-2xl">                      
                                        <a  
                                            @if (request()->routeIs('notes.index'))
                                                href="{{ route('notes.show', $note) }}"
                                            @else
                                                href="{{ route('trashed.show', $note) }}"
                                            @endif
                                            >{{ $note->title }}</a>
                                    </h2>
                                    <p class="mt-2">
                                        {{ Str::limit($note->text, 200) }}
                                    </p>
                                    <span class="block mt-4 text-sm opacity-70">{{ $note->updated_at->diffForHumans() }}</span>
                                </div>
    
                                <button class="p-2 btn text-xs bg-cyan-900 capitalize " value="{{ $note->uuid }}" onclick="copyLink(this)">Share</button>
    
                            </div>
                            @empty
                            @if (request()->routeIs('notes.index'))
                                <p>You have no notes yet.</p>
                            @else
                                <p>No items in trash.</p>
                            @endif
                        @endforelse
                    @endif

                    {{ $notes->links() }}
                </div>
            </div>
        </div>
    </div>

    <script>
        const copyLink = (e) => {
            e.classList.remove('bg-cyan-900')
            e.classList.add('text-slate-400')
            let link = 'http://localhost:8000/notes/view/'
            navigator.clipboard.writeText(link + e.value)
            setTimeout(() => {
                e.classList.remove('text-slate-400')
                e.classList.add('bg-cyan-900')
            }, 1000);
        }

    </script>
</x-app-layout>
