@extends('admin.app')
@section('content')



 <div class="content-wrapper">
        <h4 class="fw-bold mb-4"><span class="text-muted fw-light">Sikma |</span> OPERATOR SATUAN PENDIDIKAN</h4>
        <!-- Content -->

        <div class="container-xxl flex-grow-1 container-p-y">
            <!-- Users List Table -->
            <div class="card">

                <div class="card-datatable table-responsive p-3">

<!-- Responsive tables start -->
                <div class="row" id="table-responsive">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Responsive tables</h4>
                            </div>
                            <div class="card-body">
                                <p class="card-text">
                                    Responsive tables allow tables to be scrolled horizontally with ease. Make any table responsive across all
                                    viewports by adding <code class="highlighter-rouge">.table-responsive</code> class on
                                    <code class="highlighter-rouge">.table</code>. Or, pick a maximum breakpoint with which to have a responsive
                                    table up to by adding <code class="highlighter-rouge"> .table-responsive{-sm|-md|-lg|-xl}</code>. Read full
                                    documentation
                                    <a href="https://getbootstrap.com/docs/4.3/content/tables/#responsive-tables" target="_blank">here.</a>
                                </p>
                                <div class="alert alert-info">
                                    <div class="alert-body">
                                        <h4 class="text-warning">Vertical clipping/truncation</h4>
                                        <p>
                                            Responsive tables make use of <code class="highlighter-rouge">overflow-y: hidden</code>, which clips off
                                            any content that goes beyond the bottom or top edges of the table. In particular, this can clip off
                                            dropdown menus and other third-party widgets.
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="table-responsive">
                                <table class="table mb-0">
                                    <thead>
                                        <tr>
                                            <th scope="col" class="text-nowrap">#</th>
                                            <th scope="col" class="text-nowrap">Heading 1</th>
                                            <th scope="col" class="text-nowrap">Heading 2</th>
                                            <th scope="col" class="text-nowrap">Heading 3</th>
                                            <th scope="col" class="text-nowrap">Heading 4</th>
                                            <th scope="col" class="text-nowrap">Heading 5</th>
                                            <th scope="col" class="text-nowrap">Heading 6</th>
                                            <th scope="col" class="text-nowrap">Heading 7</th>
                                            <th scope="col" class="text-nowrap">Heading 8</th>
                                            <th scope="col" class="text-nowrap">Heading 9</th>
                                            <th scope="col" class="text-nowrap">Heading 10</th>
                                            <th scope="col" class="text-nowrap">Heading 11</th>
                                            <th scope="col" class="text-nowrap">Heading 12</th>
                                            <th scope="col" class="text-nowrap">Heading 13</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td class="text-nowrap">1</td>
                                            <td class="text-nowrap">Table cell</td>
                                            <td class="text-nowrap">Table cell</td>
                                            <td class="text-nowrap">Table cell</td>
                                            <td class="text-nowrap">Table cell</td>
                                            <td class="text-nowrap">Table cell</td>
                                            <td class="text-nowrap">Table cell</td>
                                            <td class="text-nowrap">Table cell</td>
                                            <td class="text-nowrap">Table cell</td>
                                            <td class="text-nowrap">Table cell</td>
                                            <td class="text-nowrap">Table cell</td>
                                            <td class="text-nowrap">Table cell</td>
                                            <td class="text-nowrap">Table cell</td>
                                            <td class="text-nowrap">Table cell</td>
                                        </tr>
                                        <tr>
                                            <td>2</td>
                                            <td>Table cell</td>
                                            <td>Table cell</td>
                                            <td>Table cell</td>
                                            <td>Table cell</td>
                                            <td>Table cell</td>
                                            <td>Table cell</td>
                                            <td>Table cell</td>
                                            <td>Table cell</td>
                                            <td>Table cell</td>
                                            <td>Table cell</td>
                                            <td>Table cell</td>
                                            <td>Table cell</td>
                                            <td>Table cell</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Responsive tables end -->


                </div>
            </div>
        </div>
        <!-- / Content -->


        <div class="content-backdrop fade"></div>
    </div>

@section('scripts')
    <script>
        $(function() {
            const table = $('.datatables').DataTable({

            })
        });
    </script>
@endsection


@endsection
