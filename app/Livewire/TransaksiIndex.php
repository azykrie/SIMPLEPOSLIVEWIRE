<?php

namespace App\Livewire;

use App\Models\Produk;
use App\Models\Transaksi;
use App\Models\TransaksiDetail;
use App\Models\order;
use Barryvdh\DomPDF\PDF as DomPDFPDF;
use Livewire\Component;
use PDF;
use RealRashid\SweetAlert\Facades\Alert;

class TransaksiIndex extends Component
{
    public $id_produk;
    public $bayar;

    protected $rules = [
        'id_produk' => 'required|unique:transaksi',

    ];


    public function render()
    {
        return view('livewire.transaksi-index', [
            'produk' => Produk::get(),
            'transaksi' => Transaksi::get(),
        ]);
    }

    
    public function submit()
    {
        $this->validate();
        $transaksi = Transaksi::create([
            'id_produk' => $this->id_produk,
            'quantity' => 1,
            'total' => 1,

        ]);
        $transaksi->total = $transaksi->produk->harga;
        $transaksi->save();

        session()->flash('message', 'Product berhasil di tambahkan');
    }

    public function increment($id)
    {
        $transaksi = Transaksi::find($id);
        $transaksi->update([
            'quantity' => $transaksi->quantity + 1,
            'total' => $transaksi->produk->harga * ($transaksi->quantity + 1)
        ]);

        session()->flash('message', 'quantity product berhasil di tambah');
    }

    public function decrement($id)
    {
        $transaksi = Transaksi::find($id);
        $transaksi->update([
            'quantity' => $transaksi->quantity - 1,
            'total' => $transaksi->produk->harga * ($transaksi->quantity - 1)
        ]);

        session()->flash('message', ' quantity product berhasil di kurang');
    }

    public function deleteTransaksi($id)
    {
        $transaksi = Transaksi::find($id);
        $transaksi->delete();
        session()->flash('message', 'Transaksi berhasil di hapus');
    }

    public function save()
    {

        $transaksi = Transaksi::get();

        $order = Order::create([
            'no_order' => 'OD-' . date('Ymd') . rand(1111, 9999),
            'nama_kasir' => auth()->user()->name,
        ]);


        foreach ($transaksi as $value) {
            $produk = array(
                'id_order' => $order->id,
                'id_produk' => $value->id_produk,
                'quantity' => $value->quantity,
                'total' => $value->total,
                'created_at' => \Carbon\carbon::now(),
                'updated_at' => \Carbon\carbon::now()
            );

            $transaksiDetail = TransaksiDetail::insert($produk);

            $deleteTransaksi = Transaksi::where('id', $value->id)->delete();
        }

        $pdf = new \Dompdf\Dompdf();
        // Generate the PDF content
        $pdf->loadHtml(view('transaksi.invoice', compact('order', 'transaksiDetail'))->render());

        // Set paper size and orientation
        $pdf->setPaper('A4', 'portrait');

        // Render the PDF
        $pdf->render();

        // Define the PDF file name
        $pdfFileName = 'invoice-' . $order->no_order . '.pdf';

        // Save the PDF to a public directory
        $pdf->stream($pdfFileName);

        // Optionally, you can save the PDF to a directory if needed
        // $pdf->save(public_path('pdf/' . $pdfFileName));

        return redirect('transaksi');
        // Alert::success('Berhasil!', 'Produk Berhasil di tambahkan');
        // return redirect('transaksi');
        // return redirect()->to('/invoice/' . $order->order_no);
    }
}
