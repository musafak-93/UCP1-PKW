<?php

namespace App\Http\Livewire;
use App\Models\Mahasiswa;
use Livewire\Component;

class CreateMahasiswa extends Component
{
    public $mahasiswas, $mahasiswa_id, $nama, $nim, $alamat;
    public $isOpen = 0;


    public function render()
    {
        $this->mahasiswas = Mahasiswa::all();
        return view('livewire.create-mahasiswa');
    }

    public function openModal()
    {
        $this->isOpen = true;
    }

    public function closeModal()
    {
        $this->isOpen = false;
    }

    private function resetInputFields(){
        $this->nama = '';
        $this->nim = '';
        $this->alamat = '';
        $this->mahasiswa_id = '';
    }

    public function store()
    {
        $this->validate([
            'nama' => 'required',
            'nim' => 'required',
            'alamat' => 'required',
        ]);
   
        Mahasiswa::updateOrCreate(['id' => $this->mahasiswa_id], [
            'nama' => $this->nama,
            'nim' => $this->nim,
            'alamat' => $this->alamat
        ]);
  
        session()->flash('message', 
            $this->mahasiswa_id ? 'Data Mahasiswa Berhasil di Update' : 'Data Mahasiswa Berhasil di Buat');
  
        $this->closeModal();
        $this->resetInputFields();
    }

    public function createMahasiswa(){
        $this->resetInputFields();
        $this->openModal();
    }

    // public function createMahasiswa()
    // {
    //     Mahasiswa::create([
    //         'nama' => $this->nama,
    //         'nim' => $this->nim,
    //         'alamat' => $this->alamat
    //     ]);

    //     $this->nama = "";
    //     $this->nim = "";
    //     $this->alamat = "";
    // }

    public function editMahasiswa($id){
        $mahasiswa = Mahasiswa::findOrFail($id);
        $this->mahasiswa_id = $id;
        $this->nama = $mahasiswa->nama;
        $this->nim = $mahasiswa->nim;
        $this->alamat = $mahasiswa->alamat;

        $this->openModal();

    }

    public function deleteMahasiswa($id)
    {
        Mahasiswa::find($id)->delete();
        session()->flash('message', ' Data Mahasiswa Berhasil Dihapus!!!');
    }
}
