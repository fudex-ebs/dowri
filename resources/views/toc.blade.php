@extends('layouts.front')
@section('page_css')
    <style>
        .tos p {
            text-align: center;
            font-weight: bold;

        }
        .tos{
            margin: 20px;

        }
    </style>
@endsection
@section('content')
    <section class="suitable">
        <h2>{{__('messages.cancellation')}}</h2>
    </section>
    <section class="reservation-form">
        <div class="row">
            <div class="col-md-12">
                <div class="tos">
                    <p style="text-align: right;">                        يتيح موقع دوري خاصية إلغاء او تعديل الموعد وفقاً للشروط التالية:
                    </p>
                    <ul>
                        <li>لايمكن تغير او إالغاء الموعد قبل الموعد المحجوز بأقل من اربعة و عشرون ساعة.</li>
                        <li>بينما اذا تم الإلغاء خلال المدة المسموح فيها بالتعديل و الإلغاء فسوف يتم خصم 30% من اجمالي سعر التذكرة المدفوعة و سوف يتم أرجاع باقي المبلغ وفقاً لسياسة البنوك السعودية المتبعة.</li>
                        <li>لا توجد أي رسوم مصاحبه لتغيير الموعد و لكن هناك حد اقصى للتغير و هو مرتين متتاليتي.</li>
                    </ul>

                </div>
            </div>
        </div>
    </section>


@endsection
