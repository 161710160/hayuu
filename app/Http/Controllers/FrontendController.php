<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Order;
use App\Produk;
use App\User;

class FrontendController extends Controller
{
    public function index ()
    {
    	return view('frontends.index');
    }

    public function artikels ()
    {
    	$artikels = artikels::orderBy('created_at','DESC')->paginate(3);
    	return view('frontends.blog', compact('artikels'));
    }
    public function filter_artikels($id)
    {
        $kategoripartikel = artikels::where('kategoriartikel_id','=',$id)->get();
        return view('frontends.blog', compact('kategoripartikel'));
    }
    public function galeris ()
    {
    	$galeris = galeris::all();
    	return view('frontends.galeri', compact('galeris'));
    }
    public function testimonis ()
    {
    	$testimonis = testimonis::all();
    	return view('frontends.testimoni', compact('testimonis'));
    }
    public function category ()
    {
    	$category = Category::all();
    	return view('frontends.shop', compact('category'));
    }
    public function kategoriartikels ()
    {
    	$kategoriartikels = kategoriartikels::all();
    	return view('frontends.blog', compact('kategoriartikels'));
    }

    public function produks()
    {
        $categorip = Produk::orderBy('created_at','DESC')->paginate(6);
        return view('frontends.shop',compact('categorip'));
    }
    public function filter_produks($id)
    {
        $categorip = Produk::where('kategori_id','=',$id)->get();
        return view('frontends.shop', compact('categorip'));
    }

    public function single(artikels $artikels)
    {
    
    return view('frontends.single',compact('artikels'));
    }
    
    public function singleproduk(barangs $barangs)
    {
    
    return view('frontends.singleproduk',compact('barangs'));
    }
}
