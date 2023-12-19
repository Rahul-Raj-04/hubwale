<?php

namespace App\Http\Controllers\Livewire\Erp\Product;

use Illuminate\Support\Facades\Validator;
use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\Group;
use App\Models\Products;
use App\Models\Category;
use App\Models\GstCommodity;
use Jantinnerezo\LivewireAlert\LivewireAlert;


class EditProduct extends Component
{
    use LivewireAlert;
    use WithFileUploads;

    public $product;

    public $images = [];

    public $group_name;
    public $group_short_name;

    public $category_name;
    public $category_short_name;

    public $groups;
    public $categories;
    public $user;

    // main form field
    public $group_id;
    public $category_id;
    public $name;
    public $alias;
    public $gst_commodity;
    public $number;
    public $size;
    public array $custom_size = [];
    public $brand;
    public $description;
    public $packaging_type;
    public $price_per_piece;
    public $price_per_package;
    public $weight_per_piece;
    public $weight_per_package;
    public $quantity_per_package;
    public $color;
    public array $custom_color = [];
    public $unit;
    public $grade;
    public $surface;
    public array $added_custom_fields = [];

    public $temp_size;
    public $temp_color;

    public $temp_field_name;
    public $temp_field_value;

    public $available_pieces_quantity;
    public $available_packages_quantity;
    public $defective_pieces_quantity;
    public $defective_packages_quantity;

    public $all_images = [];
    public $all_existing_images = [];

    public $custom_fields = [];
    public function mount($product)
    {
        $this->gst_commodities = GstCommodity::all();
        $this->user = auth()->user();
        $this->groups = $this->user->company->groups;
        $this->categories = $this->user->company->categories;

        $this->product = $product;
        $this->group_id = $product->group_id;
        $this->category_id = $product->category_id;
        $this->name = $product->name;
        $this->alias = $product->alias;
        $this->gst_commodity = $product->gst_commodity;
        $this->number = $product->number;
        $this->size = $product->size;
        $this->brand = $product->brand;
        $this->description = $product->description;
        $this->packaging_type = $product->packaging_type;
        $this->price_per_piece = $product->price_per_piece;
        $this->price_per_package = $product->price_per_package;
        $this->weight_per_piece = $product->weight_per_piece;
        $this->weight_per_package = $product->weight_per_package;
        $this->quantity_per_package = $product->quantity_per_package;
        $this->color = $product->color;
        $this->grade = $product->grade;
        $this->unit = $product->unit;
        $this->surface = $product->surface;
        $this->custom_size = json_decode($product->custom_size, TRUE);
        $this->custom_color = json_decode($product->custom_color, TRUE);
        $this->available_pieces_quantity = $product->available_pieces_quantity;
        $this->available_packages_quantity = $product->available_packages_quantity;
        $this->defective_pieces_quantity = $product->defective_pieces_quantity;
        $this->defective_packages_quantity = $product->defective_packages_quantity;
        $this->all_existing_images = $product->image;
        $this->added_custom_fields = json_decode($product->custom_fields, TRUE);
        foreach ($this->added_custom_fields as $key => $added_custom_field) {
            $this->custom_fields[$added_custom_field['field_name']] = $added_custom_field['field_value'];
        }
    }

    public function updatedImages()
    {
        $this->validate([
            'images.*' => 'image|mimes:jpg,jpeg,png|max:1024',
        ]);

        $all_images = array_merge($this->all_images, $this->images);
        if(count($all_images) + count($this->all_existing_images) > 8 ){
            $this->alert('error', 'You can upload a maximum of 8 images.', [
                'position' => 'top-right',
                'toast' => true,
            ]);
        } else {
            $this->all_images = $all_images;
        }

        /* $imageName = pathinfo($this->all_images[0]->getClientOriginalName(), PATHINFO_FILENAME);
        $numbers = preg_replace('/\D+/', '', $imageName); 

        $this->name = $imageName;
        if ($numbers) {
            $this->number = $numbers;
        } */
    }

    public function priceAndWightPerPackageCal()
    {
        if ($this->price_per_piece) {
            $this->price_per_package = (int)$this->price_per_piece*(int)$this->quantity_per_package;
        }

        if ($this->weight_per_piece) {
            $this->weight_per_package = (int)$this->weight_per_piece *(int)$this->quantity_per_package; 
        }
    }

