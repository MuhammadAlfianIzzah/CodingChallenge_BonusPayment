<x-main-layout>
    <div class="">

        <div class="bg-light rounded-3">
            <div class="container py-5">
                <h1 class="display-5 fw-bold">Bonus Payment</h1>
                <p class="col-md-8 fs-4">Yuk langsung saja, hitung pembayaraan Bonus karyawan anda</p>
                <div class="alert alert-warning" role="alert">
                    DISCLAIMER : UI dari aplikasi masih kurang bagus karena keterbatasan waktu

                </div>
                <div class="alert alert-info" role="alert">
                    Untuk masuk kehalaman Bonus payment anda perlu login/register terlebih dahulu
                </div>
                <div class="alert alert-info" role="alert">
                    Admin/user = untuk mengganti role tinggal mengubah field role pada tabel user (1 untuk admin|0 untuk
                    user biasa)
                </div>
                <div class="alert alert-info" role="alert">
                    My portfolio : <a target="_blank"
                        href="https://alfianizzahaja.my.id/">https://alfianizzahaja.my.id/</a>
                </div>
                <a href="{{ route('show-bonus') }}" class="btn btn-primary btn-lg">Klik disini</a>
            </div>
        </div>
    </div>

</x-main-layout>
