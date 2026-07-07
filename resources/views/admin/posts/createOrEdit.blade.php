@extends('admin.layouts.layout')
@section('title')
@if($mode=='edit') Edit @else Create New @endif {{ $posttype['title'] }}
@endsection
@section('css')
{{-- <link href="//cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css" rel="stylesheet"> --}}
{{-- <link rel="stylesheet" href="{{ asset('assets/admin/plugins/summernote/summernote-bs4.css') }}"> --}}
<link rel="stylesheet" href="{{ asset('vendor/laraberg/css/laraberg.css') }}">
<script src="//unpkg.com/react@16.14.0/umd/react.production.min.js"></script>
<script src="//unpkg.com/react-dom@16.14.0/umd/react-dom.production.min.js"></script>
<script src="{{ asset('vendor/laraberg/js/laraberg.js') }}"></script>
@endsection
@section('content')


      <!-- Editor-এর জন্য কন্টেইনার -->
      <div id="editorjs" style="border: 1px solid #ccc; padding: 10px;"></div>
      <!-- ডেটা সাবমিট করার হিডেন ফিল্ড -->
      <form action="/save-content" method="POST" id="blogForm">
          @csrf
          <input type="hidden" name="content" id="content-field">
          <button type="submit">সংরক্ষণ করুন</button>
      </form>
@if ($mode=='edit')
  {!! Form::model($post,['route'=>['posts.update',$post->id],'method'=>'PUT','enctype'=>'multipart/form-data']) !!}
@else
  {!! Form::open(array('route'=>'posts.store','data-parsley-validate'=>'','enctype'=>'multipart/form-data')) !!}
@endif

<div class="row">
  <div class="col-sm-12 col-lg-9">
    <div class="card">
      <div class="card-header">
        <a href="{{ route('posts.index').'?type='.$posttype['postType'] }}" class="btn btn-primary btn-sm">All {{ Str::plural($posttype['title']) }}</a>
        @if($mode=='edit')<a href="{{ route('posts.create').'?type='.$posttype['postType'] }}" class="btn btn-primary btn-sm">Create New {{ $posttype['title'] }}</a>@endif
        <div class="card-tools">
          {{ Form::submit('Publish',array('class'=>'btn btn-success')) }}
        </div>
      </div>
      <div class="card-body">
        @include('admin.layouts._message')
        {{ Form::hidden('post_type', $posttype['postType'] ) }}
        {{ Form::label('title','Title') }}
        {{ Form::text('title',null,array('class'=>'form-control','required'=>'','maxlenth'=>'255')) }}
        @if ($mode=='edit')
            {{ Form::text('slug',$posttype['postType'].'/'.$post->slug,['class'=>'form-control', 'readonly'=>'readonly']) }}
        @endif
          @if (in_array('body',$posttype['supports']))
            {{ Form::label('body','Post Body') }}
            {{ Form::textarea('body',null,array('class'=>'form-control textarea')) }}
            {{-- <textarea id="body" name="body" hidden></textarea> --}}
          @endif
        @if(array_key_exists('postMeta',$posttype))
              @foreach ($posttype['postMeta'] as $key=>$meta)
              <div class="form-group row">
                {{ Form::label("postMeta[{$meta['name']}]",$meta['title'],array('class'=>'col-sm-3 col-form-label')) }}
                <div class="col-sm-9">
                @if($mode=='edit')
                  @if(array_key_exists($key,$post->postMeta->toArray()))
                    {{ Form::text("postMeta[{$meta['name']}]",$post->postMeta[$key]->meta_value,array('class'=>'form-control','required'=>$meta['required'] ,'maxlenth'=>'255')) }}
                  @else
                    {{ Form::text("postMeta[{$meta['name']}]",null,array('class'=>'form-control','required'=>$meta['required'],'maxlenth'=>'255')) }}
                  @endif
                @else
                  {{ Form::text("postMeta[{$meta['name']}]",null,array('class'=>'form-control','required'=>$meta['required'],'maxlenth'=>'255')) }}
                @endif
                </div>
              </div>
              @endforeach
          @endif
      </div>
    </div>
  </div>
  <div class="col-sm-12 col-lg-3">
    @if (in_array('sort',$posttype['supports']))
    <div class="card">
      <div class="card-header">Sort Order</div>
      <div class="card-body">{{ Form::number('sort',null,array('class'=>'form-control')) }}</div>
    </div>
    @endif
    @if ($posttype['taxonomy']==true)
    <div class="card">
      <div class="card-header">Category</div>
      <div class="card-body">
        @foreach ($taxonomy as $item)
          <div class="checkbox">
            <label for="{{$item->id}}" class="form-check-label">
              @if ($mode=='edit')
                {{ Form::checkbox('categories[]', $item->id, in_array($item->id, $post->taxonomy->pluck('id')->toArray()),['id'=>$item->id]) }}
              @else
                <input type="checkbox" name="categories[]" id="{{$item->id}}" value="{{$item->id}}">
              @endif
            {{$item->title}}
            </label>
          </div>
          <div class="checkbox">
            @if($item->children->count()>0)
             - 
                @foreach ($item->children as $child)
                    <label for="{{$child->id}}" class="form-check-label">
                      @if ($mode=='edit')
                        {{ Form::checkbox('categories[]', $child->id, in_array($child->id, $post->taxonomy->pluck('id')->toArray()),['id'=>$child->id]) }}
                      @else
                        <input type="checkbox" name="categories[]" id="{{$child->id}}" value="{{$child->id}}">
                      @endif
                    {{$child->title}}
                    </label>
                @endforeach
            @endif
          </div>
          @endforeach
      </div>
    </div>
    @endif
    <div class="card">
      <div class="card-header">{{ Form::label('image','Thumnail') }}</div>
      <div class="card-body">
        @if ($mode=='edit')
         @if (Str::endsWith(strtolower($post->image), ['.jpg', '.jpeg','.png']))
          <img src="{{ asset('storage/'.$post->image) }}" alt="" class="img-thumbnail">
         @else
            <a target="_blank" href="{{ asset('storage/'.$post->image) }}">Download</a>
         @endif
        @endif
        <div class="custom-file">
          {{ Form::file('image',null,array('class'=>'form-control custom-file-input')) }}
          <label class="custom-file-label" for="image">Choose file</label>
        </div>
{{--
        <div class="input-group">
          <span class="input-group-btn">
            <a id="lfm" data-input="thumbnail" data-preview="holder" class="btn btn-primary">
              <i class="fa fa-picture-o"></i> Choose
            </a>
          </span>
          <input id="thumbnail" class="form-control" type="text" name="filepath">
        </div>
        <img id="holder" style="margin-top:15px;max-height:100px;"> --}}
      </div>
    </div>
  </div>
</div>
{!! Form::close() !!}

@endsection
@section('js')

