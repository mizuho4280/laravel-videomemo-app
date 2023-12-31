@extends('layouts.app')

@section('content')

    <body>
        <main>
            <article>
                <div class="container">


                    @if ($errors->any())
                        <div>
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif


                    <h1 class="text-center">新規投稿</h1>

                    <div class="float-start">
                        <a href="{{ route('contents.index') }}">&lt; 戻る</a>
                    </div>
                    <br>
                    <form action="{{ route('contents.store') }}" method="post">
                        @csrf

                        <div class="mb-3">
                            <label for="title" class="form-label">メモタイトル</label>
                            <input type="text" class="form-control" name="title">
                        </div>

                        <div class="mb-3">
                            <label for="url" class="form-label">動画ID　(https://www.youtube.com/watch?v=......)</label>
                            <input type="text" class="form-control" name="url">
                        </div>

                        <div>
                            タグ
                            <div class="d-flex flex-wrap">
                                @foreach ($tags as $tag)
                                    <label>
                                        <div class="d-flex align-items-center  me-3">
                                            <input type="checkbox" name="tag_ids[]" value="{{ $tag->id }}">
                                            <span class="badge bg-secondary ms-1">{{ $tag->name }}</span>
                                        </div>
                                    </label>
                                @endforeach
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="body" class="form-label">メモ本文</label>
                            <textarea name="body" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                        </div>

                        <div class="mb-3">
                            <label for="status" class="form-label"></label>
                            <br>
                            <input type="radio" name="memo_status" value="0">プライベート
                            <input type="radio" name="memo_status" value="1">パブリック
                        </div>

                        <button type="submit">メモ作成</button>
                    </form>
                </div>
            </article>
        </main>

    </body>
@endsection

</html>
