<div class="container-fluid pt-4 px-4">
    <div class="row g-4">
<div class="col-sm-12 col-xl-12">
    <div class="bg-light rounded h-100 p-4">
        <h6 class="mb-4">Add Mobil</h6>
        <form>
            <div class="mb-3">
                <label for="nopolisi" class="form-label">Nomor Polisi</label>
                <input type="text" class="form-control" wire:model="nopolisi" id="nopolisi"
                    value="{{ @old('nopolisi') }}">
                    @error('nopolisi')
                    <div class="form-text text-danger">{{ $message}}
                    </div> 
                    @enderror  
            </div>
            <div class="mb-3">
                <label for="merk" class="form-label">Merk</label>
                <input type="text" class="form-control" wire:model="merk" id="merk" 
                value="{{ @old('merk') }}">
                @error('merk')
                        <div class="form-text text-danger">{{ $message}}
                        </div> 
                    @enderror 
            </div>
            <div class="mb-3">
                <label for="jenis" class="form-label">Jenis Mobil</label>
                <select name="" class="form-select" wire:model="jenis">
                    <option value="">--pilih--</option>
                    <option value="sedan">Sedan</option>
                    <option value="MPV">MPV</option>
                    <option value="SUV">SUV</option>
                </select>
                @error('jenis')
                        <div class="form-text text-danger">{{ $message}}
                        </div> 
                    @enderror 
            </div>
            <div class="mb-3">
                <label for="harga" class="form-label">Harga</label>
                <input type="text" class="form-control" wire:model="harga" id="harga" 
                value="{{ @old('harga') }}">
                @error('harga')
                        <div class="form-text text-danger">{{ $message}}
                        </div> 
                    @enderror 
            </div>
            <button type="button" wire:click="update()" class="btn btn-primary">Simpan</button>
        </form>
    </div>
</div>
</div>
</div>