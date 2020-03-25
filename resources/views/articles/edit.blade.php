@extends('layouts.app')

@section('title', 'Laraberg Demo')

@section('content')
    <div class="uk-section">
        <div class="uk-container">
            @include('articles._errors')
            <form action="{{route('articles.index')}}/{{$article->id}}" method="POST">
                @method('PUT')
                @csrf
                <fieldset class="uk-fieldset">
                <div class="laraberg-sidebar">
                    <input type="text" name="title" placeholder="Title">
                    <textarea name="excerpt" placeholder="Excerpt">{{ $article->excerpt }}</textarea>
                    <label for="article_status">Status</label>
                    <select name="status" id="article_status">
                        <option value="draft">Draft</option>
                        <option value="published">Published</option>
                    </select>
                </div>
                <div class="uk-margin">
                    <input type="text" class="uk-input uk-form-large laraberg-sidebar {{ $errors->get('title') ? 'uk-form-danger' : '' }}" name="title" placeholder="Title" value="{{$article->title}}">
                </div>
                <div class="uk-margin">
                    <textarea name="content" id="content" hidden>{{ $article->lb_raw_content }}</textarea>
                </div>
                </fieldset>
                <a href="{{URL::previous()}}" class="uk-button uk-button-danger" type="submit">Cancel</a>
                <button class="uk-button uk-button-primary" type="submit">Submit</button>
            </form>
        </div>
    </div>

@stop

@section('scripts')
<script>
    window.addEventListener('DOMContentLoaded', () => {
        Laraberg.init('content', { height: '600px', laravelFilemanager: true, sidebar: true })
    })
</script>
@stop
