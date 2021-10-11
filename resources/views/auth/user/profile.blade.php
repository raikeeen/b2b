@extends('welcome')

@section('title','Paskyra')
@section('content')

    {{ Breadcrumbs::render('profile') }}
    <h1 class="c-headline c-headline--semi-light u-bd-secondary py-1">Paskyros redagavimas</h1>
    <div class="row">
        <div class="col-12 col-md-6">
            <form data-bind="submit: submit.bind($root, $element, function () {})" action="https://www.rm-autodalys.eu/api/manage-account" method="post">
                <div data-bind="if: errorString(), attr: { hidden: false }"></div>



                <div class="c-form-group">
                    <label class="d-flex" for="country"><span>Šalis</span><span class="text-danger">*</span></label>
                    <select class="c-select" id="country" name="Country" required="">
                        <option value="" disabled="" selected="">Išsirink šalį</option>
                        <option value="LT">Lithuania</option>
                        <option value="LV">Latvia</option>
                        <option value="SE">Sweden</option>
                        <option value="PL">Poland</option>
                    </select>
                </div>

                <div class="c-form-group">
                    <label for="f-100">
                        El. paštas

                        <span class="text-danger">*</span>
                    </label>
                    <input placeholder="El. paštas" class="form-control c-input" data-field-id="Email" data-val="true" data-val-email="Lauko reikšmė nėra galiojantis el. Pašto adresas." data-val-required="Laukas yra būtinas." id="f-100" name="Email" required="" type="text" value="varuosad@007.ee">
                    <span class="d-block validationMessage" data-valmsg-for="f-100" data-valmsg-replace="true"></span>
                </div>

                <hr class="my-4">

                <div class="c-form-group">
                    <label for="f-103">
                        Įmonės pavadinimas

                    </label>
                    <input placeholder="Įmonės pavadinimas" class="form-control c-input" data-field-id="CompanyName" data-val="true" id="f-103" name="CompanyName" type="text" value="007 AUTOHAUS OÜ">
                    <span class="d-block validationMessage" data-valmsg-for="f-103" data-valmsg-replace="true"></span>
                </div>

                <div class="c-form-group">
                    <label for="f-104">
                        PVM kodas

                    </label>
                    <input placeholder="PVM kodas" class="form-control c-input" data-field-id="TaxId" data-val="true" data-val-maxlength="Laukas turi būti ne ilgesnės kaip 13 eilutės." data-val-maxlength-max="13" data-val-regex="Laukas turi atitikti įprastinę išraišką ^(?!PL|AT|BE|BG|CY|CZ|DE|DK|EE|EL|GR|ES|FI|FR|GB|HU|IE|IT|LT|LU|LV|MT|NL|PT|RO|SE|SI|SK).*$." data-val-regex-pattern="^(?!PL|AT|BE|BG|CY|CZ|DE|DK|EE|EL|GR|ES|FI|FR|GB|HU|IE|IT|LT|LU|LV|MT|NL|PT|RO|SE|SI|SK).*$" id="f-104" maxlength="13" name="TaxId" pattern="^(?!PL|AT|BE|BG|CY|CZ|DE|DK|EE|EL|GR|ES|FI|FR|GB|HU|IE|IT|LT|LU|LV|MT|NL|PT|RO|SE|SI|SK).*$" type="text" value="">
                    <span class="d-block validationMessage" data-valmsg-for="f-104" data-valmsg-replace="true"></span>
                </div>
                <hr class="mt-2 mb-3">

                <div class="c-form-group">
                    <label for="f-105">
                        Telefono numeris

                    </label>
                    <input placeholder="Telefono numeris" class="form-control c-input" data-field-id="Phone" data-val="true" data-val-regex="Laukas turi atitikti įprastinę išraišką ^[0-9]+-?[0-9]+-?[0-9]+-?[0-9]+-?[0-9]*$." data-val-regex-pattern="^[0-9]+-?[0-9]+-?[0-9]+-?[0-9]+-?[0-9]*$" id="f-105" name="Phone" pattern="^[0-9]+-?[0-9]+-?[0-9]+-?[0-9]+-?[0-9]*$" type="text" value="">
                    <span class="d-block validationMessage" data-valmsg-for="f-105" data-valmsg-replace="true"></span>
                </div>

                <div class="row">
                    <div class="col-12 col-lg-6">

                        <div class="c-form-group">
                            <label for="f-106">
                                Gatvė

                                <span class="text-danger">*</span>
                            </label>
                            <input placeholder="Gatvė" class="form-control c-input" data-field-id="Street" data-val="true" data-val-required="Laukas yra būtinas." id="f-106" name="Street" required="" type="text" value="Tartumaa">
                            <span class="d-block validationMessage" data-valmsg-for="f-106" data-valmsg-replace="true"></span>
                        </div>

                    </div>
                    <div class="col-6 col-lg-3">

                        <div class="c-form-group">
                            <label for="f-107">
                                Pastatas

                                <span class="text-danger">*</span>
                            </label>
                            <input placeholder="Pastatas" class="form-control c-input" data-field-id="BuildingNumber" data-val="true" data-val-required="Laukas yra būtinas." id="f-107" name="BuildingNumber" required="" type="text" value="">
                            <span class="d-block validationMessage" data-valmsg-for="f-107" data-valmsg-replace="true"></span>
                        </div>

                    </div>
                    <div class="col-6 col-lg-3">

                        <div class="c-form-group">
                            <label for="f-108">
                                Butas

                            </label>
                            <input placeholder="Butas" class="form-control c-input" data-field-id="FlatNumber" data-val="true" id="f-108" name="FlatNumber" type="text" value="">
                            <span class="d-block validationMessage" data-valmsg-for="f-108" data-valmsg-replace="true"></span>
                        </div>

                    </div>
                    <div class="col-7 col-lg-8">

                        <div class="c-form-group">
                            <label for="f-110">
                                Miestas

                                <span class="text-danger">*</span>
                            </label>
                            <input placeholder="Miestas" class="form-control c-input" data-field-id="City" data-val="true" data-val-required="Laukas yra būtinas." id="f-110" name="City" required="" type="text" value="">
                            <span class="d-block validationMessage" data-valmsg-for="f-110" data-valmsg-replace="true"></span>
                        </div>

                    </div>
                    <div class="col-5 col-lg-4">

                        <div class="c-form-group">
                            <label for="f-109">
                                Pašto kodas

                                <span class="text-danger">*</span>
                            </label>
                            <input placeholder="Pašto kodas" class="form-control c-input" data-field-id="Postcode" data-val="true" data-val-maxlength="Laukas turi būti ne ilgesnės kaip 10 eilutės." data-val-maxlength-max="10" data-val-regex="Laukas turi atitikti įprastinę išraišką (^\d{5}$)." data-val-regex-pattern="(^\d{5}$)" data-val-required="Laukas yra būtinas." id="f-109" maxlength="10" name="Postcode" pattern="(^\d{5}$)" required="" type="text" value="">
                            <span class="d-block validationMessage" data-valmsg-for="f-109" data-valmsg-replace="true"></span>
                        </div>

                    </div>
                </div>


                <div class="c-form-group">
                    <label for="f-101">
                        Pavadinimas

                        <span class="text-danger">*</span>
                    </label>
                    <input placeholder="Pavadinimas" class="form-control c-input" data-field-id="Name" data-val="true" data-val-required="Laukas yra būtinas." id="f-101" name="Name" required="" type="text" value="007 AUTOHAUS OÜ">
                    <span class="d-block validationMessage" data-valmsg-for="f-101" data-valmsg-replace="true"></span>
                </div>

                <div class="c-form-group">
                    <label for="f-102">
                        Pavardė

                        <span class="text-danger">*</span>
                    </label>
                    <input placeholder="Pavardė" class="form-control c-input" data-field-id="Surname" data-val="true" data-val-required="Laukas yra būtinas." id="f-102" name="Surname" required="" type="text" value="">
                    <span class="d-block validationMessage" data-valmsg-for="f-102" data-valmsg-replace="true"></span>
                </div>


                <div class="custom-control custom-checkbox my-2">
                    <input type="hidden" value="field-binded" name="AcceptMarketing"><input class="custom-control-input" data-field-id="AcceptMarketing" data-val="true" id="f-114" name="AcceptMarketing" type="checkbox" value="AcceptMarketing">
                    <label class="custom-control-label px-3" for="f-114">Sutinku gauti komercinę informaciją</label>
                </div>
                <span class="d-block validationMessage" data-valmsg-for="f-114" data-valmsg-replace="true"></span>


                <div class="custom-control custom-checkbox my-2">
                    <input type="hidden" value="field-binded" name="AcceptNewsletter"><input class="custom-control-input" data-field-id="AcceptNewsletter" data-val="true" id="f-115" name="AcceptNewsletter" type="checkbox" value="AcceptNewsletter">
                    <label class="custom-control-label px-3" for="f-115">Sutinku gauti naujienlaiškį</label>
                </div>
                <span class="d-block validationMessage" data-valmsg-for="f-115" data-valmsg-replace="true"></span>
                <button data-bind="css: { 'c-btn--loading': submitted() }" type="submit" class="c-btn c-btn--primary mt-3" data-loading="Prašome palaukti ...">
                    <span>Išsaugokite pakeitimus</span>
                </button>
                <input name="__RequestVerificationToken" type="hidden" value="CfDJ8FgVZIDTQbtHvQ4qq4bq8ijK_wYo2-H8ckixzpCI7S7Wsk8SEItrl5tUYOAn3TSLP52ToMrU5SJ0kQYTucd-03-sq2-C_aiHuATZygRiMBorHfyOAnhvV1rAgviShpj48aEYp5GRzOB4x2mrQM-e2RVGrteWTz49OMtRmenxkI9IbKuyjlLIwy2C_VqwLhX3dg"></form>
        </div>
    </div>
@endsection
