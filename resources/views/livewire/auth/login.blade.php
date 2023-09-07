@section('page-title')
    Login
@endsection
<div>
    <section class="vh-100">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                <div class="card shadow-2-strong" style="border-radius: 1rem;">
                <div class="card-body p-5">

                    <h3 class="mb-5 text-center">Surat Izin App</h3>
                    <form wire:submit.prevent='loginAction'>
                        <div class="form-outline mb-4">
                            <label class="form-label" for="username">Username</label>
                            <input type="text" id="username" value="{{old('username')}}" class="form-control form-control-lg card-hover" wire:model.live='username'>
                            <div>@error('username') <span class="text-danger"> {{ $message }}</span> @enderror</div>
                        </div>

                        <div class="form-outline mb-4">
                            <label class="form-label" for="password">Password</label>
                            <input type="password" id="password" wire:model.live='password' class="form-control form-control-lg card-hover" />
                            <div>@error('password') <span class="text-danger"> {{ $message }}</span> @enderror</div>

                        </div>

                        <!-- Checkbox -->
                        <div class="form-check d-flex justify-content-start mb-4">
                            <input class="form-check-input" type="checkbox" value="" id="form1Example3" onclick="myFunction()" />
                            <label class="form-check-label" for="form1Example3"> Show password </label>
                        </div>

                        <button class="btn btn-primary btn-lg btn-block form-control card-hover" type="submit">Login</button>
                    </form>
                    <hr class="my-4">

                    <div class="d-flex justify-content-center">
                        <span class="">Belum punya akun? <a href="/register">Daftar</a></span>

                    </div>

                </div>
                </div>
            </div>
            </div>
        </div>
    </section>
</div>

<script>
    function myFunction() {
        var x = document.getElementById("password");
        var y = document.getElementById("form1Example3");
        if (x.type === "password") {
            x.type = "text";
        } else {
            x.type = "password";
            
        }
    }
</script>
