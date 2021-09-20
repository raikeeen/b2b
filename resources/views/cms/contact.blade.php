@extends('welcome')

@section('title','Contact')
@section('content')
    <div class="row">
        <div class="col-12 col-md-6">
      <span class="c-headline c-headline--sm mb-4">
        <span>Kontaktiniai duomenys</span>
      </span>
            <div class="mb-4">


                <div class="mt-2 font-weight-bold text-nowrap">MB Kavateka</div>
                <div>Panerių g. 39</div>
                <div class="mb-2">03202 Vilnius</div>
                <div>
                    e-mail: <a href="mailto:info@rm-autodalys.lt" style="color: inherit;" title="info@rm-autodalys.lt">info@rm-autodalys.lt</a>
                </div>
                <div>
                    tel: <a href="tel:+370 691 31237" style="color: inherit;" title="+370 691 31237">+370 691 31237</a>
                </div>

            </div>
        </div>
        <div class="col-12 col-md-6">
            <div class="c-headline c-headline--sm">
                <span>Kontaktinė forma</span>
            </div>


            <div id="hook_contactform" class="" data-asp-hook="49" data-asp-hook-name="ContactForm">
                <!-- ContactFormControl -->

                <div data-control-hook-id="49" data-control-id="3" data-control-order="1" data-control-name="ContactFormControl" data-control-type="EmailForm">

                    <form class="c-contact-form clearfix" data-bind="submit: submit" action="https://www.rm-autodalys.eu/api/email-form/send-form/2" method="post">

                        <div class="c-form-group">
                            <label for="f-100">
                                Vardas ir pavardė

                                <span class="text-danger">*</span>
                            </label>
                            <input placeholder="Vardas ir pavardė" class="form-control c-input" data-field-id="Name" data-val="true" data-val-required="Laukas yra būtinas." id="f-100" name="Name" required="" type="text" value="">
                            <span class="d-block validationMessage" data-valmsg-for="f-100" data-valmsg-replace="true"></span>
                        </div>

                        <div class="c-form-group">
                            <label for="f-101">
                                Elektroninio pašto adresas

                                <span class="text-danger">*</span>
                            </label>
                            <input placeholder="Elektroninio pašto adresas" class="form-control c-input" data-field-id="ReplyToEmail" data-val="true" data-val-email="Lauko reikšmė nėra galiojantis el. Pašto adresas." data-val-required="Laukas yra būtinas." id="f-101" name="ReplyToEmail" required="" type="text" value="">
                            <span class="d-block validationMessage" data-valmsg-for="f-101" data-valmsg-replace="true"></span>
                        </div>

                        <div class="c-form-group">
                            <label for="f-102">
                                Tema

                                <span class="text-danger">*</span>
                            </label>
                            <input placeholder="Tema" class="form-control c-input" data-field-id="Subject" data-val="true" data-val-required="Laukas yra būtinas." id="f-102" name="Subject" required="" type="text" value="">
                            <span class="d-block validationMessage" data-valmsg-for="f-102" data-valmsg-replace="true"></span>
                        </div>

                        <div class="c-form-group">
                            <label for="f-103">
                                Žinutė

                                <span class="text-danger">*</span>
                            </label>
                            <textarea placeholder="Žinutė" class="form-control c-input" data-field-id="Message" data-val="true" data-val-required="Laukas yra būtinas." id="f-103" name="Message" required=""></textarea>
                            <span class="d-block validationMessage" data-valmsg-for="f-103" data-valmsg-replace="true"></span>
                        </div>

                        <div class="my-3"></div>
                        <div data-bind="if: errorString() !== undefined, attr: { hidden: false }"></div>
                        <button class="c-btn c-btn--primary" type="submit" data-loading="Siunčiama žinutė..." data-bind="css: { 'c-btn--loading': submitted() }">
    <span>
      <span>Siųsti žinutę</span>
    </span>
                        </button>
                        <input name="__RequestVerificationToken" type="hidden" value="CfDJ8FgVZIDTQbtHvQ4qq4bq8ihCH0v1rocBA09Ltm7h-GC4PkTjgepKR9iQOa5AgrwZcqbjszvSPCNyTHcr1J6ZmMxe9A4Ixbd2zbLq9GsDoWouWcgSCm9XL5E1DkFaCokFJ5HrG_ZLcT6wAWSFeWMLUQm_kHyxUup0kkRWB9Y-G1tmXELW0ENBSq8NA22WGduuyA"></form>
                </div>
                <!-- ContactFormControl -->
            </div>

            <div class="mt-3">


                <div id="hook_rodocontact" class="" data-asp-hook="55" data-asp-hook-name="RodoContact">
                    <!-- RODO - Kontakt -->

                    <div data-control-hook-id="56" data-control-id="36" data-control-order="1" data-control-name="RODO - Kontakt" data-control-type="ContentArticle">


                        <p class="u-text-extra-small"><span>Siųsdami užklausą jūs sutinkate, kad būtų tvarkomi jūsų asmens duomenys.</span>
                            <br><br>
                            <span>Tokių surinktų duomenų administratorius yra</span> MB Kavateka Panerių g. 39, 03202
                            Vilnius, <span>pašto adresą</span>
                            info@rm-autodalys.lt. <span>Jūsų duomenys bus tvarkomi tik tam, kad būtų galima apdoroti per formą atsiųstą užklausą. Duomenys bus tvarkomi tiek laiko, kiek reikia nurodytam tikslui pasiekti, ir jie gali būti skirtingi, atsižvelgiant į užklausos pobūdį. Jūs turite teisę prieiti prie savo duomenų, juos taisyti, taisyti, apriboti jų tvarkymą, ištrinti ir pateikti skundą priežiūros institucijai. Tuo pat metu jūs turite teisę atšaukti savo sutikimą dėl jūsų duomenų tvarkymo, ir tai neturi įtakos tvarkymui, kuris buvo atliktas prieš sutikimo atsiėmimą.</span> <a href="https://www.rm-autodalys.eu/polityka-prywatnosci" title="Privatumo politika"><span>Spustelėkite čia</span></a>,
                            <span>sužinoti daugiau informacijos apie asmens duomenų tvarkymą.</span></p>
                    </div>
                    <!-- RODO - Kontakt -->
                </div>

            </div>
        </div>
    </div>
@endsection
