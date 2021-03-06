@extends('layouts.app_administrator')
@section('content')
<div class="container-fluid">
  <div class="row">
    @include('navbar.navbar_administrator')

    @include('sidebar.sidebar_administrator') 
  </div>
</div>
<div class="isi-konten">
    <div class="row">
      @foreach($kehilangans as $k)
      <h3>KEHILANGAN
          <a href="{{ route('pengolahan.kehilangan.cetak',  $id_proses) }}" data-toggle="tooltip" data-placement="left" title="cetak laporan" target="_blank" class="pull-right"><span class="glyphicon glyphicon-print" ></span></a>
      </h3>

      <br>
      <div class="col-md-6">
        <div class="datapemilik">
          <h4>Data Pemilik <a href="{{ url('userpemilik/'.$k->username) }}" class="pull-right">Detail</a></h4>
          <hr>
          <form class="form-horizontal">
            <div class="form-group">
              <label class="col-sm-2 control-label">Nama</label>
              <div class="col-sm-10">
                <p class="form-control-static">{{ $k->nama }}</p>
              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-2 control-label">Jenis kelamin</label>
              <div class="col-sm-10">
                @if($k->jenis_kelamin == 'L')
                  <p class="form-control-static">Laki-laki</p>
                @else
                  <p class="form-control-static">Perempuan</p>
                @endif
              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-2 control-label">Umur</label>
              <div class="col-sm-10">
                <p class="form-control-static">{{ $umur }} tahun</p>
              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-2 control-label">Alamat</label>
              <div class="col-sm-10">
                <p class="form-control-static">{{ $k->alamat }}</p>
              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-2 control-label">Nomor hp</label>
              <div class="col-sm-10">
                <p class="form-control-static">{{ $k->no_hp }}
                @if($k->whatsapp == 1)
                   <img src="{{ url('images/icon/icon_whatsapp.png') }}" class="gambaricon" data-toggle="tooltip" data-placement="right" title="dapat di hubungi lewat whatsapp">
                @endif
                </p>
              </div>
            </div>
          </form>
        </div>
      </div>
      <div class="col-md-6">
        <div class="datapemilik">
          <h4>Data Kejadian
          <a href="{{route('pengolahan.kehilangan.editkejadian', [$id_proses, $k->id_kejadian]) }}" class="pull-right">edit</a>
          </h4>
          <hr>
          <form class="form-horizontal">
            <div class="form-group">
              <label class="col-sm-2 control-label">hari</label>
              <div class="col-sm-10">
                <p class="form-control-static">{{ $k->hari }}</p>
              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-2 control-label">tanggal</label>
              <div class="col-sm-10">
                <p class="form-control-static">{{ $k->tanggal }}</p>
              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-2 control-label">waktu</label>
              <div class="col-sm-10">
                <p class="form-control-static">{{ $k->waktu }}</p>
              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-2 control-label">lokasi</label>
              <div class="col-sm-10">
                <p class="form-control-static">{{ $k->lokasi }}</p>
              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-2 control-label">keterangan</label>
              <div class="col-sm-10">
                <p class="form-control-static">{{ $k->keterangan }}</p>
              </div>
            </div>
          </form>
        </div>
      </div>
      @endforeach
    </div>
      
    <div class="row">
    <div class="datapemilik">
      <h4>Data Barang <a href="{{ route('pengolahan.kehilangan.tambah_barang', $id_proses) }}" class="pull-right">Tambah</a></h4>
      <hr>

    @foreach($barangs as $b)
      <div class="well">
        <div class="row">
          <div class="col-md-4">
            <div id="sliderfoto{{ $b->id_barang }}" class="carousel slide" data-ride="carousel">
              <!-- Wrapper for slides -->
              <div class="carousel-inner" role="listbox">
                <?php $i=1; ?>
                  @foreach($b->foto as $f)
                  <div class="item {{ $active = ($i==1) ? 'active' : '' }}" id="slider_foto">
                    <img src="{{ url('images/fotobarang/'. $f->nama) }}" alt="barang.png">
                    <a href="#" class="btn btn-info" data-toggle="tooltip" data-placement="right" title="Edit Foto">
                      <span class="glyphicon glyphicon-edit"></span>
                    </a>

                  </div> 
                  <?php $i++; ?>
                  @endforeach
              </div>
              <!-- jika jumlah foto lebih dari satu maka control tidak muncul -->
              <!-- Controls -->
              @if(count($b->foto) > 1 )
              <a class="left carousel-control" href="#sliderfoto{{ $b->id_barang }}" role="button" data-slide="prev">
                <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
              </a>
              <a class="right carousel-control" href="#sliderfoto{{ $b->id_barang }}" role="button" data-slide="next">
                <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
              </a>
              @endif
            </div>

          </div>
          <div class="col-md-6">
            <form class="form-horizontal">
              <div class="form-group">
                <label class="col-sm-3 control-label">nama</label>
                <div class="col-sm-9">
                <p class="form-control-static">{{ $b->nama_barang }}</p>
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-3 control-label">kategori</label>
                <div class="col-sm-9">
                <p class="form-control-static">{{ $b->kategori }}</p>
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-3 control-label">Ciri - ciri</label>
                <div class="col-sm-9">
                <p class="form-control-static">{{ $b->ciri_ciri }}</p>
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-3 control-label">Status kehilangan</label>
                <div class="col-sm-9">
                <p class="form-control-static">{{ $b->status_kehilangan }}</p>
                </div>
              </div>
            </form>
          </div>
          <div class="col-md-2">
            <form class="form-horizontal">
              <div class="form-group">
                <div class="col-sm-12 control-label">
                <a href="{{ route('pengolahan.kehilangan.edit_barang', [$id_proses, $b->id_barang]) }}" data-toggle="tooltip" data-placement="left" title="Edit Barang"><span class="glyphicon glyphicon-edit"></span></a>
                </div>
              </div>

              <div class="form-group">
                <div class="col-sm-12 control-label">
                <a href="#" data-toggle="tooltip" data-placement="left" title="Delete Barang"><span class="glyphicon glyphicon-trash"></span></a>
                </div>
              </div>


            </form>
          </div>

          
        </div>
      </div>
    @endforeach
    <div class="col-md-4">

    </div>
    </div>
     
    </div>
</div>

@endsection
       
   