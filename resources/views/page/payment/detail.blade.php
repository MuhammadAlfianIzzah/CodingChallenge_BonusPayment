<x-main-layout>
    <div class="container">

        <h1 class="display-5 fw-bold mt-2">Payment {{ $payment->id }}</h1>
        <div class="col-lg-6">
            <li class="list-group-item">
                Total pembayaran Rp. {{ number_format($payment->total) }}
            </li>
            <ul class="list-group mt-3">
                @foreach ($payment->pembagianBuruh as $key => $pb)
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        Buruh {{ $pb->no_buruh }} ({{ $pb->persentasi }}%)
                        <span class="badge bg-primary rounded-pill">
                            Rp. {{ number_format($pb->bonus, 0) }}</span>
                    </li>
                @endforeach
                <li class="list-group-item">
                    <span class="badge m-0 bg-primary">Dibuat</span> pada {{ $payment->created_at->diffForHumans() }}
                    <span class="ms-3 badge m-0 bg-primary">Update
                        terakhir
                    </span>

                    {{ $payment->updated_at->diffForHumans() }}
                </li>
            </ul>
            <li class="list-group-item text-info">
                Dibuat {{ $payment->user->name }}
            </li>
        </div>
        <div class="row">
            <div class="col-6 d-flex justify-content-center">
                <div class="btn-group mt-4 text-center" role="group" aria-label="Basic example">
                    <form method="POST" action="{{ route('delete-bonus', ['id' => $payment->id]) }}">
                        @csrf
                        @method("delete")
                        <button type="submit" onclick="return confirm('Apakah anda yakin menghapus?');"
                            class="btn btn-danger">Delete</button>
                    </form>

                    <a href="{{ route('edit-bonus', $payment->id) }}" class="btn btn-primary">Edit</a>
                </div>
            </div>
        </div>
    </div>
</x-main-layout>
