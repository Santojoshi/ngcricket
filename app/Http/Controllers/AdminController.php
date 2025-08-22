<?php

namespace App\Http\Controllers;
use Illuminate\Support\Str;

use Illuminate\Http\Request;
use App\Models\CategoryModel;
use App\Models\SubCategoryModel;
use App\Models\ProductModel;
use App\Models\BannerModel;

class AdminController extends Controller
{
    public function category_list(){

        $data['record'] = CategoryModel::get_records();
        return view('admin.pannel.categoryList', $data);
    }


    public function add_category(){

        return view('admin.pannel.addCategory');
    }

    public function save_category(Request $request){

        // dd($request->all());
        request()->validate([
            'cname' => 'required|unique:category,category_name'
        ]);
        $category = new CategoryModel;
        $category->category_name = trim($request->cname);
        $category->meta_tittle = trim($request->cmeta_tittle);
        $category->meta_desc = trim($request->cmeta_desc);
        $category->meta_keywords = trim($request->cmeta_keywords);
        $category->status = trim($request->is_active);
        $category->category_alt = trim($request->category_alt);
        
        if (!empty($request->file('category_image'))) {
            $file4 = $request->file('category_image');
            $ext = $file4->getClientOriginalExtension();
            $random = $request->cname.str::random(15);
            $filename4 = strtolower($random).'.'.$ext;
            
            $file4->move('public/upload/product/', $filename4);
            
            $category->cat_img = trim($filename4);
        }
        else {
            request()->validate([
                'category_image' => 'required'
            ]);
        }

        $category->save();

        return redirect('admin/category_list')->with('success', "Category added successfully");
    }

    public function edit_category($id){

        $data['record'] = CategoryModel::get_single($id);
        return view('admin.pannel.editCategory', $data);
    }
    public function update_category($id, Request $request){

        // request()->validate([
        //     'cname' => 'required|unique:category,category_name'.$id
        // ]);
        $category = CategoryModel::get_single($id);
        $category->category_name = trim($request->cname);
        $category->meta_tittle = trim($request->cmeta_tittle);
        $category->meta_desc = trim($request->cmeta_desc);
        $category->meta_keywords = trim($request->cmeta_keywords);
        $category->status = trim($request->is_active);
        $category->category_alt = trim($request->category_alt);
        if (!empty($request->file('category_image'))) {
            $file4 = $request->file('category_image');
            $ext = $file4->getClientOriginalExtension();
            $random = $request->cname.str::random(15);
            $filename4 = strtolower($random).'.'.$ext;
            
            $file4->move('public/upload/product/', $filename4);
            
            $category->cat_img = trim($filename4);
        }
        elseif ($request->hide == 0) {
            request()->validate([
                'category_image' => 'required'
            ]);
        }

        $category->save();

        return redirect('admin/category_list')->with('success', "Category Updated successfully");
    }

    public function delete_category($id){

        $category = CategoryModel::get_single($id);
        $category -> is_delete = 1;
        $category ->save();
        return redirect('admin/category_list')->with('success', "Category Deleted successfully");

}

// sub category section***************************

public function subcategory_list(){

        $data['record'] = SubCategoryModel::get_records();
        return view('admin.pannel.subcategoryList', $data);
    }


    public function add_subcategory(){

        return view('admin.pannel.addsubCategory');
    }

    public function save_subcategory(Request $request){

        // dd($request->all());
        request()->validate([
            'subcategory_name' => 'required|unique:category,category_name'
        ]);
        $category = new SubCategoryModel;
        $category->subcategory_name = trim($request->subcategory_name);
        $category->meta_tittle = trim($request->cmeta_tittle);
        $category->meta_desc = trim($request->cmeta_desc);
        $category->meta_keywords = trim($request->cmeta_keywords);
        $category->status = trim($request->is_active);

        $category->save();

        return redirect('admin/subcategory_list')->with('success', "Sub Category added successfully");
    }

    public function edit_subcategory($id){

        $data['record'] = SubCategoryModel::get_single($id);
        return view('admin.pannel.editsubCategory', $data);
    }
    public function update_subcategory($id, Request $request){

        // request()->validate([
        //     'cname' => 'required|unique:category,category_name'.$id
        // ]);
        $category = SubCategoryModel::get_single($id);
        $category->subcategory_name = trim($request->subcategory_name);
        $category->meta_tittle = trim($request->cmeta_tittle);
        $category->meta_desc = trim($request->cmeta_desc);
        $category->meta_keywords = trim($request->cmeta_keywords);
        $category->status = trim($request->is_active);

        $category->save();

        return redirect('admin/subcategory_list')->with('success', "Category Updated successfully");
    }

    public function delete_subcategory($id){

        $category = SubCategoryModel::get_single($id);
        $category -> is_delete = 1;
        $category ->save();
        return redirect('admin/subcategory_list')->with('success', "Category Deleted successfully");

}

// Product Section **********************************************************

public function product_list()
{

        $data['record'] = ProductModel::get_records();
        return view('admin.pannel.productList', $data);
    }


