@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="fade-in">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <form action="{{ route('admin.checklist_groups.checklists.update', [$checklistGroup, $checklist]) }}" method="POST">
                    @csrf
                    @method('PUT')
                <div class="card-header">{{ __('Edit Checklist') }}</div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label for="name">{{__('Name')}}</label>
                                <input value="{{$checklist->name}}" class="form-control" name="name" id="name" type="text">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                   <button class="btn btn-sm btn-primary" type="submit">{{__('Save Checklist')}}</button>
                </div>
                </form>
                </div>
                <form action="{{ route('admin.checklist_groups.checklists.destroy', [$checklistGroup, $checklist]) }}" method="POST">
                    @csrf
                    @method('DELETE')
                   <button class="btn btn-sm btn-danger" type="submit"
                   onclick="return confirm('{{__('Are You sure?')}}')">{{__('Delete this Checklist')}}</button>
                </form>

                <hr>

                <div class="card">
                    <div class="card-header"><i class="fa fa-align-justify"></i>{{__('List of Tasks')}}</div>
                    <div class="card-body">
                        @livewire('tasks-table', ['checklist' => $checklist])
                    </div>
                </div>

                <div class="card">
                @if ($errors->storetask->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->storetask->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <form action="{{ route('admin.checklists.tasks.store', [$checklist]) }}" method="POST">
                    @csrf
                    <div class="card-header">{{ __('New Task') }}</div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label for="name">{{__('Name')}}</label>
                                <input value="{{old('name')}}" class="form-control" name="name" id="name" type="text">
                            </div>
                            <div class="form-group">
                                <label for="description">{{__('Description')}}</label>
                                <textarea class="form-control" name="description" id="task-textarea" rows="5">{{old('description')}}</textarea>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                   <button class="btn btn-sm btn-primary" type="submit">{{__('Save Task')}}</button>
               </div>
                </form>
            </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('scripts')
<script>
    class MyUploadAdapter {
        constructor( loader ) {
                this.loader = loader;
            }

        upload() {
            return this.loader.file
                .then( file => new Promise( ( resolve, reject ) => {
                    this._initRequest();
                    this._initListeners( resolve, reject, file );
                    this._sendRequest( file );
                } ) );
        }

        abort() {
            if ( this.xhr ) {
                this.xhr.abort();
            }
        }
        _initRequest() {
            const xhr = this.xhr = new XMLHttpRequest();
            xhr.open( 'POST', '{{ route('admin.images.store') }}', true );
            xhr.setRequestHeader('x-csrf-token', '{{ csrf_token() }}')
            xhr.responseType = 'json';
        }

        _initListeners( resolve, reject, file ) {
                const xhr = this.xhr;
                const loader = this.loader;
                const genericErrorText = `Couldn't upload file: ${ file.name }.`;

                xhr.addEventListener( 'error', () => reject( genericErrorText ) );
                xhr.addEventListener( 'abort', () => reject() );
                xhr.addEventListener( 'load', () => {
                    const response = xhr.response;

                    if ( !response || response.error ) {
                        return reject( response && response.error ? response.error.message : genericErrorText );
                    }

                    resolve( {
                        default: response.url
                    } );
                } );

                if ( xhr.upload ) {
                    xhr.upload.addEventListener( 'progress', evt => {
                        if ( evt.lengthComputable ) {
                            loader.uploadTotal = evt.total;
                            loader.uploaded = evt.loaded;
                        }
                    } );
                }
            }

            _sendRequest( file ) {
                const data = new FormData();

                data.append( 'upload', file );

                this.xhr.send( data );
            }
    }

    function SimpleUploadAdapterPlugin( editor ) {
        editor.plugins.get( 'FileRepository' ).createUploadAdapter = ( loader ) => {
            return new MyUploadAdapter( loader );
        };
    }

    ClassicEditor
        .create( document.querySelector( '#task-textarea' ), {
        extraPlugins: [ SimpleUploadAdapterPlugin ],
        } )
        .catch( error => {
            console.error( error );
        } );
</script>
@endsection