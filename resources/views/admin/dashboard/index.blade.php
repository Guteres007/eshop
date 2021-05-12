@extends('admin._layouts.admin-layout')

@section('container')
    <div class="fade-in">
        <div class="row">
            <div class="col-sm-6 col-lg-3">
                <div class="card text-white bg-primary">
                    <div class="card-body card-body d-flex justify-content-between align-items-start">
                        <div>
                            <div class="text-value-lg">87 548 Kč</div>
                            <div>Obrat</div>
                        </div>

                    </div>

                </div>
            </div>

            <div class="col-sm-6 col-lg-3">
                <div class="card text-white bg-success">
                    <div class="card-body card-body d-flex justify-content-between align-items-start">
                        <div>
                            <div class="text-value-lg">23 430 Kč</div>
                            <div>Zisk</div>
                        </div>

                    </div>

                </div>
            </div>



            <div class="col-sm-6 col-lg-3">
                <div class="card text-white bg-info">
                    <div class="card-body card-body d-flex justify-content-between align-items-start">
                        <div>
                            <div class="text-value-lg">57</div>
                            <div>Počet objednávek za měsíc</div>
                        </div>

                    </div>

                </div>
            </div>


            <div class="col-sm-6 col-lg-3">
                <div class="card text-white bg-danger">
                    <div class="card-body card-body d-flex justify-content-between align-items-start">
                        <div>
                            <div class="text-value-lg">2</div>
                            <div>Počet objednávek dnes</div>
                        </div>

                    </div>

                </div>
            </div>

        </div>





        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Dnešní objednávky</div>
                    <div class="card-body">


                        <table class="table table-responsive-sm table-hover table-outline mb-0">
                            <thead class="thead-light">
                                <tr>
                                    <th>Kód a datum</th>
                                    <th>Jméno a přijmení</th>
                                    <th>Doprava</th>
                                    <th>Platba</th>

                                    <th>Stav</th>
                                    <th>Cena</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>

                                    <td>
                                        <div>#2021174</div>
                                        <div class="small text-muted"> 12. 5. 2021</div>
                                    </td>

                                    <td>

                                        Marika Tobiášová
                                    </td>
                                    <td>
                                        PPL
                                    </td>
                                    <td>
                                        Kartou
                                    </td>
                                    <td>
                                        <select class="form-control" name="" id="">
                                            <option value="4">Stornována</option>
                                            <option value="3" selected>Nevyřízena</option>
                                            <option value="2">Vyřizuje se</option>
                                            <option value="1">Vyřízena</option>
                                        </select>
                                    </td>
                                    <td>
                                        543 Kč
                                    </td>
                                    <td>
                                        <a class="btn btn-secondary btn-sm" href="#"> <i class="cil-print c-icon"></i></a>
                                        <a class="btn btn-primary btn-sm" href="#"> <i class="cil-basket c-icon"></i></a>
                                    </td>
                                </tr>

                                <tr>

                                    <td>
                                        <div>#2021173</div>
                                        <div class="small text-muted"> 12. 5. 2021</div>
                                    </td>

                                    <td>

                                        Veronika Rychlá
                                    </td>
                                    <td>
                                        ČP
                                    </td>
                                    <td>
                                        Dobírka
                                    </td>
                                    <td>
                                        <select class="form-control" name="" id="">
                                            <option value="4">Stornována</option>
                                            <option value="3" selected>Nevyřízena</option>
                                            <option value="2">Vyřizuje se</option>
                                            <option value="1">Vyřízena</option>
                                        </select>
                                    </td>
                                    <td>
                                        419 Kč
                                    </td>
                                    <td>
                                        <a class="btn btn-secondary btn-sm" href="#"> <i class="cil-print c-icon"></i></a>
                                        <a class="btn btn-primary btn-sm" href="#"> <i class="cil-basket c-icon"></i></a>

                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>

    </div>
@endsection