    public function add_product(){
        $data['cat'] = CategoryModel::get_records();
        $data['subcat'] = subCategoryModel::get_records();

        return view('admin.pannel.addproduct', $data);
    }

    public function save_product(Request $request){

        // dd($request->all());
        request()->validate([
            'product' => 'required|unique:product,product_name',
            'sku' => 'required|unique:product,sku'
        ]);
        $product = new ProductModel;
        $product->product_name = trim($request->product);
        $product->sku = trim($request->sku);
        $product->category_id = trim($request->category);
        $product->subcategory_id = trim($request->subcategory);
        $product->us_price_cut = trim($request->us_cut_price);
        $product->us_price_actual = trim($request->us_price);
        $product->uk_price_cut = trim($request->UK_cut_price);
        $product->uk_price_actual = trim($request->UK_price);
        $product->can_price_cut = trim($request->CAN_cut_price);
        $product->can_price_actual = trim($request->CAN_price);
        $product->is_featured = trim($request->is_featured);


        if (!empty($request->file('img1'))) {
            
            $file = $request->file('img1');
            $ext = $file->getClientOriginalExtension();
            $random = $request->product.str::random(15);
            $filename1 = strtolower($random).'.'.$ext;

            $file->move('public/upload/product/', $filename1);
            $product->img1 = trim($filename1);
            $product->img1_alt = trim($request->img1_alt);

        }
        else {
            request()->validate([
                'img1' => 'required'
            ]);
        }
        if (!empty($request->file('img2'))) {
            
            $file2 = $request->file('img2');
            $ext = $file2->getClientOriginalExtension();
            $random = $request->product.str::random(15);
            $filename2 = strtolower($random).'.'.$ext;

            $file2->move('public/upload/product/', $filename2);

            $product->img2_alt = trim($request->img2_alt);
            $product->img2 = trim($filename2);

        }
        else {
            
            $product->img2_alt = "";
            $product->img2 = "";
        }
        if (!empty($request->file('img3'))) {
            
            $file3 = $request->file('img3');
            $ext = $file3->getClientOriginalExtension();
            $random = $request->product.str::random(15);
            $filename3 = strtolower($random).'.'.$ext;

            $file3->move('public/upload/product/', $filename3);

            $product->img3_alt = trim($request->img3_alt);
            $product->img3 = trim($filename3);

        }
        else {
            
            $product->img3_alt = "";
            $product->img3 = "";
        }

        if (!empty($request->file('img4'))) {
            
            $file4 = $request->file('img4');
            $ext = $file4->getClientOriginalExtension();
            $random = $request->product.str::random(15);
            $filename4 = strtolower($random).'.'.$ext;

            $file4->move('public/upload/product/', $filename4);

            $product->img4_alt = trim($request->img4_alt);
            $product->img4 = trim($filename4);

        }
        else {
            
            $product->img4_alt = "";
            $product->img4 = "";
        }

        $product->description = trim($request->description);
        $product->meta_tittle = trim($request->pmeta_tittle);
        $product->meta_desc = trim($request->pmeta_desc);
        $product->meta_keywords = trim($request->pmeta_keywords);
        $product->status = trim($request->is_active);

        $product->save();

        $subcategory_id = trim($request->subcategory);
        $subcategory = SubCategoryModel::find($subcategory_id);
        $subcategory->category_id = trim($request->category);
        $subcategory->save();



        return redirect('admin/product_list')->with('success', "Product added successfully");
    }

