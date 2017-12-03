@extends('pc.common.layout')

@section('styleSheet')
    <link href="{{asset('pc/css/app.css')}}" rel="stylesheet">
@endsection

@section('JS')
	<script type="text/javascript" src="{{asset('pc/js/original.js')}}"></script>
@endsection


@section('content')
<div >
	<div >JK-Collectionについて</div>
	<ul class>
		<li>JK-Collectionは成人向けのアダルトサイトです。18歳未満のかたはブラウザを閉じてください。</li>
		<li>JK-CollectionはJK(女子校生)のアダルト動画に特化したサイトです。</li>
		<li>JK-Collectionはインターネット上のJKのアダルト動画を収集し、タグをつけデータベースに保存をしています。</li>
		<li>JK-Collectionからリンク先の動画サイトの閲覧、サービスのご利用などに関して一切の責任を取りません。リンク先の動画の閲覧、サービスのご利用に関しては各個人の責任でお願いします。</li>
		<li>JK-Collectionはみやすいやすように動画を収集しているだけであり、著作権の侵害を助長しているわけではありません。</li>
	</ul>
</div>
@endsection
