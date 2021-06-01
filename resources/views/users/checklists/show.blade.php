@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="fade-in">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                	<div class="card-header">
                		{{$checklist->name}}
                	</div>
                	<div class="card-body">
                		<table class="table" x-data="{selected:null}">
                			@foreach($checklist->tasks as $task)
                			<tr 
                			style="cursor: pointer;" 
                			x-on:click="selected !== {{$task->id}} ? selected = {{$task->id}} : selected = null">
                				<td>{{$task->name}}</td>
                                <td>
                                    <svg 
                                    x-bind:class="selected == {{$task->id}} ? 'c-sidebar-nav-icon d-none' : 'c-sidebar-nav-icon'">
                                        <use xlink:href="{{asset('vendors/@coreui/icons/svg/free.svg#cil-caret-bottom')}}">
                                    </svg>
                                    <svg
                                    x-bind:class="selected == {{$task->id}} ? 'c-sidebar-nav-icon' : 'c-sidebar-nav-icon d-none'">
                                        <use xlink:href="{{asset('vendors/@coreui/icons/svg/free.svg#cil-caret-top ')}}">
                                    </svg>
                                </td>
                			</tr>
                			<tr x-bind:class="selected == {{$task->id}} ? 'd-block':'d-none'">
                                <td></td>
                				<td colspan="2">{!!$task->description!!}</td>
                			</tr>
                			@endforeach
                		</table>
                	</div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection