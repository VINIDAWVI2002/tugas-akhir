@extends('landing.section.base')
@section('landing')

<div class="row">
    <div class="col-md-12">
        <form action="{{url('keranjang/proses')}}" method="POST">
            @csrf
       
        <table class="table table-borderless">
            <thead>
                <tr class="bg-primary">
                    <th class="text-center d">No</th>
                    <th>Nama Menu</th>
                    <th class="text-center">Harga Menu</th>
                    <th class="text-center" width="250px">Qty</th>
                    <th class="text-center">Grandtotal</th>
                    <th class="text-center">Aksi</th>
                </tr>
            </thead>
        
        @foreach($list_keranjang as $item)
        <tr>
            <td class="text-center">{{$loop->iteration}}
            <br>
                <input type="hidden" value="{{$item->keranjang_menu_id}}" name="keranjang_menu_id[]">
                <input type="hidden" value="{{$item->menu->menu_kategori_id}}" name="pesanan_menu_kategori_id[]">
                <input type="hidden" value="{{$item->menu->menu_harga}}" name="pesanan_menu_harga[]">
        </td>
            <td >{{ucwords($item->menu->menu_nama)}}</td>
            <td class="text-center">Rp. {{number_format($item->menu->menu_harga)}} </td>
            <td class="text-center">
                <div class="input-group" >
                    <div class="input-group-prepend">
                        <button class="btn btn-sm btn-warning" type="button" onclick="decrement({{$loop->iteration}})">-</button>
                    </div>
                    <input type="number" id="inputNumber{{$loop->iteration}}" name="pesanan_menu_qty[]" class="form-control" min="1" value="{{$item->keranjang_qty}}" style="width: 100px !important;">
                    <div class="input-group-append">
                        <button class="btn btn-sm btn-danger" type="button" onclick="increment({{$loop->iteration}})">+</button>
                    </div>
                </div>
            </td>
            <td class="text-center">
                Rp. {{number_format($item->menu->menu_harga * $item->keranjang_qty)}}
            </td>
            <td class="text-center">
                <a href="{{url('keranjang',$item->keranjang_id)}}/hapus" onclick="return confirm('Yakin hapus dari keranjang?')" class="btn btn-sm btn-danger">Hapus</a>
            </td>
        
        </tr>
        @endforeach
        <tr class="bg-warning">
            <th colspan="4">
            Total Belanja :
            </th>
            <th class="text-center" >
            
                <?php
                $total = 0;
                foreach($list_keranjang as $item) {
                    $subtotal = $item->menu->menu_harga * $item->keranjang_qty;
                    $total += $subtotal;
                }
                echo "Rp. " . number_format($total);
                ?>
                
            </th>
            <td></td>
        </tr>
        <tr>
            <td colspan="6" class="text-center">
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#staticBackdrop">
                    Lanjut Pesanan
                </button>
  
                <!-- Modal -->
                <div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class=" modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header bg-danger">
                        <h5 class="modal-title text-white" id="staticBackdropLabel">Form Pemesanan</h5>
                        <button type="button" class="close btn btn-warning" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        </div>
                        <div class="modal-body">
                        <div class="row">

                            <div class="col-md-6 mt-3">
                                <span>Nama Penerima</span>
                                <input type="text" name="pesanan_penerima" value="{{ucwords(Auth::guard('member')->user()->member_nama)}}" placeholder="No Hp/WhatsApp" class="form-control">
                            </div>

                            <div class="col-md-6 mt-3">
                                <span>No Hp/WhatsApp</span>
                                <input type="text" name="pesanan_notlp" value="{{Auth::guard('member')->user()->member_notlp}}" placeholder="No Hp/WhatsApp" class="form-control">
                            </div>

                            <div class="col-md-6 mt-3">
                                <span>Alamat Penerima</span>
                                <input type="text" name="pesanan_alamat" value="{{ucwords(Auth::guard('member')->user()->member_alamat)}}" placeholder="No Hp/WhatsApp" class="form-control">
                            </div>

                            <div class="col-md-6 mt-3">
                                <span>Metode Pembayaran</span>
                                <select name="pesanan_pembayaran_id" id="" class="form-control">
                                    @foreach($list_pembayaran as $pembayaran)
                                    <option value="{{$pembayaran->pembayaran_id}}">{{ucwords($pembayaran->pembayaran_nama)}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-md-12 mt-3">
                                <span>Pesan ke penjual :</span>
                                <textarea name="pesanan_pesan" class="form-control" placeholder="Masukan pesan anda disini" id="" cols="30" rows="3"></textarea>
                            </div>

                        </div>
                        </div>
                        <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-danger">Lanjut Pembayaran</button>
                        </div>
                    </div>
                    </div>
                </div>
            </td>
        </tr>
        </table>
        </form>
    </div>

<div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
    <script>
        function increment(index) {
            var inputElement = document.getElementById('inputNumber'+index);
            inputElement.value = parseInt(inputElement.value) + 1;
        }
    
        function decrement(index) {
            var inputElement = document.getElementById('inputNumber'+index);
            if (parseInt(inputElement.value) > 0) {
                inputElement.value = parseInt(inputElement.value) - 1;
            }
        }
    </script>
@endsection