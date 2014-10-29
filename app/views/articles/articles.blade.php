@extends('layouts.default')

@section('content')
    
    <div class="row">
        <div class="col-xs-12">
            
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h2 class="panel-title">Articles</h2>
                </div>
                <table class="table table-striped">
                    <thead>
                        <th>#</th>
                        <th>Title</th>
                        <th>Author</th>
                        <th>Last Modified</th>
                        <th class="text-right"><a href="{{ URL::route('articles.new') }}">
                            <i class="glyphicon glyphicon-plus"></i> Add
                        </a></th>
                    </thead>
                    <tbody>
                        @foreach ($articles as $article)
                            <tr>
                                <td>{{ $article->id }}</td>
                                <td>{{ $article->title }}</td>
                                <td>{{ $article->author }}</td>
                                <td>{{ $article->last_modified }}</td>
                                <td class="text-right">
                                    <a href="{{ URL::route('articles.article', array('id' => $article->id)) }}">
                                        <i class="glyphicon glyphicon-edit"></i> Edit
                                    </a>
                                    <a href="{{ URL::route('articles.delete', array('id' => $article->id)) }}">
                                        <i class="glyphicon glyphicon-remove"></i> Del
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            
        </div>
    </div>
    
@stop