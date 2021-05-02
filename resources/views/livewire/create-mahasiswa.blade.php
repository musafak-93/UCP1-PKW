<x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        Dashboard
    </h2>
</x-slot>
<div class="py-12">
    <div>
    </div>
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg px-4 py-4">
            @if (session()->has('message'))
            <div class="bg-teal-100 border-t-4 border-teal-500 rounded-b text-teal-900 px-4 py-3 shadow-md my-3" role="alert">
                <div class="flex">
                    <div>
                        <p class="text-sm">{{ session('message') }}</p>
                    </div>
                </div>
            </div>
            @endif
            <button wire:click="createMahasiswa()" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded my-3">Tambah Mahasiswa</button>
            @if($isOpen)
            @include('livewire.mahasiswa')
            @endif
            <br>
            <table class="table-fixed w-full">
                <thead>
                    <tr class="bg-gray-100">
                        <!-- <th class="px-4 py-2 w-20">No.</th> -->
                        <th class="px-4 py-2">NAMA MAHASISWA</th>
                        <th class="px-4 py-2">NIM</th>
                        <th class="px-4 py-2">ALAMAT</th>
                        <th class="px-4 py-2">ACTION</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($mahasiswas as $mahasiswa)
                    <tr>
                        <!-- <td class="border px-4 py-2">{{ $mahasiswa->id }}</td> -->
                        <td class="border px-4 py-2">{{ $mahasiswa->nama }}</td>
                        <td class="border px-4 py-2">{{ $mahasiswa->nim }}</td>
                        <td class="border px-4 py-2">{{ $mahasiswa->alamat }}</td>
                        <td class="border px-4 py-2">
                            <button wire:click="editMahasiswa({{ $mahasiswa->id }})" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Edit</button>
                            <button wire:click="deleteMahasiswa({{ $mahasiswa->id }})" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">Delete</button>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
<!-- <div>
    {{-- If your happiness depends on money, you will never be happy with yourself. --}}
</div> -->