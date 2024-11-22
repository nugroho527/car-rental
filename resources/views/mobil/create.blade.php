<div class="container-fluid pt-4 px-4">
    <div class="row g-4">
        <div class="col-sm-12 col-xl-12">
            <div class="bg-light rounded h-100 p-4">
                <h6 class="mb-4">Add Cars</h6>
                <form>
                    <div class="mb-3">
                        <label for="no_polisi" class="form-label">No Police</label>
                        <input type="text" class="form-control" wire:model="no_polisi" id="no_polisi" value="{{ @old('no_polisi') }}">
                        @error('no_polisi')
                        <div class="form-text text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="merk" class="form-label">Brand</label>
                        <input type="text" class="form-control" wire:model="merk" id="merk" value="{{ @old('merk') }}">
                        @error('merk')
                        <div class="form-text text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="jenis" class="form-label">Type Cars</label>
                        <select name="" class="form-select" wire:model="jenis">
                            <option value="">--- Choose ---</option>
                            <option value="sedan">SEDAN</option>
                            <option value="MPV">MPV</option>
                            <option value="SUV">SUV</option>
                        </select>
                        @error('jenis')
                        <div class="form-text text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="harga" class="form-label">Price</label>
                        <input type="text" class="form-control" wire:model="harga" id="harga" value="{{ @old('harga') }}">
                        @error('harga')
                        <div class="form-text text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="foto" class="form-label">Car Photo</label>
                        <input type="file" class="form-control" wire:model="foto" id="foto" value="{{ @old('foto') }}">
                        @error('foto')
                        <div class="form-text text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <button type="button" wire:click="store" class="btn btn-primary">Save</button>
                </form>
            </div>
        </div>
    </div>
</div>