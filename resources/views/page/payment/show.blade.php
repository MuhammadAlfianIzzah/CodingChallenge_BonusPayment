<x-main-layout>
    <x-slot name="title">Payment Bonus</x-slot>
    <div class="container">

        <h1 class="display-5 fw-bold mt-2">Pembayaran <div class="text-primary d-inline">BONUS</div>
        </h1>
        <!-- Button trigger modal -->
        <div class="w-100 mt-3">
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                <i class="fas fa-square-root-alt"></i> Hitung Pembayaran Bonus
            </button>
        </div>


        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Pembayaran Bonus</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="" method="POST">
                            @csrf
                            <div class="row disini">
                                <div class="col-9">
                                    <div class="form-floating mb-3">
                                        <input type="number" name="total" placeholder="Pembayaran"
                                            class="form-control" id="floatingInput" required>
                                        <label for="floatingInput">Pembayaran</label>
                                    </div>
                                </div>

                                <div class="row row-cols-4  my-2">
                                    <div class="col-9">
                                        <div class="row">
                                            <div class="col">
                                                <input type="number" placeholder="masukan pembagian persen buruh"
                                                    class="form-control" id="buruh" name="buruh[]" required>
                                            </div>
                                            <div class="col-1">
                                                %
                                            </div>
                                        </div>


                                    </div>
                                    <div class="col">
                                        <button type="button" class="btn btn-danger w-100 minus">-</button>
                                    </div>
                                </div>

                                <div class="row row-cols-4  my-2">
                                    <div class="col-9">
                                        <div class="row">
                                            <div class="col">
                                                <input type="number" placeholder="masukan pembagian persen buruh"
                                                    class="form-control" id="buruh" name="buruh[]" required>
                                            </div>
                                            <div class="col-1">
                                                %
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <button type="button" class="btn btn-danger w-100 minus">-</button>
                                    </div>
                                </div>
                                <div class="row row-cols-4  my-2 last-input">
                                    <div class="col-9">
                                        <div class="row">
                                            <div class="col">
                                                <input type="number" placeholder="masukan pembagian persen buruh"
                                                    class="form-control" id="buruh" name="buruh[]" required>
                                            </div>
                                            <div class="col-1">
                                                %
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <button type="button" class="btn btn-primary w-100 add">+</button>
                                    </div>
                                </div>


                            </div>

                    </div>
                    <div class="modal-footer">

                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary formajax">Simpan</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-4">
            @forelse ($payment as $py)
                <div class="col-lg-4">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Payment {{ $py->id }}</h5>
                            <ul class="list-group mt-3">
                                @foreach ($py->pembagianBuruh as $key => $pb)
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                        Buruh {{ $pb->no_buruh }} ({{ $pb->persentasi }}%)
                                        <span class="badge bg-primary rounded-pill">
                                            Rp. {{ number_format($pb->bonus, 0) }}</span>
                                    </li>
                                @endforeach
                            </ul>
                            <div class="text-center mt-3">
                                Total pembayaran : {{ number_format($py->total, 0) }}
                            </div>
                            <div class="row mt-3">

                                <div class="btn-group" role="group" aria-label="Basic example">
                                    @if (Auth::user()->role == 1)
                                        <form method="POST" action="{{ route('delete-bonus', ['id' => $py->id]) }}">
                                            @csrf
                                            @method("delete")
                                            <button type="submit" class="btn btn-danger"
                                                onclick="return confirm('Apakah anda yakin menghapus?');"><i
                                                    class="fas fa-trash"></i></button>
                                        </form>
                                    @endif
                                    <a href="{{ route('detail-bonus', $py->id) }}" class="btn btn-dark"><i
                                            class="fas fa-eye"></i></a>
                                    <a href="{{ route('edit-bonus', $py->id) }}" class="btn btn-primary"><i
                                            class="fas fa-edit"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <div class="alert alert-primary" role="alert">
                    Data masih kosong
                </div>
            @endforelse
        </div>
    </div>

</x-main-layout>
