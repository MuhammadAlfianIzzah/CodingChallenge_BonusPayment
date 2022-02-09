<x-main-layout>
    <div class="container mt-4">
        <div class="row">
            <div class="col d-flex align-items-end">
                <h2>Payment {{ $payment->id }}</h2>

                <form method="POST" action="{{ route('delete-bonus', $payment->id) }}">
                    @method("delete")
                    @csrf
                    <button onclick="return confirm('Apakah anda yakin menghapus?');" type="submit"
                        class="badge bg-danger d-inline ms-2"><i class="fas fa-trash"></i></button>
                </form>

            </div>

        </div>
    </div>
    <div class="container mt-3">
        <form action="{{ route('update-bonus', $payment->id) }}" method="POST">
            @method("patch")
            @csrf
            <div class="row disini">
                <div class="col-9">
                    <div class="form-floating mb-3">
                        <input type="number" name="total" placeholder="Pembayaran" class="form-control"
                            id="floatingInput" value="{{ $payment->total }}">
                        <label for="floatingInput">Pembayaran</label>
                    </div>
                </div>
                @forelse ($payment->pembagianBuruh  as $key => $py)


                    <div class="row row-cols-4  my-2">
                        <div class="col-9">
                            <div class="row">
                                <div class="col">
                                    <input type="number" placeholder="masukan pembagian persen buruh"
                                        class="form-control" id="buruh" name="buruh[]"
                                        value="{{ $py->persentasi }}">
                                </div>
                                <div class="col-1">
                                    %
                                </div>
                            </div>


                        </div>
                        <div class=" col">
                            <button type="button" class="btn btn-danger w-100 minus">-</button>
                        </div>
                    </div>
                @empty


                @endforelse

                <div class="row row-cols-1  my-2 last-input">

                    <div class="col">
                        <button type="button" class="btn btn-dark w-100 add">+</button>
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-warning">Update</button>
        </form>

    </div>
</x-main-layout>
