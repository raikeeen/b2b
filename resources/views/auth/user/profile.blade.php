@extends('welcome')

@section('title','Paskyra')
@section('content')

    {{ Breadcrumbs::render('profile') }}
    <h1 class="c-headline c-headline--semi-light u-bd-secondary py-1">Paskyros redagavimas</h1>
    <div class="row">
        <div class="col-12 col-md-6">
            <form action="{{route('profile.edit')}}" method="post">
                <div data-bind="if: errorString(), attr: { hidden: false }"></div>



                <div class="c-form-group">
                    <label class="d-flex" for="country"><span>Šalis</span><span class="text-danger">*</span></label>
                    <select class="c-select" id="country" name="country" required="">
                        <option value="" disabled="">Išsirink šalį</option>
                        @foreach($countries as $country)

                        <option value="{{$country->id}}" @if( $country->id === $user->address->country_id) selected @endif>{{$country->name}}</option>
                        @endforeach
                    </select>
                </div>

                <div class="c-form-group">
                    <label for="f-100">
                        El. paštas

                        <span class="text-danger">*</span>
                    </label>
                    <input placeholder="El. paštas" class="form-control c-input" data-field-id="Email" data-val="true" data-val-email="Lauko reikšmė nėra galiojantis el. Pašto adresas." data-val-required="Laukas yra būtinas." id="f-100" name="email" required="" type="text" value="{{isset($user->email) ? $user->email : ''}}">
                    <span class="d-block validationMessage" data-valmsg-for="f-100" data-valmsg-replace="true"></span>
                </div>

                <hr class="my-4">

                <div class="c-form-group">
                    <label for="f-103">
                        Įmonės pavadinimas

                    </label>
                    <span class="text-danger">*</span>
                    <input placeholder="Įmonės pavadinimas" required class="form-control c-input" data-field-id="CompanyName" data-val="true" id="f-103" name="companyname" type="text" value="{{isset($user->address->company_name) ? $user->address->company_name : ''}}">
                    <span class="d-block validationMessage" data-valmsg-for="f-103" data-valmsg-replace="true"></span>
                </div>

                <div class="c-form-group">
                    <label for="f-104">
                        Įmonės kodas

                    </label>
                    <input placeholder="Imones kodas" class="form-control c-input" data-field-id="TaxId" data-val="true" data-val-maxlength="Laukas turi būti ne ilgesnės kaip 13 eilutės." name="vat" type="text" value="{{isset($user->address->vat) ? $user->address->vat : ''}}">
                    <span class="d-block validationMessage" data-valmsg-for="f-104" data-valmsg-replace="true"></span>
                </div>

                <div class="c-form-group">
                    <label for="f-104">
                        PVM kodas

                    </label>
                    <input placeholder="PVM kodas" class="form-control c-input" data-field-id="TaxId" data-val="true" data-val-maxlength="Laukas turi būti ne ilgesnės kaip 13 eilutės." data-val-maxlength-max="13" data-val-regex="Laukas turi atitikti įprastinę išraišką ^(?!PL|AT|BE|BG|CY|CZ|DE|DK|EE|EL|GR|ES|FI|FR|GB|HU|IE|IT|LT|LU|LV|MT|NL|PT|RO|SE|SI|SK).*$." id="f-104" maxlength="13" name="pvm" type="text" value="{{isset($user->address->pvm) ? $user->address->pvm : ''}}">
                    <span class="d-block validationMessage" data-valmsg-for="f-104" data-valmsg-replace="true"></span>
                </div>

                <hr class="mt-2 mb-3">

                <div class="c-form-group">
                    <label for="f-105">
                        Telefono numeris

                    </label>
                    <input placeholder="Telefono numeris" class="form-control c-input" data-field-id="Phone" data-val="true" data-val-regex="Laukas turi atitikti įprastinę išraišką ^[0-9]+-?[0-9]+-?[0-9]+-?[0-9]+-?[0-9]*$." data-val-regex-pattern="^[0-9]+-?[0-9]+-?[0-9]+-?[0-9]+-?[0-9]*$" id="f-105" name="phone" pattern="^[0-9]+-?[0-9]+-?[0-9]+-?[0-9]+-?[0-9]*$" type="text" value="{{isset($user->address->phone) ? $user->address->phone : ''}}">
                    <span class="d-block validationMessage" data-valmsg-for="f-105" data-valmsg-replace="true"></span>
                </div>

                <div class="row">
                    <div class="col-12 col-lg-6">

                        <div class="c-form-group">
                            <label for="f-106">
                                Gatvė
                            </label>
                            <input placeholder="Gatvė" class="form-control c-input" data-field-id="Street" data-val="true" data-val-required="Laukas yra būtinas." id="f-106" name="street" type="text" value="{{isset($user->address->street) ? $user->address->street : ''}}">
                            <span class="d-block validationMessage" data-valmsg-for="f-106" data-valmsg-replace="true"></span>
                        </div>

                    </div>
                    <div class="col-6 col-lg-3">

                        <div class="c-form-group">
                            <label for="f-107">
                                Pastatas
                            </label>
                            <input placeholder="Pastatas" class="form-control c-input" data-field-id="BuildingNumber" data-val="true" data-val-required="Laukas yra būtinas." id="f-107" name="building" type="text" value="{{isset($user->address->building) ? $user->address->building : ''}}">
                            <span class="d-block validationMessage" data-valmsg-for="f-107" data-valmsg-replace="true"></span>
                        </div>

                    </div>
                    <div class="col-6 col-lg-3">

                        <div class="c-form-group">
                            <label for="f-108">
                                Butas

                            </label>
                            <input placeholder="Butas" class="form-control c-input" data-field-id="FlatNumber" data-val="true" id="f-108" name="apartment" type="text" value="{{isset($user->address->apartment) ? $user->address->apartment : ''}}">
                            <span class="d-block validationMessage" data-valmsg-for="f-108" data-valmsg-replace="true"></span>
                        </div>

                    </div>
                    <div class="col-7 col-lg-8">

                        <div class="c-form-group">
                            <div style="    margin-bottom: .25rem;font-size: .95rem;font-weight: bold;">
                                Miestas

                                <span class="text-danger">*</span>
                            </div>

                                <select class="c-select" id="city" name="city" required="">
                                    <option value="" disabled="">Išsirink šalį</option>
                                    @foreach($cities as $city)

                                        <option value="{{$city->id}}" @if( $city->id === $user->address->city_id) selected @endif>{{$city->name}}</option>
                                    @endforeach
                                </select>
                        </div>

                    </div>
                    <div class="col-5 col-lg-4">

                        <div class="c-form-group">
                            <label for="f-109">
                                Pašto kodas
                            </label>
                            <input placeholder="Pašto kodas" class="form-control c-input" data-field-id="Postcode" data-val="true" data-val-maxlength="Laukas turi būti ne ilgesnės kaip 10 eilutės." data-val-maxlength-max="10" data-val-regex="Laukas turi atitikti įprastinę išraišką (^\d{5}$)."  data-val-required="Laukas yra būtinas." id="f-109" maxlength="10" name="postcode" type="text" value="{{isset($user->address->post_code) ? $user->address->post_code : ''}}">
                            <span class="d-block validationMessage" data-valmsg-for="f-109" data-valmsg-replace="true"></span>
                        </div>

                    </div>
                </div>


                <div class="c-form-group">
                    <label for="f-101">
                        Vardas
                    </label>
                    <input placeholder="Pavadinimas" class="form-control c-input" data-field-id="Name" data-val="true" data-val-required="Laukas yra būtinas." id="f-101" name="name" type="text" value="{{isset($user->name) ? $user->name : ''}}">
                    <span class="d-block validationMessage" data-valmsg-for="f-101" data-valmsg-replace="true"></span>
                </div>

                <div class="c-form-group">
                    <label for="f-102">
                        Pavardė
                    </label>
                    <input placeholder="Pavardė" class="form-control c-input" data-field-id="Surname" data-val="true" data-val-required="Laukas yra būtinas." id="f-102" name="surname" type="text" value="{{isset($user->surname) ? $user->surname : ''}}">
                    <span class="d-block validationMessage" data-valmsg-for="f-102" data-valmsg-replace="true"></span>
                </div>


                <div class="custom-control custom-checkbox my-2">
                    <input type="hidden" value="field-binded" name="AcceptMarketing" checked>
                    <input class="custom-control-input" data-field-id="AcceptMarketing" checked data-val="true" id="f-114" name="AcceptMarketing" type="checkbox" value="AcceptMarketing">
                    <label class="custom-control-label px-3" for="f-114">Sutinku gauti komercinę informaciją</label>
                </div>
                <span class="d-block validationMessage" data-valmsg-for="f-114" data-valmsg-replace="true"></span>


                <div class="custom-control custom-checkbox my-2">
                    <input type="hidden" value="field-binded" name="AcceptNewsletter" checked>
                    <input class="custom-control-input" data-field-id="AcceptNewsletter" checked data-val="true" id="f-115" name="AcceptNewsletter" type="checkbox" value="AcceptNewsletter">
                    <label class="custom-control-label px-3" for="f-115">Sutinku gauti naujienlaiškį ir būti informuotas apie akcijas</label>
                </div>
                <span class="d-block validationMessage" data-valmsg-for="f-115" data-valmsg-replace="true"></span>
                <button  type="submit" class="c-btn c-btn--primary mt-3" data-loading="Prašome palaukti ...">
                    <span>Išsaugokite pakeitimus</span>
                </button>
                {{csrf_field()}}
            </form>
        </div>
    </div>
@endsection
