@extends('admin.layouts.index')

@section('content')

    <!-- Page Content -->
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
                <small>{{ trans('faculty.list') }}</small>
                {{ trans('faculty.faculty') }}
            </h1>
        </div>
        <!-- /.col-lg-12 -->
        <table class="table table-striped table-bordered table-hover">
            <thead>
            <tr align="center">
                <th>{{ trans('faculty.id') }}</th>
                <th>{{ trans('faculty.faculty') }}</th>
                <th>{{ trans('faculty.delete') }}</th>
                <th>{{ trans('faculty.edit') }}</th>
            </tr>
            </thead>
            <tbody>
            @foreach($faculties as $faculty)
                <tr class="odd gradeX" align="center">
                    <td>{{$faculty->id}}</td>
                    <td>{{$faculty->name}}</td>
                    <td class="center">
                        <form action="{{route('faculties.destroy',$faculty->id)}}" method="POST">
                            <input type="hidden" name="_method" value="DELETE">
                            <button class="btn btn-danger" type="submit" onclick="return confirm('{{ trans('faculty.checkDelete') }}')">{{ trans('faculty.delete') }}</button>
                            @csrf
                        </form>
                    </td>
                    <td class="center"><a class="btn btn-warning" href="{{route('faculties.edit',['Faculty'=>$faculty])}}">{{ trans('faculty.edit') }}</a></td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

    <!-- /.row -->

@endsection
