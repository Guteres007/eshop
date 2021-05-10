@extends('admin._layouts.admin-layout')

@section('container')

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header"><strong>Produkt</strong></div>
                <div class="card-body">


                    <form class="row" action="{{ route('admin.product.update', $product->id) }}" autocomplete="off"
                        method="POST" enctype="multipart/form-data" id="product_form">
                        @method("PUT")
                        @csrf
                    </form>

                    <div class="row">
                        <div class="col-12">
                            <div class="nav-tabs-boxed">
                                <ul class="nav nav-tabs" role="tablist">
                                    <li class="nav-item"><a class="nav-link active" data-toggle="tab" href="#home"
                                            role="tab" aria-controls="home" aria-selected="true">Základní informace</a></li>

                                    <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#price" role="tab"
                                            aria-controls="price" aria-selected="false">Ceny a sklad</a></li>
                                    <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#images" role="tab"
                                            aria-controls="images" aria-selected="false">Obrázky</a></li>
                                    <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#parameters" role="tab"
                                            aria-controls="parameters" aria-selected="false">Parametry</a></li>
                                    <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#category" role="tab"
                                            aria-controls="category" aria-selected="false">Kategorie</a></li>
                                </ul>



                                <div class="tab-content">
                                    <div class="tab-pane active" id="home" role="tabpanel">
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label for="name">Jméno produktu <span
                                                            class="color-red">{{ $errors->first('name') }}</span></label>
                                                    <input class="form-control" name="name" form="product_form" type="text"
                                                        value="{{ $product->name }}">
                                                </div>
                                            </div>



                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label for="name">Interní id <span
                                                            class="color-red">{{ $errors->first('internal_id') }}</span></label>
                                                    <input class="form-control" name="internal_id" form="product_form"
                                                        type="text" value="{{ $product->internal_id }}">
                                                </div>
                                            </div>

                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label for="name">EAN <span
                                                            class="color-red">{{ $errors->first('ean') }}</span></label>
                                                    <input form="product_form" class="form-control" name="ean" type="text"
                                                        value="{{ $product->ean }}">
                                                </div>
                                            </div>

                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <div class="form-check checkbox">
                                                        <input form="product_form" class="form-check-input" name="active"
                                                            id="check1" type="checkbox"
                                                            {{ $product->active ? 'checked' : '' }}>
                                                        <label class="form-check-label" for="check1">Aktivní</label>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label for="name">Popis produktu <span
                                                            class="color-red">{{ $errors->first('description') }}</span></label>
                                                    <textarea class="form-control" form="product_form" name="description"
                                                        type="text">{{ $product->description }}</textarea>
                                                </div>
                                            </div>



                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label for="name">Krátký popis<span
                                                            class="color-red">{{ $errors->first('short_description') }}</span></label>
                                                    <textarea form="product_form" class="form-control"
                                                        name="short_description"
                                                        type="text">{{ $product->short_description }}</textarea>
                                                </div>
                                            </div>




                                            <div class="col-sm-12">
                                                <div class="form-group">
                                                    <label for="name">Dlouhý popis <span
                                                            class="color-red">{{ $errors->first('long_description') }}</span></label>
                                                    <textarea class="editor" form="product_form" class="form-control"
                                                        name="long_description"
                                                        type="text">{{ $product->long_description }}</textarea>
                                                </div>
                                            </div>





                                        </div>
                                    </div>



                                    <div class="tab-pane" id="price" role="tabpanel">

                                        <div class="row">
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label for="name">Cena <span
                                                            class="color-red">{{ $errors->first('price') }}</span></label>
                                                    <input form="product_form" class="form-control" name="price" type="text"
                                                        value="{{ $product->price->raw() }}">
                                                </div>
                                            </div>

                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label for="name">Cena bez DPH <span
                                                            class="color-red">{{ $errors->first('price_without_vat') }}</span></label>
                                                    <input form="product_form" class="form-control" name="price_without_vat"
                                                        type="text" value="{{ $product->price_without_vat->raw() }}">
                                                </div>
                                            </div>

                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label for="name">Nákupní cena <span
                                                            class="color-red">{{ $errors->first('shopping_price') }}</span></label>
                                                    <input form="product_form" class="form-control" name="shopping_price"
                                                        type="text" value="{{ $product->shopping_price->raw() }}">
                                                </div>
                                            </div>

                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label for="name">Akční cena <span
                                                            class="color-red">{{ $errors->first('action_price') }}</span></label>
                                                    <input form="product_form" class="form-control" name="action_price"
                                                        type="text" value="{{ $product->action_price->raw() }}">
                                                </div>
                                            </div>

                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label for="name">Počet kusů skladem <span
                                                            class="color-red">{{ $errors->first('quantity') }}</span></label>
                                                    <input form="product_form" class="form-control" name="quantity"
                                                        type="text" value="{{ $product->quantity }}">
                                                </div>
                                            </div>



                                        </div>

                                    </div>



                                    <div class="tab-pane" id="images" role="tabpanel">
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="uploaded-images row">

                                                    @foreach ($product->images as $image)
                                                        <span class="col-2" data-id="{{ $image->id }}">
                                                            <div class="card">
                                                                <img style="min-width:150px; width:100%"
                                                                    data-image-name="{{ $image->name }}"
                                                                    src="/storage/{{ $image->path }}">
                                                                <span
                                                                    class="remove-image btn btn-danger mt-2">Odstranit</span>
                                                            </div>
                                                        </span>
                                                    @endforeach

                                                </div>
                                                <form
                                                    action="{{ route('admin.product-image-upload.store', ['id' => $product->id]) }}"
                                                    id="image_uploader" class="dropzone__own-style col-12">
                                                    @csrf
                                                    <div class="dz-message" data-dz-message><span>Přetáhněte obrázky
                                                            sem</span>
                                                    </div>

                                                </form>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="tab-pane" id="parameters" role="tabpanel">
                                        <div class="row">
                                            <div class="col-sm-12" id="parameters-container">
                                                @foreach ($product->parameters()->get() as $product_parameter)


                                                    <div class="row">

                                                        <div class="col-5 mt-3">
                                                            <span
                                                                class="color-red">{{ $errors->first('parameters') }}</span>
                                                            <input form="product_form" class="parameters_name form-control"
                                                                type="text" name="parameters[name][]"
                                                                placeholder="Parametr název"
                                                                value="{{ $product_parameter->name }}">
                                                        </div>
                                                        <div class="col-5 mt-3">

                                                            <input form="product_form" class="parameters_value form-control"
                                                                type="text" name="parameters[value][]"
                                                                placeholder="Parametr hodnota"
                                                                value="{{ $product_parameter->value }}">
                                                        </div>

                                                        <div class="col-2 mt-3">

                                                            <button onclick="return removeParameter(this)" type="button"
                                                                class="btn btn-outline-danger">Odstranit
                                                                parametr</button>
                                                        </div>


                                                    </div>

                                                @endforeach

                                            </div>

                                        </div>
                                        <div class="row">
                                            <div class="col-12 mt-3">
                                                <button onclick="return addParameter()" type="button"
                                                    class="btn btn-outline-success">Přidat
                                                    parametr</button>
                                            </div>
                                        </div>
                                    </div>


                                    <div class="tab-pane" id="category" role="tabpanel">
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <div class="form-group">

                                                    <label class="col-form-label" for="multiple-select">Kategorie <span
                                                            class="color-red">{{ $errors->first('category_id') }}</span></label>
                                                    <select form="product_form" class="form-control" id="multiple-select"
                                                        name="category_id[]" size="6" multiple="true">

                                                        @foreach ($categories as $category)
                                                            <option
                                                                {{ in_array($category->id, $selected_category) ? 'selected' : '' }}
                                                                value="{{ $category->id }}">
                                                                {{ $category->name }}
                                                            </option>
                                                        @endforeach
                                                    </select>

                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>


                            </div>
                        </div>
                    </div>


                </div>

                <div class="card-footer">
                    <input type="hidden" form="product_form" name="product_id" id="product_id"
                        value="{{ $product->id }}">
                    <button class="btn btn-success" form="product_form" type="submit">Editovat</button>
                </div>
            </div>
        </div>
    </div>
    <ul>

    @endsection
