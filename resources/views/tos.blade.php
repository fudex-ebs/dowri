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
        <h2>{{__('messages.tos_title')}}</h2>
    </section>
    <section class="reservation-form">
        <div class="row">
            <div class="col-md-12">
                <div class="tos">
                    <ul>
                        <p>
{{--                           {{__('messages.welcome_msg')}}--}}
                        </p>
                        <li><h5>عزيزي “مستخدم و زائر” موقع دوري الإلكتروني , إن زيارتك أو استخدامك بوابة خدمات موقع دوري الإلكتروني , تعد موافقة صريحة من قبلكم على ما تمثله سياسة الموقع وبالتالي يتوجب عليك التقيد بالشروط والبنود الواردة في هذه الصفحة:</h5>  </li>
                        <li>يمنع منعاَ باتاَ إجراء أي محاولة غير قانونية “للخرق أو التحايل على شروط الحماية أو استخدام البوابة لغير الأغراض المحددة لها أو حجب أي من خدمات البوابة عن المستخدمين المصرح لهم, أو أي استخدام, أو حفظ, أو تغيير, أو أذى, أو إتلاف للمعلومات, أو أي تدخل في البوابة أو تشغيلها”, إن أي دليل على مثل تلك الأفعال سيعرض صاحبه للمسائلة القانونية.</li>

                        <li>إدارة البوابة لا تقوم بجمع أية معلومات شخصية عنك بدون معرفتك عند زيارتك لهذه البوابة, رغم أنك قد تقوم بتزويدنا بتلك المعلومات في حال رغبت بحجز موعد إالكتروني, فإننا نقوم بجمع وحفظ بعض المعلومات المحددة بشكل تلقائي عنك مثل بروتوكول الانترنت “أي بي” الخاص بالنطاق الذي تدخل عبره إلى الانترنت, أو في حالة ما إذا كنت تدخل عبر بروكسي محدد من قبل مزود الإنترنت الخاص بك “أي إس بي”, أو وقت و تاريخ زيارتك للموقع الذي قمت بربط بوابتنا إليه مباشرة.</li>

                        <li>نحن نقوم باستخدام الإحصائيات المختصرة لجعل بوابتنا أكثر فائدة للزوار و المستخدمين مثل معرفة أي المعلومات هي الأكثر أهمية للزوار و للمستخدمين و أيها أقل أهمية, ومن أجل أغراض أخرى مثل تحديد المواصفات التقنية لتصميم البوابة و تقييم أداء النظام و مواضع الخلل, و لا يتم مشاركة تلك المعلومات إطلاقاَ خارج نطاق فريق الدعم لهذه البوابة إلا في حالة طلبها من قبل إحدى الجهات القضائية.</li>
                        <span style="text-align: center">____________________________________________________________________________________________________________________________________________________________________________________________</span>
                        <li>
                            <p style="text-align: right">اتفاقية استخدام بوابة “دوري”</p>
                            <ul style="list-style-type:disc">
                                <li><p style="text-align: right">الاتفاقية:</p>
                                    <ol>
                                        <li>تحكم هذه الاتفاقية استخدامك لبوابة “موقع دوري الإلكتروني “.</li>
                                        <li>    يحتفظ موقع دوري الإلكتروني بحقه في “تغيير أو تعديل جزء من أو جميع أجزاء” هذه الاتفاقية في أي وقت من الأوقات بحيث يسري مفعول تلك التغييرات لدى إعلانها على البوابة مباشرة. إن استخدامك لبوابة “موقع دوري الإلكتروني “, يعبر عن موافقتك الملزمة بهذه الشروط و الأحكام, بما في ذلك أي تغييرات أو تعديلات تجريها تقدير كما هي مذكورة أعلاه. وفي حال عدم قبولك لأي من شروط هذه الاتفاقية في أي وقت من الأوقات, فإن عليك إيقاف استخدامك للبوابة فوراَ.
                                        </li>
                                    </ol>
                                </li>
                                <li><p style="text-align: right">استخدام المحتوى</p>
                                    <ol>
                                        <li>إنك تقرّ بأن بوابة “موقع دوري الإلكتروني ” تحتوي على معلومات, وروابط ومواد أخرى (والتي تشكل بمجموعها “المحتوى”) وهي محمية عن طريق حقوق النشر أو العلامة التجارية أو حقوق ملكية للهيئة أو أطراف أخرى. كما تقرّ بالموافقة على أية حقوق نشر أو معلومات أو قيود إضافية متضمنة في أي محتوى موجود على البوابة. وبإمكان مستخدمي البوابة استخدام المحتوى لأغراضهم الشخصية غير التجارية حصراً.</li>
                                        <li>يمنع “تعديل، ونشر، ونقل، وبيع، وإعادة إنتاج، واشتقاق، وتوزيع، وعرض، وأي شكل من أشكال استغلال أي محتوى، كلياً كان أم جزئياً”، ما عدا المسموح به صراحةً في هذه الاتفاقية.</li>
                                        <li>يمكن تنزيل ونسخ المحتوى لأغراض استخداماتك الشخصية حصراً، مع الأخذ بالاعتبار حفظك وتضمينك لجميع حقوق النشر أو الحقوق الأخرى المتضمنة في ذلك المحتوى.</li>
                                        <li>منع تخزين أي جزء من أجزاء المحتوى الكترونياً. ما عدا المسموح به صراحةً من قبل قوانين حقوق النشر، فإنه من غير المسموح “نسخ، أو تخزين، أو نشر، أو توزيع” أي محتوى بدون إذن صريح من تقدير.</li>
                                    </ol>
                                </li>
                                <li><p style="text-align: right">عدم التمثيل</p>
                                    <ol>
                                        <li>لا تلتزم “موقع دوري الإلكتروني ” بتمثيل أو تأييد دقة أو موثوقية أي محتوى وأنت تقرّ بأن أي اعتماد على ذلك المحتوى سيكون على مسؤوليتك الخاصة حصراً.</li>
                                        <li>
                                            قد تحتوي البوابة على روابط لمواقع الكترونية تملكها وتديرها أطراف ثالثة “المواقع الخارجية”. وأنت تقرّ بأن “موقع دوري الإلكتروني ” ليس مسئول عن توافر أية مواقع خارجية، أو أية معلومات أو محتويات خاصة بها. وسيكون عليك الاتصال بإدارة تلك المواقع في حال كان لديك أية شكوك حول تلك الروابط أو المحتوى الموجود على تلك المواقع الخارجية.
                                        </li>
                                    </ol>
                                </li>
                                <li><p style="text-align: right">إنهاء الخدمة</p>
                                    <ol>
                                        <li>يحتفظ “موقع دوري الإلكتروني ” بحقه الحصري بتقييد، وتعليق أو إنهاء إمكانية وصولك لجزء أو كل أجزاء الموقع في أي وقت من الأوقات ولأي سبب من الأسباب دون إشعار مسبق. وقد يقوم موقع دوري الإلكتروني “بتغيير، أو تعليق، أو إيقاف” أي جانب من البوابة الالكترونية في أي وقت، بما في ذلك توفر أي ميزة أو قاعدة بيانات أو محتوى دون إشعار مسبق.</li>
                                    </ol>
                                </li>
                                <li><p style="text-align: right">إخلاء المسؤولية من الضمانات “تحديد المسؤولية”:</p>
                                    <ol>
                                        <li>لا يمنح “موقع دوري الإلكتروني “،أي ضمانات تتعلق بالفائدة المحققة من استخدام البوابة الالكترونية. كما لا يمنح “موقع دوري الإلكتروني “، أيّ ضمانات مهما كان نوعها، سواء كانت صريحة أم ضمنيّة بما في ذلك الضمانات “اللا محدودة، أو ضمانات الاسم، أو ضمانات اللياقة الضمنية لغرض محدد” بما يتعلق بالخدمات والمحتوى. وأنت تقرّ صراحةً بموافقتك على أن نوعية وأداء الخدمات</li>
                                        <li>لا يتحمل “موقع دوري الإلكتروني “, أيّ مسؤولية عن أي “فعل، أو أضرار مباشرة أو غير مباشرة، عرضية أو خاصة أو مسببة” قد يسببها استخدام أو عدم القدرة على استخدام الموقع. و بدخولك إلى“موقع دوري الإلكتروني “، فإنك تعبر عن موافقتك على التزامك وأن تكون جزءاً من هذه الاتفاقية، وتمثل موافقتك تلك توقيعك الملزم على الموافقة على جميع أحكام وشروط هذه الاتفاقية.</li>
                                    </ol>
                                </li>
                                <li><p style="text-align: right">القانون المعتمد</p>
                                    <ol>
                                        <li>يحكم هذه الاتفاقية وتُفسر بنودها وفقاً لقوانين المملكة العربية السعودية.</li>
                                        <li>يتم تسوية أي نزاعات بخصوص هذه الاتفاقية أمام المحاكم في المملكة العربية السعودية.</li>
                                    </ol>

                                </li>
                            </ul>
                        </li>



                    </ul>

                </div>
            </div>
        </div>
    </section>
    <section class="reservation-form">
        <div class="row">
            <div class="col-md-12">

                <div class="tos">
                    <h3>شروط اﻹلغاء </h3>
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
