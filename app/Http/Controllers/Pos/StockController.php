<?php

namespace App\Http\Controllers\Pos;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Models\Supplier;

class StockController extends Controller
{
    public function StockReport()
    {
        $allData = Product::orderBy('supplier_id', 'asc')->orderBy('category_id', 'asc')->get();
        return view('backend.stock.stock_report', compact('allData'));
    }

    public function StockReportPdf(){
        $allData = Product::orderBy('supplier_id', 'asc')->orderBy('category_id', 'asc')->paginate(10);;
        return view('backend.pdf.stock_report_pdf', compact('allData'));
    }
    public function StockSupplierWise(){
        $supplier = Supplier::all();
        $category = Category::all();
        // return view('backend.stock.supplier_product_wise_report', compact('supplier', 'category'));
    }
}
