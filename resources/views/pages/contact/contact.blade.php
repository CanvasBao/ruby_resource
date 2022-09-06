@extends('layout.html')

@section('meta')
<x-shared.meta title="お問い合わせ">
    {{--
    <meta http-equiv="X-UA-Compatible" content="ie=edge"> --}}
</x-shared.meta>
@endsection

@section('content')
<x-shared.content-box>
    <div class="w-full max-w-[500px]">
        <div>
            <x-item.page-title class="text-center text-30fs text-wood-color" title="お問い合わせ" />
        </div>
        <div class="smd:bg-[#ffff] smd:pt-[39px] smd:pr-[25px] smd:pb-[70px] smd:pl-[21px] smd:mt-[51px] pt-[80px]">
            <div class="smd:text-[14px] smd:leading-[22px] text-16fs-28lh font-medium text-wood-color smd:p-0">
                <span>必須項目を入力して、送信ボタンをクリックしてください。</span> <br class="md:hidden">
                <span class="md:hidden">お急ぎの方はお手数ですが、お電話にてお問い合わせください。</span>
            </div>
            <form id="contactForm" class="pt-[60px] pb-20" action="{{route('contact.send')}}" method="POST">
                {{ csrf_field() }}
                <div class="space-y-[30px] text-[14px] leading-[22px] md:text-[16px] md:leading-[24px]">
                    <x-form.row rowTitle="お名前" redtitle="必須">
                        <x-form.input type="text" name="last_name" place="姓"/>
                        <x-form.input type="text" name="first_name" place="名"/>
                    </x-form.row>
                    <x-form.row rowTitle="フリガナ" redtitle="必須">
                        <x-form.input type="text" name="last_name_kana" place="セイ"/>
                        <x-form.input type="text" name="first_name_kana" place="メイ"/>
                    </x-form.row>
                    <x-form.row rowTitle="メールアドレス" redtitle="必須">
                        <x-form.input type="text" name="email" place="samplemail@info.co.jp"/>
                    </x-form.row>
                    <x-form.row rowTitle="TEL" redtitle="必須">
                        <x-form.input type="text" name="tel" place="08012345678"/>
                    </x-form.row>
                    <x-form.row rowTitle="お問い合わせ内容" redtitle="必須">
                        <x-form.input type="textarea" name="content" place=""/>
                    </x-form.row>
                </div>

                <div class="pt-[90px] max-w-[285px] m-auto">
                    <x-item.button>送信</x-item.button>
                </div>

            </form>
        </div>
    </div>
    <script>
    document.querySelector('#contactForm').addEventListener("submit", () => {
        showLoading();
    });
    </script>
</x-shared.content-box>
@endsection