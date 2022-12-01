@extends('layouts.admin')
@section('page-header')
@include('partials.page-header', [
'head' => 'Listes des categories',
'title' => 'Categories',
'subtitle' => 'Liste',
'url' => 'admin/categories',
])
@endsection



@section('content')
@include('partials.notifications')
<h1>
    <div class="container-fluid">
        <div class="card col-md-10 offset-md-1">
            <div class="card-header">
                <h3 class="card-title">DataTable with default features</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <table class="table table-bordered table-striped table-hover">
                    <thead>
                        <tr>
                            <th class="fs-2">Rendering engine</th>
                            <th>Browser</th>
                            <th>Platform(s)</th>
                            <th>Engine version</th>
                            <th>CSS grade</th>
                        </tr>
                    </thead>
                    <tbody>


                        <tr>
                            <td>Tasman</td>
                            <td>Internet Explorer 5.1</td>
                            <td>Mac OS 7.6-9</td>
                            <td>1</td>
                            <td>C</td>
                        </tr>
                        <tr>
                            <td>Tasman</td>
                            <td>Internet Explorer 5.2</td>
                            <td>Mac OS 8-X</td>
                            <td>1</td>
                            <td>C</td>
                        </tr>
                        <tr>
                            <td>Misc</td>
                            <td>NetFront 3.1</td>
                            <td>Embedded devices</td>
                            <td>-</td>
                            <td>C</td>
                        </tr>
                        <tr>
                            <td>Misc</td>
                            <td>NetFront 3.4</td>
                            <td>Embedded devices</td>
                            <td>-</td>
                            <td>A</td>
                        </tr>
                        <tr>
                            <td>Misc</td>
                            <td>Dillo 0.8</td>
                            <td>Embedded devices</td>
                            <td>-</td>
                            <td>X</td>
                        </tr>
                        <tr>
                            <td>Misc</td>
                            <td>Links</td>
                            <td>Text only</td>
                            <td>-</td>
                            <td>X</td>
                        </tr>
                        <tr>
                            <td>Misc</td>
                            <td>Lynx</td>
                            <td>Text only</td>
                            <td>-</td>
                            <td>X</td>
                        </tr>
                        <tr>
                            <td>Misc</td>
                            <td>IE Mobile</td>
                            <td>Windows Mobile 6</td>
                            <td>-</td>
                            <td>C</td>
                        </tr>
                        <tr>
                            <td>Misc</td>
                            <td>PSP browser</td>
                            <td>PSP</td>
                            <td>-</td>
                            <td>C</td>
                        </tr>
                        <tr>
                            <td>Other browsers</td>
                            <td>All others</td>
                            <td>-</td>
                            <td>-</td>
                            <td>U</td>
                        </tr>
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>Rendering engine</th>
                            <th>Browser</th>
                            <th>Platform(s)</th>
                            <th>Engine version</th>
                            <th>CSS grade</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
            <!-- /.card-body -->
        </div>
    </div>
</h1>
@endsection
