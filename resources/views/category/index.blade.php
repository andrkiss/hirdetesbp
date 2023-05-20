<x-app-layout>
    <ul>
        <div class="flex space-x-4">
            @foreach($kategoriak as $kategoria)
            <div class="flex items-center">
                <i class="fa fa-{{ $kategoria->ikon }}"></i>
            </div>
            @endforeach
        </div>
    </ul>
</x-app-layout>
