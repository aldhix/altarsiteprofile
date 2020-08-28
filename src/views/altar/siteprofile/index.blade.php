@extends('altar::page',['title'=>'Profile Situs'])
@section('heading')
<i class="fas fa-building"></i> Profile Situs
@endsection
@section('content')

@if(session('success') == 'update')
<x-alt-alert>
  <h5><i class="icon fas fa-check"></i> Updated !</h5>
  Success updated a data.
</x-alt-alert>
@endif

<div class="row">
	<div class="col-md-6">
		<x-alt-form-card method="post" action="{{ route('site.profile') }}" enctype="multipart/form-data">
         @csrf()
         @method('put')
        <x-alt-input-img name="logo" id="logo" :value="url('images/'.$data->logo)">
          <x-slot name="feedback">
            <div class="form-text text-muted">Logo dimension min Width: 200px, min Height: 200px</div>
          </x-slot>
        </x-alt-input-img>
        <x-alt-input label="Site Name &#41;*" name="name" value="{{$data->name}}" />
        <x-alt-input label="Site Address" name="site_address" value="{{$data->site_address}}" />
        <x-alt-input label="Email" name="email" value="{{$data->email}}" />
        <x-alt-input label="Phone" name="phone" value="{{$data->phone}}" />
        <x-alt-textarea label="Office Address" name="office_address" value="{{$data->office_address}}" />
        <x-slot name="footer">
          <x-alt-button btn="primary"><i class="fas fa-database"></i> Update Profile Situs</x-alt-button>
        </x-slot>
      </x-alt-form-card>
	</div>
</div>
@endsection

@push('css')
 <link rel="stylesheet" href="{{url('altar/input-img/css/input-img.css')}}">
@endpush

@push('js')
<script type="text/javascript" src="{{ url('altar/input-img/js/input-img.js') }}"></script>
<script type="text/javascript">
$(function(argument) {
    $('#logo').inputImg();
})
</script>
@endpush
