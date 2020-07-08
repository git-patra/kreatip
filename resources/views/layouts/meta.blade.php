@section('meta_tags')

@if(isset($article))
<title>{{$article->blog_title}}</title>
<meta name='description' itemprop='description' content='{{$article->meta_desc}}' />
<link rel="canonical" href="{{url()->current()}}" />

{{-- ! Tag <meta name='keywords' content='{{$tags}}' /> --}}

<meta property="og:site_name" content="Kreatip" />
<meta property="og:type" content="article" />
<meta property="og:title" content="{{$article->meta_title}}" />
<meta property="og:locale" content="id_ID" />
<meta property="og:description" content="{{$article->meta_desc}}" />
<meta property="og:url" content="{{url()->current()}}" />
<meta property="og:locale:alternate" content="en-us" />

<meta property='article:published_time' content='{{$article->created_at}}' />
<meta property="article:modified_time" content="{{ $article->updated_at }}" />
<meta property='article:section' content='pembelajaran' />

<meta property="article:publisher" content="https://www.facebook.com/anugrahpatra.nurdiansah" />

<meta name="twitter:card" content="summary" />
<meta name="twitter:title" content="{{ $article->meta_title }}" />
<meta name="twitter:description" content="{{ $article->meta_desc }}" />
<meta name="twitter:image" content="{{ url('storage/materi/img/' .$article->img_thumb) }}" />
<meta name="twitter:site" content="{{url()->current()}}" />

@endif

@endsection