    public function addGroup()
    {
        $validator = Validator::make($this->all(), [
            'group_name' => ['required', 'unique:groups,name']
        ]);

        if ($validator->fails()) {
            foreach ($validator->errors()->all() as $error) {
                $this->alert('error', $error, [
                    'position' => 'top-right',
                    'toast' => true,
                ]);
            }
        } else {
            $group = Group::create([
                'name' => $this->group_name,
                'short_name' => $this->group_short_name,
                'company_id' => $this->user->company->id
            ]);
            $this->groups->push($group);
            $this->reset(['group_name', 'group_short_name']);
            $this->dispatchBrowserEvent('hide-add-group-modal');
            $this->alert('success', 'The group added successfully.', [
                'position' => 'top-right',
                'toast' => true,
            ]);
        }
    }

    public function addCategory()
    {
        $validator = Validator::make($this->all(), [
            'category_name' => ['required', 'unique:categories,name']
        ]);

        if ($validator->fails()) {
            foreach ($validator->errors()->all() as $error) {
                $this->alert('error', $error, [
                    'position' => 'top-right',
                    'toast' => true,
                ]);
            }
        } else {
            $category = Category::create([
                'name' => $this->category_name,
                'short_name' => $this->category_short_name,
                'company_id' => $this->user->company->id
            ]);
            $this->categories->push($category);
            $this->reset(['category_name', 'category_short_name']);
            $this->dispatchBrowserEvent('hide-add-category-modal');
            $this->alert('success', 'Category added successfully.', [
                'position' => 'top-right',
                'toast' => true,
            ]);
        }
    }

    public function addSize()
    {
        $this->validate([
            'temp_size' => ['required']
        ]);
        array_push($this->custom_size, $this->temp_size);
        $this->reset('temp_size');
    }

    public function removeSize($key)
    {
        unset($this->custom_size[$key]);
    }

    public function addColor()
    {
        $this->validate([
            'temp_color' => ['required']
        ]);
        array_push($this->custom_color, $this->temp_color);
        $this->reset('temp_color');
    }

    public function removeColor($key)
    {
        unset($this->custom_color[$key]);
    }

    public function addCustomField(){
        $this->validate([
            'temp_field_name' => 'required',
            'temp_field_value' => 'required'
        ]);
        array_push($this->added_custom_fields, ['field_name' => $this->temp_field_name, 'field_value' => $this->temp_field_value]);
        $this->custom_fields[$this->temp_field_name] = $this->temp_field_value;
        $this->reset(['temp_field_name','temp_field_value']);
    }

    public function removeField($key)
    {
        unset($this->custom_fields[$this->added_custom_fields[$key]['field_name']]);
        unset($this->added_custom_fields[$key]);
    }

    public function saveProduct()
    {
        $this->validate([
            'group_id' => 'required',
            'category_id' => 'required',
            'name' => 'required',
            'alias' => 'required',
            // 'gst_commodity' => 'required',
            // 'number' => 'required',
            // 'size' => 'required',
            'brand' => 'required',
            // 'description' => 'required',
            // 'packaging_type' => 'required',
            'price_per_piece' => 'required',
            // 'price_per_package' => 'required',
            // 'weight_per_piece' => 'required',
            // 'weight_per_package' => 'required',
            // 'quantity_per_package' => 'required',
            // 'color' => 'required',
            // 'grade' => 'required',
            // 'unit' => 'required',
            // 'surface' => 'required',
            // 'image' => 'required'
        ]);

        $custom_fields = [];
        foreach ($this->custom_fields as $field_name => $field_value) {
            array_push($custom_fields, ['field_name' => $field_name, 'field_value' => $field_value]);
        }

        $product = Products::find($this->product->id)->update([
            'company_id' => $this->user->company->id,
            'group_id' => $this->group_id,
            'category_id' => $this->category_id,
            'name' => $this->name,
            'alias' => $this->alias,
            'gst_commodity' => $this->gst_commodity,
            'number' => $this->number,
            'size' => $this->size,
            'brand' => $this->brand,
            'description' => $this->description,
            'packaging_type' => $this->packaging_type,
            'price_per_piece' => $this->price_per_piece,
            'price_per_package' => $this->price_per_package,
            'weight_per_piece' => $this->weight_per_piece,
            'weight_per_package' => $this->weight_per_package,
            'quantity_per_package' => $this->quantity_per_package,
            'color' => $this->color,
            'grade' => $this->grade,
            'unit' => $this->unit,
            'surface' => $this->surface,
            'custom_size' => json_encode($this->custom_size),
            'custom_color' => json_encode($this->custom_color),
            'custom_fields' => json_encode($custom_fields),
            'available_pieces_quantity' => $this->available_pieces_quantity,
            'available_packages_quantity' => $this->available_packages_quantity,
            'defective_pieces_quantity' => $this->defective_pieces_quantity,
            'defective_packages_quantity' => $this->defective_packages_quantity,

        ]);

        foreach ($this->all_images as $key => $image) {
            $this->product->addMedia($image)->toMediaCollection('image');
            $this->reset(['images', 'name']);
        }

        toast('Product edited successfully!', 'success');

        return redirect()->route('erp.products.index');
    }

