<?php

namespace App\Http\Controllers\API;

use App\Models\Drug;
use Illuminate\Http\Request;
use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;

class DrugController extends Controller
{
    // untuk filter pencarian sebuah data obat
    public function all(Request $request)
    {
        $id = $request->input('id');
        $limit = $request->input('limit', 6);
        $name = $request->input('name');
        $types = $request->input('types');
        $ingredients = $request->input('ingredients');

        $price_from = $request->input('price_from');
        $price_to = $request->input('price_to');

        $rate_from = $request->input('rate_from');
        $rate_to = $request->input('rate_to');

        if($id)
        {

            $drug = Drug::find($id);

            if($drug)
            {
                return ResponseFormatter::success($drug, 'Data Berhasil Diambil');
            }

            else
            {
                return ResponseFormatter::error(null, 'Data Produk Tidak Ada', 404);
            }
        }

        $drug = Drug::query();

        if($name)
        {  // 'like' mencari yang mirip
            $drug->where('name', 'like' , '%' , $name, '%');
        }

        if($types)
        {
            $drug->where('types','like','%', $types, '%');
    
        }

        if($ingredients)
        {
            $drug->where('types','like','%', $ingredients, '%');
    
        }

        if($price_from)
        {
            $drug->where('price', '>=', $price_from);

        }

        if($price_to)
        {
            $id->where('price', '<=', $price_from);

        }

        if($rate_from)
        {
            $drug->where('rate', '>=', $rate_from);

        }

        
        if($rate_to)
        {
            $drug->where('rate', '<=', $rate_to);

        }

        return ResponseFormatter::success
        (
            $drug->paginate($limit),
            'Data list produk berhasil diambil'

        );

    }
}
