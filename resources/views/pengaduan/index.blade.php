@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content_header')
    <h1 class="m-0 text-dark">Pengaduan</h1>
@stop

@section('content')
<div class="card">
   <div class="card-body">
       @if (session('status'))
           <x-adminlte-alert theme="success" title="Sukses">
               {{session('status')}}
           </x-adminlte-alert>
       @endif
       @if ($errors->any())
           <x-adminlte-alert theme="success" title="Sukses">
               <ul>
                   @foreach ($errors->all() as $error)
                       <li>{{ $error }}</li>
                   @endforeach
               </ul>
           </x-adminlte-alert>
       @endif
       <!-- <a href="{{route('pengaduan.create')}}" class="btn btn-md btn-success mx-1 shadow"> <i class="fa fa-lg fa-fw fa-plus"></i> Tambah</a> -->
       <br/> <br/>
       <div class="table-responsive">
           <table id="tabel_pengaduan" class="table table-striped table-hover table-condensed table-bordered">
               <thead>
                   <tr style="background-color: darkgrey">
                       <th>No</th>
                       <th>tanggal pengaduan</th>
                       <th>Isi Laporan</th>
                       <th>Foto</th>
                       <th>Status</th>
                       <th class="text-center" width="70">Aksi</th>
                   </tr>
               </thead>
               <tbody>
               @foreach($pengaduan as $pengaduan)
                   <tr>
                       <td>{{$loop->iteration}}</td>
                       <td>{{$pengaduan->tgl_pengaduan}}</td>
                       <td>{{$pengaduan->isi_laporan}}</td>
                       <td>{{$pengaduan->foto}}</td>
                       <td>{{$pengaduan->level}}</td>
                           <td>
                               <a href="{{route('pengaduan.edit',$pengaduan->id)}}" class="btn btn-sn btn-dark"
                                   title="Edit"><i class="far fa-edit"></i></a>
                                   <x-adminlte-button class="btn btn-xs btn-danger" data-toggle="modal" data-target="#hapususer{{$loop->iteration}}" icon="far fa-trash-alt" class="bg-danger"></x-adminlte-button>
                                       {{-- Custom --}}
                                   <x-adminlte-modal id="hapususer{{$loop->iteration}}" title="Hapus User" size="md" theme="orange"
                                   icon="fas fa-bell" v-centered static-backdrop scrollable>
                                   <div style="height:80px;">
                                       <form action="{{route('pengaduan.delete',$pengaduan->id)}}" method="POST">
                                           @csrf
                                           @method('DELETE')
                                             Apakah anda yakin akan menghapus user ini?</div>
                                   <x-slot name="footerSlot">
                                       <x-adminlte-button type="submit" class="mr-auto" theme="danger" label="Hapus"/>
                                       <x-adminlte-button theme="primary" label="Batal" data-dismiss="modal"/>
                                       </form>
                                   </x-slot>
                                   </x-adminlte-modal>
                           </td>
                

                         </tr>
                       @endforeach
               </tbody>
           </table>
       </div>
   </div>
</div>


@stop
@section('plugins.Datatables', true)
@section('js')
   <script> $('#tabel_user').DataTable();</script>
@stop