@extends('layout.master')

@section('title', 'Pertanyaan')

@section('content')


    <section class="info my-5">
      <div class="container">
        <div class="row">
          <div class="col-12">
            <h1>Selamat Datang</h1>
            <hr>
          </div>
          <div class="col-lg-12">
            <div class="d-flex mb-3 justify-content-between align-items-center">
              <h3>Pertanyaan</h3>
              <a type="button" class="btn btn-primary text-white" data-toggle="modal" data-target="#exampleModal">+ Tambah Pertanyaan</a>
            </div>
            {{-- Alert --}}
            @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif
            @if ($pertanyaan->isEmpty())
                <div class="p-3 d-flex flex-column justify-content-center align-items-center" style="height: 250px;">
                  <p class="text-muted mb-1">Maaf, Saat ini sedang tidak ada pertanyaan.</p>
                </div>
            @else
                @foreach ($pertanyaan as $item)
                  <div class="card mb-3">
                    <div class="card-body">
                      <div class="d-flex justify-content-between align-items-center">
                        <h5 class="card-title">{{ $item->judul }}</h5>
                        <a href="/jawaban/{{ $item->id }}" class="btn btn-outline-info btn-sm">Info</a>
                      </div>
                      <p class="card-text">{{ $item->isi }}</p>
                      <p class="card-text text-info"><a href="{{ route('jawaban.index', $item->id) }}">{{ $item->jawaban->count() }} respon</a></p>
                      <p class="card-text"><small class="text-muted">{{ $item->created_at->diffForHumans() }}</small></p>
                    </div>
                  </div>
                @endforeach
            @endif
          </div>
        </div>
      </div>
    </section>


    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Pertanyaan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="/pertanyaan/create" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="exampleInputEmail1">Judul Pertanyaan</label>
                        <input name="judul" type="text" class="form-control @error('judul') is-invalid @enderror" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Masukkan Judul Pertanyaan Anda" value="{{old('judul')}}" required>
                        @error('judul')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Isi Pertanyaan</label>
                        <input name="isi" type="text" class="form-control @error('isi') is-invalid @enderror" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Masukkan Isi Pertanyaan" value="{{ old('isi') }}">
                        @error('isi')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    
                    
                
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Kembali</button>
                    <button type="submit" class="btn btn-primary">Tambah</button>
                </div>
            </form>
        </div>
    </div>
@endsection