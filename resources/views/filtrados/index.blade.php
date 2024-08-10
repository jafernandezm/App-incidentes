
<x-app-layout>
@section('content')
    
    {{-- comprobar si existe resultado --}}
    {{-- hacer un input y enviar --}}
    
    <div class="flex flex-col justify-center items-center p-4 rounded-lg shadow-md space-y-2">
        <form method="POST" action="{{ route('filtrados.store') }}" class="w-full max-w-sm">
            @csrf
            <div class="flex items-center border-b border-teal-500 py-2">
            <input name="consulta" class="appearance-none bg-transparent border-none w-full text-gray-700 mr-3 py-1 px-2 leading-tight focus:outline-none" type="text" placeholder="email,domain">
            <button class="flex-shrink-0 bg-teal-500 hover:bg-teal-700 border-teal-500 hover:border-teal-700 text-sm border-4 text-white py-1 px-2 rounded">
                Enviar
            </button>
            </div>
        </form>

        
    </div>
@endsection
    
</x-app-layout>