    public function edit_product($id){
        $data['cat'] = CategoryModel::get_records();
        $data['subcat'] = subCategoryModel::get_records();
        $data['record'] = ProductModel::get_single($id);
        return view('admin.pannel.editProduct', $data);
    }
    public function update_product($id, Request $request){

        request()->validate([
            request()->validate([
                'product' => 'required|unique:product,product_name,'. $id,
                'sku' => 'required|unique:product,sku,'. $id,
            ])
            
        ]);
        $product = ProductModel::get_single($id);
        $product->product_name = trim($request->product);
        $product->sku = trim($request->sku);
        $product->category_id = trim($request->category);
        $product->subcategory_id = trim($request->subcategory);
        $product->us_price_cut = trim($request->us_cut_price);
        $product->us_price_actual = trim($request->us_price);
        $product->uk_price_cut = trim($request->UK_cut_price);
        $product->uk_price_actual = trim($request->UK_price);
        $product->can_price_cut = trim($request->CAN_cut_price);
        $product->can_price_actual = trim($request->CAN_price);
        $product->is_featured = trim($request->is_featured);


        if (!empty($request->file('img1'))) {
            
            $file = $request->file('img1');
            $ext = $file->getClientOriginalExtension();
            $random = $request->product.str::random(15);
            $filename1 = strtolower($random).'.'.$ext;

            $file->move('public/upload/product/', $filename1);
            $product->img1 = trim($filename1);
            $product->img1_alt = trim($request->img1_alt);

        }
        
        if (!empty($request->file('img2'))) {
            
            $file2 = $request->file('img2');
            $ext = $file2->getClientOriginalExtension();
            $random = $request->product.str::random(15);
            $filename2 = strtolower($random).'.'.$ext;

            $file2->move('public/upload/product/', $filename2);

            $product->img2 = trim($filename2);
            
        }
        elseif ($request->img2hide == 0) {
            $product->img2 = '';

        }
        $product->img2_alt = trim($request->img2_alt);
        
        if (!empty($request->file('img3'))) {
            
            $file3 = $request->file('img3');
            $ext = $file3->getClientOriginalExtension();
            $random = $request->product.str::random(15);
            $filename3 = strtolower($random).'.'.$ext;

            $file3->move('public/upload/product/', $filename3);

            $product->img3 = trim($filename3);
            
        }
        elseif ($request->img3hide == 0) {
            $product->img3 = '';

        }
        $product->img3_alt = trim($request->img3_alt);
        

        if (!empty($request->file('img4'))) {
            
            $file4 = $request->file('img4');
            $ext = $file4->getClientOriginalExtension();
            $random = $request->product.str::random(15);
            $filename4 = strtolower($random).'.'.$ext;

            $file4->move('public/upload/product/', $filename4);

            $product->img4 = trim($filename4);
            
        }
        elseif ($request->img4hide == 0) {
            $product->img4 = '';

        }
        $product->img4_alt = trim($request->img4_alt);

        $product->description = trim($request->description);
        $product->meta_tittle = trim($request->pmeta_tittle);
        $product->meta_desc = trim($request->pmeta_desc);
        $product->meta_keywords = trim($request->pmeta_keywords);
        $product->status = trim($request->is_active);

        $product->save();

        $subcategory_id = trim($request->subcategory);
        $subcategory = SubCategoryModel::find($subcategory_id);
        $subcategory->category_id = trim($request->category);
        $subcategory->save();

        return redirect('admin/product_list')->with('success', "Product Updated successfully");
    }

    public function delete_product($id){

        $category = ProductModel::get_single($id);
        $category -> is_delete = 1;
        $category ->save();
        return redirect('admin/product_list')->with('success', "Product Deleted successfully");

}


// Banner section*********************************

public function banner_list(){

    $data['record'] = BannerModel::get_records();
    return view('admin.pannel.bannerList', $data);
}


public function add_banner(){

    return view('admin.pannel.addBanner');
}

public function save_banner(Request $request){

    // dd($request->all());
    request()->validate([
        'banner_name' => 'required|unique:banner,banner_name' ,
        'banner_alt' => 'required'
    ]);
    $category = new BannerModel;
    $category->banner_name = trim($request->banner_name);
    $category->banner_alt = trim($request->banner_alt);
    if (!empty($request->file('banner_image'))) {
        $file4 = $request->file('banner_image');
        $ext = $file4->getClientOriginalExtension();
        $random = $request->banner_name.str::random(15);
        $filename4 = strtolower($random).'.'.$ext;
        
        $file4->move('public/upload/product/', $filename4);
        
        $category->banner_image = trim($filename4);
    }
    else {
        request()->validate([
            'banner_image' => 'required'
        ]);
    }
    $category->status = trim($request->is_active);

    $category->save();

    return redirect('admin/banner_list')->with('success', "Banner added successfully");
}
public function edit_banner($id){
    $data['banner'] = BannerModel::get_single($id);
    return view('admin.pannel.editBanner', $data);
}

public function update_banner($id, Request $request){

    request()->validate([
        'banner_name' => 'required|unique:banner,banner_name,'.$id,
        'banner_alt' => 'required'
    ]);
    $category = BannerModel::get_single($id);
    $category->banner_name = trim($request->banner_name);
    $category->banner_alt = trim($request->banner_alt);
    if (!empty($request->file('banner_image'))) {
        $file4 = $request->file('banner_image');
        $ext = $file4->getClientOriginalExtension();
        $random = $request->banner_name.str::random(15);
        $filename4 = strtolower($random).'.'.$ext;
        
        $file4->move('public/upload/product/', $filename4);
        
        $category->banner_image = trim($filename4);
    }
    elseif ($request->hide == 0) {
        request()->validate([
            'banner_image' => 'required'
        ]);
    }
    
    $category->status = trim($request->is_active);

    $category->save();

    return redirect('admin/banner_list')->with('success', "Banner Updated successfully");
}
public function delete_banner($id){

    $category = BannerModel::findOrFail($id);
    $category ->delete();
    return redirect('admin/banner_list')->with('success', "Banner Deleted successfully");

}

}
