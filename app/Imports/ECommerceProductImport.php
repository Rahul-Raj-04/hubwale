<?php

namespace App\Imports;

use App\Models\ECommerceBrand;
use App\Models\ECommerceCategory;
use App\Models\ECommerceProduct;
use App\Models\ECommerceTax;
use App\Models\ECommerceProductVariation;
use App\Models\ECommerceSize;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;

class ECommerceProductImport implements ToModel, WithHeadingRow, WithValidation
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        $category = ECommerceCategory::where(['company_id' => auth()->user()->company_id, 'name' => $row['category'], 'type' => 'main'])->first();
        if (!$category) {
            $category = ECommerceCategory::create([
                'company_id' => auth()->user()->company_id,
                'name' => $row['category'],
                'type' => 'main'
            ]);
        }

        $subCategory = ECommerceCategory::where(['company_id' => auth()->user()->company_id, 'name' => $row['sub_category'], 'type' => 'sub'])->first();
        if (!$subCategory) {
            $subCategory = ECommerceCategory::create([
                'company_id' => auth()->user()->company_id,
                'name' => $row['sub_category'],
                'type' => 'sub'
            ]);
        }

        $brand = ECommerceBrand::where(['company_id' => auth()->user()->company_id, 'name' => $row['brand'], 'type' => 'own'])->first();
        if (!$brand) {
            $brand = ECommerceBrand::create([
                'company_id' => auth()->user()->company_id,
                'name' => $row['brand'],
                'type' => 'own'
            ]);
        }

        $supplierBrand = ECommerceBrand::where(['company_id' => auth()->user()->company_id, 'name' => $row['supplier_brand'], 'type' => 'supplier'])->first();
        if (!$supplierBrand) {
            $supplierBrand = ECommerceBrand::create([
                'company_id' => auth()->user()->company_id,
                'name' => $row['supplier_brand'],
                'type' => 'supplier'
            ]);
        }

        $tax = ECommerceTax::where(['company_id' => auth()->user()->company_id, 'tax' => $row['tax']])->first();
        if (!$tax) {
            $tax = ECommerceTax::create([
                'company_id' => auth()->user()->company_id,
                'name' => $row['tax']."% Tax",
                "tax" => $row['tax'],
            ]);
        }

        $name = $row['name'];
        $description = $row['description'];
        $variations = [];
        foreach ($row as $column => $value) {
            $columnExplode = explode('_', $column, 3);
            if ($columnExplode[0] == 'variation') {
                $variations[$columnExplode[1]][$columnExplode[2]] = strtolower($value);
            }
        }
        $product = ECommerceProduct::create([
            'company_id' => auth()->user()->company_id,
            'category_id' => $category->id,
            'sub_category_id' => $subCategory->id,
            'brand_id' => $brand->id,
            'supplier_brand_id' => $supplierBrand->id,
            'tax_id' => $tax->id,
            'name' => $name,
            'description' => $description,
        ]);

        foreach ($variations as $column => $variation) {
            $producSize = ECommerceSize::where(['company_id' => auth()->user()->company_id, 'name' => $variation['name']])->first();

            if (!$producSize) {
                $producSize = ECommerceSize::create([
                    'company_id' => auth()->user()->company_id,
                    'name' => $variation['name'],
                ]);
            }

            $variation['product_id'] = $product->id;
            switch ($variation['packaging_type']) {
                case 'box':
                    ECommerceProductVariation::create([
                        'size_id' => $producSize->id,
                        'packaging_type' => $variation['packaging_type'],
                        'piece_per_box' => $variation['piece_per_box'] ?? 0,
                        'box_price' => $variation['box_price'] ?? 0,
                        'piece_price' => $variation['piece_price'] ?? 0,
                        'product_id' => $variation['product_id'],
                    ]);
                break;
                case 'piece':
                    ECommerceProductVariation::create([
                        'size_id' => $producSize->id,
                        'packaging_type' => $variation['packaging_type'],
                        'piece_per_box' => 0,
                        'box_price' => 0,
                        'piece_price' => $variation['piece_price'] ?? 0,
                        'product_id' => $variation['product_id'],
                    ]);
                break;
                case 'both':
                    ECommerceProductVariation::create([
                        'size_id' => $producSize->id,
                        'packaging_type' => $variation['packaging_type'],
                        'piece_per_box' => $variation['piece_per_box'] ?? 0,
                        'box_price' => $variation['box_price'] ?? 0,
                        'piece_price' => $variation['piece_price'] ?? 0,
                        'product_id' => $variation['product_id'],
                    ]);
                break;
            }
        }
        return $product;
    }

    /**
     * @return array
    */
    public function rules(): array
    {
        return [
            'name' => ['required', 'min:1', 'max:100'],
            'category' => ['required'],
            'sub_category' => ['required'],
            'brand' => ['required'],
            'supplier_brand' => ['required'],
            'tax' => ['required', 'numeric', 'min:1', 'max:100'],
            'variation_*_name' => ['nullable', 'min:1', 'max:100'],
            'variation_*_packaging_type' => ['nullable','in:both,box,piece,BOTH,BOX,PIECE'],
            'variation_*_piece_per_box' => ['nullable','numeric'],
            'variation_*_box_price' => ['nullable','numeric'],
            'variation_*_piece_price' => ['nullable','numeric'],
        ];
    }
}
