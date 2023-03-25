
<!DOCTYPE html>
<html lang="en" style="font-size: 16px;">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="utf-8">
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="generator" content="Nice-page 5.6.2, nice-page.com">

    <link rel="stylesheet" href="{{asset('css/pages/books_index.css')}}" media="screen">
    <title>Books</title>


</head>
<body class="u-body u-xl-mode" data-style="blank" data-posts=""
      data-global-section-properties="{&quot;colorings&quot;:{&quot;light&quot;:[&quot;clean&quot;],&quot;colored&quot;:[&quot;clean&quot;],&quot;dark&quot;:[&quot;dark&quot;]}}"
      data-source="blank" data-lang="en" data-page-sections-style="[{&quot;name&quot;:&quot;blank&quot;}]"
      data-page-coloring-types="{&quot;light&quot;:[&quot;clean&quot;],&quot;colored&quot;:[&quot;clean&quot;],&quot;dark&quot;:[&quot;dark&quot;]}"
      data-page-category="&quot;Basic&quot;">
<form action="{{ route('books.search') }}" method="GET">
    @csrf
    <label for="query">Search</label>
    <input id="query" type="text" name="query" placeholder="Search...">
    <button type="submit">Search</button>
</form>
<section class="u-align-left u-clearfix u-block-f416-18" custom-posts-hash="[]" data-style="blank"
         data-section-properties="{&quot;margin&quot;:&quot;none&quot;,&quot;stretch&quot;:true}" id="carousel_de6c"
         data-source="fix" data-id="f416">

    <div class="u-clearfix u-sheet u-valign-middle-md u-valign-middle-sm u-valign-middle-xs u-block-f416-19">
        <div class="u-list u-block-f416-22">
            <div class="u-repeater u-block-f416-41">
                <div class="u-container-style u-list-item u-repeater-item u-block-f416-23">
                    <div class="myProfile-icon">
                        <a href="{{route('user.index')}}"><img src="http://127.0.0.1:8000/images/profile_img.png" alt="Profile Icon"></a>
                        <p>My profile</p>
                    </div>
                    @foreach($books as $book)
                        <a href="{{route('books.show',$book['id'])}}" style="text-decoration: none; color:black"  >
                            <div class="u-container-layout u-similar-container u-valign-bottom-xs u-block-f416-24">
                                <img
                                    src="{{$book['cover_path']}}"
                                    alt="" class="u-image u-image-default u-block-f416-29" data-image-width="1900"
                                    data-image-height="2532">
                                <h2 class="u-custom-font u-font-ubuntu u-text u-block-f416-36">
                                    {{$book['title']}}
                                </h2>
                                <h4 class="u-custom-font u-font-ubuntu u-text u-block-f416-38">{{$book['author']}}</h4>
                                <p class="u-text u-text-grey-40 u-block-f416-37">{{$book['description']}}</p>
                                <h3 class="u-custom-font u-font-ubuntu u-text u-block-f416-38"> {{$book['genre']}}</h3>
                            </div>
                        </a><br><br>
                    @endforeach
                </div>
            </div>
            <div>{{ $books->links('vendor/pagination/tailwind') }}</div>
        </div>
    </div>
</section>
</body>
</html>