    public function getListeners()
    {
        return [
            'confirmed'
        ];
    }

    public function removeExistingdImage($key)
    {
        $this->all_existing_images[$key]->delete();
        unset($this->all_existing_images[$key]);
    }

    public function removeNewImage($key)
    {
        unset($this->all_images[$key]);
    }

    public function render()
    {
        return <<<'blade'
            <div>
                <form wire:submit.prevent="saveProduct">
                    <div class="row">
                        <div class="col-md-6 d-flex justify-content-center align-items-center">
                            <div class="row justify-content-start" style="min-height: 200px;width:100%">
                                @if($all_images)
                                    @foreach($all_images as $key => $image)
                                        <div class="col-auto p-0 text-center me-6 mb-4 position-relative">
                                            <img src="{{ $image->temporaryUrl() }}" style="height:100px;width:100px;" class="bg-secondary">
                                            <i class="fa fa-trash text-danger" aria-hidden="true" style="position: absolute; top: 4px; right: 5px" wire:click="removeNewImage({{$key}})"></i>
                                        </div>
                                    @endforeach
                                @endif
                                @if($all_existing_images)
                                    @foreach($all_existing_images as $key => $image)
                                        <div class="col-auto p-0 text-center me-6 mb-4 position-relative">
                                            <img src="{{ $image->getUrl() }}" style="height:100px;width:100px;" class="bg-secondary">
                                            <i class="fa fa-trash text-danger" aria-hidden="true" style="position: absolute; top: 4px; right: 5px" wire:click="removeExistingdImage({{$key}})"></i>
                                        </div>
                                    @endforeach
                                @endif
                                @if(!$all_images && !$all_existing_images)
                                    <label for="images" class="card d-flex justify-content-center align-items-center text-muted"
                                        style="height:200px;width:200px;">
                                        <small class="text-muted">Upload images</small>
                                    </label>
                                @endif
                            </div>
                        </div>

                        <div class="form-group col-md-6">
                            <label for="images">Product image</label>
                            <span class="text-danger">*</span>
                            <input type="file" class="form-control form-control-sm @error('images') is-invalid @enderror" id="images"
                                wire:model="images" multiple accept="image/*">
                            @error('images')
                                <p class="text-danger">{{$message}}</p>
                            @enderror
                        </div>
                    </div>

                    <div class="row ps-2">
                        <div class="form-group col-lg-6 col-md-6 mt-2">
                            <label for="group_id">Group</label>
                            <span class="text-danger">*</span>
                            <div class="row">
                                <select class="form-select col" id="group_id" wire:model.defer="group_id">
                                    <option value="" selected>Select Group</option>
                                    @if($groups)
                                        @foreach($groups as $group)
                                            <option value="{{$group->id}}">{{$group->name}}</option>
                                        @endforeach
                                    @endif
                                </select>
                                <button type="button" class="btn btn-primary col mx-2" data-bs-toggle="modal"
                                    data-bs-target="#modal-group">Add new group</button>
                            </div>
                            @error('group_id')
                                <p class="text-danger">{{$message}}</p>
                            @enderror
                        </div>
                        <div class="form-group col-lg-6 col-md-6  mt-2">
                            <label for="category_id">Category</label>
                            <span class="text-danger">*</span>
                            <div class="row">
                                <select class="form-select col" id="category_id" wire:model.defer="category_id">
                                    <option value="" selected>Select Category</option>
                                    @if($categories)
                                        @foreach($categories as $category)
                                            <option value="{{$category->id}}">{{$category->name}}</option>
                                        @endforeach
                                    @endif
                                </select>
                                <button type="button" class="btn btn-primary col mx-2" data-bs-toggle="modal"
                                    data-bs-target="#modal-category">Add new category</button>
                            </div>
                            @error('category_id')
                                <p class="text-danger">{{$message}}</p>
                            @enderror
                        </div>
                    </div>
                    <hr class="my-3"/>
                    <div class="row">
                        <div class="form-group col-lg-4 col-md-6 mt-2">
                            <label for="name">Name</label>
                            <span class="text-danger">*</span>
                            <input type="text" class="form-control form-control-sm" id="name" wire:model.defer="name">
                            @error('name')
                                <p class="text-danger">{{$message}}</p>
                            @enderror
                        </div>

                        <div class="form-group col-lg-4 col-md-6  mt-2">
                            <label for="alias">Alias</label>
                            <span class="text-danger">*</span>
                            <input type="text" class="form-control form-control-sm" id="alias" wire:model.defer="alias">
                            @error('alias')
                                <p class="text-danger">{{$message}}</p>
                            @enderror
                        </div>

                        <div class="form-group col-lg-4 col-md-6  mt-2">
                            <label for="gst_commodity">GST commodity</label>
                            <select class="form-select form-control form-control-sm" id="gst_commodity" wire:model.defer="gst_commodity">
                                <option value="" selected>Select GST Commodity</option>
                                @foreach($gst_commodities as $gst_commodity)
                                    <option value="{{$gst_commodity->id}}">{{$gst_commodity->description}}</option>
                                @endforeach
                            </select>
                            @error('gst_commodity')
                                <p class="text-danger">{{$message}}</p>
                            @enderror
                        </div>
                
                        <div class="form-group col-lg-4 col-md-6  mt-2">
                            <label for="number">Number</label>
                            <input type="text" class="form-control form-control-sm" id="number" wire:model.defer="number">
                            @error('number')
                                <p class="text-danger">{{$message}}</p>
                            @enderror
                        </div>

                        <div class="form-group col-lg-4 col-md-6  mt-2">
                            <label for="size">Size</label>
                            <input type="text" class="form-control form-control-sm" id="size" wire:model="size">
                            @error('size')
                                <p class="text-danger">{{$message}}</p>
                            @enderror
                        </div>

                        <div class="form-group col-lg-4 col-md-6  mt-2">
                            <label for="brand">Brand</label>
                            <span class="text-danger">*</span>
                            <input type="text" class="form-control form-control-sm" id="brand" wire:model.defer="brand">
                            @error('brand')
                                <p class="text-danger">{{$message}}</p>
                            @enderror
                        </div>
                    
                        <div class="form-group col-lg-4 col-md-6  mt-2">
                            <label for="description">Description</label>
                            <input type="text" class="form-control form-control-sm" id="description" wire:model.defer="description">
                            @error('description')
                                <p class="text-danger">{{$message}}</p>
                            @enderror
                        </div>

                        <div class="form-group col-lg-4 col-md-6  mt-2">
                            <label for="packaging_type">Packaging Type</label>
                            <input type="text" class="form-control form-control-sm" id="packaging_type" wire:model.defer="packaging_type">
                            @error('packaging_type')
                                <p class="text-danger">{{$message}}</p>
                            @enderror
                        </div>

                        <div class="form-group col-lg-4 col-md-6  mt-2">
                            <label for="price_per_piece">Price per piece</label>
                            <span class="text-danger">*</span>
                            <input type="text" class="form-control form-control-sm" id="price_per_piece" wire:model.defer="price_per_piece">
                            @error('price_per_piece')
                                <p class="text-danger">{{$message}}</p>
                            @enderror
                        </div>
                    
                        <div class="form-group col-lg-4 col-md-6  mt-2">
                            <label for="weight_per_piece">Weight per piece</label>
                            <input type="text" class="form-control form-control-sm" id="weight_per_piece" wire:model.defer="weight_per_piece">
                            @error('weight_per_piece')
                                <p class="text-danger">{{$message}}</p>
                            @enderror
                        </div>

                        <div class="form-group col-lg-4 col-md-6  mt-2">
                            <label for="quantity_per_package">Quantity per package</label>
                            <input type="text" class="form-control form-control-sm" id="quantity_per_package" wire:model.defer="quantity_per_package" wire:keyup="priceAndWightPerPackageCal">
                            @error('quantity_per_package')
                                <p class="text-danger">{{$message}}</p>
                            @enderror
                        </div>

                        <div class="form-group col-lg-4 col-md-6  mt-2">
                            <label for="price_per_package">Price per package</label>
                            <input type="text" class="form-control form-control-sm" id="price_per_package" wire:model.defer="price_per_package">
                            @error('price_per_package')
                                <p class="text-danger">{{$message}}</p>
                            @enderror
                        </div>
                    
                        <div class="form-group col-lg-4 col-md-6  mt-2">
                            <label for="weight_per_package">Weight per package</label>
                            <input type="text" class="form-control form-control-sm" id="weight_per_package" wire:model.defer="weight_per_package">
                            @error('weight_per_package')
                                <p class="text-danger">{{$message}}</p>
                            @enderror
                        </div>

                        <div class="form-group col-lg-4 col-md-6  mt-2">
                            <label for="color">Color</label>
                            <input type="text" class="form-control form-control-sm" id="color" wire:model.defer="color">
                            @error('color')
                                <p class="text-danger">{{$message}}</p>
                            @enderror
                        </div>

                        <div class="form-group col-lg-4 col-md-6  mt-2">
                            <label for="grade">Grade</label>
                            <input type="text" class="form-control form-control-sm" id="grade" wire:model.defer="grade">
                            @error('grade')
                                <p class="text-danger">{{$message}}</p>
                            @enderror
                        </div>
                    
                        <div class="form-group col-lg-4 col-md-6  mt-2">
                            <label for="unit">Unit</label>
                            <input type="text" class="form-control form-control-sm" id="unit" wire:model.defer="unit">
                            @error('unit')
                                <p class="text-danger">{{$message}}</p>
                            @enderror
                        </div>

                        <div class="form-group col-lg-4 col-md-6  mt-2">
                            <label for="surface">Surface</label>
                            <input type="text" class="form-control form-control-sm" id="surface" wire:model.defer="surface">
                            @error('surface')
                                <p class="text-danger">{{$message}}</p>
                            @enderror
                        </div>

                        <div class="form-group col-lg-4 col-md-6  mt-2">
                            <label for="available_pieces_quantity">Available pieces quantity</label>
                            <input type="text" class="form-control form-control-sm" id="available_pieces_quantity" wire:model.defer="available_pieces_quantity">
                            @error('available_pieces_quantity')
                                <p class="text-danger">{{$message}}</p>
                            @enderror
                        </div>
                    
                        <div class="form-group col-lg-4 col-md-6  mt-2">
                            <label for="available_packages_quantity">Available packages quantity</label>
                            <input type="text" class="form-control form-control-sm" id="available_packages_quantity" wire:model.defer="available_packages_quantity">
                            @error('available_packages_quantity')
                                <p class="text-danger">{{$message}}</p>
                            @enderror
                        </div>

                        <div class="form-group col-lg-4 col-md-6  mt-2">
                            <label for="defective_pieces_quantity">Defective pieces quantity</label>
                            <input type="text" class="form-control form-control-sm" id="defective_pieces_quantity" wire:model.defer="defective_pieces_quantity">
                            @error('defective_pieces_quantity')
                                <p class="text-danger">{{$message}}</p>
                            @enderror
                        </div>

                        <div class="form-group col-lg-4 col-md-6  mt-2">
                            <label for="defective_packages_quantity">Defective packages quantity</label>
                            <input type="text" class="form-control form-control-sm" id="defective_packages_quantity" wire:model.defer="defective_packages_quantity">
                            @error('defective_packages_quantity')
                                <p class="text-danger">{{$message}}</p>
                            @enderror
                        </div>
                    
                        @foreach($added_custom_fields as $key => $field)
                            <div class="form-group col-lg-4 col-md-6  mt-2">
                                <label for="surface">{{$field['field_name']}}</label>
                                <span class="text-danger">*</span>
                                <a href="javascript:void(0)" class="text-danger ms-4" wire:click="removeField({{$key}})"><i class="fa-solid fa-trash-can"></i></a>
                                <input type="text" class="form-control form-control-sm" value="{{$field['field_value']}}" required wire:model="{{'custom_fields'.'.'.$field['field_name']}}">
                            </div>
                        @endforeach
                    </div>
                    <hr />
                    <div class="row">
                        <div class="col-lg-6 col-md-12 mt-2">
                            <label for="custom_size">Custom size</label>
                            <div class="form-group d-flex">
                                <input type="text" class="form-control form-control-sm" id="custom_size" wire:model.defer="temp_size" placeholder="10 inch, XL, Big, etc....">
                                <button type="button" class="btn btn-primary float-end ms-2" wire:click="addSize">Add</button>
                            </div>
                            @error('temp_size')
                                <p class="text-danger">{{$message}}</p>
                            @enderror

                            <div class="mt-2">
                                @foreach($custom_size as $key => $size)
                                    <p class="bg-primary text-white py-1 px-2 m-0 mt-1 d-flex justify-content-between"><span>{{$size}}</span> <a href="javascript:void(0)" class="text-white" wire:click="removeSize({{$key}})"><i class="fa fa-times" aria-hidden="true" style="line-height: inherit;"></i></a></p>
                                @endforeach
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-12 mt-2">
                            <label for="custom_color">Custom color's</label>
                            <div class="form-group d-flex">
                                <input type="text" class="form-control form-control-sm" id="custom_color" wire:model.defer="temp_color" placeholder="red, blue, green, etc...">
                                <button type="button" class="btn btn-primary float-end ms-2" wire:click="addColor">Add</button>
                            </div>
                            @error('temp_color')
                                <p class="text-danger">{{$message}}</p>
                            @enderror

                            <div class="mt-2">
                                @foreach($custom_color as $key => $color)
                                    <p class="bg-primary text-white py-1 px-2 m-0 mt-1 d-flex justify-content-between"><span>{{$color}}</span> <a href="javascript:void(0)" class="text-white" wire:click="removeColor({{$key}})"><i class="fa fa-times" aria-hidden="true" style="line-height: inherit;"></i></a></p>
                                @endforeach
                            </div>
                        </div>
                    </div>

                    <hr />
                    <p class="h3">Custom field's</p>
                    <div class="row">
                        <div class="form-group col-lg-4 col-md-4">
                            <label for="field_name">Field name</label>
                            <input type="text" class="form-control form-control-sm" id="field_name" wire:model.defer="temp_field_name">
                            @error('temp_field_name')
                                <p class="text-danger">{{$message}}</p>
                            @enderror
                        </div>
                        <div class="form-group col-lg-4 col-md-4">
                            <label for="field_value">Field value</label>
                            <input type="text" class="form-control form-control-sm" id="field_value" wire:model.defer="temp_field_value">
                            @error('temp_field_value')
                                <p class="text-danger">{{$message}}</p>
                            @enderror
                        </div>
                        <div class="col-lg-4 col-md-4">
                            <label></label>
                            <button class="btn btn-primary w-100" type="button" wire:click="addCustomField">Add field</button>
                        </div>
                    </div>
                    <input type="submit" id="productFormSubmit" class="d-none">
                </form>

                <section>
                    {{-- add group modal --}}
                    <div class="modal fade" id="modal-group" tabindex="-1" aria-modal="true" wire:ignore.self>
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Add new group</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form wire:submit.prevent="addGroup">
                                        <div class="form-group mt-2">
                                            <label for="group_name">Group name</label>
                                            <input type="text" class="form-control form-control-sm" id="group_name" wire:model.defer.defer="group_name" required>
                                        </div>
                                        <div class="form-group mt-2">
                                            <label for="group_short_name">Group short name</label>
                                            <input type="text" class="form-control form-control-sm" id="group_short_name" wire:model.defer.defer="group_short_name">
                                        </div>
                                        <input type="submit" id="addGroupButton" class="d-none">
                                    </form>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn modalCloseButton me-auto" data-bs-dismiss="modal">Close</button>
                                    <label for="addGroupButton" class="btn btn-primary">Save Group</label>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- add category modal --}}
                    <div class="modal fade" id="modal-category" tabindex="-1" aria-modal="true" wire:ignore.self>
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Add new category</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form wire:submit.prevent="addCategory">
                                        <div class="form-group mt-2">
                                            <label for="category_name">Category name</label>
                                            <input type="text" class="form-control form-control-sm" id="category_name" wire:model.defer.defer="category_name" required>
                                        </div>
                                        <div class="form-group mt-2">
                                            <label for="category_short_name">Category short name</label>
                                            <input type="text" class="form-control form-control-sm" id="category_short_name" wire:model.defer.defer="category_short_name">
                                        </div>
                                        <input type="submit" id="addCategoryButton" class="d-none">
                                    </form>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn modalCloseButton me-auto" data-bs-dismiss="modal">Close</button>
                                    <label for="addCategoryButton" class="btn btn-primary">Save Category</label>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <script>
                    window.addEventListener('hide-add-group-modal', event => {
                        $('.modalCloseButton').click();
                    });

                    window.addEventListener('hide-add-category-modal', event => {
                        $('.modalCloseButton').click();
                    });
                </script>
            </div>
        blade;
    }
}
