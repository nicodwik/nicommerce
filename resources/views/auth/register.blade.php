@extends('layouts.auth')

@section('content')

<!-- Page Content -->
    <div class="page-content page-auth" id="register">
        <section class="store-auth" data-aos="fade-up">
        <div class="container">
            <div class="row align-items-center justify-content-center row-login" style="margin-top: 150px;">
            <div class="col-lg-4">
                <h2>Memulai untuk jual beli <br>
                dengan cara terbaru</h2>
                <form method="POST" action="{{ route('register') }}">
                    @csrf
                <div class="form-group">
                    <label for="">Full Name</label>
                    <input id="name" v-model="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                    @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="">Email</label>
                    <div class="input-group d-flex">
                        <input id="email" v-model="email" @change="checkEmail" :class="{ 'is-invalid' : this.email_unavailable }" type="email" class="form-control @error('email') is-invalid @enderror" style="width: 100%; z-index:0;" name="email" value="{{ old('email') }}" required autocomplete="email">
                        <div v-if="checking" class="ml-auto" style="z-index:1; margin-top: -35px;" >
                            <div class="spinner-border spinner-border-sm text-dark mx-2 mt-2"  role="status">
                            </div>
                        </div>
                    </div>
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="">Password</label>
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="">Password Confirmation</label>
                    <input id="password-confirm" type="password" class="form-control @error('password_confirmation') is-invalid @enderror" name="password_confirmation" required autocomplete="new-password">
                    @error('password_confirmation')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="">Store</label>
                    <p class="text-muted">Apakah anda juga ingin membuka toko?</p>
                    <div class="custom-control custom-radio custom-control-inline">
                    <input type="radio" class="custom-control-input" name="is_store_open" id="openStoreTrue" v-model="is_store_open" :value="true">
                    <label class="custom-control-label" for="openStoreTrue">Iya, Boleh</label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                    <input type="radio" class="custom-control-input" name="is_store_open" id="openStoreFalse" v-model="is_store_open" :value="false">
                    <label class="custom-control-label" for="openStoreFalse">Engga, makasih</label>
                    </div>
                </div>
                <div class="form-group" v-if="is_store_open">
                    <label for="">Nama Toko</label>
                    <input id="store_name" type="text" v-model="store_name" class="form-control @error('store_name') is-invalid @enderror" name="store_name" required autocomplete autofocus>
                    @error('store_name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group" v-if="is_store_open">
                    <label for="">Kategori</label>
                    <select name="categories_id" class="form-control">
                        <option value="" disabled>Select Category</option>
                        @foreach ($categories as $category)
                            <option value="{{$category->id}}">{{$category->name}}</option>
                        @endforeach
                    </select>
                </div>
                <button type="submit" class="btn btn-success btn-block mt-4" :disabled="this.email_unavailable">Sign Up Now</button>
                <a href="{{route('login')}}" class="btn btn-signup btn-block mt-2">Back to Sign in</a>
                </form>
            </div>
            </div>
        </div>
        </section>
    </div>

    <div class="container" style="display: none">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Register') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('register') }}">
                            @csrf

                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                                <div class="col-md-6">
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                                <div class="col-md-6">
                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Register') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('addon-script')
    <script src="/vendor/vue/vue.js"></script>
    <script src="https://unpkg.com/vue-toasted"></script>
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
    <script>
    Vue.use(Toasted)
    var register = new Vue({
        el: '#register',
        mounted() {
        AOS.init();
        },
        methods: {
            checkEmail: function() {
                var self = this;
                self.checking = true;
                axios.get('{{route('api-register-check')}}', {
                    params: {
                        email: this.email
                    }
                })
                    .then(response => {
                        if(response.data == 'Available') {
                            self.$toasted.show(
                            "Email Anda Tersedia! Silahkan lanjut ke langkah berikutnya!", {
                            position: "top-center",
                            className: "rounded",
                            duration: 1000
                            }
                        )
                        self.email_unavailable = false;
                        self.checking = false;
                        } else {
                            self.$toasted.error(
                            "Maaf, tampaknya email sudah terdaftar pada sistem kami.", {
                            position: "top-center",
                            className: "rounded",
                            duration: 1000
                            }
                        )
                        self.email_unavailable = true;
                        self.checking = false;
                        }
                    })
            }
        },
        data() {
            return {
                name: "Nico Dwi K",
                email: "",
                is_store_open: true,
                store_name: "",
                email_unavailable: false,
                checking: false
            }
        }
    })
    </script>
@endpush