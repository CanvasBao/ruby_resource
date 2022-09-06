@extends('layout.html')

@section('meta')
<x-shared.meta title="お問い合わせ">
    {{--
    <meta http-equiv="X-UA-Compatible" content="ie=edge"> --}}
</x-shared.meta>
@endsection

@section('content')
<x-shared.content-box>
    <div class="w-full text-sm md:text-base">
        <div class="smd:text-[17px] smd:leading-[26px] text-[24px] leading-[28px] text-wood-color smd:p-0">お問い合わせありがとうございます。</div>
        <div class="pt-[50px] smd:text-[14px] smd:leading-[22px]">
            内容を確認させていただきまして、担当者よりご連絡致します。 <br><br>
            なお、ご入力いただいたメールアドレス宛に受付完了メールをお送りしております。 <br>
            完了メールが届かない場合、処理が正常に行われていない可能性があります。 <br>
            大変お手数ですが、再度お問い合わせの手続きをお願い致します。<br>
        </div>
    </div>
</x-shared.content-box>
@endsection