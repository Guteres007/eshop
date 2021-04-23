@extends('admin._layouts.admin-layout')

@section('container')

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header"><strong>Produkt</strong></div>
                <div class="card-body">
                    <form class="row" action="{{ route('admin.product.update', $product->id) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        @method("PUT")
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="name">Jméno produktu <span
                                        class="color-red">{{ $errors->first('name') }}</span></label>
                                <input class="form-control" name="name" type="text" value="{{ $product->name }}">
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="form-group">

                                <label class="col-form-label" for="multiple-select">Kategorie <span
                                        class="color-red">{{ $errors->first('category_id') }}</span></label>
                                <select class="form-control" id="multiple-select" name="category_id[]" size="6"
                                    multiple="true">

                                    @foreach ($categories as $category)
                                        <option {{ in_array($category->id, $selected_category) ? 'selected' : '' }}
                                            value="{{ $category->id }}">
                                            {{ $category->name }}
                                        </option>
                                    @endforeach
                                </select>

                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="name">Interní id <span
                                        class="color-red">{{ $errors->first('internal_id') }}</span></label>
                                <input class="form-control" name="internal_id" type="text"
                                    value="{{ $product->internal_id }}">
                            </div>
                        </div>


                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="name">Popis produktu <span
                                        class="color-red">{{ $errors->first('description') }}</span></label>
                                <textarea class="form-control" name="description"
                                    type="text">{{ $product->description }}</textarea>
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="name">Dlouhý popis <span
                                        class="color-red">{{ $errors->first('long_description') }}</span></label>
                                <textarea class="form-control" name="long_description"
                                    type="text">{{ $product->long_description }}</textarea>
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="name">Krátký popis produktu <span
                                        class="color-red">{{ $errors->first('short_description') }}</span></label>
                                <textarea class="form-control" name="short_description"
                                    type="text">{{ $product->short_description }}</textarea>
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="name">Cena <span
                                        class="color-red">{{ $errors->first('price') }}</span></label>
                                <input class="form-control" name="price" type="text"
                                    value="{{ $product->price->formated() }}">
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="name">Cena bez DPH <span
                                        class="color-red">{{ $errors->first('price_without_vat') }}</span></label>
                                <input class="form-control" name="price_without_vat" type="text"
                                    value="{{ $product->price_without_vat->formated() }}">
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="name">Nákupní cena <span
                                        class="color-red">{{ $errors->first('shopping_price') }}</span></label>
                                <input class="form-control" name="shopping_price" type="text"
                                    value="{{ $product->shopping_price->formated() }}">
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="name">Počet kusů skladem <span
                                        class="color-red">{{ $errors->first('quantity') }}</span></label>
                                <input class="form-control" name="quantity" type="text" value="{{ $product->quantity }}">
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="name">EAN <span class="color-red">{{ $errors->first('ean') }}</span></label>
                                <input class="form-control" name="ean" type="text" value="{{ $product->ean }}">
                            </div>
                        </div>


                        <div class="col-sm-6">
                            <div class="form-group">
                                <div class="form-check checkbox">
                                    <input class="form-check-input" name="active" id="check1" type="checkbox"
                                        {{ $product->active ? 'checked' : '' }}>
                                    <label class="form-check-label" for="check1">Aktivní</label>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="file-multiple-input">Obrázky <span
                                        class="color-red">{{ $errors->first('images') }}{{ $errors->first('images.*') }}</span></label>
                                <input id="file-multiple-input" type="file" name="images[]" multiple>
                            </div>
                        </div>

                        @foreach ($product->images as $image)
                            <img style="width: 150px;" src="{{ asset('storage/' . ($image->path ?? '')) }}"
                                alt="{{ $image->name ?? '' }}">
                        @endforeach




                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="name">Parametry <span
                                        class="color-red">{{ $errors->first('parameters') }}</span></label>

                                @if ($product->parameters->count() > 0)

                                    @foreach ($product->parameters as $parameter)
                                        <input class="form-control" name="parameters[name][]" type="text"
                                            placeholder="Název" value="{{ $parameter->name }}">
                                        <input class="form-control" name="parameters[value][]" type="text"
                                            placeholder="Hodnota"
                                            value="{{ $parameter->parameter_values->first()->value }}">
                                    @endforeach
                                @else

                                    <input class="form-control" name="parameters[name][]" type="text" placeholder="Název">
                                    <input class="form-control" name="parameters[value][]" type="text"
                                        placeholder="Hodnota">

                                    <input class="form-control" name="parameters[name][]" type="text" placeholder="Název">
                                    <input class="form-control" name="parameters[value][]" type="text"
                                        placeholder="Hodnota">

                                @endif
                            </div>
                        </div>



                        <div class="col-sm-12">
                            <div class="form-group">
                                <button class="btn btn-success" type="submit">Editovat</button>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
    <ul>

    @endsection
