<?php
namespace App\Http\Controllers;

use App\Models\Product;
use App\Http\Requests\ProductRequest;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return response()->json([
            'success' => true,
            'data'    => $products,
        ], 200);
    }

    // Store & Update Product
    public function invoke(ProductRequest $request)
    {
        \DB::beginTransaction();

        try {
            $product = Product::updateOrCreate(['id' => $request->id], $request->data());

            \DB::commit();
            return response()->json([
                'success' => true,
                'data'    => $product,
            ], 200);

        } catch(\Exception $e) {

            \DB::rollback();
            return response()->json([
                'success' => false,
                'data'    => null,
                'error' => $e->getMessage()
            ], 400);

        }
    }
    
    public function detail($id)
    {
        $product = Product::where('id', $id)->first();

        if ($product) {
            \DB::commit();
            return response()->json([
                'success' => true,
                'data' => $product,
            ], 200);
        } else {
            \DB::rollback();
            return response()->json([
                'success' => false,
                'error' => null,
                'message' => 'Data produk tidak ditemukan',
            ], 400);
        }
    }

    public function delete($id)
    {
        \DB::beginTransaction();

        try {
            $product = Product::where('id', $id)->first();

            if ($product) {
                $delete = $product->delete();
                \DB::commit();
                return response()->json([
                    'success' => true,
                    'error' => null,
                    'message' => 'Data produk berhasil dihapus',
                ], 200);
            } else {
                \DB::rollback();
                return response()->json([
                    'success' => false,
                    'error' => null,
                    'message' => 'Data produk tidak ditemukan',
                ], 400);
            }

        } catch(\Exception $e) {

            \DB::rollback();
            return response()->json([
                'success' => false,
                'data'    => null,
                'error' => $e->getMessage()
            ], 400);

        }
    }
}