{{-- <script src="{{ asset('assets/admin/plugins/summernote/summernote-bs4.min.js') }}"> </script> --}}
{{-- <script src="//cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js"></script> --}}
<script src="{{ asset('assets/admin/plugins/bs-custom-file-input/bs-custom-file-input.min.js') }}"> </script>
    <script>
      //Laraberg.init('#body');
          document.addEventListener("DOMContentLoaded", function() {
    
            // কাস্টম ইমেজ আপলোড ফাংশন
            const customMediaUpload = ({ file, responseType }) => {
                return new Promise((resolve, reject) => {
                    const formData = new FormData();
                    formData.append('image', file);
                    formData.append('_token', '{{ csrf_token() }}'); // Laravel CSRF Token

                    // AJAX এর মাধ্যমে ব্যাকএন্ড কন্ট্রোলারে ফাইল পাঠানো
                    fetch("{{ route('home') }}", {
                        method: 'POST',
                        body: formData
                    })
                    .then(response => response.json())
                    .then(data => {
                        if (data.url) {
                            // সফল হলে এডিটরে ইমেজের URL সেট হবে
                            resolve({ url: data.url }); 
                        } else {
                            reject('Upload failed');
                        }
                    })
                    .catch(error => {
                        reject(error);
                    });
                });
            };

            // Laraberg ইনিশিয়ালাইজ করার সময় মিডিয়া আপলোডার পাস করুন
            Laraberg.init('body', {
                mediaUpload: customMediaUpload,
                colors: [
                  { name: 'Black', color: '#000000' },
                  { name: 'White', color: '#ffffff' },
                  { name: 'Red', color: '#e74c3c' },
                  { name: 'Blue', color: '#3498db' },
                  { name: 'Green', color: '#2ecc71' },
                  { name: 'Gray', color: '#7f8c8d' }
              ]
            },
            
          );
        });

        $(document).ready(function(){
        //$('.textarea').summernote();

          //bsCustomFileInput.init();
        });
    </script>
{{--
<script src="//cdn.jsdelivr.net/npm/@editorjs/editorjs@latest"></script>
<script src="//cdn.jsdelivr.net/npm/@editorjs/header@latest"></script>
<script src="//cdn.jsdelivr.net/npm/@editorjs/image@latest"></script>
<script src="//cdn.jsdelivr.net/npm/@editorjs/list@latest"></script>
<script src="//cdn.jsdelivr.net/npm/@editorjs/quote@latest"></script>
<script src="//cdn.jsdelivr.net/npm/@editorjs/warning@latest"></script>
<script src="//cdn.jsdelivr.net/npm/@editorjs/marker@latest"></script>
<script src="//cdn.jsdelivr.net/npm/@editorjs/code@latest"></script>
<script src="//cdn.jsdelivr.net/npm/@editorjs/delimiter@latest"></script>
<script src="//cdn.jsdelivr.net/npm/@editorjs/inline-code@latest"></script>
<script src="//cdn.jsdelivr.net/npm/@editorjs/embed@latest"></script>
<script src="//cdn.jsdelivr.net/npm/@editorjs/table@latest"></script>
<script>

    const editor = new EditorJS({
        holder: 'editorjs',
        placeholder: 'এখান থেকে লেখা শুরু করুন...',
        //inlineToolbar: ['bold', 'italic', 'underline', 'link', 'marker', 'quote', 'image', 'code', 'inline-code', 'unordered-list', 'ordered-list', 'delimiter', 'table', 'warning', 'header', 'paragraph', 'raw', 'embed'],
        
        tools: {
            paragraph: {
              inlineToolbar: true,
              },
             header: {
                class: Header,
                config: {
                    placeholder: 'Header',
                    levels: [1, 2, 3, 4, 5, 6],
                    defaultLevel: 1
                },
                inlineToolbar: true
             },
             image: {
                class: ImageTool, // এখানে ImageTool হবে, SimpleImage নয়
                config: {
                    endpoints: {
                        byFile: '/upload-image', // আপনার লারাভেল আপলোড রুট
                        byUrl: '/upload-image-by-url'
                    },
                    additionalRequestHeaders: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    }
                }
            },
             list: {
                 class: EditorjsList,
                 inlineToolbar: ['marker', 'bold', 'italic']
                },
             quote: Quote,
             warning: Warning,
             marker: Marker,
             code: CodeTool,
             delimiter: Delimiter,
             inlineCode: InlineCode,
             //linkTool: LinkTool,
             embed: Embed,
             table: Table,
        },
    });

    // ফর্ম সাবমিট করার সময় JSON ডেটা ইনপুটে ঢুকিয়ে দেওয়া
    document.getElementById('blogForm').addEventListener('submit', function(e) {
        e.preventDefault();
        editor.save().then((outputData) => {
            document.getElementById('content-field').value = JSON.stringify(outputData);
            this.submit();
        }).catch((error) => {
            console.log('Saving failed: ', error)
        });
    });
</script>

--}}
@endsection
