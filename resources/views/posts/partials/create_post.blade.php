<form action="{{ route('posts.store') }}" method="post">
    @csrf

    {{-- Post title --}}
    <div class="form-group">
        <label for="title">Post title</label>
        <input type="text"
               name="title"
               id="title"
               class="form-control"
               placeholder="write post title here.."
               required />

        @if ($errors->has('title'))
            <small class="text-danger">{{ $errors->first('title') }}</small>
        @endif
    </div>
    {{-- End --}}

    {{-- Post body --}}
    <div class="form-group">
        <label for="body">Post body</label>
        <textarea class="form-control"
                  name="body"
                  id="body"
                  rows="3"
                  placeholder="write post body here.."
                  required
                  style="resize: none;"></textarea>

        @if ($errors->has('body'))
            <small class="text-danger">{{ $errors->first('body') }}</small>
        @endif
    </div>

    <div class="form-group">
        <button type="submit" class="btn btn-primary">Save Post</button>
        <a href="{{ route('home') }}" class="btn btn-default">Back</a>
    </div>

</form>
